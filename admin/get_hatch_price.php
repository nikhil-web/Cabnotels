<?php
      /*This gives price for all */
      include('session.php');

     $output = 0;

      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);
      $types = mysqli_real_escape_string($db,$_POST["type"]);

      $output = $tour_id.$types;

      $sql  = "SELECT * FROM tour_cab_price WHERE tour_id = $tour_id and cab_type = $types";

      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        $output .= $error_fetch;
      }else{
        $row= mysqli_fetch_assoc($result);
        $output =  $row["price"];
      }
      echo json_encode($output);
