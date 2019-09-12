<?php
      include('session.php');
      if($_SESSION['auth'] == false){
          navigate("index.php");
     }
     $output = 0;
      $hotel_name = mysqli_real_escape_string($db,$_POST["hotel_name"]);
      $hotel_loc = mysqli_real_escape_string($db,$_POST["hotel_loc"]);
      $hotel_add = mysqli_real_escape_string($db,$_POST["hotel_add"]);
      $hotel_email = mysqli_real_escape_string($db,$_POST["hotel_email"]);
      $hotel_number = mysqli_real_escape_string($db,$_POST["hotel_number"]);
      $hotel_star= mysqli_real_escape_string($db,$_POST["hotel_star"]);
      $hotel_about = mysqli_real_escape_string($db,$_POST["hotel_about"]);
      $hotel_price = mysqli_real_escape_string($db,$_POST["price"]);





      $output=0;
      $sql = "INSERT INTO hotels (hotel_id, hotel_name, hotel_loc, hotel_add, hotel_email,hotel_number,hotel_stars,price,hotel_about) VALUES (NULL, '$hotel_name','$hotel_loc','$hotel_add', '$hotel_email', '$hotel_number', '$hotel_star','$hotel_price','$hotel_about')";
      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        if($error_fetch=="Duplicate entry \'".$hotel_name."\' for key \'res_name\'"){
            $output = 0;
        }else {
          $output = $error_fetch;
        }
      }else{
        $output = 1;
    }
echo json_encode($output);
