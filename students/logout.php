<?php 
session_start();
if(isset($_SESSION['sid'])){
	unset($_SESSION['sid']);
	header('location: ../index.php');
}
 ?>