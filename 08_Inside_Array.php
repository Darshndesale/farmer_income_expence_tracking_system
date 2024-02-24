<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inside in arrays How it works</title>
</head>
<body>
    <?php
        // In last lecture we see that the array assigns the 0 index to 1st value and so on
        $arr = array(1,2,3,4,5,6,7,8,9,10);
        echo print_r($arr);
    ?>
    <hr>
    <?php
        // we cn 1st use to check In which we are currently take on index of array
        echo current($arr) , "<br>";

        // 2nd phase : It moves on next index from current index
        next($arr);
        echo current($arr) , "<br>";
        next($arr);
        echo current($arr) , "<br>";
        next($arr);
        next($arr); // This index element is skip
        echo current($arr) , "<br>";

        // Note: when we use "reset" is starts the index from the "0"
        reset($arr);
        next($arr);
        echo current($arr) , "<br>";
    ?>
</body>
</html>