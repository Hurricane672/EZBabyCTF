function director(val, flag) {
    switch (flag) {
        case 0:
            var re = ["?李在赣神魔，不要瞎搞啊人家会坏掉的qwq", 0];
            return re;
            break;
        case 1:
            if (val != 0) {
                var uname = "" + val;
            } else {
                flag--;
                var re = ["(•́へ•́ ╬)你叫了个寂寞……这样让人家这么称呼你呀", 0];
                return re;
            }

            $.ajax({
                url: "signup.php",
                type: "GET",
                data: {
                    flag: "1",
                    name: uname
                },
                dataType: "text",
                success: function (response) {
                    console.log(response);
                    if (response == "false") {
                        var re = ["你来晚了，这个用户名已经被注册了哈哈哈哈！", 0];
                        return re;
                    } else {
                        var re = ["(❀｣╹□╹)｣*･我很喜欢这个名字owo一定要记好自己的名字嗷！现在，给自己想一个密码吧w", 1];
                        return re;
                    }
                },
                error: function () {
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
        case 2:
            if (val != 0) {
                var uname = "" + val;
            } else {
                var re = ["你真的是来搞安全的嘛？空密码……这也太不安全了！好好反思下！<(｀^′)>", 1];
                return re;
            }

            break;
        case 3:
            if (val != 0) {
                var uname = "" + val;
            } else {
                var re = ["空空又空空，老调戏人家有什么意思(´•ω•̥`)", 2];
                return re;
            }
            break;
        case 10:
            var re = ["?李在赣神魔，不要瞎搞啊人家会坏掉的qwq", 10];
            return re;
            break;
        case 11:
            if (val != 0) {
                var uname = "" + val;
            } else {
                var re = ["你是故意找茬是不是啊<(｀^′)>", 10];
                return re;
            }
            break;
        case 12:
            if (val != 0) {
                var uname = "" + val;
            } else {
                var re = ["(๑•̌.•̑๑)ˀ̣ˀ̣", 11];
                return re;
            }
            break;
        default:
            break;
    }
}

function submitFlag(submit) {

    $(".pophint").show();
    $(".marsk-container").show();

}


function typing(ipt, time) {
    $(".push").attr("disabled", "disabled");
    autoType(
        "#" + $(ipt).parent().parent().find(".type-js").attr("id"),
        50
    );
    setTimeout(() => {
        $(".push").removeAttr("disabled");
        $(ipt).keypress(function (event) {
            if (
                event.keyCode == 13 &&
                "disabled" != $(ipt).parent().find(".push").attr("disabled")
            ) {
                $(ipt).parent().find(".push").trigger("click");
            }
        });
    }, time);
}