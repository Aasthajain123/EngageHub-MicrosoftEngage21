<!--<!DOCTYPE html>-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!-- Importing bootstrap 3.0, css and Javascript Files -->
    <meta charset="UTF-8" />

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" rel="stylesheet"/>
    <link href="style.css" media="all" rel="stylesheet"/>
    <link href="../css/jquery.yacal.css" rel="stylesheet"/>


    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.yacal.min.js"></script>


</head>
<body>

	<!-- Top bar.....bread crumps -->

<div class="nav main-header" id="top-navigation">
<div id="top-navigation-logo">

  <!-- Logo and Text on the Left Side of the Top bar -->

<span>
<!-- <img id="img-logo" src="../img/logo.png" alt="Logo"/> -->
<a href="#" class="header_text"> <p id="header-text" class="text-muted">PUBLIC <span style="color:blue"> CHAT</span></p></a>
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
            <li><a style="border-left:4px solid rgba(69, 162, 255, 0.93); border-radius:10px" href="General_Message.php"><img src="../img/chat-1.png" class="navimg img-responsive" /><span class="nav-writting">Public Chat</span></a></li>
            <li><a href="../Private_Message/Private_Message.php"><img src="../img/send-file.png" class="navimg img-responsive" /><span class="nav-writting">Private Chat</span></a></li>
            <li><a href="../General_Share/General_Share.php"><img src="../img/businessman.png" class="navimg img-responsive" /><span class="nav-writting">Public Share</span></a></li>
            <li><a href="../General_announcement/general_announcement.php"><img src="../img/log-file-format-1.png" class="navimg img-responsive" /><span class="nav-writting">General Announcements</span></a></li>
            <li onclick="Logout()"><a href="../../dashboard.php"><img src="../img/logout.png" class="navimg img-responsive" /><span class="nav-writting">Logout</span></a></li>
        </ul>
    </div>

    <!-- Side Bar Ends Here -->

    <!-- Main Content Starts Here -->

        <div class="container-fluid" id="main_content">

            <div style="display:none">
            <form method="post" action="" enctype="multipart/form-data">
              <input type="file" name="file" id="my_upload_file"/>
              <input type="submit" name="upload_file" id="upload_file"/>
            </form>
            </div>

      <div class="row">

      <div id="Main_Chat_Box" class="col-md-8">
        <br>
        <div id="get_chatting_user_name">
          <div style="font-weight:bold;font-size:1.2em;float:left;color:rgba(69, 162, 255, 0.93)">Public Chat</div>
          <div style="float:right"><img src="../img/upload.png" id="btn_upload" style="cursor:hand;margin-right:15px; margin-top:-10px" height=35px width=35px title="Click here to upload file"/></div>
          <br>
        </div>
        <hr>
      <div id="get_chat_logs">


      </div>

      </div>

      <div id="Right_side_bar" class="col-md-3">

      </br>
        <div><span class="right_side_logo"> Today <hr></span>
          <div class="calendar"></div>
        </div>
        <br>

        <div><span class="right_side_logo"> Uploads </span> <hr></div>
        <div id="get_uploads">

      </div>

      </div>

    </div>

    </div>

    <div>

    <form action="" id="form_send_message">
    <textarea id="text_area" placeholder="Type Something Here"></textarea><img src="../img/send.png" alt="Send Image" id="send_button"/>
    <button id="btn_Send"></button>
  </form>

  </div>

</div>

       <?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "engagehub";
        $connection_String = mysqli_connect($host,$user,$pass,$database);

        if(!empty($_POST["senders_message"])){

            $messageSender = $_COOKIE["user_first_name"];
            $newmessage = mysqli_real_escape_string($connection_String, $_POST["senders_message"]);

            $my_query = "INSERT INTO public_messages ( Sender, Message ) VALUES ('$messageSender','$newmessage')";

            if($run = mysqli_query($connection_String,$my_query)){
              echo "<embed loop='false' src='sound.wav' autoplay='true' hidden='true'/>";
            }
          }
        ?>


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
    $update_profile_query = "UPDATE users_table SET Profile_Picture = '$myfiles' WHERE user_fname ='$selected_username' AND user_lname = '$users_last_name'";
    $execute_update_profile_query = mysqli_query($connection_String,$update_profile_query);
  }


  if(isset($_POST['upload_file']))
    {
      $file = $_FILES['file']['name'];
      $file_loc = $_FILES['file']['tmp_name'];
      $file_size = $_FILES['file']['size'];
      $file_type = $_FILES['file']['type'];
      $folder="uploads/";

        // new file size in KB
       $new_size = $file_size/1024;
       // new file size in KB

       // make file name in lower case
       $new_file_name = strtolower($file);
       // make file name in lower case

       $final_file=str_replace(' ','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file))
       {
        $insert_query = "INSERT INTO `tbl_general_uploads` (`id`, `file`, `size`, `type`) VALUES (NULL, '$final_file', '$new_size', '$file_type')";
        $execute_insert_query = mysqli_query($connection_String,$insert_query);
      }
    }
  ?>

    <script type="text/javascript">

    $(document).ready(function(){
    $("#my_profile_picture").load("Get_Profile_Picture.php");

    $(".calendar").yacal({
      tpl: {
        weekday: '<strong class="wday wd#weekday#">#weekdayName#<\/strong>'
      } });

    $(" #my_profile_picture").click(function(){
    $('#file').trigger("click");
    });

    $("#file").change(function(){
      $("#submit_file").trigger("click");
    });

    $("#submit_file").click(function(){
        $(this).submit();
    });

    $(" #btn_upload").click(function(){
    $('#my_upload_file').trigger("click");
    });

    $("#my_upload_file").change(function(){
    $("#upload_file").trigger("click");
    });

    $("#upload_file").click(function(){
        $(this).submit();
        scrolling;
    });

    $("#upload_file").submit(function(){
      $("#get_uploads").load("uploaded.php");
    });


    $("#send_button").click(function(){
    $("#btn_Send").trigger("click");
    });

    $("#btn_Send").click(function(){
      var message = $("#text_area").val();
      $.ajax({
        method:"POST",
        url:"",
        data:{senders_message:message},
      });
    });

    setInterval(function(){
     $("#get_uploads").load("uploaded.php");
   },500);

   function get_messages(){
     var old_scroll_height = $("#get_chat_logs").attr("scrollHeight") - 20;
     $.ajax({
        url: "chat.php",
        cache: false,
        success: function(html){
            $("#get_chat_logs").html(html);
            //updateScroll();
        },
    });
   }

   //function updateScroll(){
     /*
    $('#get_chat_logs').stop().animate({
  scrollTop: $('#get_chat_logs')[0].scrollHeight
}, 1000);
*/
//  };


    setInterval(get_messages,2000);
  //  setInterval(updateScroll,1000);


    $("#send_button").hover(function(){
    $(this).attr("src","../img/send2.png");
          }, function() {
    $(this).attr("src","../img/send.png");
      });
    });

    </script>
    <script type="text/javascript">
    function Logout(){
    $.get("../Logout/Logout.php");
  };

   window.setInterval(function() {
      var elem = document.getElementById('get_chat_logs');
      elem.scrollTop = elem.scrollHeight;
    });
    
 </script>

</body>
</html>
