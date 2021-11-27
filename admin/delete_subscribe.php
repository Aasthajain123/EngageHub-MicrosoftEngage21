<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id =$_GET['value'];
	mysqli_query($sql_con,"DELETE from subscribe where id = '$id'");
	echo "<script>alert('Email Successfully Deleted')</script>";
	echo "<script>window.location = 'subscribes.php'</script>";
}
?>
