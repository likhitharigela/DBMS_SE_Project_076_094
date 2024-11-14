<?php 
    include "config.php";
    session_start();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Search functionality
    if (isset($_POST['search'])) {
        $search = $_POST['valuetosearch'];
        $query = "SELECT c_id, c_fname, c_lname, c_phno FROM `customer` 
                  WHERE CONCAT(c_id, c_fname, c_lname, c_phno) LIKE '%" . $search . "%';";
        $search_result = filterTable($query);
    } else {
        $query = "SELECT c_id, c_fname, c_lname, c_phno FROM `customer`";
        $search_result = filterTable($query);
    }

    // Function to execute queries and handle connection
    function filterTable($query) {
        $conn = mysqli_connect("localhost", "root", "LikH@24#", "pharmacy");
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $filter_result = mysqli_query($conn, $query);
        return $filter_result;
    }

    // Fetch the employee's first name to display in the header
    $sql = "SELECT E_FNAME FROM EMPLOYEE WHERE E_ID='$_SESSION[user]'";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $ename = $row[0];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="table1.css?v=2">
    <link rel="stylesheet" type="text/css" href="form2.css?v=3">
    <title>Customers</title>
</head>
<body>

    <div class="sidenav">
        <div class="header">
      			<h3>Menu</h3>
    	</div>
        <a href="pharmmainpage.php">Dashboard</a>
        <a href="pharm-inventory.php">View Inventory</a>
        <a href="pharm-pos1.php">Add New Sale</a>
        <button class="dropdown-btn">Customers<i class="down"></i></button>
        <div class="dropdown-container">
            <a href="pharm-customer.php">Add New Customer</a>
            <a href="pharm-customer-view.php">View Customers</a>
        </div>
    </div>

    <div class="topnav">
        <a class="brand" href="#">MedNova</a>
        <a href="logout1.php">Logout (signed in as <?php echo $ename; ?>)</a>
    </div>

    <center>
        <div class="head">
            <h2>CUSTOMER LIST</h2>
        </div>

        <form method="post">
            <input type="text" name="valuetosearch" placeholder="Enter any value to Search" style="width:400px; margin-left:250px;">&nbsp;&nbsp;&nbsp;
            <style>
 	            input[type="submit"] {
    	        background-color: #0d7377;
    	        color: #32e0c4;
    	        border: none;
    	        padding: 10px 20px;
    	        cursor: pointer;
    	        font-size: 16px;
   		        border-radius: 5px; 
 	        }
  
  	            input[type="submit"]:hover {
   		        opacity: 0.9; 
 	        }
	        </style>
            <input type="submit" name="search" value="Search">
            <br><br>
        </form> 
    </center>

    <table align="right" id="table1" style="margin-right:100px;">
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
        </tr>

        <?php
        if ($search_result && $search_result->num_rows > 0) {
            while ($row = $search_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["c_id"]. "</td>";
                echo "<td>" . $row["c_fname"] . "</td>";
                echo "<td>" . $row["c_lname"]. "</td>";
                echo "<td>" . $row["c_phno"]. "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table>

</body>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    for (var i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        });
    }
</script>
</html>
