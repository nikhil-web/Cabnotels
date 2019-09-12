<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
   //header("location:login.php");
}else{
  $login_flag = 1;
}

$type = "taxi";
$id = mysqli_real_escape_string($db,$_GET["id"]);
?>
<html lang="en">
<head>
    <title>Cabnotels | Taxi </title>
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


        .data,.images{
        background-color: #fff;

        }


    body{
      font-family: 'Roboto Condensed', sans-serif !important;
      background: #f5f5f5;
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
  include 'includes/search_taxi.php';
  $sql = "SELECT * FROM taxi WHERE taxi_id = '$id'";

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

                              echo '<h3>'.$row["taxi_name"].'</h3>';

                            ?>

                          </div>
                </div>
          <?php

                    echo '
                    <div class="row">
                        <div class="images col-lg-7 p-3">
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

                        <div class="data col-lg-5 p-3"><!--main-->

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
                                    <input type="date" class="form-control" id="taxi_pickup_date_single" name="taxi_pickup_date_single"  value="required">
                                    <small class="form-text">Your Check in Date (mm/dd/yyy).</small>
                                    </div>
                                </div>
                                <!--Checkin-->

                                <!--Time Pickup -->
                                  <div class="col-6 p-1 my-1">
                                    <div class="form-group">
                                      <label for="number">Time</label>
                                      <select class="form-control" id="pickup_time_single" name="pickup_time_single" requierd>
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
                                    <div class="col-6 p-1 my-1">
                                      <div class="form-group">
                                        <label for="number">AM/PM</label>
                                        <select class="form-control" id="pickup_ampm_single" name="pickup_ampm_single" requierd>
                                          <option value ="AM">AM</option>
                                          <option value ="PM">PM</option>
                                        </select>
                                        <small class="form-text">AM/PM</small>
                                        </div>
                                    </div>
                                    <!--Time Pickup -->

                                    <!--Time Pickup -->
                                      <div class="col-6 p-1 my-1">
                                        <div class="form-group">
                                          <label for="duration_8_12">Duration</label>
                                          <select class="form-control" id="duration_8_12" name="duration_8_12" requierd>
                                            <option value ="8">8</option>
                                            <option value ="12">12</option>
                                          </select>
                                          <small class="form-text">Trip Duration In Hours</small>
                                          </div>
                                      </div>
                                      <!--Time Pickup -->

                                  <!--pickup_location -->
                                    <div class="col-12 p-1 my-1">
                                      <div class="form-group">
                                        <label for="number">Pickup Location</label>
                                        <select class="form-control" id="pickup_location_single" name="pickup_location_single" aria-placeholder="Enter the pickup loaction" requierd>
                                            <option value=0>Select..</option>';
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
                                                                          <h1 id="taxi_price_single" style="margin: 0;">  '.$row["taxi_price"].'  </h1>
                                                                        <p>Per KM</p>
                                                                  </div>
                                                            </div>
                                                  <hr class="col-lg-12 px-3" style="color:red; ">

                                            </div>
                                  </div>

                                <!--Buttons-->
                                <div class="col-lg-12 my-0">
                                      <div class="row">

                                      ';
                                      if ($login_flag == 1) {
                                        // code...
                                      echo '
                                          <div class="col-5 p-1">
                                              <button onclick="book_now_taxi('.$row["taxi_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;border: 1px solid #ffdd00;">Book Now</button>
                                          </div>

                                        <div class="col-4 p-1">
                                              <button onclick="show_contact_taxi()" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;">Contact Now</button>
                                          </div>
                                          <div class="col-3 p-1">
                                                <button onclick="addtocart_taxi('.$row["taxi_id"].')" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;"ackground: #3c3c3c;width: 100%;"> + <i class="fas fa-shopping-cart"></i></button>
                                          </div>
                                          ';
                                        }else {
                                        echo '  <div class="col-6 p-1">
                                              <button onclick="book_now_taxi('.$row["taxi_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;border: 1px solid #ffdd00;">Book Now</button>
                                          </div>

                                        <div class="col-6 p-1">
                                              <button onclick="show_contact_taxi()" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;">Contact Now</button>
                                          </div>
                                        ';
                                        }
                                        echo'
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
                                   <input type="date" class="form-control" id="taxi_out_startdate" name="taxi_out_startdate" placeholder="Check in" value="required">
                                   <small class="form-text">Your Pick UP Date (mm/dd/yyy).</small>
                                   </div>
                               </div>
                               <!--Checkin-->

                               <!--Time Pickup -->
                                 <div class="col-3 p-1 my-1">
                                   <div class="form-group">
                                     <label for="number">Time</label>
                                     <select class="form-control" id="taxi_out_starttime" name="taxi_out_starttime">
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
                                       <select class="form-control" id="taxi_out_ampm" name="taxi_out_ampm">
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
                                         <input type="date" class="form-control" id="taxi_out_leave_date" name="taxi_out_leave_date" placeholder="Check in" value="required">
                                         <small class="form-text">Your Drop Date (mm/dd/yyy).</small>
                                         </div>
                                     </div>
                                     <!--Checkin-->

                                     <!--Time Pickup -->
                                       <div class="col-3 p-1 my-1">
                                         <div class="form-group">
                                           <label for="number">Time</label>
                                           <select class="form-control" id="taxi_out_leave_time" name="taxi_out_leave_time">
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
                                             <select class="form-control" id="taxi_out_leave_ampm" name="taxi_out_leave_ampm">
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
                                       <select class="form-control" id="pickup_location_out" name="pickup_location_out" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction" >
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


                                   <!--Buttons-->
                                   <div class="col-lg-12 my-0">
                                         <div class="row">
                                             <div class="col-12 p-1">
                                                 <button id="update_price_taxi_button_click" onclick="update_price_taxi('.$row["taxi_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Calculate Price</button>
                                             </div>
                                         </div>
                                   </div>
                                   <!--Buttons-->

                                   <hr class="col-lg-12 px-3" style="color:red; ">

                               <div class="col-lg-12 mt-2">
                                                         <div class="row ">

                                                                <div class="col-6">
                                                                     <div class="mr-1 mt-1">
                                                                         <h1 tyle="margin: 0;"> <span id="price_taxi_out">'.$row["taxi_price_day"].' </span> ₹ </h1>
                                                                       <p>Total</p>
                                                                 </div>
                                                                 </div>

                                                                   <div class="col-6">
                                                                         <div class="mr-1 mt-1">
                                                                             <h3 style="margin: 0;"> <span id="price_taxi_in">'.$row["taxi_price_day"].'</span>  ₹ </h3>
                                                                           <p>Price for: 1 Day</p>
                                                                          </div>
                                                                     </div>

                                                           </div>
                                                 <hr class="col-lg-12 px-3" style="color:red; ">

                                           </div>
                                 </div>

                               <!--Buttons-->
                               <div class="col-lg-12 my-0">
                                     <div class="row">
                                         <div class="col-6 p-1">
                                             <button onclick="addtocart_taxi_outstation('.$row["taxi_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;">Book Now</button>
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

            function addtocart_taxi(id) { //taxisection
              console.log(id);
              var taxi_pickup_date = document.getElementById("taxi_pickup_date_single").value;
              var pickup_time = document.getElementById("pickup_time_single").value;
              var pickup_ampm_single = document.getElementById("pickup_ampm_single").value;
              var pickup_location = document.getElementById("pickup_location_single").value;
              var taxi_price_single = document.getElementById("taxi_price_single").innerHTML;
              var taxi_duration = document.getElementById("duration_8_12").value;

              var pickup_time_send = pickup_time +'-' + pickup_ampm_single ;

              if (give_diffrence_taxi_date()>=0) {

                if(pickup_location != 0){
                  $.ajax({
                      type: "POST",
                      url: "cart-add-taxi.php",
                      data: {
                        taxi_id: id,
                        taxi_pickup_date : taxi_pickup_date,
                        pickup_time : pickup_time_send,
                        pickup_location : pickup_location,
                        taxi_price_single : taxi_price_single,
                        taxi_duration : taxi_duration,
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
                }else {
                  update_staus_success("Please Select A Location");

                }


              }else{
                update_staus_success("Select a date in future");

              }
            }


            function book_now_taxi(id){
              var taxi_pickup_date = document.getElementById("taxi_pickup_date_single").value;
              var pickup_time = document.getElementById("pickup_time_single").value;
              var pickup_ampm_single = document.getElementById("pickup_ampm_single").value;
              var pickup_location = document.getElementById("pickup_location_single").value;
              var taxi_price_single = document.getElementById("taxi_price_single").innerHTML;
              var taxi_duration = document.getElementById("duration_8_12").value;


              var pickup_time_send = pickup_time +' '+ pickup_ampm_single ;

              if (give_diffrence_taxi_date()>=0) {

                if(pickup_location != 0){
                var query = "book_now_taxi.php?taxi_id="+id+"&taxi_pickup_date="+taxi_pickup_date+"&pickup_time_send="+pickup_time_send+"&pickup_location="+pickup_location+"&taxi_price_single="+taxi_price_single+"&taxi_dur="+taxi_duration;
                window.location.href = query;
              }else{
                update_staus_success("Select A Pickup Location");

              }
            }else{
              update_staus_success("Select a correct date.");

            }

            }


            function update_price_taxi(){

              if (give_diffrence_taxi_out_date() > 1) {
                var price_taxi_out = document.getElementById("price_taxi_in").innerHTML;
                var num_days = give_diffrence_taxi_out_date();
                price = num_days * price_taxi_out;
                console.log(price);
                document.getElementById("price_taxi_out").innerHTML = price;
              }else {
                update_staus_success("Please Select Valid Dates");

              }

            }


            function addtocart_taxi_outstation(id) { //taxisection


              var taxi_out_startdate  = document.getElementById("taxi_out_startdate").value;
              var taxi_out_starttime  = document.getElementById("taxi_out_starttime").value;
              var taxi_out_ampm       = document.getElementById("taxi_out_ampm").value;
              var taxi_out_leave_date = document.getElementById("taxi_out_leave_date").value;
              var taxi_out_leave_time = document.getElementById("taxi_out_leave_time").value;
              var taxi_out_leave_ampm = document.getElementById("taxi_out_leave_ampm").value;
              var pickup_location_out = document.getElementById("pickup_location_out").value;
              var leave_car_location  = document.getElementById("leave_car_location").value;
              var price_taxi_out      = document.getElementById("price_taxi_out").innerHTML;

              var taxi_out_starttime_send = taxi_out_starttime +'-' + taxi_out_ampm ;
              var taxi_out_leave_time_send = taxi_out_leave_time +'-' + taxi_out_leave_ampm ;

              if (give_diffrence_taxi_out_date() > 0) {

                    if(pickup_location_out != 0){

                      if (leave_car_location != 0) {


                        $.ajax({
                            type: "POST",
                            url: "cart-add-taxi-out.php",
                            data: {
                              taxi_id: id,
                              taxi_out_startdate : taxi_out_startdate,
                              taxi_out_starttime : taxi_out_starttime_send,
                              taxi_out_leave_date : taxi_out_leave_date,
                              taxi_out_leave_time : taxi_out_leave_time_send,
                              pickup_location_out : pickup_location_out,
                              leave_car_location :leave_car_location,
                              price_taxi_out : price_taxi_out,
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

                      }else {
                        update_staus_success("Please Select The Drop Location");

                      }

                    }else {
                      update_staus_success("Please Select The Pickup Location");

                    }

              }else{
                update_staus_success("Please Select Valid Dates");

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

                        function give_diffrence_taxi_date(){
                          var checkout  = document.getElementById("taxi_pickup_date_single").value;

                          var checkin = Date();

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

                        function give_diffrence_taxi_out_date(){
                          var  checkin  = document.getElementById("taxi_out_startdate").value;

                          var checkout = document.getElementById("taxi_out_leave_date").value;


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

                          $('#taxi_pickup_date_single').attr('min', minDate);
                          $('#taxi_out_startdate').attr('min', minDate);
                          $('#taxi_out_leave_date').attr('min', minDate);
                          $('#tour_start_date').attr('min', minDate);
                        });
                        </script>

</body>

</html>
