 import jQuery from "./jQuery"

 function SubmitCheck() {

 }

 function Submitname() {
     var xmlhttp;
     var uname = $("#Uname").val();
     console.log(uname);
     var P2 = $(".SignupP");
     if (window.XMLHttpRequest) {
         xmlhttp = new XMLHttpRequest();
     } else {
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange = function () {
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             if (xmlhttp.response == true)
                 return true;
             else {
                 var at = document.createElement("div");
                 at.innerText = "用户名已被注册";
                 P2.append(at);
                 return false;
             }
         }
     }
     xmlhttp.open("GET", "signup.php?flag=1&" + uname, true);
     xmlhttp.
     xmlhttp.send("flag=1" + uname);
 }