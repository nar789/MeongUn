<?php
  include("dbconnect.php");
  $query="SELECT * FROM MeongUnAdOdd WHERE no=0";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo $row[1];
    }
  }
?>
