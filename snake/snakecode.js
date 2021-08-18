//Play Grid
let x = [];
let y = [];
let gridCord = []
var canvas = document.getElementById("graph");
var canvasWidth = 900;
var canvasHeight = 900;
canvas.setAttribute('width', canvasWidth);
canvas.setAttribute('height', canvasHeight);
var cv = canvas.getContext("2d");
//Options Grid
var graphGridSize = 100;
var graphGridX = (canvasWidth / graphGridSize).toFixed();
var graphGridY = (canvasHeight / graphGridSize).toFixed();
//Draw Grid
for(var i = 0; i < graphGridX; i ++){
    var secondCord = graphGridSize*i;
	cv.moveTo(canvasWidth, secondCord);
	cv.lineTo(0, secondCord);
    x.push(secondCord+graphGridSize/2);
}

for(var i = 0; i < graphGridY; i ++){
    var secondCord = graphGridSize*i;
	cv.moveTo(secondCord, canvasHeight);
	cv.lineTo(secondCord, 0);
    y.push(secondCord+graphGridSize/2);
}

gridCord.push(x, y);
cv.strokeStyle = "#dbdbdb";
cv.stroke();

document.getElementById("playerhead").style.width=(graphGridSize-10);
document.getElementById("playerhead").style.height=(graphGridSize-10);
document.getElementById("playerhead").style.top=(422.5);
document.getElementById("playerhead").style.left=(422.5);
document.getElementById("fruit").style.width=(graphGridSize-10);
document.getElementById("fruit").style.height=(graphGridSize-10);
document.getElementById("fruit").style.top = Math.floor((Math.random() * 8)+1)*100+22.5;
document.getElementById("fruit").style.left = Math.floor((Math.random() * 8)+1)*100+22.5;
var score = 0;
var lastPosition = [];
var counter = 0;

function moveSnake(event){
    console.log(lastPosition)
    var heightCord = document.getElementById("playerhead").style.top;
    var widthCord = document.getElementById("playerhead").style.left;
    heightCord = parseFloat(heightCord);
    widthCord = parseFloat(widthCord);
    var key = event.code;
    
    
    
    if (key == "KeyA") {
        if (widthCord > 22.5) {
            lastPosX = widthCord;
            lastPosY = heightCord;
            lastPosition.unshift([lastPosX, lastPosY]);
            lastPosition.splice(score+1,1);
            document.getElementById("playerhead").style.left=(widthCord -= 100);
            document.getElementById("playerhead").style.transform = "rotate(90deg)";
            document.getElementById(counter).style.top = (lastPosition[0][1]);
            document.getElementById(counter).style.left = (lastPosition[0][0]);
        }
    }

    if (key == "KeyD") {
        if (widthCord < 822.5) {
            lastPosX = widthCord;
            lastPosY = heightCord;
            lastPosition.unshift([lastPosX, lastPosY]);
            lastPosition.splice(score+1,1);
            document.getElementById("playerhead").style.left=(widthCord += 100);
            document.getElementById("playerhead").style.transform = "rotate(270deg)";
            document.getElementById(counter).style.top = (lastPosition[0][1]);
            document.getElementById(counter).style.left = (lastPosition[0][0]);
        }
    }

    if (key == "KeyW") {
        if (heightCord > 22.5) {
            lastPosX = widthCord;
            lastPosY = heightCord;
            lastPosition.unshift([lastPosX, lastPosY]);
            lastPosition.splice(score+1,1);
            document.getElementById("playerhead").style.top=(heightCord -= 100);
            document.getElementById("playerhead").style.transform = "rotate(180deg)";
            document.getElementById(counter).style.top = (lastPosition[0][1]);
            document.getElementById(counter).style.left = (lastPosition[0][0]);

        }
    }

    if (key == "KeyS") {
        if (heightCord < 822.5) {
            lastPosX = widthCord;
            lastPosY = heightCord;
            lastPosition.unshift([lastPosX, lastPosY]);
            lastPosition.splice(score+1,1);
            document.getElementById("playerhead").style.top=(heightCord += 100);
            document.getElementById("playerhead").style.transform = "rotate(0deg)";
            document.getElementById(counter).style.top = (lastPosition[0][1]);
            document.getElementById(counter).style.left = (lastPosition[0][0]);
        }
    }

    var fruitY = document.getElementById("fruit").style.top;
    var fruitX = document.getElementById("fruit").style.left;
    fruitY = parseFloat(fruitY);
    fruitX = parseFloat(fruitX);

    if (fruitY == heightCord && fruitX == widthCord) {
        fruitX = Math.floor((Math.random() * 8)+1)*100+22.5;
        fruitY = Math.floor((Math.random() * 8)+1)*100+22.5;
        document.getElementById("fruit").style.top = fruitX;
        document.getElementById("fruit").style.left = fruitY;
        score += 1;
        document.getElementById("score").innerHTML = ("Score: " + score);
        document.getElementById(counter).style.top = (lastPosition[counter][1]);
        document.getElementById(counter).style.left = (lastPosition[counter][0]);
        document.getElementById(counter).style.display = "block";
    }
}
