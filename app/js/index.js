
var admin=0;
var isnowad=0;
var current_menu=1;

function active_button(button){
  document.getElementById('button1').style.borderStyle="none";
  document.getElementById('button2').style.borderStyle="none";
  document.getElementById('button3').style.borderStyle="none";
  document.getElementById('button4').style.borderStyle="none";

  document.getElementById('button1').style.backgroundColor="black";
  document.getElementById('button2').style.backgroundColor="black";
  document.getElementById('button3').style.backgroundColor="black";
  document.getElementById('button4').style.backgroundColor="black";
  document.getElementById('button'+button).style.borderStyle="solid";
  document.getElementById('button'+button).style.backgroundColor="#343737";
}
function sendMsg(target){
  if(target=="pencil"){
    // var json='{"title":"data","data":"pencil"}';
    // window.parent.postMessage(json,"*");
  }else if(target=="bell"){
    isnowmodal=1;
    document.getElementById('modal2').style.display="block";
  }else if(target=="magnifier"){
    var json='{"title":"data","data":"magnifier"}';
    window.parent.postMessage(json,"*");
  }
}

function returnCurrentWindow(){
  var json='{"title":"category","category":"'+window.location.href+'"}';
  document.getElementById('pageWritingIframe').contentWindow.postMessage(json,'*');
}

function loadPage(){
  document.getElementById('pageWritingIframe').src="pageWriting.php";
  document.getElementById('pageReadingIframe').src="pageReading.php";
  document.getElementById('pageRAdminIframe').src="pageReadingAdmin.php";
  document.getElementById('pageSampleImageIframe').src="pageSamplePictureList.php";
  document.getElementById('pageAd').src="pageAdFull.php";
}
var post_page='';

