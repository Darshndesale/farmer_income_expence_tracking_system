<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02 Form file ka child connect to server</title>
</head>
<body>
    <?php
        // so we check that what the form 2 file sends Using the SGV $_POST variable
        print_r($_POST); // it gives me the all info when I fill in the form from filling to click on submite POWERFULL
        // In 02_chil.php => doutput : Array ( [email] => darshandesale18@gmail.com [password] => 123 [submit] => Login! )

        // We manupulate on the data it _post gets 
        $username = $_POST["email"];
        $pass = $_POST["password"];
        $submit = $_POST["submit"];

        if(isset($_POST['submit']))
        {
            echo "Login successfully....<br>"; // run done
            echo "Welcome : {$username}<br>";
        }
        // Tha tmeans out files are connected successfuly..

        // we simply apply some validations
        if(isset($username) && !empty($username)) // not empty
        {
            echo "Username is set as : {$username} <br>";
        }
        else{
            echo "User name to dalo";
        }

        // we also apply more validations

        // Note that When we reload the child file it gives the error becuse after refresh it is useless untill we call this from the main website
    ?>
</body>
</html>