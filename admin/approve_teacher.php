<?php 
include('include/dbcon.php');
 $id = $_GET['value'];
 $status = 1;
 mysqli_query($sql_con,"update teachers set status = '$status' where id = '$id'");
 echo "<script>window.location = 'teacher_pending.php'</script>";
 ?>