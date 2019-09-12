<?php
include ('session.php');
$login_flag = 0;
if ($_SESSION['auth'] == false)
{
    $login_flag = 0;
    //header("location:login.php");

}
else
{
    $login_flag = 1;
}

$type = "hotel";
$id = mysqli_real_escape_string($db, $_GET["id"]);
?>
<html lang="en">
<head>
    <title>Cabnotels | Hotel </title>
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
include 'includes/search_hotel.php';
$adults_num = 1;
if (isset($_GET["start_date"]))
{
    $start_date = mysqli_real_escape_string($db, $_GET["start_date"]);
}
else
{
    $start_date = "";
}
if (isset($_GET["end_date"]))
{
    $end_date = mysqli_real_escape_string($db, $_GET["end_date"]);
}
else
{
    $end_date = "";
}
if (isset($_GET["adult_num"]))
{
    $adults_num = mysqli_real_escape_string($db, $_GET["adult_num"]);

    $number_people = (int)$adults_num;
    if ($number_people % 3 == 0)
    {
        // code..
        $number_room = $number_people / 3;
    }
    else
    {
        // code...
        $number_room = $number_people / 3 + 0.33;
    }
    $number_room = round($number_room);
}
else
{
    $number_room = 1;
    $number_people = 1;
}
if (isset($_GET["child_num"]))
{
    $child_num = mysqli_real_escape_string($db, $_GET["child_num"]);
}
else
{
    $child_num = 0;
}

