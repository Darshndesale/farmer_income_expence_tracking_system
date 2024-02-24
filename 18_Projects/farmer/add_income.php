<?php
include 'db.php';
session_start();
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$farmID = isset($_SESSION['farmID']) ? $_SESSION['farmID'] : 0;
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>
    <link rel="stylesheet" href="style6.css">
</head>
<body>

<div class="container">
    <div class="dashboard">
        <h1>Dashboard</h1>
        <nav>
            <ul>
                <li><a href="add_income.php">Add Income</a></li>
                <li><a href="add_expense.php?farmId=<?php echo $farmID; ?>">Add Expense</a></li>
                <li><a href="view_expenses.php">View Expense</a></li>
                <li><a href="view_income.php">View Income</a></li>
                <li><a href="reports.php">Reports</a></li>
            </ul>
        </nav>
    </div>
    <script>
         function goBack() {
            window.history.back();
         }
        
         function redirectToLogin() {
            window.location.href = "login.php";
         }
    </script>
    <div class="right-column">
    <h1>Add Income Details</h1><hr/>
    <a class="back-btn" onclick="goBack()">Back</a>
    <br>
    <div class="content">
        <form method="post" action="">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="income_source">Income Source:</label>
        <select id="income_source" name="income_source" required>
        <option value="crop">Crop Sales</option>
        <option value="livestock">Livestock Sales</option>
        <option value="dairy">Dairy Products</option>
        <option value="poultry">Poultry and Eggs</option>
        <option value="fishery">Fishery</option>
        <option value="horticulture">Horticulture (Fruits and Vegetables)</option>
        <option value="agroforestry">Agroforestry Products</option>
        <option value="apiculture">Apiculture (Beekeeping)</option>
        <option value="agrifood">Agri-Food Processing</option>
        <option value="farmtourism">Farm Tourism</option>
        <option value="agriinputs">Agricultural Inputs Sales</option>
        <option value="contractfarming">Contract Farming</option>
        <option value="farmequipment">Farm Equipment Rentals/Sales</option>
        <option value="agriconsultancy">Agricultural Consultancy</option>
        <option value="organicfarming">Organic Farming</option>
        <option value="agritourism">Agritourism</option>
        <option value="other">Other</option>
        </select><br>

        <label for="income_name">Name:</label>
        <input type="text" id="income_name" name="income_name" required><br>

        <label for="quantiy">Quantity:</label>
        <input type = "text" id="quantity" name="quantity" required><br>

        <label for="units">Units:</label>
        <input type="text" id="units" name="units" required><br>

        <label for="rate">Rate:</label>
        <input type="text" id="rate" name="rate" required><br>

        <label for="buyer">Buyer/Borrower:</label>
        <input type="buyer" id="buyer" name="buyer" required><br>

        <input type="submit" value="Add Income">
            </form>
        </div>
    </div>
    <button class="logout-btn" onclick="redirectToLogin()">Logout</button>
</div>
</body>
</html>
