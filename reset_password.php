<?php
include 'config.php';

$output = 0;

$key =  mysqli_real_escape_string($db,$_POST["password"]);
$email =  mysqli_real_escape_string($db,$_POST["email"]);

$sql_user_id = "SELECT user_id FROM users WHERE users.user_email = '$email'";
$result_user_id = mysqli_query($db,$sql_user_id);
$row_id = mysqli_fetch_array($result_user_id,MYSQLI_ASSOC);
$user_id_db = $row_id["user_id"];
//echo $user_id_db;

$sql_update = "UPDATE users SET user_pass = '$key' WHERE users.user_id = '$user_id_db'";
$result_update= mysqli_query($db,$sql_update);
if(!$result_update){
  $output = 0;
}else {
  $sql_delete = "DELETE FROM reset WHERE user_id = '$user_id_db'";
  mysqli_query($db,$sql_delete);
  $output = 1;
}

echo json_encode($output);
 ?>
