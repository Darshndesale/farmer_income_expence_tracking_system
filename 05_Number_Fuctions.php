<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // I declare the numbers as integer and float also
    $firstNumber = 3;
    $secondNumber = 4;
    $thirdNumber = 6.567854;

    // add the 9-6 in third num
    echo $thirdNumber + 9 - 6 ,"<br>";
    echo 3.16/6,"<br>";
    // but in case we do not divide the any number BY 0 => Error
    // echo 5/0 , "<br>"

    // find the ceil of number and floor
    echo ceil($thirdNumber), "<br>";
    echo floor($thirdNumber), "<br>";

    // check it is true or false
    echo "This is Integer",is_int($thirdNumber),"<br>";
    echo "This is not Integer",is_int($secondNumber), "<br>";
    echo "This is not Integer",is_float($secondNumber), "<br>";

    // we can also find the mathetimatecaly calculation of the num like squre of number binary of number
    // binary of number => decbin (decimal to binary)
    echo decbin($firstNumber),"<br>";
    echo bindec(11),"<br>";
    echo floor(sqrt(16)),"<br>";

    // power of the number
    echo pow(2,4),"<br>";
    echo abs(-16+2),"<br>";
    echo fmod(16,2),"<br>";
    echo rand(1,100),"<br>";
?>
</body>
</html>

