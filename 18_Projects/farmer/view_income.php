<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Income</title>
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
                <h2>Income Details</h2>

                <?php
                if ($result === false) {
                    echo "Error: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Date</th><th>Income Source</th><th>Income Name</th><th>Income Amount</th><th>Description</th><th>Action</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . date('d m Y', strtotime($row['date'])) . "</td>";
                            echo "<td>" . $row['income_source'] . "</td>";
                            echo "<td>" . $row['income_name'] . "</td>";
                            echo "<td>" . $row['income_amount'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td><a href='edit_income.php?id=" . $row['id'] . "&farmId=" . $farmID . "'>Edit</a> | <a href='delete_income.php?id=" . $row['id'] . "&farmId=" . $farmID . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No income records found.</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>
