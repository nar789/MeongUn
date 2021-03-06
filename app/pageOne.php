<html>
  <head>
    <style>
      @import url(//fonts.googleapis.com/earlyaccess/jejugothic.css);
      @import url(http://fonts.googleapis.com/earlyaccess/nanumpenscript.css);
      *{
        font-family: 'Jeju Gothic', sans-serif;
      }
      body{
        background-color:black;
        margin:0px;
      }
      #header{
        width:100%;
        height:30px;
        position:fixed;
        top:0px;
        left:0px;
        background-color:white;
        z-index:40;
      }
      #content{
        width:100%;
        margin-top:30px;
        left:0px;
        background-color:black;
      }
      .icon{
        display:inline;
        float:right;
        margin:8px;
        font-size:12px;
      }
      #icon:hover{

      }
      #item{
        border-radius: 10px 10px 0px 0px;
        width:46%;
        height:200px;
        background-color:white;
        float:left;
        padding:1%;
        margin:1%;
      }
      #content_image{
        width: 105.2%;
        height: 130px;
        border-radius: 10px 10px 0px 0px;
        position: relative;
        right: 2.6%;
        bottom: 5px;
      }
      #content_title{
        width:104%;
        height:35px;
        background-color:white;
        margin-left:-2%;
      }
      #content_detail{
        width:104%;
        height: 37px;
        background-color:#fbfbfb;
        border-radius:0px 0px 10px 10px;
        margin-left:-2%;
      }
      #like{
        width: 15px;
        height: 15px;
        margin-top: 3px;
      }
      #fifty{
        width:50%;
        display:inline-block;
        margin-left:-5px;
        position:relative;
        left:2.5px;
      }
      #like_detail{
        color:#888888;
        font-size:12px;
        position:relative;
        right:2px;
      }
      #content_title_detail{
        position: relative;
        top: 10px;
        color: #696969;
        font-size: 12px;
      }
      #content_title_profile{
        width:24px;
        height:24px;
        float:left;
        margin-top:5px;
        margin-left:5px;
      }
      #bottom_margin{
        width:100%;
        height:140px;
        float:left;
      }
      #sample_text{
        display: inline-block;
        position: relative;
        bottom: 158px;
        background-color: rgba(0,0,0,0.5);
        color: white;
        padding: 7px;
        border-radius: 15px;
      }
      #like_text{
        color:#a9a9a9;
      }

    </style>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
      var page=0;
      var type="no";
      function sendMsg(msg,target){
        let str='{"title":"'+msg+'","no":"'+target+'"}';
        window.parent.postMessage(str,"*");
      }
      function getContentList(){
        $.get("contentList.php",{category:1,limit:page,type:type,page:page}).done(function(data){
          document.getElementById('content_content').innerHTML+=data;
          if(data!=""){
            page++;
          }else{
            var json='{"title":"toast","toast":"'+'추가할 데이터가 없습니다.'+'"}';
            //window.parent.postMessage(json,"*");
          }
        });
      }
      function reloadContentList(){
        page=0;
        document.body.scrollTop=0;
        $.get("contentList.php",{category:1,limit:page,type:type,page:page}).done(function(data){
          // alert(data);
          document.getElementById('content_content').innerHTML=data;
          page++;
          type="no";
          var json='{"title":"toast","toast":"'+'목록이 갱신 되었습니다.'+'"}';
          //window.parent.postMessage(json,"*");
        });
      }
      document.addEventListener('scroll',function(event){
        if(document.body.scrollHeight==document.body.scrollTop+window.innerHeight){
          $("body").animate({scrollTop:document.body.scrollTop-60},300);
          getContentList();
        }
      });
      function init(){
        getContentList();
      }
      function changeType(target){
        if(target==1){
          document.getElementById('like_text').style.color="black";
          document.getElementById('recent_text').style.color="#a9a9a9";
          type="like_counter";
        }else if(target==2){
          document.getElementById('like_text').style.color="#a9a9a9";
          document.getElementById('recent_text').style.color="black";
          type="no";
        }
        reloadContentList();
      }
      window.onload=init();
      window.onmessage=function(e){
        if(e.data=="RELOAD"){
          reloadContentList();
        }
      }
    </script>
  </head>
  <body style="background-color:black;">

    <div id=header>
      <div class=icon onclick="changeType(3)" style="display:none;">새로고침</div>
      <div class=icon id=like_text onclick="changeType(1)">인기글</div>
      <div class=icon id=recent_text onclick="changeType(2)">최신글</div>
    </div>
    <div id=content style="background-color:black;">
      <center id=content_content>
      </center>
    </div>
    <div id=bottom_margin style="background-color:black;"></div>
  </body>
</html>
