<?php 
include('include/dbcon.php');
if(isset($_GET['value'])){
 $id = $_GET['value'];
 $status = 1;
 $data = mysqli_query($sql_con,"select *from teachers where id = '$id'");
 $row = mysqli_fetch_array($data);
 $img = $row['img'];
 if (file_exists('../'.$img)) 
               {
                 unlink('../'.$img);
             }
                 mysqli_query($sql_con,"DELETE FROM teachers WHERE id='$id'");
                 echo "<script>alert('Teacher profile Successfully Deleted')</script>";
 				 echo "<script>window.location = 'teacher_profile.php'</script>";
 }
 ?>
