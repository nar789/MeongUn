<?php
  include("dbconnect.php");

  $query="SELECT * FROM MeongUnRecommendApp";

  $MeongUnRecommendApp=array();

  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($MeongUnRecommendApp,$row);
    }
  }
  function selectRecommendApp($imageList){
    echo '<table class="table-fill"><thead><tr><th class="text-left">No</th>
    <th class="text-left">Image</th><th class="text-left">URL</th><th class="text-left">제목</th><th class="text-left">내용</th><th class="text-left">삭제</th></tr><tbody class="table-hover">';
    foreach($imageList as $v){
        echo '<tr><td class="text-left">'.$v[0].'</td><td class="text-left"><img src="../recommend_app_icon/'.$v[1].'"></td>
        <td class="text-left">'.$v[2].'</td><td class="text-left">'.$v[3].'</td><td class="text-left">'.$v[4].'</td><td><span onclick="delete_user('.$v[0].')">삭제</span></td></tr>';

    }
    echo '</tbody></table>';
  }
  function selectListRecommendApp($imageList){
    foreach($imageList as $v){
      echo '<div class=line onclick="loadAd(\''.$v[2].'\')">
        <div class=line_box_img>
          <img class=line_img src="recommend_app_icon/'.$v[1].'">
        </div>
        <div class=line_detail>
          <h1 class="line_detail_top">'.$v[3].'</h1>
          <h1 class="line_detail_detail">'.$v[4].'</h1>
        </div>
      </div>';
    }
  }
  if($_GET['type']=='admin'){
    selectRecommendApp($MeongUnRecommendApp);
  }else{
    selectListRecommendApp($MeongUnRecommendApp);
  }


?>
