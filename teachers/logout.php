<?php 
session_start();
if(isset($_SESSION['tid'])){
	unset($_SESSION['tid']);
	header('location: ../index.php');
}
 ?>