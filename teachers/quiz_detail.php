<?php 
include('include/session.php');
 ?>
<html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<style type="text/css">
	body{
		text-align: center;
		margin-top: 30px;
		margin-left: 15px;
		margin-right: 15px;
		font-family: sans-serif;
	}
	h1{
		padding-bottom: 15px;
		background-color: #212529;
		color: #fff;
		border-radius: 4px;
		padding-top: 15px;
	}
</style>
<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	$data = mysqli_query($sql_con,"Select *from quiz where id ='$id'");
}
 ?>
 <h1>Quiz Details</h1>
 <div class="table-responsive">
 	<table class="table table-bordered">
 	
 	<thead class="thead-dark">
 		<tr>
 			<th>Questions</th>
 			<th>Option 1</th>
 			<th>Option 2</th>
 			<th>Option 3</th>
 			<th>Option 4</th>
 			<th>Right Ans</th>

 		</tr>
 	</thead>
 	<tbody>
 		<?php
 		while ($row = mysqli_fetch_array($data)) {
			 
			?>
 		<tr>
 			<td><?php echo $row['questions']; ?></td>
 			<td><?php echo $row['op1']; ?></td>
 			<td><?php echo $row['op2']; ?></td>
 			<td><?php echo $row['op3']; ?></td>
 			<td><?php echo $row['op4']; ?></td>
 			<td><?php echo $row['rightans']; ?></td>
 		</tr>
 	<?php } ?>
 	</tbody>
 </table>
 </div>
 <a href="" data-toggle="modal" data-target= "#quizdelete" class="btn btn-outline-danger btn-rounded">Delete Quiz</a>

 <!-- MODEL -->
  <div class="modal fade" id="quizdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete quiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to delete quiz?
      </div>
      <div class="modal-footer">
        <a href="delete_quiz.php?value=<?php echo $id ?>" class="btn btn-outline-primary">YES</a>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>