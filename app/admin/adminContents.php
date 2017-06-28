<html>
<style>
*{
  margin:10px;
}
</style>
<body>
  <a href="#" onclick="window.open('http://total0808.cafe24.com/meong-un/app/?id=관리자@meongun.co.kr&admin=admin')" style="    color: white;
    outline: none;
    border: none;
    font-size: 20px;
    padding: 20px;
    background-color: #1b1e24;
    text-decoration: none;">관리자 계정 이동</a>
  <div style="margin-top: 50px;">
    <h1>JPG,JPEG 확장자 파일만 가능 이미지 용량 3M이하 권장</h1>
    <form id=upload_form name="upload-form" action="uploadContent.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="25242880"/>
      <input type="file" name="upload" id="upload"/></br>
      <label>게시판</label>
      <select id=category name="category" style="font-size:20px">
        <option value="1">명언</option>
        <option value="2">좋은글</option>
      </select></br>
      <label>제목</label>
      <input id=title type="text" name="title" placeholder="제목을 입력해주세요." style="font-size:20px;width:300px;"></input>
      </br><label>내용</label>
      <textarea id=content name="content" style="width:300px;height:500px;"></textarea></br>
      <input type=submit value="이미지업로드" onclick="document.getElementById('content').value=document.getElementById('content').value.replace('\n','<br>');alert(document.getElementById('content').value)"style="width:350px;height:50px;">
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    function createContent(){
      var category=document.getElementById('category').value;

      var title=document.getElementById('title').value;
      var content=document.getElementById('content').value;
      //$.post("../mysql/insertContent.php",{img_src:})
    }
    window.onload=function(){

    }
  </script>
</body>
</html>
