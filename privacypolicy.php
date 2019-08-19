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
              <a href="index.php">  <div style="width: 65px;"><img style="width:inherit;" src="images/logo.png" alt=""> </div>  </a>
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
          <h2 class="heading text-capitalize text-center mb-sm-5 mb-4">Terms & Conditions</h2>
            <div class="row">
                <div class="col-lg-12 about-left">
                <h3 class="mt-lg-3"><strong> This Privacy Policy applies to the cabnotels.com</strong></h3>

                <p class="mt-4">
                Cabnotels.com recognises the importance of maintaining your privacy. We value your privacy and appreciate your trust in us. This Policy describes how we treat user information we collect on http://www.cabnotels.esy.es and other offline sources. This Privacy Policy applies to current and former visitors to our website and to our online customers. By visiting and/or using our website, you agree to this Privacy Policy.
                Cabnotels.com in is a property of Vriddh Path Travelling Assistance Private Limited, an Indian Company registered under the Companies Act, 2013 having its registered office at P.N-53/54, Bhushan Nagar, Kalamna RD, Yerkheda Kamptee, Nagpur,India-441001 .
                </p>

                <h3 class="mt-lg-3"><strong>Information we collect</strong></h3>

                <p class="mt-4">
                    Contact information. We might collect your name, email, mobile number, phone number, street, city, state, pincode,  country and ip address.

                    Payment and billing information. We might collect your billing name, billing address and payment method when you buy a ticket. We NEVER collect your credit card number or credit card expiry date or other details pertaining to your credit card on our website. Credit card information will be obtained and processed by our online payment partner PayU.

                    Information you post. We collect information you post in a public space on our website or on a third-party social media site belonging to www.cabnotels.com

                    Demographic information. We may collect demographic information about you, events you like, events you intend to participate in, tickets you buy, or any other information provided by your during the use of our website. We might collect this as a part of a survey also.

                    Other information. If you use our website, we may collect information about your IP address and the browser you’re using. We might look at what site you came from, duration of time spent on our website, pages accessed or what site you visit when you leave us. We might also collect the type of mobile device you are using, or the version of the operating system your computer or device is running.

                    We collect information in different ways.

                    We collect information directly from you. We collect information directly from you when you register for an event or buy tickets. We also collect information if you post a comment on our websites or ask us a question through phone or email.

                    We collect information from you passively. We use tracking tools like Google Analytics, Google Webmaster, browser cookies and web beacons for collecting information about your usage of our website.

                    We get information about you from third parties. For example, if you use an integrated social media feature on our websites. The third-party social media site will give us certain information about you. This could include your name and email address.
                  </p>


                  <h3 class="mt-lg-3"><strong>Use of your personal information</strong></h3>

                  <p class="mt-4">
                    We use information to contact you: We might use the information you provide to contact you for confirmation of a purchase on our website or for other promotional purposes.

                    We use information to respond to your requests or questions. We might use your information to confirm your registration for an event or contest.

                    We use information to improve our products and services. We might use your information to customize your experience with us. This could include displaying content based upon your preferences.

                    We use information to look at site trends and customer interests. We may use your information to make our website and products better. We may combine information we get from you with information about you we get from third parties.

                    We use information for security purposes. We may use information to protect our company, our customers, or our websites.

                    We use information for marketing purposes. We might send you information about special promotions or offers. We might also tell you about new features or products. These might be our own offers or products, or third-party offers or products we think you might find interesting. Or, for example, if you buy tickets from us we’ll enroll you in our newsletter.

                    We use information to send you transactional communications. We might send you emails or SMS about your account or a ticket purchase.

                    We use information as otherwise permitted by law.
                   </p>

                    <h3 class="mt-lg-3"><strong> Sharing of information with third-parties</strong></h3>

                    <p class="mt-4">
                    We will share information with third parties who perform services on our behalf. We share information with vendors who help us manage our online registration process or payment processors or transactional message processors. Some vendors may be located outside of India.

                    We will share information with the event organizers. We share your information with event organizers and other parties responsible for fulfilling the purchase obligation. The event organizers and other parties may use the information we give them as described in their privacy policies.

                    We will share information with our business partners. This includes a third party who provide or sponsor an event, or who operates a venue where we hold events. Our partners use the information we give them as described in their privacy policies.

                    We may share information if we think we have to in order to comply with the law or to protect ourselves. We will share information to respond to a court order or subpoena. We may also share it if a government agency or investigatory body requests. Or, we might also share information when we are investigating potential fraud.

                    We may share information with any successor to all or part of our business. For example, if part of our business is sold we may give our customer list as part of that transaction.

                    We may share your information for reasons not described in this policy. We will tell you before we do this.
                  </p>

                    <h3 class="mt-lg-3"><strong> Email Opt-Out</strong></h3>

                  </p>
                    You can opt out of receiving our marketing emails. To stop receiving our promotional emails, please email unsubscriber@cabnotels.com . It may take about ten days to process your request. Even if you opt out of getting marketing messages, we will still be sending you transactional messages through email and SMS about your purchases.
                  </p>
                    <h3 class="mt-lg-3"><strong>   Third party sites</strong></h3>
                    <p class="mt-4">
                    If you click on one of the links to third party websites, you may be taken to websites we do not control. This policy does not apply to the privacy practices of those websites. Read the privacy policy of other websites carefully. We are not responsible for these third party sites.
                    </p>

                    <h3 class="mt-lg-3"><strong> Updates to this policy</strong></h3>
                    <p class="mt-4">
                    This Privacy Policy was last updated on 18.03.2019. From time to time we may change our privacy practices. We will notify you of any material changes to this policy as required by law. We will also post an updated copy on our website. Please check our site periodically for updates.
                    </p>

                    <h3 class="mt-lg-3"><strong> Jurisdiction</strong></h3>
                    <p class="mt-4">
                    If you choose to visit the website, your visit and any dispute over privacy is subject to this Policy and the website’s terms of use. In addition to the foregoing, any disputes arising under this Policy shall be governed by the laws of India.
                    </p>
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
