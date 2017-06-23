<?php
  function FullAd(){
    include("./mysql/dbconnect.php");
    $query="SELECT * FROM MeongUnAdFull";

    $totalOdd=0;
    $adArray=array();
    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        array_push($adArray,$row);
        $totalOdd=$totalOdd+$row[3];
      }
    }
    //echo $totalOdd;
    $rand_ad_index=rand(0,$totalOdd);
    $ad_src;
    $ad_url;

    foreach($adArray as $v){
      $totalOdd=$totalOdd-$v[3];
      if($rand_ad_index>=$totalOdd){
        $ad_src=$v[1];
        $ad_url=$v[2];
        break;
      }
    }
    echo "<div style='position:absolute;left:0px;top:0px;'>
    <img src='./images/iconmonstr-x-mark-4-120.png' style='    position: fixed;
    right: 10px;top: 10px;opacity: 0.7;width: 80px;' onclick='window.parent.postMessage(\"HISTORY\",\"*\");'>";
    echo "<img src='./admin/$ad_src' onclick='move_url(\"$ad_url\")' style='width:100%;height:100%;'>";
    echo "</div>";
  }
  function FullAdScript(){
    echo "<script>window.parent.postMessage(\"AD\",\"*\");</script>";
  }
  //
  //   include("utills/FullAdModule.php");
  //   FullAdScript();
  //
?>
