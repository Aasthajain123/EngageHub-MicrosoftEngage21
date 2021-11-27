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
                <p class="text-muted"><i class="fas fa-university bred-icons"></i> <span class="bred-line">/</span> Update Department</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <div class="panel panel2">
                <form class="update-pro-form" action="" method="post">
                      <label>Update department</label>
                      <?php 
                      $id = $_GET['value'];
                      $data = mysqli_query($sql_con,"select *from departments where id ='$id'");
                      $row = mysqli_fetch_array($data);
                       ?>
                      <input value="<?php echo $row['depname'] ?>" name="department" type="text"class="col-sm-12 form-control" placeholder="Enter Department Name"></input><br>
                <center>
                    <button name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns">Update Department</button>
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
    if(isset($_GET['value'])){
      $department = $_POST['department'];
      $id = $_GET['value'];
      mysqli_query($sql_con,"UPDATE departments set depname = '$department' where id ='$id'");
      echo "<script>alert('Department updated successfully')</script>";
      echo "<script>window.location = 'manage_department.php'</script>";   
    }
   else{
      echo "<script>alert('Go Back and try again something wrong')</script>";
      echo "<script>window.location = 'manage_department.php'</script>";
   }
 }
  ?>