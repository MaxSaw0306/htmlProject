var interval = 1;
var safe = 1;
var timertime = document.getElementById("interval-timer").value;
var pass_key = "test123";

function submit_password(pass_key) {
    var pass = document.getElementById("passwort").value
    if (pass == pass_key) {
        document.getElementById("content").style.display = block
    }

    if (pass != pass_key) {
        console.warn("Falsches Passwort!!!");
    }
    
}

function draw() {
    if (safe == 1) {
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        var maxwidth = document.getElementById("myCanvas").style.width;
        var maxheight = document.getElementById("myCanvas").style.height;
        ctx.moveTo((Math.random(1,maxwidth)*1000),(Math.random(0,maxheight)*1000));
        ctx.lineTo((Math.random(0,maxwidth)*100),(Math.random(0,maxheight)*100));
        var linecolor = document.getElementById("color-line").value;
        ctx.strokeStyle = linecolor;
        ctx.stroke();
    }
}

function start() {
    interval = setInterval(draw, (timertime*1000))
    return interval
}

function stop() {
    clearInterval(interval)
}

function clear() {
    var c = document.getElementById("myCanvas");
    context.clearRect(0, 0, c.width, c.height);
}
