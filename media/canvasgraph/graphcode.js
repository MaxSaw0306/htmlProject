let data = {values:[]};

var canvas = document.getElementById("graph");
var canvasWidth = 600;
var canvasHeight = 400;
canvas.setAttribute('width', canvasWidth);
canvas.setAttribute('height', canvasHeight);
var cv = canvas.getContext("2d");
//Options Grid
var graphGridSize = 20;
var graphGridX = (canvasWidth / graphGridSize).toFixed();
//Draw Grid
for(var i = 0; i < graphGridX; i ++){
	cv.moveTo(canvasWidth, graphGridSize*i);
	cv.lineTo(0, graphGridSize*i);
}
cv.strokeStyle = "#dbdbdb";
cv.stroke();

function addMonth(event,test){
    const month = document.getElementById("month").value;
    const value = document.getElementById("value").value;
    const color = document.getElementById("color").value;
    data.values.push({Month: month, Value: value, Color: color});
}

let test = data.values.length;

function createGraph(test){
    console.log(test, data.values.length);
    if (test == data.values.length){
        return;
    }
    ++test;
    console.log(test);
    var test = data;
    var graphMax = 160;
    var graphPadding = 10;
    var graphFaktor = (canvasHeight-(2*graphPadding)) / graphMax;
    var graphWidth = (canvasWidth-graphPadding) / data.values.length;
    var graphTextcolor = '#000000';
    
    for(var i = 0; i < data.values.length; i ++){
        tmpTop = (canvasHeight-(graphFaktor*data.values[i].Value)).toFixed()-graphPadding;
        tmpHeight = ((data.values[i].Value*graphFaktor)).toFixed();
        cv.fillStyle = data.values[i].Color;
        cv.fillRect(graphWidth+((i-1)*graphWidth)+graphPadding, tmpTop, graphWidth-graphPadding, tmpHeight);
        cv.fillStyle = graphTextcolor;
        cv.fillText(data.values[i].Month, graphWidth+((i-1)*graphWidth)+graphPadding+2, canvasHeight-2, graphWidth);
    }
}

function preventDefault(event) {
    event.preventDefault();
}