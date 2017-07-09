<?php
  include("dbconnect.php");

  $no=$_GET['no'];

  echo $query="UPDATE MeongUnContents SET like_counter=like_counter+1 WHERE no=$no";
  mysqli_query($con,$query);
  echo "Suc";

?>
