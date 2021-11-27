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
    }
    else if($size > 2097152){
        echo "<script>document.getElementById('imgerror').innerHTML = '** File is larger than 2MP';</script>";
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
    // echo "<script>alert('You are successfully logedin !')</script>";
    echo "<script>window.location = 'teacherlogin.php'</script>";
}
}
 ?>