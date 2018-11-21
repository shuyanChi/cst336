var characters = ["one", "two", "three", "four", "five"]; 
//var charSet = ["一", "二","三","四","五"];
var answerChekced = "";
var choAns = "";
var radios = "";
var rbnAnswer = "";
window.onload = startTest();

function startTest() {
    //display();
    printChar();
    answer();
}

/*function display() {
    for(var chars of charSet) {
    $("#char-sets").append("<button class = 'chars btn btn-success' id = ' " + chars +" '>" + chars + "</button>" + " ");
    }  
}*/

function printChar () {
    var randomInt = Math.floor(Math.random() * 5);
    $("#charImg").attr("src", "img/" + characters[randomInt] + ".png");
    answerChekced = characters[randomInt];
    console.log(answerChekced);
}

function answer() {
    for(choAns of characters) {
        $("#choose-answer").append("<input type = 'radio' name = 'choice' id = '" + choAns + "' value = '" + choAns + "'>" + choAns +  "<br />");
    }
}

function validateForm() {
    var x = $("#fname").val();
    console.log(x);
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}

$(document).ready(function() {
    $("p").click(function() {
    $(this).hide();
}); 
});

$(document).ready(function() {
    $("input").click(function() {
        $("#spin").css("background-color", "#0da349");
    }); 
    $("#btn-sub").click(function() {
        validateForm();
        if(rbnAnswer == answerChekced) {
            document.getElementById("right").innerText = "Right!";
        }
        else {
            document.getElementById("right").innerText = "Try Again!";
        }
    }); 
});

(function (){
    radios = document.getElementsByName('choice');
    for(var i = 0; i < radios.length; i++){
        radios[i].onclick = function(){
            rbnAnswer = document.getElementById('choice-label').innerText = this.value;
        }
    }
})();

 
