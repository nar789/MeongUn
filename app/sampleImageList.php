<?php
  include("mysql/selectSampleImages.php");
  $path="sample_images/";
  foreach($MeongUnSampleImages as $v){
    echo "<div id=image_container onclick='sendMsg(\"".$path.$v[1]."\")'><img id=image".$v[0]." class=image src='".$path."thumb-".$v[1]."'></div>";
  }
?>
