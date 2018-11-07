<?php
 /*function displayArray($my_symbols) {
     echo "<hr />";
     print_r($my_symbols);
 }*/
 function displayArray() {
     global $symbols;
     echo "<hr />";
     print_r($symbols);
     for($i = 0; $i < count($symbols); $i++) {
         if($i < count($symbols) &&  $i > 0) {
             echo ",";
         }
         echo $symbols[$i];
         
     }
 }
    $symbols = array("seven");
    print_r($symbols);//displays array content
    
    $points = array("orange" => 250, "cherry" => 500);//associative array
    echo $points["orange"];
    array_push($symbols, "orange", "grapes"); // add elements to the array;
    print_r($symbols);//displays array content
    $points["seven"] = 1000; //add element
    
    $symbols[] = "cherry";//add element to the end of the array
    print_r($symbols);//displays array content
    
    //create a functon to dispylay an array
    echo "<br />";
    displayArray($symbols);//pass parameter
    echo "<br />";
    sort($symbols);
    displayArray($symbols);//pass parameter
    echo "<br />";
    rsort($symbols);
    displayArray($symbols);//pass parameter
    unset($symbols[2]); //remove element, but ont index in an array
     echo "<br />";
    displayArray($symbols);//pass parameter
    $symbols = array_values($symbols);//re_index elements in an array
    displayArray($symbols);
    shuffle($symbols);
    displayArray($symbols);
    echo "<hr />";
    $randValue = rand(0, count($symbols) - 1);
    echo "Random item: " . $symbols[$randValue];
    //array_rand() return index;
    echo "<br />";
    echo "Random item: " . $symbols[array_rand($symbols)];
    $indexes = array();
    for($i = 0; i < count($symbols); $i++) {
        $indexes[] = $symbols[array_rand($symbols)];//add element to array
        echo "<img src ='../lab2/img/".$indexes[$i].".png'>";
    }
    echo "<hr />";
    print_r($indexes);
    //whether the elements are the same
    if($indexes[0] == $indexes[1] && $indexes[1] == $indexes[2]) {
        echo "congrates!! YOu won" .$points[$symbols[$indexes[0]]] . $poitns;
        
    }
    
    
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Review: Arrays</title>
    </head>
    <body>
        
            
        
    </body>
</html>