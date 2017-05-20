<?php
  function selectContent($no){
    include("dbconnect.php");
    $query="SELECT * FROM MeongUnContents WHERE no=$no";

    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        return $row;
      }
    }
  }
?>
