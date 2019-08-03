<?php
      include('session.php');

     $output = 0;

      $timeline_heading = mysqli_real_escape_string($db,$_POST["timeline_heading"]);
      $timeline_content = mysqli_real_escape_string($db,$_POST["timeline_content"]);
      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);
      $timeline_day = mysqli_real_escape_string($db,$_POST["timeline_day"]);

      $output=0;
      $sql = "INSERT INTO timeline (id, point_heading, point_content, tour_id, day) VALUES (NULL, '$timeline_heading','$timeline_content','$tour_id','$timeline_day')";
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            $output = $error_fetch;
      }else{
        $output = 1;
      }

echo json_encode($output);
