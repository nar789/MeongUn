<?php
  include("dbconnect.php");

  $src=$_GET['src'];
  $url=$_GET['url'];

  echo $query="INSERT INTO MeongUnRecommendApp(no,src,url) VALUES(NULL,'$src','$url')";
  mysqli_query($con,$query);
?>
