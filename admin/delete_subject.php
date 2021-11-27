<?php 
include('include/dbcon.php');
	$value = $_GET['value'];
	echo $value;
	mysqli_query($sql_con,"DELETE From subjects where id = '$value'");
	echo "<script>alert('Subject deleted successfully')</script>";
	echo "<script>window.location='manage_subject.php'</script>";
 ?>