$(document).ready(function() {
    if (document.getElementsByTagName("main").length != 0) { 
        var rect = document.getElementsByTagName("main")[0].getBoundingClientRect();
        if (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight))
            $('footer').attr("id", "moveFooterDown");
    }
    var c = document.getElementById("canvasLogo");
    var ctx = c.getContext("2d");
    ctx.fillStyle = "gold";
    ctx.fillRect(0,5,10,10);
    ctx.fillStyle = "orange";
    ctx.fillRect(15,5,10,10);
    ctx.fillStyle = "red";
    ctx.fillRect(30,5,10,10);
});