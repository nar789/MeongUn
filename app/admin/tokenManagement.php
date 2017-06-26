<?php
  include("AdQuery/dbconnect.php");
  $token=$_GET['token'];
  $phone=$_GET['phone'];

  $update_check=0;

  $query="SELECT * FROM MeongUnAppToken WHERE phone='$phone'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      $update_check=1;
    }
  }
  if($update_check==0){
    $query="INSERT MeongUnAppToken(no,token,phone) VALUES(NULL,'$token','$phone')";
    $result=mysqli_query($con,$query);
  }else{
    $query="UPDATE MeongUnAppToken SET token='$token' WHERE phone='$phone'";
    $result=mysqli_query($con,$query);
  }

?>
