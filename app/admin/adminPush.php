<html>
  <label>내용</label>
  <input id=content type="text" style="width:200px;font-size:20px;">
  <button onclick="reqPush();">푸쉬하기</button>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script>
  function reqPush(){
    $.get("cloudMessaging.php",{message:document.getElementById('content').value}).done(()=>{

    });
  }
  </script>
</html>
