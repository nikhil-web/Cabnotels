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

		<title>Cabnotels || Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">

		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffdd00">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
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

    <?php
      if ($login_flag == 0) {
        // code...
          echo  "<script> console.log('Session not set')</script>";
      }else {
        echo  "<script> console.log('All Session Variables')</script>";
        foreach ($_SESSION as $key=>$val)
        echo  "<script> console.log('".$key." ".$val."')</script>";
      }

     ?>

		<style>
			.d-flex {
    		display: -webkit-box !important;
   		 display: -ms-flexbox !important;
   		 display: flex !important;
   			 width: min-content;
  			  left: 50%;
   		 position: relative;
   		 transform: translateX(-50%);
}
			.middle{
			position: relative;
    		left: 50%;
    		transform: translateX(-50%);
			}
		.tittle{
			color: #ffdd00;
		}
		/*search box css start here*/
			.search-sec {
				padding: 1rem;
			}

			.search-slt {
				display: block;
  				width: 100%;
  				padding: 0.375rem 0.75rem;
  				font-size: 1rem;
  				line-height: 1.5;
  				color: #495057;
  				background-color: #fff;
 				background-clip: padding-box;
  				border: none;
  				border-radius: 0px;
				height: calc(3rem + 2px) !important;
			}

			.wrn-btn {
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(2.5rem + 2px) !important;
    border-radius: 0;
}

