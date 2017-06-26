<?php
  function contentListGenerator($category,$limit,$addSQL="no"){
    include("mysql/selectContents.php");
    $MeongUnContents=selectContentsLimit($category,$limit,8,$addSQL);
    foreach($MeongUnContents as $v){
      if($category==1||$category==2){
        echo "<div id=item onclick=\"sendMsg('READ','".$v[0]."')\">
          <img id=content_image src='".str_replace('/','/thumb-',$v[2])."'>
          <div id=content_title>
            <center>
            <font id=content_title_detail>
            ".urldecode($v[8])."</font>
            </center>
          </div>
          <div id=content_detail>
            <div id=fifty>
              <center>
                <img id=like src='images/iconmonstr-facebook-like-1-64.png'>
                <br><font id=like_detail>".$v[4]."</font>
              </center>
            </div>
            <div id=fifty>
              <center>
                <img id=like src='images/iconmonstr-speech-bubble-2-64.png'>
                <br><font id=like_detail>".$v[5]."</font>
              </center>
            </div>
          </div><div id=sample_text><div style=\"font-family: 'Nanum Pen Script', serif;\">".urldecode($v[8])."</div></div>
        </div>";
      }else if($category==3){
        echo "<div id=item onclick=\"sendMsg('READ','".$v[0]."')\">
          <img id=content_image src='".str_replace('/','/thumb-',$v[2])."'>
          <div id=content_detail>
            <div id=fifty>
              <center>
                <img id=like src='images/iconmonstr-facebook-like-1-64.png'>
                <br><font id=like_detail>".$v[4]."</font>
              </center>
            </div>
            <div id=fifty>
              <center>
                <img id=like src='images/iconmonstr-speech-bubble-2-64.png'>
                <br><font id=like_detail>".$v[5]."</font>
              </center>
            </div>
          </div>
          <div id=sample_text><div style=\"font-family: 'Nanum Pen Script', serif;\">".mb_substr(urldecode($v[3]),0,6)."</div></div>
        </div>";
      }

    }
  }
  $category=$_GET['category'];
  $limit=0+$_GET['limit']*8;
  $type=$_GET['type'];
  contentListGenerator($category,$limit,$type);


?>
