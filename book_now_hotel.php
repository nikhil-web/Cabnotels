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


$start_date = mysqli_real_escape_string($db,$_GET["checkin_date"]);
$end_date = mysqli_real_escape_string($db,$_GET["checkout_date"]);
$number_room = mysqli_real_escape_string($db,$_GET["number_room"]);
$adults_num = mysqli_real_escape_string($db,$_GET["number_adult"]);
$child_num = mysqli_real_escape_string($db,$_GET["number_child"]);
$price = mysqli_real_escape_string($db,$_GET["price"]);
$id = mysqli_real_escape_string($db,$_GET["hotel_id"]);

//query for hotel
$sql = "SELECT * FROM hotels WHERE hotel_id = '$id'";
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
/* Add a green text color and a checkmark when the requirements are right */
.valid {
  background-color: #a1f3a1 !important;
  border: 1px solid green !important;
}


/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
      background-color: #ff7272 !important;
      border: 1px solid red;
      color: #fff !important;s
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
                  <input onkeyup="validate_pass()" type="password" id="passkey_regis" name="passkey" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                  <div onclick="show_pass()" class="input-group-prepend" style="cursor: pointer;">
                    <span class="input-group-text" style="background: #ffc312;border-radius: 0 0.25em 0.25em 0;"><i class="fas fa-eye"></i></span>
                  </div>
                </div>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                    <input  onkeyup="repeat_check()"  type="password" id="passkey_repeat" name="passkey_repeat" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                </div>
                <label for=""> <p class="text-white small m-0">Phonenumber</p> </label>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
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
                            <h5>'.$row["hotel_name"].'</h5>
                            <p>'.$row["hotel_add"].'</p>
                          </span>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>'.$price.' ₹</strong></td>
                    <td class="border-0 align-middle">

                        <p><strong>From: </strong> '.$start_date.' <strong></p>
                        <p>To: </strong> '.$end_date.' </p>
                        <p><strong>Adults:</strong> '.$adults_num.'</p>
                        <p><strong>Child:</strong> '.$child_num.'</p>


                    </td>

                  </tr>
                </tbody>
              </table>
            </div>
            <button onclick="checkout()" class="btn btn-rounded btn-primary">Pay/Checkout</button>
            <p>Item will be added to your Express cart so you can checkout anytime</p>
        </div>

      </div>
      ';?>

      <?php

          //  echo 'start_date-->'.$start_date.'end_date-->'.$end_date.'Number_people-->'.$number_room.'$adults_num-->'.$adults_num.'$price-->'.$price;
            ?>


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

         if (validate_pass() == true && repeat_check() == true ) {
         $.ajax({
             type: 'post',
             url: 'register_handle.php',
             data: $('#register_form').serialize(),
             success: function(response) {
                 if (response == 0) {
                     update_staus_error("Error, Email Or Password Mismatch");
                 } else if (response == 1) {
                     update_staus_success("Registration Sucessfull");
                     var query = "book_now_hotel.php?hotel_id=<?php echo $id; ?>&checkin_date=<?php echo $start_date; ?>&checkout_date=<?php echo $end_date; ?>&number_room=<?php echo $number_room; ?>&number_adult=<?php echo $adults_num; ?>&price=<?php echo $price; ?>&number_child=<?php echo $child_num; ?>";
                     window.location.href = query;
                     //hotel_id=61&checkin_date=2019-09-06&checkout_date=2019-09-07&number_room=1&number_adult=1&price=1000
                 }
             }
         });
       }else{
         update_staus_error("Please Enter A Valid Password");
       }
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

                   var query = "book_now_hotel.php?hotel_id=<?php echo $id; ?>&checkin_date=<?php echo $start_date; ?>&checkout_date=<?php echo $end_date; ?>&number_room=<?php echo $number_room; ?>&number_adult=<?php echo $adults_num; ?>&price=<?php echo $price; ?>&number_child=<?php echo $child_num; ?>";
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


 <script>
 // When the user starts to type something inside the password field
 function validate_pass() {
   repeat_check();
   var myInput = document.getElementById("passkey_regis");
   var flag_one = 0;
   var flag_two = 0;
   var flag_three = 0;
   var flag_four = 0;
   // Validate lowercase letters
   var lowerCaseLetters = /[a-z]/g;
   if(myInput.value.match(lowerCaseLetters)) {
     flag_one = 1;
   } else {
     flag_one = 0;
   }

   // Validate numbers
   var numbers = /[0-9]/g;
   if(myInput.value.match(numbers)) {
     flag_two = 1;
   } else {
     flag_two = 0;
   }
   // Validate length
   if(myInput.value.length >= 8) {
     flag_three = 1;
   } else {
     flag_three = 0;
   }
   // Validate length

 if (flag_one == 1 && flag_two == 1 && flag_three == 1) {
   myInput.classList.remove("invalid");
   myInput.classList.add("valid");
   return true;
 }else {
   myInput.classList.remove("valid");
   myInput.classList.add("invalid");
   return false;
 }
 }

 function repeat_check(){
  var pass = document.getElementById("passkey_regis");
  var pass_repeat = document.getElementById("passkey_repeat");

  if (pass.value == pass_repeat.value) {
    pass_repeat.classList.remove("invalid");
    pass_repeat.classList.add("valid");
    return true;
  }else {
    pass_repeat.classList.remove("valid");
    pass_repeat.classList.add("invalid");
    return false;
  }

 }

 function show_pass() {
   var x = document.getElementById("passkey_regis");
   if (x.type === "password") {
     x.type = "text";
   } else {
     x.type = "password";
   }
 }

 </script>


 <script type="text/javascript">

 <?php
 /*
 $start_date
 $end_date
 $number_room
 $adults_num
 $child_num
 $price
 $id
*/
?>
   function checkout(){
         var query = "bookHotel.php?hotel_id=<?php echo $id; ?>&checkin_date=<?php echo $start_date; ?>&checkout_date=<?php echo $end_date; ?>&number_room=<?php echo $number_room; ?>&number_adult=<?php echo $adults_num; ?>&price=<?php echo $price; ?>&number_child=<?php echo $child_num; ?>";
         window.location.href = query;
       }
 </script>
</body>

</html>
