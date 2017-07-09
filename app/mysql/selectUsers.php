<?php
  include("dbconnect.php");
  //$target_no=$_GET['target_no'];
  $query="SELECT * FROM MeongUnUser";

  $MeongUnUser=array();

  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($MeongUnUser,$row);
    }
  }

  function userTableGenerator($muu){
    echo '<table class="table-fill"><thead><tr><th class="text-left">No</th>
    <th class="text-left">Nickname</th><th class="text-left">Email</th><th class="text-left">삭제</th></tr><tbody class="table-hover>"';
    foreach($muu as $v){
      echo '<tr><td class="text-left">'.$v[0].'</td><td class="text-left">'.$v[1].'</td>
      <td class="text-left">'.$v[2].'</td><td class="text-left"><span onclick="delete_user('.$v[0].')">삭제</span></td></tr>';
    }
    echo '</tbody></table>';
  }
  userTableGenerator($MeongUnUser);
?>
