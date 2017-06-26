<?php
include("../mysql/dbconnect.php");
$email=$_GET['email'];
$query="SELECT * FROM MeongUnUser WHERE email='$email'";
if($result=mysqli_query($con,$query)){
  while($row=mysqli_fetch_row($result)){
    if($row[1]==$row[2]&&$row[1]!=""){
      echo "FIRST";
    }
  }
}

?>
