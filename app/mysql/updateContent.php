<?php
  include("dbconnect.php");

  $no=$_POST['no'];
  $content=urlencode($_POST['content']);

  echo $query="UPDATE MeongUnContents SET content='$content' WHERE no=$no";
  mysqli_query($con,$query);
  echo "Suc";
?>
