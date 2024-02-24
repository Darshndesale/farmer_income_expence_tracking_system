<?php
session_start();

include 'db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT crops.*, farms.farm_name FROM crops INNER JOIN farms ON crops.farm_id = farms.id WHERE crops.user_id = ?");
    $stmt->execute([$user_id]);
    $crops = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Crop Details</title>
    <link rel="stylesheet" href="style11.css">
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
        <script>
        function goBack() {
            window.history.back();
        }
        function redirectToLogin() {
            window.location.href = 'login.php';
        }
        </script>
            <a class="back-btn" onclick="goBack()">Back</a>
        <table>
            <thead>
                <tr>
                    <th>Farm Name</th>
                    <th>Season</th>
                    <th>Farming Type</th>
                    <th>Crop Name</th>
                    <th>Size</th>
                    <th>Units</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($crops as $crop): ?>
                    <tr>
                        <td><?php echo $crop['farm_name']; ?></td>
                        <td><?php echo $crop['season']; ?></td>
                        <td><?php echo $crop['farming_type']; ?></td>
                        <td><?php echo $crop['CropName']; ?></td>
                        <td><?php echo $crop['size']; ?></td>
                        <td><?php echo $crop['units']; ?></td>
                        <td>
                            <a href="edit_crop.php?id=<?php echo $crop['id']; ?>">Edit</a> | 
                            <a href="delete_crop.php?id=<?php echo $crop['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<button class="logout-btn" onclick="redirectToLogin()">Logout</button>
</body>
</html>
