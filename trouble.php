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

$unique_code = uniqid();
?>
<html lang="en">
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

</style>

</head>

<body style="background-color:#f2f2f2;">
<?php include 'includes/navbar.php'; ?>
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
                <label for="inputEmail4"> <p class="m-0">Email</p> </label>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                    <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required autocomplete="of">

                </div>
                <label for=""> <p class="m-0">Phonenumber</p> </label>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                    <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Enter Your Phonenumber" required autocomplete="off">
                </div>

                <input type="hidden" id="unique_code" name="unique_code" value="<?php echo $unique_code; ?>">

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
                  Recover Your Account
                </p>
            </div>
            <div id="card_body" class="card-body">
              <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="pills-contact-tab">

                  <ul class="timeline">
                    <li>
                      <h5>1. Enter Details <!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                      <p class="text-small">Enter Your Details</p>
                    </li>
                  </ul>
                  <ul class="timeline">
                    <li>
                      <h5>2. Recive Confirmation Mail<!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                      <p class="text-small">Open the reset link sent Your rgisterd mail </p>

                    </li>
                  </ul>
                  <ul class="timeline">
                    <li>
                      <h6>3. Change The Password. <!--	<span href="#" class="float-right">21 March, 2014</span> --></h6>
                      <p class="text-small">Change The password And Login.</p>

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
                <h3 id="status_message_heading"> </h3>
                <p id="status_message"></p>
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
     $('#reset_form').on('submit', function(e) {
         e.preventDefault();
         $('#modelformessage').modal({
             keyboard: true
         });

         console.log("here is the form");
         $.ajax({
             type: 'post',
             url: 'reset_routine.php',
             data: $('#reset_form').serialize(),
             success: function(response) {
                 if (response == 0) {
                   update_staus_error("Sorry! No Account Match.");
                 } else if (response == 1) {
                  update_staus_success("Please Check Your Email.","a reset Link is sent to your registerd email id");
                  send_reset_mail();
                }else if (response == -1) {
                  update_staus_success("Duplicate Request.","You already have a password reset request,Please check your email (Spam Folder)");

                }
             }
         });
     });
 });



function send_reset_mail(){
  var flag = 0;
  $.ajax({
      type: 'post',
      url: 'send_reset_mail.php',
      data: $('#reset_form').serialize(),
      success: function(response) {
          if (response == 0) {
          console.log("mail NOT Sent");
          } else if (response == 1) {
          console.log("mail Sent");
          }
      }
  });
}




 //utility functions
 function update_staus_error(message) {
     document.getElementById('status_message').innerHTML = message;
     $("#status_message").addClass("dangerclass");

 }

 function update_staus_success(header,data) {
      document.getElementById("status_message_heading").innerHTML = header;
     document.getElementById('status_message').innerHTML = data;
     $("#status_message").removeClass("dangerclass")
 }
 </script>

</body>

</html>
