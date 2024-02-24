<?php
include 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $farm_name = $_POST["farm_name"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $taluka = $_POST["taluka"];
    $size = $_POST["size"];
    $units = $_POST["units"];
    $sql = "INSERT INTO farms (user_id, farm_name, state, district, taluka, size, units, created_at) VALUES ('$user_id', '$farm_name', '$state', '$district', '$taluka', '$size', '$units', NOW())";

    if ($conn->query($sql) === TRUE) {
        header('Location: view_farm.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<script>
        function goBack() {
            window.history.back();
        }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Details</title>
    <link rel="stylesheet" href="style9.css">
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
            <h2>Farm Details</h2><hr>
            <a class="back-btn" onclick="goBack()">Back</a>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="farm_name">Farm Name:</label>
                <input type="text" name="farm_name" required>

                <label for="state">State:</label>
                <select id="state" name="state" required>
                </select>

                <label for="district">District:</label>
                <select id="district" name="district" required>  
                </select>

                <label for="taluka">Taluka:</label>
                <input type="text" name="taluka" required>

                <label for="size">Size:</label>
                <input type="text" name="size" required>

                <label for="units">Units:</label>
                <select id="units" name="units" required>
                    <option>Hectar</option>
                    <option>Bigha</option>
                    <option>Acre</option>
                    <option>Square Metres</option>

                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <button class="logout-btn" onclick="redirectToLogin()">Logout</button>
    <script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }
   </script>

    <script src="script2.js"></script>
</body>
</html>
