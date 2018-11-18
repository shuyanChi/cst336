//variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
//var words = ["snake", "monkey", "beetle"];
//Creating an array of available letters
var words = [{word: "snake", hint: "It's a reptile"}, 
             {word: "monkey", hint: "It's a mammal"},
             {word: "beetle", hint: "It's an insect"}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

//var hintButton = document.creatElement("hint");
//hintButton.innerHTML = "Hint!";
//events

window.onload = startGame();

// Do something when clicking on each letter
$("#letters").on("click", ".letter", function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").on("click", function() {
    location.reload();
});


//functions          
//console.log(words[0]);
//var randomInt = Math.floor(Math.random() * words.length);
//selectedWord = words[randomInt];
//console.log(selectedWord);

function startGame() {
    pickWord();
    createLetters();
    initBoard();
    updateBoard();
    
}
//Fill the board with underscores

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
    //console.log(selectedWord);
}

//Create the letters inside the letters div
// grab the letters in alphabet array and create a button into the letters
function createLetters() {
    for(var letter of alphabet) {
        $("#letters").append("<button class = 'letter btn btn-success' id = '" + letter + "'>" + letter + "</button>");
        
    }
    /*$(".letter").click(function() {
        checkLetter($(this).attr("id"));
        disableButton($(this));
    });*/
}
function initBoard() {
    for(var letter in selectedWord) {
        board.push("_");
    }
    //console.log(board);
}

function updateBoard() {
    $("#word").empty();
    for(var i = 0; i < board.length; i++) {
        $("#word").append(board[i] + " ");
        //document.getElementById("word").innerHTML += letter + " ";
    }
    $("#word").append("<br />");
    $("#word").append("<button id = 'hint'> Hint </button> <br/>");
    $("#word").append("<span class = 'hint'> Hint: " + selectedHint + "</span><br/>");
    $(".hint").hide();
    $("#hint").click(function() {
       $(".hint").show(); 
       //remainingGuesses--;
    });
}
/*function showHint() {
    alert(selectedHint);
    remainingGuesses--;
    updateMan();
}*/
//Calculate and updates the image for our stick man
function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
    //$("#hangImg").attr("src", "img/stick_" + (0 + remainingGuesses) + ".png");
    
}

//Checks to see if the selected letter exists in the selectedWord
function checkLetter(letter) {
    var positions = new Array();
    //put all the postions the letter exists in an array
    for(var i = 0; i < selectedWord.length; ++i) {
        if(letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    if(positions.length > 0) {
        updateWord(positions, letter);
    }
    //Check to see if this is a winning guess
    /*if(!board.includes("_")) {
        endGame(true);
    }*/
    else{
        remainingGuesses-=1;
        updateMan();
    }
    if(remainingGuesses <= 0) {
        endGame(false);
    }
   
}

//Update the current word then calls for a board update
function updateWord(positions, letter) {
    for(var pos of positions) {
        board[pos] = letter;
    }
    updateBoard();
    //check to see if this is a winning guess *****
    if(!board.includes("_")) {
        endGame(true);
        
    }
    //*****
}



//End the game by hiding game divs and displaying the win or loss divs
function endGame(win) {
   $("#letters").hide(); 
   if(win) {
       $('#won').show();
   }
   else {
       $('#lost').show();
   }
}


//Disables the button and changes the style to tell the user it's 
//disabled
function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}
/*function enableButton(btn) {
    btn.prop("disabled", false);
    btn.attr("class", "btn btn-success");

}
*/

//for(var letter of board) {
//    document.getElementById("word").innerHTML += letter + " ";
//}

/*$("#letterBtn").click(function() {
    var boxVal = $("#letterBox").val();
    console.log("You pressed the button and it had thd value: " + boxVal);
})*/

