<?php
  include("dbconnect.php");

  $content=$_GET['content'];
  $today=date("Y-m-d H:i:s");

  $query="INSERT INTO MeongUnAnnounced(no,content,date)
  VALUES(NULL,'$content','$today')";
  mysqli_query($con,$query);
  echo "Suc";
?>
