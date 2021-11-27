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
                <p class="text-muted"><i class="mdi mdi-account-circle bred-icons"></i> <span class="bred-line">/</span> Profile</p>
              </span>
            </div>
          </div>
          <div class="row">
            <?php 
            $id = $_SESSION['sid'];
            $data = mysqli_query($sql_con,"Select *from students where id ='$id'");
            $row = mysqli_fetch_array($data);
            
            $depid = $row['dep'];
            $depdata = mysqli_query($sql_con,"select *from departments where id = '$depid'");
            $deprow = mysqli_fetch_array($depdata);

            $secid = $row['session'];
            $secdata = mysqli_query($sql_con,"select *from session where id = '$secid'");
            $secrow = mysqli_fetch_array($secdata);
             ?>
          	<div class="user-profile">
          		<img src="../<?php echo $row['img'] ?>" alt="">
          		<p class="hello-user">Hello <br><span class="user-name"><?php echo $row['firstname']." ".$row['lastname']; ?></span></p>
          		<p class="user-info-heading">account Information</p>
          		<div class="user-details">
          			<p>First Name: <span class="details-text"><?php echo $row['firstname']?></span></p>
          			<p>Last Name: <span class="details-text"><?php echo $row['lastname']?></span></p>
          			<p>Father Name: <span class="details-text"><?php echo $row['fathername']?></span></p>
                <p>Roll Number: <span class="details-text"><?php echo $row['rollnum']?></span></p>
          			<p>Email Address: <span class="details-text"><?php echo $row['stdemail']?></span></p>
                <p>Session: <span class="details-text"><?php echo $secrow['session']?></span></p>
          			<p>Gender: <span class="details-text"><?php echo $row['gender']?></span></p>
          			<p>Department: <span class="details-text"><?php echo $deprow['depname']?></span></p>
                <p>Phone Number: <span class="details-text"><?php echo $row['snumber']?></span></p>
          			<p>Address: <span class="details-text"><?php echo $row['address']?></span></p> 
                <a href="update_student_profile.php"><button class="btn btn-outline-primary btn-rounded profile-btns">Update Profile</button></a>
                <a href="" data-toggle="modal" data-target="#exampleModaldep<?php echo $row['id'] ?>"><button class="btn btn-outline-danger btn-rounded profile-btns btn-delete-pro">Delete Profile</button></a>

                <!-- Modal -->
                        <div class="modal fade" id="exampleModaldep<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete an account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you really want to delete your account?
                              </div>
                              <div class="modal-footer">
                                <a href="delete_student_profile.php?value=<?php echo $row['id']?>" class="btn btn-primary">YES</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                              </div>
                            </div>
                          </div>
                        </div>
                <br> <br>
          		</div>
          	</div>
        </div>
        <!-- content-wrapper ends -->

 


 <?php 
	include('include/footer.php');
 ?>


 </body>
 </html>