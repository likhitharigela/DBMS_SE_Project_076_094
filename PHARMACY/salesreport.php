<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="table1.css?v=2">
    <link rel="stylesheet" type="text/css" href="form3.css?v=3">
    <title>Reports</title>
    <style>
        body {
            font-family: Arial;
        }
    </style>
</head>

<body>

    <div class="sidenav">
        <div class="header">
            <h3>Menu</h3>
        </div>
        <a href="adminmainpage.php">Dashboard</a>
        <button class="dropdown-btn">Inventory
            <i class="down"></i>
        </button>
        <div class="dropdown-container">
            <a href="inventory-add.php">Add New Medicine</a>
            <a href="inventory-view.php">Manage Inventory</a>
        </div>
        <button class="dropdown-btn">Suppliers
            <i class="down"></i>
        </button>
        <div class="dropdown-container">
            <a href="supplier-add.php">Add New Supplier</a>
            <a href="supplier-view.php">Manage Suppliers</a>
        </div>
        <button class="dropdown-btn">Clinical Trials</button>
        <div class="dropdown-container">
            <a href="CT-add.php">Add New Clinical Trial</a>
            <a href="CT-view.php">Manage Clinical Trials</a>
        </div>
        <button class="dropdown-btn">Stock Purchase
            <i class="down"></i>
        </button>
        <div class="dropdown-container">
            <a href="purchase-add.php">Add New Purchase</a>
            <a href="purchase-view.php">Manage Purchases</a>
        </div>
        <button class="dropdown-btn">Employees
            <i class="down"></i>
        </button>
        <div class="dropdown-container">
            <a href="employee-add.php">Add New Employee</a>
            <a href="employee-view.php">Manage Employees</a>
        </div>
        <button class="dropdown-btn">Customers
            <i class="down"></i>
        </button>
        <div class="dropdown-container">
            <a href="customer-add.php">Add New Customer</a>
            <a href="customer-view.php">Manage Customers</a>
        </div>
        <a href="sales-view.php">View Sales Invoice Details</a>
        <a href="salesitems-view.php">View Sold Products Details</a>
        <a href="pos1.php">Add New Sale</a>
        <button class="dropdown-btn">Reports
            <i class="down"></i>
        </button>
        <div class="dropdown-container">
            <a href="stockreport.php">Medicines - Low Stock</a>
            <a href="salesreport.php">Transactions Reports</a>
        </div>
    </div>

    <div class="topnav">
        <a class="brand" href="#">MedNova</a>
        <a href="logout.php">Logout</a>
    </div>

    <center>
        <div class="head">
            <h2>TRANSACTION REPORTS</h2>
        </div>

        <br><br><br><br><br><br><br><br><br>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <p>
                <label for="start">Start Date:</label>
                <input type="date" name="start" required>
            </p>
            <p>
                <label for="end">End Date:</label>
                <input type="date" name="end" required>
            </p>
            <input type="submit" name="submit" value="View Records">
        </form>

        <?php
include "config.php";
if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $end = date('Y-m-d H:i:s', strtotime($_POST['end'])); // Ensure correct date format

    echo "<p>Start Date: " . htmlspecialchars($start) . "</p>";
    echo "<p>End Date: " . htmlspecialchars($end) . "</p>";

    // Debugging: Print the SQL query
    $sql = "SELECT sale_id, c_id, e_id, s_date, total_amt FROM sales WHERE s_date >= '$start' AND s_date <= '$end' ORDER BY s_date ASC;";
    $sales_result = $conn->query($sql);

    if (!$sales_result) {
        die("SQL Error: " . $conn->error);
    }

    echo '<table align="right" id="table1" style="margin-right:100px;">';
    echo '<tr>';
    echo '<th>Sale ID</th>';
    echo '<th>Customer ID</th>';
    echo '<th>Employee ID</th>';
    echo '<th>Date</th>';
    echo '<th>Sale Amount (in Rs)</th>';
    echo '</tr>';

    if ($sales_result->num_rows > 0) {
        $totalSaleAmount = 0;
        while ($row = $sales_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["sale_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["c_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["e_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["s_date"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["total_amt"]) . "</td>";
            echo "</tr>";
            $totalSaleAmount += $row["total_amt"]; // Accumulate total sales amount
        }
        echo "<tr>";
        echo "<td colspan='4'>Total Amount</td>";
        echo "<td>Rs." . htmlspecialchars($totalSaleAmount) . "</td>";
        echo "</tr>";
    } else {
        echo "<tr><td colspan='5'>No sales found for the selected dates.</td></tr>";
    }
    echo '</table>';
}
?>

    </center>
</body>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>

</html>
