<?php 
  include('include/header.php');
  include('include/dbcon.php');
 ?>

<!-- partial -->
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputState3").on('change',function(){
          $('#inputState1').prop('disabled',false);
          $('#inputStateSemester').prop('disabled',true);
          $('#inputsubject').prop('disabled',true);
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
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputState1").on('change',function(){
          $('#inputStateSemester').prop('disabled',false);
           var val2 = $("#inputState1").val();
            $.ajax({
                
                url: "sec.php",
                method: "post",
                data: 'value='+val2
            }).done(function(sec){
                 $('#inputStateSemester').html(sec);
            }) 
       })
    });
</script>
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputStateSemester").on('change',function(){
          $('#inputsubject').prop('disabled',false);
           var val2 = $("#inputStateSemester").val();
            $.ajax({
                
                url: "sec2.php",
                method: "post",
                data: 'subvalue='+val2
            }).done(function(sec){
                 $('#inputsubject').html(sec);
            }) 
       })
      })
</script>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-muted"><i class="far fa-folder-open bred-icons"></i> <span class="bred-line">/</span> Add Material</p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel2">
                <div class="noticeboard-info">
                  <p class="notice text-danger">NOTE:</p>
                  <p>Following-files are allowed</p>
                  <ul>
                      <li> Only: jpg, jgeg, png, docx, doc, pptx, ppt, pdf, mp4, mkv, 3gp, avi</li><br>
                  </ul>
                </div>
                <form class="update-pro-form form-group" action="" method="post" enctype="multipart/form-data">
                      <label>Select Department</label>
                      <select id="inputState3" name="dep" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                        <?php 
                        $data = mysqli_query($sql_con,"select *from departments");
                        while ($row = mysqli_fetch_array($data)) {
                       ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['depname']; ?></option>
                        <?php } ?>
                      </select><br> 

                      <label>Select Session</label>
                      <select disabled id="inputState1" name="session" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                      </select><br>

                      <label>Select Semester</label>
                      <select disabled id="inputStateSemester" name="semester" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                      </select><br>

                      <label>Select Subject</label>
                      <select disabled id="inputsubject" name="subject" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                      </select><br>

                      <label>Select Date</label>
                      <input name="date" type="date" class="col-sm-12 form-control" required="true"><br>
                      <label>Select File</label>
                      <div class="file-loading">
                        <input name="file" type="file" class="file" id="test-upload" multiple data-theme="fas" required>
                      </div>
                      <div id="errorBlock" class="help-block text-danger"></div>
                <center>
                  <br>
                    <button name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns">Add Material</button>
                </center>   
            </form>
        </div>
      </div>
    </div>
        <!-- content-wrapper ends -->
  <script src="js/bootstrap.bundle.min.js"></script>
   <?php 
  	include('include/footer.php');
   ?>
 </body>
 </html>
 <?php 
 if (isset($_POST['submit'])) {
    $folder = "../admin/material/";
    $filename = $_FILES['file']["name"];
    $unique = uniqid().$filename;
    $temname = $_FILES['file']["tmp_name"];
    $size = $_FILES['file']["size"];
    
    $target = $folder.basename($unique);
    $filetype = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if ($filetype !="jpg" && $filetype !="png" && $filetype !="jpeg" && $filetype !="docx" && $filetype !="doc" && $filetype !="pdf" && $filetype !="pptx" && $filetype !="ppt" && $filetype !="txt" && $filetype !="mp4" && $filetype !="mkv" && $filetype !="3gp" && $filetype !="avi") {
        echo "<script>document.getElementById('errorBlock').innerHTML = '** Invalid file format'; </script>";
        exit();
    }
    else if($size > 209715200){
        echo "<script>document.getElementById('errorBlock').innerHTML = '** File is larger than 200MP';</script>";
        exit();
    }
    else
    {
    move_uploaded_file($temname,$target);
    
    $dep = $_POST['dep'];
    $sec = $_POST['session'];
    $sem = $_POST['semester'];
    $sub = $_POST['subject'];
    $rdate = $_POST['date'];
    mysqli_query($sql_con,"INSERT INTO material (department,session,semester,subject,mdate,file) VALUES ('$dep','$sec','$sem','$sub','$rdate','$target')");
  echo "<script>alert('Material uploaded successfully')</script>";

}
 }
  ?>
