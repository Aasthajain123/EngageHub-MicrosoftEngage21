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

    <!-- Importing bootstrap 3.0, css and Javascript Files -->
    <meta charset="UTF-8" />

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet"/>
    <link href="../css/bootstrap-select.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet" rel="stylesheet"/>
    <link href="general_announcement.css" media="all" rel="stylesheet"/>


    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="../js/jquery.yacal.min.js"></script>


</head>
<body>

	<!-- Top bar.....bread crumps -->

<div class="nav main-header" id="top-navigation">
<div id="top-navigation-logo">

  <!-- Logo and Text on the Left Side of the Top bar -->

<span>
<!-- <img id="img-logo" src="../img/logo.png" alt="Logo"/> -->
<a href="#" class="header_text"> <p id="header-text" class="text-muted">Discussion<span style="color:blue"> Announcement</span></p></a>
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
            <li><a href="../General_Share/General_Share.php"><img src="../img/businessman.png" class="navimg img-responsive" /><span class="nav-writting">Public Share</span></a></li>
            <li><a style="border-left:4px solid rgba(69, 162, 255, 0.93); border-radius:10px" href="#"><img src="../img/log-file-format-1.png" class="navimg img-responsive" /><span class="nav-writting">General Announcements</span></a></li>
            <li onclick="Logout()"><a href="../../dashboard.php"><img src="../img/logout.png" class="navimg img-responsive" /><span class="nav-writting">Logout</span></a></li>

          </ul>
    </div>

    <!-- Side Bar Ends Here -->

    <!-- Main Content Starts Here -->

    <div class="container-fluid">

      <div class="announcement_page">
        <div class="row row-adjusted">

        </div>
      </div>


    <div class="right-page">
      <br>
      <div style="text-align:center">
      <span style="text-align:center;font-weight:bold">POST ANNOUNCEMENT</span>
      <hr>
    </div>

    <form method="post" action="">
      <div class="form-group">
           <label for="txt_title" class="msg_title">Message Title</label>
           <input type="text" class="form-control form-control-adjusted" id="txt_title" placeholder="Enter message title">
      </div>
    <div class="form-group">
      <label for="txt_announcement" class="msg_title">Message </label>
      <textarea  class="form-control" id="txt_announcement" placeholder="Enter announcement here"></textarea>
    </div>
    <div class="form-group" id="btn_holder">
    <button class="btn btn-primary" id="btn_post">Post</button>
    </div>
  </form>
    </div>
    </div>

  <script>
  $(document).ready(function(){

      $("#my_profile_picture").load("Get_Profile_Picture.php");

    setInterval(function(){
     $(".row-adjusted").load("get_announcement.php").fadeIn("slow");
   },500);

     $("#btn_post").click(function(){
       var title_holder = $("#txt_title").val();
       var message_holder = $("#txt_announcement").val();
       $.ajax({
         method:"POST",
         url:"",
        data:{title:title_holder,
          message:message_holder},
        success:function(status){
          $(".row-adjusted").load("get_announcement.php").fadeIn("slow");
            }
       });
     });


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
  </script>

  <script>
    function Logout(){
    $.get("../Logout/Logout.php");
    }
  </script>

  <?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "engagehub";

  $connection_String = mysqli_connect($host,$user,$pass,$database);

    $message_title = $_POST["title"];
    $message_body = $_POST["message"];
    $message_sender = $_COOKIE["user_first_name"];

    if($message_title!=""&& $message_body!=""){

      $insert_query_command = "INSERT INTO general_announcement (`id`, `message_title`, `message_body`, `sender`, `date`) VALUES (NULL, '$message_title', '$message_body', '$message_sender', CURRENT_TIMESTAMP)";
      $execute_insert_query = mysqli_query($connection_String,$insert_query_command);
    }

   ?>

  </body>
  </html>
