<html>
  <head>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/pageReading.css">
    <style>
    @import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);

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
      #delete{
        float:right;
        border-radius:21px;
        padding:5px;
        width:auto;
        color:white;
        height:18px;
        margin-right:20px;
        display:none;
        position: relative;
        bottom: 5px;
      }
      #upload{
        float:right;
        border-radius:21px;
        padding:5px;
        width:auto;
        color:white;
        height:18px;
        margin-right:20px;
        display:none;
        position: relative;
        bottom: 5px;
      }
      .utilVar{
        position: fixed;
        bottom: 0px;
        left: 0px;
        height: 50px;
        width: 100%;
        z-index:20;
      }
      .fifty{
        height:100%;
        float:left;
        width:50%;
        background-color:black;
      }
      #like{
        color: white;
        width: 60%;
        margin-top: 7px;
        border-radius: 10px;
        padding: 11px;
        font-size: 14px;
      }
      #share{
        color: white;
        width: 60%;
        margin-top: 7px;
        border-radius: 10px;
        padding: 11px;
        font-size: 14px;
      }
      #shareModal{
        display:none;
        position:fixed;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);
        left:0px;
        top:0px;
        z-index:50;
      }
      #shareModalTop{
        width:100%;
        height:10%;
      }
      #shareModalContent{
        width: 85%;
        height: auto;
        background-color:white;
      }
      #shareImage{
        width:100%;
        height: 200px;
      }
      .shareIcon{
        width:24px;
        height:24px;
        float: left;
        margin-top: 7px;
        margin-left: 8px;
      }
      .shareLine{
        width:90%;
        height:38px;
        margin:10px;
      }
      .shareText{
        font-family: 'Nanum Gothic', serif;
        position: relative;
        top: 10px;
        font-size: 15px;
      }
      #mainImage{
        width:100%;
        height:100%;
        position:fixed;
        top:0px;
      }
      #content{
        position:relative;
        z-index:10;
      }
    </style>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script>
      var adison=0;


      var contentNumber;
      var userId;
      var admin=0;
      var background;
      var content;
      function clcik_comment_box(){
        $("html,body").animate({scrollTop:document.body.scrollTop+window.innerHeight},600);
      }
      function click_like_button(){
        $.get("mysql/updateContentLikeCounter.php",{no:contentNumber}).done(function(result){
          window.parent.postMessage("RELOAD","*");
          window.parent.postMessage("back","*");
        });
      }
      function updateComments(no,admin){
        $.get("commentsListGenerator.php",{target_no:no,author:userId,admin:admin}).done(function(result){
          //alert("updateComment"+userId);
          document.getElementById('comment_list').innerHTML=result;
          document.getElementById('input_comment').value="";
        });
      }
      function sendMsg(msg){
        window.parent.postMessage(msg,"*");
      }
      function insertComment(){
        var json='{"title":"comment","comment":"'+document.getElementById('input_comment').value+'","no":"'+contentNumber+'"}';
        window.parent.postMessage(json,"*");
      }
      function deleteContents(){
        var json='{"title":"deleteContent","no":"'+contentNumber+'"}';
        window.parent.postMessage(json,"*");
        window.history.back();
      }
      function updateContents(){
        var json='{"title":"updateContent","no":"'+contentNumber+'","content":"'+encodeURI(document.getElementById('content_text').value)+'"}';
        window.parent.postMessage(json,"*");
        document.getElementById('content_text').value='';

        window.history.back();
      }
      function deleteComment(no){
        $.get("mysql/updateContentLikeCounter.php",{no:no,flag:1}).done(function(result){
          window.parent.postMessage("RELOAD","*");
        });
        $.get("mysql/deleteComment.php",{no:no}).done(function(result){
          updateComments(contentNumber,admin);
          window.parent.postMessage("RELOAD","*");
        });
      }
      function click_share_button(){
        //alert(content+background+contentNumber);
        document.getElementById('shareModal').style.display="block";
      }
      var memh=0;
      var once=true;

      window.onload=()=>{
        window.parent.postMessage("LOAD","*");
      }

      var k;
      let fontsize=14;

      function body_resize(){
        if(once==true){
          memh=$(window).height();
          h=parseInt($('#content_text').height());
          PaddingController();
          once=false;
        }
        $("#mainImage").css('height',memh+'px');
      }

      var text="";
      var h=0;
      function PaddingController(){
        if(text!=$('#content_text').val() && h!=0){
          k=h/2;
          text=$('#content_text').val();
          var textarr=text.split('\n');
          k = k - ((parseInt(textarr.length))*fontsize);
          if(k<12){
            //var addh=h-(k-12);
            //$('#content_text').css('height',addh+"px");
            k=12;
          }else{
            $('#content_text').css('height',h+"px");
          }
          $('#content_text').css('padding-top',k+"px");
        }
      }

       function InputEnter(e) {
          if (e.keyCode == 13) {
              if(k-fontsize>0){
                k=k-fontsize;
                $('#content_text').css('padding-top',k+"px");
              }
              return false;
          }
      }

      window.onmessage=function(e){
        if("UPDATECOMMENT"==e.data){
          updateComments(contentNumber,admin);
        }else if("BACK"==e.data){
          if(document.getElementById('shareModal').style.display=="block"){
            document.getElementById('shareModal').style.display="none";
          }else{
            window.parent.postMessage("READINGBACK","*");
          }
        }else if(e.data.indexOf("&xd_action")!=-1){

        }else{

          var oj=JSON.parse(e.data);
          //alert(e.data);
          contentNumber=oj.no;
          if(oj.author=="false"){
            document.getElementById('delete').style.display="none";
            document.getElementById('upload').style.display="none";
            document.getElementById('content_text').style.pointerEvents="none";
          }else if(oj.author=="true"){
            document.getElementById('delete').style.display="block";
            document.getElementById('upload').style.display="block";
            document.getElementById('content_text').style.pointerEvents="auto";
          }
          if(oj.admin=='1'){
            document.getElementById('upload').style.display="block";
            document.getElementById('delete').style.display="block";
            admin=1;
          }
          userId=oj.userId;

          $.get("contentDetail.php",{no:oj.no}).done(function(result){
            document.body.style='';
            var j=JSON.parse(result);
            document.getElementById('post_date').innerHTML=j.time;
            // alert(decodeURI(j.content));
            document.getElementById('content_text').value=decodeURI(j.content);


            content=decodeURI(j.content);
            //document.body.style="background:url("+j.background+") no-repeat center center fixed;background-size: cover;";
            document.getElementById('mainImage').src=j.background;
            background=j.background;
            document.getElementById("shareImage").src=background;

            PaddingController();
          });
          updateComments(contentNumber,oj.admin);
          window.parent.postMessage("EXITLOADING","*");

        }

      }
      function move_url(url){
        var json='{"title":"ad","ad":"'+url+'"}';
        window.parent.postMessage(json,"*");
      }
      function shareTalk(){
        var replaced_content=content.replace(/\n/gi,"<br>");
        var json='{"title":"share","content":"'+encodeURI(replaced_content)+'","back":"'+background+'","no":"'+contentNumber+'"}';
        window.parent.postMessage(json,"*");
      }
      function shareStory(){
        Kakao.Story.share({
          url: 'http://total0808.cafe24.com/meong-un/app/readPreview.php?no='+contentNumber,
          text: content
        });
      }
      function shareBook(){
        FB.ui({
          method: 'share',
          href: 'http://total0808.cafe24.com/meong-un/app/readPreview.php?no='+contentNumber,
        }, function(response){});
      }
      function sendToast(str){
        var json='{"title":"toast","toast":"'+str+'"}';
        window.parent.postMessage(json,"*");
      }
    </script>
  </head>
  <body onresize="body_resize();">
    <img id=mainImage >
    <div id=shareModal onclick="document.getElementById('shareModal').style.display='none'">
      <div id=shareModalTop></div>
      <center>
        <div id=shareModalContent>
          <img id=shareImage>
          <div class=shareLine onclick="shareTalk()" style="background-color:#ffeb00">
            <img class=shareIcon src="images/kakaolink_btn_small.png">
            <font class=shareText>카카오톡으로 공유하기</font>
          </div>
          <div class=shareLine onclick="shareStory()" style="background-color:#f9e000">
            <img class=shareIcon src="images/kakaostory_icon.png">
            <font class=shareText>카카오스토리로 공유하기</font>
          </div>
          <div class=shareLine onclick="shareBook()" style="background-color:#3b5998">
            <img class=shareIcon style="position: relative;right: 4px;"src="images/FB-fLogo-Blue-broadcast-2.png">
            <font class=shareText style="color:white;">페이스북으로 공유하기</font>
          </div>
          <div style="width:100%;height:10px;"></div>
        </div>
      </center>
    </div>
    <div id=icon_box>
      <img class=icon onclick="sendMsg('back')" id=back width="24px" height="24px" src="images/iconmonstr-arrow-64-48.png">
      <!-- <div class=icon onclick="changeFont()" id=icon_font>가</div> -->
      <div id=space></div>
      <div id=post_date></div>
      <div class=icon id=delete onclick="updateContents()">수정</div>
      <div class=icon id=upload onclick="deleteContents()">삭제</div>
    </div>
    <center>
      <div id=content>
        <div id=content_container>
          <!-- <div style="width:100%;height:35%"></div> -->
          <textarea onkeypress="InputEnter(event)" id=content_text></textarea>
        </div>
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
    <!--  -->
    <div class=utilVar>
      <div class=fifty>
        <center><div id=like onclick="click_like_button()">좋아요</div></center>
      </div>
      <div class=fifty>
        <center><div id=share onclick="$(window).scrollTop(0);click_share_button()">공유하기</div></center>
      </div>
    </div>

  </body>

  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '309741419478273',
        xfbml      : true,
        version    : 'v2.9'
      });
      FB.AppEvents.logPageView();
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
</html>
