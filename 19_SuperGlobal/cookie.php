<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>
<body>
    <?php
        /*
            Cookies in PHP play a crucial role in web development by enabling websites to store and retrieve information on a user's device. These small pieces of data, sent from a web server and stored on the user's browser, allow websites to remember user preferences, track sessions, and maintain state information.
        */

        // Cookies Is : If you log into the facebook.com after givint the email and password brow indicated the you save your password or not After the next day we use this website this not gives the password becuse our password is saved las day

        // cookie are in the client side 

        // Practically use of cookie

        // step 1: set our cookie SYNTAX : setcookie("","",Computer time);

        $ExpireTime = time()+86400; // Expire time after the 24 HR We convert this in sec 24 HR = 86400;
        setcookie("Name","darshan",$ExpireTime);
        setcookie("Age","18",$ExpireTime);
        
        // see the Structure of the $_Cookie
        print_r($_COOKIE) // Simply array is return

        // But we can accese our data from cookie
        // echo "My name is ".$_COOKIE['Name']."Age is ".$_COOKIE['Age'];


    ?>

    <?php
        echo "<br> My name is ".$_COOKIE['Name']."<br> Age is ".$_COOKIE['Age'];

        // output
        // Array ( [Name] => darshan [Age] => 18 )
        // My name is darshan
        // Age is 18
    ?>

    <?php
        // unsett the cookie
        // There is no no unset function is avialable only manualy technique
        
        // step 1: To subtract the time(curr_Time) To 24 = 86400 
        $ExpireTime_Unset = time()-86400; // it idicated cookie is Expire Becuase it covers 24 hr life cycle

        // step 2: to give expire time to unset the cookie
        setcookie("Name","darshan",$ExpireTime_Unset);

        if(isset($_COOKIE['Name']))
        {
            echo "Cookie is set with Name of ". $_COOKIE['Name'];
        } else {
            echo "Cookie is not set";
        }


        // 2nd way Give the cookie to NULL value
        // setcookie('name', null);
        // setcookie('name', "", $ExpireTime_Unset);
    ?>

    <!-- Note : To write the setcookie code At Header Part : Reason is When we check that our username and pass is set But it shows after the HTML This is wrong First check Set or not then continue -->
</body>
</html>