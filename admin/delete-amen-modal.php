<?php
  include('session.php');
  if($_SESSION['auth'] == false){
      navigate("index.php");
    }
      $id = mysqli_real_escape_string($db,$_POST["id"]);
      $output=0;
      $sql = "DELETE FROM amen_hotel WHERE amen_hotel.id = $id";
      $result=mysqli_query($db,$sql);
      if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
          $output = $error_fetch;
      }else{
        $output = 1;
    }
echo json_encode($output);
