<?php
		$conn = mysqli_connect("localhost", "root", "LikH@24#", "pharmacy");
		if ($conn->connect_error) {
			die("Connection failed: " . mysqli_connect_error());

		}
?>