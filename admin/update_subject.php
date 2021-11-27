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
                <p class="text-muted"><i class="fas fa-book bred-icons"></i> <span class="bred-line">/</span> Update Subject</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <div class="panel panel2">
                <form class="update-pro-form" method="post" action="">
                      <label>Update subject</label>
                      <?php 
                      $id = $_GET['value'];
                      $data = mysqli_query($sql_con,"SELECT *from subjects where id = '$id'");
                      $row = mysqli_fetch_array($data);
                       ?>
                      <input value="<?php echo $row['sname']; ?>" name="semester" type="text" class="col-sm-12 form-control" placeholder="Enter subject" required="true"></input><br>
                <center>
                    <input name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns" value="Update Subject">
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
  if (isset($_GET['value'])) {
    $id = $_GET['value'];
    $sub = $_POST['semester'];
    mysqli_query($sql_con,"UPDATE subjects set sname = '$sub' where id = '$id'");
    echo "<script>alert('Subject updated successfully')</script>";
    echo "<script>window.location = 'manage_subject.php'</script>";
  }
  else{
    echo "<script>alert('Go back and try again something wrong')</script>";
    echo "<script>window.location = 'manage_subject.php'</script>";
  }
}
?>