<?php

$selectedID = $_POST['userID'];
$selectedUsername = $_POST['username'];
$selectedUsername_last_name = $_POST["userslast_name"];

$selected_Username_Table = $_COOKIE["user_first_name"]."_".$selectedUsername;
$reversed_selected_Username_Table = $selectedUsername."_".$_COOKIE["user_first_name"];

$selected_Username_Table_uploads = $_COOKIE["user_first_name"]."_".$selectedUsername."_uploads";
$reversed_selected_Username_Table_uploads = $selectedUsername."_".$_COOKIE["user_first_name"]."_uploads";

setcookie("clicked_on_user_last_name",$selectedUsername_last_name,time() + (86400 * 30));

setcookie("default_clicked_on_username",$selectedUsername,time() + (86400 * 30));
setcookie("Selected_Username_Table",$selected_Username_Table,time() + (86400 * 30));
setcookie("Reversed_selected_Username_Table",$reversed_selected_Username_Table,time() + (86400 * 30));

setcookie("selected_Username_Table_uploads",$selected_Username_Table_uploads,time() + (86400 * 30));
setcookie("reversed_selected_Username_Table_uploads",$reversed_selected_Username_Table_uploads,time() + (86400 * 30));


$host = "localhost";
  $user = "root";
  $pass = "";
  $database = "engagehub";

$connection_String = mysqli_connect($host,$user,$pass,$database);

$command_query = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$selected_Username_Table' OR table_name='$reversed_selected_Username_Table' LIMIT 1";

$command_query_uploads = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$selected_Username_Table_uploads' OR table_name='$reversed_selected_Username_Table_uploads' LIMIT 1";

$execute_command_query = mysqli_query($connection_String,$command_query);

$check_table_existence = mysqli_num_rows($execute_command_query);

$execute_command_query_uploads = mysqli_query($connection_String,$command_query_uploads);

$check_uploads_table_existence = mysqli_num_rows($execute_command_query_uploads);

if($check_table_existence>0){

	include "Chat_Log.php";

}else{

	$create_table_query = "CREATE TABLE $selected_Username_Table(ID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, Messages LONGTEXT NOT NULL, Time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, Usernames VARCHAR(50) NOT NULL)";

	$execute_create_table_query = mysqli_query($connection_String,$create_table_query)or die(mysqli_error($connection_String));

	if($execute_create_table_query){

		include "Chat_Log.php";
	}
}


if($check_uploads_table_existence>0){

	include "Chat_Log.php";

}else{

	$create_uploads_table_query = "CREATE TABLE $selected_Username_Table_uploads(ID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, File VARCHAR(100) NOT NULL, Type  VARCHAR(10) NOT NULL, Size INT(11) NOT NULL)";

	$execute_create_uploads_table_query = mysqli_query($connection_String,$create_uploads_table_query)or die(mysqli_error($connection_String));

	if($execute_create_uploads_table_query){

		include "Chat_Log.php";
	}
}

?>
