<?php
  include("dbconnect.php");
  $query="INSERT INTO MeongUnAdFull(no,src,url,odd) VALUES(NULL,'','',0)";
  $result=mysqli_query($con,$query);
?>
