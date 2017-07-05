function send_message(str){
  var data=new Object();
  data.title=str;
  var jsonData=JSON.stringify(data);
  iframe.contentWindow.postMessage(jsonData,"*");
}
//////////////////////////////////////////////////////
///////////////////DB MODULE//////////////////////////
//////////////////////////////////////////////////////
var myid;
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
////admob//

//////////
//KAKAOTALK
function kakaoShare(content,img_src,no){
  KakaoTalk.share({
    text : "세상의 모든 명언\n"+content.replace(/<br>/gi,"\n"),
    image : {
      src : 'http://total0808.cafe24.com/meong-un/app/'+img_src,
      width : 138,
      height : 90,
    },

    applink :{
      url : 'http://total0808.cafe24.com/meong-un/app/readPreview.php?no='+no,
      text : '앱으로 이동',
    },
    params :{
      paramKey1 : 'paramVal',
      param1 : 'param1Value',
      cardId : '27',
      keyStr : 'hey'
    }
  },
  function (success) {
    console.log('kakao share success');
  },
  function (error) {
    console.log('kakao share error');
  });
}
// Android only: check permission
var phoneNumber;
function hasReadPermission() {
  window.plugins.sim.hasReadPermission((s)=>{alert(s);if(s.equals('false')){
    alert('false');
    requestReadPermission();}},(r)=>{alert(r)});
}

// Android only: request permission
function requestReadPermission() {
  window.plugins.sim.requestReadPermission((s)=>{
    window.plugins.sim.getSimInfo((result)=>{
      //
      //alert(result.phoneNumber);
      checkLoginStatus((e)=>{
        if(e){
          phoneNumber=result.phoneNumber;
          //window.plugins.alertdialog.show('testTitle', 'OLD', 'buttonOk');
          document.getElementById('iframe').src="http://total0808.cafe24.com/meong-un/app/index.php?login=old&id="+result.phoneNumber;
        }else{
          //window.plugins.alertdialog.show('testTitle', 'NEW', 'buttonOk');
          setLoginStatus(result.phoneNumber);
          document.getElementById('iframe').src="http://total0808.cafe24.com/meong-un/app/index.php?login=old&id="+result.phoneNumber;
        }


      });
    },()=>{})
  },(r)=>{navigator.app.exitApp();});
}
//KAKAOTALK
function admobShow(){
  admob.interstitial.config({
   id: 'ca-app-pub-1542264535834690/5985608766',
  })

  admob.interstitial.prepare()

  admob.interstitial.show()
}
function onBackKeyDown() {
  document.getElementById('iframe').contentWindow.postMessage("back",'*');
}
var kakaoLoginStatus=0;
var tokenValue;
var load_count=0;
var app = {
    // Application Constructor
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
        document.addEventListener("backbutton", onBackKeyDown, false);
    },
    onDeviceReady: function() {
      document.addEventListener('deviceready', function(){
          // Change the color
          window.plugins.headerColor.tint("#161616");
      }, false);

      FCMPlugin.onNotification(
      function(data){
        if(data.wasTapped){
          //Notification was received on device tray and tapped by the user.
          //alert( JSON.stringify(data) );
        }else{
          //Notification was received in foreground. Maybe the user needs to be notified.
          //alert( JSON.stringify(data) );
        }
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

      //Native Alert
      //window.plugins.alertdialog.show('testTitle', 'Success Message!', 'buttonOk');
      //Toast
      //window.simpleToastPlugin.show("hello world", 0, function(e){}, function(e){});
      window.onmessage=function(e){
        if(e.data=="exitApp"){
          navigator.app.exitApp();
        }else if(e.data=="camera"){

        }else if(e.data=="LOAD"){
          load_count=load_count+1;
          if(load_count>=8){
            admobShow();
            setTimeout(()=>{
              $('#splash').transition({ x: $(window).width() })
              .transition({opacity:0})
              .transition({scale:0});
            },1000);

          }
        }else if(e.data=="home"){

        }else if(e.data=="signBack"){

        }else if(e.data=="TOKEN"){
          FCMPlugin.getToken(
            function(token){
              if(token!=""){
                $.post("http://total0808.cafe24.com/meong-un/app/admin/tokenManagement.php",{
                  token:token,
                  phone:phoneNumber
                }).done(function(result){
                  //alert(result);
                });
              }else{
                FCMPlugin.getToken(function(asd){
                });
              }
            },
            function(err){
              console.log('error retrieving token: ' + err);
            }
          );
        }else{
          var JSONDATA=JSON.parse(e.data);
          //window.plugins.alertdialog.show('testTitle', JSONDATA, 'buttonOk');
          if(JSONDATA.title=="url"){

          }else if(JSONDATA.title=="now_url"){

          }else if(JSONDATA.title=="data"){
            //window.simpleToastPlugin.show(JSONDATA.data, 0, function(e){}, function(e){});
          }else if(JSONDATA.title=="signUp"){
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
            //alert(e.content);
            if(kakaoLoginStatus==0){
              kakaoShare(JSONDATA.content,JSONDATA.back,JSONDATA.no);
            }else{
              //kakaoShare();
              //alert(JSONDATA.content+JSONDATA.back+JSONDATA.no);

            }
          }
        }
      }
    }
};

app.initialize();
