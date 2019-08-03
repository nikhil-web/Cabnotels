<!-- header -->
<header id="navbar_color">
  <div class="container">
    <!-- nav -->
    <nav class="py-md-3 py-3 d-lg-flex">
      <div id="logo">
        <div style="width: 100px;"><img src="images/logo.png" alt=""> </div>
      </div>
      <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
      <input type="checkbox" id="drop">
      <ul class="menu ml-auto mt-3">
        <li class="active"><a id="nav_links" href="#home">Home</a></li>
        <li class=""><a href="about.php">About Us</a></li>
          <li class=""><a href="contact.php">Contact</a></li>
        <li class=""><a href="#pakages">Tours</a></li>
        <li class=""><a href="hotels.php?mode=navbar">Hotels</a></li>
        <li class=""><a href="#taxi">Cars</a></li>

        <?php
          if ($login_flag == 1) {
            // code...
            echo '
              <li class="booking"><a href="user.php">'.$_SESSION["first_name"].' <i class="fas fa-user"></i></a></li>
            ';
          }else {
            // code...
            echo '
            <li class="booking"><a href="#booking">Book Now</a></li>
            ';
          }

         ?>

      </ul>
    </nav>
    <!-- //nav -->
  </div>
</header>
<!-- //header -->
