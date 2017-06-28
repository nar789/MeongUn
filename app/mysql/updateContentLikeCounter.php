<?php
  include("dbconnect.php");

  $no=$_GET['no'];
  if($_GET['flag']==1){
    echo $query="SELECT target_no FROM MeongUnComments WHERE no=$no";
    $target_no=0;
    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        $target_no=$row[0];
      }
    }
    echo $query="UPDATE MeongUnContents SET comment_counter=comment_counter-1 WHERE no=$target_no";
  }
  else{
    echo $query="UPDATE MeongUnContents SET like_counter=like_counter+1 WHERE no=$no";
  }
  mysqli_query($con,$query);
  echo "Suc";

?>
