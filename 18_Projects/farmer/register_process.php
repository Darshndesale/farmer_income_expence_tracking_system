
<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkUser = $conn->prepare("SELECT id FROM users WHERE username = ? OR mobile = ?");
    $checkUser->bind_param("ss", $username, $mobile);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        echo "Error: Username or email already registered.";
        exit();
    }

    $insertUser = $conn->prepare("INSERT INTO users (username, password, mobile) VALUES (?, ?, ?)");
    $insertUser->bind_param("sss", $username, $hashedPassword, $mobile);

    if ($insertUser->execute()) {
        header("Location: login.php");
    } else {
        echo "Error: " . $insertUser->error;
    }

    $insertUser->close();
    $conn->close();
}
?>