window.onload=function(){
  document.getElementById('button1').style.borderStyle="solid";
  document.getElementById('button1').style.backgroundColor="#343737";
  setTimeout(function(){window.parent.postMessage("TOKEN","*");},5000);
  $.get("utills/FullAdModule.php",{flag:1}).done((result)=>{
    document.getElementById('modal_ad').innerHTML=result;
  });
  loadPage();
  $.get("utills/isFirstUser.php",{email:document.getElementById('userId').value}).done((result)=>{
    if(result=="FIRST"){
      document.getElementById('modal3').style.display="block";
    }

  });
  var id=document.getElementById('userId').value;
  if(id==""){
    //alert("웹");
  }else{
    $.get("mysql/insertUser.php?nickname="+id+"&email="+id+"&password="+id)
    .done(function(data){
      //alert(data);
    });
  }

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
function exit_app(){
  var json='exitApp';
  window.parent.postMessage(json,"*");
}
var isnowmodal=0;

window.onmessage=function(e){
  if(e.data=="back"){
    var now_url=window.location.href;
    var back_url;
    if(isnowmodal==1){
      isnowmodal=0;
      document.getElementById('modal4').style.display="none";
      document.getElementById('modal2').style.display="none";
    }else if(now_url.indexOf("#pageReadingAdmin")!=-1){
      document.getElementById('pageRAdminIframe').contentWindow.postMessage("BACK",'*');
      reloadAllData();
    }else if(now_url.indexOf("#pageReading")!=-1){
      document.getElementById('pageReadingIframe').contentWindow.postMessage("BACK",'*');
      reloadAllData()
    }else if(now_url.indexOf("#pageWriting")!=-1){
      $.get("./admin/AdQuery/selectOdd.php",{}).done(function(result){
        var random_num=Math.floor((Math.random()*100)+0);
        if(random_num>result){
          window.location.href="#page"+current_menu;
        }else{
          window.location.href="#pageAdFull";
        }
      });
      reloadAllData();
    }else if(now_url.indexOf("#page1")!=-1||now_url.indexOf("#")==-1){
      isnowmodal=1;
      document.getElementById('modal4').style.display="block";
    }else if(now_url.indexOf("#page2")!=-1||now_url.indexOf("#page3")!=-1||now_url.indexOf("#page4")!=-1){
      isnowmodal=1;
      document.getElementById('modal4').style.display="block";
    }else if(now_url.indexOf("#pageAdFull")!=-1){
      window.location.href="#page"+current_menu;
    }else if(now_url.indexOf("#pageSampleImage")!=-1){
      window.location.href="#pageWriting";
    }
  }else if(e.data=="RELOAD"){
    reloadAllData();
  }else if(e.data=="LOAD"){
    window.parent.postMessage("LOAD","*");
  }else if(e.data=="BACK_WRITING"){
    window.history.back();
  }else if(e.data=="PICTURE"){
    window.location.href="#pageSampleImage";
  }else if(e.data=="WRITING"){
    window.location.href="#pageWriting";
  }else if(e.data=="READINGBACK"){
    $.get("./admin/AdQuery/selectOdd.php",{}).done(function(result){
      var random_num=Math.floor((Math.random()*100)+0);
      if(random_num>result){
        window.location.href="#page"+current_menu;
      }else{
        window.location.href="#pageAdFull";
      }
    });
  }else if(e.data=="EXITLOADING"){
    document.getElementById('loading').style.display="none";
  }else if(e.data=="HISTORY"){
    window.history.back();
  }else if(e.data=="COMMENT_INPUT"){
      // var readIframe=document.getElementById('pageReadingIframe');
      // readIframe.scrollTop=readIframe.scrollHeight;
    // alert(readIframe.scrollTop);
  }else if(e.data.indexOf("&xd_action")!=-1){

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
        //alert("Data Loaded:"+data);
        if(document.getElementById('isadmin').value=='admin'){location.reload();}
        reloadAllData();

        // var json='{"title":"toast","toast":"'+'성공적으로 등록되었습니다.'+'"}';
        // window.parent.postMessage(json,"*");
      });
    }else if(j.title=="READ"){
      $.get("mysql/checkIsMyContents.php",{no:j.no,author:document.getElementById('userId').value})
      .done(function(data){
        document.getElementById('loading').style.display="block";
        if(data=="false"){
          var json='{"no":"'+j.no+'","author":"false","userId":"'+document.getElementById('userId').value+'","admin":"'+admin+'"}';
        }else if(data=="true"){
          var json='{"no":"'+j.no+'","author":"true","admin":"'+admin+'","userId":"'+document.getElementById('userId').value+'"}';
        }
        if(window.location.href.indexOf("#page3")==-1){
          document.getElementById('pageRAdminIframe').contentWindow.postMessage(json,'*');
          window.location.href="#pageReadingAdmin";
        }else{
          document.getElementById('pageReadingIframe').contentWindow.postMessage(json,'*');
          window.location.href="#pageReading";
        }
      });

    }else if(j.title=="comment"){
      var userId=document.getElementById('userId').value;
      $.post("mysql/insertComment.php",{comment:j.comment,no:j.no,author:userId}).done(function(data){
        // alert("Data Loaded:"+data);UPDATECOMMENT
        document.getElementById('pageReadingIframe').contentWindow.postMessage("UPDATECOMMENT",'*');
        document.getElementById('pageRAdminIframe').contentWindow.postMessage("UPDATECOMMENT",'*');
      });
      document.getElementById('pageReadingIframe').contentWindow.postMessage("UPDATECOMMENT",'*');
    }else if(j.title=="deleteContent"){
      $.get("mysql/deleteContent.php",{no:j.no}).done(function(data){
        if(document.getElementById('isadmin').value=='admin'){location.reload();}
        reloadAllData()

        // var json='{"title":"toast","toast":"'+'삭제완료'+'"}';
        // window.parent.postMessage(json,"*");
      });
    }else if(j.title=="updateContent"){
      $.post("mysql/updateContent.php",{no:j.no,content:j.content}).done(function(data){
        if(document.getElementById('isadmin').value=='admin'){location.reload();}
        reloadAllData();
        // var json='{"title":"toast","toast":"'+'수정완료'+'"}';
        // window.parent.postMessage(json,"*");
      });
    }else if(j.title=="toast"){
      // var json='{"title":"toast","toast":"'+j.toast+'"}';
      // window.parent.postMessage(json,"*");
    }else if(j.title=="ad"){
      var json='{"title":"ad","ad":"'+j.ad+'"}';
      window.parent.postMessage(json,"*");
    }else if(j.title=="image_src"){
      var json='{"title":"image_src","image_src":"'+j.image_src+'"}';
      document.getElementById('pageWritingIframe').contentWindow.postMessage(json,'*');
      window.history.back();
    }else if(j.title=="share"){
      var json='{"title":"share","content":"'+j.content+'","back":"'+j.back+'","no":"'+j.no+'"}';
      window.parent.postMessage(json,"*");
      //alert(j.content+j.back+j.no);
    }
  }
}
