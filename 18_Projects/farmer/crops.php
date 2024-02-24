<?php
session_start();

include 'db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"]; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farm_id = $_POST["farm_id"];
    $season = $_POST["season"];
    $farming_type = $_POST["farming_type"];
    $crop_names = isset($_POST["crop_name"]) ? (array)$_POST["crop_name"] : []; 
    $sizes = $_POST["size"];
    $units = $_POST["units"];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $conn->prepare("INSERT INTO crops (user_id, farm_id, season, farming_type, CropName, size, units) VALUES (?, ?, ?, ?, ?, ?, ?)");
        foreach ($crop_names as $index => $crop_name) {
            $size = $sizes[$index];
            $unit = $units[$index];
            $stmt->execute([$user_id, $farm_id, $season, $farming_type, $crop_name, $size, $unit]);
        }
        header('Location: view_crop.php');
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Details</title>
    <link rel="stylesheet" href="style14.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    <div class="content">
        <h2>Crop Details</h2><hr>
        <a class="back-btn" onclick="goBack()">Back</a>
        <form id="cropForm" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="farm_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

            <label for="season">Season:</label>
            <select id="season" name="season" required>
                <option value="Kharif">Kharif</option>
                <option value="Rabi">Rabi</option>
                <option value="Zaid">Zaid</option>
            </select>
            
            <label for="farming_type">Farming Type:</label>
            <fieldset>
                <input type="radio" id="monoculture" name="farming_type" value="Monoculture" required>
                <label for="monoculture">Monoculture</label><br>
                <input type="radio" id="multiculture" name="farming_type" value="Multiculture" required>
                <label for="multiculture">Multiculture</label><br>
            </fieldset>

            <label for="crop_name">Crop Name:</label>
            <fieldset id="crop_names_fieldset">
               
            </fieldset>
            <button type="button" id="confirmSelection">Confirm Selection Of Crops</button><br/>
            <div id="sizeUnitsFields">
                
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<button class="logout-btn" onclick="redirectToLogin()">Logout</button>
<script src="script3.js"></script>
</body>
</html>
