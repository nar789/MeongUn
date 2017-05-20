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
var app = {
    // Application Constructor
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },
    onDeviceReady: function() {
      document.addEventListener('deviceready', function(){
          // Change the color
          window.plugins.headerColor.tint("#000000");
      }, false);
      dbinit();
      checkLoginStatus(function(e){
        if(e){
          //window.plugins.alertdialog.show('testTitle', 'OLD', 'buttonOk');
          document.getElementById('iframe').src="http://total0808.cafe24.com/meong-un/app/index.php?login=old&id="+myid;
        }else{
          //window.plugins.alertdialog.show('testTitle', 'NEW', 'buttonOk');
          document.getElementById('iframe').src="http://total0808.cafe24.com/meong-un/app/index.php?login=new";
        }
      });
      //Native Alert
      //window.plugins.alertdialog.show('testTitle', 'Success Message!', 'buttonOk');
      //Toast
      //window.simpleToastPlugin.show("hello world", 0, function(e){}, function(e){});
      window.onmessage=function(e){
        if(e.data=="exitApp"){
          navigator.app.exitApp();
        }else if(e.data=="camera"){

        }else if(e.data=="back"){

        }else if(e.data=="home"){

        }else if(e.data=="signBack"){

        }else{

          var JSONDATA=JSON.parse(e.data);
          //window.plugins.alertdialog.show('testTitle', JSONDATA, 'buttonOk');
          if(JSONDATA.title=="url"){

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
          }
        }
      }
    }
};

app.initialize();
