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
  $location = mysqli_real_escape_string($db,$_GET["location"]);
  $start_date = mysqli_real_escape_string($db,$_GET["start_date"]);
  $end_date = mysqli_real_escape_string($db,$_GET["end_date"]);
  $adults_num = mysqli_real_escape_string($db,$_GET["adult_num"]);
  $child_num = mysqli_real_escape_string($db,$_GET["child_num"]);
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

    <?php

      if ($mode_flag==0) {
        // code...
        include 'includes/search_hotel_filled.php';
      }else{
        include 'includes/search_hotel.php';
      }

    ?>





    <section id="content">
            <div class="container">

    <div class="row">
      <?php
      include 'includes/side_filter_hotel.php';
       ?>

            <div class="col-lg-9">
                    <div style="display: flex;" >

                            <div>
                                    <h3>Hotels for you</h3>
                                    <p>Choose or view Details</p>
                            </div>

            <span class="center" style="
                             font-size: 1.5em;
                             color: #ffdd00;
                             right: 20px;
                             position: absolute;
            "><i class="fas fa-sliders-h"></i></span>

            </div>

<?php
if ($mode_flag==0) {
  // code...
  $sql = "SELECT * FROM hotels WHERE hotel_loc = '$location'";
}else{
  $sql = "SELECT * FROM hotels";
}

 $result = mysqli_query($db, $sql);
       if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row= mysqli_fetch_assoc($result)) {
           echo '<div class="hotel-card">
           <div class="row">
               <div class="images col-lg-6">
                   <div class="card">
                       <div id="carouselExampleIndicators_'.$row["hotel_id"].'" class="carousel slide" data-ride="carousel">
                           <ol class="carousel-indicators">';

                            $count = 0;
                           $sql_inner = 'SELECT * FROM hotel_images WHERE hotel_id = '.$row["hotel_id"].' ';
                            $result_inner = mysqli_query($db, $sql_inner);
                             if (mysqli_num_rows($result_inner) > 0) {
                             // output data of each hotel image.
                               while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                   if($count==0){
                                    echo '
                                    <li data-target="#carouselExampleIndicators_'.$row["hotel_id"].'" data-slide-to="'.$count.'" class="active"></li>
                                     ';
                                   }else{
                                    echo '
                                      <li data-target="#carouselExampleIndicators_'.$row["hotel_id"].'" data-slide-to="'.$count.'"></li>
                                    ';
                                   }
                            $count++;
                            }
                            }


                           echo'
                           </ol>
                           <div class="carousel-inner" style=" width:100%;">';

                            $count = 0;
                           $sql_inner = 'SELECT * FROM hotel_images WHERE hotel_id = '.$row["hotel_id"].' ';
                            $result_inner = mysqli_query($db, $sql_inner);
                             if (mysqli_num_rows($result_inner) > 0) {
                             // output data of each hotel image.
                               while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                if($count==0){
                                echo '
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="admin/'.$row_inner["hotel_image"].'" alt="'.$count.' slide">
                                </div>
                                ';
                                }else{
                                    echo '
                                    <div class="carousel-item">
                                    <img class="d-block w-100" src="admin/'.$row_inner["hotel_image"].'" alt="'.$count.' slide">
                                    </div>
                                    ';
                                }

                              $count++;
                            }
                            }


                           echo'</div>
                           <a class="carousel-control-prev" href="#carouselExampleIndicators_'.$row["hotel_id"].'" role="button" data-slide="prev">
                               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                               <span class="sr-only">Previous</span>
                           </a>
                           <a class="carousel-control-next" href="#carouselExampleIndicators_'.$row["hotel_id"].'" role="button" data-slide="next">
                               <span class="carousel-control-next-icon" aria-hidden="true"></span>
                               <span class="sr-only">Next</span>
                           </a>
                       </div>
                   </div>
               </div>

               <div class="data col-lg-6 px-0">
                   <div class="col-lg- px-0 pt-3">
                       <div class="col-lg-12">
                           <h3>'.$row["hotel_name"].'</h3>
                       </div>
                       <div class="col-lg-12">
                           <span>'.$row["hotel_add"].'</span>
                       </div>

                       <div class="col-lg-12 mt-2">

                           <p>Ameneties</p>

                           <div class="row col-lg-12">
                           ';

                           $sql_inner_amen = 'SELECT * FROM amen_hotel WHERE hotel_id = '.$row["hotel_id"].' LIMIT 4 ';
                           $result_amen = mysqli_query($db, $sql_inner_amen);
                                 if (mysqli_num_rows($result_amen) > 0) {
                                     // output data of each row
                                     while($row_amen= mysqli_fetch_assoc($result_amen)) {

                                       if ((int)$row_amen["status"]==1) {
                                         // code...
                                         echo '
                                               <div class="mr-1 mt-1">
                                                   <button type="button" class="btn btn-light"> '.$row_amen["amn_name"].'</button>
                                               </div>';
                                       }
                                     }
                                   }

                           echo '</div>
                       </div>

                       <div class="col-lg-12 mt-2">
                           <div>
                               <div class="col-lg-12">
                                   <div class="row">
                                       <div class="mr-1 mt-1">';
                                       if ($mode_flag==0) {
                                         // code...
                                      echo '<a href="single.php?type=hotel&id='.$row["hotel_id"].'&start_date='.$start_date.'&end_date='.$end_date.'&adult_num='.$adults_num.'&child_num='.$child_num.'"><button class="button button5" style="background-color: #ffdd00;color: #3c3c3c;">Book Now</button></a>';
                                       }else{
                                         echo '<a href="single.php?type=hotel&id='.$row["hotel_id"].'"><button class="button button5" style="background-color: #ffdd00;color: #3c3c3c;">Book Now</button></a>';
                                       }
                                       echo'</div>
                                       <div class="mr-1 mt-1">
                                          <a href="single.php?type=hotel&id='.$row["hotel_id"].'"><button class="button button5" style="background: #3c3c3c;">View Details</button></a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
               </div>
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
                            var query = "hotels.php?mode=search&"+ str;
                            window.location.href = query;
                            console.log(query + "Sucess");
                        } else {
                            console.log("NO Location");
							alert("Less Data")
                        }

                    });
                });
				</script>
</body>

</html>
