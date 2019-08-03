<?php
      include('session.php');

      $output = 0;

      $amen_name = mysqli_real_escape_string($db,$_POST["amen_name"]);
      $taxi_id = mysqli_real_escape_string($db,$_POST["taxi_id"]);


      $output=0;
      $sql = "INSERT INTO amen_taxi (id,amen_name,taxi_id) VALUES (NULL, '$amen_name','$taxi_id')";
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            $output = $error_fetch;
      }else{
        //$output = 1;
        navigate("taxi.php");
      }
