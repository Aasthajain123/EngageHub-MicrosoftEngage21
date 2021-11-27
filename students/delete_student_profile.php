<?php 
include('include/dbcon.php');
if(isset($_GET['value'])){
 $id = $_GET['value'];
 $data = mysqli_query($sql_con,"select *from students where id = '$id'");
 $row = mysqli_fetch_array($data);
 $img = $row['img'];
 if (file_exists('../'.$img)) 
               {
                 unlink('../'.$img);
             }
                 mysqli_query($sql_con,"DELETE FROM students WHERE id='$id'");
                 echo "<script>alert('Student profile Successfully Deleted')</script>";
 				 session_start();
 				 unset($_SESSION['sid']);
 				 echo "<script>window.location = '../index.php'</script>";
 				 
 }
 ?>
