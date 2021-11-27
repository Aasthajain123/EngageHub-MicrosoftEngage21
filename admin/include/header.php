<?php 
  include('dbcon.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Hub</title>
  <!-- plugins:css -->

  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" type="text/css" href="css/all.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" type="text/css" href="css/fileinput.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/fileinput.js" type="text/javascript"></script>
  <script src="js/theme.js" type="text/javascript"></script>


  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/HeadLogo.png" />
  <style type="text/css">
    .fileinput-cancel-button{
        display: none;
    }
    .fileinput-upload-button{
      display: none;
    }
    .close{
      padding-top: 5px !important;
      padding-right: 5px !important;
    }
</style>
<?php 
include('session.php');
 ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard.php">
          <img src="images/Logo.png" alt="logo" style="height: auto">
        </a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php">
          <img src="images/HeadLogo.png" alt="logo"style="width: 60px;height: auto">
        </a>
      </div>
        <a class="logout-para" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-power-off"></i> Logout</a>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
    </nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title profile-btns" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body profile-btns">
        Do you really want to logout?
      </div>
      <div class="modal-footer">
        <a href="logout.php"><button type="button" class="btn btn-outline-primary btn-rounded profile-btns">Yes</button></a>
        <button type="button" class="btn btn-outline-danger btn-rounded profile-btns" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link" style="padding-bottom: 0px">
              <div class="user-image">
                <?php 
                  $data = mysqli_query($sql_con,"select *from admin");
                  $row = mysqli_fetch_array($data);
                  $id = $row['id'];
                  $img = $row['img'];
                 ?>
                <img src="<?php echo $img ?>" alt="">
              </div>
              <br>
              <div class="user-info">
                <?php 
                  $data = mysqli_query($sql_con,"select *from admin");
                  $row = mysqli_fetch_array($data);
                  $name = $row['username'];
                 ?>
                <p class="profile-name"><?php echo $name; ?><br><small class="text-muted"><span class="text-muted status-indicator online"></span> Online</small></p><br>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update_profile.php">
              <i class="menu-icon fas fa-user-edit"></i>
              <span class="menu-title">Update Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic22" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-title">Profiles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic22">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="teacher_pending.php">Pending</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="teacher_profile.php">Teachers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="student_profile.php">Students</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic9" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fas fa-university"></i>
              <span class="menu-title">Department</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic9">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_department.php">Add Department</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_department.php">Manage Department</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic10" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon far fa-calendar-alt"></i>
              <span class="menu-title">Session</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic10">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_session.php">Add Session</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_session.php">Manage Session</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic11" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fas fa-user-clock"></i>
              <span class="menu-title">Semester</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic11">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_semester.php">Add Semester</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_semester.php">Manage Semester</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basicmaterialquiz" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon far fa-question-circle"></i>
              <span class="menu-title">Quiz</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basicmaterialquiz">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_quiz.php">Add Quiz</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_quiz.php">Manage Quiz</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="manage_quiz_result.php">Manage Quiz Results</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic11sub" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fas fa-book"></i>
              <span class="menu-title">Subjects</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic11sub">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_subject.php">Add Subject</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_subject.php">Manage Subject</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fas fa-chalkboard-teacher"></i>
              <span class="menu-title">Notice Board</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_noticeboard.php">Update Notice Board</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_noticeboard.php">Manage Notice Board</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fas fa-copy"></i>
              <span class="menu-title">Result</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_result.php">Add Result</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_result.php">Manage Result</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basicmaterial" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon far fa-folder-open"></i>
              <span class="menu-title">Helping Material</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basicmaterial">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_material.php">Add Material</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_material.php">Manage Material</a>
                </li>
              </ul>
            </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="subscribes.php">
              <i class="menu-icon fas fa-bell"></i>
              <span class="menu-title">Subscribers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link submenu-logout-icon" data-toggle="modal" data-target="#exampleModal">
              <i class="menu-icon mdi mdi-logout-variant"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
