<?php
 include('session.php');
 if($_SESSION['auth'] == true){
  navigate("admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cabnotels - Admin</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form id="login_form" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="user_email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="user_pass" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input id="efwefrw"  name="efwefrw" type="checkbox" value="remeber-me">
                Remember Password
              </label>
            </div>
          </div>
        <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"> LOGIN</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>

                             <div id="status_message" class="alert alert-primary" role="alert" style="margin-top:10px;">
                               status
                             </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <script type="text/javascript">
  $(function () {
     $('#login_form').on('submit', function (e) {
         update_staus_success("Please wait");
          e.preventDefault();
         $.ajax({
           type: 'post',
           url: 'verify.php',
           data: $('#login_form').serialize(),
            dataType: 'JSON',
           success: function (response) {
             if (response == 1) {
                  update_staus_success("login approved");
                  window.location.href = 'admin.php';
             }else if (response == 0) {
                 update_staus_error("err")
             }else {
              update_staus_error("Somthing Happend")
             }
           }
         });
       });
   });

   //utility functions
   function update_staus_error(message){
     document.getElementById('status_message').innerHTML=message;
       $( "#status_message" ).addClass( "alert-danger" );
   }
   function update_staus_success(message){
     document.getElementById('status_message').innerHTML=message;
       $( "#status_message" ).addClass( "alert-successs" );
   }

  </script>



</body>

</html>
