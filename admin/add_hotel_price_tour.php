<?php
      include('session.php');

     $output = 0;

      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);
      $price = mysqli_real_escape_string($db,$_POST["price"]);
      $types = mysqli_real_escape_string($db,$_POST["type"]);

      $output = $tour_id.$price.$types;

      $sql  = "INSERT INTO tour_hotel_price (id, tour_id, hot_type, price) VALUES (NULL, $tour_id, $types, $price )";

      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        $output = 0;
      }else{
        $output = 1;
      }
      echo json_encode($output);
