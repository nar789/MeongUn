<?php
  include("dbconnect.php");

  $today=date("Y-m-d H:i:s");
  $img_src=$_POST['img_src'];
  $content=$_POST['content'];
  $author=$_POST['author'];
  $category=$_POST['category'];

  echo "CATEGORY:::::".$category.":::::::::::::";

  echo $query="INSERT INTO MeongUnContents(no,date,img_src,content,like_counter,comment_counter,author,category,title)
  VALUES(NULL,'$today','$img_src','$content',0,0,'$author','$category','')";
  mysqli_query($con,$query);
  echo "Suc";
?>
