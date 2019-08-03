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

        <div class="col-lg-3 col-sm-6 footer-grid_section_1its_w3">
          <div class="footer-title">
            <h3>Address</h3>
          </div>
          <div class="footer-text">
            <p>Location : <?php echo $row["location"]; ?></p>
            <p>Phone : +91 <?php echo $row["phonenumber"]; ?></p>
            <p>Email : <a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a></p>

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
            <li class=""><a href=""><i class="fab fa-instagram"></i></a></li>

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
                  <li><a href="contact.php" class="scroll">Terms & Conditions</a></li>
                  <li><a href="contact.php" class="scroll">Privacy Policy</a></li>

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
