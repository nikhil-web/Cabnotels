<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
}else{
  $login_flag = 1;
  //header("location:login.php");
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

    <title>Cabnotels | Return</title>
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

    <style media="screen">
    /*--header--*/
    .navigation{
      position: fixed;
      background-color: #3c3c3c;
      z-index: 999;
      transition-duration: 0.5s;
    }
    </style>

</head>

<body>
  <?php include 'includes/navbar.php'; ?>


    <!-- about -->
    <section class="about" style="margin-top: 100px" >
        <div class="container py-lg-5 py-sm-4">
          <h2 class="heading text-capitalize text-center mb-sm-5 mb-4">Return & Refund Policy</h2>
            <div class="row">

              <div class="col-lg-12 about-left">
                    <h3 class="mt-lg-3"><strong>   CANCELLATION & REFUND POLICY </strong></h3>
                    <p class="mt-4">

                      CANCELLATION CHARGES OF TOUR
                      7 Days before departure:    100% of tour

                      8-15 Days before departure: 50% of tour

                      16-30 Days before departure:  25% of tour

                      31 or more days before departure than 15 % or 4000 whichever is less.
                        <br></p>

                        <h4 class="mt-lg-3"><strong>    REFUND POLICY </strong></h4>
                          <p class="mt-4">
                      Once cancellation of tour is done, Vriddh Path Travelling Assistance Pvt. Ltd. makes refund payments within 20 days after cancellation process completion.
                      If tour package price include bus tickets, Air tickets and train tickets, so refund to customer only made after Vriddh Path Travelling Assistance Pvt. Ltd. receive refunds from service provider.
                      Payment of tour package made by online or offline mode, Vriddh Path Travelling Assistance Pvt. Ltd. transfer refund amount by net banking.
                      If tour package include non-refundable cost like Travel insurance, advance booking of sightseeing tickets or entry tickets, cost same incurred by Vriddh Path Travelling Assistance Pvt. Ltd. will be deducted from refund amount.
                      Traveler can’t claim if traveler doesn’t or can’t utilize any services like hotel, ride, entrance fees or any meal and optional tour due to any reason whatsoever.
                        <br></p>

                </div>

            </div>

        </div>
    </section>
    <!-- //about -->




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
