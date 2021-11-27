
<head>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<style type="text/css">

.sender,.receiver{
	background-color: #d8d4d4;
	width: 70%;
	margin-top: 2px;
	margin-bottom: 2px;

}

.receiver{
	float: left;
	text-align: left;
	margin-left: 15px;
}

.sender{
	float:right;
	text-align: right;
	margin-right: 15px;
}


div[class="shape_receiver"]{
	background-color: white;
	padding: 5px 10px 5px 10px;
	border-radius: 0px 20px 20px 20px;
}

div[class="shape_sender"]{
	background-color: rgba(69, 162, 255, 0.93);
	padding: 0px 10px 5px 10px;
	border-radius: 20px 3px 20px 20px;
}

span[class="original_sender"]{
	color: white;
	display: inline-block;
	text-align: center;
}

span[class="original_receiver"]{
	color: gray;
	display: inline-block;
	text-align: center;
}

</style>
</head>

<?php

$selected_Username_Table = $_COOKIE["Selected_Username_Table"];
$reversed_selected_Username_Table = $_COOKIE["Reversed_selected_Username_Table"];

$selected_Username_Uploads_Table = $_COOKIE["selected_Username_Table_uploads"];
$reversed_selected_Username_Uploads_Table = $_COOKIE["reversed_selected_Username_Table_uploads"];


$host = "localhost";
  $user = "root";
  $pass = "";
  $database = "engagehub";

$connection_String = mysqli_connect($host,$user,$pass,$database);
$command_query = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$selected_Username_Table' LIMIT 1";
$execute_command_query = mysqli_query($connection_String,$command_query);
$check_table_existence = mysqli_num_rows($execute_command_query);
if($check_table_existence>0){
  $getting_correct_tablename_orinalname = "true";
}else{
  $getting_correct_tablename_orinalname = "false";
}

$command_query_uploads = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$selected_Username_Uploads_Table' LIMIT 1";

$execute_command_query_uploads = mysqli_query($connection_String,$command_query_uploads);

$check_table_uploads_existence = mysqli_num_rows($execute_command_query_uploads);

if($check_table_uploads_existence>0){

  $getting_correct_uploads_tablename_orinalname = "true";

}else{

  $getting_correct_uploads_tablename_orinalname = "false";
}



$command_query = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$reversed_selected_Username_Table' LIMIT 1";

$execute_command_query = mysqli_query($connection_String,$command_query);

$check_table_existence = mysqli_num_rows($execute_command_query);

if($check_table_existence>0){

  $getting_correct_tablename_reversedname = "true";

}else{
  $getting_correct_tablename_reversedname = "false";
}


$command_query_uploads = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$reversed_selected_Username_Uploads_Table' LIMIT 1";

$execute_command_query_uploads = mysqli_query($connection_String,$command_query_uploads);

$check_table_uploads_existence = mysqli_num_rows($execute_command_query_uploads);

if($check_table_uploads_existence>0){

  $getting_correct_uploads_tablename_reversedname = "true";

}else{
  $getting_correct_uploads_tablename_reversedname = "false";
}



if($getting_correct_tablename_orinalname == "true" && $getting_correct_tablename_reversedname=="false"){
  setcookie("correctTable",$selected_Username_Table,time() + (86400 * 30));
}elseif($getting_correct_tablename_orinalname == "false" && $getting_correct_tablename_reversedname=="true"){
  setcookie("correctTable",$reversed_selected_Username_Table,time() + (86400 * 30));
}else{
  return;
}



if($getting_correct_uploads_tablename_orinalname == "true" && $getting_correct_uploads_tablename_reversedname=="false"){
  setcookie("correct_Uploads_Table",$selected_Username_Uploads_Table,time() + (86400 * 30));
}elseif($getting_correct_uploads_tablename_orinalname == "false" && $getting_correct_uploads_tablename_reversedname=="true"){
  setcookie("correct_Uploads_Table",$reversed_selected_Username_Uploads_Table,time() + (86400 * 30));
}else{
  return;
}

$selected_user_uploads_table = $_COOKIE["correct_Uploads_Table"];
$selected_user_table = $_COOKIE["correctTable"];

$chat_log_query = "SELECT * FROM $selected_user_table ORDER BY ID ASC";

$executing_chat_log_query = mysqli_query($connection_String,$chat_log_query);

while($rows = mysqli_fetch_array($executing_chat_log_query))  :

if($rows["Usernames"]==$_COOKIE["user_first_name"]){
 	echo "<div class='sender'><span class='original_sender'><div class='shape_sender'>".$rows["Messages"]."</div></span></div>";
}else{
 	echo "<div class='receiver'><span class='original_receiver'><div class='shape_receiver'>".$rows["Messages"]."</div></span></div>";
}

endwhile;

?>
