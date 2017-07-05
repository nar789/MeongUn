<?php
  function selectExit(){
    include("dbconnect.php");
    $query="SELECT * FROM MeongUnAdExit";
    $AdBannerList=array();
    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        array_push($AdBannerList,$row);
      }
    }
    return $AdBannerList;
  }
?>
