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
	<div id=content></div>
	<script>
		window.onload=function(){
			$.get("../mysql/selectUsers.php").done(function(data){
				document.getElementById('content').innerHTML=data;
			});
		}
		function delete_user(no){
			$.get("../mysql/deleteUser.php",{no:no}).done(function(data){
				alert("성공적으로 삭제되었습니다.");
				location.reload();
			});
		}
	</script>
</body>
