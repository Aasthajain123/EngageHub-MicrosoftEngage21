<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	mysqli_query($sql_con,"Delete from quizresult where id ='$id'");
	echo "<script>alert('Quiz Result deleted successfully')</script>";
	echo "<script>window.location='manage_quiz_result.php'</script>";
}
 ?>