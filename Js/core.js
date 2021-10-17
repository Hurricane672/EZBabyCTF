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
<<<<<<< HEAD
                        //var re1 = ["(❀｣╹□╹)｣*･我很喜欢这个名字owo一定要记好自己的名字嗷！现在，给自己想一个密码吧w", 1];
                        var re1 = "12343";
                        return re1;
=======
                        re.content = uname+"……(❀｣╹□╹)｣*･我很喜欢这个名字owo一定要记好自己的名字嗷！现在，给自己想一个密码吧w";
                        re.flag = 1;
                        return;
>>>>>>> 0960f97d10aa04e5ed78b2bb149ee82f50608e9d
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
                var uname = "" + val;
            } else {
                re.content = "你真的是来搞安全的嘛？空密码……这也太不安全了！好好反思下！<(｀^′)>";
                re.flag = 1;
                return;
            }

            break;
        case 3:
            if (val != 0) {
                var uname = "" + val;
            } else {
                re.content = "空空又空空，老调戏人家有什么意思(´•ω•̥`)";
                re.flag = 2;
                return;
            }
            break;
        case 10:
            re.content = "?李在赣神魔，不要瞎搞啊人家会坏掉的qwq";
            re.flag = 10;
            return;
            break;
        case 11:
            if (val != 0) {
                var uname = "" + val;
            } else {
                re.content = "你是故意找茬是不是啊<(｀^′)>";
                re.flag = 10;
                return;
            }
            break;
        case 12:
            if (val != 0) {
                var uname = "" + val;
            } else {
                re.content = "(๑•̌.•̑๑)ˀ̣ˀ̣";
                re.flag = 11;
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