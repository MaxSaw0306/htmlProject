'use strict'

//Play Grid
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
for(var i = 0; i < graphGridX; i++){
    var secondCord = graphGridSize*i;
	cv.moveTo(canvasWidth, secondCord);
	cv.lineTo(0, secondCord);
}

for(var i = 0; i < graphGridY; i ++){
    var secondCord = graphGridSize*i;
	cv.moveTo(secondCord, canvasHeight);
	cv.lineTo(secondCord, 0);
}

cv.strokeStyle = "#dbdbdb";
cv.stroke();

const start = () => {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("start").style.display = "none";
}

document.getElementById("playerhead").style.width=(graphGridSize-10);
document.getElementById("playerhead").style.height=(graphGridSize-10);
document.getElementById("playerhead").style.top=(422.5);
document.getElementById("playerhead").style.left=(422.5);
document.getElementById("fruit").style.width=(graphGridSize-10);
document.getElementById("fruit").style.height=(graphGridSize-10);
document.getElementById("fruit").style.top = Math.floor((Math.random() * 8)+1)*100;
document.getElementById("fruit").style.left = Math.floor((Math.random() * 8)+1)*100;
var score = 0;
let highscore = 0;
let lastscore;
let direction = 0, widthCord = 0, heightCord = 0;
let move = setInterval(() => snakeMovement(direction, widthCord, heightCord), 500);
let fruitY = document.getElementById("fruit").style.top;
let fruitX = document.getElementById("fruit").style.left;
fruitY = parseFloat(fruitY);
fruitX = parseFloat(fruitX);
let autoActivate = 0;
function auto() {
    autoActivate = 1;
}

function snakeMovement(direction) {
    if (direction == "left"){
        document.getElementById("playerhead").style.left=(widthCord -= 100);
    }

    if (direction == "right"){
        document.getElementById("playerhead").style.left=(widthCord += 100);
    }

    if (direction == "up"){
        document.getElementById("playerhead").style.top=(heightCord -= 100);
    }
    
    if (direction == "down"){
        document.getElementById("playerhead").style.top=(heightCord += 100);
    }
    heightCord = document.getElementById("playerhead").style.top;
    widthCord = document.getElementById("playerhead").style.left;
    heightCord = parseFloat(heightCord);
    widthCord = parseFloat(widthCord);

    fruitY = document.getElementById("fruit").style.top;
    fruitX = document.getElementById("fruit").style.left;
    fruitY = parseFloat(fruitY);
    fruitX = parseFloat(fruitX);

    if (autoActivate == 1){
        console.log("test")
        if (fruitX < widthCord){
            moveSnake("KeyA");
        }

        if (fruitX > widthCord){
            moveSnake("KeyD");
            
        }
        
        if (fruitY > heightCord){
            moveSnake("KeyS");
        
        }

        if (fruitY < heightCord){
            moveSnake("KeyW");
            
        }
    }

    if (heightCord < 22.5 || heightCord > 822.5 || widthCord < 22.5 || widthCord > 822.5) {
        document.getElementById("playerhead").style.top=(422.5);
        document.getElementById("playerhead").style.left=(422.5);
        if (highscore < score) {
            highscore = score;
        }
        lastscore = score;
        document.getElementById("highscore").innerHTML = "Highscore: "+highscore;
        document.getElementById("lastscore").innerHTML = "Last Score: "+lastscore;
        clearInterval(move);
        document.getElementById("overlay").style.display = "flex";
        document.getElementById("start").style.display = "inline";
        score = 0;
        document.getElementById("score").innerHTML = "Score: "+score;
        autoActivate = 0;
    }

    if (fruitY == heightCord && fruitX == widthCord) {
        fruitX = Math.floor((Math.random() * 8))*100+22.5;
        fruitY = Math.floor((Math.random() * 8))*100+22.5;
        document.getElementById("fruit").style.top = fruitX;
        document.getElementById("fruit").style.left = fruitY;
        score += 1;
        document.getElementById("score").innerHTML = "Score: "+score;
    }
}


function getKey(event) {
    let key = event.code;
    moveSnake(key);
}

function moveSnake(key) {
    heightCord = document.getElementById("playerhead").style.top;
    widthCord = document.getElementById("playerhead").style.left;
    heightCord = parseFloat(heightCord);
    widthCord = parseFloat(widthCord);
    
    if (key == "KeyA") {
        if (widthCord > 22.5) {
            document.getElementById("playerhead").style.transform = "rotate(90deg)";
            var direction = "left";
            clearInterval(move);
            move = setInterval(() => snakeMovement(direction), 250-score*2);
            console.log("a");
        }
    }

    if (key == "KeyD") {
        if (widthCord < 822.5) {
            document.getElementById("playerhead").style.transform = "rotate(270deg)";
            var direction = "right";
            clearInterval(move);
            move = setInterval(() => snakeMovement(direction), 250-score*2);
            console.log("d");
        }
    }

    if (key == "KeyW") {
        if (heightCord > 22.5) {
            document.getElementById("playerhead").style.transform = "rotate(180deg)";
            var direction = "up";
            clearInterval(move);
            move = setInterval(() => snakeMovement(direction), 250-score*2);
            console.log("w");
        }
    }

    if (key == "KeyS") {
        if (heightCord < 822.5) {
            document.getElementById("playerhead").style.transform = "rotate(0deg)";
            var direction = "down";
            clearInterval(move);
            move = setInterval(() => snakeMovement(direction), 250-score*2);
            console.log("s");
        }
    }
}