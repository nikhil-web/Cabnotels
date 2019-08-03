<?php
  include('session.php');
      $id = mysqli_real_escape_string($db,$_GET["id_image"]);
      $sql = 'DELETE FROM hotel_images WHERE id = '.$id.' ';
      $result=mysqli_query($db,$sql);
      if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
         echo $error_fetch;
      }else{
        navigate("hotels.php");
    }

