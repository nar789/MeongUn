<?php
  include("AdQuery/dbconnect.php");
  $token=$_POST['token'];
  $phone=$_POST['phone'];

  $update_check=0;

  echo $query="SELECT * FROM MeongUnAppToken WHERE phone='$phone'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      $update_check=1;
    }
  }
  if($update_check==0){
    echo $query="INSERT MeongUnAppToken(no,token,phone) VALUES(NULL,'$token','$phone')";
    $result=mysqli_query($con,$query);
  }else{
    echo $query="UPDATE MeongUnAppToken SET token='$token' WHERE phone='$phone'";
    $result=mysqli_query($con,$query);
  }

?>