//query for hotel
$sql = "SELECT * FROM hotels WHERE hotel_id = '$id'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
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
                            echo '<h3>' . $row["hotel_name"] . '</h3>
                              <p>' . $row["hotel_add"] . '</p>';
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
                                    $sql_inner = 'SELECT * FROM hotel_images WHERE hotel_id = ' . $row["hotel_id"] . ' ';
                                    $result_inner = mysqli_query($db, $sql_inner);
                                    if (mysqli_num_rows($result_inner) > 0)
                                    {
                                      // output data of each hotel image.
                                      while ($row_inner = mysqli_fetch_assoc($result_inner))
                                      {
                                        if ($count == 0)
                                        {
                                          echo '
                                             <li data-target="#carouselExampleIndicators_' . $row["hotel_id"] . '" data-slide-to="' . $count . '" class="active"></li>
                                              ';
                                            }
                                            else
                                            {
                                              echo '
                                               <li data-target="#carouselExampleIndicators_' . $row["hotel_id"] . '" data-slide-to="' . $count . '"></li>
                                             ';
                                           }
                                           $count++;
                                         }
                                       }

                                       echo '</ol>
                                    <div class="carousel-inner" style=" width:100%;">';

                                  $count = 0;
                                  $sql_inner = 'SELECT * FROM hotel_images WHERE hotel_id = ' . $row["hotel_id"] . ' ';
                                  $result_inner = mysqli_query($db, $sql_inner);
                                  if (mysqli_num_rows($result_inner) > 0)
                                  {
                                      // output data of each hotel image.
                                      while ($row_inner = mysqli_fetch_assoc($result_inner))
                                      {
                                          if ($count == 0)
                                          {
                                              echo '
                                         <div class="carousel-item active">
                                         <img class="d-block w-100" src="admin/' . $row_inner["hotel_image"] . '" alt="' . $count . ' slide">
                                         </div>
                                         ';
                                       }
                                       else
                                       {
                                         echo '
                                             <div class="carousel-item">
                                             <img class="d-block w-100" src="admin/' . $row_inner["hotel_image"] . '" alt="' . $count . ' slide">
                                             </div>
                                             ';
                                           }

                                           $count++;
                                         }
                                       }

                                       echo '</div>
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
                                                    <h3 class="mb-3">' . $row["hotel_name"] . '</h3>
                                                    <p style="text-align:justify;">' . $row["hotel_about"] . '</p>
                                                 </div>
                                              </div>
                                              <!--amenities-->
                                                <div class="col-12 mt-2 my-3 p-1">
                                                    <p>Amenities</p>

                                                    <div class="row col-lg-12">
                                                    ';

                                                          $sql_inner_amen = 'SELECT * FROM amen_hotel WHERE hotel_id = ' . $row["hotel_id"] . ' ';
                                                          $result_amen = mysqli_query($db, $sql_inner_amen);
                                                          if (mysqli_num_rows($result_amen) > 0)
                                                          {
                                                              // output data of each row
                                                              while ($row_amen = mysqli_fetch_assoc($result_amen))
                                                              {

                                                                  if ((int)$row_amen["status"] == 1)
                                                                  {
                                                                      // code...
                                                                      echo '
                                                                            <div class="mr-1 mt-1">
                                                                              <button type="button" class="btn btn-light"> ' . $row_amen["amn_name"] . '</button>
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


                        <div class="data col-lg-5 p-3"><!--main-->
                        <h3>Booking Section</h3>
                          <p>Fill The Details And Press Book Now.</p>
                          <hr>
                            <div class="row p-3"><!--row-->

                            <!--Checkin -->
                              <div class="col-6 p-1 my-1">
                                <div class="form-group">
                                  <label for="number">Check in</label>
                                  <input type="date" class="form-control" id="checkin" name="checkin" placeholder="Check in" value=' . $start_date . ' required>
                                  <small class="form-text">Your Check in Date (mm/dd/yyy).</small>
                                  </div>
                              </div>
                              <!--Checkin-->

                              <!--Checkout -->
                                <div class="col-6 p-1 my-1">
                                  <div class="form-group">
                                    <label for="number">Check out</label>
                                    <input type="date" class="form-control" id="checkout" name="checkout" placeholder="Check out" value=' . $end_date . ' required>
                                    <small class="form-text">Your Check out Date (mm/dd/yyy).</small>
                                    </div>
                                </div>
                                <!--Checkout-->

                            <div class="col-4 p-1 my-1">
                                <label for="adult_count">Rooms </label>
                                <div class="row px-3"><!--row-->
                              <!--Plus-->
                              <div onclick="sub_room()" class="col-4 add_count_holder data">
                              <h3 class="m-0"><i class="fa fa-minus" aria-hidden="true"></i></h3>
                              </div>
                              <!--Plus-->
                              <!--number-->
                              <div class="col-4 room_count_holder room">
                                <h3 class="m-0" id="room_count">'.$number_room.'</h3>
                                </div>
                              <!--number-->
                          <!--Minus-->
                              <div onclick="add_room()" class="col-4 add_count_holder data">
                                <h3 class="m-0"><i class="fa fa-plus" aria-hidden="true"></i></h3>
                              </div>
                          <!--Minus-->
                          </div>
                            <small class="form-text">Enter No. Of Rooms.</small>
                          </div>



                                <div class="col-4 p-1 my-1">
                                    <label for="adult_count">Adults </label>
                                    <div class="row px-3"><!--row-->
                                  <!--Plus-->
                                  <div onclick="sub_adult()" class="col-4 room_count_holder button">
                                  <h3 class="m-0"><i class="fa fa-minus" aria-hidden="true"></i></h3>
                                  </div>
                                  <!--Plus-->
                                  <!--number-->
                                  <div class="col-4 room_count_holder data">
                                    <h3 class="m-0" id="adult_count">'.$number_people.'</h3>
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

                              <div class="col-4 p-1 my-1">
                                <label for="child_count">Children</label>
                                <div class="row px-3"><!--row-->
                                <!--Plus-->
                              <div onclick="sub_child()" class="col-4 room_count_holder button">
                                <h3 class="m-0"><i class="fa fa-minus" aria-hidden="true"></i></h3>
                              </div>
                              <!--Plus-->
                              <!--number-->
                              <div class="col-4 room_count_holder data">
                                <h3 id="child_count" class="m-0">'.$child_num.'</h3>
                              </div>
                          <!--number-->
                            <!--Minus-->
                                <div onclick="add_child()" class="col-4 room_count_holder button">
                                  <h3 class="m-0"><i class="fa fa-plus" aria-hidden="true"></i></h3>
                                </div>
                            <!--Minus-->
                            </div>
                              <small class="form-text">(Below 5 Years).</small>
                            </div>







                              <!--Buttons-->
                              <div class="col-lg-12 my-0">
                                    <div class="row">
                                        <div class="col-12 p-1">
                                            <button id="button_to_click_for_hotel_price" onclick="update_price_hotel(adult_count,' . $row["hotel_id"] . ',0)" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;border: 1px solid #ffdd00;">Calculate Price</button>
                                        </div>
                                    </div>
                              </div>
                              <!--Buttons-->
                              <div class="col-lg-12 mt-2">
                                                    <div class="row ">
                                                    <hr class="col-lg-8 px-3" style="color:#dddddd; ">

                                                              <div class="col-6">
                                                                    <div class="mr-1 mt-1">
                                                                        <h2 style="margin: 0;"> <span id="price_hotel"> </span> ₹ </h2>
                                                                      <p>Total Price </p>
                                                                     </div>
                                                                </div>
                                                                <div class="col-6">
                                                                      <div class="mr-1 mt-1">
                                                                          <h3 style="margin: 0;"> <span id="price_hotel_perhead">  </span> ₹  </h3>
                                                                        <p>Price for: 1 Room, 1 Night</p>
                                                                       </div>
                                                                  </div>
                                                <hr class="col-lg-8 px-3" style="color:#dddddd; ">

                                          </div>
                                </div>

                              <!--Buttons-->
                              <div class="col-lg-12 my-0">
                                    <div class="row">';
                                    if ($login_flag == 1) {
                                      // code...
                                    echo '
                                        <div class="col-5 p-1">
                                            <button onclick="book_now_hotel('.$row["hotel_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;border: 1px solid #ffdd00;">Book Now</button>
                                        </div>

                                      <div class="col-4 p-1">
                                            <button onclick="show_contact_hotel()" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;">Contact Now</button>
                                        </div>
                                        <div class="col-3 p-1">
                                              <button onclick="addtocart_hotel('.$row["hotel_id"].')" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;"ackground: #3c3c3c;width: 100%;"> + <i class="fas fa-shopping-cart"></i></button>
                                        </div>
                                        ';
                                      }else {
                                      echo '  <div class="col-6 p-1">
                                            <button onclick="book_now_hotel('.$row["hotel_id"].')" class="button button5" style="background-color: #ffdd00;color: #3c3c3c;width: 100%;border: 1px solid #ffdd00;">Book Now</button>
                                        </div>

                                      <div class="col-6 p-1">
                                            <button onclick="show_contact_hotel()" class="button button5" style="background: #3c3c3c;width: 100%;border: 1px solid #3c3c3c;">Contact Now</button>
                                        </div>
                                      ';
                                      }
                                      echo'
                                    </div>
                              </div>
                              <!--Buttons-->


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

                        <div class="col-lg-12 col-md-12 contact-left-form" style="box-shadow: none;">                                          <h2 class="heading text-capitalize text-center mb-sm-5 mb-4"> Get In Touch with us</h2>
                        <ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">

                            <li class="col-md-12 col-sm-12 adress-w3pvt-info mt-sm-0 mt-4">
                                <div class="adress-icon">
                                  <span class="fa fa-envelope-open"></span>
                                </div>
                                <h6>Phone & Email</h6>
                                <p>+91 <?php echo $row["hotel_number"] ?></p>
                                <a href="mailto: <?php echo $row["hotel_email"] ?>" class="mail"><?php echo $row["hotel_email"] ?></a>
                            </li>

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





    <script type="text/javascript">

            ///////////////////////////////////////////////Hotel_add///////////////////////////////////////////////////

            function addtocart_hotel(id) {

              var stay_days= give_diffrence_hotel_date();

              const checkin_date = document.getElementById('checkin').value;
              const checkout_date = document.getElementById('checkout').value;
              const number_room = document.getElementById('room_count').innerHTML;
              const number_adult = document.getElementById('adult_count').innerHTML;
              const child_count = document.getElementById('child_count').innerHTML;
              const price = document.getElementById('price_hotel').innerHTML;


              if (stay_days > 0) {
                $.ajax({
                    type: "POST",
                    url: "cart-add-hotel.php",
                    data: {
                        hotel_id: id,
                        checkin : checkin_date,
                        checkout : checkout_date,
                        num_room : number_room,
                        num_adult : number_adult,
                        child_count :child_count,
                        price : price,
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response == 1) {
                            console.log(response);
                            update_staus_success("Added To cart Sucessfully")
                        }else{
                            console.log(response);
                            update_staus_error("Already In Cart")
                        }
                    }
                });
              }else {
                update_staus_error("Please Select Minimin Of One Day");
              }


            }
            ///////////////////////////////////////////////Hotel_add///////////////////////////////////////////////////

            function book_now_hotel(id) {

                  var stay_days= give_diffrence_hotel_date();

                      if (stay_days > 0) {

              const checkin_date = document.getElementById('checkin').value;
              const checkout_date = document.getElementById('checkout').value;
              const number_room = document.getElementById('room_count').innerHTML;
              const number_adult = document.getElementById('adult_count').innerHTML;
              const child_count = document.getElementById('child_count').innerHTML;
              const price = document.getElementById('price_hotel').innerHTML;
              var query = "book_now_hotel.php?hotel_id=<?php echo $id;?>&checkin_date="+ checkin_date +"&checkout_date=" +checkout_date+ "&number_room=" +number_room+"&number_adult="+number_adult+"&number_child="+child_count+"&price="+price;
              window.location.href = query;
            }else {
              update_staus_error("Please Select Minimin Of One Day");
            }

            }
            ///////////////////////////////////////////////Hotel_add///////////////////////////////////////////////////

  </script>





                        <script type="text/javascript">

                        function add_adult(){
                        var num =  parseInt(document.getElementById('adult_count').innerHTML);
                        max = parseInt(document.getElementById('room_count').innerHTML)*3 - 1;
                        if (num <= max) {
                            document.getElementById('adult_count').innerHTML = num+1;
                        }else{
                          add_room();
                          document.getElementById('adult_count').innerHTML = num+1;
                        }

                        updatePrice();
                        }

                        function sub_adult(){
                        var num =  parseInt(document.getElementById('adult_count').innerHTML);
                        min = 2;
                        if (num >= min) {
                          document.getElementById('adult_count').innerHTML = parseInt(num)-1;
                          update_room(num-1);
                        }

                        updatePrice();

                      }


                      function add_child(){
                      var num =  parseInt(document.getElementById('child_count').innerHTML);
                      max = parseInt(document.getElementById('room_count').innerHTML)*3 - 1;
                      if (num <= max) {
                          document.getElementById('child_count').innerHTML = num+1;
                      }
                      updatePrice();
                    }

                      function sub_child(){
                      var num =  parseInt(document.getElementById('child_count').innerHTML);
                      min = 1;
                      if (num >= min) {
                        document.getElementById('child_count').innerHTML = parseInt(num)-1;
                      }
                      updatePrice();
                    }


                    function  update_room(num){
                        var num_room = document.getElementById("room_count").innerHTML;
                        if (parseInt(num)%3 == 0) {
                          num_room = parseInt(num)/3;
                        }else{
                          num_room = Math.ceil(parseInt(num)/3+0.33);
                        }
                        document.getElementById('room_count').innerHTML = num_room;
                        updatePrice();
                      }



                      function add_room(){
                        var num =  parseInt(document.getElementById('adult_count').innerHTML);
                        var num_room =  parseInt(document.getElementById('room_count').innerHTML);

                        if (num_room<num) {
                          document.getElementById('room_count').innerHTML = num_room+1;
                        }
                        updatePrice();
                      }

                      function sub_room(){
                        var num_room =  parseInt(document.getElementById('room_count').innerHTML);
                        if (num_room > 1) {
                          document.getElementById('room_count').innerHTML = num_room-1;
                        }
                        updatePrice();
                      }


                        click_count = 0;
                        function update_price_hotel(hell,hotel_id,mode){
                        var num = document.getElementById('adult_count').innerHTML;
                        var num_room = document.getElementById('room_count').innerHTML;

                        var stay_days= give_diffrence_hotel_date();

                        if (stay_days>0) {
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
                          if (click_count > 0) {
                            update_staus_error("Please Select Minimin Of One Day");
                          }else {
                            click_count++;
                        }
                    }
                  }

/*
                        var click_count = 0;
                        function update_price_hotel(hell,hotel_id,mode)
                        {



                          console.log(stay_days);

                          if (stay_days > 0) {

                          if (mode == 0) {
                            //console.log(hell.value);
                            var num = hell.value;
                            var num_room = document.getElementById("room_count").innerHTML;
                            if (parseInt(num)%3 == 0) {
                              num_room = parseInt(num)/3;
                            }else{
                              num_room = Math.ceil(parseInt(num)/3+0.33);
                            }
                            document.getElementById("room_count").innerHTML = num_room;
                          }
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
                            if (click_count > 0) {

                            }else {
                              click_count++;
                            }
                          }
                        }

*/
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
                          try{
                            document.getElementById("button_to_click_for_hotel_price").click();
                          }catch(e){

                          }finally{

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
                          });


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




</body>

</html>
