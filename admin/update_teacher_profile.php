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
                <p class="text-muted"><i class="fas fa-user-edit bred-icons"></i> <span class="bred-line">/</span> Update Profile</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <!-- TEACHER FORM SECTION START -->
                <div class="col-sm-12">
        <div class="panel">
          <?php 
            $tecid = $_GET['value'];
            $data = mysqli_query($sql_con,"select *from teachers where id = '$tecid'");
            $row = mysqli_fetch_array($data);
            $tecimg =  $row['img'];
            $address = $row['address'];
            $gender = $row['gender'];
          ?>
          <img src="<?php echo "../".$tecimg ?>" alt="" class="profile-image"><hr>
          <form onsubmit="return myfun();" class="update-pro-form" action="" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['firstname']; ?>" name="fname" type="text" class="form-control input-fields" id="userFName" placeholder="First Name" required title="At least three characters">
                                    <span class="text-danger" id="fname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['lastname']; ?>" name="lname" type="text" class="form-control input-fields" id="secondname" placeholder="Last Name" required title="At least three characters">
                                    <span class="text-danger" id="Slname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['tecnumber']; ?>" name="number" type="text" class="form-control input-fields" id="number" placeholder="Contact Number" required title="Required +903012345678">
                                    <span class="text-danger" id="Snumber"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input value="<?php echo $row['emailfld']; ?>" name="email" type="email" class="form-control input-fields" id="email" placeholder="Email Address" required title="Email pattren required">
                                    <span class="text-danger" id="Semail"></span>
                                  </div>
                                    <div class="form-group col-md-6">
                                        <select name="gender" id="inputState1" class="form-control input-fields" required="true">
                                            <option value="">Gender</option>
                                            <option value="male" >Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                         <span class="text-danger" id="Sgender"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="dep" id="inputState2" class="form-control input-fields" required="true">
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
                                        <input name="img" type="file" class="form-control upload-div" required>
                                        <span id="imgerror" class="text-danger"></span>
                                    </div>
                                <div class="form-group col-md-6">
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
        function myfun(){
            var fname = document.getElementById('userFName').value;
            var lname = document.getElementById('secondname').value;
            var number = document.getElementById('number').value;
            var email = document.getElementById('email').value;

            var fnameCheck = /^[A-Za-z]{3,20}$/;
            var lnameCheck = /^[A-Za-z]{3,20}$/;
            var numberCheck = /^((\+91)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
            var emailCheck = /^([\w-\.]+@([\w-]*\.)+[\w-]{2,4})?$/;
            
            if (fnameCheck.test(fname)) {
                document.getElementById('fname').innerHTML = " ";
            }
            else{
                document.getElementById('fname').innerHTML = "** Name is invalid !"; 
                return false;  
            }
            if (lnameCheck.test(lname)) {
                document.getElementById('Slname').innerHTML = " ";
            }
            else{
                document.getElementById('Slname').innerHTML = "** Name is invalid !"; 
                return false;  
            }
            if (!isNaN($("number").val())) {
            }
            else if (numberCheck.test(number)) {
                document.getElementById('Snumber').innerHTML = " ";
            }
            else{
                document.getElementById('Snumber').innerHTML = "** Phone number is invalid !"; 
                return false;  
            }
            if (emailCheck.test(email)) {
                document.getElementById('Semail').innerHTML = " ";
            }
            else{
                document.getElementById('Semail').innerHTML = "** Email is invalid !"; 
                return false;  
            }
            if($('#inputAddress').val().length < 20 || $('#inputAddress').val() == ""){
                document.getElementById('Saddress').innerHTML = "** Atleast 20 characters"; 
                return false;  
            }
            else{
                document.getElementById('Saddress').innerHTML = " ";   
            }
        }
    </script>
    <script src="js/customUpload2.js"></script>
</body>
</html>
<?php 
if (isset($_POST['submit'])) {

    $folder = "uploads/";
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
      if(isset($_GET['value'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $gender = $_POST['gender']; 
        $depart = $_POST['dep'];
        $address = $_POST['address'];
        $status = 1;
        $id = $_GET['value'];
        
        $data = mysqli_query($sql_con,"select *from teachers");
        $row = mysqli_fetch_array($data);
        $img = $row['img'];
        if (file_exists("../".$img))
        {
          unlink("../".$img);   
        }
        move_uploaded_file($temname,"../".$target);
        mysqli_query($sql_con,"update teachers set firstname = '$fname',lastname = '$lname',tecnumber = '$number',emailfld = '$email',gender = '$gender',dep = '$depart',img = '$target',address = '$address',status = '$status' where id = '$id'");
        echo "<script>alert('Account information updated successfully')</script>";
        echo "<script>window.location = 'teacher_profile.php'</script>";
      }
      else{
        echo "<script>alert('Go back and try again something wrong')</script>";
        echo "<script>window.location = 'teacher_profile.php'</script>";
      }
}
}
 ?>