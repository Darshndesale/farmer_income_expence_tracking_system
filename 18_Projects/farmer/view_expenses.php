<?php
include 'db.php';
session_start();

$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$farmID = isset($_SESSION['farmID']) ? $_SESSION['farmID'] : 0;

$sql = "SELECT * FROM expenses WHERE user_id = '$userID' AND farm_id = '$farmID'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Expenses</title>
    <link rel="stylesheet" href="style7.css"> 
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
                    <li><a href="edit_crop.php">Change Crop</a></li>
                    <li><a href="farms.php">Add Farm</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="right-column">
            <div class="content">
                <h2>Expense List</h2>

                <?php
                if ($result->num_rows > 0) {
                    echo '<table border="1">
                        <tr>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Units</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                            <td>' . date('d m Y', strtotime($row['date'])) . '</td>
                            <td>' . $row['category'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['units'] . '</td>
                            <td>' . $row['quantity'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['total'] . '</td>
                            <td>' . $row['description'] . '</td>
                            <td>
                            <a href="edit_expense.php?id=' . $row['id'] . '&farmId=' . $farmID . '">Edit</a> |
                            <a href="delete_expense.php?id=' . $row['id'] . '&farmId=' . $farmID . '">Delete</a>
                            </td>
                        </tr>';
                    }

                    echo '</table>';
                } else {
                    echo 'No expenses found.';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

</body>

</html>
