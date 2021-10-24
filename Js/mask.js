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
function nedmsak() {
    $(".marsk-container").show();
}
function closesign() {
    $(".popwindow").hide();
    $(".marsk-container").hide();
  }