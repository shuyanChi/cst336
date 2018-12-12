<?php

$letters = array("A", "B", "C");
$letters[2] = "E";
array_push($letters, "I");
$letters[] = "F";
echo $letters;
$message="Good";
function greeting() {
    $greeting = $message. "morning";
    echo $greeting;
}
greeting();
echo "<hr />";
    for($i=1; $i < 40; $i += 2) {
        echo $i . " ";
    }
    $bestTeam = true;
    echo($bestTeam)? "Go 49ers!" : "Go Panthers!";
    
    $letters = array("A","B","C","D","E","F");
    unset($letters[0]);
    echo "This is letter 2: " .$letters[2] . "end!!";
    $randLetter = rand(1,5);
    echo $randLetter;
?>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script>

$("h1").html("hello");
</script>
</head>
<body>
<h1></h1>
</body> 