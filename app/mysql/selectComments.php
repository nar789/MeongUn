<?php
  include("dbconnect.php");
  //$target_no=$_GET['target_no'];
  $query="SELECT * FROM MeongUnComments WHERE target_no=$target_no ORDER BY no DESC";

  $MeongUnComments=array();

  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($MeongUnComments,$row);
    }
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
  function timeGenerator($time){
    $contentDateList=preg_split("/(-|:|\s)/",$time);
    $today=date("Y-m-d H:i:s");
    $todayDateList=preg_split("/(-|:|\s)/",$today);

    $result="곧 전";
    $iter_date_array=array(4,3,2,1,0);
    $iter_dateString_array=array("년 전","개월 전","일 전","시간 전","분 전");
    foreach($iter_date_array as $v){
      if($contentDateList[$v]<$todayDateList[$v]){
        $result=$todayDateList[$v]-$contentDateList[$v].$iter_dateString_array[$v];
      }
    }
    return $result;
  }
  function commentListGenerator($commentList,$author,$admin){
    include("checkIsMyComment.php");

    foreach($commentList as $v){
      $del="";
      if(checkIsMyComment($v[0],$author)||$admin=='1'){
        $del="<font id=del onclick='deleteComment(\"".$v[0]."\")'>삭제하기</font>";
      }
      echo "<div id=comment>
        <div id=comment_left>
          <center id=comment_profile_container>
            <img id=comment_profile src='images/user.png'>
          </center>
        </div>
        <div id=comment_right>
          <div class=clear>
            <div id=comment_name>".selectNameByEmail($v[2])[0]."<font id=comment_post_time>".timeGenerator($v[4])."</font>$del</div>
            <div id=comment_content>".$v[1]."</div>
          </div>
        </div>
      </div>";
    }
  }
?>
