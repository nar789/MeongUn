<?php
  include("utills/FullAdModule.php");
  FullAd();
?>
<script>
  function move_url(url){
    var json='{"title":"ad","ad":"'+url+'"}';
    window.parent.postMessage(json,"*");
    window.parent.postMessage("back","*");
  }
  window.onmessage=function(e){
    if(e.data=="RESET"){
      location.reload();
    }
  }
</script>
