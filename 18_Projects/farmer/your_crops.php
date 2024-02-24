<?php
include 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM crops WHERE user_id = '$user_id'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Crops</title>
    <link rel="stylesheet" href="style15.css">
</head>
<body>

    <div class="container">
        <div class="dashboard">
            <h1>Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="crops.php">Add Another Crop</a></li>
                    <li><a href="view_crop.php">View Crop Details</a></li>
                    <li><a href="your_crops.php">View Your Crops</a></li>
                </ul>
            </nav>
        </div>
        <script>
        function goBack() {
            window.history.back();
        }
        </script>
        <div class="content">
            <h2>View Crops</h2><hr/>
            <a class="back-btn" onclick="goBack()">Back</a>
            <form>
                <div class="crop-list">
                    <?php
                    $cropNumber = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='crop'>";
                            echo "<h3>Crop " . $cropNumber . " : " . $row['CropName'] . "</h3>";
                            echo "<a href='dashboard.php?id=" . $row['id'] . "'>Click here to view the crop</a>";
                            echo "</div>";
                            $cropNumber++;
                        }
                    } else {
                        echo "<p>No crops found</p>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <button class="logout-btn" onclick="redirectToLogin()">Logout</button>
    <script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }
    </script>

</body>
</html>
