<?php
      include('session.php');

      $p_one = mysqli_real_escape_string($db,$_POST["p_one"]);

      $p_two = mysqli_real_escape_string($db,$_POST["p_two"]);

      $p_three = mysqli_real_escape_string($db,$_POST["p_three"]);

      $p_four = mysqli_real_escape_string($db,$_POST["p_four"]);

      $p_five = mysqli_real_escape_string($db,$_POST["p_five"]);

      $p_six = mysqli_real_escape_string($db,$_POST["p_six"]);

      $p_seven = mysqli_real_escape_string($db,$_POST["p_seven"]);

      $p_eight = mysqli_real_escape_string($db,$_POST["p_eight"]);


      $hotel_id = mysqli_real_escape_string($db,$_POST["hotel_id"]);

      $output=0;
      $sql = "INSERT INTO hotel_price (id,p_1,p_2,p_3,p_4,p_5,p_6,p_7,p_8,hotel_id) VALUES (NULL, '$p_one', '$p_two', '$p_three', '$p_four', '$p_five', '$p_six', '$p_seven', '$p_eight', '$hotel_id')";
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            echo $error_fetch;
      }else{
        navigate("hotels.php");
      }

?>
