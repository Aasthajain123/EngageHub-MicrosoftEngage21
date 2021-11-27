<?php 
  session_start();
  if(isset($_SESSION['tid'])){
    
  }
  else{
    header('location: ../teacherlogin.php');
  }
 ?>
