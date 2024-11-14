<?php
	include "config.php";
	$sql="DELETE FROM clinicaltrials WHERE trial_id='$_GET[id]'";
	if ($conn->query($sql))
	header("location:CT-view.php");
	else
	echo "error";
?>