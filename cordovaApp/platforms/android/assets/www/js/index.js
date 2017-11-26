var myid;
var home="http://ace0909.cafe24.com/app/";
var phoneNumber;
var kakaoLoginStatus=0;
var tokenValue;
var load_count=0;

function send_message(str){
  var data=new Object();
  data.title=str;
  var jsonData=JSON.stringify(data);
  iframe.contentWindow.postMessage(jsonData,"*");
}
//////////////////////////////////////////////////////
///////////////////DB MODULE//////////////////////////
//////////////////////////////////////////////////////

function checkLoginStatus(success){
    db.transaction(function (txn) {
        txn.executeSql('select * from login', [], function (tx, res) {
            var id=res.rows.item(0).id;
            myid=id;
            success(id);
        });
    });
}
function setLoginStatus(id){
    db.transaction(function (txn) {
        txn.executeSql('update login set id=?', [id], function (tx, res) {
            myid=id;
        });
    });
}
function dropTable(){
    db.transaction(function (txn) {
        txn.executeSql('drop table login', [], function (tx, res) {
        });
    });
}
function dbinit(){ //database init.
    db = sqlitePlugin.openDatabase('login.db', '1.0', '', 1);
    db.transaction(function (txn) {
        txn.executeSql('create table if not exists login(id text)', [], function (tx, res) {
        });
        txn.executeSql('insert into login values(?)', [''], function (tx, res) {
	     });
    });
}
//////////////////////////////////////////////////////
///////////////////DB MODULE//////////////////////////
//////////////////////////////////////////////////////

//KAKAOTALK
function kakaoShare(content,img_src,no){
  KakaoTalk.share({
    text : "긍정의 하루\n"+content.replace(/<br>/gi,"\n"),
    image : {
      src : home+img_src,
      width : 138,
      height : 90,
    },

    applink :{
      url : home+'readPreview.php?no='+no,
      text : '앱으로 이동',
    }
  },
  function (success) {
    console.log('kakao share success');
  },
  function (error) {
    console.log('kakao share error');
  });
}
function hasReadPermission() {
  window.plugins.sim.hasReadPermission((s)=>{alert(s);if(s.equals('false')){
    alert('false');
    requestReadPermission();}},(r)=>{alert(r)});
}
function requestReadPermission() {
  window.plugins.sim.requestReadPermission((s)=>{
    window.plugins.sim.getSimInfo((result)=>{
      checkLoginStatus((e)=>{
        if(e){
          phoneNumber=result.phoneNumber;
          $("#iframe").attr("src",home+"index.php?login=old&id="+result.phoneNumber);
        }else{
          setLoginStatus(result.phoneNumber);
          $("#iframe").attr("src",home+"index.php?login=old&id="+result.phoneNumber);
        }
      });
    },()=>{})
  },(r)=>{navigator.app.exitApp();});
}
//KAKAOTALK

var app = {
    // Application Constructor
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
        document.addEventListener("backbutton", onBackKeyDown, false);
    },
    onBackKeyDown:function(){
      document.getElementById('iframe').contentWindow.postMessage("back",'*');
    },
    onDeviceReady: function() {

      window.plugins.headerColor.tint("#161616");
      FCMPlugin.onNotification(
        function(data){
          if(data.wasTapped){}else{}
        },
        function(msg){
          console.log('onNotification callback successfully registered: ' + msg);
        },
        function(err){
          console.log('Error registering onNotification callback: ' + err);
        }
      );
      dbinit();
      requestReadPermission();


      
      window.onmessage=function(e){
        if(e.data=="exitApp"){
          mayflower.moveTaskToBack()
              .then(function() {
                  console.log('success');
              })
              .otherwise(function(e) {
                  console.log('failed: ' + e);
          });
        }else if(e.data=="LOAD"){
          load_count=load_count+1;
          if(load_count>=8){
            $("#loading").css("display","none");
            $("#splash").animate({left:'100%',top:'0px'},"fast");
            setTimeout(function(){$("#splash").css("display","none");},1000);
          }
        }else if(e.data=="TOKEN"){
          FCMPlugin.getToken(
            function(token){
              if(token!=""){
                $.post(home+"admin/tokenManagement.php",{
                  token:token,
                  phone:phoneNumber
                }).done(function(result){ });
              }else{
                FCMPlugin.getToken(function(asd){ });
              }
            },
            function(err){
              console.log('error retrieving token: ' + err);
            }
          );
        }else{
          
          var JSONDATA=JSON.parse(e.data);
          if(JSONDATA.title=="signUp"){
            setLoginStatus(JSONDATA.signUp);
          }else if(JSONDATA.title=="toast"){
            window.simpleToastPlugin.show(JSONDATA.toast, 0, function(e){}, function(e){});
          }else if(JSONDATA.title=="ad"){
            window.plugins.webintent.startActivity({
              action: window.plugins.webintent.ACTION_VIEW,
              url: JSONDATA.ad},
              function() {},
              function() {alert('Failed to open URL via Android Intent');}
            );
          }else if(JSONDATA.title=="share"){
            if(kakaoLoginStatus==0){
              kakaoShare(decodeURI(JSONDATA.content),JSONDATA.back,JSONDATA.no);
            }
          }

        }//JSONDATA

      }//onMessage


    }//DeviceReady
};

app.initialize();
