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
  <div id=loading>
    <div id=loadingTM></div>
    <center>
      <div id=loadingCT><img src="images/loading.gif"></div>
    </center>
  </div>
  <div id="modal4">
    <div id=modal4TM></div>
    <center>
      <div id=modal4Ct style="height:260px;background-color:white;border-radius:5px;">
        <h1 style="color:black;font-size:15px;font-weight:normal;position:relative;top:5px;">
        앱을 종료하시겠습니까?</h1>
        <div id=modal_ad style="height:70%;"></div>
        <div style="    display: inline-block;
    width: 50%;
    margin-top: 0px;
    border-style: solid;
    border-left: none;
    border-top: none;
    border-bottom: none;
    border-right:0.1px;
    height: 49px;
    border-color: #e9e9e9;" onclick="exit_app();"><font style="        position: relative;
    top: 15px;
    color: #696969;">예</font></div>
        <div style="    margin-left: -8px;
    height: 49px;
    display: inline-block;
    width: 50%;" onclick="document.getElementById('modal4').style.display='none';">
          <font style="        position: relative;
    top: 15px;
    color: #696969;">취소</font></div>
      </div>
    </center>
  </div>
  <div id="modal3">
    <div id=modal3TM></div>
    <center>
      <h1 style="color:white;    font-size: 15px;
    font-weight: normal;">앱에서 사용하실 닉네임을 입력해주세요.</h1>
      <div id=modal3Ct>
        <input id=new_nickname type=text style="   background-color: #121212;
    border: none;
    color: white;
    outline: none;
    line-height: 48px;width:70%;">
      <h1 id=nickname_result style="color:#FF495D;font-size:15px;font-weight:normal;"></h1>
    </div>
    <div onclick="newNickname()" style="position: fixed;
    bottom: 0px;
    width: 100%;
    background-color: orange;
    height: 50px;
    color: white;
    line-height: 50px;">확　　인</div>
    </center>
  </div>
  <a href="myApp://goActivity?activity_name=main"></a>
  <div id=modal2 style="display:none" onclick="document.getElementById('modal2').style.display='none'">
    <div id=topMargin></div>
    <center>
      <div id=modalContent>

        <div class=modal_line_title>공지사항</div>
        <center>
          <div id=modal_line_list style="background-color:white;"></div>
        </center>
      </div>
    </center>
  </div>

  <div id=header>
    <div id=header_top></div>
    <div id=header_icon_left>
        <div id=title>긍정의하루</div>
    </div>
    <div id=header_icon_right>
      <img id=icon src="images/iconmonstr-bell-2-64.png" onclick="sendMsg('bell')">
    </div>
    <div id=header_content>
      <a id=button1 class="a_button" href="#page1" data-transition="fade" onclick="active_button(1);current_menu=1;">명언</a><a id=button2 class="a_button" href="#page2" data-transition="fade" onclick="active_button(2);current_menu=2;">좋은글</a><a id=button3 class="a_button" href="#page3" data-transition="fade" onclick="active_button(3);current_menu=3;">나만의명언</a><a id=button4 class="a_button" href="#page4" data-transition="fade" onclick="active_button(4);current_menu=4;">인기추천</a>
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
    <iframe id=pageAd src="pageAdFull.php"></iframe>
  </div>


</body>

</html>
