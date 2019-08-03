<?php
      include('session.php');

     $output = 0;

      $amen_name = mysqli_real_escape_string($db,$_POST["amen_name"]);
      $hotel_id = mysqli_real_escape_string($db,$_POST["hotel_id"]);


      $output=0;
      $sql = "INSERT INTO amen_hotel (id,amn_name,hotel_id) VALUES (NULL, '$amen_name','$hotel_id')";
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            $output = $error_fetch;
      }else{
        //$output = 1;
        navigate("hotels.php");
      }
