
<body>
  <?php
    include("mysql/selectContent.php");
    $contents=selectContent($_GET['no']);
    $imgsrc=explode("/",$contents[2]);
    $imgsrc=$imgsrc[0]."/thumb-".$imgsrc[1];
    echo "<img src='".$imgsrc."'>";
    echo "<div>".urldecode($contents[3])."</div>";
  ?>
<script>
  window.onload=function(){
    window.open('meongun://', '_system');
    document.body.innerHTML="";
  }
</script>
</body>