.maximizeChat{
  background: #ffdd00 !important;
color: #3c3c3c !important;
}
			@media (min-width: 992px) {
				.search-sec {
					position: relative;
					background: #3c3c3c;
					height: 100vh;
				}
			}

			@media (max-width: 992px) {
				.search-sec {
					background: #3c3c3c;
				}
			}



		</style>


	</head>

	<body id="home">

		<!-- header -->
		<header id="navbar_color">
			<div class="container">
				<!-- nav -->
				<nav class="py-md-3 py-3 d-lg-flex">
					<div id="logo">
						<div style="width: 65px;"><img src="images/logo.png" alt=""> </div>
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

		<!-- banner -->
		<section class="banner_w3lspvt" id="home">
			<div class="csslider infinity" id="slider1">
				<input type="radio" name="slides" checked="checked" id="slides_1">
				<input type="radio" name="slides" id="slides_2">
				<input type="radio" name="slides" id="slides_3">
				<input type="radio" name="slides" id="slides_4">
				<ul>

          <?php
            $sql_banner = 'SELECT *  FROM frontpage_slider WHERE id = 1';
            $result_banner = mysqli_query($db, $sql_banner);
            if (mysqli_num_rows($result_banner) > 0) {
              // output data of each row
            while($row_banner= mysqli_fetch_assoc($result_banner)) {
              echo '
              <li>
    						<div class="banner-top" style="background: url('.substr($row_banner["image_url"], 3).') no-repeat center;background-size:cover;">
    							<div class="overlay">
    								<div class="container">
    									<div class="w3layouts-banner-info col-xl-8 col-lg-8 col-sm-12  animated fadeIn">
    										<div style="
                        width: 40%;
                        min-width: 300px;
    									left: 50%;
    									position: relative;
    									transform: translate(-50%);
    								">
    											<img src="images/logo.png" alt="">
    										</div>
    										<h4 class="text-wh">';
                        if($login_flag ==1)
                         {
                            echo $_SESSION["first_name"].',';
                         }
                        echo 'Discover The world you have never seen</h4>
    										<div class="buttons mt-4">
                        <a href="#booking" class="btn">Book Now</a>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</li>
              ';
            }
          }
        ?>

            <?php

              $sql_banner = 'SELECT *  FROM frontpage_slider WHERE id > 1';
              $result_banner = mysqli_query($db, $sql_banner);
              if (mysqli_num_rows($result_banner) > 0) {
                // output data of each row
              while($row_banner= mysqli_fetch_assoc($result_banner)) {
                echo '<li>
      						<div class="banner-top" style="background: url('.substr($row_banner["image_url"], 3).') no-repeat center; background-size:cover;">
      							<div class="overlay">
      								<div class="container">
      									<div class="w3layouts-banner-info col-xl-8 col-lg-8 col-sm-12">
      										<h3 class="text-wh">'.$row_banner["heading"].'</h3>
      										<h4 class="text-wh">'.$row_banner["subheading"].'</h4>
      										<div class="buttons mt-4">
      											<a href="about.php" class="btn mr-2">About Us</a>
      											<a href="#booking" class="btn">Book a Tour</a>
      										</div>
      									</div>
      								</div>
      							</div>
      						</div>
      					</li>';
              }
            }
                ?>

				</ul>
				<div class="arrows">
                    <label for="slides_1"></label>
          					<label for="slides_2"></label>
          					<label for="slides_3"></label>
          					<label for="slides_4"></label>
				</div>

			</div>
		</section>
		<!-- banner -->

    <?php
    include 'includes/search.php';
     ?>

  <?php
  if ($login_flag==1) {
    // code...
    include 'includes/gettingstarted_login.php';
  }else{
    include 'includes/gettingstarted_logout.php';
  }
  ?>

		<!-- tour packages -->
		<section id="pakages" class="packages py-5">
			<div class="container py-lg-4 py-sm-3">
				<h3 class="heading text-capitalize text-center mt-5"> Discover our tour packages</h3>
				<p class="text mt-2 mb-5 text-center">Your Dream location Managed By us.</p>
				<div class="row">

          <?php
          $sql = "SELECT * FROM tours WHERE featured = 1";
          $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row= mysqli_fetch_assoc($result)) {
                      echo '
                      <div class="col-lg-3 col-sm-12  pb-4">
                      <div class="images col-lg-12 nopadding">
                          <div class="card">
                              <div id="carouselExampleIndicators_'.$row["tour_id"].'" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">';

                                  $count = 0;
                                  $sql_inner = 'SELECT * FROM tour_images WHERE tour_id = '.$row["tour_id"].' ';
                                  $result_inner = mysqli_query($db, $sql_inner);
                                    if (mysqli_num_rows($result_inner) > 0) {
                                    // output data of each hotel image.
                                      while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                          if($count==0){
                                           echo '
                                           <li data-target="#carouselExampleIndicators_'.$row["tour_id"].'" data-slide-to="'.$count.'" class="active"></li>
                                            ';
                                          }else{
                                           echo '
                                             <li data-target="#carouselExampleIndicators_'.$row["tour_id"].'" data-slide-to="'.$count.'"></li>
                                           ';
                                          }
                                   $count++;
                                   }
                                   }


                                  echo'
                                  </ol>
                                  <div class="carousel-inner" style=" width:100%;">';

                                   $count = 0;
                                  $sql_inner = 'SELECT * FROM tour_images WHERE tour_id = '.$row["tour_id"].' ';
                                   $result_inner = mysqli_query($db, $sql_inner);
                                    if (mysqli_num_rows($result_inner) > 0) {
                                    // output data of each hotel image.
                                      while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                       if($count==0){
                                       echo '
                                       <div class="carousel-item active">
                                       <img class="d-block w-100" src="admin/'.$row_inner["tour_image"].'" alt="'.$count.' slide">
                                       </div>
                                       ';
                                       }else{
                                           echo '
                                           <div class="carousel-item">
                                           <img class="d-block w-100" src="admin/'.$row_inner["tour_image"].'" alt="'.$count.' slide">
                                           </div>
                                           ';
                                       }

                                     $count++;
                                   }
                                   }


                                  echo'</div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators_'.$row["tour_id"].'" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators_'.$row["tour_id"].'" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>
                          </div>
                      </div>
            						<div class="package-info" style="text-align:center;">
            							<h5 class="my-2" class="first-link" style="text-transform:uppercase;">'.$row["tour_name"].'</h5>
            							<p class="">'.$row["tour_loc"].'</p>
            							<ul class="listing mt-3">scroll
                            <li><i class="far fa-clock"></i> Duration : <span>'.$row["tour_days"].' Days</span></li>
            							</ul>
                          <div class="view-package text-center mt-4">
                  					<a href="single.php?type=tour&id='.$row["tour_id"].'">View Details</a>
                  				</div>
            						</div>
            					</div>
                      ';
                    }
                  }
           ?>



				</div>
				<div class="view-package text-center mt-4">
					<a href="tours.php?mode=page" style="background: #3c3c3c;color: #ffffff;" >View All Packages</a>
				</div>
			</div>
		</section>
		<!-- tour packages -->

		<!-- destinations -->
		<section class="destinations py-5" id="destinations">
			<div class="container py-xl-5 py-lg-3">
				<h3 class="heading text-capitalize text-center"> Popular Destinations</h3>
				<p class="text mt-2 mb-5 text-center">Some Of Our Popular Destinations</p>

				<!--Repeating-->
				<div class="row">

          <?php
                                   $sql = 'SELECT * FROM locations_tours ORDER BY loc_name ASC';
                                   $result = mysqli_query($db, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       // output data of each row
                                       $count = 500;
                                      while($row= mysqli_fetch_assoc($result)) {
                                        echo '<div data-aos="fade-right"  data-aos-duration="'.$count.'"  class="col-md-3 col-sm-6 col-6 destinations-grids text-center">
                                          <h4 class="destination mb-3 mt-3">'.$row["loc_name"].'</h4>
                                          <div class="image-position position-relative">';

                                          $sql_inner = 'SELECT * FROM location_image WHERE loc_id = '.$row["loc_id"].'';
                                          $result_inner = mysqli_query($db, $sql_inner);
                                                if (mysqli_num_rows($result_inner) > 0) {
                                                  while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                          echo '<img src="admin/'.$row_inner["image"].'" class="img-fluid" alt="">';
                                          }
                                        }else {
                                          echo '<img src="images/dummy.jpg" class="img-fluid" alt="">';
                                        }

                                        echo ' </div>
                                          <div class="destinations-info">
                                            <div class="caption mb-lg-3">
                                              <h4>'.$row["loc_name"].'</h4>
                                              <a href="tours.php?mode=location&location='.$row["loc_name"].'">View Packages</a>
                                            </div>
                                          </div>
                                        </div>';
                                        $count = $count + 500;
                                    }
                                  }
                          ?>






				</div>
				<!--Repeating-->




			</div>
		</section>
		<!-- destinations -->

		<!-- taxi -->
		<section id="taxi" class="trav-grids py-1 mt-lg-5 pb-5">
		<div class="container py-xl-1 py-lg-1">
		<h3 class="heading text-capitalize text-center">Amazing Cabs</h3>
		<p class="text text-center">GO IN STYLE.</p>

		<div class="row">


      <?php
      $sql = "SELECT * FROM taxi WHERE featured = 1";;
      $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row= mysqli_fetch_assoc($result)) {
                  echo '
                  <div class="col-lg-3 mt-4">
           				<div class="grids-tem-one">
           					<div class="row">
           						<div data-aos="fade-down" data-aos-duration="500" class="col-sm-12 grids-img-left">
                      <div class="card">
                          <div id="carouselExampleIndicators_'.$row["taxi_id"].'" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">';

                              $count = 0;
                              $sql_inner = 'SELECT * FROM taxi_images WHERE taxi_id = '.$row["taxi_id"].' ';
                              $result_inner = mysqli_query($db, $sql_inner);
                                if (mysqli_num_rows($result_inner) > 0) {
                                // output data of each hotel image.
                                  while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                      if($count==0){
                                       echo '
                                       <li data-target="#carouselExampleIndicators_'.$row["taxi_id"].'" data-slide-to="'.$count.'" class="active"></li>
                                        ';
                                      }else{
                                       echo '
                                         <li data-target="#carouselExampleIndicators_'.$row["taxi_id"].'" data-slide-to="'.$count.'"></li>
                                       ';
                                      }
                               $count++;
                               }
                               }


                              echo'
                              </ol>
                              <div class="carousel-inner" style=" width:100%;">';

                               $count = 0;
                              $sql_inner = 'SELECT * FROM taxi_images WHERE taxi_id = '.$row["taxi_id"].' ';
                               $result_inner = mysqli_query($db, $sql_inner);
                                if (mysqli_num_rows($result_inner) > 0) {
                                // output data of each hotel image.
                                  while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                   if($count==0){
                                   echo '
                                   <div class="carousel-item active">
                                   <img class="d-block w-100" src="admin/'.$row_inner["taxi_image"].'" alt="'.$count.' slide">
                                   </div>
                                   ';
                                   }else{
                                       echo '
                                       <div class="carousel-item">
                                       <img class="d-block w-100" src="admin/'.$row_inner["taxi_image"].'" alt="'.$count.' slide">
                                       </div>
                                       ';
                                   }
                                 $count++;
                               }
                               }

                              echo'</div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators_'.$row["taxi_id"].'" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators_'.$row["taxi_id"].'" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                              </a>
                          </div>
                      </div>
           						</div>
           						<div class="col-sm-12 my-3 right-cont">
           							<h4 class="mb-2 let mt-sm-0 mt-2 tm-clr">'.$row["taxi_name"].'</h4>
           							<ul class="d-flex">
           								<li><span class="fa fa-star"></span></li>
           								<li><span class="fa fa-star"></span></li>
           								<li><span class="fa fa-star"></span></li>
           								<li><span class="fa fa-star"></span></li>
           								<li><span class="fa fa-star"></span></li>
           							</ul>
           							<p class="mt-3">Best in class car for long rides,</p>
           							 <a href="single.php?type=taxi&id='.$row["taxi_id"].'"><button type="button" class="btn btn-primary mt-3">Book Now</button></a>
           						</div>
           					</div>
           				</div>
           				</div>
                  ';
                }
              }
       ?>

		</div>
    <div class="view-package text-center mt-5">
      <a href="taxi.php?mode=navbar" style="background: #3c3c3c;color: #ffffff;">View All Cabs</a>
    </div>
		</div>
		</section>

		<!-- taxi -->


    <!-- Reviews -->
	   <?php
     include 'includes/reviews.php';
      ?>
    <!-- reviews -->

