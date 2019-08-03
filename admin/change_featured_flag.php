<?php
      include('session.php');

     $output = 0;



      $featured_flag = mysqli_real_escape_string($db,$_POST["featured_flag"]);
      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);


      $output=0;
      $sql = 'UPDATE tours SET featured = '.$featured_flag.' WHERE tours.tour_id = '.$tour_id.'';
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            echo $error_fetch;
      }else{
            navigate("tours.php");
      }

?>
