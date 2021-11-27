<?php

$host = "localhost";
  $user = "root";
  $pass = "";
  $database = "engagehub";



$connection_string = mysqli_connect($host,$user,$pass,$database);

$get_files = "SELECT * FROM tbl_general_uploads";
$execute_get_files = mysqli_query($connection_string,$get_files);

while($get_file_list = mysqli_fetch_array($execute_get_files)){

	$file_name = $get_file_list["file_name"];
	$file_path = $get_file_list["file_path"];
	$file_id = $get_file_list["id"];

	echo "<div class='div_style'>";

	echo "<span style='float:left;color:#45a2ff'>".$file_name."</span>";

	echo "<a href='download.php?my_file_path=$file_path'><img src='../img/download.png' width='30px' height='30px' style='float:right;margin-top:-5px;'></a><br>";

	echo "</div>";
}
?>


<html>

<head>

</head>

<style>

.div_style{
	margin:5px;
	padding:10px;
	background-color:#2E3134;
	border-radius:5px;
}

.div_style:hover{
	background-color: #454748;
}


</style>

<body>



</body>


</html>