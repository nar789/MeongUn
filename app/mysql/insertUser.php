<?php
  include("dbconnect.php");
  $nickname=$_GET['nickname'];
  $email=$_GET['email'];
  $password=$_GET['password'];

  $coremail=strpos($email,"@");
  if($coremail===false){
    echo "iligal-e-amil";
    return;
  }
  $query="SELECT * FROM MeongUnUser WHERE email='$email'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo "Data Exists";
      return;
    }
    mysqli_free_result($result);
  }
  $query="INSERT INTO MeongUnUser(no,nickname,email,password)
  VALUES(NULL,'$nickname','$email','$password')";
  mysqli_query($con,$query);
  echo "Suc";
?>
