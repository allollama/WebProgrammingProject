$(document).ready(function() {
    var rect = document.getElementsByTagName("main")[0].getBoundingClientRect();
    if (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight))
        $('footer').attr("id", "moveFooterDown");
});