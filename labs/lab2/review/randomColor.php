   <?php //== can instead of php
    function getLuckyNumber() {
        do {
            $lucky = rand (1, 10);
            
        } while($luckey == 4);
         echo $lucky;
    }
    function getRandomColor() {
        echo "rgba(".rand(0, 255).", ". rand(0, 255) .", ".rand(0, 255).", ".(rand(0, 10) / 10).");";
                    
    }
    
     ?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            body {
                <?php
                    $red = rand(0, 255);
                    
                    echo "background-color: rgba(".rand(0, 255).", ". rand(0, 255) .", ".rand(0, 255).", ".(rand(0, 10) / 10).");";
                    
                ?>
              
            }
            h1 {
                 <?php
                    $red = rand(0, 255);
                    
                    echo "background-color: rgba(".rand(0, 255).", ". rand(0, 255) .", ".rand(0, 255).", ".(rand(0, 10) / 10).");";
                    echo "color: background-color: rgba(".rand(0, 255).", ". rand(0, 255) .", ".rand(0, 255).", ".(rand(0, 10) / 10).");";
                    
                ?>
            }
            h2 {
                background-color: <?php getRandomColor(); ?>;
            }
        </style>
    </head>
    <body>
    <h1>
        My luckey number is :
        <?php
            getLuckyNumber();
        ?>
        <h2>background color</h2>
    </h1>
    
    </body>
</html>