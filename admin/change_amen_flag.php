<?php
      include('session.php');

     $output = 0;


      $featured_flag = mysqli_real_escape_string($db,$_POST["amen_flag"]);
      $amen_id = mysqli_real_escape_string($db,$_POST["amen_id"]);


      $output=0;
      $sql = "UPDATE amen_hotel SET status = '$featured_flag' WHERE id = '$amen_id'";
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            echo $error_fetch;
      }else{
            navigate("hotels.php");
      }

?>
