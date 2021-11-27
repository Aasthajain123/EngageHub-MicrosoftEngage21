<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	mysqli_query($sql_con,"DELETE from session where id ='$id'");
	echo "<script>alert('Session deleted successfully')</script>";
	echo "<script>window.location = 'manage_session.php'</script>";
}
 ?>