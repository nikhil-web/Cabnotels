<?php
include "config.php";
  if (isset($_GET["key"]) && isset($_GET["email"])) {
    // code...
  $key =  mysqli_real_escape_string($db,$_GET["key"]);
  $email =  mysqli_real_escape_string($db,$_GET["email"]);

  $sql_user_id = "SELECT user_id FROM users WHERE users.user_email = '$email'";
  $result_user_id = mysqli_query($db,$sql_user_id);
  $row_id = mysqli_fetch_array($result_user_id,MYSQLI_ASSOC);
  $user_id_db = $row_id["user_id"];
  //echo $user_id_db;


  $sql_token = "SELECT token FROM reset WHERE reset.user_id = '$user_id_db'";
  $result_token = mysqli_query($db,$sql_token);
  $row_token = mysqli_fetch_array($result_token,MYSQLI_ASSOC);
  $token = $row_token["token"];
  //echo $token;

  //echo $key;

  $flag = strcmp($key,$token);

  if ($flag == 0) {
    //echo "You can reset Password";

  }else {
     //header("location:index.php");
  }
}else{
  header("location:index.php");
}
?><html lang="en">
<head>
    <title>Cabnotels | Trouble</title>
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
  <div id="navbar_color" class="col-12 py-2 navigation">
  	<div class="hamburger-icon-holder" style="">
  		<div id="hamburger" class="hamburger-holder">
  			<div id="icon" class="hamburger"> <span class=""><i class="fas fa-bars"></i></span>
  			</div>
  		</div>
  		<div style="
      position: relative;
      width: 60px;
  ">
  			<img src="images/logo.png" alt="" style="width: 100%;">
  		</div>
  	</div>
  	<div class="col-12 inner-nav">
  		<div class="logo-holder">
  			<a href="./"><img src="images/logo.png" alt="" style="width: 100%;"></a>

  		</div>

  										 <div class="login-cart">
  											 <div class="link-holder"> <a class="link-active" href="./login.php"> Login </a>
  											 </div>
  											 <div class="link-holder"> <a class="link-active" href="./signup.php"> Signup </a>
  											 </div>
  										 </div>




  		</div>
  	</div>
  </div>
  <div class="container checkout" style="min-height: 100vh;">
    <div class="row p-3">

        <div class="col-lg-8 py-4">

            <div class="card" style="margin: 0 0px 10px 0;background-color: #fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);">
            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#">
              <p class="mb-0">
                1. Please Enter Your Details.
              </p>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div id="card_body" class="card-body">

              <form id="reset_form" method="post">
                <label for="inputEmail4"> <p class="m-0">Password</p> </label>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                    <input onkeyup="validate_pass()" type="password" id="password" name="password" class="form-control" placeholder="New Password"  required autocomplete="off">
                    <div onclick="show_pass()" class="input-group-prepend" style="cursor: pointer;">
                      <span class="input-group-text"><i class="fas fa-eye"></i></span>
                    </div>
                </div>
                <label for=""> <p class="m-0">Repeat Password</p> </label>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                    <input onkeyup="repeat_check()" type="password" id="password_repeat" name="password_repeat" class="form-control" placeholder="Repeat Password" required autocomplete="off">

                </div>

                <input type="hidden" name="email" value="<?php echo $email; ?>">

                <div class="form-group">
                  <button type="submit" name="button" class="btn btn-primary">Continue</button>
                </div>
              </form>
          </div>
          </div>
        </div>
      </div>

        <div class="col-lg-4 py-4">
            <div class="card" style="margin: 0 0px 10px 0;background-color: #fff;box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);">
              <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#">
                <p class="mb-0">
                  Reset Your Password
                </p>
            </div>
            <div id="card_body" class="card-body">
              <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="pills-contact-tab">

                  <ul class="timeline">
                    <li>
                      <h5>Enter Your New Password <!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                      <p class="text-small">Your Password Should Contain</p>
                      <ul class="timeline">
                        <li>
                          <p class="text-small">A Number</p>
                        </li>
                        <li>
                          <p class="text-small">A Letter </p>
                        </li>
                        <li>
                          <p class="text-small">Min Eight Charecters</p>
                        </li>
                      </ul>
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
                <h3 id="status_message"> </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

 <?php include 'includes/footer.php' ?>


 <script>


 $(function() {
     $('#reset_form').on('submit', function(e) {
         e.preventDefault();
         $('#modelformessage').modal({
             keyboard: true
         });
         if (validate_pass() == true && repeat_check() == true ) {
           var key = document.getElementById("password").value;
           $.ajax({
               type: 'post',
               url: 'reset_password.php',
               data: $('#reset_form').serialize(),
               success: function(response) {
                   if (response == 0) {
                       update_staus_error("Error");
                   } else if (response == 1) {
                       update_staus_success("Sucessfull");
                   }
               }
           });
         }else{
           update_staus_error("Error");
         }

     });
 });


 // When the user starts to type something inside the password field
 function validate_pass() {
   repeat_check();
   var myInput = document.getElementById("password");
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
  var pass = document.getElementById("password");
  var pass_repeat = document.getElementById("password_repeat");

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




 //utility functions
 function update_staus_error(message) {
     document.getElementById('status_message').innerHTML = message;
     $("#status_message").addClass("dangerclass");

 }

 function update_staus_success(message) {
     document.getElementById('status_message').innerHTML = message;
     $("#status_message").removeClass("dangerclass")
 }


function show_pass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

 </script>

</body>

</html>
