<!DOCTYPE html>
<html>
<input id=userId type="hidden" value="<?php echo $_GET['id']?>">
<input id=isadmin type="hidden" value="<?php if($_GET['admin']=='admin'){echo 'admin';}?>">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <script src="js/index.js" type="text/javascript" charset="utf-8"></script>
  <script>

    function newNickname(){
      var nickname=document.getElementById('new_nickname').value;
      $.get("mysql/updateNickname.php",{no:document.getElementById('userId').value,nickname:nickname}).done((result)=>{
        document.getElementById('modal3').style.display="none";
      });
      // document.getElementById('nickname_result').innerHTML=nickname;
    }
  </script>
</head>

<body>
  <div id="modal4">
    <div id=modal4TM></div>
    <center>
      <div id=modal4Ct style="height:260px;background-color:white;border-radius:5px;">
        <h1 style="color:black;font-size:15px;font-weight:normal;position:relative;top:10px;">
        앱을 종료하시겠습니까?</h1>
        <div id=modal_ad style="height:70%;"></div>
        <div style="display:inline-block;width:50%;margin-top:25px;" onclick="exit_app();">예</div>
        <div style="display:inline-block;width:50%;margin-left: -5px;" onclick="document.getElementById('modal4').style.display='none';">취소</div>
      </div>
    </center>
  </div>
  <div id="modal3">
    <div id=modal3TM></div>
    <center>
      <h1 style="color:white;    font-size: 15px;
    font-weight: normal;">앱에서 사용하실 닉네임을 입력해주세요.</h1>
      <div id=modal3Ct>
        <input id=new_nickname type=text style="   background-color: black;
    border: none;
    color: white;
    outline: none;
    line-height: 48px;width:70%;">
        <button style="border: none;
    outline: none;
    background-color: white;
    padding: 5px;
    float: right;
    margin-top: 11px;
    margin-right: 11px;
    font-family: 'Jeju Gothic', sans-serif;" onclick="newNickname()">확인</button>
      <h1 id=nickname_result style="color:#FF495D;font-size:15px;font-weight:normal;"></h1>
      </div>
    </center>
  </div>
  <a href="myApp://goActivity?activity_name=main"></a>
  <div id=modal2 style="display:none" onclick="document.getElementById('modal2').style.display='none'">
    <div id=topMargin></div>
    <center>
      <div id=modalContent>

        <div class=modal_line_title>공지사항</div>
        <center>
          <div id=modal_line_list></div>
        </center>
      </div>
    </center>
  </div>

  <div id=header>
    <div id=header_top></div>
    <div id=header_icon_left>
        <div id=title>긍정의 <font id=meun>하루</font></div>
    </div>
    <div id=header_icon_right>
      <img id=icon src="images/iconmonstr-bell-2-64.png" onclick="sendMsg('bell')">
    </div>
    <div id=header_content>
      <a id="a_button" href="#page1" data-transition="fade">명언</a>
      <a id="a_button" href="#page2" data-transition="fade">좋은글</a>
      <a id="a_button" href="#page3" data-transition="fade">나만의명언</a>
      <a id="a_button" href="#page4" data-transition="fade">인기추천</a>
    </div>
  </div>

  <div class=content data-role="page" id=page1>
    <iframe style="position:absolute;width:100%;height:100%;border:none;z-index:30" id=pageOneIframe src="pageOne.php"></iframe>
  </div>

  <div class=content data-role="page" id=page2>
    <iframe id=pageTwoIframe src="pageTwo.php"></iframe>
  </div>
  <div class=content data-role="page" id=page3>
    <iframe id=pageThreeIframe src="pageThree.php"></iframe>
  </div>
  <div class=content data-role="page" id=page4>
    <iframe src="recommend.list.page.php"></iframe>
  </div>
  <div class=fullScreen data-role="page" id=pageWriting>
    <iframe id=pageWritingIframe src="pageWriting.php" class=pageWriting></iframe>
  </div>
  <div class=fullScreen data-role="page" id=pageReading>
    <iframe id=pageReadingIframe src="pageReading.php" class=pageReading></iframe>
  </div>
  <div class=fullScreen data-role="page" id=pageReadingAdmin>
    <iframe id="pageRAdminIframe" src="pageReadingAdmin.php" class=pageReading></iframe>
  </div>
  <div class=fullScreen data-role="page" id=pageSampleImage>
    <iframe id=pageSampleImageIframe src="pageSamplePictureList.php"></iframe>
  </div>
  <div class=fullScreen data-role="page" id="pageAdFull">
    <iframe id=pageAd src="pageAdFull.php">
  </div>


</body>

</html>
