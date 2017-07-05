<?php
  include("../mysql/dbconnect.php");
  $query="SELECT * FROM MeongUnAdExit";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo "<div style='height:100%;'>";
      echo "<img src='./admin/".$row[1]."' onclick='move_url(\"".$row[2]."\")' style='width:100%;height:100%;'>";
      echo "</div>";
    }
  }

?>
