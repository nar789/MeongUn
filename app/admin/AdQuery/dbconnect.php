<?php
  $host="localhost";
  $username="ace0909";
  $password="top41567720";
  $dbname="ace0909";

  $con=mysqli_connect($host,$username,$password,$dbname);
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
