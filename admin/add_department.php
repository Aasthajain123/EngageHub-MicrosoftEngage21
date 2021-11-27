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
                <p class="text-muted"><i class="fas fa-university bred-icons"></i> <span class="bred-line">/</span> Add Department</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <div class="panel panel2">
                <form class="update-pro-form" action="add_department.php" method="post">
                      <label>Add new department</label>
                      <input name="department" type="text"class="col-sm-12 form-control" placeholder="Enter Department Name"></input><br>
                <center>
                    <button name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns">Add Department</button>
                  <br><br>
                </center>   
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
   $department = $_POST['department'];
   mysqli_query($sql_con,"INSERT INTO departments (depname) VALUES ('$department')");
   echo "<script>alert('New department added successfully')</script>";
 }
  ?>