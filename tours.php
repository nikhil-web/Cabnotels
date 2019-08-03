<?php

 include('session.php');
 $login_flag = 0;
 $mode_flag  = 0;
 $mode = mysqli_real_escape_string($db,$_GET["mode"]);

 if($_SESSION['auth'] == false){
   $login_flag = 0;
}else{
  $login_flag = 1;
}


if ($mode == "search") {
  $location = mysqli_real_escape_string($db,$_GET["location-tour"]);
  $start_month = mysqli_real_escape_string($db,$_GET["tour_start_date"]);
  $number_people = mysqli_real_escape_string($db,$_GET["tour_people_count"]);
  $mode_flag = 0;
}else if ($mode == "page") {
  // code...
  $mode_flag = 1;
}else if ($mode == "location") {
  $location = mysqli_real_escape_string($db,$_GET["location"]);
  $mode_flag = 2;
}else{
    header("location:index.php");
}


?>
<html lang="en"><head>
        <title>Cabnotels | Search </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="msapplication-TileColor" content="#ffdd00">
        <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
        <meta name="theme-color" content="#ffdd00">

        <!-- css files -->
        <link rel="stylesheet" href="css/search_bootstrap_cus-travel.css">
        <link rel="stylesheet" href="css/search-travel.css"> <!-- custom css -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!--css files -->

        <!--Script-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Script-->

        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

        <style>

        body{
          font-family: 'Roboto Condensed', sans-serif !important;
        }
            .hamburger {
                width: 50px;
                text-align: center;
                vertical-align: middle;
                cursor: pointer;
                right: 10px;
                position: absolute;
            }

            .center {
                margin: auto;
            }

            .d-flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important;
                width: min-content;
                left: 50%;
                position: relative;
                transform: translateX(-50%);
            }

            .middle {
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }

            .tittle {
                color: #ffdd00;
            }

            /*search box css start here*/
            .search-sec {
                padding: 2rem;
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

            @media (min-width: 992px) {
                .search-sec {
                    position: relative;
                    background: #ffdd00;
                    height: auto;
                }
            }

            @media (max-width: 992px) {
                .search-sec {
                    background: #ffdd00;
                }
            }

        </style>

    </head>

    <body>

      <!-- header -->
      <header id="navbar_color">
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


      <?php

        if ($mode_flag==0) {
          // code...
          include 'includes/search_tour_filled.php';
        }else{
          include 'includes/search_tour.php';
        }

      ?>

        <section id="content">
                <div class="container" style="display: flex;">
                  <?php
                  include 'includes/side_filter_tours.php';
                   ?>

                    <div class="col-lg-9">



<div class="row">
<div class="col-lg-12 nopadding">
                    <div style="display: flex;" >
                            <div>
                                    <h3>Tour Packages</h3>
                                    <p>Choose or view Details</p>
                            </div>

                        <span class="center" style="font-size: 1.5em;color: #ffdd00;right: 20px;position: absolute;"><i class="fas fa-sliders-h"></i></span>

                    </div>
                </div>
<?php

if ($mode_flag==0) {
  // code...
 $sql = "SELECT * FROM tours WHERE tour_loc = '$location'";
}else if($mode_flag == 1){
  $sql = "SELECT * FROM tours";
}else if($mode_flag == 2){
  // code...
  $sql = "SELECT * FROM tours WHERE tour_loc = '$location'";
}


 $result = mysqli_query($db, $sql);
       if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row= mysqli_fetch_assoc($result)) {
           echo '<div class="hotel-card col-sm-6 col-md-4">
                                        <div class="row">
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

                                            <div class="data col-lg-12 nopadding">
                                                    <div class="col-lg-12 pt-3">



                                                    <div class="col-lg-12">
                                                        <h3>'.$row["tour_name"].'</h3>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <p>'.$row["tour_days"].' Days '.$row["tour_nights"].' Nights</p>
                                                    </div>

                                                    <div class="col-lg-12 mt-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mr-1 mt-1">
                                                                        <h3 style="margin-bottom: 1rem ; "><i style="font-size: 20px;" class="fas fa-rupee-sign"> </i> '.$row["tour_price"].'/<i style="font-size: 20px;" class="fas fa-user"></i> </h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="mr-1 mt-1">
                                                                    ';
                                                                    if ($mode_flag==0) {
                                                                      // code...
                                                                   echo '  <a href="single.php?type=tour&id='.$row["tour_id"].'&location-tour='.$location.'&start-month-tour='.$start_month.'&num-people-tour='.$number_people.'">  <button class="button button5" style="background-color: #ffdd00;color: #3c3c3c;">Book Now</button></a>';
                                                                    }else{
                                                                      echo '<a href="single.php?type=tour&id='.$row["tour_id"].'"><button class="button button5" style="background-color: #ffdd00;color: #3c3c3c;">Book Now</button></a>';
                                                                    }
                                                                    echo'
                                                                    </div>
                                                                    <div class="mr-1 mt-1">
                                                                        <a href="single.php?type=tour&id='.$row["tour_id"].'">  <button class="button button5" style="background: #3c3c3c;">View Details</button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                              ';
           }

        }else {
            echo "No Tour Packages Found";
        }

        ?>


                        </div>



                </div>

            </div>
        </section>



        <!-- Footer -->
        	   <?php
             include 'includes/footer.php';
              ?>
        <!-- footer -->


        <script>
            $('.carousel').carousel({
                interval: 5000
            })

        </script>


        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }

            const hamburger = document.getElementById("ham_opn");
            const close = document.getElementById("ham_cl");
            const search_unit = document.getElementById("booking");

            function  show(){
                console.log("show Karega");
                hamburger.style.display="none";
                close.style.display="block";
                search_unit.style.display = "block";
            }

            function hide(){
                console.log("hide karega");
                 hamburger.style.display="block";
                 close.style.display="none";
                 search_unit.style.display = "none";
            }



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
        							alert("Less Data")
                                }

                            });
                        });
        				</script>

    </body>
</html>
