<?php
      include('session.php');
      if($_SESSION['auth'] == false){
          navigate("index.php");
     }
     $output = 0;
      $location_name = mysqli_real_escape_string($db,$_POST["location_name"]);

      $output=0;
      $sql = "INSERT INTO locations (loc_id, loc_name) VALUES (NULL, '$location_name')";
      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        if($error_fetch=="Duplicate entry \'".$location_name."\' for key \'res_name\'"){
            $output = 0;
        }else {
          $output = $error_fetch;
        }
      }else{
        $output = 1;
    }
echo json_encode($output);
