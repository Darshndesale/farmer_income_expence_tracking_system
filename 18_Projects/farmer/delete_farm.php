<?php
include 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $farm_id = $_GET["id"];
    $sql = "DELETE FROM farms WHERE id = '$farm_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_farm.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
