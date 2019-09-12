<?php
include ('session.php');
$login_flag = 0;
if ($_SESSION['auth'] == false)
{
    $login_flag = 0;
    //header("location:login.php");
}
else
{
    $login_flag = 1;
}



$taxi_pickup_date = mysqli_real_escape_string($db,$_GET["taxi_pickup_date"]);
$pickup_time_send = mysqli_real_escape_string($db,$_GET["pickup_time_send"]);
$pickup_location = mysqli_real_escape_string($db,$_GET["pickup_location"]);
$taxi_price_single = mysqli_real_escape_string($db,$_GET["taxi_price_single"]);
$taxi_id = mysqli_real_escape_string($db,$_GET["taxi_id"]);
$taxi_dur = mysqli_real_escape_string($db,$_GET["taxi_dur"]);


//query for hotel
$sql = "SELECT * FROM taxi WHERE taxi_id = '$taxi_id'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
}

?>
<html lang="en">
<head>
    <title>Cabnotels | Search </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#ffdd00">
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
    <meta name="theme-color" content="#ffdd00">

    <!-- css files -->
    <link rel="stylesheet" href="css/search_bootstrap_cus.css">
    <link rel="stylesheet" href="css/search.css"> <!-- custom css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--css files -->

    <!--Script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Script-->

        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">


<style media="screen">
ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #ffdd00;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}

</style>

</head>

<body style="background-color:#f2f2f2;">

  <?php include 'includes/navbar.php'; ?>

  <div class="container checkout" style="min-height: 100vh;">
    <div class="row p-3">

      <?php if ($login_flag ==0): ?>
        <div class="col-lg-8 py-4">
          <div class="accordion" id="accordionExample">
            <div class="card" style="margin: 0 0px 10px 0;background-color: #fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);">
            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#">
              <p class="mb-0">
                1. Login Or Signup
              </p>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div id="card_body" class="card-body">

              <form id="status_check_form">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" id="email_status" name="email" class="form-control" placeholder="name@example.com" required autofocus="autofocus" autocomplete="email">
                  <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

              <div id="status" class="alert alert-primary" style="display:none;" role="alert">
                Status
              </div>

              <hr>

              <form id="login_form" method="post" style="display:none;">
                <label for="inputEmail4"> <p class="text-white small m-0">Email</p> </label>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                    <input type="email" id="email_login" name="email" class="form-control" placeholder="name@example.com" required autofocus="autofocus" autocomplete="email">

                </div>
                <label for="inputEmail4"> <p class="text-white small m-0">Password</p> </label>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                    <input type="password" id="passkey" name="passkey" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                </div>

                <div class="form-group">
                  <button type="submit" name="button" class="btn btn-primary">Continue</button>
                </div>
              </form>

              <form id="register_form" style="display:none;">

                <label for="inputEmail4"> <p class="text-white small m-0">Name</p> </label>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                        <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName">
                        <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName">
                    </div>
                    <label for="inputEmail4"> <p class="text-white small m-0">Email</p> </label>
                 <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                    <input type="email" id="email_register" name="email" class="form-control" placeholder="name@example.com" required autofocus="autofocus" autocomplete="email">
                </div>

                <label for="inputEmail4"> <p class="text-white small m-0">Password</p> </label>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                    <input type="password" id="passkey" name="passkey" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                </div>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                    <input type="password" id="passkey_repeat" name="passkey_repeat" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                </div>
                <label for=""> <p class="text-white small m-0">Phonenumber</p> </label>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                    <input type="number" name="phonenumber" id="phonenumber" class="form-control" placeholder="Phonenumber" required="required" autofocus="autofocus">
                </div>
                <div class="form-group">
                  <button type="submit" name="button" class="btn btn-primary">Continue</button>
                </div>
              </form>
          </div>
          </div>
        </div>
        </div>

        </div>
      <?php endif; ?>
      <?php if ($login_flag == 1): ?>

        <div class="col-lg-8 py-4">

          <div class="card" style="margin: 0 0px 10px 0;background-color: #fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);">
          <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
            <p class="mb-0">
              2. Checkout
            </p>
        </div>
          <div id="card_body" class="card-body">

            <?php echo '

            <h5 class="card-title"><i class="fas fa-hotel"></i> Hotel Booking</h5>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Item</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Details</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row" class="border-0">
                      <div class="py-2">
                        <div class="my-3 d-inline-block align-middle">
                          <span class="font-italic d-block">
                            <h5>'.$row["taxi_name"].'</h5>

                          </span>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>'.$taxi_price_single.' ₹ / Km</strong></td>
                    <td class="border-0 align-middle">
                        <p><strong>Pickup Date: </strong> '.$taxi_pickup_date.' <strong></p>
                        <p>Pickup Time: </strong> '.$pickup_time_send.' </p>
                        <p><strong>Pickup Location :  </strong> '.$pickup_location.'</p>
                        <p><strong>Booking Duration :  </strong> '.$taxi_dur.' hours</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <a href="#" class="btn btn-rounded btn-primary">Pay/Checkout</a>
        </div>
      </div>
      ';?>
        </div>
      <?php endif; ?>


  <div class="col-lg-4 py-4">
      <div class="card" style="margin: 0 0px 10px 0;background-color: #fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);">
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#">
          <p class="mb-0">
            Checkout in 3 Steps
          </p>
      </div>
      <div id="card_body" class="card-body">
        <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="pills-contact-tab">

            <ul class="timeline">
              <li>
                <h5>Login / Register<!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                <p class="text-small">Login or Register for us to serve you better</p>
              </li>
            </ul>
            <ul class="timeline">
              <li>
                <h5>Confirm order  Details<!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                <p class="text-small">Confirm Your Order</p>

              </li>
            </ul>
            <ul class="timeline">
              <li>
                <h5>Pay And Checkout<!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                <p class="text-small">Pay and Checkout</p>

              </li>
            </ul>
    </div>

      </div>

    </div>
    </div>
  </div>


