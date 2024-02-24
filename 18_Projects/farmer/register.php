
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Registration</title>
</head>
<body>
    <header>
        <h1>Registration</h1>
    </header>
    <br/><br/><br/><br/>
    <main>
        <form action="register_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="mobile" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
        <p>Already Registered? <a href="login.php">Login here</a></p>
    </main>
</body>
</html>
