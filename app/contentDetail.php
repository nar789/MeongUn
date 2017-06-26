<?php
  include("mysql/selectContent.php");
  $content=selectContent($_GET['no']);

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
  function contentGenerator($content){
    return $content;
  }
  function backgroundGenerator($img_src){
    return $img_src;
  }
  echo '{"time":"'.timeGenerator($content[1]).'","content":"'.urldecode(contentGenerator($content[3])).'","background":"'.backgroundGenerator($content[2]).'"}';
?>
