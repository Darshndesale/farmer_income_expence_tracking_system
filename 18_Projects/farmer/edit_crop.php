<?php
session_start();

include 'db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $season = $_POST["season"];
    $farming_type = $_POST["farming_type"];
    $crop_name = $_POST["crop_name"];
    $size = $_POST["size"];
    $units = $_POST["units"];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE crops SET season=?, farming_type=?, CropName=?, size=?, units=? WHERE id=?");
        $stmt->execute([$season, $farming_type, $crop_name, $size, $units, $id]);
        header('Location: view_crop.php');
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM crops WHERE id=?");
        $stmt->execute([$id]);
        $crop = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>Edit Crop</title>
    <link rel="stylesheet" href="style14.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<script>
    function goBack()
    {
        window.history.back();
    }
    function redirectToLogin() {
    window.location.href = "login.php";
}
const cropsData = {
    Kharif: [
        "Rice - तांदूळ (Tandul)",
        "Maize - मका (Maka)",
        "Sorghum - ज्वारी (Jwari)",
        "Pearl Millet - बाजरी (Bajri)",
        "Finger Millet - नाचणी (Nachani)",
        "Pigeon Pea - तूर (Tur)",
        "Black Gram - उडीद (Udid)",
        "Green Gram - मूग (Moong)",
        "Soybean - सोयाबीन (Soyabin)",
        "Groundnut - भुईमुग (Bhuimug)",
        "Sunflower - सूर्यफुल (Suryaphul)"
    ],
    Rabi: [
        "Wheat - गहू (Gahu)",
        "Barley - जौ (Jau)",
        "Gram - चना (Chana)",
        "Mustard - मोहरी (Mohri)",
        "Linseed - जवस (Javas)",
        "Peas - मटार (Matar)",
        "Chickpea - चना (Chana)",
        "Lentil - मसूर (Masur)",
        "Field Pea - वाटाणा (Vatana)",
        "Faba Bean - वाटाण (Vatan)",
        "Rapeseed - तूप (Toop)",
        "Safflower - केशर (Kesari)"
    ],
    Zaid: [
        "Cucumber - काकडी (Kakdi)",
        "Watermelon - कलंगडी (Kalingadi)",
        "Muskmelon - केसर (Kesar)",
        "Bottle Gourd - दुधी (Dudhi)",
        "Okra - भेंडी (Bhendi)",
        "Bitter Gourd - कारला (Karla)",
        "Sponge Gourd - गावर (Ghewar)",
        "Cowpea - वारी (Vari)",
        "Pointed Gourd - परवळ (Parval)",
        "Sweet Corn - स्वीट कॉर्न (Sweet Corn)",
        "Green Peas - हरभरा (Harbhara)"
    ]
};


$(document).ready(function() {
    $('#monoculture').change(function() {
        toggleCropSelection();
    });

    $('#multiculture').change(function() {
        toggleCropSelection();
    });

    $('#confirmSelection').click(function() {
        createSizeUnitsFields();
    });
});

function toggleCropSelection() {
    const farmingType = $('input[name="farming_type"]:checked').val();
    const cropNamesFieldset = $('#crop_names_fieldset');

    cropNamesFieldset.empty();

    if (farmingType === "Monoculture") {
        const selectedCropType = $('#season').val();
        if (selectedCropType in cropsData) {
            cropsData[selectedCropType].forEach(function(crop) {
                const input = $('<input type="radio">')
                    .attr('name', 'crop_name')
                    .attr('value', crop)
                    .attr('required', true);
                const label = $('<label>').text(crop);
                cropNamesFieldset.append(input).append(label).append('<br>');
                
            });
        }
    } else if (farmingType === "Multiculture") {
        const selectedCropType = $('#season').val();
        if (selectedCropType in cropsData) {
            cropsData[selectedCropType].forEach(function(crop) {
                const input = $('<input type="checkbox">')
                    .attr('name', 'crop_name[]')
                    .attr('value', crop);
                const label = $('<label>').text(crop);
                cropNamesFieldset.append(input).append(label).append('<br>');
            });
        }
    }
}

</script>
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
        <h2>Edit Crop</h2><hr>

        <a class="back-btn" onclick="goBack()">Back</a>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $crop['id']; ?>">
            <label for="season">Season:</label>
            <select id="season" name="season" required>
                <option value="Kharif" <?php if ($crop['season'] == 'Kharif') echo 'selected'; ?>>Kharif</option>
                <option value="Rabi" <?php if ($crop['season'] == 'Rabi') echo 'selected'; ?>>Rabi</option>
                <option value="Zaid" <?php if ($crop['season'] == 'Zaid') echo 'selected'; ?>>Zaid</option>
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

            <label for="size">Size:</label>
            <input type="text" id="size" name="size" value="<?php echo $crop['size']; ?>" required>

            <label for="units">Units:</label>
            <select id="units" name="units" required>
                <option value="Hectar" <?php if ($crop['units'] == 'Hectar') echo 'selected'; ?>>Hectar</option>
                <option value="Acre" <?php if ($crop['units'] == 'Acre') echo 'selected'; ?>>Acre</option>
                <option value="Bigha" <?php if ($crop['units'] == 'Bigha') echo 'selected'; ?>>Bigha</option>
                <option value="Square Metres" <?php if ($crop['units'] == 'Square Metres') echo 'selected'; ?>>Square Metres</option>
            </select>

            <button type="submit">Update</button>
        </form>
    </div>
</div>
<button class="logout-btn" onclick="redirectToLogin()">Logout</button>
</body>
</html>

