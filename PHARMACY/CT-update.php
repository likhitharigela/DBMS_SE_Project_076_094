<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry1 = "SELECT * FROM clinicaltrials WHERE trial_id='$id'";
    $result = $conn->query($qry1);
    $row = $result->fetch_assoc(); // Use fetch_assoc() for associative array
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="form4.css">
    <title>Update Clinical Trial</title>
</head>

<body>

    <div class="sidenav">
        <h2 style="font-family:Arial; color:white; text-align:center;"> PHARMACIA </h2>
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
            <a href="expiryreport.php">Medicines - Soon to Expire</a>
            <a href="salesreport.php">Transactions Reports</a>
        </div>
    </div>

    <div class="topnav">
        <a href="logout.php">Logout</a>
    </div>

    <center>
        <div class="head">
            <h2> UPDATE CLINICAL TRIAL DETAILS</h2>
        </div>
    </center>

    <div class="one">
        <div class="row">

        <?php
        if (isset($_POST['update'])) {
            $id = mysqli_real_escape_string($conn, $_REQUEST['trial_id']);
            $employee_id = mysqli_real_escape_string($conn, $_REQUEST['employee_id']);
            $trial_name = mysqli_real_escape_string($conn, $_REQUEST['trial_name']);
            $start_date = mysqli_real_escape_string($conn, $_REQUEST['start_date']);
            $end_date = mysqli_real_escape_string($conn, $_REQUEST['end_date']);
            $status = mysqli_real_escape_string($conn, $_REQUEST['status']);

            // Corrected the SQL update statement
            $sql = "UPDATE clinicaltrials
                    SET emp_id='$employee_id', trial_name='$trial_name', start_date='$start_date', end_date='$end_date', status='$status'
                    WHERE trial_id='$id'";

            if ($conn->query($sql)) {
                header("Location: CT-view.php");
                exit(); // Ensure to exit after header redirect
            } else {
                echo "<p style='font-size:8; color:red;'>Error! Unable to update: " . $conn->error . "</p>";
            }
        }
        ?>

            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="column">
                    <p>
                        <label for="trial_id">Trial ID:</label><br>
                        <input type="number" name="trial_id" value="<?php echo $row['trial_id']; ?>" readonly>
                    </p>
                    <p>
                        <label for="employee_id">Employee ID:</label><br>
                        <input type="number" name="employee_id" value="<?php echo $row['emp_id']; ?>">
                    </p>
                    <p>
                        <label for="trial_name">Trial Name:</label><br>
                        <input type="text" name="trial_name" value="<?php echo $row['trial_name']; ?>">
                    </p>
                    <p>
                        <label for="start_date">Start Date:</label><br>
                        <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>">
                    </p>
                    <p>
                        <label for="end_date">End Date:</label><br>
                        <input type="date" name="end_date" value="<?php echo $row['end_date']; ?>">
                    </p>
                    <p>
                        <label for="status">Status:</label><br>
                        <input type="text" name="status" value="<?php echo $row['status']; ?>">
                    </p>
                </div>

                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>

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
