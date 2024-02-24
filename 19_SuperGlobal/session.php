<?php
        /*
            1> 'O' Session is the server side Cookie
            2> We thing as the session as the cookie
            3> It not store the cookie or session at client rether tha the server
            4> Much faster than cookie
            5> It i secure : Reason => At the browsing time session is start and it is directly end on server means secure landing 
            6> End after close window
        */
    ?>  

    <?php
        // step 1: call fun() session_start();
        session_start();
    ?>
    <?php
        // step 2 : store the variables name to our session
        $_SESSION['Name'] = "Darshan Desale";
        $Name = $_SESSION['Name'];
        echo $Name;

        // output : Darshan Desale
    ?>
    <hr>
    <?php
        // step 2 : store the variables name to our session
        $_SESSION['Age'] = 18;
        $Age = $_SESSION['Age'];
        echo $Age;

        // output : 18
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*
            // ******* Real time Example *******
            How can I make a real-time PHP sessions control? I mean, when a user logs in, I create a PHP session ($_SESSION[]) and I store it in a table (MySQL) but how can I tell when the user logs out? I can obviously detect when the user logs out and destroy the session but what happens if the user never clicks log out how can I detect whenever the session is closed?
        */
    ?>
</body>
</html>