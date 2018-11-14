<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <?php
        $characters = array("one", "two", "three", "four", "five");
        $charSet = array("一", "二","三","四","五"); 
        function display($charSet) {
        echo "We are learning: ";
            for($i = 0; $i < count($charSet); ++$i) {
                if($i > 0 && $i < count($charSet)) {
                    echo " , ";
                }
                echo  $charSet[$i];
            }  
        }
        function printChar() {
            global $characters;
            $randValue = rand(0, count($characters) - 1);
            echo " <img id = 'image' src = 'img/".$characters[$randValue].".PNG' alt = 'Chinese words'  /> ";
            $_SESSION["randomChar"] = $characters[$randValue];
        }
      
       $char = $_POST["char"];

    ?>
</body>   
</html>
