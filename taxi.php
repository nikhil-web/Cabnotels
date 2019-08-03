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
  $pickup_location = mysqli_real_escape_string($db,$_GET["pickup_location"]);
  $end_location = mysqli_real_escape_string($db,$_GET["end_location"]);
  $pickup_date = mysqli_real_escape_string($db,$_GET["pickup_date"]);
  $end_date_taxi = mysqli_real_escape_string($db,$_GET["end_date_taxi"]);
  $car_type = mysqli_real_escape_string($db,$_GET["car_type"]);
  $mode_flag = 0;
}else if ($mode == "navbar") {
  // code...
  $mode_flag = 1;
}else{
    header("location:index.php");
}
?>

<html lang="en">

<head>
    <title>Cabnotels | Search </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#ffdd00">
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
    <meta name="theme-color" content="#ffdd00">

    <!-- css files -->
    <link rel="stylesheet" href="css/search_bootstrap_cus.css">
    <link rel="stylesheet" href="css/search.css"> <!-- custom css -->
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
            height: -webkit-fill-available;
            vertical-align: middle;
            cursor: pointer;
            right: 10px;
            position: absolute;
        }

        .center {
            margin: auto;
            margin-top: 10px;
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

  include 'includes/search_taxi.php';

   ?>
    <section id="content">
            <div class="container">

        <div class="row">

          <?php
          include 'includes/side_filter_taxi.php';
           ?>



            <div class="col-lg-9">

                <div style="display: flex;" >

                        <div>
                                <h3>Heading for taxi</h3>
                                <p>Choose Taxi</p>
                        </div>



<span class="center" style="font-size: 1.5em;color: #ffdd00;right: 20px;position: absolute;"><button class="button button5" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: #ffdd00;color: #3c3c3c;">View Rates</button></span>

                </div>

  <?php
    if ($mode_flag==0) {
      // code...
      $sql = "SELECT * FROM taxi WHERE taxi.taxi_loc = '$pickup_location' AND taxi.taxi_type = '$car_type'";
      }else{
      $sql = "SELECT * FROM taxi";
  }

 $result = mysqli_query($db, $sql);
       if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row= mysqli_fetch_assoc($result)) {
           echo '<div class="hotel-card">
           <div class="row">
               <div class="images col-lg-6">
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

               <!--data-->
               <div class="data col-lg-6">
                   <div class="col-lg-12 px-0 pt-3">
                       <div class="col-lg-12">
                            <h3>'.$row["taxi_name"].'</h3>
                       </div>
                       <div class="col-lg-12">
                                  <span>'.$row["taxi_disc"].'</span>
                       </div>

                       <div class="col-lg-12 mt-2">

                           <p>Ameneties</p>

                           <div class="row col-lg-12">

                           ';

                           $sql_inner_amen = 'SELECT * FROM amen_taxi WHERE taxi_id = '.$row["taxi_id"].' LIMIT 4 ';
                           $result_amen = mysqli_query($db, $sql_inner_amen);
                                 if (mysqli_num_rows($result_amen) > 0) {
                                     // output data of each row
                                     while($row_amen= mysqli_fetch_assoc($result_amen)) {

                                       if ((int)$row_amen["status"]==1) {
                                         // code...
                                         echo '
                                               <div class="mr-1 mt-1">
                                                   <button type="button" class="btn btn-light"> '.$row_amen["amen_name"].'</button>
                                               </div>';
                                       }
                                     }
                                   }

                           echo '

                            </div>
                       </div>

                       <div class="col-lg-12 mt-2">
                           <div>
                               <div class="col-lg-12">
                                   <div class="row">
                                       <div class="mr-1 mt-1"><a href="single.php?type=taxi&amp;id='.$row["taxi_id"].'"><button class="button button5" style="background-color: #ffdd00;color: #3c3c3c;">Book Now</button></a></div>
                                       <div class="mr-1 mt-1">
                                          <a href="single.php?type=hotel&amp;id=59"><button class="button button5" style="background: #3c3c3c;">View Details</button></a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!--data-->
           </div>
       </div>';
             }
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



<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
                                  <div class="modal-header">

                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                    <section class="contact">
                                        <div class="container py-lg-5 py-sm-3">
                                          <h2 class="heading text-capitalize text-center mb-sm-5 mb-4">Rate Chart</h2>

                                          <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th scope="col">Service Category</th>
                                                  <th scope="col">Seating Caacity</th>
                                                  <th scope="col">Car</th>
                                                  <th scope="col">Package</th>
                                                  <th scope="col">Price</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row">Local City Tours</th>
                                                    <td>4+1</td>
                                                    <td>Etios/Dzire</td>
                                                    <td>4 Hours 40 Km</td>
                                                    <td>₹900</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Local City Tours</th>
                                                      <td>4+1</td>
                                                      <td>Etios/Dzire</td>
                                                      <td>8 Hours 80 Km</td>
                                                      <td>₹1300</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Local City Tours</th>
                                                      <td>6+1</td>
                                                      <td>Innova/Eartiga</td>
                                                      <td>4 Hours 40 Km</td>
                                                      <td>₹1200</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Local City Tours</th>
                                                      <td>6+1</td>
                                                      <td>Innova/Eartiga</td>
                                                      <td>8 Hours 80 Km</td>
                                                      <td>₹1800</td>
                                                  </tr>

                                                  <tr>
                                                    <th scope="row">Out Station Tours</th>
                                                      <td>4+1</td>
                                                      <td>Etios/Dzire</td>
                                                      <td>₹9/KM</td>
                                                      <td>Extra- TollTax + Parking + State Tax</td>
                                                  </tr>

                                                  <tr>
                                                    <th scope="row">Out Station Tours</th>
                                                      <td>6+1</td>
                                                      <td>Innova/Eartiga</td>
                                                      <td>₹13/KM</td>
                                                      <td>Extra- TollTax + Parking + State Tax</td>
                                                  </tr>

                                                </tbody>
                                              </table>

                                        </div>
                                    </section>
                                    <!-- //Contact -->

                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
  </div>
</div>



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
                            var query = "taxi.php?"+ str;
                            window.location.href = query;
                            console.log("Sucess" + query);
                        } else {
                            console.log("NO Location");
							alert("Less Data")
                        }

                    });
                });
  </script>

</body>

</html>
