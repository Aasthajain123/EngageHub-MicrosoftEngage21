<?php

$host = "localhost";
  $user = "root";
  $pass = "";
  $database = "engagehub";

$connection_string = mysqli_connect($host,$user,$pass,$database);

    function formatDate($date){
    return date("g:i a",strtotime($date));
  }
 ?>
