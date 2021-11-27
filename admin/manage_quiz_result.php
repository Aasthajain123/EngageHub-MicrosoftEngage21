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
                <p class="text-muted"><i class="far fa-question-circle bred-icons"></i> <span class="bred-line">/</span> Manage Quiz</p>
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
                          <th class="th-sm">Quiz Date
                          </th>
                          <th class="th-sm">Quiz Title
                          </th>
                          <th class="th-sm">Student Name
                          </th>
                          <th class="th-sm">Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $userid = $_SESSION['id'];
                        $query = mysqli_query($sql_con,"SELECT *, id AS id FROM quizresult GROUP BY id");
                         while ($subrow = mysqli_fetch_array($query)) {
                          
                           $quzid = $subrow['quizid'];
                           $stdid = $subrow['userid'];

                           $quziquery = mysqli_query($sql_con,"select *from quiz where id = '$quzid'");
                           $quizrow = mysqli_fetch_array($quziquery);
                           $subid = $quizrow['subject'];
                           $sessid = $quizrow['session'];
                           $depid = $quizrow['department'];
                           $semid = $quizrow['semester'];
                           $quizdate = $quizrow['quizdate'];
                           $quiztitle = $quizrow['quiztitle'];

                           $datasub = mysqli_query($sql_con,"select *from subjects where id = '$subid'");
                           $subfetch = mysqli_fetch_array($datasub);
                           $subname = $subfetch['sname'];

                           $stdquery = mysqli_query($sql_con,"select *from students where id = '$stdid'");
                           $stdrow = mysqli_fetch_array($stdquery);
                           $stdname = $stdrow['firstname'];
                           $stdname2 = $stdrow['lastname'];

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
                          <td><?php echo $subname; ?></td>
                          <td><?php echo $semname; ?></td>
                          <td><?php echo $sessname; ?></td>
                          <td><?php echo $depname; ?></td>
                          <td><?php echo $quizdate; ?></td>
                          <td><?php echo $quiztitle; ?></td>
                          <td><?php echo $stdname." ".$stdname2; ?></td>
                          <td>
                            <a href="quiz_detail2.php?value=<?php echo $subrow['id']; ?>" class="btn btn-outline-primary btn-rounded" >Details</a>
                            <a href="" data-toggle="modal" data-target= "#exampleModaldep<?php echo $subrow['id'];?>" class="btn btn-outline-danger btn-rounded" ><i class="fa fa-trash"></i></a>

                           <!-- MODEL -->
                          <div class="modal fade" id="exampleModaldep<?php echo $subrow['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete result</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you really want to delete quiz result?
                              </div>
                              <div class="modal-footer">
                                <a href="delete_quiz2.php?value=<?php echo $subrow['id']?>" class="btn btn-outline-primary btn-rounded">YES</a>
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