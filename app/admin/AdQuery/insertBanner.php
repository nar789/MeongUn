<?php
  include("dbconnect.php");
  $query="INSERT INTO MeongUnAdBanner(no,src,url,odd) VALUES(NULL,'','',0)";
  $result=mysqli_query($con,$query);
?>
