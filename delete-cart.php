<?php
  include 'session.php';
  $cart_id = $_POST["parameter"];
  $sql = ' DELETE FROM cart WHERE id='.$cart_id.' AND status = 0';
  $result=mysqli_query($db,$sql);
  if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        $output = $error_fetch;
      }else {
  $output = 1;
      }
  echo json_encode($output);
