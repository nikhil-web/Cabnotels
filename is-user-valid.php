<?php
include "session.php";

$email = mysqli_real_escape_string($db,$_POST['email']);
$phonenumber = mysqli_real_escape_string($db,$_POST['phonenumbers']);

$login_Cheker = "SELECT * FROM users WHERE user_email='$email' and user_phone = '$password' ";
$result_login = mysqli_query($db,$login_Cheker);
   if (mysqli_num_rows($result_login) > 0) {
    $row = mysqli_fetch_array($result_login,MYSQLI_ASSOC);
    $_SESSION['user_id'] = $row["user_id"];
    $output = 1;
    echo json_encode($output);
    }else {
      $output = 0;
      echo json_encode($output);
    }
?>
