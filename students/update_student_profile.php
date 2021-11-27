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
                <p class="text-muted"><i class="fas fa-user-edit bred-icons"></i> <span class="bred-line">/</span> Update Profile</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <!-- TEACHER FORM SECTION START -->
                <div class="col-sm-12">
        <div class="panel">
          <?php 
            $stdid = $_SESSION['sid'];
            $data = mysqli_query($sql_con,"select *from students where id = '$stdid'");
            $row = mysqli_fetch_array($data);
            $stdimg =  $row['img'];
            $snumber = $row['snumber'];
            $address = $row['address'];
          ?>
          <img src="<?php echo "../".$stdimg ?>" alt="" class="profile-image"><hr>
          <form action="" method="post" enctype="multipart/form-data" class="update-pro-form" onsubmit=" return myfun2();">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['firstname'] ?>" name="fname"  title="At least three characters" type="text" class="form-control input-fields" placeholder="First Name" required id="firstname">
                                    <span class="text-danger" id="fname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['lastname'] ?>" name="lname" title="At least three characters" type="text" class="form-control input-fields" placeholder="Last Name" required id="secondname">
                                    <span class="text-danger" id="Slname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['fathername'] ?>" name="ffname" title="At least three characters" type="text" class="form-control input-fields" placeholder="Father Name" required id="fathername">
                                    <span class="text-danger" id="SFname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['rollnum'] ?>" name="rollnum" title="Required BCS-M-47" type="text" class="form-control input-fields" placeholder="Roll Number" required id="rollnum">
                                    <span class="text-danger" id="Srollnum"></span>
                                  </div>
                                    <div class="form-group col-md-6">
                                    <input value="<?php echo $row['stdemail'] ?>" name="email" title="Email pattren required" type="email" class="form-control input-fields" placeholder="Email Address" required id="email">
                                    <span class="text-danger" id="Semail"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                        <select name="dep" id="inputState3" class="form-control input-fields" required="true" >
                                            <option value="">Department</option>
                                            <?php 
                                            $data = mysqli_query($sql_con,"Select *from departments");
                                            while ($row = mysqli_fetch_array($data)){
                                             ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['depname'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="gender" id="inputState2" class="form-control input-fields" required="true">
                                            <option value="">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="session" id="inputState1" class="form-control input-fields" required="true">
                                            <option value="">Session</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input value="<?php echo $snumber ?>" name="number" type="text" class="form-control input-fields" placeholder="Contact Number" required id="number">
                                        <span class="text-danger" id="Snumber"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input name="img" type="file" class="form-control upload-div" required>
                                        <span id="imgerror" class="text-danger"></span>
                                    </div>
                                <div class="form-group col-sm-12">
                                  <input value="<?php echo $address ?>" name="address" type="text" class="form-control input-fields" id="inputAddress" placeholder="Enter Your Address" required>
                                <span class="text-danger" id="Saddress"></span>
                                </div>
                                <div class="update-btn-div">
                                    <button name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns">Update Profile</button>
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
<script type="text/javascript">
        function myfun2(){
           return true;
        }
    </script>
    <script src="js/customUpload2.js"></script>
</body>
</html>
<?php
if (isset($_POST['submit'])) {

    $folder = "suploads/";
    $filename = $_FILES['img']["name"];
    $unique = uniqid().$filename;
    $temname = $_FILES['img']["tmp_name"];
    $size = $_FILES['img']["size"];
    
    $target = $folder.basename($unique);
    $filetype = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if ($filetype !="jpg" && $filetype !="png" && $filetype !="jpeg") {
        echo "<script>document.getElementById('imgerror').innerHTML = '** File is not an image'; </script>";
        exit();
    }
    else if($size > 2097152){
        echo "<script>document.getElementById('imgerror').innerHTML = '** File is larger than 2MP';</script>";
        exit();
    }
    else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $SFname = $_POST['ffname'];
        $rollnum = $_POST['rollnum'];
        $email = $_POST['email'];
        $session = $_POST['session'];
        $gender = $_POST['gender']; 
        $depart = $_POST['dep'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $id = $_SESSION['sid'];
        $data = mysqli_query($sql_con,"select *from students where id = '$id'");
        $row = mysqli_fetch_array($data);
        $img = $row['img'];
        if (file_exists("../".$img)) {
            unlink("../".$img);
        }
        move_uploaded_file($temname,"../".$target);
	 echo "<script>console.log('".$temname.$target."');</script>";
	
	mysqli_query($sql_con,"update students set firstname = '$fname',lastname = '$lname',fathername = '$SFname',rollnum = '$rollnum',stdemail = '$email',session = '$session', gender = '$gender',dep = '$depart',snumber = '$number',img = '$target',address = '$address' where id = '$id'");
        echo "<script>alert('Account information updated successfully')</script>";
        echo "<script>window.location = 'user_pro.php'</script>";
}
}
 ?>
