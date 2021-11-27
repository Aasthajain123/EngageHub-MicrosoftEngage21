<?php
include('include/dbcon.php'); 
include('include/session.php');
if (isset($_GET['value'])) {
 $id = $_GET['value'];
 $data = mysqli_query($sql_con,"Select *from quiz where id ='$id'");
 $row = mysqli_fetch_array($data);
 $quiztime = $row['quiztime']; 
}
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
<body oncontextmenu="return false;">
<?php 
if (isset($_GET['value'])) {
    $id = $_GET['value'];

    $userid = $_SESSION['sid'];
    $data = mysqli_query($sql_con,"select *from quizresult where quizid ='$id' AND userid = '$userid'");
    $row = mysqli_num_rows($data);
    if ($row > 0 ) {
      echo "<script>alert('Your quiz already has been done')</script>";
      echo "<script>window.location='check_quiz.php'</script>";
      exit();
    }

  $data = mysqli_query($sql_con,"Select *from quiz where id ='$id'");
}
 ?>
 <h1>Quiz Start</h1><br>
 <div style="font-size: 25px;font-weight: bold;color: red">Quiz Remaning time <span id="time">00:00</span> minutes!</div><br>
<form action="" method="post" id="cartCheckout" name="result">
   <div class="table-responsive">
  <table class="table table-bordered">
  
  <thead class="thead-dark">
    <tr>
      <th>Questions</th>
      <th>Option 1</th>
      <th>Option 2</th>
      <th>Option 3</th>
      <th>Option 4</th>
      <th>Your Ans</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $inc = 0;
    while ($row = mysqli_fetch_array($data)) {
      ?>
    <tr>
      <td><?php echo $row['questions'] ?></td>
      <td><?php echo $row['op1']; ?></td>
      <td><?php echo $row['op2']; ?></td>
      <td><?php echo $row['op3']; ?></td>
      <td><?php echo $row['op4']; ?></td>
      <td><input type="text" name="rit<?php echo $inc?>" maxlength="1" placeholder="Only alphabet" style="width: 110px;padding: 8px 5px;border-radius: 5px;border: 2px solid gray;font-size: 14px"></td>
    </tr>
  <?php $inc++; } ?>
  </tbody>
 </table>
 </div>
 <input type="submit" name="submit" value="Submit Quiz" class="btn btn-outline-primary btn-rounded">
</form>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript">
  history.pushState(null, null, document.title);
  window.addEventListener('popstate', function () {
  history.pushState(null, null, document.title);
});
</script>
<script type="text/javascript">
  function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
$(document).on("keydown", disableF5);
});
</script>

<script type="text/javascript">
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var quiztime = "<?php echo $quiztime; ?>";
    var fiveMinutes = 60 * quiztime,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>
<script type="text/javascript">
  var quiztime = "<?php echo $quiztime; ?>";
  quiztime = quiztime * 60000;
  setTimeout(function(){
    document.querySelector("[name='submit']").click();
  },quiztime);
</script>

</body>
</html>
<?php
global $inc;
$userid = $_SESSION['sid'];
$id = $_GET['value'];
if (isset($_POST['submit'])) {

  $query = mysqli_query($sql_con," SELECT max(id) AS id FROM quizresult");
    while ($row = mysqli_fetch_assoc($query)) {
    $result = $row['id'];
    $resultid = $result+1;
  }

  $data = mysqli_query($sql_con,"Select *from quiz where id ='$id'");
  for ($i=0; $i <$inc ; $i++) {
  $row = mysqli_fetch_array($data);
  $qus = $row['questions'];
    
    $ans = $_POST['rit'.$i.''];
    mysqli_query($sql_con,"INSERT INTO quizresult(id,userid,quizid,questions,ans) VALUES ('$resultid','$userid','$id','$qus','$ans')");
  }
    echo "<script>alert('Your quiz has been done')</script>";
    echo "<script>window.location='user_quiz_result.php'</script>";
}
 ?>