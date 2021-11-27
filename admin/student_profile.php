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
                <p class="text-muted"><i class="fa fa-users bred-icons"></i> <span class="bred-line">/</span> Students</p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel2">
                  <div class="table-responsive">
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm">ID
                          </th>
                          <th class="th-sm">First Name
                          </th>
                          <th class="th-sm">Last Name
                          </th>
                          <th class="th-sm">Father Name
                          </th>
                          <th class="th-sm">Roll No</th>
                          <th class="th-sm">Email</th>
                          <th class="th-sm">Session</th>
                          <th class="th-sm">Gender</th>
                          <th class="th-sm">Department</th>
                          <th class="th-sm">Phone No</th>
                          <th class="th-sm">Picture</th>
                          <th class="th-sm">Address</th>
                          <th class="th-sm">Action
                          </th>
                        </tr>
                      </thead>
                      <?php 
                          $data = mysqli_query($sql_con,"select *from students");
                          while($row=mysqli_fetch_array($data)){
                            $dep = $row['dep'];
                            $result = mysqli_query($sql_con,"select *from departments where id = '$dep'");
                            $res = mysqli_fetch_array($result);
                            $res2 = $res['depname'];

                            $sec = $row['session'];
                            $result2 = mysqli_query($sql_con,"select *from session where id = '$sec'");
                            $ressec = mysqli_fetch_array($result2);
                            $secres2 = $ressec['session'];
                          ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['firstname']; ?></td>
                          <td><?php echo $row['lastname']; ?></td>
                          <td><?php echo $row['fathername']; ?></td>
                          <td><?php echo $row['rollnum']; ?></td>
                          <td><?php echo $row['stdemail']; ?></td>
                          <td><?php echo $secres2; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php echo $res2; ?></td>
                          <td><?php echo $row['snumber']; ?></td>
                          <td><a href="../<?php echo $row['img']; ?>" target="_blank"><img src="../<?php echo $row['img']; ?>" alt=""></a></td>
                          <td><?php echo $row['address']; ?></td>
                          <td>
                            <a href="update_student_profile.php?value=<?php echo $row['id']?>" class="btn btn-outline-primary btn-rounded"><i class="fa fa-edit"></i></a>
                            <a data-toggle="modal" data-target="#exampleModalllp<?php echo $row['id']?>" href="" class="btn btn-outline-danger btn-rounded"><i class="fa fa-trash"></i></a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalllp<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete an account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you really want to delete student account?
                              </div>
                              <div class="modal-footer">
                                <a href="delete_student_profile.php?value=<?php echo $row['id']?>" class="btn btn-outline-primary btn-rounded ">YES</a>
                                <button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal">NO</button>
                              </div>
                            </div>
                          </div>
                        </div>
                          </td>
                        </tr>
                      <?php } ?>
                      <tbody>
                      </tbody>
                    </table>
          </div>
        </div>
      </div>
    </div>
        <!-- content-wrapper ends -->

   <?php 
    include('include/footer.php');
   ?>
   <script type="text/javascript">
     $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});


   </script>
 </body>
 </html>