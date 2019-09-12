<?php
include "session.php";
$email = mysqli_real_escape_string($db,$_POST['email']);
$user_Cheker = "SELECT * FROM users WHERE user_email='$email'";
$result_login = mysqli_query($db,$user_Cheker);
   if (mysqli_num_rows($result_login) > 0) {
    $row = mysqli_fetch_array($result_login,MYSQLI_ASSOC);
    $output = 1;
    echo json_encode($output);
    }else {
      $output = 0;
      echo json_encode($output);
    }
?>
