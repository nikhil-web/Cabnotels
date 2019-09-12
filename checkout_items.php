<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
}


if (isset($_GET['id'])) {
  // code...

  $id = mysqli_real_escape_string($db,$_GET['id']);

            $sql = "UPDATE cart SET status = 1 WHERE user_id = '$id' and cart.status = 0";
            $result = mysqli_query($db, $sql);

            if ($result) {
              echo "Sucessfully Checkout";
            }else {
              echo "err";

            }



}else {
  echo "err";
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
<button class="btn btn-primary" type="button" name="button">
<a href="user.php?query=orders">Checkout</a>
</button>


</body>
</html>
