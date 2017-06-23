<?php
  include("mysql/selectSampleImages.php");
  $path="sample_images/";
  $rand_image=$path.selectRandomImage($MeongUnSampleImages);
?>

<html>
  <head>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/pageWriting.css">

    <script>
      var target_board=3;
      var img="<?php echo $rand_image?>";
      function sendMsg(str){
        window.parent.postMessage(str,"*");
        location.reload();
      }
      function changeFont(){

      }
      function openPicture(){
        window.parent.postMessage("PICTURE","*");
      }
      function openCategory(){
        $("#modal2").fadeIn();
      }
      function saveData(){
        var content=encodeURI(document.getElementById('content_text').value);

        let json_data='{"title":"writing","content":"'+content+'","image":"'+img+'","category":"'+target_board+'"}';
        alert(json_data);
        window.parent.postMessage(json_data,"*");
        window.history.back();
      }
      function changeBoard(target){
        target_board=target;
        $("#modal2").fadeOut();
      }
      window.onmessage=function(e){
        if(e.data=="BACK_WRITING"){
          $("#modal").fadeOut();
        }else{
          var j=JSON.parse(e.data);
          if(j.title=="image_src"){
            document.body.style="background:url("+j.image_src+") no-repeat center center fixed;background-size: cover;";
            img=j.image_src;
            $("#modal").fadeOut();
          }else if(j.title="category"){
            target_board=3;
          }
        }
      }
    </script>
    <style>
      body{
        background:url(<?php echo $rand_image?>) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      #modal{
        display:block;
        position:fixed;
        top:0px;
        left:0px;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);
        z-index:20;
      }

      #modalContent{
        margin:auto;
        background-color:rgba(255,255,255,1);
        width:95%;
        height:95%;
      }
      #topMargin{
        height:1%;
      }
      #modal2{
        display:block;
        position:fixed;
        top:0px;
        left:0px;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.7);
        z-index:20;
      }
      #modalContent2{
        margin:auto;
        background-color:rgba(255,255,255,1);
        width:50%;
        height:150px;
        border-radius:10px;
      }
      #topMargin2{
        height:20%;
      }
      iframe{
        width:100%;
        height:100%;
        border:1px solid white;
        border-radius:10px;
      }
      #line{
        height:33%;
        width:100%;
      }
      #line:hover{
        background-color:#fc6014;
        color:white;
        border-radius:inherit;
      }
      #line_item{
        position:relative;
        top:15px;
      }
      .line_center{
        border:1px solid black;
        border-left:none;
        border-right:none;
      }
      #icon_container{
        display: inline-block;
        background-color: rgba(0,0,0,0.6);
        padding: 10px;
        border-radius: 25px;
        margin-left: 10px;
      }
    </style>
  </head>

  <body>

    <div id=icon_box>
      <img class=icon onclick="sendMsg('BACK')" id=back width="24px" height="24px" src="images/iconmonstr-arrow-64-48.png">
      <!-- <div class=icon onclick="changeFont()" id=icon_font>가</div> -->
      <div id=icon_container>
        <img class=icon onclick="openPicture('PICTURE')" id=camera src="images/iconmonstr-picture-6-48.png">
      </div>
      <div id=space></div>
      <div class=icon onclick="saveData()" id=icon_save>글 저장하기</div>
    </div>
    <center>
      <div id=content>
        <textarea id=content_text placeholder="나의 명언을 남겨주세요!!"></textarea>
      </div>
    </center>
    <div id=modal2 style="display:none" onclick="document.getElementById('modal2').style.display='none';">
      <div id=topMargin2></div>
      <center>
        <div id=modalContent2>
          <div id=line onclick="changeBoard(1)"><font id=line_item>명언속으로</font></div>
          <div id=line class=line_center onclick="changeBoard(2)"><font id=line_item >명언만들기</font></div>
          <div id=line onclick="changeBoard(3)"><font id=line_item>짧은명언</font></div>
        </div>
      </center>
    </div>
  </body>
  <!-- <div id=modal style="display:none">
    <div id=topMargin></div>
    <center>
      <div id=modalContent>
        <iframe src="pageSamplePictureList.php"></iframe>
      </div>
    </center>
  </div> -->
</html>
