<html>
<?php 
include('admin/include/dbcon.php');

	$sec = $_POST['myvalue'];
	$data = mysqli_query($sql_con,"select *from session where department = '$sec'");
 ?>
 <option value="">Choose</option>
 <?php 
 while($row = mysqli_fetch_array($data)){ 	
  ?>
			<option value="<?php echo $row['id']; ?>"><?php echo $row['session']; ?></option>

  <?php 
  } 
  ?>
</html>
