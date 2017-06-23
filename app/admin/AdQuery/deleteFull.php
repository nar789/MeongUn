<?php
  include("dbconnect.php");
  $no=$_GET['no'];
  $query="DELETE FROM MeongUnAdFull WHERE no=$no";
  $result=mysqli_query($con,$query);
?>
