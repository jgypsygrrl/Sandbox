var canvas;
var canvasContext;
var ballX = 50;
var ballSpeedX = 10;

window.onload = function() {
  canvas = document.getElementById('gameCanvas');
  canvasContext = canvas.getContext('2d');

  var framesPerSecond = 30;
  setInterval(function() {
    drawEverything();
    moveEverything();
  }, 1000 / framesPerSecond);
}

function moveEverything() {
  ballX += ballSpeedX;
  if (ballX < 0) {
    ballSpeedX = -ballSpeedX;
  }
  if (ballX > canvas.width) {
    ballSpeedX = -ballSpeedX;
  }
}

function drawEverything() {

  //line below creates canvas
  colorRect(0, 0, canvas.width, canvas.height, 'black');

  //line below is the left paddle
  colorRect(0, 210, 10, 100, 'white');

  //line below is the ball
  colorCircle(ballX, 150, 10, 'white');

}

function colorCircle(centerX, centerY, radius, drawColor) {
  canvasContext.fillStyle = drawColor;
  canvasContext.beginPath();
  canvasContext.arc(centerX, centerY, 10, 0, Math.PI * 2, true);
  canvasContext.fill();
}

function colorRect(leftX, topY, width, height, drawColor) {
  canvasContext.fillStyle = drawColor;
  canvasContext.fillRect(leftX, topY, width, height);

}