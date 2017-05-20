<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Table Style</title>
  <link rel="stylesheet" href="css/datatable.css">
</head>

<body>
	<div class="table-title">
		<h3>Data Table</h3>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Custom File Uploader  -->
  <center>
    <img class=img id=img1 align=middle>
    <form name="upload-form" action="upload2.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="25242880"/>
      <input type="file" name="upload" id="upload"/>
      <input type="hidden" name="no" value="1"/>
			<input type=text name="url" placeholder="URL을 입력하세요."/>
			<input type=text name="title" placeholder="앱 제목을 입력하세요."/>
			<input type=text name="detail" placeholder="앱 설명을 입력하세요."/>
      <input type=submit value='이미지업로드' class=btn>
    </form>
  </center>
	<div id=content>

  </div>
	<script>
		window.onload=function(){
			$.get("../mysql/selectRecommentApp.php?type=admin").done(function(data){
				document.getElementById('content').innerHTML=data;
			});
		}
		function delete_user(no){
			$.get("../mysql/deleteRecommendApp.php",{no:no}).done(function(data){
				alert("성공적으로 삭제되었습니다.");
				location.reload();
			});
		}
	</script>
</body>
