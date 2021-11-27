<?php 
	include('include/header.php');
  include('include/dbcon.php');
 ?>
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputState3").on('change',function(){
           var val2 = $("#inputState3").val();
            $.ajax({
                
                url: "../stdsec.php",
                method: "post",
                data: 'myvalue='+val2
            }).done(function(sec){
                 $('#inputState1').html(sec);
            }) 
       })
    });
  </script>
<!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-muted"><i class="fas fa-user-clock bred-icons"></i> <span class="bred-line">/</span> Add Semester</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <div class="panel panel2">
                <form class="update-pro-form" method="post" action="">
                  <label>Select Department</label>
                      <select id="inputState3" name="dep" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                        <?php 
                        $data = mysqli_query($sql_con,"Select *from departments");
                        while ($row = mysqli_fetch_array($data)){
                         ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['depname'] ?></option>
                        <?php } ?>
                      </select><br>
                      <label>Select Session</label>
                      <select id="inputState1" name="session" class="col-sm-12 form-control" required="true">
                        <option selected>Choose...</option>
                        <?php 
                          $data = mysqli_query($sql_con,"Select *from session");
                          while ($row = mysqli_fetch_array($data)){
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['session'] ?></option>
                        <?php } ?>
                      </select><br>
                      <label>Add new semester</label>
                      <input name="semester" type="text" class="col-sm-12 form-control" placeholder="Enter semester" required="true"></input><br>
                <center>
                    <input name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns" value="Add Semester">
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
  $dep = $_POST['dep'];
  $sess = $_POST['session'];
  $semester = $_POST['semester'];
  mysqli_query($sql_con,"INSERT INTO semester(semester,session,department) VALUES ('$semester','$sess','$dep')");
  echo "<script>alert('Semester added successfully')</script>";
  }
?>