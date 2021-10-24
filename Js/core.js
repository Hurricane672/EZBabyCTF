var nam = "";
var passwd = "";
var passwdn = "";
function director(val, flag, re) {
    switch (flag) {
        case 0:
            re.content = "?李在赣神魔，不要瞎搞啊人家会坏掉的qwq";
            re.flag = 0;
            return;
            break;
        case 1:
            if (val != 0) {
                var uname = "" + val;
            } else {
                re.content = "(•́へ•́ ╬)你叫了个寂寞……这样让人家这么称呼你呀";
                re.flag = 0;
                return;
            }
            $.ajax({
                url: "signup.php",
                type: "GET",
                async: false,
                data: {
                    flag: "1",
                    name: uname
                },
                dataType: "text",
                success: function (response) {
                    console.log(response);
                    if (response == "false") {
                        re.content = "你来晚了，这个用户名已经被注册了哈哈哈哈！";
                        re.flag = 0;
                        return;

                    } else {
                        nam = uname;
                        re.content = uname + "……(❀｣╹□╹)｣*･我很喜欢这个名字owo一定要记好自己的名字嗷！现在，给自己想一个密码吧w";
                        re.flag = 1;
                        return;
                    }
                },
                error: function () {
                    window.alert("error: 1")
                    return;
                }
            })
            break;
        case 2:
            if (val != 0) {
                var upsswd = "" + val;
            } else {
                re.content = "你真的是来搞安全的嘛？空密码……这也太不安全了！好好反思下！<(｀^′)>";
                re.flag = 1;
                return;
            }
            var circle = ""
            for (let i = 0; i < val.length; i++) {
                circle += "*";
            }
            passwd = hex_md5(upsswd);
            re.content = circle + " 嗯……我眼睛花了？看不清楚qwq不如你再输一遍？";
            re.flag = 2;
            return;
            break;
        case 3:
            if (val != 0) {
                var upasswd2 = "" + val;
            } else {
                re.content = "空空又空空，老调戏人家有什么意思(´•ω•̥`)";
                re.flag = 2;
                return;
            }
            if (hex_md5(upasswd2) == passwd) {
                $.ajax({
                    url: "signup.php",
                    type: "GET",
                    async: false,
                    data: {
                        name: nam,
                        password: passwd
                    },
                    success: function (response) {
                        console.log(response);
                        re.content = "诶嘿嘿，这次我记清了，你也要记好你的用户名和密码哦！随便回我什么然后咱们就重新来过吧，不过这次我就认识你了w";
                        re.flag = 3;
                        return;
                    },
                    error: function () {
                        window.alert("error: 1")
                        return;
                    }
                })

            } else {
                re.content = "咋回事儿？我记得你写的好像不是这个？";
                re.flag = 2;
                return;
            }
            break;
        case 4:
            window.location.reload();
        case 10:
            re.content = "?李在赣神魔，不要瞎搞啊人家会坏掉的qwq";
            re.flag = 10;
            return;
            break;
        case 11:
            if (val != 0) {
                var uname = "" + val;
                nam = uname;
                re.content = uname + " 几秒不见甚是想念ww,密码？";
                re.flag = 11;
            } else {
                re.content = "你是故意找茬是不是啊<(｀^′)>";
                re.flag = 10;
                return;
            }

            break;
        case 12:
            if (val != 0) {
                var psswd = "" + val;
                passwd = hex_md5(psswd);
            } else {
                re.content = "(๑•̌.•̑๑)ˀ̣ˀ̣";
                re.flag = 11;
                return;
            }
            $.ajax({
                url: "signin.php",
                type: "GET",
                async: false,
                data: {
                    name: nam,
                    password: passwd
                },
                success: function (response) {
                    console.log(response);
                    if (response == "Wrong name or password.") {
                        re.content = "哎呀，是你记错了还是我认错了？从用户名重新开始写吧";
                        re.flag = 10;
                        return;

                    } else {
                        re.content = nam;
                        re.flag = 12;
                        return;
                    }
                    return;
                },
                error: function () {
                    window.alert("error: 1")
                    return;
                }
            })
            break;
        case 101:
            if (val != 0) {
                var psswd = "" + val;
                passwdn = hex_md5(psswd);
                re.content = "额，我忘了你原来的密码了，你再说一遍？";
                re.flag = 101;
                return;
            } else {
                re.content = "不想理你，重新说";
                re.flag = 100;
                return;
            }
            break;
        case 102:
            if (val != 0) {
                var unam = "" + val;
                passwd = hex_md5(unam);
                re.content = "嗯!很好，我现在又忘了你要改成啥了";
                re.flag = 102;
                return;
            } else {
                re.content = "你故意找茬是不是啊？";
                re.flag = 101;
                return;
            }
            break;
        case 103:
            if (val != 0) {
                var psswd = "" + val;
                nam = $.cookie("salt").substring(0, 31);
                if (hex_md5(psswd) == passwdn) {
                    $.ajax({
                        url: "settings.php",
                        type: "GET",
                        async: false,
                        data: {

                        }

                    })
                }
            } else {
                re.content = "";
                re.flag = 102;
                return;
            }
            break;
        default:
            return;
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