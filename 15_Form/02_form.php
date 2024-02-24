<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 2 to learn in depth</title>
</head>
<body>
    <!-- // same as laast; -->
<fieldset>
<legend>HTML FORM</legend>
<!-- // after click submite button it redirected to the child file line no :13 -->
<form action="02_child.php" method="POST">  
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