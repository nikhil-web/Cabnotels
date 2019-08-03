<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
}else{
  $login_flag = 1;
  //header("location:login.php");
}
$sql = "SELECT * FROM contact_page";
$result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        $row= mysqli_fetch_assoc($result);
      }
?>
<html lang="en">

<head>
  <script>
      addEventListener("load", function() {
          setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
          window.scrollTo(0, 1);
      }

  </script>

  <title>Cabnotels | Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="msapplication-TileColor" content="#ffdd00">
  <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
  <meta name="theme-color" content="#ffdd00">

  <!-- css files -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"><!-- bootstrap css -->
  <link href="css/style.css" rel="stylesheet" type="text/css"><!-- custom css -->
  <link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="css/animate.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!--css files -->

  <!--Script-->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!--Script-->

  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

</head>

<body>

  <!-- header -->
      <header id="navbar_color" style = "background:#3c3c3c;">
        <div class="container">
          <!-- nav -->
          <nav class="py-md-3 py-3 d-lg-flex">
            <div id="logo">
              <a href="index.php">  <div style="width: 100px;"><img style="width:inherit;" src="images/logo.png" alt=""> </div>  </a>
            </div>
            <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
            <input type="checkbox" id="drop">
            <ul class="menu ml-auto mt-3">
              <li class="booking"><a href="tours.php?mode=page">Tours</a></li>
  						<li class="booking"><a href="hotels.php?mode=navbar">Hotels</a></li>
  						<li class="booking"><a href="taxi.php?mode=navbar" style="margin-right: 10px;">Cabs</a></li>

              <?php
                if ($login_flag == 1) {
                  // code...
                  echo '
                    <li class="booking"><a href="user.php" style="background: #ffdd00;color: #3c3c3c;">'.$_SESSION["first_name"].' <i class="fas fa-user"></i></a></li>
                  ';
                }else {
                  // code...
                  echo '
                  <li class="booking"><a href="login.php" style="background: #ffdd00;color: #3c3c3c;">Login</a></li>
                  ';
                }

               ?>

            </ul>

          </nav>
          <!-- //nav -->
        </div>
      </header>
      <!-- //header -->

    <!-- Contact -->
    <section class="contact" style="margin-top: 100px" >
        <div class="container py-lg-5 py-sm-3">
            <h2 class="heading text-capitalize text-center mb-sm-5 mb-4"> Get In Touch with us</h2>
            <ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">
                <li class="col-md-6 col-sm-6 adress-w3pvt-info">
                    <div class="adress-icon">
                        <span class="fa fa-map-marker"></span>
                    </div>

                    <h6>Location</h6>
                    <p>Cabnotels
                    <br> <?php echo $row["location"]; ?> </p>
                </li>

                <li class="col-md-6 col-sm-6 adress-w3pvt-info mt-sm-0 mt-4">
                    <div class="adress-icon">
                      <span class="fa fa-envelope-open"></span>
                    </div>
                    <h6>Phone & Email</h6>
                    <p>+91 <?php echo $row["phonenumber"]; ?></p>
                    <a href="mailto:<?php echo $row["email"]; ?>" class="mail"><?php echo $row["email"]; ?></a>
                </li>

            </ul>

            <div class="contact-grids mt-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6 contact-left-form">
                        <form action="#" method="post">
                            <div class=" form-group contact-forms">
                                <input type="text" class="form-control" placeholder="Name" required="">
                            </div>
                            <div class="form-group contact-forms">
                                <input type="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group contact-forms">
                                <input type="text" class="form-control" placeholder="Phone" required="">
                            </div>
                            <div class="form-group contact-forms">
                                <input type="text" class="form-control" placeholder="Message" rows="3" required="">
                            </div>
                            <button class="btn btn-block sent-butnn">Send</button>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 contact-right pl-lg-5">
                        <h4>Do you have any questions about us? write to us.</h4>
                        <p class="mt-md-4 mt-2">Do you have any questions or are you planning to book a custom tour feel free to contact us.</p>
                        <h5 class="mt-lg-5 mt-3">Office Hours</h5>
                        <p class="mt-3">Monday to Friday : 09 am to 06 pm</p>
                        <p>Saturday and Sunay : 10 am to 04 pm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Contact -->

    <!-- map
    <div class="map p-2">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.728106568!2d-0.24168153701090248!3d51.52877184090542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1544074523717"></iframe>
    </div>
    //map -->


  <?php include 'includes/footer.php' ?>



    <!-- move top -->
    <div class="move-top text-right">
        <a href="#home" class="move-top">
            <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
        </a>
    </div>
    <!-- move top -->


</body>

</html>
