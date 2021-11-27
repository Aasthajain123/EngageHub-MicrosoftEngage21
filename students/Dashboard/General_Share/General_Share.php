<?php

$host = "localhost";
  $user = "root";
  $pass = "";
  $database = "engagehub";

if(isset($_POST["submit_file"])){
$selected_username = $_COOKIE["user_first_name"];
$users_last_name = $_COOKIE["users_last_name"];
move_uploaded_file($_FILES["file"]["tmp_name"],"../Profile_Pictures/".$_FILES["file"]["name"]);
$connection_String = mysqli_connect($host,$user,$pass,$database);
$myfiles = $_FILES["file"]["name"];
$update_profile_query = "UPDATE users_table SET Profile_Picture = '$myfiles' WHERE user_fname = '$selected_username'AND user_lname ='$users_last_name' ";
$execute_update_profile_query = mysqli_query($connection_String,$update_profile_query);

}

 ?>
<!--<!DOCTYPE html>-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!-- Importing bootstrap 3.0 and css -->

     <title>Discussion Forum</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/style3.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/uploadify.css">
    <link href="../css/general_share.css" rel="stylesheet"/>

    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.knob.js"></script>
    <script src="../js/jquery.ui.widget.js"></script>
    <script src="../js/jquery.iframe-transport.js"></script>
    <script src="../js/jquery.fileupload.js"></script>
    
    <!-- Our main JS file -->
    <script src="../js/script.js"></script>


</head>

<body>
  <!-- Top bar.....bread crumps -->
<div class="nav main-header" id="top-navigation">
<div id="top-navigation-logo">
  <!-- Logo and Text on the Left Side of the Top bar -->
<span>
<!-- <img id="img-logo" src="../img/logo.png" alt="Logo"/> -->
<a href="#" class="header_text"><p id="header-text" class="text-muted">Public<span style="color:blue"> Share</span></p></a>
</span>
</div>
<!-- Welcome and Username at the right side of the Top Bar -->
<div id="top-navigation-username">


<span style="color:white; margin-top:3px"><em>Welcome,&nbsp;</em></span>
<span style="margin-top:3px"><strong><?php echo ($_COOKIE["user_first_name"]); ?></strong></span>
</div>
</div>

<!-- End Of Top Bar -->

<div class="mycontainer">

	<!-- Side bar begins -->

    <div class="navigations">
        <ul class="lists">
            <li><a href="../General_Message/General_Message.php"><img src="../img/chat-1.png" class="navimg img-responsive" /><span class="nav-writting">Public Chat</span></a></li>
            <li><a href="../Private_Message/Private_Message.php"><img src="../img/send-file.png" class="navimg img-responsive" /><span class="nav-writting">Private Chat</span></a></li>
            <li><a style="border-left:4px solid rgba(69, 162, 255, 0.93); border-radius:10px" href="General_Share.php"><img src="../img/businessman.png" class="navimg img-responsive" /><span class="nav-writting">Public Share</span></a></li>
            <li><a href="../General_announcement/general_announcement.php"><img src="../img/log-file-format-1.png" class="navimg img-responsive" /><span class="nav-writting">General Announcements</span></a></li>
            <li onclick="Logout()"><a href="../../dashboard.php"><img src="../img/logout.png" class="navimg img-responsive" /><span class="nav-writting">Logout</span></a></li>

          </ul>
    </div>

    <!-- Side Bar Ends Here -->

   <div class="main_content">
      <div class="main_content_holder">
      <div class = "panel panel-adjusted">
       <div class = "panel-heading phead">
        <h2 class = "panel-title ptitle">Public Share</h2>
       </div>
      <div class = "panel-body pbody">
      <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
      <div id="drop">
        Drop Here

      <a>Browse</a>
      <input type="file" name="upl" multiple />
      </div>

      <ul>
        <!-- The file uploads will be shown here -->
      </ul>

    </form>

          </div>
        </div>

         <div class="side_bar_holder">
          <div class="designer">
           <div style="text-align:center;padding-top:15px"><span style="color:white;font-weight:bold">PUBLIC UPLOADS<span></div>
          </div>



          <div class="uploaded_container">


          </div>



          </div>

        </div>

     </div>

   </div>




    <script>

    $(document).ready(function(){

      $("#my_profile_picture").load("Get_Profile_Picture.php");

      $(" #my_profile_picture").click(function(){
      $('#file').trigger("click");
      });

      $("#file").change(function(){
        $("#submit_file").trigger("click");
      });

      $("#submit_file").click(function(){
          $(this).submit();
      });

    });

    setInterval(function(){
     $(".uploaded_container").load("uploaded.php");
   },2000);


    </script>

    <script type="text/javascript">
    function Logout(){
    $.get("../Logout/Logout.php");
    }
 </script>

  </body>
  </html>
