var input1 = prompt("Please type a starting number");
var bottomNumb = parseInt(input1);

var input = prompt("Please type an ending number");
var topNumb = parseInt(input);

document.write("You chose " + bottomNumb + " and " + topNumb + ".");

var numRandom = Math.floor(Math.random() * (topNumb - bottomNumb + 1)) + bottomNumb;

document.write("  Your random number between " + bottomNumb + " and " + topNumb + " is " + numRandom + ".");