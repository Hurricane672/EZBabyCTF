$(document).ready(function () {
    $(".marsk-container").click(function () {
        $(".marsk-container").hide();
        $(".popwindow").hide();
        $(".pophint").hide()
    })
    $("input").focus(function () {
        remred();
    })
})
function remred() {
    $(".errorhps").removeClass("errorhps")
}
function htmlEncodeJQ(str) {
    return $('<span/>').text(str).html();
}
function nedmsak() {
    $(".marsk-container").show();
}
function closesign() {
    $(".popwindow").hide();
    $(".marsk-container").hide();
}