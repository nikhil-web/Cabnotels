<?php
      include('session.php');

     $output = 0;

      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);
      $price = mysqli_real_escape_string($db,$_POST["price"]);
      $types = mysqli_real_escape_string($db,$_POST["type"]);

      $output = $tour_id.$price.$types;
      $sql = "UPDATE tour_cab_price SET price = $price WHERE tour_cab_price.tour_id = $tour_id AND tour_cab_price.cab_type = $types";

      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        $output = 0;
      }else{
        $output = 1;
      }
      echo json_encode($output);
