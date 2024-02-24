<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>switch case statement</title>
</head>
<body>
    <?php
        // in switch satetment it work as the if statement and else as defult of switch statement;
        $whetehr = "cloudy";
        switch ($whetehr) {
            case 'suny':
                echo "Clude is suny";;
                break;
            case 'cloudy':
                echo "Clude is cloudy";
                break;
            
            default:
                echo "unable to fetch the whether data";
                break;
        }

    ?>
    <h3>Also the one thing was the We can add the multiple case and only one echo statements Example is below</h3>
    <?php
        // $dilong = "bhai ne bola karne ka to karne ka";
        $dilong = "mark idher he";
        switch ($dilong) {
            case 'bhai ne bola karne ka to karne ka':
                echo "This is surya style";
                break;
            case 'bhai ne bola karne ka nahi to karne nahi':
            case 'mark idher he':
                echo "This is not sirya style style";
                break;
        }
    ?>
    <hr>
    <h3>Branching statement</h3>
        

    <?php
        // contunue and break statement; --> story we have 100 name in our web Then the name of joen has the name at index no 101 then we apply for loop to accese this name but the my for loop was traverse all the indees then avoid this we have  continue and break atetements
        // It direcly work on time complexity : jab milatab break karo age janeki jarurat nahi

        $name_arr = array('hi','by','baba','darshan','aji','kaka');

        echo print_r($name_arr);

        // actual impleamentation : skip the name darshan
        for ($i=0; $i < 6; $i++) { 
            if($name_arr[$i] == 'darshan') {
                // continue;
                break; // then it only print the names untill darshan
            }

            echo $name_arr[$i], "<br>";
        }

    ?>
</body>
</html>