<html>
<?php 
include('include/dbcon.php');
	$sem = $_POST['subvalue'];
	$data = mysqli_query($sql_con,"SELECT * FROM subjects WHERE  semester	 ='$sem'");
 ?>
 <option value="">Choose</option>
 <?php 
 while($row = mysqli_fetch_array($data)){ 	
  ?>
	<option value="<?php echo $row['id']; ?>"><?php echo $row['sname']; ?></option>

  <?php 
  } 
  ?>
</html>
