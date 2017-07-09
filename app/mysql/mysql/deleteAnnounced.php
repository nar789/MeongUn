<?php
  include("dbconnect.php");

  $no=$_GET['no'];

  echo $query="DELETE FROM MeongUnAnnounced WHERE no=$no";
  mysqli_query($con,$query);
  echo "Suc";
?>
