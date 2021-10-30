function sendmsg(from, to, msg) {
    $.ajax({
        url: "message.php",
        type: "GET",
        data: {
            from: from,
            to: to,
            msg: msg
        },
        async: false,
        success: function (response) {
            // var success = '<div class="p-1 pophint"><div class="Toast Toast--success"><span class="Toast-icon"><svg width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z" /></svg></span><span class="Toast-content">消息已发送！</span></div></div>'
            if (response == 'done') {
               window.alert("消息发送成功")
            }
            else{
                window.alert("消息发送失败");
            }
        },
        error: function () {
            window.alert("error: 1");
        }
    })
}