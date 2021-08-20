'use strict'
//Global variables
var score = 0;
let highscore = 0;
let lastscore;
let direction = 0;
let lastDirection = 0;
let move = 0;
let lastPosition=[]


//Play Grid
var canvas = document.getElementById("graph");
var canvasWidth = 1000;
var canvasHeight = 1000;
canvas.setAttribute('width', canvasWidth);
canvas.setAttribute('height', canvasHeight);
var cv = canvas.getContext("2d");

var graphGridSize = 100;
var graphGridX = (canvasWidth / graphGridSize).toFixed();
var graphGridY = (canvasHeight / graphGridSize).toFixed();


const SNAKE_SPEED = 300;
const FPS = 60;

cv.strokeStyle = "#dbdbdb";
cv.stroke();


//Draw Items
function drawCharacter (color,x,y,size) {
    cv.fillStyle = color;
    cv.fillRect(x,y,size,size);
};

function drawSnake(snake) {
    drawCharacter(snake.color, snake.xPosition, snake.yPosition, snake.size);
}

let snake = {
    color: "rgb(255, 0, 0)",
    size: 100,
    body: [{
        xPosition:
        yPosition:
    }]
    xPosition: (canvasWidth-500),
    yPosition: (canvasHeight-500),
}

let body = {
    color: "rgb(255, 26, 26)",
    size: 100,
    xPosition: (canvasWidth / 2)-50,
    yPosition: (canvasHeight / 2)-50,
}

let fruit = {
    color: "rgb(255, 255, 0)",
    size: 100,
    xPosition: Math.floor((Math.random() * 10))*graphGridSize,
    yPosition: Math.floor((Math.random() * 10))*graphGridSize,
}

function placeFruit() {
    cv.clearRect(fruit.xPosition-1, fruit.yPosition-1, fruit.size+2, fruit.size+2);
    fruit.xPosition = Math.floor((Math.random() * 10))*graphGridSize;
    fruit.yPosition = Math.floor((Math.random() * 10))*graphGridSize;
    if (fruit.yPosition > 900) {
        fruit.yPosition = 900;
    }
    if (fruit.xPosition > 900) {
        fruit.xPosition = 900;
    }
    drawCharacter(fruit.color, fruit.xPosition, fruit.yPosition, fruit.size);
}

//Start
const start = () => {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("start").style.display = "none";
    drawCharacter(snake.color, snake.xPosition, snake.yPosition, snake.size);
    placeFruit();

    if (!move) {
        move = setInterval(() => render(cv), 1000/60);
    }
}

//move Snake
function snakeMovement(dir) {

    console.log(direction);
    function deleteSnake() {
        cv.clearRect(snake.xPosition-1, snake.yPosition-1, snake.size+2, snake.size+2);
    }
    
    deleteSnake();

    const deltaPosition =  SNAKE_SPEED/FPS;

    if (dir == "left") {
        snake.xPosition -= deltaPosition;
    }

    if (dir == "right"){
        snake.xPosition += deltaPosition;
    }

    if (dir == "up"){
        snake.yPosition -= deltaPosition;
    }
    
    if (dir == "down"){
        snake.yPosition += deltaPosition;
    }

    drawSnake(snake);


    //Snake dies
    if (snake.xPosition < 0 ||snake.xPosition > canvasWidth ||snake.yPosition < 0 ||snake.yPosition > canvasHeight ||snake.xPosition+(snake.size)  < 0 ||snake.xPosition+(snake.size) > canvasWidth ||snake.yPosition+(snake.size)  < 0 ||snake.yPosition+(snake.size)  > canvasHeight) {
            if (highscore < score) {
                highscore = score;
            }
            lastscore = score;
            
            document.getElementById("highscore").innerHTML = "Highscore: "+highscore;
            document.getElementById("lastscore").innerHTML = "Last Score: "+lastscore;
            cv.clearRect(0,0,canvasHeight, canvasWidth);
            snake.xPosition =(canvasWidth / 2);
            snake.yPosition =(canvasHeight / 2);
            drawCharacter(snake.color, snake.xPosition, snake.yPosition, snake.size);
            
            placeFruit();

            document.getElementById("overlay").style.display = "flex";
            document.getElementById("start").style.display = "inline";
            score = 0;
            document.getElementById("score").innerHTML = "Score: "+score;
            direction = 0;
            lastDirection = 0;
        }

        //Snake eats fruit
        if (snake.xPosition + snake.size > fruit.xPosition && snake.xPosition < fruit.xPosition + fruit.size) {
            if (snake.yPosition + snake.size > fruit.yPosition && snake.yPosition < fruit.yPosition + fruit.size) {
                placeFruit();
                score += 1;
                document.getElementById("score").innerHTML = "Score: "+score;
            
        }
    }
}


//key input
function getKey(event) {
    let key = event.code;
    moveSnake(key);
}

function renderGrid(ctx) {
    ctx.fillStyle = "rgb(217, 217, 217)";

    // rows
    const amountOfRowSlices = canvasHeight / graphGridSize;

    for (let i = 0; i < amountOfRowSlices; i++) {
        ctx.fillRect(0, i * graphGridSize, canvasWidth, 2);
    }

    //columns

    const amountOfColumnSlices = canvasWidth / graphGridSize;

    for (let i = 0; i < amountOfColumnSlices; i++) {
        ctx.fillRect(i * graphGridSize, 0, 2, canvasHeight);
    }


}

function render(ctx) {
    renderGrid(cv);

    if (lastDirection != direction) {
        if (snake.xPosition % graphGridSize == 0 && snake.yPosition % graphGridSize == 0) {
            lastDirection = direction;
        }
    }

    snakeMovement(lastDirection);
}

function moveSnake(key) {
    if (key == "KeyA") {
        direction = "left";
    }

    if (key == "KeyD") {
        direction = "right";
    }

    if (key == "KeyW") {
        direction = "up";
    }

    if (key == "KeyS") {
        direction = "down";
    }
}