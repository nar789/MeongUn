<?php
  function checkIsMyComment($no,$author){
    include("dbconnect.php");

    $query="SELECT * FROM MeongUnComments WHERE no=$no AND author='$author'";

    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        return true;
        return;
      }
    }
    return false;
  }

?>
