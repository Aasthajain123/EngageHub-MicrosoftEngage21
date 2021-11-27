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
                <p class="text-muted"><i class="fa fa-users bred-icons"></i> <span class="bred-line">/</span> Pending Accounts</p>
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
                          <th class="th-sm">Contact No
                          </th>
                          <th class="th-sm">Email</th>
                          <th class="th-sm">Gender</th>
                          <th class="th-sm">Department</th>
                          <th class="th-sm">Picture</th>
                          <th class="th-sm">Address</th>
                          <th class="th-sm">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $data = mysqli_query($sql_con,"select *from teachers where status = '0' ");
                          while($row=mysqli_fetch_array($data)){
                            $dep = $row['dep'];
                            $result = mysqli_query($sql_con,"select *from departments where id = '$dep'");
                            $res = mysqli_fetch_array($result);
                            $res2 = $res['depname']
                          ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['firstname']; ?></td>
                          <td><?php echo $row['lastname']; ?></td>
                          <td><?php echo $row['tecnumber']; ?></td>
                          <td><?php echo $row['emailfld']; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php echo $res2; ?></td>
                          <td><a href="../<?php echo $row['img'];?>" target="_blank"><img src="../<?php echo $row['img']; ?>" alt=""></a></td>
                          <td><?php echo $row['address']; ?></td>
                          <td>
                            <a href="" class="btn btn-outline-primary btn-rounded" data-toggle="modal" data-target="#exampleModall<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-outline-danger btn-rounded" data-toggle="modal" data-target="#exampleModaldep<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></a>

                            <!-- Modal1-->
                        <div class="modal fade" id="exampleModall<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Approve an account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you really want to approve teacher account?
                              </div>
                              <div class="modal-footer">
                                <a href="approve_teacher.php?value=<?php echo $row['id']?>" class="btn btn-primary">YES</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal2 -->
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
                                Do you really want to delete teacher account?
                              </div>
                              <div class="modal-footer">
                                <a href="approve_teacher_delete.php?value=<?php echo $row['id']?>" class="btn btn-primary">YES</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                              </div>
                            </div>
                          </div>
                        </div>

                          </td>
                        </tr>
                      <?php } ?>
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