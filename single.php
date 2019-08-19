<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
   //header("location:login.php");
}else{
  $login_flag = 1;
}

$type = mysqli_real_escape_string($db,$_GET["type"]);
$id = mysqli_real_escape_string($db,$_GET["id"]);
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
      background: #f5f5f5;
    }

    ul.timeline {
        list-style-type: none;
        position: relative;
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
        padding-left: 20px;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #ffdd00;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
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

<body onload="updatePrice()">

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
if ($type == 'hotel') {
  // code...
  include 'includes/search_hotel.php';
  $sql = "SELECT * FROM hotels WHERE hotel_id = '$id'";

  $adults_num = 1;

  if(isset($_GET["start_date"])){
      $start_date = mysqli_real_escape_string($db,$_GET["start_date"]);
  }else{
    $start_date = "";
  }
  if(isset($_GET["end_date"])){
    $end_date = mysqli_real_escape_string($db,$_GET["end_date"]);
  }else{
    $end_date = "";
  }
  if(isset($_GET["adult_num"])){
    $adults_num = mysqli_real_escape_string($db,$_GET["adult_num"]);

   $number_people = (int)$adults_num;
    if ($number_people%3==0) {
      // code..
      $number_room = $number_people/3;
    }else {
      // code...
      $number_room = $number_people/3+0.33;
    }
    $number_room = round($number_room);
  }else {
    $number_room = 1;
    $number_people = 1;
  }
  if(isset($_GET["child_num"])){
    $child_num = mysqli_real_escape_string($db,$_GET["child_num"]);
  }else {
    $child_num = 0;
  }

}else if ($type == 'tour') {
  // code...

$location = "";

  if(isset($_GET["location-tour"])){
    $location = mysqli_real_escape_string($db,$_GET["location-tour"]);
  }

$start_month ="";

  if(isset($_GET["start-month-tour"])){
    $start_month = mysqli_real_escape_string($db,$_GET["start-month-tour"]);
  }else{
    $start_month = "Select..";
  }
$number_people_tour = "";
  if(isset($_GET["num-people-tour"])){
    $number_people_tour = mysqli_real_escape_string($db,$_GET["num-people-tour"]);
  }else{
    $number_people_tour = 1;
  }
  include 'includes/search_tour.php';
  $sql = "SELECT * FROM tours WHERE tour_id = '$id'";
}else if($type == 'taxi'){
  // code...
  include 'includes/search_taxi.php';
  $sql = "SELECT * FROM taxi WHERE taxi_id = '$id'";
}
$result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row= mysqli_fetch_assoc($result);
      }
?>




