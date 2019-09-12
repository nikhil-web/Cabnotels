<?php
      include('session.php');

     $output = 0;


      $coupon_name = mysqli_real_escape_string($db,$_POST["coupon_name"]);
      $coupon_type = mysqli_real_escape_string($db,$_POST["coupon_type"]);
      $coupon_ammount = mysqli_real_escape_string($db,$_POST["coupon_ammount"]);


      $sql = "INSERT INTO coupons (id, coup, discount_type, rupee) VALUES (NULL, '$coupon_name', '$coupon_type', '$coupon_ammount')";

      $result=mysqli_query($db,$sql);
      if(!$result){
          echo $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));

      }else{
           navigate("coupons.php");
      }
  ?>
