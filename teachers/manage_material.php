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
                <p class="text-muted"><i class="far fa-folder-open bred-icons"></i> <span class="bred-line">/</span> Manage Material</p>
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
                          <th class="th-sm">Subject
                          </th>
                          <th class="th-sm">Date</th>
                          <th class="th-sm">File</th>
                          <th class="th-sm">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $data = mysqli_query($sql_con,"SELECT * FROM material");
                        while ($row = mysqli_fetch_array($data)) {
                         ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td>
                          <?php 
                          $dep = $row['department'];
                          $sec = $row['session'];
                          $sem = $row['semester'];
                          $sub = $row['subject'];
                          $date = $row['mdate'];
                          $file2 = $row['file'];
                          $file = "../admin/".$file2;

                          $qudep = mysqli_query($sql_con,"select *from departments where id = '$dep'");
                          $rowdep = mysqli_fetch_array($qudep);

                          $qusec = mysqli_query($sql_con,"select *from session where id = '$sec'");
                          $rowsec = mysqli_fetch_array($qusec);

                          $qusem = mysqli_query($sql_con,"select *from semester where id = '$sem'");
                          $rowsem = mysqli_fetch_array($qusem);


                          $qusub = mysqli_query($sql_con,"select *from subjects where id = '$sub'");
                          $rowsub = mysqli_fetch_array($qusub);
                          
                          echo $rowdep['depname'];
                          ?>  
                          </td>
                          <td><?php echo $rowsec['session']; ?></td>
                          <td><?php echo $rowsem['semester'] ?></td>
                          <td><?php echo $rowsub['sname']; ?></td>
                          <td><?php echo $row['mdate']; ?></td>
                          <td>
                          <?php 

                          $filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                            if ($filetype =="jpg" || $filetype =="png" || $filetype =="jpeg") {
                                echo "<a href = '$file' target='_blank'><i class='far fa-file-image file-icons' style='font-size:50px; color: #333'></i></a>";
                            }
                            else if($filetype =="docx" || $filetype =="doc"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-word file-icons' style='font-size:50px; color: #333'></i></a>";
                            }
                            else if($filetype =="ppt" || $filetype =="pptx"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-powerpoint file-icons' style='font-size:50px; color: #333'></i></a>";
                            }
                            else if($filetype =="pdf"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-pdf file-icons' style='font-size:50px; color: #333'></i></a>";
                            }
                            else if($filetype =="mp4" || $filetype =="mkv" || $filetype =="avi" || $filetype =="3gp"){
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-video file-icons' style='font-size:50px; color: #333'></i></a>";
                            }
                            else{
                              echo "<a href = '$file' target='_blank'><i class='far fa-file-alt file-icons' style='font-size:50px; color: #333'></i></a>"; 
                            }
                           ?>  
                          
                          </td>
                          <td>
                            <a href="update_material.php?value=<?php echo $row['id'] ?>" class="btn btn-outline-primary btn-rounded"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-outline-danger btn-rounded" data-toggle = "modal" data-target= "#exampleModaldep<?php echo $row['id'];?>"><i class="fa fa-trash"></i></a>

                            <!-- MODEL -->
                          <div class="modal fade" id="exampleModaldep<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you really want to delete this file?
                              </div>
                              <div class="modal-footer">
                                <a href="delete_material.php?value=<?php echo $row['id'] ?>" class="btn btn-outline-primary btn-rounded">YES</a>
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