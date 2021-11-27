<head>

<style type="text/css">

.uploads_style{

  padding: 5px;
  margin-top: 5px;
  background-color: rgb(122, 120, 120);
  font-style: italic;
  font-weight: bold;
}

.uploads_style a{
  text-decoration: none;
  list-style-type: none;
}

</style>

</head>


<?php

$host = "localhost";
  $user = "root";
  $pass = "";
  $database = "engagehub";

$connection_String = mysqli_connect($host,$user,$pass,$database);

$select_all_uploads_query = "SELECT * FROM `tbl_general_uploads` ORDER BY id ASC";

$executing_select_all_uploads_query = mysqli_query($connection_String,$select_all_uploads_query);
  
  $numbering = 1;

 while($rows = mysqli_fetch_array($executing_select_all_uploads_query)) :

  $file_name = $rows["file_name"];

 echo "<div class='uploads_style'>".$numbering++."&nbsp;&nbsp;"."$file_name"."</div>";

endwhile;

?>