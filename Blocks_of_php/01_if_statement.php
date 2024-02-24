<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $voter_age = 16;

        if($voter_age < 18) {
            $rem = 18 - $voter_age;
            echo "You are eligible for after ($rem) years";
        } else if($voter_age >= 18) {
            echo "You are eligible for eligible";
        } else{
            echo "You are not eligible for eligible";
        }

        // Note : we also use the multiple conditions inside an if statement like : && || ! etc

        /* ********** operators *********
            1> () 2> *,/ 3> +,- (BODMAS) rule is apply
            () => higher precedence 

            1> " = " => Assignment op
            2> " == " => Equality check
            3> " === " => striclty check op (both d.t is same)
            4> > < >= <=
            5> && || ==
            6> modulus % => get the remainder
            7> INC && DEC => ++ , -- || postfix => a++ || prefix => --a 
            8> Ternary operator => $res = (condition) ? (true statement) : (false statement);
        */

    ?>
</body>
</html>