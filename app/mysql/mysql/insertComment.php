<?php
  include("dbconnect.php");

  $comment=$_POST['comment'];
  $no=$_POST['no'];
  $author=$_POST['author'];
  $today=date("Y-m-d H:i:s");

  echo $query="INSERT INTO MeongUnComments(no,comment,author,target_no,date)
  VALUES(NULL,'$comment','$author',$no,'$today')";
  mysqli_query($con,$query);
  echo "Suc";

  echo $query="UPDATE MeongUnContents SET comment_counter=comment_counter+1 WHERE no=$no";
  mysqli_query($con,$query);
  echo "Suc";
?>
