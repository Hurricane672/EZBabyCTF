$(document).ready(function () {
    $(".Header-link").click(function () {
        $(".marsk-container").show();
    })
    $(".marsk-container").click(function () {
        $(".marsk-container").hide();
        $(".popwindow").hide();
    })
})