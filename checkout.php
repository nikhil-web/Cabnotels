<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
}


if (isset($_GET['coupon'])) {
  // code...
  $coupon_flag = 1;
  $coupon = mysqli_real_escape_string($db,$_GET['coupon']);
  echo $coupon;
            $sql = 'SELECT * FROM coupons WHERE coupons.coup = "'.$coupon.'" ';
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row= mysqli_fetch_assoc($result);
                $coup_valid = true;
                echo "valid coupon";
                $coupon_type = $row["discount_type"];
                $coupon_ammount = $row["rupee"];
            }else {
               $coup_valid = false;
               echo "invalid coupon";
            }



}else {
    $coupon_flag = 0;
    $coupon = "";
}




?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cabnotels || Checkout</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>



<div class="container">

  <?php
            $sum = 0;
            $sql = 'SELECT item_price FROM cart WHERE status = 0 and user_id = '.$_SESSION["user_id"].'';
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row= mysqli_fetch_assoc($result)) {
              $sum = (int)$sum  + (int)$row["item_price"];
            }}

            if ($coupon_flag == 1 && $coup_valid == true) {
              echo "coupon applid<br>";

              if ($coupon_type == 1) {
                // code...
                  $total = (int)$sum - (int)$coupon_ammount;
              }elseif ($coupon_type == 2) {
                // code...
                $total =  (int)$sum - ((int)$coupon_ammount / 100) * (int)$sum ;

              }



            }else {
              echo "no Coupon applied<br>";
              $total = (int)$sum;
            }

            echo "Total = ".$total;
?>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">item id</th>
      <th scope="col">item price</th>
    </tr>
  </thead>
  <tbody>
    <?php
              $sql = 'SELECT *  FROM cart WHERE status = 0 and user_id = '.$_SESSION["user_id"].'';
              $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row= mysqli_fetch_assoc($result)) {
                echo '

                <tr>
                  <th scope="row">#</th>
                  <td>'.$row["item_id"].'</td>
                  <td>'.$row["item_price"].'</td>
                </tr>
                ';
              }
            }
            ?>
  </tbody>




</table>
</div>

<button class="btn btn-primary" type="button" name="button">
<a href="checkout_items.php?id=<?php echo $_SESSION["user_id"]; ?>">Checkout</a>
</button>


</body>
</html>
