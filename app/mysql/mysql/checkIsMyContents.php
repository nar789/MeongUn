<?php
  include("dbconnect.php");

  $no=$_GET['no'];
  $author=$_GET['author'];

  $query="SELECT * FROM MeongUnContents WHERE no=$no AND author='$author'";

  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo "true";
      return;
    }
  }
  echo "false";
?>
