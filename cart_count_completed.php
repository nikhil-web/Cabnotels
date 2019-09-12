<?php
include('session.php');
$output = "";
  $sql = 'SELECT * FROM cart WHERE status = 1 AND user_id = '.$_SESSION["user_id"].' ';
  $result = mysqli_query($db, $sql);
  $output = mysqli_num_rows($result);
  echo json_encode($output);
  mysqli_close($db);
 ?>
