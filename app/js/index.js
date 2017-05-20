var admin=0;
function sendMsg(target){
  if(target=="pencil"){
    // var json='{"title":"data","data":"pencil"}';
    // window.parent.postMessage(json,"*");
  }else if(target=="bell"){
    document.getElementById('modal2').style.display="block";
  }else if(target=="magnifier"){
    var json='{"title":"data","data":"magnifier"}';
    window.parent.postMessage(json,"*");
  }
}
window.onload=function(){
  if(document.getElementById('isadmin').value=='admin'){
    admin=1;
  }
  $.get("mysql/selectAnnounced.php",{type:'list'}).done(function(data){
    document.getElementById('modal_line_list').innerHTML=data;
  });
}
function reloadAllData(){
  document.getElementById('pageOneIframe').contentWindow.postMessage("RELOAD",'*');
  document.getElementById('pageTwoIframe').contentWindow.postMessage("RELOAD",'*');
  document.getElementById('pageThreeIframe').contentWindow.postMessage("RELOAD",'*');
}
window.onmessage=function(e){
  if(e.data=="BACK"){
    window.location.href="#page1";
  }else if(e.data=="BACK_WRITING"){
    window.history.back();
  }else if(e.data=="PICTURE"){
    window.location.href="#pageSampleImage";
  }else if(e.data=="CAMERA"){
  //alert("camear");
  }else if(e.data=="COMMENT_INPUT"){
    // var readIframe=document.getElementById('pageReadingIframe');
    // readIframe.scrollTop=readIframe.scrollHeight;
    // alert(readIframe.scrollTop);
  }else{
    var j=JSON.parse(e.data);
    if(j.title=="login"){
      $.get("mysql/insertUser.php?nickname="+j.nickname+"&email="+j.email+"&password="+j.password)
      .done(function(data){
        if(data=="Suc"){
          alert("회원가입 완료");
          document.getElementById('modal').style.display="none";
          var json='{"title":"signUp","signUp":"'+j.email+'"}';
          window.parent.postMessage(json,"*");
          location.replace("http://total0808.cafe24.com/meong-un/app/index.php?&login=old&id="+j.email);
        }else if(data=="Data Exists"){
          alert("중복된 아이디 입니다.");
        }else if(data=="iligal-e-amil"){
          alert("올바른 이메일 입력해주세요.");
        }
      });
    }else if(j.title=="exit"){
      var json='exitApp';
      window.parent.postMessage(json,"*");
    }else if(j.title=="writing"){
      $.post("mysql/insertContent.php",{img_src:j.image,content:j.content,author:document.getElementById('userId').value,category:j.category})
      .done(function(data){
        // alert("Data Loaded:"+data);
        if(document.getElementById('isadmin').value=='admin'){location.reload();}
        reloadAllData();

        var json='{"title":"toast","toast":"'+'성공적으로 등록되었습니다.'+'"}';
        window.parent.postMessage(json,"*");
        //alert(json);
      });
    }else if(j.title=="READ"){
      $.get("mysql/checkIsMyContents.php",{no:j.no,author:document.getElementById('userId').value})
      .done(function(data){
        if(data=="false"){
          var json='{"no":"'+j.no+'","author":"false","userId":"'+document.getElementById('userId').value+'","admin":"'+admin+'"}';
        }else if(data=="true"){
          var json='{"no":"'+j.no+'","author":"true","admin":"'+admin+'"}';
        }
        document.getElementById('pageReadingIframe').contentWindow.postMessage(json,'*');
        window.location.href="#pageReading";
      });

    }else if(j.title=="comment"){
      var userId=document.getElementById('userId').value;
      $.post("mysql/insertComment.php",{comment:j.comment,no:j.no,author:userId}).done(function(data){
        // alert("Data Loaded:"+data);
      });
      document.getElementById('pageReadingIframe').contentWindow.postMessage("UPDATECOMMENT",'*');
    }else if(j.title=="deleteContent"){
      $.get("mysql/deleteContent.php",{no:j.no}).done(function(data){
        if(document.getElementById('isadmin').value=='admin'){location.reload();}
        reloadAllData()

        var json='{"title":"toast","toast":"'+'삭제완료'+'"}';
        window.parent.postMessage(json,"*");
      });
    }else if(j.title=="updateContent"){
      $.post("mysql/updateContent.php",{no:j.no,content:j.content}).done(function(data){
        if(document.getElementById('isadmin').value=='admin'){location.reload();}
        reloadAllData();
        var json='{"title":"toast","toast":"'+'수정완료'+'"}';
        window.parent.postMessage(json,"*");
      });
    }else if(j.title=="toast"){
      var json='{"title":"toast","toast":"'+j.toast+'"}';
      window.parent.postMessage(json,"*");
    }else if(j.title=="ad"){
      var json='{"title":"ad","ad":"'+j.ad+'"}';
      window.parent.postMessage(json,"*");
    }else if(j.title=="image_src"){
      var json='{"title":"image_src","image_src":"'+j.image_src+'"}';
      document.getElementById('pageWritingIframe').contentWindow.postMessage(json,'*');
      window.history.back();
    }
  }
}
