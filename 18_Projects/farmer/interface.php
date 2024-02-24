<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers Income and Expenditure Management</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h1>Farmers Income and Expenditure Management</h1>
    </header>
    <div class="login-register-buttons"><center>
            <?php if(isset($_SESSION["user_id"])): ?>
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Register</a>
            <?php endif; ?>
            </center>
    </div>
    <section class="main-content">
        <div class="module">
            <h2>Farming Activities</h2>
            <p>Manage your farming expenses and income efficiently.</p>
            <a <?php if(!isset($_SESSION["user_id"])) { echo "disabled"; } ?> href="<?php if(isset($_SESSION["user_id"])) { echo "farms.php"; } else { echo "login.php"; } ?>" class="btn">Click Here</a>
        </div>

        <div class="module">
            <h2>Household Activities</h2>
            <p>Manage your household expenses and income easily.</p>
            <a <?php if(!isset($_SESSION["user_id"])) { echo "disabled"; } ?> href="<?php if(isset($_SESSION["user_id"])) { echo "household.html"; } else { echo "login.php"; } ?>" class="btn">Click Here</a>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Farmers Income and Expenditure Management</p>
    </footer>
</body>
</html>
