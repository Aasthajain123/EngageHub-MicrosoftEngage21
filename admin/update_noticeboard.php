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
                <p class="text-muted"><i class="fas fa-chalkboard-teacher bred-icons"></i> <span class="bred-line">/</span> Update NoticeBoard</p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel2">
                <div class="noticeboard-info">
                  <p class="notice text-danger">NOTE:</p>
                  <p>NoticeBoard contains following-things</p>
                  <ul>
                      <li>For Source File (Only: jpg, jgeg, png, docx, pdf)</li>
                      <li>For Discription</li>
                      <li>All things that are required, we have to fulfil and update notice board</li>
                  </ul>
                </div>
                <div class="text-center file-div">
                  <?php 
                  $id = $_GET['value'];
                      $data = mysqli_query($sql_con,"select *from noticeboard where id = '$id'");
                      $row = mysqli_fetch_array($data);
                      $file = $row['file'];
                      $dis = $row['dis'];
                      $date = $row['ndatetime'];


                          $filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                            if ($filetype =="jpg" || $filetype =="png" || $filetype =="jpeg") {
                                echo "<a href = '$file' target='_blank'><i class='far fa-file-image file-icons' style='font-size:50px; color: #333'></i></a><br><br>";
                                echo "<h4 style='display:block;text-align:center'>"."Old file"." <i class='far fa-hand-point-up' style='font-size:22px'></i>"."<br><br>Discription : ".$dis."</h4>";
                            }
                            else if($filetype =="docx" || $filetype =="doc"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-word file-icons' style='font-size:50px; color: #333'></i></a><br><br>";
                              echo "<h4 style='display:block;text-align:center'>"."Old file"." <i class='far fa-hand-point-up' style='font-size:22px'></i>"."<br><br>Discription : ".$dis."</h4>";
                            }
                            else{
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-pdf file-icons' style='font-size:50px; color: #333'></i></a><br><br>";
                              echo "<h4 style='display:block;text-align:center'>"."Old file"." <i class='far fa-hand-point-up' style='font-size:22px'></i>"."<br><br>Discription : ".$dis."</h4>";
                            }
                   ?>
                </div>
                <br>
                <?php  ?>
                <form class="update-pro-form form-group" action="" method="post" enctype="multipart/form-data">
                       <label>Select File</label>
                      <div class="file-loading">
                        <input value="<?php echo $file ?>" name="fl" type="file" class="file" id="test-upload" multiple data-theme="fas" required>
                      </div>
                      <div id="errorBlock" class="help-block text-danger"></div><br>
                      <label>Enter Discription</label>
                      <textarea name="discription" placeholder="Discription..." class="form-control" rows="8" required><?php echo $dis ?></textarea><br>
                      <label>Select Date</label>
                      <input value="<?php echo $date ?>" name="datetime" type="date"class="col-sm-12 form-control" required></input><br>
                <center>
                  <br>
                    <button name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns">Update notice board</button>
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
  if (isset($_GET['value'])) {
    $folder = "NoticeBoardfiles/";
    $filename = $_FILES['fl']["name"];
    $unique = uniqid().$filename;
    $temname = $_FILES['fl']["tmp_name"];
    $size = $_FILES['fl']["size"];
    
    $target = $folder.basename($unique);
    $filetype = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if ($filetype !="jpg" && $filetype !="png" && $filetype !="jpeg" && $filetype !="docx" && $filetype !="pdf") {
        echo "<script>document.getElementById('errorBlock').innerHTML = '** Invalid file format'; </script>";
        exit();
    }
    else if($size > 10485760){
        echo "<script>document.getElementById('errorBlock').innerHTML = '** File is larger than 10MP';</script>";
        exit();
    }
    else {

      if (file_exists($file)) {
          unlink($file);
      }
    move_uploaded_file($temname,$target);
    $id = $_GET['value'];
    $userid = $_SESSION['id'];
    $dis = $_POST['discription'];
    $mydate = $_POST['datetime'];

    mysqli_query($sql_con,"UPDATE noticeboard SET file='$target',dis='$dis',ndatetime='$mydate' WHERE id = '$id'");
  echo "<script>alert('Notoce Board Updated')</script>";
  echo "<script>window.location = 'manage_noticeboard.php'</script>";

}

  }
  else{
    echo "<script>alert('Go back and try again something wrong')</script>";
    echo "<script>window.location = 'manage_noticeboard.php'</script>";    
  }
}
  ?>