<!-- Footer -->
	   <?php
     include 'includes/footer.php';
      ?>
<!-- footer -->
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
                <h2 id="status_message"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


		<!-- move top -->
		<div class="move-top text-right">
			<a href="#home" class="move-top">
				<span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
			</a>
		</div>
		<!-- move top -->


<?php
/*
if ($login_flag==1) {
  // code...
  echo '	<!-- scripts -->
		<script>
			$(function() {
				//caches a jQuery object containing the header element
				var header = $("#navbar_color");
				$(window).scroll(function() {

					scrollspy();
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

			function scrollspy() {
				var winScroll = $(window).scrollTop();
				var height = document.documentElement.scrollHeight;
				height = 2048;
				var scrolled = (winScroll / height) * 100;

				new_scrolled = scrolled+30;

				 //console.log(height);
				 //console.log(winScroll);
				 //console.log("this is scrolled %" + scrolled + "%");
				document.getElementById("car").style.left = new_scrolled + "%";
			}
		</script>
';
}else {
  // code...
  echo '	<!-- scripts -->
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
';
}
*/
 ?>
 <!-- scripts -->
   <script>
     $(function() {
       //caches a jQuery object containing the header element
       var header = $("#navbar_color");
       $(window).scroll(function() {

         scrollspy();
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

     function scrollspy() {
       var winScroll = $(window).scrollTop();
       var height = document.documentElement.scrollHeight;
       height = 2048;
       var scrolled = (winScroll / height) * 100;

       new_scrolled = scrolled+30;

        //console.log(height);
        //console.log(winScroll);
        //console.log("this is scrolled %" + scrolled + "%");
       document.getElementById("car").style.left = new_scrolled + "%";
     }
   </script>

<script>
                $(function() {
                    $('#hotel_search_form').on('submit', function(e) {
                        var $flag_location = 0;
                        var $flag_search = 0;
                        e.preventDefault();
						var str = $("#hotel_search_form" ).serialize();
                        var location_keyword = document.getElementById('location').value;
						var start_keyword = document.getElementById('start_date').value;
						var end_keyword = document.getElementById('end_date').value;
						var adult_keyword = document.getElementById('adult_num').value;
						var child_keyword = document.getElementById('child_num').value;


                        if (location_keyword == '0') {
                            console.log("location empty");
                            $flag_location = 0;
                        } else {
                            $flag_location = 1;
                        }


						if (start_keyword == '') {
                            console.log("start date empty");
                            $flag_startdate = 0;
                        } else {
                            $flag_startdate = 1;
                        }


						if (end_keyword == '') {
                            console.log("End date empty");
                            $flag_enddate = 0;
                        } else {
                            $flag_enddate = 1;
                        }



						if (adult_keyword == '') {
                            console.log("adult empty");
                            $flag_adult = 0;
                        } else {
                            $flag_adult = 1;
                        }

						if (child_keyword == '') {
                            console.log("Child empty");
                            $flag_child = 0;
                        } else {
                            $flag_child = 1;
                        }

						//Logic pro
                        if ($flag_location == 1 && $flag_startdate == 1 && $flag_enddate == 1 && $flag_child == 1 && $flag_child == 1){

                            if (give_diffrence_hotel_date() > 0) {
                              var query = "hotels.php?mode=search&"+ str;
                              window.location.href = query;
                            }else{
                              update_staus_success("Please Select Minimum One Day");
                            }
                        } else {

                            update_staus_success("Please Provide Complete Information");
                        }

                    });
                });


                function give_diffrence_hotel_date(){
                  var checkin  = document.getElementById("start_date").value;
                  var checkout = document.getElementById("end_date").value;

                  const _MS_PER_DAY = 1000 * 60 * 60 * 24;
                  // a and b are javascript Date objects
                  function dateDiffInDays(a, b) {
                    // Discard the time and time-zone information.
                    const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
                    const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

                    return Math.floor((utc2 - utc1) / _MS_PER_DAY);
                    }

                  const a = new Date(checkin),
                  b = new Date(checkout),
                  difference = dateDiffInDays(a, b);
                  console.log(difference);
                  return difference;
                }
                </script>
				</script>


<script>
                $(function() {
                    $('#location_search_form').on('submit', function(e) {
                        var $flag_location = 0;
						var $flag_search = 0;
						var $flag_startdate = 0;
						var $flag_enddate = 0;
                        e.preventDefault();
						var str = $("#location_search_form" ).serialize();
            var location_keyword = document.getElementById('location-tour').value;
						var start_keyword = document.getElementById('tour_start_date').value;
						var num_keyword = document.getElementById('tour_people_count').value;



                        if (location_keyword == '0') {
                            console.log("location empty");
                            $flag_location = 0;
                        } else {
                            $flag_location = 1;
                        }


						if (start_keyword == '') {
                            console.log("start date empty");
                            $flag_startdate = 0;
                        } else {
                            $flag_startdate = 1;
                        }


						if (num_keyword== '0') {
                            console.log("tour_people_count");
                            $flag_enddate = 0;
                        } else {
                            $flag_enddate = 1;
                        }


						//Logic pro
                        if ($flag_location == 1 && $flag_startdate == 1 && $flag_enddate == 1){
                            var query = "tours.php?mode=search&"+ str;
                            window.location.href = query;
                            console.log("Sucess");
                        } else {
                            console.log("NO Location");
                            update_staus_success("Please Provide Complete Information");
                        }

                    });
                });
				</script>

	<script>
                $(function() {
                    $('#taxi_search_form').on('submit', function(e) {
                        var $flag_location = 0;
						var $flag_search = 0;
						var $flag_startdate = 0;
						var $flag_enddate = 0;
                        e.preventDefault();
						var str = $("#taxi_search_form" ).serialize();

                        var start_keyword = document.getElementById('pickup_location').value;
						var end_keyword = document.getElementById('end_location').value;
						var pickup_date = document.getElementById('pickup_date').value;
						var drop_date = document.getElementById('end_date_taxi').value;
						var car_type =  document.getElementById('car_type').value;



                        if (start_keyword == '0') {
                            console.log("start empty");
                            $flag_start_keyword = 0;
                        } else {
                            $flag_start_keyword = 1;
                        }


						if (end_keyword == '0') {
                            console.log("end empty");
                            $flag_end_keyword = 0;
                        } else {
                            $flag_end_keyword = 1;
                        }


						if (pickup_date == '') {
                            console.log("pickup empty");
                            $flag_pickup_date = 0;
                        } else {
                            $flag_pickup_date = 1;
                        }


						if (drop_date == '') {
                            console.log("drop empty");
                            $flag_drop_date = 0;
                        } else {
                            $flag_drop_date = 1;
                        }


						if (car_type == '0') {
                            console.log("cartype empty");
                            $flag_car_type = 0;
                        } else {
                            $flag_car_type = 1;
                        }


						//Logic pro
                        if ($flag_start_keyword == 1 && $flag_end_keyword == 1 && $flag_pickup_date == 1 && $flag_drop_date == 1 && $flag_car_type == 1 ){
                            var query = "taxi.php?mode=search&"+ str;
                            window.location.href = query;
                            console.log("Sucess" + query);
                        } else {
                            console.log("NO Location");
							              update_staus_success("Please Provide Complete Information");
                        }

                    });
                });


                function update_staus_success(message) {
                  $('#modelformessage').modal({
                      keyboard: true
                  });
                    document.getElementById('status_message').innerHTML = message;
                    $("#status_message").removeClass("dangerclass")
                }
				</script>


<script>
AOS.init();
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d57fda7eb1a6b0be607fd35/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
