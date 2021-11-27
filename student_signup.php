<?php 
    include 'include/header.php';
    include ('admin/include/dbcon.php');
 ?>
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputState3").on('change',function(){
           var val2 = $("#inputState3").val();
            $.ajax({
                
                url: "stdsec.php",
                method: "post",
                data: 'myvalue='+val2
            }).done(function(sec){
                 $('#inputState1').html(sec);
            }) 
       })
    });
  </script>
<!-- STUDENT FORM SECTION START -->
<section class="SignupForm-bg-image navbar-bottom-space fixNavColor" id="student-form">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-col">
                    <div class="outerdiv Signup-outerdiv">
                        <h1 class="Login-text">Student Signup Form</h1>
                        <div class="InnerDiv InnerDiv2">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input name="fname"  title="At least three characters" type="text" class="form-control input-fields" placeholder="First Name" required id="firstname">
                                    <span class="text-danger" id="fname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="lname" title="At least three characters" type="text" class="form-control input-fields" placeholder="Last Name" required id="secondname">
                                    <span class="text-danger" id="Slname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="ffname" title="At least three characters" type="text" class="form-control input-fields" placeholder="Father Name" required id="fathername">
                                    <span class="text-danger" id="SFname"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="rollnum" title="Required BCS-M-47" type="text" class="form-control input-fields" placeholder="Roll Number" required id="rollnum">
                                    <span class="text-danger" id="Srollnum"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="pass" type="password" class="form-control input-fields" placeholder="Your Password" required id="password">
                                    <span class="text-danger" id="Spassword"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="Cpass" type="password" class="form-control input-fields" placeholder="Confirm Password" required id="cpassword">
                                    <span class="text-danger" id="SCpassword"></span>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input name="email" title="Email pattren required" type="email" class="form-control input-fields" placeholder="Email Address" required id="email">
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
                                        <input name="number" type="text" class="form-control input-fields" placeholder="Contact Number" required id="number">
                                        <span class="text-danger" id="Snumber"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="upload-div">
                                            <input name="img" type="file" class="form-control" id="real-input" hidden="hidden" required id="img">
                                            <button type="button" id="custom-button">Upload Profile Picture
                                            </button><br class="Br-Hide">
                                            <span id="custom-text">No file chosen</span>
                                        </div>
                                        <span class="text-danger" id="imgerror"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <input name="address" type="text" class="form-control input-fields" id="inputAddress" placeholder="Enter Your Address" required>
                                <span class="text-danger" id="Saddress"></span>
                                </div>
                                <center>
                                    <input name="submit" type="submit" class="btn btn-primary btn-signUp-form" value="Sign up" onclick="return validate2();">
                                </center>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STUDENT FORM SECTION END -->



    <?php 
        include('js/customUpload.js');
        include('include/footer.php');
    ?>
    <script type="text/javascript">
        function validate2(){
            var fname = document.getElementById('firstname').value;
            var lname = document.getElementById('secondname').value;
            var fathername = document.getElementById('fathername').value;
            var rollnum = document.getElementById('rollnum').value;
            var password = document.getElementById('password').value;
            var cpassword = document.getElementById('cpassword').value;
            var email = document.getElementById('email').value;
            var number = document.getElementById('number').value;
            var address = document.getElementById('inputAddress').value;

            var fnameCheck = /^[A-Za-z]{1,20}$/;
            var lnameCheck = /^[A-Za-z]{1,20}$/;
            var fathernameCheck = /^[A-Za-z]{1,20}$/;
            var rollnumCheck = /^[\d]{1,20}$/;
            var emailCheck = /^([\w-\.]+@([\w-]*\.)+[\w-]{2,4})?$/;
            var numberCheck = /^((\+91)|(0091))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
            
          

            if (rollnumCheck.test(rollnum)) {
                document.getElementById('Srollnum').innerHTML = " ";
            }
            else{
                document.getElementById('Srollnum').innerHTML = "** Roll number is invalid !"; 
                return false;  
            }
            if (cpassword.match(password)) {
                document.getElementById('SCpassword').innerHTML = " ";
            }
            else{
                document.getElementById('SCpassword').innerHTML = "** Password is not matching !";
                return false;
            }
            if (emailCheck.test(email)) {
                document.getElementById('Semail').innerHTML = " ";
            }
            else{
                document.getElementById('Semail').innerHTML = "** Email is invalid !"; 
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
            
            if($('#inputAddress').val().length < 20 || $('#inputAddress').val() == ""){
                document.getElementById('Saddress').innerHTML = "** Atleast 20 characters"; 
                return false;  
            }
            else{
                document.getElementById('Saddress').innerHTML = " ";   
            }
        }
    </script>
    
</body>
</html>
<?php 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $data = mysqli_query($sql_con,"select stdemail from students");
    while ($row = mysqli_fetch_array($data)) {
    $emaildb = $row['stdemail'];
    if($emaildb == $email){
        echo "<script>document.getElementById('Semail').innerHTML = '** Email already exist'; </script>";
        exit();
        }
    }
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
    move_uploaded_file($temname,$target);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $SFname = $_POST['ffname'];
    $rollnum = $_POST['rollnum'];    
    $Cpass = $_POST['Cpass'];
    $email = $_POST['email'];
    $session = $_POST['session'];
    $gender = $_POST['gender']; 
    $depart = $_POST['dep'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    mysqli_query($sql_con,"insert into students (firstname,lastname,fathername,rollnum,password,stdemail,session,gender,dep,snumber,img,address) values ('$fname','$lname','$SFname','$rollnum','$Cpass','$email','$session','$gender','$depart','$number','$target','$address')");
    mysqli_query($sql_con,"insert into users_table (Users_ID, user_fname, user_lname, Password, Profile_Picture) values (' ','$fname','$lname','$Cpass','')");

     

    echo "<script>alert('You are successfully registered')</script>";
  echo "<script>window.location = 'studentlogin.php'</script>";

}
}
 ?>