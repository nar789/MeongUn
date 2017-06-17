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
</head>

<body>

  <div id=modal style="<?php echo ($_GET['login']=='new') ? 'display:block':'display:none'?>">
    <div id=topMargin></div>
    <center>
      <div id=modalContent>
        <iframe id=signUpIframe src="signUp.php"></iframe>
      </div>
    </center>
  </div>
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
      <!-- <a href="#pageWriting" data-transition="pop">
        <div id=icon_font>글쓰기</div>
      </a> -->
        <div id=title>세상의 모든 <font id=meun>명언</font></div>
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
    <iframe style="position:absolute;width:100%;height:100%;border:none;" id=pageOneIframe src="pageOne.php"></iframe>
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
</body>

</html>
