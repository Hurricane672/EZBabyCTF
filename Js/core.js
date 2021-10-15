function director(val, flag) {
    switch (flag) {
        case 0:
            var re = ["?李在赣神魔，不要瞎搞啊人家会坏掉的qwq", 0];
            return re;
            break;
        case 1:
            var xmlhttp;
            if (val != 0) {
                var uname = "" + val;
            } else {
                flag--;
                var re = ["你叫了个寂寞，重来！", 0];
                return re;
            }
            console.log(uname);
            $.ajax({
                url: "signup.php",
                data: {
                    flag: "1",
                    name: uname
                },
                success: function (response) {

                    if (response == "false") {
                        var re = ["你来晚了，这个用户名已经被注册了哈哈哈哈！", 0];
                        return re;
                    } else {
                        var re = ["哎呦不错呦，我很喜欢这个名字owo", 1];
                        return re;
                    }
                },
                error: function (data) {
                    window.alert("error: 1")
                    return;
                }
            })
            // if (window.XMLHttpRequest) {
            //     xmlhttp = new XMLHttpRequest();
            // } else {
            //     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            // }
            // xmlhttp.onreadystatechange = function () {
            //     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //         if (xmlhttp.responseText == "false") {
            //             var re = ["你来晚了，这个用户名已经被注册了哈哈哈哈！", 0];
            //             return re;
            //         } else {
            //             var re = ["哎呦不错呦，我很喜欢这个名字owo", 1];
            //             return re;
            //         }
            //     } else {
            //         var re = ["哔哔哔——你失联了qwq，快想办法回来，我会想你的！", 0];
            //         return re;
            //     }
            // };
            // xmlhttp.open("GET", "signup.php?flag=1&name=" + uname, true);
            // xmlhttp.send();
            break;
        default:
            break;
    }
}

function Submitname() {

}