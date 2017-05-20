<?php
  $target_no=$_GET['target_no'];
  $author=$_GET['author'];
  $admin=$_GET['admin'];
  include("mysql/selectComments.php");
  commentListGenerator($MeongUnComments,$author,$admin);
?>
