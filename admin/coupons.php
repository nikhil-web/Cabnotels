<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cabnotels || Frontpage</title>
    <link rel="stylesheet" href="css/sb-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>



<div class="container">
  <h1>Coupon Generator</h1>
  <p>Update the Coupons.</p>
  <hr>

    <form action="add_coupons.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Coupon Name</label>
          <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="Coupon Name">
        </div>

        <div class="form-group col-md-4">
          <label for="inputPassword4">Coupon Type</label>
          <select id="inputState" id="coupon_type" name="coupon_type" class="form-control">
            <option value = "1">Cash</option>
            <option value = "2">Percent</option>
        </select>
        </div>

        <div class="form-group col-md-4">
          <label for="">Ammount(In % or In Cash)</label>
          <input type="text" class="form-control" id="coupon_ammount" name="coupon_ammount" placeholder="Coupon Name">

        </div>

      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-info">Reset</button>

    </form>
  <hr>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Coupon Name</th>
      <th scope="col">Coupon Type</th>
      <th scope="col">Coupon Ammount</th>
      <th scope="col">Tools</th>
    </tr>
  </thead>
  <tbody>
    <?php
              $sql = 'SELECT *  FROM coupons ';
              $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row= mysqli_fetch_assoc($result)) {
                echo '

                <tr>
                  <th scope="row">#</th>
                  <td>'.$row["coup"].'</td>
                  <td>'.$row["discount_type"].'</td>
                  <td>'.$row["rupee"].'</td>
                  <td><button class="btn btn-danger" ><a class="text-decoration-none text-white" href="delete-coupon.php?id='.$row["id"].'">DELETE</a></button> <td>
                </tr>
                ';
              }
            }
            ?>
  </tbody>
</table>
</div>




</body>
</html>
