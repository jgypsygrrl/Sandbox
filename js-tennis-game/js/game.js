var canvas;
var canvasContext;

var ballX = 50;
var ballY = 50;
var ballSpeedX = 10;
var ballSpeedY = 4;

var player1Score = 0;
var player2Score = 0;
var winningScore = 5;

var showWinScreen = false;

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

//controls mouse click to reset
function handleMouseClick(evt) {
  if (showWinScreen) {
    player1Score = 0;
    player2Score = 0;
    showWinScreen = false;
  }
}

window.onload = function() {
  canvas = document.getElementById('gameCanvas');
  canvasContext = canvas.getContext('2d');

  var framesPerSecond = 30;
  setInterval(function() {
    drawEverything();
    moveEverything();
  }, 1000 / framesPerSecond);

  //controls mouse click
  canvas.addEventListener('mousedown', handleMouseClick)

  //controls player paddle movements
  canvas.addEventListener('mousemove',
    function(evt) {
      var mousePos = calculateMousePos(evt);
      paddle1Y = mousePos.y - (paddleHeight / 2);
    });
};

function ballReset() {
  //show winner
  if (player1Score >= winningScore ||
    player2Score >= winningScore) {
    showWinScreen = true;
  }

  ballSpeedX = -ballSpeedX;
  ballX = canvas.width / 2;
  ballY = canvas.height / 2;
}

//Right Paddle AI Movement
function computerMovement() {
  var paddle2YCenter = paddle2Y + (paddleHeight / 2);
  if (paddle2YCenter < ballY - 35) {
    //moves up or down by 6
    paddle2Y += 6;
  } else if (paddle2YCenter > ballY - 35) {
    paddle2Y -= 6;
  }
}

function moveEverything() {
  //pauses when showWinScreen is true
  if (showWinScreen) {
    return;
  }

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

      //calculates how ball will react depending on where it hits the paddle
      var deltaY = ballY
        //will give + or - value based on the center of the paddle
        - (paddle1Y + paddleHeight / 2);
      ballSpeedY = deltaY * 0.35;

    } else {
      player2Score++; //must be before ballReset() to calculate win
      ballReset();

    }
  }
  //RIGHT PADDLE
  if (ballX > canvas.width) {
    if (ballY > paddle2Y &&
      ballY < paddle2Y + paddleHeight) {
      //will flip ball's horizontal speed
      ballSpeedX = -ballSpeedX;

      //calculates how ball will react depending on where it hits the paddle
      var deltaY = ballY
        //will give + or - value based on the center of the paddle
        - (paddle2Y + paddleHeight / 2);
      ballSpeedY = deltaY * 0.35;

    } else {
      player1Score++; //must be before ballReset() to calculate win
      ballReset();

    }
  }
  //ball bounce off side
  ballY += ballSpeedY;
  if (ballY < 0) {
    ballSpeedY = -ballSpeedY;
  }
  //ball bounce vertically
  if (ballY > canvas.height) {
    ballSpeedY = -ballSpeedY;
  }
}

function drawNet() {
  for (var i = 0; i < canvas.height; i += 40) {
    colorRect(canvas.width / 2 - 1, i, 2, 20, 'white');
  }
}

function drawEverything() {

  //canvas
  colorRect(0, 0, canvas.width, canvas.height, 'black');

  //Display winner & reset link
  if (showWinScreen) {
    canvasContext.fillStyle = "white";
    if (player1Score >= winningScore) {
      canvasContext.fillText("You Won!", 250, 150);
    } else if (player2Score >= winningScore) {
      canvasContext.fillText("Sorry, you lost!", 250, 100);
    }

    canvasContext.fillText("Click to Continue", 250, 200);
    return;
  }
  //net
  drawNet();

  //left player paddle
  colorRect(0, paddle1Y, paddleThickness, paddleHeight, 'white');

  //right computer paddle
  colorRect(canvas.width - paddleThickness, paddle2Y, paddleThickness, paddleHeight, 'white');

  //the ball
  colorCircle(ballX, ballY, 10, 'white');

  //scores
  canvasContext.fillText(player1Score, 100, 100);
  canvasContext.fillText(player2Score, canvas.width - 100, 100);

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