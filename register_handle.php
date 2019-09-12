<?php
include "session.php";

$firstName = mysqli_real_escape_string($db,$_POST['firstName']);
$lastName = mysqli_real_escape_string($db,$_POST['lastName']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$passkey = mysqli_real_escape_string($db,$_POST['passkey']);
$passkey_repeat = mysqli_real_escape_string($db,$_POST['passkey_repeat']);
$phonenumber = mysqli_real_escape_string($db,$_POST['phonenumber']);


$sql_regis = "INSERT INTO users (user_id,first_name,last_name, user_email, user_pass,user_phone) VALUES (NULL, '$firstName', '$lastName', '$email', '$passkey', '$phonenumber')";
$result_regis = mysqli_query($db,$sql_regis);

if ($result_regis) {
  $login_Cheker = "SELECT * FROM users WHERE user_email='$email' and user_pass='$passkey' ";
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
}else {
  $output = 0;
  echo json_encode($output);
}


?>
