<?php
include('include/session.php');
global $qno;
include('include/dbcon.php'); 
if (isset($_GET['submit'])) {
	$dep = $_GET['dep'];
	$sec = $_GET['session'];
	$sem = $_GET['semester'];
	$sub = $_GET['subject'];
  $title = $_GET['quiztitle'];
 	$qno = $_GET['numberofqus'];
  $timelimit = $_GET['timelimit'];
	$date = $_GET['date'];
	
	if($qno > 20){
		echo "<script>alert('Maximum 20 Questions are allowed ')</script>";
		echo "<script>window.location='add_quiz.php'</script>";
		exit();
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">

<style type="text/css" media="screen">
body{
	text-align: center;
  font-family: sans-serif;
}
	input{
		width: 100%;
		border: 1px solid lightgray;
		padding: 4px 15px;
		border-radius: 4px;
	}
  h1{
    color: #fff;
    background-color: #212529;
    padding: 10px 0px;
    border-radius: 4px;
  }
</style>

</head>
<body>
	<div class = "adminpanel">
<form method="post">
<div class="container">
			<br><br>
  <h1>Enter Questions</h1>
  <br>
  <?php 
  global $qno;
  $new = 0;
    	for ($i=1; $i <= $qno; $i++) { 
    		$new++;
    	 ?>
  <table class="table table-bordered">
    <tbody>
    	
      <tr>
        <td class="col-sm-3" name="qnum<?php echo $i; ?>">Question <?php echo $i; ?></td>
        <td class="col-sm-9"><input type="text" name="qq1<?php echo $i; ?>" required></td>
      </tr>
      <tr>
        <td class="col-sm-3" value="1" name="op">Option a</td>
        <td class="col-sm-9"><input type="text" name="q1<?php echo $new; ?>" required></td>
      </tr>
      <tr>
        <td class="col-sm-3" value="2" name="op">Option b</td>
        <td class="col-sm-9"><input type="text" name="q2<?php echo $new; ?>" required></td>
      </tr>
      <tr>
        <td class="col-sm-3" value="3" name="op">Option c</td>
        <td class="col-sm-9"><input type="text" name="q3<?php echo $new; ?>" required></td>
      </tr>
      <tr>
        <td class="col-sm-3" value="4" name="op">Option d</td>
        <td class="col-sm-9"><input type="text" name="q4<?php echo $new; ?>" required></td>
      </tr>
      <tr>
        <td class="col-sm-3" value="5" name="
        <?php echo $i?>">Right Answer only alphabet</td>
        <td class="col-sm-9"><input type="text" name="ans<?php echo $i; ?>" required maxlength="1"></td>
      </tr>
  
    </tbody>
  </table>
<hr style="background-color:#212529;height: 15px" class="progress-bar-striped">

  <?php } ?>
  <br>
  <input name="submit22" type="submit" class="btn btn-primary progress-bar-striped btn-rounded profile-btns col-sm-3" value="Add Quiz" style="background-color:#212529 !important; border:1px solid #212529 !important;">
  <br><br><br>
</div>
		</form>
	</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/popper.min.js"></script>
</body>
</html>
<?php 
$helo = 0;
if (isset($_POST['submit22'])) {
    $query = mysqli_query($sql_con," SELECT max(id) AS id FROM quiz");
    while ($row = mysqli_fetch_assoc($query)) {
    $result = $row['id'];
    $id = $result+1;
}
    $qno = $_GET['numberofqus'];
        for ($i=1; $i <=$qno ; $i++) {
        $helo++; 
        $qq1 = $_POST['qq1'.$helo.''];
          $qn1 = $_POST['q1'.$helo.''];
          $qn2 = $_POST['q2'.$helo.''];
          $qn3 = $_POST['q3'.$helo.''];
          $qno4 = $_POST['q4'.$helo.''];
          $right2 = $_POST['ans'.$i.''];
          $right = strtolower($right2);
          mysqli_query($sql_con,"INSERT INTO quiz (id,department,session,semester,subject,quizdate,quiztitle,questions,op1,op2,op3,op4,rightans,quiztime) VALUES ('$id','$dep','$sec','$sem','$sub','$date','$title','$qq1','$qn1','$qn2','$qn3','$qno4','$right','$timelimit')");
          echo "<script>alert('Quiz added successfully')</script>";
          echo "<script>window.location='add_quiz.php'</script>";
        }
}

 ?>