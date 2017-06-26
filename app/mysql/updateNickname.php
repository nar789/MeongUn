<?php
  include("dbconnect.php");

  $no=$_GET['no'];
  $nickname=$_GET['nickname'];

  echo $query="UPDATE MeongUnUser SET nickname='$nickname' WHERE email='$no'";
  mysqli_query($con,$query);
  echo "Suc";

?>
