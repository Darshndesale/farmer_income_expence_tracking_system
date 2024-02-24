<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// arrays is the datatype to store large amount of data in array
// Arrays is working on index data
    // syntax of array
    $name = array("darshan","krushana","desale");
    echo $name[0];

    // Add the array under the array
    $nested = array("mango","papaya","peru",array(100,200,300));
    // echo "$nested"; // we can't direct accese all the array to convert in string also

?>
<pre>
    <?php
        echo print_r($nested); // this is the solution of this  direct print the array
    ?>
</pre>

<!-- // We create the key pare wlala array' -->
<?php
    // key value array
    $mobile = array("realme"=>"15000","samsumg"=>"20000");
    echo $mobile["realme"], "<br>";
    // It gives the key value as a output;

    // concatination of keys with accese the values
    $food = array("assia"=>"pizza","Italian"=>"Biryani");
    echo $food["assia"] . " is the name as " . $food["Italian"], "<br>";

    ;
?>

<pre>
    <?php
    // seeing the structure of array using pritn_r
    echo print_r($food), "<br>"
    ?>
</pre>
</body>
</html>