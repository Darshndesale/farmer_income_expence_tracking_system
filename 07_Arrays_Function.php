<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrys functions very important</title>
</head>
<body>
    <?php
        $color = array("red","yellow","blue");
        // The task is pop the elements in the array 1 by 1
        array_pop($color);
        echo print_r($color), "<br>";

        // push the element
        array_push($color,"black","ganja","perpel");
        echo print_r($color);
    ?>

    <?php
        // find maximum and minimum from the number array
        // $numbers = array(1,2,,0,10); // In this statement we can not use empty value array
        $numbers = array(1,2,0,10);
    ?> 
    <!-- continue -->
    <?php 
        echo "This gives the max num ", max($numbers) , "<br>";
        echo "This gives the min num ", min($numbers) , "<br>";
        echo "This gives thecounts ", count($numbers) , "<br>";
        echo "This num is present or not in arr ", in_array(10,$numbers) , "<br>"; // this gives 1/0
        echo "sort the array ", sort($numbers) , "<br>";
        echo print_r($numbers);
        echo "decrising order the array ", rsort($numbers) , "<br>";
        echo print_r($numbers);
    ?>
    Impload fuction : is returns the String from the elements of array
    <?php
        $motivate = array("never","give","up","in","life");
        echo implode(" ",$motivate), "<br>";
    ?>

    Expload function is reverse of the ipload This break the sentence to pieses (array me)
    <?php
        $str ="Hi my name is nathu khera au jao";
        print_r (explode(" ",$str));
    ?>
</body>
</html>