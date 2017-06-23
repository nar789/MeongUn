<?php
  function selectBannerCount(){
    include("dbconnect.php");
    $query="SELECT * FROM MeongUnAdFull";
    $AdBannerList=array();
    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        array_push($AdBannerList,$row);
      }
    }
    return $AdBannerList;
  }
?>
