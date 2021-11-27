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
                <p class="text-muted"><i class="fas fa-book bred-icons"></i> <span class="bred-line">/</span> Manage Subjects</p>
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
                          <th class="th-sm">Subject
                          </th>
                          <th class="th-sm">Semester
                          </th>
                          <th class="th-sm">Session
                          </th>
                          <th class="th-sm">Department
                          </th>
                          <th class="th-sm">Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = mysqli_query($sql_con,"select *from subjects");
                         while ($subrow = mysqli_fetch_array($query)) {
                           
                           $semid = $subrow['semester'];
                           $sessid = $subrow['session'];
                           $depid = $subrow['department'];
                           
                           $data = mysqli_query($sql_con,"select *from semester where id = '$semid'");
                           $semfetch = mysqli_fetch_array($data);
                           $semname = $semfetch['semester'];

                           $data2 = mysqli_query($sql_con,"select *from session where id = '$sessid'");
                           $row2 = mysqli_fetch_array($data2);
                           $sessname = $row2['session'];

                           $data3 = mysqli_query($sql_con,"select *from departments where id = '$depid'");
                           $row3 = mysqli_fetch_array($data3);
                           $depname = $row3['depname'];
                         ?>
                        <tr>
                          <td><?php echo $subrow['id']; ?></td>
                          <td><?php echo $subrow['sname']; ?></td>
                          <td><?php echo $semname; ?></td>
                          <td><?php echo $sessname; ?></td>
                          <td><?php echo $depname; ?></td>
                          <td>
                            <a href="update_subject.php?value=<?php echo $subrow['id']; ?>" class="btn btn-outline-primary btn-rounded" ><i class="fa fa-edit"></i></a>
                            <a href="" data-toggle="modal" data-target= "#exampleModaldep<?php echo $subrow['id'];?>" class="btn btn-outline-danger btn-rounded" ><i class="fa fa-trash"></i></a>

                           <!-- MODEL -->
                          <div class="modal fade" id="exampleModaldep<?php echo $subrow['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you really want to delete subject?
                              </div>
                              <div class="modal-footer">
                                <a href="delete_subject.php?value=<?php echo $subrow['id']?>" class="btn btn-outline-primary btn-rounded">YES</a>
                                <button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal">NO</button>
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