</div>
  </div>


<!-- Modal -->
<div class="modal fade" id="modelformessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 id="status_message"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 <?php include 'includes/footer.php' ?>


 <script type="text/javascript">


 $(function() {
     $('#status_check_form').on('submit', function(e) {
         e.preventDefault();
         $.ajax({
              type: 'post',
              url: 'check_user_exists.php',
              data: $('#status_check_form').serialize(),
              success: function(response) {
                  if (response == 0) {
                    console.log("no");
                    document.getElementById("login_form").style.display = "none";
                    document.getElementById("status").style.display = "block";
                    document.getElementById("status").innerHTML = "Please Enter The Details";
                    document.getElementById("register_form").style.display = "block";
                    var y = document.getElementById("email_status").value;
                    document.getElementById("email_register").value = y;
                } else if (response == 1) {
                    console.log("Yes");
                    document.getElementById("register_form").style.display = "none";
                    document.getElementById("status").style.display = "block";
                    document.getElementById("status").innerHTML = "Seems Like you have a Cabnotels Account please enter the password";
                    document.getElementById("login_form").style.display = "block";
                    var x = document.getElementById("email_status").value;
                    document.getElementById("email_login").value = x;
                  }
              }
          });

         console.log("here is the form");

     });
 });



 $(function() {
     $('#register_form').on('submit', function(e) {
         e.preventDefault();
         $('#modelformessage').modal({
             keyboard: true
         });

         console.log("here is the form");
         $.ajax({
             type: 'post',
             url: 'register_handle.php',
             data: $('#register_form').serialize(),
             success: function(response) {
                 if (response == 0) {
                     update_staus_error("Error, Email Or Password Mismatch");
                 } else if (response == 1) {
                     update_staus_success("Registration Sucessfull");
                     var query = "book_now_taxi.php?taxi_id=<?php echo $taxi_id; ?>&taxi_pickup_date=<?php echo $taxi_pickup_date; ?>&pickup_time_send=<?php echo $pickup_time_send; ?>&pickup_location=<?php echo $pickup_location; ?>&taxi_price_single=<?php echo $taxi_price_single; ?>&taxi_dur=<?php echo $taxi_dur;?>";
                     window.location.href = query;
                 }
             }
         });
     });
 });


 $(function() {
     $('#login_form').on('submit', function(e) {
         e.preventDefault();
         $('#modelformessage').modal({
             keyboard: true
         });

         console.log("here is the form");
         $.ajax({
             type: 'post',
             url: 'login-user.php',
             data: $('#login_form').serialize(),
             success: function(response) {
                 if (response == 0) {
                     update_staus_error("Error, Email Or Password Mismatch");
                 } else if (response == 1) {
                   update_staus_success("Login Sucessfull");
                   var query = "book_now_taxi.php?taxi_id=<?php echo $taxi_id; ?>&taxi_pickup_date=<?php echo $taxi_pickup_date; ?>&pickup_time_send=<?php echo $pickup_time_send; ?>&pickup_location=<?php echo $pickup_location; ?>&taxi_price_single=<?php echo $taxi_price_single; ?>&taxi_dur=<?php echo $taxi_dur;?>";
                   window.location.href = query;

                 }
             }
         });
     });
 });

 //utility functions
 function update_staus_error(message) {
     document.getElementById('status_message').innerHTML = message;
     $("#status_message").addClass("dangerclass");

 }

 function update_staus_success(message) {
     document.getElementById('status_message').innerHTML = message;
     $("#status_message").removeClass("dangerclass")
 }
 </script>

</body>

</html>
