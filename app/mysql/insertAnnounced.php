<?php
  include("dbconnect.php");

  echo $content=$_GET['content'];
  $today=date("Y-m-d H:i:s");

  echo $query="INSERT INTO MeongUnAnnounced(no,content,date)
  VALUES(NULL,'$content','$today')";
  mysqli_query($con,$query);
  echo "Suc";
?>
