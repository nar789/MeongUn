<html>
  <header>
    <style>
      @import url(//fonts.googleapis.com/earlyaccess/jejugothic.css);
      *{
        font-family: 'Jeju Gothic', sans-serif;
        padding:0px;margin:0px;
        font-weight:initial;
      }
      h1,h2{
        font-size:20px;
        margin-top:10px;
      }
      #header{
        width:100%;
        height:50px;
        text-align:center;
        position:fixed;
        background-color:#1a1a1a;
        z-index:10;
        color:#f9f9f9;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }
      #content{
        width:100%;
        position:absolute;
        top:50px;
      }
      .input_liner{
        width:80%;
        border:solid 1px;
        border-top:none;
        border-left:none;
        border-right:none;
        border-bottom-color:#bebebe;
        height:30px;
        font-size:25px;
        margin:5px;
        outline:none;
      }
      #input_liner:focus{
        outline:none;
        border-bottom-style:border;
        border-bottom-color:#80cbc4;

      }
      ::-webkit-input-placeholder { font-size:10px;color:#181818; }
      ::-moz-placeholder { font-size:10px;color:#181818; } /* firefox 19+ */
      :-ms-input-placeholder { font-size:10px;color:#181818; } /* ie */
      input:-moz-placeholder { font-size:10px;color:#181818; }
      #_button{
        width:42%;
        height:40px;
        background-color:#787878;
        color:#f6f6f6;
        text-align:center;
        display:inline-block;
        border-radius:5px;
      }
      #button_box{
        position:relative;
        top:10px;
      }
    </style>
    <script>
      function sendMsg(data){
        if(data=="login"){
          let nickname=document.getElementById('nickname').value;
          let email=document.getElementById('email').value;
          let password=document.getElementById('password').value;
          var json='{"title":"login","nickname":"'+nickname+'","email":"'+email+'","password":"'+password+'"}';
          window.parent.postMessage(json,"*");
        }else if(data=="exit"){
          var json='{"title":"exit","exit":"exit"}';
          window.parent.postMessage(json,"*");
        }
      }
    </script>
  </header>
  <body>
    <div id=header>
      <h1 style="margin-top:15px;">회원가입</h1>
    </div>
    <div id=content>
      <center>
        <input id=nickname class=input_liner type="text" placeholder="닉네임">
        <input id=email class=input_liner type="text" placeholder="이메일">
        <input id=password class=input_liner type="text" placeholder="패스워드">
        <div id=button_box>
          <div id=_button onclick="sendMsg('login')"><h2>로그인</h2></div><!---->
          &nbsp;&nbsp;<!--
          --><div id=_button onclick="sendMsg('exit')"><h2>앱 종료</h2></div>
        </div>
      </center>
    </div>
  </body>
</html>
