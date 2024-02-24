<?php
include 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM farms WHERE user_id = '$user_id'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Farms</title>
    <link rel="stylesheet" href="style13.css">
</head>
<body>

    <div class="container">
        <div class="dashboard">
            <h1>Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="farms.php">Add Another Farm</a></li>
                    <li><a href="view_farm.php">View Farm Details</a></li>
                    <li><a href="your_farms.php">View Your Farms</a></li>
                </ul>
            </nav>
        </div>
        <script>
        function goBack() {
            window.history.back();
        }
        </script>
        <div class="content">
            <h2>View Farms</h2><hr/>
            <a class="back-btn" onclick="goBack()">Back</a>
            <form> <div class="farm-list">
                <?php
                $farmNumber = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='farm'>";
                        echo "<h3>Farm " . $farmNumber . " : " . $row['farm_name'] . "</h3>";
                        echo "<a href=' crops.php?id=" . $row['id'] . "'>Click here to view the farm</a>";
                        echo "</div>";
                        $farmNumber++;
                    }
                } else {
                    echo "<p>No farms found</p>";
                }
                ?>
            </div>
        </div>
    </div>
    </form>
    <button class="logout-btn" onclick="redirectToLogin()">Logout</button>
    <script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }
    </script>

</body>
</html>
