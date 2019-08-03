<?php
      include('session.php');
      if($_SESSION['auth'] == false){
          navigate("index.php");
     }
     $output = 0;
      $taxi_name = mysqli_real_escape_string($db,$_POST["taxi_name"]);
      $taxi_loc = mysqli_real_escape_string($db,$_POST["taxi_loc"]);
      $taxi_disc = mysqli_real_escape_string($db,$_POST["taxi_disc"]);
      $taxi_price = mysqli_real_escape_string($db,$_POST["taxi_price"]);
      $taxi_number = mysqli_real_escape_string($db,$_POST["taxi_number"]);
      $taxi_type = mysqli_real_escape_string($db,$_POST["taxi_type"]);
      $taxi_star= mysqli_real_escape_string($db,$_POST["taxi_star"]);


      $output=0;
      $sql = "INSERT INTO taxi (taxi_id, taxi_name, taxi_loc, taxi_disc, taxi_price, taxi_number,taxi_type, taxi_stars) VALUES
      (NULL, '$taxi_name','$taxi_loc','$taxi_disc', '$taxi_price', '$taxi_number','$taxi_type', '$taxi_star')";
      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        if($error_fetch=="Duplicate entry \'".$taxi_name."\' for key \'taxi_name\'"){
            $output = 0;
        }else {
          $output = $error_fetch;
        }
      }else{
        $output = 1;
    }
echo json_encode($output);
