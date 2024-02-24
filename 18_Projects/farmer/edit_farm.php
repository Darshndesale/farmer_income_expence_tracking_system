<?php
include 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farm_id = $_POST["farm_id"]; 
    $farm_name = $_POST["farm_name"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $taluka = $_POST["taluka"];
    $size = $_POST["size"];
    $units = $_POST["units"];

    $sql = "UPDATE farms SET farm_name='$farm_name', state='$state', district='$district', taluka='$taluka', size='$size', units='$units' WHERE id='$farm_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_farms.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET["id"])) {
    $farm_id = $_GET["id"];
    $sql = "SELECT * FROM farms WHERE id='$farm_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $farm_name = $row["farm_name"];
        $state = $row["state"];
        $district = $row["district"];
        $taluka = $row["taluka"];
        $size = $row["size"];
        $units = $row["units"];
    } else {
        echo "Farm not found.";
        exit();
    }
} else {
    echo "Farm ID not provided.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Farm Details</title>
    <link rel="stylesheet" href="style12.css">
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
            <h2>Edit Farm Details</h2><hr>
            <a class="back-btn" onclick="goBack()">Back</a>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="farm_id" value="<?php echo $farm_id; ?>">
                <label for="farm_name">Farm Name:</label>
                <input type="text" name="farm_name" value="<?php echo $farm_name; ?>" required>

                <label for="state">State:</label>
                <select id="state" name="state" value="<?php echo $state; ?>" required>
                </select>

                <label for="district">District:</label>
                <select id="district" name="district" value="<?php echo $district; ?>" required>  
                </select>
                <label for="taluka">Taluka:</label>
                <input type="text" name="taluka" value="<?php echo $taluka; ?>" required>

                <label for="size">Size:</label>
                <input type="text" name="size" value="<?php echo $size; ?>" required>

                <label for="units">Units:</label>
                <select id="units" name="units" required>
                    <option <?php if ($units == "Hectar") echo "selected"; ?>>Hectar</option>
                    <option <?php if ($units == "Bigha") echo "selected"; ?>>Bigha</option>
                    <option <?php if ($units == "Acre") echo "selected"; ?>>Acre</option>
                    <option <?php if ($units == "Square Metres") echo "selected"; ?>>Square Metres</option>
                </select>
                <button type="submit">Update</button>
            </form>
            </form>
        </div>
    </div>

    <button class="logout-btn" onclick="redirectToLogin()">Logout</button>
    <script src="script2.js"></script>
    <script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }
    </script>

</body>
</html>
