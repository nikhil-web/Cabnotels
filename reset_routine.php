<?php
include "session.php";

  $email =  mysqli_real_escape_string($db,$_POST["email"]);
  $phone = mysqli_real_escape_string($db,$_POST["phonenumber"]);
  $unique_code = mysqli_real_escape_string($db,$_POST["unique_code"]);

  $output=0;
  $sql = "SELECT user_id FROM users WHERE user_email = '$email' AND user_phone = '$phone'";
  $result = mysqli_query($db,$sql);
  if (mysqli_num_rows($result) > 0) {
      $row= mysqli_fetch_assoc($result);
      $user_id = $row["user_id"];

      $sql_reset = "INSERT INTO reset (id,token,user_id) VALUES (NULL,'$unique_code', '$user_id')";
      $result_insert_reset = mysqli_query($db,$sql_reset);
      if(!$result_insert_reset){
          $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
          $output = -1;
      }else{
        $output = 1;
      }
  }else {
    $output=0;
  }
  echo json_encode($output);
?>
