<?php
  include("dbconnect.php");

  $query="SELECT * FROM MeongUnSampleImages";

  $MeongUnSampleImages=array();

  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($MeongUnSampleImages,$row);
    }
  }
  function selectRandomImage($imageList){
    $random=rand(0,count($imageList)-1);

    return $imageList[$random][1];
  }
  function selectAdminListImage($imageList){
    echo '<table class="table-fill"><thead><tr><th class="text-left">No</th>
    <th class="text-left">Image</th><th class="text-left">삭제</th></tr><tbody class="table-hover">';
    foreach($imageList as $v){
        echo '<tr><td class="text-left">'.$v[0].'</td><td class="text-left"><img src="../sample_images/thumb-'.$v[1].'"></td><td>
          <span onclick="delete_user('.$v[0].')">삭제</span></td></tr>';

    }
    echo '</tbody></table>';
  }
  if($_GET['type']=='admin'){
    selectAdminListImage($MeongUnSampleImages);
  }
?>
