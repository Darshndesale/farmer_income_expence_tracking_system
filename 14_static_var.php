<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>static variables</title>
</head>
<body>
    <?php
        // we can understand the concept of static variable sin php by variables
        function NormalVar() {
            $value = 1;
            echo $value,"<br>";
            $value++;
        }
        NormalVar(); // 1
        NormalVar(); // 1
        NormalVar(); // 1
        // out : This functions gives the same value for diffrent calls

        // declare static variable in function
        function StaticVar() {
            static $value = 1; // after declaring static we accese the updated values of value in diffrent form in diffrent function calls
            echo $value,"<br>";
            $value++;
        }
        // output line at : 23
        StaticVar(); // 1 goes to call with 2nd time
        StaticVar(); // 2
        StaticVar(); // 3

        // Note: in normal variable it only take the value of next call is same && In static var it take the updated value to the next call fun()
    ?>
    <hr>
    <h3>Local varibles</h3>
    <?php
        // defination Local variables : Those variables which only accesable in same scope not utside the scope
        $outervar = "I am outer var";
        if(1){
            $innervar = "I am inner";
            echo $innervar,"<br>";
            echo $outervar,"currently i am on the scope with inner <br>";
        }

        echo $innervar,"<br>"; // But the problem in php the But it accesable

        // *** Note : Thhis is only available for functions
         $val1 = 5; // This is not accesable on the this function
        function hiIAmFunc() {
            global $val1; // declare madhe ke ahe mag te bahe accese hot ahet
            $val2 = 12;
            $result = $val1 + $val2;
            echo "sum is done : ",$result,"<br>";
        }
        echo $val1,"I am global variable<br>"; // The innew value of function also not accesable Leta bhi nahi Deta bhi nahi
        hiIAmFunc(1);
        // bhai ye bahr se mangata he na bahar walo ko deta he kunjus
    ?>
    <hr>
    <h3>Global Variable</h3>
    <?php
    // Def Globar variable : A var declare outside a function has a global scope and can only be accesed outside a function
    // example : line no 50 pasun
     $global_var = 3.4; // This resolve the problem to accese the variable under the function line no 51

    ?>

    <hr>
    <h3>Super global variables</h3>
    <?php
        /*
            The 6 most global variables are calles SGV
            1> $GLOBAL
            2> $_SERVER
            3> $_REQUEST
            4> $_FILES
            5> $_SESSION
            6> $_ENV

            // IMP ** => 3 most IMP SG : 1> $_GET : when user search on browser it gets url and GET for ourself  2> $_POST : Used in WEB Forms To send the data on server 3> $_COOKIE : Give user result by his previous track
        */

        // fisrt $GLOBAL
        $x = 5;
        $y = 10;

        function add() {
            $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
        }
        add();
        echo "I am z shows the result : ", $z;
        // It is remove the manualy declaring the global var under the function

        
    ?>

    <pre>
        <?php
            // All the $GLOBALS structure
            print_r($GLOBALS);

            /*
                        Array
(
    [_GET] => Array
        (
        )

    [_POST] => Array
        (
        )

    [_COOKIE] => Array
        (
        )

    [_FILES] => Array
        (
        )

    [GLOBALS] => Array
 *RECURSION*
    [outervar] => I am outer var
    [innervar] => I am inner
    [val1] => 5
    [global_var] => 3.4
    [x] => 5
    [y] => 10
    [z] => 15
)
            */
        ?>  
    </pre>
</body>
</html>