<?php
      include('session.php');
      if($_SESSION['auth'] == false){
          navigate("index.php");
    }
     $output = 0;
      $tour_name = mysqli_real_escape_string($db,$_POST["tour_name"]);
      $tour_loc = mysqli_real_escape_string($db,$_POST["tour_loc"]);
      $tour_about = mysqli_real_escape_string($db,$_POST["tour_about"]);
      $tour_days = mysqli_real_escape_string($db,$_POST["days"]);
      $tour_night = mysqli_real_escape_string($db,$_POST["night"]);
      $num_days = mysqli_real_escape_string($db,$_POST["num_days"]);
      $tour_price = mysqli_real_escape_string($db,$_POST["tour_price"]);


      $output=0;
      $sql = "INSERT INTO tours (tour_id, tour_name, tour_loc, tour_about, tour_days, tour_nights,num_days,tour_price) VALUES (NULL, '$tour_name','$tour_loc','$tour_about','$tour_days', '$tour_night','$num_days','$tour_price')";
      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        if($error_fetch=="Duplicate entry \'".$tour_name."\' for key \'tour_name\'"){
            $output = 0;
        }else {
          $output = $error_fetch;
        }
      }else{
        $output = 1;
    }
echo json_encode($output);
