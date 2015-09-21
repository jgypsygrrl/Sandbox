var canvas;
var canvasContext;

var ballX = 50;
var ballY = 50;
var ballSpeedX = 10;
var ballSpeedY = 4;

var paddle1Y = 250;
var paddle2Y = 250;
var paddleHeight = 75;
var paddleThickness = 10;


function calculateMousePos(evt) {
  var rect = canvas.getBoundingClientRect();
  var root = document.documentElement;
  var mouseX = evt.clientX - rect.left - root.scrollLeft;
  var mouseY = evt.clientY - rect.top - root.scrollTop;
  return {
    x: mouseX,
    y: mouseY
  };
}

window.onload = function() {
  canvas = document.getElementById('gameCanvas');
  canvasContext = canvas.getContext('2d');

  var framesPerSecond = 30;
  setInterval(function() {
    drawEverything();
    moveEverything();
  }, 1000 / framesPerSecond);

  //controls player paddle movements
  canvas.addEventListener('mousemove',
    function(evt) {
      var mousePos = calculateMousePos(evt);
      paddle1Y = mousePos.y - (paddleHeight / 2);
    });
};

function ballReset() {
  ballSpeedX = -ballSpeedX;
  ballX = canvas.width / 2;
  ballY = canvas.height / 2;
}

//Right Paddle AI Movement
function computerMovement() {
  var paddle2YCenter = paddle2Y + (paddleHeight / 2);
  if (paddle2YCenter < ballY - 35) {
    paddle2Y += 6;
  } else if (paddle2YCenter > ballY - 35) {
    paddle2Y -= 6;
  }
}

function moveEverything() {
  computerMovement()

  ballX += ballSpeedX;
  ballY += ballSpeedY;

  //LEFT PADDLE
  if (ballX < 0) {
    //if ball below top of the paddle & above the bottom of the paddle (top + height)
    if (ballY > paddle1Y &&
      ballY < paddle1Y + paddleHeight) {
      //will flip ball's horizontal speed
      ballSpeedX = -ballSpeedX;
    } else {
      ballReset();
    }
  }
  //RIGHT PADDLE
  if (ballX > canvas.width) {
    if (ballY > paddle2Y &&
      ballY < paddle2Y + paddleHeight) {
      //will flip ball's horizontal speed
      ballSpeedX = -ballSpeedX;
    } else {
      ballReset();
    }
  }
  //ball bounce off left side
  ballY += ballSpeedY;
  if (ballY < 0) {
    ballSpeedY = -ballSpeedY;
  }
  //ball bounce vertically
  if (ballY > canvas.height) {
    ballSpeedY = -ballSpeedY;
  }
}

function drawEverything() {

  //canvas
  colorRect(0, 0, canvas.width, canvas.height, 'black');

  //left player paddle
  colorRect(0, paddle1Y, paddleThickness, paddleHeight, 'white');

  //right computer paddle
  colorRect(canvas.width - paddleThickness, paddle2Y, paddleThickness, paddleHeight, 'white');

  //the ball
  colorCircle(ballX, ballY, 10, 'white');

  canvasContext.fillText("score", 100, 100);

}

function colorCircle(centerX, centerY, radius, drawColor) {
  canvasContext.fillStyle = drawColor;
  canvasContext.beginPath();
  canvasContext.arc(centerX, centerY, 5, 0, Math.PI * 2, true);
  canvasContext.fill();
}

function colorRect(leftX, topY, width, height, drawColor) {
  canvasContext.fillStyle = drawColor;
  canvasContext.fillRect(leftX, topY, width, height);

}