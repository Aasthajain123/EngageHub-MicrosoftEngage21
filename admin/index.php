<?php       
  include('include/dbcon.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--META TAGS START -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Hub</title>
    
    <!-- LINKS START -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="icon" href="images/HeadLogo.png"> 
</head>
<body>
	<section class="admin-login-sec">
		<div class="container-fluid">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1 class="welcome-admin-heading">Welcome Admin</h1>
						<form action="#" method="post">
              <input type="text" name="username" class="admin-name admin-inputs" placeholder="Username" required><br><br>
              <input type="password" name="password" class="admin-password admin-inputs" placeholder="Password" required><br><br>
              <input type="submit" name="login" value="LOGIN" class="btn-admin-login">
						</form>
            <p class="not-admin-para">If you are not an admin don't try to login</p>
					</div>
				</div>
			</div>
		</div>
	</section>
  <?php 
    $data = mysqli_query($sql_con,"select *from admin");
    $row = mysqli_fetch_array($data);
    $value1 = $row["username"];
    $value2 = $row["password"];
    $value3 = $row['id'];
    if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      if($username == $value1 && $password == $value2){
        session_start();
        $_SESSION['id'] = $value3;
        header("location: dashboard.php");
      }
      else{
        echo "<script>alert('Wrong information please try again!')</script>";
      }
    }
  ?>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>
