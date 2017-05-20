<html>
<head>
  <style>
    body{
      background-color:black;
    }
    #header{
      width:100%;
      height:60px;
      position:fixed;
      top:0px;
      left:0px;
    }
    #header_margin{
      width:100%;
      height:60px;
    }
    #content{
      width:100%;
      height:auto;
    }
    #image_container{
      width:24%;
      margin:0.5%;
      display:inline-block;
      background-color:white;
      float:left;
      height:100px;
      border-radius:5px;
    }
    .image{
      width:96%;
      height: 97%;
      padding:2%;
      border-radius:5px;
    }
    .icon{
      position:relative;
      top:20px;
      left:10px;
    }
  </style>
  <script>
    function sendMsg(msg){
      if(msg=="BACK_WRITING"){
        window.parent.postMessage(msg,"*");
      }else{
        var json_data='{"title":"image_src","image_src":"'+msg+'"}';
        window.parent.postMessage(json_data,"*");
      }
    }
  </script>
</head>
<body>
  <div id=header>
    <img class=icon onclick="sendMsg('BACK_WRITING')" id=back width="24px" height="24px" src="images/iconmonstr-arrow-64-48.png">
  </div>
  <div id=header_margin></div>
  <div id=content>
    <?php include("sampleImageList.php");?>
    <!-- <div id=image_container><img id=image src="sample_images/thumb-pexels-photo-115045.jpeg"></div>
    <div id=image_container></div>
    <div id=image_container></div>
    <div id=image_container></div>
    <div id=image_container></div>
    <div id=image_container></div>
    <div id=image_container></div>
    <div id=image_container></div> -->
  </div>
</body>
</html>
