<?php
      include('session.php');

      $output = 0;

      $p_num = mysqli_real_escape_string($db,$_POST["p_num"]);
      $hotel_id = mysqli_real_escape_string($db,$_POST["hotel_id"]);

      $output=0;
      $sql = 'SELECT '.$p_num.' from hotel_price WHERE hotel_id = '.$hotel_id.'';
      $result=mysqli_query($db,$sql);
      $row= mysqli_fetch_assoc($result);
      $output = $row[$p_num];

      echo json_encode($output);
?>
