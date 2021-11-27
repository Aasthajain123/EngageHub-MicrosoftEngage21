<html>
<?php 
include('include/dbcon.php');

	$sec = $_POST['value'];
	$data = mysqli_query($sql_con,"select *from semester where session = '$sec'");
 ?>
 <option value="">Choose</option>
 <?php 
 while($row = mysqli_fetch_array($data)){ 	
  ?>
	<option value="<?php echo $row['id']; ?>"><?php echo $row['semester']; ?></option>

  <?php 
  } 
  ?>
</html>
