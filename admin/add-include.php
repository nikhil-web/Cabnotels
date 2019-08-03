<?php
      include('session.php');

      $output = 0;

      $timeline_heading = mysqli_real_escape_string($db,$_POST["includes"]);
      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);

      $output=0;
      $sql = "INSERT INTO included (id,name,tour_id) VALUES (NULL, '$timeline_heading','$tour_id')";
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            $output = $error_fetch;
      }else{
        navigate("tours.php");
      }
?>
