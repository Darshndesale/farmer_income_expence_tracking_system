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
    <link rel="stylesheet" href="style11.css">
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
        <div class="content">
            <h2>View Farms</h2><hr/>
            <script>
        function goBack() {
            window.history.back();
        }
        </script>
            <a class="back-btn" onclick="goBack()">Back</a>
            <form>  
            <table>
                <thead>
                    <tr>
                        <th style="color: #4CAF50;">Farm Name</th>
                        <th style="color: #4CAF50;">State</th>
                        <th style="color: #4CAF50;">District</th>
                        <th style="color: #4CAF50;">Taluka</th>
                        <th style="color: #4CAF50;">Size</th>
                        <th style="color: #4CAF50;">Units</th>
                        <th style="color: #4CAF50;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['farm_name'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['district'] . "</td>";
                            echo "<td>" . $row['taluka'] . "</td>";
                            echo "<td>" . $row['size'] . "</td>";
                            echo "<td>" . $row['units'] . "</td>";
                            echo "<td><a href='edit_farm.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_farm.php?id=" . $row['id'] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No farms found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
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
