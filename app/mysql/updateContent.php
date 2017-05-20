<?php
  include("dbconnect.php");

  $no=$_POST['no'];
  $content=$_POST['content'];

  echo $query="UPDATE MeongUnContents SET content='$content' WHERE no=$no";
  mysqli_query($con,$query);
  echo "Suc";
?>
