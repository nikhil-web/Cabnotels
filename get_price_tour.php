<?php
      include('session.php');

      $output = 0;

      $p_num = mysqli_real_escape_string($db,$_POST["p_num"]);
      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);

      $output=0;
      $sql = 'SELECT '.$p_num.' from tour_price WHERE tour_id = '.$tour_id.'';
      $result=mysqli_query($db,$sql);
      $row= mysqli_fetch_assoc($result);
      $output = $row[$p_num];

      echo json_encode($output);
?>
