<?php
  include("dbconnect.php");
  $name=$_GET['name'];

  echo $query="INSERT INTO MeongUnSampleImages(no,path)
  VALUES(NULL,'$name')";
  mysqli_query($con,$query);
  echo "Suc";
?>
