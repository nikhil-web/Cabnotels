<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
}else{
  $login_flag = 1;
  //header("location:login.php");
}



  $sql = "SELECT * FROM about_page";
  $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
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
    <!-- about -->
    <section class="about" style="margin-top: 100px" >
        <div class="container py-lg-5 py-sm-4">
          <h2 class="heading text-capitalize text-center mb-sm-5 mb-4"><?php echo $row["heading"]; ?></h2>
            <div class="row">
                <div class="col-lg-6 about-left">
                    <h3 class="mt-lg-3"><strong> <?php echo $row["subheading"]; ?> </strong></h3>
                    <p class="mt-4"><?php echo $row["content"]; ?></p>
                </div>
                <div class="col-lg-6 about-right text-lg-right mt-lg-0 mt-5">
                    <img src="<?php echo 'admin/'.$row["image"]; ?>" alt="" class="img-fluid abt-image" />
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="col-lg-3 col-6">
                    <div class="counter">
                        <span class="fa fa-user"></span>
                        <div class="timer count-title count-number"><?php echo $row["customers"]; ?>+</div>
                        <p class="count-text text-uppercase">happy customers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="counter">
                        <span class="fa fa-ship"></span>
                        <div class="timer count-title count-number"><?php echo $row["tours"]; ?></div>
                        <p class="count-text text-uppercase">Tours </p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-lg-0 mt-5">
                    <div class="counter">
                        <span class="fa fa-users"></span>
                        <div class="timer count-title count-number"><?php echo $row["destinations"]; ?></div>
                        <p class="count-text text-uppercase">destinations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-lg-0 mt-5">
                    <div class="counter">
                        <span class="fa fa-gift"></span>
                        <div class="timer count-title count-number"><?php echo $row["experiance"]; ?>+<span>years</span></div>
                        <p class="count-text text-uppercase">experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //about -->


    <!-- Section: Testimonials  -->
      <!-- Footer -->
	     <?php
            include 'includes/reviews.php';
          ?>
    <!-- footer -->
      <!-- Section: Testimonials -->


    <?php include 'includes/footer.php'; ?>



    <!-- move top -->
    <div class="move-top text-right">
        <a href="#home" class="move-top">
            <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
        </a>
    </div>
    <!-- move top -->


</body>
<!-- scripts -->
<script>
  $(function() {
    //caches a jQuery object containing the header element
    var header = $("#navbar_color");
    $(window).scroll(function() {


      var scroll = $(window).scrollTop();
      //console.log(scroll);
      var req_height = screen.availHeight;
      //console.log(req_height);
      var req_height_change = (req_height * 0.1);
      if (scroll >= req_height_change) {
        header.removeClass("clearHeader").addClass("darkHeader");
      } else {
        header.removeClass("darkHeader").addClass("clearHeader");
      }
    });
  });
</script>
</html>
