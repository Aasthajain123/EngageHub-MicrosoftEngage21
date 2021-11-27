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
                <p class="text-muted"><i class="fas fa-copy bred-icons"></i> <span class="bred-line">/</span> Manage Result</p>
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
                          <th class="th-sm">Department
                          </th>
                          <th class="th-sm">Session
                          </th>
                          <th class="th-sm">Semester
                          </th>
                          <th class="th-sm">Date</th>
                          <th class="th-sm">File</th>
                          <th class="th-sm">Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $data = mysqli_query($sql_con,"select *from result");
                          while ($row = mysqli_fetch_array($data)) {

                            $depid = $row['department'];
                            $depdata = mysqli_query($sql_con,"select *from departments where id = '$depid'");
                            $deprow = mysqli_fetch_array($depdata);
                            $depname = $deprow['depname'];

                            $secid = $row['session'];
                            $secdata = mysqli_query($sql_con,"select *from session where id = '$secid'");
                            $secrow = mysqli_fetch_array($secdata);
                            $secname = $secrow['session'];

                            $semid = $row['semester'];
                            $semdata = mysqli_query($sql_con,"select *from semester where id = '$semid'");
                            $semrow = mysqli_fetch_array($semdata);
                            $semname = $semrow['semester'];

                           ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $depname; ?></td>
                          <td><?php echo $secname; ?></td>
                          <td><?php echo $semname; ?></td>
                          <td><?php echo $row['rdate']; ?></td>
                          <td>
                            <?php 
                            $file = $row['file'];
                            $filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                            if ($filetype =="jpg" || $filetype =="png" || $filetype =="jpeg") {
                                echo "<a href = '$file' target='_blank'><i class='far fa-file-image file-icons' style='font-size:50px; color: #333'></i></a>";
                            }
                            else if($filetype =="docx" || $filetype =="doc"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-word file-icons' style='font-size:50px; color: #333'></i></a>";
                            }
                            else if($filetype =="pdf"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-pdf file-icons' style='font-size:50px; color: #333'></i></a>"; 
                            }
                            else if($filetype =="pptx" || $filetype =="ppt"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-powerpoint file-icons' style='font-size:50px; color: #333'></i></a>"; 
                            }
                            else{
                             echo "<a href = '$file' target='_blank'><i class='far fa-file-alt file-icons' style='font-size:50px; color: #333'></i></a>"; 
                            
                            }
                             ?>
                            </td>
                          <td>
                            <a href="update_result.php?value=<?php echo $row['id'] ?>" class="btn btn-outline-primary btn-rounded" ><i class="fa fa-edit"></i></a>
                            <a href="" data-toggle = "modal" data-target= "#exampleModaldep<?php echo $row['id'];?>"" class="btn btn-outline-danger btn-rounded" ><i class="fa fa-trash"></i></a>

                            <!-- MODEL -->
                          <div class="modal fade" id="exampleModaldep<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Result</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you really want to delete this result?
                              </div>
                              <div class="modal-footer">
                                <a href="delete_result.php?value=<?php echo $row['id'] ?>" class="btn btn-outline-primary btn-rounded">YES</a>
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