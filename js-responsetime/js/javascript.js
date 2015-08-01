var clickedTime;
var createdTime;
var reactionTime;
var bestTime;
var tries = 0;

startGame();

// start game
function startGame() {

  document.getElementById("startButton").onclick = function() {

    // random color  
    function getRandomColor() {
      var letters = '0123456789ABCDEF'.split('');
      var color = '#';
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }

    // make the box appear automatically 
    function makeBox() {

      var time = Math.random();
      time = time * 5000;

      setTimeout(function() {

        // make box and circle random
        if (Math.random() > 0.5) {

          document.getElementById("box").style.borderRadius = "75px";

        } else {

          document.getElementById("box").style.borderRadius = "0";

        }

        // make the box/circle appear within range 
        var top = Math.random();
        top = top * 200;

        var left = Math.random();
        left = left * 500;

        document.getElementById("box").style.top = top + "px";

        document.getElementById("box").style.left = left + "px";

        document.getElementById("box").style.backgroundColor = getRandomColor();

        document.getElementById("box").style.display = "block";

        createdTime = Date.now();

      }, time);

    }

    makeBox();

    // calculate the reaction time, best time & number of tries
    document.getElementById("box").onclick = function() {

      tries++;

      clickedTime = Date.now();

      reactionTime = (clickedTime - createdTime) / 1000;

      console.log(reactionTime);

      bestTime = (bestTime == null) ? reactionTime : Math.min(reactionTime, bestTime);

      document.getElementById("bestTime").innerHTML = bestTime;

      document.getElementById("time").innerHTML = reactionTime;

      document.getElementById("clicks").innerHTML = tries;

      this.style.display = "none";

      // limit number of tries 
      if (tries < 5) {

        makeBox();

      } else {

        document.getElementById("clicks").innerHTML = 'Game over!</br> Your best time was ' + bestTime + 's.</br> Click Start to try again!';
        document.getElementById("time").innerHTML = '0';
        document.getElementById("bestTime").innerHTML = '0';

        function resetScore() {

          reactionTime = 0;
          bestTime = null;
          tries = 0;

        }
        resetScore();
      }

    }

  }

}

debugger;