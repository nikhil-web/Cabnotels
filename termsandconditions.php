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
                    <h3 class="mt-lg-3"><strong>     PRELIMINARY </strong></h3>
                    <p class="mt-4">  Terms and Conditions page is an electronic record which doesn’t need any physical record.
                      Before using website cabnotels.com or registration on this domain read all terms and condition carefully.
                      Using services which are present on website cabnotels.com will be consider as you accepted all these terms and condition and you are legally bound in this regard.<br></p>
                </div>

                <div class="col-lg-12 about-left">
                    <h3 class="mt-lg-3"><strong>         GENERAL </strong></h3>
                    <p class="mt-4">

                      These terms and conditions set out the rights and obligations which exist between Vriddh Path Travelling Assistance Pvt. Ltd. and the customer and/or Website User, as applicable (hereinafter referred to as “TRAVELER” or “You” or as “User”). These Terms and Conditions apply to any travel products and/or services TRAVELER(S) has booked with or purchased from Vriddh Path Travelling Assistance Pvt. Ltd., and govern the contractual relationship between you and Vriddh Path Travelling Assistance Pvt. Ltd. with respect to any such travel products and/or services (hereinafter, the “Tour”). Please read these Terms carefully as by booking any Tour with Vriddh Path Travelling Assistance Pvt. Ltd., or by booking and travelling on a Vriddh Path Travelling Assistance Pvt. Ltd. tour you acknowledge that you:
                      i) have read and understand these Terms, and
                      ii) indicate your acceptance of and agree to be bound by these Terms.
                      If you have booked a tour on behalf of other travelers then it will be automatically consider that you are accepting these Terms and Conditions on behalf of them. These Terms constitute the entire agreement between the Traveler(s) and with respect to the subject matter thereof and supersedes all prior agreements, representations and understandings of the parties, written or oral.
                      Website cabnotels.com is owned by Vriddh Path Travelling Assistance Pvt. Ltd. incorporated under law of India.
                      These terms of use can be modify time to time because of change in any government policy or change in our policy. Vriddh Path Travelling Assistance Pvt. Ltd. is not responsible to notify traveler or customer of change in Terms and condition. Customer or traveler’s continuous use of website will indicate that you have understood and agree upon new T&C.
                      As you know online payment is processed by third party so you authorize Vriddh Path Travelling Assistance Pvt. Ltd. to share your financial and some information to such third party for payment process.
                      In exchange for your compliance with our Terms of Use, privacy policy and other terms and conditions, incorporated by reference, we grant you a non-exclusive, non-transferable privilege to enter and use the Website.

                      <br></p>
                </div>

                <div class="col-lg-12 about-left">
                    <h3 class="mt-lg-3"><strong>             ACCOUNT & SECURITY OBLIGATIONS  </strong></h3>
                    <p class="mt-4">

                      Full use of website is only available by creating an account.
                      It will consider that you agree upon suspension, termination and permanently blocking you to use the website if Vriddh path Travelling Assistance Pvt. Ltd. found any information which is misleading, incorrect or incomplete in nature.
                      You are obliged to logout your account after end of session and if any unauthorized use of your account is taking place then contact Vriddh Path Travelling Assistance Pvt. Ltd by emailing us on vriddhpath@gmail.com , info@cabnotels.com or on given phone numbers.

                      <br></p>
                </div>

                <div class="col-lg-12 about-left">
                    <h3 class="mt-lg-3"><strong>           SCOPE OF SERVICE  </strong></h3>
                    <p class="mt-4">

                      Vriddh Path Travelling Assistance Pvt. Ltd take fullest care in selecting all services or independent contractor like hotel, taxi services and restaurants just to make the travelers comfortable on tour.
                      Services like hotel, transportation and restaurants are independent contractors, so Vriddh Path Travelling Assistance Pvt. Ltd can’t have control over their operations. Vriddh Path Travelling Assistance Pvt. Ltd do not be held liable for any loss, death, damage cause by default, harm, injury  caused by employee or management of these service providers. Vriddh Path Travelling Assistance Pvt. Ltd only focused on safety and comfort of traveler so continuously be in touch with travelers and service provider and send instruction through telephonic conversation or through SMS to both of them.


                      <br></p>
                </div>
                <div class="col-lg-12 about-left">
                    <h3 class="mt-lg-3"><strong>        BOOKING & PAYMENT  </strong></h3>
                    <p class="mt-4">

                      To book any tour before 20 days of departure customer have to pay minimum 80% of tour package and at the date of departure he have to pay left 20 %. This terms is only applicable if booking is not done from website cabnotels.com
                      If tour package do not include fare of train and air transportation and we arranged that for you then that booking amount will be paid before booking.
                      After booking Vriddh Path Travelling Assistance Pvt. Ltd send you pre departure booklet, tickets, pickup& drop time and required medical form (if traveler’s age is more than 50.)
                      If traveler require any tour manager or tour guide this can only be arrange on demand of traveler and only before the booking of tour.(it will increase the price of tour)
                      Sequence of tour itinerary can be change without prior notice.
                      During and before the commencement of tour extra charges borne by you because of acts of god, cancellation or interruption due to riots, war, curfew, terrorist act or some other acts on which Vriddh Path Travelling Assistance Pvt. Ltd do not have any control, cancellation or delay of flights, bus or train for whatsoever reason, loss of luggage/ personal belongings, any medical problems like sickness and any damage or loss caused by third party shall not be consider as liability of Vriddh Path Travelling Assistance Pvt. Ltd.


                      <br></p>
                </div>


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


                <div class="col-lg-12 about-left">
                    <h3 class="mt-lg-3"><strong>          TRAVEL DOCUMENTS  </strong></h3>
                    <p class="mt-4">

                      Travelers have to carry original identity proof like Adhar card, pan card and driving license, traveler have to take care all those documents solely Vriddh Path Travelling Assistance Pvt. Ltd is not responsible for loss or damage of these documents.


                      <br></p>
                </div>


                                <div class="col-lg-12 about-left">
                                    <h3 class="mt-lg-3"><strong>           HEALTH CONDITION OF TRAVELER </strong></h3>
                                    <p class="mt-4">


                                          Signature of traveler on declaration form with attested with details of medication and medical condition may require. If it is found that traveler mislead any information then Vriddh Path Travelling Assistance Pvt. Ltd reserves rights to cancel the tour and took proper action over such cases.
                                          Traveler is advised to choose which tour is suitable for their health and interest because some of tour place offer by us may not have living standard or suitable conditions like your home.
                                          Tour of some places offer by us do not have proper medical facilities and condition of living so Vriddh Path Travelling Assistance Pvt. Ltd responsible for these kind of services.


                                      <br></p>
                                </div>

                                <div class="col-lg-12 about-left">
                                    <h3 class="mt-lg-3"><strong>  TRAVELER’S ACCEPTANCE OF RISK </strong></h3>
                                    <p class="mt-4">

                                      Traveler(s) acknowledge that going outside involve certain degree of risk to traveler’s health/ safety. Traveler(s) acknowledges they have considered such risks to health and safety and are willing to assume it, by confirming their booking of such Travel or Tour Product from 50+ Voyagers. It is Traveler(s) own responsibility to acquaint herself/himself with all possible relevant travel information and the nature of itinerary. The Traveler(s) hereby assumes all such risk and does hereby release 50+ Voyagers from all claims and causes of action arising from any losses, damages or injuries or death resulting from these risks inherent in travel, including travel to remote and tribal areas specifically, visiting foreign destinations, and participating in activities such as those included in Product itineraries.
                                      Different type of tour, different region in India involves different kind of risks. Traveler(s) acknowledge considering the potential of risk, challenges and danger.
                                      Traveler(s) agrees to take all prudent measures in relation to their own safety while on any Vriddh Path Travelling Assistance Pvt. Ltd. tour Product, including, but not limited to, the proper use of safety devices such as seatbelts, harnesses, and helmets, and obeying all posted signs and warnings in relation to Traveler(s) health and safety. Vriddh Path Travelling Assistance Pvt. Ltd, nor its Third Party Suppliers (as hereinafter defined) shall not be liable for any failure on the Traveler(s)’s part to comply safety instructions or recommendations of Vriddh Path Travelling Assistance Pvt. Ltd or its Third Party Suppliers.
                                      <br></p>
                                </div>



                                <div class="col-lg-12 about-left">
                                    <h3 class="mt-lg-3"><strong>     CONTENT AND USE </strong></h3>
                                    <p class="mt-4">

                                      You represent and warrant that:
                                      You own the Content posted by You on the Website;
                                      Your Content does not violate the privacy rights, copyright rights, or other rights of any person;
                                      by posting the Content, You do not violate any confidentiality, non-disclosure, or contractual obligations you might have towards a third party;
                                      any information you provide as a part of the Content is correct and true to the best of Your knowledge and is provided by You in good faith; and
                                      Please do not provide any information that you are not allowed to share with others, including by contract or law; please note that any information you provide will be accessible to every User of the Website, except as provided herein.
                                      You are solely responsible for any and all Content that is posted through your Account on the Services and for your interactions with other Users.
                                      In addition to the Content prohibited by law, You agree that you will not post any Content that:
                                      is offensive or denigrates any religion, caste, creed, nationality or similar affiliations;
                                      promotes racism, bigotry, hatred or physical harm of any kind against any group or individual, or is pornographic or sexually explicit in nature;
                                      harasses or advocates stalking or harassment of another person;
                                      involves the transmission of “junk mail” or unsolicited mass mailing, or “spamming”;
                                      is false or misleading or promotes, endorses or furthers illegal activities or conduct that is abusive, threatening, obscene, defamatory or libelous;
                                      promotes, copies, performs or distributes an illegal or unauthorized copy of another person’s work that is protected by intellectual property law, such as providing pirated computer programs or links to them, providing information to circumvent manufacturer-installed copy-protection devices, or providing pirated music, videos, or movies, or links to such pirated music, videos, or movies;
                                      is involved in the exploitation of persons under the age of eighteen (18) in a sexual or violent manner, or solicits personal information from anyone under eighteen (18);
                                      provides instructional information about illegal activities such as making or buying illegal weapons, violating someone’s privacy, or providing or creating computer viruses and other harmful code;
                                      solicits passwords or personally identifying information for commercial or unlawful purposes from other Users;
                                      except as expressly approved by Us, involves commercial activities and/or promotions such as contests, sweepstakes, barter, advertising, or pyramid schemes;
                                      contains viruses, Trojan horses, worms, time bombs, cancel bots, corrupted files, or similar software; or
                                      posts or distributes information which would violate any confidentiality, non-disclosure or other contractual restrictions or rights of any third party, including any current or former employers or potential employers; or
                                      otherwise violates the terms of these Terms of Use or creates liability for Us (“Prohibited Content”).
                                      Any use of the website against to TERMS AND CONDITION will definitely result in termination and suspension of account or use of the website.
                                      we have right to delete any content which is not proper or prohibited content, harm, threaten the other user.
                                      You will not attempt to impersonate another User/Traveler or person, including any of our employees. You will use the Services in a manner consistent with any and all applicable laws and regulations.
                                      <br></p>
                                </div>

                                <div class="col-lg-12 about-left">
                                    <h3 class="mt-lg-3"><strong>       INDEMNITY </strong></h3>
                                    <p class="mt-4">

                                      You shall indemnify and hold harmless Vriddh Path Travelling Assistance Pvt. Ltd., its owner, licensee, affiliates, subsidiaries, group companies (as applicable) and their respective officers, directors, agents, and employees, from any claim or demand, or actions including reasonable attorneys’ fees, made by any third party or penalty imposed due to or arising out of Your breach of this Terms of Use, privacy Policy and other Policies, or Your violation of any law, rules or regulations or the rights (including infringement of intellectual property rights) of a third party.
                                      HOW TO CONTACT US
                                      Customer can mail us by on vriddhpath@gmail.com or info@cabnotels.com or can call us on 7518473323 or 8938885822
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
