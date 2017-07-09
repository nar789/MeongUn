<?php
  function selectContentsLimit($target_no,$limit,$count,$by){
    include("dbconnect.php");
    $query="SELECT * FROM MeongUnContents WHERE category=$target_no ORDER BY $by DESC LIMIT $limit,$count";

    $MeongUnContents=array();

    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        array_push($MeongUnContents,$row);
      }
    }
    return $MeongUnContents;

  }
  function selectContentsByCategory($category){
    include("dbconnect.php");
    $query="SELECT * FROM MeongUnContents WHERE category=$category ORDER BY no DESC";

    $MeongUnContents=array();

    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        array_push($MeongUnContents,$row);
      }
    }
    return $MeongUnContents;
  }

  function selectNameByEmail($email){
    include("dbconnect.php");
    $query="SELECT nickname FROM MeongUnUser WHERE email='$email'";
    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        return $row;
      }
    }
  }
?>
