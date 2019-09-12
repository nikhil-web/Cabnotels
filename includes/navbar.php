<!-- header -->
<div id="navbar_color" class="col-12 py-2 navigation">
	<div class="hamburger-icon-holder" style="">
		<div id="hamburger" class="hamburger-holder">
			<div id="icon" class="hamburger"> <span class=""><i class="fas fa-bars"></i></span>
			</div>
		</div>
		<div style="
    position: relative;
    width: 60px;
">
			<img src="images/logo.png" alt="" style="width: 100%;">
		</div>
	</div>
	<div class="col-12 inner-nav">
		<div class="logo-holder">
			<a href="./"><img src="images/logo.png" alt="" style="width: 100%;"></a>
			
		</div>
		<div class="combine-links">
			<div class="link-holder"> <a href="./hotels.php?mode=navbar"> Hotels </a>
			</div>
			<div class="link-holder"> <a href="./taxi.php?mode=navbar"> Cabs </a>
			</div>
			<div class="link-holder dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Tours </a>
				<ul class="dropdown-menu">
					<li><a href="./tours.php?mode=page&type=domestic" style="color: #3c3c3c;">Domestic</a>
					</li>
					<li><a href="./tours.php?mode=page&type=international" style="color: #3c3c3c;" >International</a>
					</li>
				</ul>
			</div>

			<?php
		               if ($login_flag == 1) {
		                 // code...
		                 echo '
											 <div class="login-cart">
											 	<div class="link-holder"> <a class="link-active" href="./user.php"> '.$_SESSION["first_name"].' <i class="fas fa-user"></i> </a>
											 	</div>
											 	<div class="link-holder"> <a class="link-active" href="./user.php?query=cart">Cart <i class="fas fa-shopping-cart"></i></a>
											 	</div>
											 </div>
		                 ';
		               }else {
		                 // code...
		                 echo '
										 <div class="login-cart">
											 <div class="link-holder"> <a class="link-active" href="./login.php"> Login </a>
											 </div>
											 <div class="link-holder"> <a class="link-active" href="./signup.php"> Signup </a>
											 </div>
										 </div>
		                 ';
		               }

		              ?>




		</div>
	</div>
</div>
<script>
	document.getElementById("hamburger").addEventListener("click",function (){
	    var x = document.getElementById("navbar_color");
	    var y = document.getElementById("hamburger");

	    x.classList.toggle("expand");
	    y.classList.toggle("rotate");
	  });
</script>
<!-- //header -->
