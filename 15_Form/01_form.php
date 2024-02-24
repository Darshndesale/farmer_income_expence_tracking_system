<?php
    // first check karo ki POST me Submite ka role he ya nahi
    if(isset($_POST["submit"])) { // the meaning is that we click on submite and move the data to server
        // first connect the fields of the form with the php to interact
    $username = $_POST["email"]; // grab the username For making SUPER GLOBAL VARIABLES 
    $password = $_POST["password"];

    // check out one scenario
    if($username == "darshan@123" && $password == "123") {
        echo "<h2>Welcome : {$_POST["email"]}</h2>";
        echo "<script>
        console.log('hi.....')
        </script>";
    }
    else {
        echo "<h2>Account does not exit ... THANKS</h2>";
    }
    }
    else {
        echo "<h2>Login requred...</h2>";
    }
    // But only this program get a the undefines error becuse we do not perform any operations on the form
    // to chalo form ko dekhte he
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<!-- // without take the action && POST super variable it not work mean only send data  -->
<fieldset>
<legend>HTML FORM</legend>
<form action="01_form.php" method="POST"> 
    <label for="email">email: </label>
    <input type="email" name="email">
    <br>
    <label for="password">password: </label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Login!" name="submit">
</form>
</fieldset>
</body>
</html>