<?php
  $host="localhost";
  $username="total0808";
  $password="top41567720";
  $dbname="total0808";

  $con=mysqli_connect($host,$username,$password,$dbname);
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
