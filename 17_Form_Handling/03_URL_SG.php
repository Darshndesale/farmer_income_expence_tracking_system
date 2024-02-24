<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super global GET</title>
</head>
<body>
    <pre>
    <?php
        $Web = "Amazon India";
        $Search = "Amazon Software Engineer & Life";
        $Result = "https://".rawurlencode($Web)."?Search=".urlencode($Search);
        echo $Result; // this gives me the as it is result means web + search 
        // we Actualy pase it on browser chalo..
        // original : https://www.google.com/search?q=https%3A%2F%2FAmazon+India%3FSearch%3DAmazon+Software+Engineer+Life&rlz=1C1CHBF_enIN1033IN1034&oq=https%3A%2F%2FAmazon+India%3FSearch%3DAmazon+Software+Engineer+Life&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRg60gEHMjY4ajBqN6gCALACAA&sourceid=chrome&ie=UTF-8
        // + => space, %26 => &, It is ULR in coding only focus on % or any 
        // Result is Not searchable

        // ******* Then In thi case PHP function URL code *************
        // line no : 12 And see also the result out put
        // Output : $Result => https://Amazon+India?Search=Amazon+Software+Engineer+%26+Life

        // It the place of + As %20
        
        //Note : The rawUrl coding is best for part of first URl and urlencode is On search String => Indicates space we can raw it with %20
         print_r($_GET);

        // Then we can have the $_GET But we can requirement to print the Name in between data chalo..
        // IMP** => One criteria that  "the name should be same with your query paramaeter"
        // $name = $_GET['Name'];
        // echo $name;

        // When we accese the Position from $_GET this get abigues that it has some spaces then it confuse Then I remember ki ""Encode karna padega""
        // $po = $_GET['position'];
        // echo $po;
    ?>


    </pre>
</body>
</html>