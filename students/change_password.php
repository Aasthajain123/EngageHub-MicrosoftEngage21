<?php 
	include('include/header.php');
  include('include/dbcon.php');
 ?>

<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-muted"><i class="mdi mdi-key bred-icons"></i> <span class="bred-line">/</span> Change Password</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <div class="panel panel2">
                <form class="update-pro-form" method="post" accept="">
                      <div class="form-row">
                        <div class="form-group col-sm-12">
                          <input name="oldpass" type="password" class="form-control input-fields" placeholder="Enter Old Password" required>
                        </div>
                        <div class="form-group col-md-6">
                          <input name="newpass" type="password" class="form-control input-fields" placeholder="Enter New Password" required>
                        </div>
                        <div class="form-group col-md-6">
                          <input name="cpass" type="password" class="form-control input-fields" placeholder="Confirm Password" required>
                        </div>
                      <div class="update-btn-div">
                          <button name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns">Change Password</button>
                      </div>
                      </div>   
                  </form>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

 


 <?php 
	include('include/footer.php');
 ?>


 </body>
 </html>
 <?php 
if (isset($_POST['submit'])) {
  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $cpass = $_POST['cpass'];
  $id = $_SESSION['sid'];
  $data = mysqli_query($sql_con,"select password from students where id = '$id'");
  $row = mysqli_fetch_array($data);
  $dbpass = $row['password'];
  if($oldpass != $dbpass){
    echo "<script>alert('Old password is invalid')</script>";
    exit();
  } 
  if($newpass != $cpass){
    echo "<script>alert('Passwords are not matched')</script>";
    exit();
  } 
  mysqli_query($sql_con,"UPDATE students SET password = '$cpass' where id = '$id'");
  echo "<script>alert('Password successfully updated')</script>";
  echo "<script>window.location='../studentlogin.php'</script>";
  session_start();
  unset($_SESSION['sid']);
}
  ?>