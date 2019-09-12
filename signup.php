<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){

}else{
header("location:user.php");
}
?>
<!DOCTYPE html>
<html>
<head>
		<title>Cabnotels | Login </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta name="msapplication-TileColor" content="#ffdd00">
		<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
		<meta name="theme-color" content="#ffdd00">
		<link href="css/style.css" rel="stylesheet" type="text/css"><!-- custom css -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('images/banner1.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}


/*--header--*/
.navigation{
	background-color: #3c3c3c;
	z-index: 999;
	transition-duration: 0.5s;
}



.inner-nav{
	width: 90%;
	margin: auto;
	display: flex;
	justify-content: space-between;
}

.logo-holder{
width:80px;
}

.linkholder a {
		background: none;
		padding: 10px 25px;
		display: block;
		margin-top: -7px;
		text-transform: uppercase;
		color: #ffffff;
		letter-spacing: 1px;
		border: 1px solid #ffffff1f;
		font-size: 14px;
		margin-right: 2px;
}

.combine-links{
	display: flex;
align-items: center;
vertical-align: middle;
}

.link-holder{
		display: flex;
		align-items: center;
		justify-content: center;
}

.link-holder a {
		background: none;
		padding: 10px 25px;
		display: block;
		margin-top: -7px;
		text-transform: uppercase;
		color: #ffffff;
		letter-spacing: 1px;
		border: 1px solid #ffffff00;
		font-size: 14px;
		margin-right: 2px;
}

.link-holder a:hover{
	background: #ffdd00;
		color: #3c3c3c;
		border: 1px solid #ffffff;
}

.link-active{
	background: #ffdd00 !important;
		color: #3c3c3c !important;
}


.hamburger-holder{
		transition-duration: 0.5s;
		display: flex;
		position: relative;
		background: #ffdd00;
		width: 50px;
		height: 50px;
		align-items: center;
		justify-content: center;
		margin-bottom: 10px;
		border-radius: 25px;
}

.login-cart{
	display:flex;
	margin: 0 0 0 20px;
}

.hamburger-icon-holder{
	display: none;
}

/*updated media queries */


/*UHD devices */

@media (max-width: 1440px){


}


/*tablets */

@media (max-width: 768px){

	.hamburger-icon-holder{
		display: flex;
		justify-content: space-between;
	}

	/*--header--*/
	.navigation{
		height: 70px;
    position: relative;
    z-index: 999;
    overflow: hidden;
    margin-bottom: 50px;
	}



	.inner-nav{
		width: 90%;
		margin: auto;
		display: block;
		justify-content: space-between;
	}

	.logo-holder{width:80px;position: relative;margin: auto;margin-bottom: 44px;}

	.linkholder a {
			background: none;
			padding: 10px 25px;
			display: block;
			margin-top: -7px;
			text-transform: uppercase;
			color: #ffffff;
			letter-spacing: 1px;
			border: 1px solid #ffffff1f;
			font-size: 14px;
			margin-right: 2px;
	}

	.combine-links{
		display: block;
	}

	.link-holder{
			display: block;
			align-items: center;
			justify-content: center;
			margin: 10px;
			text-align: center;
	}

	.link-holder a {
			background: none;
			padding: 10px 25px;
			display: block;
			margin-top: -7px;
			text-transform: uppercase;
			color: #ffffff;
			letter-spacing: 1px;
			border: 1px solid #ffffff1f;
			font-size: 14px;
			margin-right: 2px;
	}

	.link-holder a:hover{
		background: #ffdd00;
			color: #3c3c3c;
			border: 1px solid #ffffff;
	}

	.login-cart{
		display:flex;
		justify-content: space-between;
		margin: 20 0 0 0;
	}

	/*--header--*/
}

/*large phone */


@media (max-width: 425px){

}


/*medium phone*/
@media (max-width: 375px){


}


/*small phone*/
@media (max-width: 320px){


}


.expand{
	height: 100% !important;
	background: #3c3c3c;
}

.rotate{
	transform: rotate(90deg);
}


.container{
height: 100%;
align-content: center;
}

.card{
height: auto;
margin-top: auto;
margin-bottom: auto;
width: 100%;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
color: #ffdd00;
}


.info_box{
  background-color: rgba(0,0,0,0.5) !important;
  border-radius: 0.25em;
  min-height: 330px;

}

@media(max-width:736px) {
.info_box{
    margin-bottom: 10px;
}
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
<body>


<?php include 'includes/navbar.php' ?>


<div class="container">
  <div class="row py-4">

    <div class="d-flex col-lg-8" >
      <div class="info_box">
        <div class="w3layouts-banner-info col-xl-8 col-lg-8 col-sm-12">
          <div style="
          width: 20%;
          min-width: 25%;
          padding: 20px 0 20px 0;
          left: 50%;
          position: relative;
          transform: translate(-50%);
      ">
            <img src="images/logo.png" alt="">
          </div>
          <h3 class="text-wh">Register Now</h3>
          <h4 class="text-wh">We Can offer you the best experirnce</h4>
          <div class="buttons mt-4">
            <a href="index.php" class="btn mr-2">Home</a>
            <a href="login.php" class="btn">Login</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card">

        <div class="card-body">
          <form id="register_form">

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
                <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required autofocus="autofocus" autocomplete="email">
            </div>

            <label for="inputEmail4"> <p class="text-white small m-0">Password</p> </label>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
                <input onkeyup="validate_pass()" type="password" id="passkey" name="passkey" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                <div onclick="show_pass()" class="input-group-prepend" style="cursor: pointer;">
                  <span class="input-group-text" style="background: #ffc312;border-radius: 0 0.25em 0.25em 0;"><i class="fas fa-eye"></i></span>
                </div>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
                <input onkeyup="repeat_check()" type="password" id="passkey_repeat" name="passkey_repeat" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
            </div>
            <label for=""> <p class="text-white small m-0">Phonenumber</p> </label>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
                <input type="number" name="phonenumber" id="phonenumber" class="form-control" placeholder="Phonenumber" required="required" autofocus="autofocus">
            </div>

            <div class="row align-items-center remember">
              <input type="checkbox">Remember Me
            </div>
            <div class="form-group">
              <button type="submit" name="button" class="btn float-right login_btn">Submit</button>
            </div>
          </form>

        </div>
        <div class="card-footer">
          <div class="d-flex justify-content-center links">
            Don't have an account?<a href="signup.php">Sign Up</a>
          </div>
          <div class="d-flex justify-content-center links">
            <a href="#">Forgot your password?</a>
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

<script type="text/javascript">
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
                          update_staus_success("Signup Sucessfull");
                          window.location.href = 'index.php';
                      }
                  }
              });
            }else {
              update_staus_success("Please Enter Correct Password");
            }
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
  var myInput = document.getElementById("passkey");
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
 var pass = document.getElementById("passkey");
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
  var x = document.getElementById("passkey");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
</body>
</html>
