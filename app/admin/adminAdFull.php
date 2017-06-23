<html>
  <style>
    #content{
      border:1px solid black;
      margin:10px;
      width:300px;
    }
    img{
      width:300px;
    }
  </style>
<body>
  <button onclick="createBanner()">새 광고 생성</button>
  <?php
    include("AdQuery/selectCountAdFull.php");
    $bannerList=selectBannerCount();
    foreach($bannerList as $v){
      echo '<h1>AD no.'.$v[0].'</h1>';
      echo '<div id=content><div></div><img src="'.$v[1].'">';
      echo '<form name="upload-form" action="uploadFull.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="25242880"/>
        <input type="file" name="upload" id="upload"/>
        <input type="hidden" name="no" value="'.$v[0].'"/>
        <input type=submit value="이미지업로드" class=btn>
      </form>';
      echo '<input id=url'.$v[0].' type="text" value='.$v[2].'><button onclick="updateURL('.$v[0].')">URL등록</button>';
      echo '<input id=odd'.$v[0].' type="text" value='.$v[3].'><button onclick="updateOdd('.$v[0].')">확률등록</button>';
      echo '<button onclick="deleteBanner('.$v[0].')">광고 삭제</button></div>';
    }
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function updateURL(no){
    $.get("./AdQuery/updateAdFullURL.php",{url:document.getElementById('url'+no).value,no:no}).done(function(){
      location.reload();
    });
  }
  function createBanner(){
    $.get("./AdQuery/insertFull.php",{}).done(function(){
      location.reload();
    });
  }
  function deleteBanner(no){
    $.get("./AdQuery/deleteFull.php",{no:no}).done(function(){
      location.reload();
    });
  }
  function updateOdd(no){
    $.get("./AdQuery/updateOddFull.php",{odd:document.getElementById('odd'+no).value,no:no}).done(function(){
      location.reload();
    });
  }
</script>
</body>
</html>
