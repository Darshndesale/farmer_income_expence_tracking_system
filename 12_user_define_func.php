<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User define function</title>
</head>
<body>
    <?php
        // sysntax of use define function
        /* function FunctionName($arg1, $argu2, $argu3..) {
            
         }*/

         function addition() {
            $a = 5;
            $b = 10;
            echo "The adition of two nuber is :",$a + $b, "<br>";
         }

         addition();

         // adition with giving some paramaeters
    ?>
    <hr>
    <h4>Addition with parameters</h4>
    <?php
        function Addition_Using_Func_Para($x,$y) {
            $result = $x + $y;
            echo $result,"<br>";
        }

        Addition_Using_Func_Para(10,15); // the 10 is save in $x and 15 in $y
        Addition_Using_Func_Para(165,150); // the 10 is save in $x and 15 in $y

        // best approach of To returning the value without relie on the Echo statements
        function return_value($num) {
            if($num % 2 == 0) {
                return 1;
            } else {
                // echo "hi";
                return 0;
            }
        }

        $returnVal = return_value(4);
        if($returnVal == 1) {
            echo "number is even <br>";
        } else {
            echo "number is odd <br>";
        }
    ?>

    <hr>
    <h3>Reusability of code</h3>
    using the user define function we accese this functions in anothor file to attach

    <?php
        // steps to use in this file function to anothor file as the even odd function 
        // first create the file
        // in file 2 include the (This file path)
        // and user the php code accese the all the variables function call from this file
        // Lets try...

        // Note : this all ramayan is execute when Save as of files both performs
    ?>
</body>
</html>