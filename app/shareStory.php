<?php
   $ch = curl_init("https://kapi.kakao.com/v1/api/story/post/note");
   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"));
   curl_setopt($ch, CURLOPT_POSTFIELDS, array("content=hifags"));
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $postResult = curl_exec($ch);
   curl_close($ch);
   print "$postResult";
?>
