<?php
      include('session.php');

     $output = 0;


      $featured_flag = mysqli_real_escape_string($db,$_POST["featured_flag"]);
      $taxi_id = mysqli_real_escape_string($db,$_POST["taxi_id"]);


      $output=0;
      $sql = 'UPDATE taxi SET featured = '.$featured_flag.' WHERE taxi.taxi_id = '.$taxi_id.'';
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            echo $error_fetch;
      }else{
            navigate("taxi.php");
      }

?>
