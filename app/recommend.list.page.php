<html>
  <head>
    <style>
      @import url(//fonts.googleapis.com/earlyaccess/jejugothic.css);
      *{
        font-family: 'Jeju Gothic', sans-serif;
      }
      .line{
        width:90%;
        height:90px;
        margin:20px;
        border-radius:10px;
        border:1px solid rgba(121,121,121,0.9);
        box-shadow: 0px 0px 10px 0px rgba(121,121,121,0.9);
      }
      .line_img{
        float:left;
        margin-left: 10px;
        margin-top: 10px;
        width:70px;
        height:70px;
      }
      .line_detail_top{
        text-align: left;
        margin-left: 90px;
        margin-bottom: 0px;
        font-size:18px;
        margin-right:20px;
      }
      .line_detail_detail{
        text-align: left;
        margin-left: 90px;
        margin-top: 6px;
        font-size: 10px;
        font-weight: normal;
        margin-right: 20px;
      }
      .header{
        width: 270px;
        font-size: 11px;
        color: #dc6014;
        background-color: black;
        border-radius: 10px;
        padding: 5px;
      }
    </style>
  </head>
  <body>
    <center>
      <div class=header>
        긍정의 하루<font style="color:white;">과 함께하는 인기 핫한 앱들을 보고가세요!</font>
      </div>
    </center>
    <center id=content>
    </center>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
      window.onload=function(){
        $.get("mysql/selectRecommentApp.php").done(function(data){
          document.getElementById('content').innerHTML=data;
        });
      }
      function loadAd(url){
        var json='{"title":"ad","ad":"'+url+'"}';
        window.parent.postMessage(json,"*");
      }
    </script>
  </body>


</html>
