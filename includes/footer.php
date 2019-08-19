<?php
$sql = "SELECT * FROM contact_page";
$result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        $row= mysqli_fetch_assoc($result);
      }
?>
<!--footer -->
<footer>
  <section class="footer footer_w3layouts_section_1its py-5">
    <div class="container py-lg-4 py-3 p-3">
      <div class="row footer-top">

        <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4 footer-grid_section_1its_w3">
                    <div class="footer-title">
                        <h3>Travel Places</h3>
                    </div>
                    <div class="row">
                        <ul class="col-6 links">
                            <li><a href="#choose" class="scroll">New Zealand </a></li>
                            <li><a href="#overview" class="scroll">Paris, France </a></li>
                            <li><a href="#pricing" class="scroll">Los Angles</a></li>
                            <li><a href="#faq" class="scroll"> Darlington</a></li>
                            <li><a href="#testimonials" class="scroll">Canada </a></li>
                            <li><a href="#contact" class="scroll"> South Africa </a></li>
                        </ul>
                        <ul class="col-6 links">
                            <li><a href="#">Spain </a></li>
                            <li><a href="#">Turkey </a></li>
                            <li><a href="#faq" class="scroll">Europe </a></li>
                            <li><a href="#">Italy </a></li>
                            <li><a href="#">Sweden </a></li>
                        </ul>
                    </div>
                </div>

        <div class="col-lg-3 col-sm-6 footer-grid_section mt-sm-0 mt-4">
          <div class="footer-title">
            <h3>We Are Social</h3>
          </div>
          <div class="footer-text">
            <p>Find Us Here.</p>
          </div>
          <ul class="social_section_1info">
            <li class=""><a href=""><i class="fab fa-facebook-f"></i></a></li>
            <li class=""><a href=""><i class="fab fa-twitter"></i></i></a></li>
            <li class=""><a href="https://www.instagram.com/cabnotels_/?igshid=13y7x5l1p5t4k"><i class="fab fa-instagram"></i></a></li>

          </ul>
        </div>

        <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4 footer-grid_section_1its_w3">
							<div class="footer-title">
								<h3>Quicklinks</h3>
							</div>
							<div class="row">
								<ul class="col-12 links">
									<li><a href="/" class="scroll">Home</a></li>
									<li><a href="about.php" class="scroll">About Us</a></li>
									<li><a href="contact.php" class="scroll">Contact Us</a></li>
                  <li><a href="termsandconditions.php" class="scroll">Terms & Conditions</a></li>
                  <li><a href="privacypolicy.php" class="scroll">Privacy Policy</a></li>

								</ul>
							</div>
						</div>


        <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4 footer-grid_section_1its_w3">
          <div class="footer-title">
            <h3>Newsletter</h3>
          </div>
          <div class="footer-text">
            <p>Subscribe to get latest news and updates from us.</p>
            <form action="#" method="post">
              <input type="email" name="Email" placeholder="Enter your email..." required="">
              <button class="btn1"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              <div class="clearfix"> </div>
            </form>
          </div>
        </div>


      </div>
    </div>
  </section>
</footer>
<!-- //footer -->
