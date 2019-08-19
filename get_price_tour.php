<?php
      include('session.php');
      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);
      $adult = mysqli_real_escape_string($db,$_POST["adult"]);
      $child = mysqli_real_escape_string($db,$_POST["child"]);
      $cab = mysqli_real_escape_string($db,$_POST["cab"]);
      $hotel = mysqli_real_escape_string($db,$_POST["hotel"]);

      //calculate price taxi
      $sql_cab = 'SELECT price from tour_cab_price WHERE cab_type = '.$cab.' AND tour_id = '.$tour_id.' ';
      $result_cab=mysqli_query($db,$sql_cab);
      $row_cab= mysqli_fetch_assoc($result_cab);
      $price_cab = $row_cab["price"];

      //calculate price taxi


      //calculate price taxi
      $sql_hot = 'SELECT price from tour_hotel_price WHERE hot_type = '.$hotel.' AND tour_id = '.$tour_id.' ';
      $result_hot=mysqli_query($db,$sql_hot);
      $row_hot= mysqli_fetch_assoc($result_hot);
      $price_hot = $row_hot["price"];
      //calculate price taxi
     

      $output=0;
      $sql = 'SELECT p_'.$adult.' from tour_price WHERE tour_id = '.$tour_id.'';
      $result=mysqli_query($db,$sql);
      $row= mysqli_fetch_assoc($result);
      $output = ($row["p_".$adult] * $adult) + $price_cab + $price_hot;
     
      echo json_encode($output);
?>
