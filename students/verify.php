<?php

session_start();

$_SESSION["err"] = "";
if (isset($_POST["submit"])) {

    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "engagehub";

    $connection_String = mysqli_connect($host, $user, $pass, $database);

    $username = mysqli_real_escape_string($connection_String, $username);
    $password = mysqli_real_escape_string($connection_String, $password);


    $get_current_user_details = "SELECT * FROM users_table WHERE user_fname = '$username' AND Password = '$password' LIMIT 1";
    $execute_user_details_command = mysqli_query($connection_String, $get_current_user_details);
    $get_additional_info = mysqli_fetch_assoc($execute_user_details_command);

    $users_last_name = $get_additional_info["user_lname"];


    $command_query = "SELECT * FROM users_table WHERE user_fname = '$username' AND Password = '$password' AND user_lname = '$users_last_name'";

    $execute_command_query = mysqli_query($connection_String, $command_query);

    $user_validity = mysqli_num_rows($execute_command_query);

    if ($user_validity > 0) {

        $checking_online_status = "SELECT * FROM users_online WHERE first_name='$username' AND last_name = '$users_last_name'";

        $execute_checking_online_status = mysqli_query($connection_String, $checking_online_status);

        $online_status_validity = mysqli_num_rows($execute_checking_online_status);

        if ($online_status_validity > 0) {

            setcookie("user_first_name", $username, time() + (86400 * 30));
            setcookie("users_last_name", $users_last_name, time() + (86400 * 30));
          
            setcookie("default_clicked_on_username", "Welcome", time() + (86400 * 30));

            setcookie("clicked_on_user_last_name", $users_last_name, time() + (86400 * 30));

            setcookie("Selected_Username_Table", "dummy_text", time() + (86400 * 30));
            setcookie("Reversed_selected_Username_Table", "dummy_text", time() + (86400 * 30));

            setcookie("selected_Username_Table_uploads", "dummy_text", time() + (86400 * 30));
            setcookie("reversed_selected_Username_Table_uploads", "dummy_text", time() + (86400 *
                30));

            $update_status_command =
                "UPDATE `users_online` SET status = 'online' WHERE first_name ='$username' AND last_name = '$users_last_name'";
            $execute_status_command = mysqli_query($connection_String, $update_status_command);


            header("Location:./Dashboard/Main_Dashboard.php");

        } else {

            $insert_command = "INSERT INTO users_online (`ID`, `first_name`,`last_name`, `Time`,`status`) VALUES (NULL, '$username','$users_last_name', CURRENT_TIMESTAMP,'online')";

            $execute_insert_command = mysqli_query($connection_String, $insert_command);

            $UserID = mysqli_insert_id($connection_String);

            mysqli_close($connection_String);

            setcookie("user_first_name", $username, time() + (86400 * 30));
            setcookie("users_last_name", $users_last_name, time() + (86400 * 30));
            setcookie("user_department", $users_department, time() + (86400 * 30));
            setcookie("user_position", $users_position, time() + (86400 * 30));

            setcookie("default_clicked_on_username", "Welcome", time() + (86400 * 30));

            setcookie("clicked_on_user_last_name", $users_last_name, time() + (86400 * 30));

            setcookie("Selected_Username_Table", "dummy_text", time() + (86400 * 30));
            setcookie("Reversed_selected_Username_Table", "dummy_text", time() + (86400 * 30));

            setcookie("selected_Username_Table_uploads", "dummy_text", time() + (86400 * 30));
            setcookie("reversed_selected_Username_Table_uploads", "dummy_text", time() + (86400 *
                30));

            header("Location:./Dashboard/Main_Dashboard.php");
        }

    } else {
        $_SESSION["err"] = "Wrong Username or Password";
    }
    ;
} else {

}
;

?>


<!--<!DOCTYPE html>-->
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="Login_css/style.css">
</head>

<body>
  <form class='login-form' method="post">
  <div class="flex-row">
    <input id="username" class='lf--input' placeholder='Username' type='text' name="txtUsername">
  </div>
  <div class="flex-row">
    <input id="password" class='lf--input' placeholder='Password' type='password' name="txtPassword">
  </div>
  <input class='lf--submit' type='submit' value='Verify' name="submit" id="btnSubmit">


</form>

 <label id="lf--errormsg"><?php echo ($_SESSION["err"]); ?></label>


</body>
</html> 




