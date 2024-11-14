<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="nav2.css">
  <title>Admin Dashboard</title>
</head>

<body>
  <div class="sidenav">
  		<div class="header">
      		<h3>Menu</h3>
    	</div>
    <a href="adminmainpage.php">Dashboard</a>
    <button class="dropdown-btn">Inventory</button>
    <div class="dropdown-container">
      <a href="inventory-add.php">Add New Medicine</a>
      <a href="inventory-view.php">Manage Inventory</a>
    </div>
    <button class="dropdown-btn">Suppliers</button>
    <div class="dropdown-container">
      <a href="supplier-add.php">Add New Supplier</a>
      <a href="supplier-view.php">Manage Suppliers</a>
    </div>
    <button class="dropdown-btn">Clinical Trials</button>
    <div class="dropdown-container">
      <a href="CT-add.php">Add New Clinical Trial</a>
      <a href="CT-view.php">Manage Clinical Trials</a>
    </div>
    <button class="dropdown-btn">Stock Purchase</button>
    <div class="dropdown-container">
      <a href="purchase-add.php">Add New Purchase</a>
      <a href="purchase-view.php">Manage Purchases</a>
    </div>
    <button class="dropdown-btn">Employees</button>
    <div class="dropdown-container">
      <a href="employee-add.php">Add New Employee</a>
      <a href="employee-view.php">Manage Employees</a>
    </div>
    <button class="dropdown-btn">Customers</button>
    <div class="dropdown-container">
      <a href="customer-add.php">Add New Customer</a>
      <a href="customer-view.php">Manage Customers</a>
    </div>
    <a href="sales-view.php">View Sales Invoice Details</a>
    <a href="salesitems-view.php">View Sold Products Details</a>
    <a href="pos1.php">Add New Sale</a>
    <button class="dropdown-btn">Reports</button>
    <div class="dropdown-container">
      <a href="stockreport.php">Medicines - Low Stock</a>
      <a href="salesreport.php">Transactions Reports</a>
    </div>
  </div>

  <div class="topnav">
    <a class="brand" href="#">MedNova</a>
    <a href="logout.php">Logout (Logged in as Admin)</a>
  </div>

  <!-- Main Content Area -->
  <div class="main-content">
    <h1>Admin Dashboard</h1>
    <a href="pos1.php" title="Add New Sale">
      <img src="atc.png" style="width:200px;height:200px;border:2px solid black;" alt="Add New Sale">
    </a>
    <a href="employee-view.php" title="View Employees">
      <img src="employee.jpg" style="width:200px;height:200px;border:2px solid black;" alt="Employees List">
    </a>
    <a href="customer-view.php" title="Low Stock Alert">
      <img src="customers.png" style="width:200px;height:200px;border:2px solid black;" alt="Low Stock Report">
    </a>
    <a href="inventory-view.php" title="View Inventory">
      <img src="inv.png" style="width:200px;height:200px;border:2px solid black;" alt="Inventory">
    </a>
    <a href="salesreport.php" title="View Transactions">
      <img src="sales_report.png" style="width:200px;height:200px;border:2px solid black;" alt="Transactions List">
    </a>
    <a href="stockreport.php" title="Low Stock Alert">
      <img src="alert1.png" style="width:200px;height:200px;border:2px solid black;" alt="Low Stock Report">
    </a>
    
  </div>

  <!-- Dropdown Script -->
  <script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    for (var i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function () {
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



</body>

</html>


