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


      $tour_id = mysqli_real_escape_string($db,$_POST["tour_id"]);

      $output=0;
      $sql = "UPDATE tour_price SET p_1 = '$p_one' ,p_2='$p_two' ,p_3='$p_three', p_4='$p_four',p_5='$p_five' ,p_6='$p_six' ,p_7='$p_seven' ,p_8='$p_eight' WHERE tour_id = '$tour_id'";
      $result=mysqli_query($db,$sql);
      if(!$result){
            $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
            echo $error_fetch;
      }else{
        navigate("tours.php");
      }

?>
