<?php
include "session.php";
if (isset($_GET["key"]) && isset($_GET["email"])) {
  // code...
  $key =  mysqli_real_escape_string($db,$_GET["key"]);
  $email =  mysqli_real_escape_string($db,$_GET["email"]);

  $sql = "SELECT unique_token FROM users WHERE users.user_email = '$email'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $key_db = $row["unique_token"];


  $flag = strcmp($key,$key_db);

  if ($flag == 0) {
    $sql = "UPDATE users SET status = 1 WHERE users.user_email = '$email'";
    $result=mysqli_query($db,$sql);
    echo "Verification Sucessfull";
  }else {
     header("location:index.php");
  }
}else {
     header("location:index.php");
}




?>
