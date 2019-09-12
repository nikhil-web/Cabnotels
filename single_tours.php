<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
   //header("location:login.php");
}else{
  $login_flag = 1;
}

$type = "tour";
$id = mysqli_real_escape_string($db,$_GET["id"]);
?>
<html lang="en">
<head>
    <title>Cabnotels | Tours </title>
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


    .room_count_holder{
        height: calc(2.5rem + 2px);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #fedc00;
        cursor: pointer;
    }


    .add_count_holder{
          height: calc(2.5rem + 2px) !important;
          width: calc(2.5rem + 2px) !important;
          border-radius: 25px;
          display: flex;
          align-items: center;
          justify-content: center;
          border: 1px solid #fedc00;
          cursor: pointer;
          transition-duration: 0.2s;
    }

    .add_count_holder:hover{
      background: #3c3c3c;
    color: #fff;
    border: 1px solid #3c3c3c;
    }


    .data,.images{
    background-color: #fff;

    }

    .room{
      border:none !important;
    }

    .button{
          background-color: #fddd00;
    }

    .button:hover{
      background: #3c3c3c;
    color: #fff;
    border: 1px solid #3c3c3c;

    }


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

  <?php include 'includes/navbar.php'; ?>

<?php

  $location = "";
  $child_num_tour = 0;

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
                              echo '<h3>'.$row["tour_name"].'</h3>
                                <p>'.$row["tour_loc"].'</p>';
                            ?>

                          </div>
                </div>
          <?php
                  echo '
                    <div class="row">
                        <div class="images col-lg-8 p-3">
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

                        <div class="data col-lg-4 p-3"><!--main-->
                                    <div class="row p-3"><!--row-->

                                    <div class="col-6 p-1 my-1">
                                        <label for="adult_count">Adults </label>
                                        <div class="row px-3"><!--row-->
                                      <!--Plus-->
                                      <div onclick="sub_adult()" class="col-4 room_count_holder button">
                                      <h3 class="m-0"><i class="fa fa-minus" aria-hidden="true"></i></h3>
                                      </div>
                                      <!--Plus-->
                                      <!--number-->
                                      <div class="col-4 room_count_holder data">
                                        <h3 class="m-0" id="tour_adult_count">'.$number_people_tour.'</h3>
                                        </div>
                                      <!--number-->
                                  <!--Minus-->
                                      <div onclick="add_adult()" class="col-4 room_count_holder button">
                                        <h3 class="m-0"><i class="fa fa-plus" aria-hidden="true"></i></h3>
                                      </div>
                                  <!--Minus-->
                                  </div>
                                    <small class="form-text">(Above 5 Years)</small>
                                  </div>

                                  <div class="col-6 p-1 my-1">
                                    <label for="child_count">Children</label>
                                    <div class="row px-3"><!--row-->
                                    <!--Plus-->
                                  <div onclick="sub_child()" class="col-4 room_count_holder button">
                                    <h3 class="m-0"><i class="fa fa-minus" aria-hidden="true"></i></h3>
                                  </div>
                                  <!--Plus-->
                                  <!--number-->
                                  <div class="col-4 room_count_holder data">
                                    <h3 id="tour_child_count" class="m-0">'.$child_num_tour.'</h3>
                                  </div>
                              <!--number-->
                                <!--Minus-->
                                    <div onclick="add_child()" class="col-4 room_count_holder button">
                                      <h3 class="m-0"><i class="fa fa-plus" aria-hidden="true"></i></h3>
                                    </div>
                                <!--Minus-->
                                </div>
                                  <small class="form-text">(Below 5 Years)</small>
                                </div>



                                        <!--Cab Type -->
                                      <div class="col-6 p-1 my-1">
                                        <div class="form-group">
                                        <label for="tour_cab_type">Select Cab Type</label>
                                        <select onchange="updatePrice()" class="form-control" id="tour_cab_type" name="tour_cab_type" requierd disabled>
                                          <option value="">Select..</option>
                                        </select>
                                          <small class="form-text">Your preferred cab.</small>
                                        </div>
                                      </div>
                                        <!--Cab Type-->



                                        <!--Hotel Type -->
                                      <div class="col-6 p-1 my-1">
                                        <div class="form-group">
                                        <label for="tour_hotel_type">Accommodation Type</label>
                                        <select onchange="updatePrice()" class="form-control" id="tour_hotel_type" name="tour_hotel_type" requierd>
                                          <option value="2">2 Star</option>
                                          <option value="3">3 Star</option>
                                          <option value="4">4 Star</option>
                                          <option value="5">5 Star</option>
                                        </select>
                                          <small class="form-text">Your preferred accommodation.</small>
                                        </div>
                                      </div>
                                        <!--Hotel Type-->

                                        <!--Start date -->
                                        <div class="col-12 p-1 my-1">
                                          <div class="form-group">
                                            <label for="number">Date</label>
                                            <input type="date" class="form-control" id="tour_start_date" name="tour_start_date" placeholder="Check out" required>
                                            <small class="form-text">Your Preferd Date for tour to start (mm/dd/yyy). may be subject to change</small>
                                            </div>
                                        </div>
                                        <!--Start Date -- >

                                        <!--Buttons-->
                                        <div class="col-lg-12 my-0">
                                              <div class="row">
                                                  <div class="col-12 p-1">
                                                      <button id="update_price_tour_button_click" onclick="update_price_tour('.$row["tour_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Calculate Price</button>
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
                                              <div class="row">';

                                              if ($login_flag == 1) {
                                                // code...
                                                echo '
                                              <div class="col-5 p-1">
                                                  <button onclick="book_now_tour('.$row["tour_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;border: 1px solid #ffdd00;">Book Now</button>
                                              </div>

                                            <div class="col-4 p-1">
                                                  <button onclick="show_contact_tour()" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;">Contact</button>
                                              </div>
                                              <div class="col-3 p-1">
                                                    <button onclick="addtocart_tour('.$row["tour_id"].')" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;"ackground: #3c3c3c;width: 100%;"> + <i class="fas fa-shopping-cart"></i></button>
                                              </div>
                                              ';
                                            }else{
                                              echo '
                                              <div class="col-6 p-1">
                                                  <button onclick="book_now_tour('.$row["tour_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;border: 1px solid #ffdd00;">Book Now</button>
                                              </div>

                                            <div class="col-6 p-1">
                                                  <button onclick="show_contact_tour()" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;">Contact</button>
                                              </div>';
                                            }
                                                  echo '
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


                    ';
          ?>
              </div>
            </div>
        </div>
    </div>
  </section>


  <!-- Modal -->
  <div class="modal fade" id="modelforcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                <section class="contact">
                    <div class="container py-lg-0 py-sm-3">

                        <div class="col-lg-12 col-md-12 contact-left-form" style="box-shadow: none;">
                        <h2 class="heading text-capitalize text-center mb-sm-5 mb-4"> Get In Touch with us</h2>
                        <ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">



                        </ul>
                        <hr>
                            <form action="#" method="post">
                                <div class=" form-group contact-forms">
                                    <input type="text" class="form-control" placeholder="Name" required="">
                                </div>
                                <div class="form-group contact-forms">
                                    <input type="email" class="form-control" placeholder="Email" required="">
                                </div>
                                <div class="form-group contact-forms">
                                    <input type="text" class="form-control" placeholder="Phone" required="">
                                </div>
                                <div class="form-group contact-forms">
                                    <input type="text" class="form-control" placeholder="Message" rows="3" required="">
                                </div>
                                <button class="btn btn-block sent-butnn">Send</button>
                            </form>
                        </div>

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








            <script type="text/javascript">

            function addtocart_tour(id) { //toursection
              var tour_start_date = document.getElementById("tour_start_date").value

              if (tour_start_date != '') {
                var adult = document.getElementById("tour_adult_count").innerHTML;
                var child = document.getElementById("tour_child_count").innerHTML;
                var cab = document.getElementById("tour_cab_type").value;
                var hotel = document.getElementById("tour_hotel_type").value;
                var tour_price = document.getElementById("price_tour").innerHTML;


                  $.ajax({
                      type: "POST",
                      url: "cart-add-tour.php",
                      data: {
                        tour_id: id,
                        tour_start_date : tour_start_date,
                        tour_adult_count : adult,
                        tour_child_count : child,
                        tour_cab_type : cab,
                        tour_hotel_type : hotel,
                        tour_price : tour_price
                      },
                      dataType: 'JSON',
                      success: function(response) {
                          if (response == 1) {
                              console.log(response);
                              update_staus_success("Added To cart Sucessfully");
                          }else{
                              console.log(response);
                                update_staus_error("Tour Already In Cart");
                          }
                      }
                  });
              }else{
                update_staus_success("Please select a date");

              }
            }

            function book_now_tour(id) {

                        var tour_start_date = document.getElementById("tour_start_date").value

                        if (tour_start_date != '') {
                          var adult = document.getElementById("tour_adult_count").innerHTML;
                          var child = document.getElementById("tour_child_count").innerHTML;
                          var cab = document.getElementById("tour_cab_type").value;
                          var hotel = document.getElementById("tour_hotel_type").value;
                          var tour_price = document.getElementById("price_tour").innerHTML;


                          var query = "book_now_tour.php?tour_id="+id+"&start_date="+tour_start_date +"&adults=" +adult+ "&child=" +child+"&cab=" +cab+"&hotel="+hotel+"&price="+tour_price;
                          window.location.href = query;
                        }else {
                        update_staus_error("Please Select A Start Date");
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


                            function show_contact_tour() {
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
                        function add_adult(){
                        var num =  parseInt(document.getElementById('tour_adult_count').innerHTML);
                        max = 7
                        if (num <= max) {
                            document.getElementById('tour_adult_count').innerHTML = num+1;
                        }else{
                          update_staus_success("Plese Contact For Group Booking");
                        }
                        updatePrice();
                        update_options_tour();
                        }

                        function sub_adult(){
                        var num =  parseInt(document.getElementById('tour_adult_count').innerHTML);
                        min = 2;
                        if (num >= min) {
                          document.getElementById('tour_adult_count').innerHTML = parseInt(num)-1;
                            updatePrice();
                            update_options_tour();
                        }

                      }


                      function add_child(){
                      var num =  parseInt(document.getElementById('tour_child_count').innerHTML);
                      max = 7;
                      if (num <= max) {
                          document.getElementById('tour_child_count').innerHTML = num+1;
                      }
                    }

                      function sub_child(){
                      var num =  parseInt(document.getElementById('tour_child_count').innerHTML);
                      min = 1;
                      if (num >= min) {
                        document.getElementById('tour_child_count').innerHTML = parseInt(num)-1;
                      }

                    }

                        function update_options_tour()
                        {
                            var num_adult_tour = document.getElementById("tour_adult_count").innerHTML;
                            var num_child_tour = document.getElementById("tour_child_count").innerHTML;

                            num = parseInt(num_adult_tour) + parseInt(num_child_tour);

                            update_options(num);

                        }

                        update_options(1);

                          function update_options(num_people){
                            try {
                              document.getElementById("book_button").innerHTML = " Book Now "; //reset the book now button

                            } catch (e) {

                            } finally {

                            }

                          $("#tour_cab_type").removeAttr('disabled'); //enable the select taxi option
                          //---------//
                          $('#tour_cab_type').find('option').remove(); //clear all the previous option
                          //--------//

                         //--------Logic for taxi options---------//
                          if(num_people >= 1 && num_people <= 4){
                            $("#tour_cab_type").append("<option value='2'>Sedan-AC</option>");
                            $("#tour_cab_type").append("<option value='1'>Hatchback-AC</option>");
                          }else if( num_people > 4 && num_people <= 8 ){
                              $("#tour_cab_type").append("<option value='3'>SUV(6+1)-AC</option>");
                          }else if(num_people >8) {
                              $("#tour_cab_type").append("<option value='3'>SUV(6+1)-AC</option>");
                            document.getElementById("book_button").innerHTML = " Group Booking ";
                          }
                          else{
                          //for future bugs
                          }
                          //--------Logic for taxi options---------//
                        }



                        function update_price_tour(tour_id) {
                         var adult = document.getElementById("tour_adult_count").innerHTML;
                         var child = document.getElementById("tour_child_count").innerHTML;
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

                        function updatePrice(){
                          try {
                            document.getElementById("update_price_tour_button_click").click();
                          } catch (e) {

                          } finally {

                          }
                        }

</script>

                      <script type="text/javascript"> //Prevents dates to go in past
                        $(function(){
                          var dtToday = new Date();

                          var month = dtToday.getMonth() + 1;
                          var day = dtToday.getDate();
                          var year = dtToday.getFullYear();
                          if(month < 10)
                          month = '0' + month.toString();
                          if(day < 10)
                          day = '0' + day.toString();
                          var minDate= year + '-' + month + '-' + day;

                          $('#checkin').attr('min', minDate);
                          $('#checkout').attr('min', minDate);
                          $('#taxi_pickup_date_single').attr('min', minDate);
                          $('#taxi_out_startdate').attr('min', minDate);
                          $('#taxi_out_leave_date').attr('min', minDate);
                          $('#tour_start_date').attr('min', minDate);
                        });
                        </script>

</body>

</html>
