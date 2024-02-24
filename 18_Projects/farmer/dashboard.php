<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['user_id']; 
$id = isset($_GET['id']) ? $_GET['id'] : null; 

$sql = "SELECT CropName FROM crops WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cropGrownData = $result->fetch_assoc();
        $cropGrown = $cropGrownData['CropName']; 
    } else {
        $cropGrown = 'Unknown';
    }

    $stmt->close();
} else {
    $cropGrown = 'Unknown';
}

$incomeSql = "SELECT income_amount FROM income WHERE user_id = ?";
$incomeStmt = $conn->prepare($incomeSql);

$totalIncome = 0;

if ($incomeStmt) {
    $incomeStmt->bind_param("i", $userID);
    $incomeStmt->execute();
    $incomeResult = $incomeStmt->get_result();

    while ($incomeRow = $incomeResult->fetch_assoc()) {
        $totalIncome += $incomeRow['income_amount'];
    }

    $incomeStmt->close();
}

$expenseSql = "SELECT total FROM expenses WHERE user_id = ? AND farm_id = ?";
$expenseStmt = $conn->prepare($expenseSql);

$totalExpense = 0;

if ($expenseStmt) {
    $expenseStmt->bind_param("ii", $userID, $farmID);
    $expenseStmt->execute();
    $expenseResult = $expenseStmt->get_result();

    while ($expenseRow = $expenseResult->fetch_assoc()) {
        $totalExpense += $expenseRow['total'];
    }

    $expenseStmt->close();
}

$profit = $totalIncome - $totalExpense;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Dashboard</title>
    <link rel="stylesheet" href="style4.css">
</head>

<body>

    <div class="container">
        <div class="dashboard">
            <h1>Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="add_income.php">Add Income</a></li>
                    <li><a href="add_expense.php">Add Expense</a></li>
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
        <div class="content">
            <h1>Crop Grown: <?php echo $cropGrown; ?></h1>
            <hr>
            <a class="back-btn" onclick="goBack()">Back</a>
            <br>
            <br>
            <div class="dashboard-item">
                <h3>Income </h3>
                <p>Total Income:<?php echo number_format($totalIncome, 2); ?></p>
            </div>
            <div class="dashboard-item">
                <h3>Expense </h3>
                <p>Total Expense:<?php echo number_format($totalExpense, 2); ?></p>
            </div>
            <div class="dashboard-item">
                <h3>Profit</h3>
                <p>
                    <?php
                    if ($profit > 0) {
                        echo "We are in profit! Profit: " . number_format($profit, 2);
                    } elseif ($profit < 0) {
                        echo "We are in loss! Loss: " . number_format(abs($profit), 2);
                    } else {
                        echo "No profit, no loss.";
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <button class="logout-btn" onclick="redirectToLogin()">Logout</button>
</body>

</html>