<section id="content">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                  <div style="display: flex;" >

                          <div>
                            <?php
                            if ($type == 'hotel') {
                              // code...
                              echo '<h3>'.$row["hotel_name"].'</h3>
                              <p>'.$row["hotel_add"].'</p>
                              ';
                          }else if ($type == 'tour') {
                              // code...
                              echo '<h3>'.$row["tour_name"].'</h3>
                                <p>'.$row["tour_loc"].'</p>';
                            }else if($type == 'taxi'){
                              // code...
                              echo '<h3>'.$row["taxi_name"].'</h3>';
                            }
                            ?>

                          </div>
                </div>
          <?php
          //hotelsection
          if ($type == 'hotel') {
            // code...
                    echo '
                    <div class="row">
                        <div class="images col-lg-8">
                            <div class="card">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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


                                    echo'</ol>
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
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="container">
                                              <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12 px-0 mx-0">
                                                 <div class="page-header">
                                                    <h3 class="mb-3">'.$row["hotel_name"].'</h3>
                                                    <p style="text-align:justify;">'.$row["hotel_about"].'</p>
                                                 </div>
                                              </div>
                                              <!--amenities-->
                                                <div class="col-12 mt-2 my-3 p-1">
                                                    <p>Ameneties</p>

                                                    <div class="row col-lg-12">
                                                    ';

                                                    $sql_inner_amen = 'SELECT * FROM amen_hotel WHERE hotel_id = '.$row["hotel_id"].' ';
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

                                                 echo '
                                                    </div>
                                                </div>
                                              <!--amenities-->
                                </div>
                              </div>
                                <hr>
                        </div>


                        <div class="data col-lg-4"><!--main-->
                            <div class="row p-3"><!--row-->


                            <!--Checkin -->
                              <div class="col-6 p-1 my-1">
                                <div class="form-group">
                                  <label for="number">Check in</label>
                                  <input type="date" class="form-control" id="checkin" name="checkin" placeholder="Check in" value='.$start_date.' required>
                                  <small class="form-text">Your Check in Date (mm/dd/yyy).</small>
                                  </div>
                              </div>
                              <!--Checkin-->

                              <!--Checkout -->
                                <div class="col-6 p-1 my-1">
                                  <div class="form-group">
                                    <label for="number">Check out</label>
                                    <input type="date" class="form-control" id="checkout" name="checkout" placeholder="Check out" value='.$end_date.' required>
                                    <small class="form-text">Your Check out Date (mm/dd/yyy).</small>
                                    </div>
                                </div>
                                <!--Checkout-->

                                <!--Rooms-->
                                  <div class="col-6 p-1 my-1">
                                    <div class="form-group">
                                    <label for="room_count">Rooms</label>
                                    <select onchange="update_price_hotel(this,'.$row["hotel_id"].',1);" class="form-control" id="room_count" name="room_count">
                                    <option value="'.$number_room.'">'.$number_room.'</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                      <small class="form-text">Number Of Rooms.</small>
                                    </div>
                                  </div>
                                <!--Rooms-->


                            <!--People -->
                              <div class="col-6 p-1 my-1">
                                <div class="form-group">
                                  <label for="adult_count">Number Of People</label>
                                  <select onchange="update_price_hotel(this,'.$row["hotel_id"].',0);" class="form-control" id="adult_count" name="adult_count">
                                    <option value="'.$number_people.'" >'.$number_people.'</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                  </select>
                                  <small class="form-text">Please Provide Number Of People.</small>
                                  </div>
                              </div>
                              <!--People-->

                              <!--Buttons-->
                              <div class="col-lg-12 my-0">
                                    <div class="row">
                                        <div class="col-12 p-1">
                                            <button id="button_to_click_for_hotel_price" onclick="update_price_hotel(adult_count,'.$row["hotel_id"].',0)" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Calculate Price</button>
                                        </div>
                                    </div>
                              </div>
                              <!--Buttons-->





                              <div class="col-lg-12 mt-2">
                                                    <div class="row ">
                                                    <hr class="col-lg-12 px-3" style="color:#dddddd; ">

                                                              <div class="col-6">
                                                                    <div class="mr-1 mt-1">
                                                                        <h2 style="margin: 0;"> <span id="price_hotel"> Loading.. </span> ₹ </h2>
                                                                      <p>Total Price </p>
                                                                     </div>
                                                                </div>
                                                                <div class="col-6">
                                                                      <div class="mr-1 mt-1">
                                                                          <h3 style="margin: 0;"> <span id="price_hotel_perhead"> Loading.. </span> ₹  </h3>
                                                                        <p>Price for: 1 Guest, 1 Night</p>
                                                                       </div>
                                                                  </div>
                                                <hr class="col-lg-12 px-3" style="color:#dddddd; ">

                                          </div>
                                </div>

                              <!--Buttons-->
                              <div class="col-lg-12 my-0">
                                    <div class="row">
                                        <div class="col-6 p-1">
                                            <button onclick="addtocart_hotel('.$row["hotel_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Book Now</button>
                                        </div>
                                        <div class="col-6 p-1">
                                            <button onclick="show_contact_hotel()" class="button button5" style="background: #3c3c3c;width: 100%;">Contact Now</button>
                                        </div>
                                    </div>
                              </div>
                              <!--Buttons-->


                                  </div><!--row-->
                              </div><!--main-->


                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="modelforcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                  <section class="contact">
                                      <div class="container py-lg-5 py-sm-3">
                                          <h2 class="heading text-capitalize text-center mb-sm-5 mb-4"> Get In Touch with us</h2>
                                          <ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">

                                              <li class="col-md-12 col-sm-12 adress-w3pvt-info mt-sm-0 mt-4">
                                                  <div class="adress-icon">
                                                    <span class="fa fa-envelope-open"></span>
                                                  </div>
                                                  <h6>Phone & Email</h6>
                                                  <p>+91 '.$row["hotel_number"].'</p>
                                                  <a href="mailto:'.$row["hotel_email"].'" class="mail">'.$row["hotel_email"].'</a>
                                              </li>

                                          </ul>


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


</script>

                    ';
//taxi
          }else if ($type == 'taxi') {
            // code...

                    echo '
                    <div class="row">
                        <div class="images col-lg-8">
                            <div class="card">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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


                                    echo'</ol>
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
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="container">
                                            <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12 px-0 mx-0">
                                                <div class="page-header">
                                                <h3 class="mb-3">'.$row["taxi_name"].'</h3>
                                                <p style="text-align:justify;">'.$row["taxi_disc"].'.</p>
                                            </div>
                                    </div>
                                </div>
                              </div>
                                <hr>
                        </div>

                        <div class="data col-lg-4"><!--main-->

                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Single Day</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Outstation</a>
                          </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">

                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                           <div class="row p-3"><!--row-->
                              <!--Checkin -->
                                <div class="col-6 p-1 my-1">
                                  <div class="form-group">
                                    <label for="number">Pickup Date</label>
                                    <input type="date" class="form-control" id="checkin" name="checkin" placeholder="Check in" value="required">
                                    <small class="form-text">Your Check in Date (mm/dd/yyy).</small>
                                    </div>
                                </div>
                                <!--Checkin-->

                                <!--Time Pickup -->
                                  <div class="col-3 p-1 my-1">
                                    <div class="form-group">
                                      <label for="number">Time</label>
                                      <select class="form-control" id="pickup_time" name="pickup_time">
                                        <option >00:00</option>
                                        <option >01:00</option>
                                        <option >02:00</option>
                                        <option >03:00</option>
                                        <option >04:00</option>
                                        <option >05:00</option>
                                        <option >06:00</option>
                                        <option >07:00</option>
                                        <option >08:00</option>
                                        <option >09:00</option>
                                        <option >10:00</option>
                                        <option >11:00</option>
                                        <option >12:00</option>
                                      </select>
                                      <small class="form-text">Select Pickup Time</small>
                                      </div>
                                  </div>
                                  <!--Time Pickup -->

                                  <!--Time Pickup -->
                                    <div class="col-3 p-1 my-1">
                                      <div class="form-group">
                                        <label for="number">AM/PM</label>
                                        <select class="form-control" id="pickup_ampm" name="pickup_ampm">
                                          <option >AM</option>
                                          <option >PM</option>
                                        </select>
                                        <small class="form-text">AM/PM</small>
                                        </div>
                                    </div>
                                    <!--Time Pickup -->

                                  <!--pickup_location -->
                                    <div class="col-12 p-1 my-1">
                                      <div class="form-group">
                                        <label for="number">Pickup Location</label>
                                        <select class="form-control" id="pickup_location" name="pickup_location" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction" >
                                            <option value="0">Select..</option>';

                                                                 $sql_inner_location = 'SELECT * FROM locations ORDER BY loc_name ASC';
                                                                 $result_inner_location = mysqli_query($db, $sql_inner_location);
                                                                  if (mysqli_num_rows($result_inner_location) > 0) {
                                                                     // output data of each row
                                                                    while($row_inner_location= mysqli_fetch_assoc($result_inner_location)) {
                                                                      echo ' <option>'.$row_inner_location["loc_name"].'</option>';
                                                                      }
                                                                    }

                                        echo '</select>
                                        <small class="form-text">Your Pickup location.</small>
                                        </div>
                                    </div>
                                    <!--pickup_location -->



                                <div class="col-lg-12 mt-2">
                                                      <div class="row ">
                                                                <div class="col-6">
                                                                      <div class="mr-1 mt-1">
                                                                          <h1 style="margin: 0;">  '.$row["taxi_price"].'  </h1>
                                                                        <p>Per KM</p>
                                                                  </div>
                                                            </div>
                                                  <hr class="col-lg-12 px-3" style="color:red; ">

                                            </div>
                                  </div>

                                <!--Buttons-->
                                <div class="col-lg-12 my-0">
                                      <div class="row">
                                          <div class="col-6 p-1">
                                          <button onclick="addtocart_taxi('.$row[".taxi_id."].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Book Now</button>
                                          </div>
                                          <div class="col-6 p-1">
                                              <button onclick="show_contact_taxi()" class="button button5" style="background: #3c3c3c;width: 100%;">Contact Now</button>
                                          </div>
                                      </div>
                                </div>
                                <!--Buttons-->

                                          <!--amenities-->
                                            <div class="col-12 mt-2 my-3 p-1">
                                                <p>Ameneties</p>

                                                <div class="row col-lg-12">

                                                                    <div class="mr-1 mt-1">
                                                                        <button type="button" class="btn btn-light"> Elevetor</button>
                                                                    </div>
                                                                    <div class="mr-1 mt-1">
                                                                        <button type="button" class="btn btn-light"> Wifi</button>
                                                                    </div>
                                                                    <div class="mr-1 mt-1">
                                                                        <button type="button" class="btn btn-light"> Laundry</button>
                                                                    </div>
                                                </div>
                                            </div>
                                          <!--amenities-->
                                    </div><!--row-->
                                    </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                          <div class="row p-3"><!--row-->
                             <!--Checkin -->
                               <div class="col-6 p-1 my-1">
                                 <div class="form-group">
                                   <label for="number">Pickup Date</label>
                                   <input type="date" class="form-control" id="checkin" name="checkin" placeholder="Check in" value="required">
                                   <small class="form-text">Your Pick UP Date (mm/dd/yyy).</small>
                                   </div>
                               </div>
                               <!--Checkin-->

                               <!--Time Pickup -->
                                 <div class="col-3 p-1 my-1">
                                   <div class="form-group">
                                     <label for="number">Time</label>
                                     <select class="form-control" id="pickup_time" name="pickup_time">
                                       <option >00:00</option>
                                       <option >01:00</option>
                                       <option >02:00</option>
                                       <option >03:00</option>
                                       <option >04:00</option>
                                       <option >05:00</option>
                                       <option >06:00</option>
                                       <option >07:00</option>
                                       <option >08:00</option>
                                       <option >09:00</option>
                                       <option >10:00</option>
                                       <option >11:00</option>
                                       <option >12:00</option>
                                     </select>
                                     <small class="form-text">Select Pickup Time</small>
                                     </div>
                                 </div>
                                 <!--Time Pickup -->

                                 <!--Time Pickup -->
                                   <div class="col-3 p-1 my-1">
                                     <div class="form-group">
                                       <label for="number">AM/PM</label>
                                       <select class="form-control" id="pickup_ampm" name="pickup_ampm">
                                         <option >AM</option>
                                         <option >PM</option>
                                       </select>
                                       <small class="form-text">AM/PM</small>
                                       </div>
                                   </div>
                                   <!--Time Pickup -->

                                   <!--Checkin -->
                                     <div class="col-6 p-1 my-1">
                                       <div class="form-group">
                                         <label for="number">Drop Date</label>
                                         <input type="date" class="form-control" id="leave_car_date" name="leave_car_date" placeholder="Check in" value="required">
                                         <small class="form-text">Your Drop Date (mm/dd/yyy).</small>
                                         </div>
                                     </div>
                                     <!--Checkin-->

                                     <!--Time Pickup -->
                                       <div class="col-3 p-1 my-1">
                                         <div class="form-group">
                                           <label for="number">Time</label>
                                           <select class="form-control" id="leave_car_time" name="leave_car_time">
                                             <option >00:00</option>
                                             <option >01:00</option>
                                             <option >02:00</option>
                                             <option >03:00</option>
                                             <option >04:00</option>
                                             <option >05:00</option>
                                             <option >06:00</option>
                                             <option >07:00</option>
                                             <option >08:00</option>
                                             <option >09:00</option>
                                             <option >10:00</option>
                                             <option >11:00</option>
                                             <option >12:00</option>
                                           </select>
                                           <small class="form-text">Select Drop Time</small>
                                           </div>
                                       </div>
                                       <!--Time Pickup -->

                                       <!--Time Pickup -->
                                         <div class="col-3 p-1 my-1">
                                           <div class="form-group">
                                             <label for="number">AM/PM</label>
                                             <select class="form-control" id="leave_car_ampm" name="leave_car_ampm">
                                               <option >AM</option>
                                               <option >PM</option>
                                             </select>
                                             <small class="form-text">AM/PM</small>
                                             </div>
                                         </div>
                                         <!--Time Pickup -->

                                 <!--pickup_location -->
                                   <div class="col-12 p-1 my-1">
                                     <div class="form-group">
                                       <label for="number">Pickup Location</label>
                                       <select class="form-control" id="pickup_location" name="pickup_location" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction" >
                                           <option value="0">Select..</option>';

                                                                $sql_inner_location = 'SELECT * FROM locations ORDER BY loc_name ASC';
                                                                $result_inner_location = mysqli_query($db, $sql_inner_location);
                                                                 if (mysqli_num_rows($result_inner_location) > 0) {
                                                                    // output data of each row
                                                                   while($row_inner_location= mysqli_fetch_assoc($result_inner_location)) {
                                                                     echo ' <option>'.$row_inner_location["loc_name"].'</option>';
                                                                     }
                                                                   }

                                       echo '</select>
                                       <small class="form-text">Your Pickup location.</small>
                                       </div>
                                   </div>
                                   <!--pickup_location -->

                                    <!--pickup_location -->
                                   <div class="col-12 p-1 my-1">
                                     <div class="form-group">
                                       <label for="number">Drop Location</label>
                                       <select class="form-control" id="leave_car_location" name="leave_car_location" placeholder="Drop Location" aria-placeholder="Enter the pickup loaction" >
                                           <option value="0">Select..</option>';

                                                                $sql_inner_location = 'SELECT * FROM locations ORDER BY loc_name ASC';
                                                                $result_inner_location = mysqli_query($db, $sql_inner_location);
                                                                 if (mysqli_num_rows($result_inner_location) > 0) {
                                                                    // output data of each row
                                                                   while($row_inner_location= mysqli_fetch_assoc($result_inner_location)) {
                                                                     echo ' <option>'.$row_inner_location["loc_name"].'</option>';
                                                                     }
                                                                   }

                                       echo '</select>
                                       <small class="form-text">Your Drop location.</small>
                                       </div>
                                   </div>
                                   <!--pickup_location -->



                               <div class="col-lg-12 mt-2">
                                                     <div class="row ">
                                                               <div class="col-6">
                                                                     <div class="mr-1 mt-1">
                                                                         <h1 style="margin: 0;">  '.$row["taxi_price"].'  </h1>
                                                                       <p>Per KM</p>
                                                                 </div>
                                                           </div>
                                                 <hr class="col-lg-12 px-3" style="color:red; ">

                                           </div>
                                 </div>

                               <!--Buttons-->
                               <div class="col-lg-12 my-0">
                                     <div class="row">
                                         <div class="col-6 p-1">
                                             <button onclick="addtocart_taxi('.$row[".taxi_id."].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Book Now</button>
                                         </div>
                                         <div class="col-6 p-1">
                                             <button onclick="show_contact_taxi()" class="button button5" style="background: #3c3c3c;width: 100%;">Contact Now</button>
                                         </div>
                                     </div>
                               </div>
                               <!--Buttons-->

                                         <!--amenities-->
                                           <div class="col-12 mt-2 my-3 p-1">
                                               <p>Ameneties</p>

                                               <div class="row col-lg-12">

                                                                   <div class="mr-1 mt-1">
                                                                       <button type="button" class="btn btn-light"> Elevetor</button>
                                                                   </div>
                                                                   <div class="mr-1 mt-1">
                                                                       <button type="button" class="btn btn-light"> Wifi</button>
                                                                   </div>
                                                                   <div class="mr-1 mt-1">
                                                                       <button type="button" class="btn btn-light"> Laundry</button>
                                                                   </div>
                                               </div>
                                           </div>
                                         <!--amenities-->
                                   </div><!--row-->


                          </div>
                        </div>

                                </div><!--main-->

                            </div>
                        </div>
                    </div>
                    ';

//toursection
          }else if($type == 'tour'){
            // code...

                    echo '
                    <div class="row">
                        <div class="images col-lg-8">
                            <div class="card">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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


                                    echo'</ol>
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
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="container">
                                            <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12 px-0 mx-0">
                                                <div class="page-header">
                                                <h3 class="mb-3">'.$row["tour_name"].'</h3>

                                                <p style="text-align:justify;">'.$row["tour_about"].'</p>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                          <div class = "row">
                            <div class = "container">
                            <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12 mt-3 px-0 mx-0">
                            <h3 class="mb-3">Schedule</h3>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';
                                $count = 0;

                                for ($i=0; $i < (int)$row["num_days"]; $i++) {
                                  // code...
                                  if ($i == 0) {
                                    // code...
                                    echo '
                                    <li class="nav-item mr-1">
                                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab_'.$i.'" role="tab" aria-controls="pills-home" aria-selected="true">Day '. ++$count .'</a>
                                    </li>';
                                  }else {
                                    echo '
                                    <li class="nav-item mr-1">
                                      <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#tab_'.$i.'" role="tab" aria-controls="pills-home" aria-selected="true">Day '.++$count.'</a>
                                    </li>';
                                  }
                                }
                                echo '</ul>
                                <div class="tab-content" id="pills-tabContent">';
                                $count = 0;
                                for ($i=0; $i < (int)$row["num_days"]; $i++) {
                                  // code...
                                    if ($i == 0) {
                                  echo '
                                  <div class="tab-pane fade show active" id="tab_'.$i.'" role="tabpanel" aria-labelledby="pills-contact-tab">

                                      <ul class="timeline">';

                                      $sql_timeline = 'SELECT * FROM timeline WHERE timeline.tour_id = '.$row["tour_id"].' AND timeline.day = '.$i.'';

                                      $result_timeline = mysqli_query($db, $sql_timeline);
                                       if (mysqli_num_rows($result_timeline) > 0) {
                                       // output data of each hotel image.
                                         while($row_timeline= mysqli_fetch_assoc($result_timeline)) {
                                           echo '
                                           <li>
                                           <h5>'.$row_timeline["point_heading"].' <!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                                           <p>'.$row_timeline["point_content"].'</p>
                                          </li>
                                           ';

                                         }
                                       }

                                    echo' </ul>
                                  </div>
                                  ';
                                }else {
                                  echo '
                                  <div class="tab-pane fade" id="tab_'.$i.'" role="tabpanel" aria-labelledby="pills-contact-tab">

                                      <ul class="timeline">';


                                      $sql_timeline = 'SELECT * FROM timeline WHERE timeline.tour_id = '.$row["tour_id"].' AND timeline.day = '.$i.'';

                                      $result_timeline = mysqli_query($db, $sql_timeline);
                                       if (mysqli_num_rows($result_timeline) > 0) {
                                       // output data of each hotel image.
                                         while($row_timeline= mysqli_fetch_assoc($result_timeline)) {
                                           echo '
                                           <li>
                                            <h5>'.$row_timeline["point_heading"].'<!--	<span href="#" class="float-right">21 March, 2014</span> --></h5>
                                            <p>'.$row_timeline["point_content"].'</p>
                                          </li>
                                           ';

                                         }
                                       }
                                    echo'</ul>
                                  </div>
                                  ';
                                }
                                }
                                echo'</div>
                            </div>
                            </div>
                          </div>

                        </div>

                        <div class="data col-lg-4"><!--main-->
                                    <div class="row p-3"><!--row-->

                                      <!--People -->
                                      <div class="col-6 p-1 my-1">
                                        <div class="form-group">
                                        <label for="">(Adults: 12+ years)</label>
                                        <select onchange="update_options_tour('.$row["tour_id"].');" class="form-control" id="tour_adult_count" name="tour_adult_count">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                        </select>
                                          <small class="form-text">Number Of Adults(12+ years);.</small>
                                        </div>
                                      </div>
                                        <!--People-->

                                      <!--People -->
                                      <div class="col-6 p-1 my-1">
                                        <div class="form-group">
                                        <label for="">(Children: 3-11years)</label>
                                        <select onchange="update_options_tour('.$row["tour_id"].');" class="form-control" id="tour_child_count" name="tour_child_count">
                                          <option value="0">0</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                        </select>
                                          <small class="form-text">Number Of Childern(3-11 ).</small>
                                        </div>
                                      </div>
                                        <!--People-->



                                        <!--Cab Type -->
                                      <div class="col-6 p-1 my-1">
                                        <div class="form-group">
                                        <label for="tour_cab_type">3. Select Cab Type</label>
                                        <select class="form-control" id="tour_cab_type" name="tour_cab_type" requierd disabled>
                                          <option value="">Select..</option>
                                        </select>
                                          <small class="form-text">Your Preferd Cab.</small>
                                        </div>
                                      </div>
                                        <!--Cab Type-->



                                        <!--Hotel Type -->
                                      <div class="col-6 p-1 my-1">
                                        <div class="form-group">
                                        <label for="tour_hotel_type">4. Select Room Type</label>
                                        <select class="form-control" id="tour_hotel_type" name="tour_hotel_type" requierd>
                                          <option value="2">2 Star Accomodation</option>
                                          <option value="3">3 Star Accomodation</option>
                                          <option value="4">4 Star Accomodation</option>
                                          <option value="5">5 Star Accomodation</option>
                                        </select>
                                          <small class="form-text">Your Preferd Hotel.</small>
                                        </div>
                                      </div>
                                        <!--Hotel Type-->

                                        <!--Start date -->
                                        <div class="col-4 p-1 my-1">
                                        <div class="form-group">
                                        <label for="tour_start_date">Date</label>
                                        <select class="form-control" id="tour_start_date" name="tour_start_date">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                          <option value="11">11</option>
                                          <option value="12">12</option>
                                          <option value="13">13</option>
                                          <option value="14">14</option>
                                          <option value="15">15</option>
                                          <option value="16">16</option>
                                          <option value="17">17</option>
                                          <option value="18">18</option>
                                          <option value="19">19</option>
                                          <option value="20">20</option>
                                          <option value="21">21</option>
                                          <option value="22">22</option>
                                          <option value="23">23</option>
                                          <option value="24">24</option>
                                          <option value="25">25</option>
                                          <option value="26">26</option>
                                          <option value="27">27</option>
                                          <option value="28">28</option>
                                          <option value="29">29</option>
                                          <option value="30">30</option>
                                          <option value="31">31</option>

                                        </select>
                                          <small class="form-text">Your Preferd Date</small>
                                        </div>
                                      </div>


                                        <div class="col-4 p-1 my-1">
                                          <div class="form-group">
                                            <label for="tour_start_month">Month</label>
                                            <select class="form-control" id="tour_start_month" name="tour_start_month" requierd>
                                             <option  value="Janaury" >Janaury</option>
                                             <option  value="February" >February</option>
                                             <option  value="March" >March</option>
                                             <option  value="April" >April</option>
                                             <option  value="May" >May</option>
                                             <option  value="June" >June</option>
                                             <option  value="July" >July</option>
                                             <option  value="August">August</option>
                                             <option  value="September">September</option>
                                             <option  value="October">October</option>
                                             <option  value="November">November</option>
                                             <option  value="December">December</option>
                                            </select>

                                            <small class="form-text">Your Preferd Month.</small>
                                            </div>
                                        </div>

                                        <div class="col-4 p-1 my-1">
                                        <div class="form-group">
                                          <label for="tour_start_year">Year</label>
                                          <select class="form-control" id="tour_start_year" name="tour_start_year" requierd>
                                          <option  value="2019" >2019</option>
                                          <option  value="2020" >2020</option>
                                          <option  value="2021" >2021</option>
                                         </select>
                                          <small class="form-text">Your Preferd Year.</small>
                                          </div>
                                      </div>
                                        <!--Start date-->

                                        <!--Buttons-->
                                        <div class="col-lg-12 my-0">
                                              <div class="row">
                                                  <div class="col-12 p-1">
                                                      <button onclick="update_price_tour('.$row["tour_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Calculate Price</button>
                                                  </div>
                                              </div>
                                        </div>
                                        <!--Buttons-->

                                        <hr class="col-lg-12 px-3" style="color:red; ">


                            <!--Details-->
                                <div class="col-lg-12 mt-2">
                                    <div class="row ">

                                    <div class="col-3">
                                        <div class="mr-1 mt-1">
                                            <h1 style="margin: 0;">'.$row["tour_days"].'</h1>
                                            <p>Days</p>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mr-1 mt-1">
                                            <h1 style="margin: 0;">'.$row["tour_nights"].'</h1>
                                            <p>Nights</p>
                                        </div>
                                    </div>

                                      <div class="col-6">
                                          <div class="mr-1 mt-1">
                                              <h1 style="margin: 0;"> <span id="price_tour" > ------ </span> </h1>
                                              <p>Total Price</p>
                                          </div>
                                      </div>
                                        <hr class="col-lg-12 px-3" style="color:red; ">
                                    </div>
                                  </div>
                            <!--Details-->

                                        <!--Buttons-->
                                        <div class="col-lg-12 my-0">
                                              <div class="row">
                                                  <div class="col-6 p-1">
                                                      <button id="book_button" onclick="addtocart_tour('.$row["tour_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Book Now</button>
                                                  </div>
                                                  <div class="col-6 p-1">
                                                      <button class="button button5" style="background: #3c3c3c;width: 100%;">Contact Now</button>
                                                  </div>
                                              </div>
                                        </div>
                                        <!--Buttons-->
                                        <hr class="col-lg-12 px-3" style="color:red; ">
                                  <div class="col-lg-12 my-2">
                                      <div class = "row">
                                          <h5>Includes</h5>
                                      </div>
                                      <div class="row">
                                        <div class="col-12 p-1">';

                                        $sql_includes = 'select * from included WHERE tour_id = '.$row["tour_id"].'';
                                        $result_includes = mysqli_query($db, $sql_includes);
                                        $counting = 0;
                                         if (mysqli_num_rows($result_includes) > 0) {
                                            $counting = 0;
                                         // output data of each hotel image.
                                           while($row_includes= mysqli_fetch_assoc($result_includes)) {

                                            echo '<button type="button" class="btn btn-light mb-2 mr-2">'.$row_includes["name"].'</button>';
                                           }
                                         }



                                        echo '</div>
                                      </div>
                                  </div>

                                  <hr class="col-lg-12 px-3" style="color:red; ">
                            <div class="col-lg-12 my-2">
                                <div class = "row">
                                    <h5>Excludes</h5>
                                </div>
                                <div class="row">
                                  <div class="col-12 p-1">';

                                  $sql_includes = 'select * from exclude WHERE tour_id = '.$row["tour_id"].'';
                                  $result_includes = mysqli_query($db, $sql_includes);
                                  $counting = 0;
                                   if (mysqli_num_rows($result_includes) > 0) {
                                      $counting = 0;
                                   // output data of each hotel image.
                                     while($row_includes= mysqli_fetch_assoc($result_includes)) {

                                      echo '<button type="button" class="btn btn-light mb-2 mr-2">'.$row_includes["name"].'</button>';
                                     }
                                   }



                                  echo '</div>
                                </div>
                            </div>

                                        </div><!--row-->
                                    </div><!--main-->

                            </div>
                        </div>
                    </div>
                    <script>
                    ///////////////////////////////////////////////tour_add///////////////////////////////////////////////////





                        ///////////////////////////////////////////////tour_add///////////////////////////////////////////////////

                    </script>
                    ';

          }

          ?>

                </div>
            </div>
        </div>
    </div>
  </section>

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
                                console.log("Sucess");
                            } else {
                                console.log("NO Location");
    							alert("Less Data")
                            }

                        });
                    });
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
            						var start_keyword = document.getElementById('tour_start_date_search').value;
            						var num_keyword = document.getElementById('tour_people_count_search').value;



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





            <script type="text/javascript">

            ///////////////////////////////////////////////Hotel_add///////////////////////////////////////////////////



            function addtocart_hotel(id) {

              const checkin_date = document.getElementById('checkin').value;
              const checkout_date = document.getElementById('checkout').value;
              const number_room = document.getElementById('room_count').value;
              const number_adult = document.getElementById('adult_count').value;
              //const price = document.getElementById('price').innerHTML;
              const price = 1000;

                $.ajax({
                    type: "POST",
                    url: "cart-add-hotel.php",
                    data: {
                        hotel_id: id,
                        checkin : checkin_date,
                        checkout : checkout_date,
                        num_room : number_room,
                        num_adult : number_adult,
                        price : price,
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response == 1) {
                            console.log(response);
                            update_staus_success("Added To cart Sucessfully")
                        }else{
                            console.log(response);
                              update_staus_error("Somthing Happend")
                        }
                    }
                });
            }
            ///////////////////////////////////////////////Hotel_add///////////////////////////////////////////////////

            function addtocart_tour(id) {
              var tour_start_date = document.getElementById("tour_start_date").value;
              var tour_head_count = document.getElementById("tour_people_count").value;
              var cab_type = document.getElementById("tour_cab_type").value;
              var room_type = document.getElementById("tour_hotel_type").value;
              var tour_price = document.getElementById("price_tour").innerHTML;

              if (tour_head_count == '' && tour_start_date == 'Select..') {
                  update_staus_error("Please Provide number of people and Start Date");
              }else if (tour_head_count == '' && tour_start_date != 'Select..') {
                  update_staus_error("Please Provide number of people");
              }else if(tour_head_count != '' && tour_start_date == 'Select..'){
                update_staus_error("Please Provide Start Date");
              }else{

                  console.log(tour_start_date+"_"+tour_head_count+"_"+cab_type+"_"+room_type+"_"+tour_price);


                $.ajax({
                    type: "POST",
                    url: "cart-add-tour.php",
                    data: {
                      tour_id: id,
                      tour_start_date : tour_start_date,
                      tour_head_count : tour_head_count,
                      tour_cab_type : cab_type,
                      tour_hotel_type : room_type,
                      tour_price : tour_price
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response == 1) {
                            console.log(response);
                            update_staus_success("Added To cart Sucessfully");
                        }else{
                            console.log(response);
                              update_staus_error("Somthing Happend");
                        }
                    }
                });

              }

            }




                            //utility functions
                            function update_staus_error(message) {
                              $('#modelformessage').modal({
                                  keyboard: true
                              });
                                document.getElementById('status_message').innerHTML = message;
                                $("#status_message").addClass("dangerclass");

                            }

                            function show_contact_hotel() {
                              $('#modelforcontact').modal({
                                  keyboard: true
                              });
                            }

                            function update_staus_success(message) {
                              $('#modelformessage').modal({
                                  keyboard: true
                              });
                                document.getElementById('status_message').innerHTML = message;
                                $("#status_message").removeClass("dangerclass")
                            }
                        </script>





                        <script type="text/javascript">

                        //OPTIONS

                        function update_options_tour()
                        {
                            var num_adult_tour = document.getElementById("tour_adult_count").value;
                            var num_child_tour = document.getElementById("tour_child_count").value;

                            num = parseInt(num_adult_tour) + parseInt(num_child_tour);

                            update_options(num);

                        }

                        update_options(1);

                          function update_options(num_people){
                          document.getElementById("book_button").innerHTML = " Book Now "; //reset the book now button

                          $("#tour_cab_type").removeAttr('disabled'); //enable the select taxi option
                          //---------//
                          $('#tour_cab_type').find('option').remove(); //clear all the previous option
                          //--------//

                         //--------Logic for taxi options---------//
                          if(num_people >= 1 && num_people <= 4){
                            $("#tour_cab_type").append("<option value='2'>Sedan-AC</option>");
                            $("#tour_cab_type").append("<option value='1'>Hatchback-AC</option>");
                          }else if( num_people > 4 && num_people <= 6 ){
                              $("#tour_cab_type").append("<option value='3'>SUV(6+1)-AC</option>");
                          }else if(num_people >6) {
                            document.getElementById("book_button").innerHTML = " Group Booking ";
                            document.getElementById("tour_cab_type").setAttribute("disabled","disabled");
                          }
                          else{
                          //for future bugs
                          }
                          //--------Logic for taxi options---------//
                        }



                        function update_price_tour(tour_id) {



                         var adult = document.getElementById("tour_adult_count").value;
                         var child = document.getElementById("tour_child_count").value;
                         var cab = document.getElementById("tour_cab_type").value;
                         var hotel = document.getElementById("tour_hotel_type").value;

                          //console.log(adult +"_"+ child +"_"+ cab +"_"+ hotel +"_"+ date +"_"+ month +"_"+ year);


                          $.ajax({
                                type: "POST",
                                url: "get_price_tour.php",
                                data: {
                                    tour_id: tour_id,
                                    adult : adult,
                                    child : child,
                                    cab : cab,
                                    hotel : hotel
                                },
                                dataType: 'JSON',
                                success: function(response) {
                                  console.log(response);
                                  document.getElementById("price_tour").innerHTML = response;
                                }
                            });



                        }


                        function update_price_hotel(hell,hotel_id,mode)
                        {
                          var stay_days= give_diffrence_hotel_date();

                          console.log(stay_days);

                          if (stay_days > 0) {

                          if (mode == 0) {


                            //console.log(hell.value);
                            var num = hell.value;
                            var num_room = document.getElementById("room_count").value;
                            if (parseInt(num)%3 == 0) {
                              num_room = parseInt(num)/3;
                            }else{
                              num_room = Math.ceil(parseInt(num)/3+0.33);
                            }
                            document.getElementById("room_count").value = num_room;
                          }


                            //console.log(hotel_id);
                            $.ajax({
                                type: "POST",
                                url: "get_price_hotel.php",
                                data: {
                                    hotel_id: hotel_id,
                                    p_num : num,
                                },
                                dataType: 'JSON',
                                success: function(response) {
                                  //console.log(response);
                                  response_total =  ((response * num_room) * stay_days);
                                  document.getElementById("price_hotel").innerHTML = response_total;
                                  document.getElementById("price_hotel_perhead").innerHTML = response;
                                }
                            });
                          }else{
                            update_staus_error("Please Select Minimin Of One Day");
                          }
                        }




                        function give_diffrence_hotel_date(){
                          var checkin  = document.getElementById("checkin").value;
                          var checkout = document.getElementById("checkout").value;

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

                        <script>
                        function updatePrice(){
                          document.getElementById("button_to_click_for_hotel_price").click();
                        }
                        </script>

</body>

</html>
