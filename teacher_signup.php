<?php 
    include ('include/header.php');
    include ('admin/include/dbcon.php');
 ?>

<!-- TEACHER FORM SECTION START -->
    
<section class="SignupForm-bg-image teacher-Signupsec-bg-img navbar-bottom-space" id="teacher-form">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-col">
                    <div class="outerdiv Signup-outerdiv">
                        <h1 class="Login-text">Teacher Signup Form</h1>
                        <div class="InnerDiv InnerDiv2">
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validate();">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input name="fname" type="text" class="form-control input-fields" id="userFName" placeholder="First Name" required title="At least three characters">
                                    <span class="text-danger" id="fname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="lname" type="text" class="form-control input-fields" id="secondname" placeholder="Last Name" required title="At least three characters">
                                    <span class="text-danger" id="Slname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="number" type="text" class="form-control input-fields" id="number" placeholder="Contact Number" required title="Required +903012345678">
                                    <span class="text-danger" id="Snumber"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="email" type="email" class="form-control input-fields" id="email" placeholder="Email Address" required title="Email pattren required">
                                    <span class="text-danger" id="Semail"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="pass" type="password" class="form-control input-fields" id="password" placeholder="Your Password" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="Cpass" type="password" class="form-control input-fields" id="cpassword" placeholder="Confirm Password" required>
                                    <span class="text-danger" id="SCpassword"></span>
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
                                        <div class="upload-div">
                                            <input name="img" type="file" class="form-control" id="real-input1" hidden="hidden" required>
                                            <button type="button" id="custom-button1">Upload Profile Picture
                                            </button><br class="Br-Hide">
                                            <span id="custom-text1">No file chosen</span>
                                        </div>
                                            <span id="imgerror" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <input name="address" type="text" class="form-control input-fields" id="inputAddress" placeholder="Enter Your Address" required>
                                      <span class="text-danger" id="Saddress"></span>
                                    </div>
                                </div>
                                <center>
                                    <input name="submit" type="submit" value="Sign up" class="btn btn-primary btn-signUp-form">
                                </center>   
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TEACHER FORM SECTION END -->

    <?php 
        include('include/footer.php');
    ?>
     <script type="text/javascript">
        function validate(){
            var fname = document.getElementById('userFName').value;
            var lname = document.getElementById('secondname').value;
            var number = document.getElementById('number').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var cpassword = document.getElementById('cpassword').value;

            var fnameCheck = /^[A-Za-z]{1,20}$/;
            var lnameCheck = /^[A-Za-z]{1,20}$/;
            var numberCheck = /^((\+91)|(0091))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
            var emailCheck = /^([\w-\.]+@([\w-]*\.)+[\w-]{2,4})?$/;
            
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
            if (cpassword.match(password)) {
                document.getElementById('SCpassword').innerHTML = " ";
            }
            else{
                document.getElementById('SCpassword').innerHTML = "** Password is not matching !";
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
    $email = $_POST['email'];
    $data = mysqli_query($sql_con,"select emailfld from teachers");
    while ($row = mysqli_fetch_array($data)) {
    $emaildb = $row['emailfld'];
    if($emaildb == $email){
        echo "<script>document.getElementById('Semail').innerHTML = '** Email already exist'; </script>";
        exit();
        }
    }
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
    move_uploaded_file($temname,$target);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $Cpass = $_POST['Cpass'];
    $gender = $_POST['gender']; 
    $depart = $_POST['dep'];
    $address = $_POST['address'];
    $status = 0;
    mysqli_query($sql_con,"insert into teachers (firstname,lastname,tecnumber,emailfld,password,gender,dep,img,address,status) values ('$fname','$lname','$number','$email','$Cpass','$gender','$depart','$target','$address','$status')");
  echo "<script>alert('Successfully Registered Wait for account approval')</script>";
  echo "<script>window.location = 'teacherlogin.php'</script>";

}
}
 ?>