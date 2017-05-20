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
  <table class="table-fill"><thead><tr><th class="text-left">No</th>
    <th class="text-left">내용</th><th class="text-left">시간</th><th class="text-left"></th></tr><tbody class="table-hover">
      <tr><td class="text-left">NULL</td><td class="text-left"><input type=text id=anoun_text></td>
        <td class="text-left">현재 시간</td><td class="text-left"><span onclick="insert_anoun()">입력</span></td></tr></tbody></table>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<div id=content></div>
	<script>
		window.onload=function(){
			$.get("../mysql/selectAnnounced.php").done(function(data){
				document.getElementById('content').innerHTML=data;
			});
		}
		function delete_user(no){
			$.get("../mysql/deleteAnnounced.php",{no:no}).done(function(data){
				alert("성공적으로 삭제되었습니다.");
				location.reload();
			});
		}
    function insert_anoun(){
      var anoun=document.getElementById('anoun_text').value;
      $.get("../mysql/insertAnnounced.php",{content:anoun}).done(function(data){
        alert("성공적으로 등록되었습니다.");
        location.reload();
      });
    }
	</script>
</body>
