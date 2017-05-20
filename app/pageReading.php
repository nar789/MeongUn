<html>
  <head>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/pageReading.css">
    <style>
      body{
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      input:focus{
        border-top:none;
        border-left:none;
        border-right:none;
      }
      #like_icon{
        width:50px;
        height:50px;
        background-color:#2095f2;
        position:fixed;
        bottom:200px;
        right:20px;
        padding:20px;
        border-radius:50px;
      }
      #like_icon_image{
        width:50px;
        height:50px;
      }
      #like_icon_text{
        color: white;
        width: 90%;
        border: 1px solid white;
        padding: 10px;
        border-radius: 10px;
        position: relative;
        top: 5px;
      }
      #like_icon_text:hover{
        background-color:white;
        color:black;
      }
      #delete{
        float:right;
        border-radius:21px;
        padding:5px;
        background-color:rgba(0,0,0,0.6);
        width:18px;
        height:18px;
        margin-right:20px;
        display:none;
      }
      #upload{
        float:right;
        border-radius:21px;
        padding:5px;
        background-color:rgba(0,0,0,0.6);
        width:18px;
        height:18px;
        margin-right:20px;
        display:none;
      }
    </style>
    <script>
      var contentNumber;
      var userId;
      var admin=0;
      function clcik_comment_box(){
        $("html,body").animate({scrollTop:document.body.scrollTop+window.innerHeight},600);
      }
      function click_like_button(){
        $.get("mysql/updateContentLikeCounter.php",{no:contentNumber}).done(function(result){
          var json='{"title":"toast","toast":"'+'좋아요!'+'"}';
          window.parent.postMessage(json,"*");
        });
      }
      function updateComments(no,admin){
        $.get("commentsListGenerator.php",{target_no:no,author:userId,admin:admin}).done(function(result){
          document.getElementById('comment_list').innerHTML=result;
        });
      }
      function sendMsg(msg){
        window.parent.postMessage(msg,"*");
      }
      function insertComment(){
        var json='{"title":"comment","comment":"'+document.getElementById('input_comment').value+'","no":"'+contentNumber+'"}';
        window.parent.postMessage(json,"*");
        updateComments(contentNumber,admin);
      }
      function deleteContents(){
        var json='{"title":"deleteContent","no":"'+contentNumber+'"}';
        window.parent.postMessage(json,"*");
        window.history.back();
      }
      function updateContents(){
        var json='{"title":"updateContent","no":"'+contentNumber+'","content":"'+encodeURI(document.getElementById('content_text').value)+'"}';
        window.parent.postMessage(json,"*");
        window.history.back();
      }
      function deleteComment(no){
        $.get("mysql/deleteComment.php",{no:no}).done(function(result){
          updateComments(contentNumber,admin);
          var json='{"title":"toast","toast":"'+'댓글이 삭제되었습니다.'+'"}';
          window.parent.postMessage(json,"*");
        });
      }
      window.onmessage=function(e){
        if("UPDATECOMMENT"==e.data){
          updateComments(contentNumber,admin);
        }else{
          var oj=JSON.parse(e.data);
          contentNumber=oj.no;
          if(oj.author=="false"){
            document.getElementById('delete').style.display="none";
            document.getElementById('upload').style.display="none";
            document.getElementById('content_text').style="pointer-events:none;";
          }else if(oj.author=="true"){
            document.getElementById('delete').style.display="block";
            document.getElementById('upload').style.display="block";
          }
          if(oj.admin=='1'){
            document.getElementById('upload').style.display="block";
            document.getElementById('delete').style.display="block";
            admin=1;
          }
          userId=oj.userId;
          $.get("contentDetail.php",{no:oj.no}).done(function(result){
            var j=JSON.parse(result);
            document.getElementById('post_date').innerHTML=j.time;
            // alert(decodeURI(j.content));
            document.getElementById('content_text').value=decodeURI(j.content);
            document.body.style="background:url("+j.background+") no-repeat center center fixed;background-size: cover;";
          });
          updateComments(contentNumber,oj.admin);
        }

      }
    </script>
  </head>
  <body>
    <div id=icon_box>
      <img class=icon onclick="sendMsg('BACK')" id=back width="24px" height="24px" src="images/iconmonstr-arrow-64-48.png">
      <!-- <div class=icon onclick="changeFont()" id=icon_font>가</div> -->
      <div id=space></div>
      <div id=post_date></div>
      <img class=icon id=delete onclick="deleteContents()" src="images/iconmonstr-trash-can-9-64.png">
      <img class=icon id=upload onclick="updateContents()" src="images/iconmonstr-upload-19-64.png">
    </div>
    <center>
      <div id=content>
        <textarea id=content_text></textarea>
        <div id=comment_list>
        </div>

      </div>
    </center>
    <div id=insert_comment onclick="clcik_comment_box()">
      <div id=insert_comment_left>
        <center>
          <input id=input_comment type=text placeholder="댓글을 달아보세요"></input>
        </center>
      </div>
      <div id=insert_comment_right>
        <div class=clear>
          <center>
            <div id=sendButton onclick="insertComment()"><font id=sendButtonText>전송</font></div>
          </center>
        </div>
      </div>
    </div>
    <div id =insert_like>
      <center>
        <div id=like_icon_text onclick="click_like_button()">
          좋아요!
        </div>
      </center>
    </div>
  </body>
</html>
