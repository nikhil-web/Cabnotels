<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
   header("location:login.php");
}else{
  $login_flag = 1;
}
if (isset($_GET['query'])) {
  // code...
  $flag_query = mysqli_real_escape_string($db,$_GET['query']);
}else {
  $flag_query = "";
}


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Cabnotels | User </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#ffdd00">
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
    <meta name="theme-color" content="#ffdd00">
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
     /*--header--*/
     .navigation{
       position: relative;
       background-color: #3c3c3c;
       z-index: 999;
       transition-duration: 0.5s;
     }



     .inner-nav{
       width: 90%;
       margin: auto;
       display: flex;
       justify-content: space-between;
     }

     .logo-holder{
     width:80px;
     }

     .linkholder a {
         background: none;
         padding: 10px 25px;
         display: block;
         margin-top: -7px;
         text-transform: uppercase;
         color: #ffffff;
         letter-spacing: 1px;
         border: 1px solid #ffffff1f;
         font-size: 14px;
         margin-right: 2px;
     }

     .combine-links{
       display: flex;
     align-items: center;
     vertical-align: middle;
     }

     .link-holder{
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .link-holder a {
         background: none;
         padding: 10px 25px;
         display: block;
         margin-top: -7px;
         text-transform: uppercase;
         color: #ffffff;
         letter-spacing: 1px;
         border: 1px solid #ffffff00;
         font-size: 14px;
         margin-right: 2px;
     }

     .link-holder a:hover{
       background: #ffdd00;
         color: #3c3c3c;
         border: 1px solid #ffffff;
     }

     .link-active{
       background: #ffdd00 !important;
         color: #3c3c3c !important;
     }


     .hamburger-holder{
         transition-duration: 0.5s;
         display: flex;
         position: relative;
         background: #ffdd00;
         width: 50px;
         height: 50px;
         align-items: center;
         justify-content: center;
         margin-bottom: 10px;
         border-radius: 25px;
     }

     .login-cart{
       display:flex;
       margin: 0 0 0 20px;
     }

     .hamburger-icon-holder{
       display: none;
     }

     /*updated media queries */


     /*UHD devices */

     @media (max-width: 1440px){


     }


     /*tablets */

     @media (max-width: 768px){

       .hamburger-icon-holder{
         display: flex;
         justify-content: space-between;
       }

       /*--header--*/
       .navigation{
         height: 70px;
         position: relative;
         z-index: 999;
         overflow: hidden;
       }



       .inner-nav{
         width: 90%;
         margin: auto;
         display: block;
         justify-content: space-between;
       }

       .logo-holder{width:80px;position: relative;margin: auto;margin-bottom: 44px;}

       .linkholder a {
           background: none;
           padding: 10px 25px;
           display: block;
           margin-top: -7px;
           text-transform: uppercase;
           color: #ffffff;
           letter-spacing: 1px;
           border: 1px solid #ffffff1f;
           font-size: 14px;
           margin-right: 2px;
       }

       .combine-links{
         display: block;
       }

       .link-holder{
           display: block;
           align-items: center;
           justify-content: center;
           margin: 10px;
           text-align: center;
       }

       .link-holder a {
           background: none;
           padding: 10px 25px;
           display: block;
           margin-top: -7px;
           text-transform: uppercase;
           color: #ffffff;
           letter-spacing: 1px;
           border: 1px solid #ffffff1f;
           font-size: 14px;
           margin-right: 2px;
       }

       .link-holder a:hover{
         background: #ffdd00;
           color: #3c3c3c;
           border: 1px solid #ffffff;
       }

       .login-cart{
         display:flex;
         justify-content: space-between;
         margin: 20 0 0 0;
       }

       /*--header--*/
     }

     /*large phone */


     @media (max-width: 425px){

     }


     /*medium phone*/
     @media (max-width: 375px){


     }


     /*small phone*/
     @media (max-width: 320px){


     }


     .expand{
       height: 100vh !important;
       background: #3c3c3c;
     }

     .rotate{
       transform: rotate(90deg);
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

<body id="body_ace">


  <?php
   if ($_SESSION["ver_status"] == 0){
     include 'mailer/welcome_mail.php';
   }
   ?>

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <?php include 'includes/navbar-user.php'; ?>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Hi, <?php echo $_SESSION["first_name"]; ?> </h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                          <p>Your Profie for cabnotels</p>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div style="background: #ffdd00;" class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        <img src="<?php echo $_SESSION["user_image"] ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0"><?php echo $_SESSION["user_name"]; ?></h2>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Contact Information</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $_SESSION["user_email"]; ?></li>
                                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $_SESSION["user_phone"]; ?></li>
                                    </ul>
                                    </div>
                                </div>


                            </div>
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">

                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Orders</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Account</a>
                                    </li>

                                    <li class="nav-item">
                                      <a class="nav-link" id="cart_button_press" data-toggle="pill" href="#pills-cart" role="tab" aria-controls="pills-packages" aria-selected="false">Cart</a>

                                        <!--<a class="nav-link" href="cart.php" role="tab">Cart</a>-->
                                    </li>

                                </ul>

                            <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h3 class="section-title">My Orders Stats</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body" >
                                                        <h1 class="mb-1" id="total_orders">?</h1>
                                                        <p>Items In Cart</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1" id="completed_orders">?</h1>
                                                        <p>Completed Orders</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1" id="canc_orders">?</h1>
                                                        <p>Canceled</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="pills-regular">

                                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Upcoming</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false">Completed</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="contact" aria-selected="false">Cancled</a>
                                                    </li>
                                                </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                    <!--Tab one-->
                                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                            <div class="section-block">
                                                                    <h3 class="section-title">Upcoming Orders</h3>
                                                            </div>

                                                              <div class="row">
                                                                <?php
                                                                $sql = 'SELECT * FROM cart WHERE status = 0 AND user_id = '.$_SESSION["user_id"].' ORDER BY id ASC';
                                                                $result = mysqli_query($db, $sql);
                                                                      if (mysqli_num_rows($result) > 0) {
                                                                        $count = 0;
                                                                       while($row= mysqli_fetch_assoc($result)) {

                                                                         if($row["cart_item_type"]==1){
                                                                           $sql_hotel = 'SELECT * FROM hotels WHERE hotel_id = '.$row["item_id"].'';
                                                                           $result_hotel = mysqli_query($db, $sql_hotel);
                                                                                 if (mysqli_num_rows($result_hotel) > 0) {
                                                                                  $row_hotel= mysqli_fetch_assoc($result_hotel);
                                                                            echo '
                                                                            <div class="col-lg-12">
                                                                              <div class="card">
                                                                                <h5 class="card-header"> Hotel Booking</h5>
                                                                                <div class="card-body">
                                                                                  <h3 class="card-title">'.$row_hotel["hotel_name"].'</h3>
                                                                                  <hr />
                                                                                    <div class="row my-3">
                                                                                      <div class="col-4">
                                                                                        <h5 class="card-title my-1">Booking Date</h5>
                                                                                        <p class="card-text my-0"> <strong>From</strong></p>
                                                                                        <p class="card-text">'.$row["start_date"].'</p>
                                                                                        <p class="card-text my-0"> <strong>To</strong></p>
                                                                                        <p class="card-text">'.$row["end_date"].'</p>
                                                                                      </div>
                                                                                      <div class="col-4">
                                                                                        <h5 class="card-title my-1">Guests</h5>
                                                                                        <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                        <p class="card-text">'.$row["adult_count"].'</p>
                                                                                        <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                        <p class="card-text">'.$row["child_count"].'</p>
                                                                                      </div>
                                                                                      <div class="col-4">
                                                                                      <h3 class="card-title my-1">Price</h3>
                                                                                      <h2 class="card-text">'.$row["item_price"].' ₹</h2>
                                                                                      </div>

                                                                                    </div>
                                                                                    <hr/>


                                                                                  <a href="#" class="btn btn-primary">Details</a>
                                                                                  <a href="#" class="btn btn-danger">Cancel</a>

                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                           ';
                                                                         }
                                                                         }elseif ($row["cart_item_type"]==2) {
                                                                           // code...
                                                                            $sql_tour = 'SELECT * FROM tours WHERE tour_id = '.$row["item_id"].'';
                                                                            $result_tour = mysqli_query($db, $sql_tour);
                                                                                  if (mysqli_num_rows($result_tour) > 0) {
                                                                                   $row_tour = mysqli_fetch_assoc($result_tour);
                                                                                    echo'
                                                                                    <div class="col-lg-12">
                                                                                      <div class="card">
                                                                                        <h5 class="card-header">Tour Booking</h5>
                                                                                        <div class="card-body">
                                                                                          <h3 class="card-title">'.$row_tour["tour_name"].'</h3>
                                                                                          <hr />
                                                                                            <div class="row my-3">
                                                                                              <div class="col-lg-3">
                                                                                                <h5 class="card-title my-1">Booking Date</h5>
                                                                                                <p class="card-text"> '.$row["start_date"].'</p>
                                                                                              </div>
                                                                                              <div class="col-lg-3">
                                                                                                <h5 class="card-title my-1">Cab Type</h5>
                                                                                                <p class="card-text"> ';
                                                                                                if ($row["cab_type"]== 1) {
                                                                                                   $cab_type = "Hatchback(AC)";
                                                                                                }elseif ($row["cab_type"] == 2) {
                                                                                                  // code...
                                                                                                  $cab_type = "Sedan(AC)";

                                                                                                }elseif ($row["cab_type"] == 3) {
                                                                                                  // code...
                                                                                                  $cab_type = "SUV(AC)";

                                                                                                }

                                                                                                echo $cab_type;


                                                                                                echo '</p>
                                                                                              </div>
                                                                                              <div class="col-lg-3">
                                                                                                <h5 class="card-title my-1">Hotel Type</h5>
                                                                                                <p class="card-text">';

                                                                                                if ($row["room_type"] == 2) {
                                                                                                   $hotel_type = "2 Star Accomodation";
                                                                                                }elseif ($row["room_type"] == 3) {
                                                                                                  // code...
                                                                                                  $hotel_type = "3 Star Accomodation";
                                                                                                }elseif ($row["room_type"] == 4) {
                                                                                                  // code...
                                                                                                  $hotel_type = "4 Star Accomodation";
                                                                                                }elseif ($row["room_type"] == 5) {
                                                                                                  // code...
                                                                                                  $hotel_type = "5 Star Accomodation";
                                                                                                }

                                                                                                echo $hotel_type;

                                                                                              echo '</p>
                                                                                              </div>
                                                                                              <div class="col-lg-3">
                                                                                                <h5 class="card-title my-1">Number Of People</h5>
                                                                                                <div class="row">
                                                                                                    <div class="col-4">
                                                                                                    <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                                    <p class="card-text">'.$row["adult_count"].'</p>
                                                                                                    </div>
                                                                                                    <div class="col">
                                                                                                    <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                                    <p class="card-text">'.$row["child_count"].'</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="col-12 my-2">
                                                                                              <h4 class="card-title my-1">Price</h4>
                                                                                              <h3 class="card-text">'.$row["item_price"].' ₹</h3>
                                                                                              </div>

                                                                                            </div>
                                                                                            <hr />


                                                                                          <a href="#" class="btn btn-primary">Details</a>
                                                                                          <a href="#" class="btn btn-danger">Cancel</a>

                                                                                        </div>
                                                                                        </div>
                                                                                    </div>
                                                                                  ';
                                                                                 }
                                                                         }elseif ($row["cart_item_type"]==3) {
                                                                           // code...
                                                                           $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
                                                                           $result_taxi = mysqli_query($db, $sql_taxi);
                                                                                 if (mysqli_num_rows($result_taxi) > 0) {
                                                                                  $row_taxi = mysqli_fetch_assoc($result_taxi);
                                                                                 echo '

                                                                                 <div class="col-lg-12">
                                                                                   <div class="card">
                                                                                     <h5 class="card-header">Taxi Booking</h5>
                                                                                     <div class="card-body">
                                                                                       <h3 class="card-title">'.$row_taxi["taxi_name"].'</h3>
                                                                                       <hr />
                                                                                       <div class="row my-3">
                                                                                         <div class="col-4">
                                                                                           <h5 class="card-title my-1">Booking Date</h5>
                                                                                           <p class="card-text my-0"> <strong>Date</strong></p>
                                                                                           <p class="card-text">'.$row["start_date"].'</p>
                                                                                           <p class="card-text my-0"> <strong>Pickup Time</strong></p>
                                                                                           <p class="card-text">'.$row["pickup_time"].'</p>
                                                                                         </div>
                                                                                         <div class="col-4">
                                                                                           <h5 class="card-title my-1">Pickup Locale</h5>
                                                                                           <p class="card-text my-0"> <strong>Location</strong></p>
                                                                                           <p class="card-text">'.$row["pickup_location"].'</p>
                                                                                           <p class="card-text my-0"> <strong>Ride Duration</strong></p>
                                                                                           <p class="card-text">'.$row["cab_hours"].' Hours</p>
                                                                                         </div>
                                                                                         <div class="col-4">
                                                                                         <h3 class="card-title my-1">Price</h3>
                                                                                         <h2 class="card-text">'.$row["item_price"].' ₹</h2>
                                                                                         </div>

                                                                                       </div>
                                                                                       <hr/>
                                                                                       <a href="#" class="btn btn-primary">Details</a>
                                                                                       <a href="#" class="btn btn-danger">Cancel</a>

                                                                                     </div>
                                                                                     </div>
                                                                                 </div>';
                                                                                }
                                                                         }elseif ($row["cart_item_type"]==4) {
                                                                           // code...
                                                                           $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
                                                                           $result_taxi = mysqli_query($db, $sql_taxi);
                                                                                 if (mysqli_num_rows($result_taxi) > 0) {
                                                                                  $row_taxi = mysqli_fetch_assoc($result_taxi);
                                                                                 echo '

                                                                                 <div class="col-lg-12">
                                                                                   <div class="card">
                                                                                     <h5 class="card-header">Taxi Booking</h5>
                                                                                     <div class="card-body">
                                                                                       <h3 class="card-title">'.$row_taxi["taxi_name"].'</h3>
                                                                                       <hr />
                                                                                       <div class="row my-3">
                                                                                         <div class="col-4">
                                                                                           <h5 class="card-title my-1">Booking Date</h5>
                                                                                           <p class="card-text my-0"> <strong>From</strong></p>
                                                                                           <p class="card-text">'.$row["start_date"].'</p>
                                                                                           <p class="card-text my-0"> <strong>To</strong></p>
                                                                                           <p class="card-text">'.$row["end_date"].'</p>
                                                                                         </div>
                                                                                         <div class="col-4">
                                                                                           <h5 class="card-title my-1">Guests</h5>
                                                                                           <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                           <p class="card-text">'.$row["head_count"].'</p>
                                                                                           <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                           <p class="card-text">0</p>
                                                                                         </div>
                                                                                         <div class="col-4">
                                                                                         <h3 class="card-title my-1">Price</h3>
                                                                                         <h2 class="card-text">'.$row["item_price"].'</h2>
                                                                                         </div>

                                                                                       </div>
                                                                                       <hr/>
                                                                                       <a href="#" class="btn btn-primary">Details</a>
                                                                                       <a href="#" class="btn btn-danger">Cancel</a>

                                                                                     </div>
                                                                                     </div>
                                                                                 </div>';
                                                                                }
                                                                         }else {
                                                                           // code...
                                                                         }
                                                                       }
                                                                     }

                                                                     ?>
                                                              </div>


                                                    </div>
                                                     <!--Tab one-->

                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                            <div class="section-block">
                                                                    <h3 class="section-title">Completed Orders</h3>
                                                            </div>

                                                            <div class="row">
                                                              <?php
                                                              $sql = 'SELECT * FROM cart WHERE status = 1 AND user_id = '.$_SESSION["user_id"].' ORDER BY id ASC';
                                                              $result = mysqli_query($db, $sql);
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                      $count = 0;
                                                                     while($row= mysqli_fetch_assoc($result)) {

                                                                       if($row["cart_item_type"]==1){
                                                                         $sql_hotel = 'SELECT * FROM hotels WHERE hotel_id = '.$row["item_id"].'';
                                                                         $result_hotel = mysqli_query($db, $sql_hotel);
                                                                               if (mysqli_num_rows($result_hotel) > 0) {
                                                                                $row_hotel= mysqli_fetch_assoc($result_hotel);
                                                                          echo '
                                                                          <div class="col-lg-12">
                                                                            <div class="card">
                                                                              <h5 class="card-header"> Hotel Booking</h5>
                                                                              <div class="card-body">
                                                                                <h3 class="card-title">'.$row_hotel["hotel_name"].'</h3>
                                                                                <hr />
                                                                                  <div class="row my-3">
                                                                                    <div class="col-4">
                                                                                      <h5 class="card-title my-1">Booking Date</h5>
                                                                                      <p class="card-text my-0"> <strong>From</strong></p>
                                                                                      <p class="card-text">'.$row["start_date"].'</p>
                                                                                      <p class="card-text my-0"> <strong>To</strong></p>
                                                                                      <p class="card-text">'.$row["end_date"].'</p>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                      <h5 class="card-title my-1">Guests</h5>
                                                                                      <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                      <p class="card-text">'.$row["adult_count"].'</p>
                                                                                      <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                      <p class="card-text">'.$row["child_count"].'</p>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                    <h3 class="card-title my-1">Price</h3>
                                                                                    <h2 class="card-text">'.$row["item_price"].' ₹</h2>
                                                                                    </div>

                                                                                  </div>
                                                                                  <hr/>


                                                                                <a href="#" class="btn btn-primary">Details</a>
                                                                                <a href="#" class="btn btn-danger">Cancel</a>

                                                                              </div>
                                                                              </div>
                                                                          </div>
                                                                         ';
                                                                       }
                                                                       }elseif ($row["cart_item_type"]==2) {
                                                                         // code...
                                                                          $sql_tour = 'SELECT * FROM tours WHERE tour_id = '.$row["item_id"].'';
                                                                          $result_tour = mysqli_query($db, $sql_tour);
                                                                                if (mysqli_num_rows($result_tour) > 0) {
                                                                                 $row_tour = mysqli_fetch_assoc($result_tour);
                                                                                  echo'
                                                                                  <div class="col-lg-12">
                                                                                    <div class="card">
                                                                                      <h5 class="card-header">Tour Booking</h5>
                                                                                      <div class="card-body">
                                                                                        <h3 class="card-title">'.$row_tour["tour_name"].'</h3>
                                                                                        <hr />
                                                                                          <div class="row my-3">
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Booking Date</h5>
                                                                                              <p class="card-text"> '.$row["start_date"].'</p>
                                                                                            </div>
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Cab Type</h5>
                                                                                              <p class="card-text"> ';
                                                                                              if ($row["cab_type"]== 1) {
                                                                                                 $cab_type = "Hatchback(AC)";
                                                                                              }elseif ($row["cab_type"] == 2) {
                                                                                                // code...
                                                                                                $cab_type = "Sedan(AC)";

                                                                                              }elseif ($row["cab_type"] == 3) {
                                                                                                // code...
                                                                                                $cab_type = "SUV(AC)";

                                                                                              }

                                                                                              echo $cab_type;


                                                                                              echo '</p>
                                                                                            </div>
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Hotel Type</h5>
                                                                                              <p class="card-text">';

                                                                                              if ($row["room_type"] == 2) {
                                                                                                 $hotel_type = "2 Star Accomodation";
                                                                                              }elseif ($row["room_type"] == 3) {
                                                                                                // code...
                                                                                                $hotel_type = "3 Star Accomodation";
                                                                                              }elseif ($row["room_type"] == 4) {
                                                                                                // code...
                                                                                                $hotel_type = "4 Star Accomodation";
                                                                                              }elseif ($row["room_type"] == 5) {
                                                                                                // code...
                                                                                                $hotel_type = "5 Star Accomodation";
                                                                                              }

                                                                                              echo $hotel_type;

                                                                                            echo '</p>
                                                                                            </div>
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Number Of People</h5>
                                                                                              <div class="row">
                                                                                                  <div class="col-4">
                                                                                                  <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                                  <p class="card-text">'.$row["adult_count"].'</p>
                                                                                                  </div>
                                                                                                  <div class="col">
                                                                                                  <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                                  <p class="card-text">'.$row["child_count"].'</p>
                                                                                                  </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-12 my-2">
                                                                                            <h4 class="card-title my-1">Price</h4>
                                                                                            <h3 class="card-text">'.$row["item_price"].' ₹</h3>
                                                                                            </div>

                                                                                          </div>
                                                                                          <hr />


                                                                                        <a href="#" class="btn btn-primary">Details</a>
                                                                                        <a href="#" class="btn btn-danger">Cancel</a>

                                                                                      </div>
                                                                                      </div>
                                                                                  </div>
                                                                                ';
                                                                               }
                                                                       }elseif ($row["cart_item_type"]==3) {
                                                                         // code...
                                                                         $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
                                                                         $result_taxi = mysqli_query($db, $sql_taxi);
                                                                               if (mysqli_num_rows($result_taxi) > 0) {
                                                                                $row_taxi = mysqli_fetch_assoc($result_taxi);
                                                                               echo '

                                                                               <div class="col-lg-12">
                                                                                 <div class="card">
                                                                                   <h5 class="card-header">Taxi Booking</h5>
                                                                                   <div class="card-body">
                                                                                     <h3 class="card-title">'.$row_taxi["taxi_name"].'</h3>
                                                                                     <hr />
                                                                                     <div class="row my-3">
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Booking Date</h5>
                                                                                         <p class="card-text my-0"> <strong>Date</strong></p>
                                                                                         <p class="card-text">'.$row["start_date"].'</p>
                                                                                         <p class="card-text my-0"> <strong>Pickup Time</strong></p>
                                                                                         <p class="card-text">'.$row["pickup_time"].'</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Pickup Locale</h5>
                                                                                         <p class="card-text my-0"> <strong>Location</strong></p>
                                                                                         <p class="card-text">'.$row["pickup_location"].'</p>
                                                                                         <p class="card-text my-0"> <strong>Ride Duration</strong></p>
                                                                                         <p class="card-text">'.$row["cab_hours"].' Hours</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                       <h3 class="card-title my-1">Price</h3>
                                                                                       <h2 class="card-text">'.$row["item_price"].' ₹</h2>
                                                                                       </div>

                                                                                     </div>
                                                                                     <hr/>
                                                                                     <a href="#" class="btn btn-primary">Details</a>
                                                                                     <a href="#" class="btn btn-danger">Cancel</a>

                                                                                   </div>
                                                                                   </div>
                                                                               </div>';
                                                                              }
                                                                       }elseif ($row["cart_item_type"]==4) {
                                                                         // code...
                                                                         $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
                                                                         $result_taxi = mysqli_query($db, $sql_taxi);
                                                                               if (mysqli_num_rows($result_taxi) > 0) {
                                                                                $row_taxi = mysqli_fetch_assoc($result_taxi);
                                                                               echo '

                                                                               <div class="col-lg-12">
                                                                                 <div class="card">
                                                                                   <h5 class="card-header">Taxi Booking</h5>
                                                                                   <div class="card-body">
                                                                                     <h3 class="card-title">'.$row_taxi["taxi_name"].'</h3>
                                                                                     <hr />
                                                                                     <div class="row my-3">
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Booking Date</h5>
                                                                                         <p class="card-text my-0"> <strong>From</strong></p>
                                                                                         <p class="card-text">'.$row["start_date"].'</p>
                                                                                         <p class="card-text my-0"> <strong>To</strong></p>
                                                                                         <p class="card-text">'.$row["end_date"].'</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Guests</h5>
                                                                                         <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                         <p class="card-text">'.$row["head_count"].'</p>
                                                                                         <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                         <p class="card-text">0</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                       <h3 class="card-title my-1">Price</h3>
                                                                                       <h2 class="card-text">'.$row["item_price"].'</h2>
                                                                                       </div>

                                                                                     </div>
                                                                                     <hr/>
                                                                                     <a href="#" class="btn btn-primary">Details</a>
                                                                                     <a href="#" class="btn btn-danger">Cancel</a>

                                                                                   </div>
                                                                                   </div>
                                                                               </div>';
                                                                              }
                                                                       }else {
                                                                         // code...
                                                                       }
                                                                     }
                                                                   }

                                                                   ?>
                                                            </div>


                                                    </div>


                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                            <div class="section-block">
                                                                    <h3 class="section-title">Cancled Orders</h3>
                                                            </div>

                                                            <div class="row">
                                                              <?php
                                                              $sql = 'SELECT * FROM cart WHERE status = -1 AND user_id = '.$_SESSION["user_id"].' ORDER BY id ASC';
                                                              $result = mysqli_query($db, $sql);
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                      $count = 0;
                                                                     while($row= mysqli_fetch_assoc($result)) {

                                                                       if($row["cart_item_type"]==1){
                                                                         $sql_hotel = 'SELECT * FROM hotels WHERE hotel_id = '.$row["item_id"].'';
                                                                         $result_hotel = mysqli_query($db, $sql_hotel);
                                                                               if (mysqli_num_rows($result_hotel) > 0) {
                                                                                $row_hotel= mysqli_fetch_assoc($result_hotel);
                                                                          echo '
                                                                          <div class="col-lg-12">
                                                                            <div class="card">
                                                                              <h5 class="card-header"> Hotel Booking</h5>
                                                                              <div class="card-body">
                                                                                <h3 class="card-title">'.$row_hotel["hotel_name"].'</h3>
                                                                                <hr />
                                                                                  <div class="row my-3">
                                                                                    <div class="col-4">
                                                                                      <h5 class="card-title my-1">Booking Date</h5>
                                                                                      <p class="card-text my-0"> <strong>From</strong></p>
                                                                                      <p class="card-text">'.$row["start_date"].'</p>
                                                                                      <p class="card-text my-0"> <strong>To</strong></p>
                                                                                      <p class="card-text">'.$row["end_date"].'</p>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                      <h5 class="card-title my-1">Guests</h5>
                                                                                      <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                      <p class="card-text">'.$row["adult_count"].'</p>
                                                                                      <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                      <p class="card-text">'.$row["child_count"].'</p>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                    <h3 class="card-title my-1">Price</h3>
                                                                                    <h2 class="card-text">'.$row["item_price"].' ₹</h2>
                                                                                    </div>

                                                                                  </div>
                                                                                  <hr/>


                                                                                <a href="#" class="btn btn-primary">Details</a>
                                                                                <a href="#" class="btn btn-danger">Cancel</a>

                                                                              </div>
                                                                              </div>
                                                                          </div>
                                                                         ';
                                                                       }
                                                                       }elseif ($row["cart_item_type"]==2) {
                                                                         // code...
                                                                          $sql_tour = 'SELECT * FROM tours WHERE tour_id = '.$row["item_id"].'';
                                                                          $result_tour = mysqli_query($db, $sql_tour);
                                                                                if (mysqli_num_rows($result_tour) > 0) {
                                                                                 $row_tour = mysqli_fetch_assoc($result_tour);
                                                                                  echo'
                                                                                  <div class="col-lg-12">
                                                                                    <div class="card">
                                                                                      <h5 class="card-header">Tour Booking</h5>
                                                                                      <div class="card-body">
                                                                                        <h3 class="card-title">'.$row_tour["tour_name"].'</h3>
                                                                                        <hr />
                                                                                          <div class="row my-3">
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Booking Date</h5>
                                                                                              <p class="card-text"> '.$row["start_date"].'</p>
                                                                                            </div>
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Cab Type</h5>
                                                                                              <p class="card-text"> ';
                                                                                              if ($row["cab_type"]== 1) {
                                                                                                 $cab_type = "Hatchback(AC)";
                                                                                              }elseif ($row["cab_type"] == 2) {
                                                                                                // code...
                                                                                                $cab_type = "Sedan(AC)";

                                                                                              }elseif ($row["cab_type"] == 3) {
                                                                                                // code...
                                                                                                $cab_type = "SUV(AC)";

                                                                                              }

                                                                                              echo $cab_type;


                                                                                              echo '</p>
                                                                                            </div>
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Hotel Type</h5>
                                                                                              <p class="card-text">';

                                                                                              if ($row["room_type"] == 2) {
                                                                                                 $hotel_type = "2 Star Accomodation";
                                                                                              }elseif ($row["room_type"] == 3) {
                                                                                                // code...
                                                                                                $hotel_type = "3 Star Accomodation";
                                                                                              }elseif ($row["room_type"] == 4) {
                                                                                                // code...
                                                                                                $hotel_type = "4 Star Accomodation";
                                                                                              }elseif ($row["room_type"] == 5) {
                                                                                                // code...
                                                                                                $hotel_type = "5 Star Accomodation";
                                                                                              }

                                                                                              echo $hotel_type;

                                                                                            echo '</p>
                                                                                            </div>
                                                                                            <div class="col-lg-3">
                                                                                              <h5 class="card-title my-1">Number Of People</h5>
                                                                                              <div class="row">
                                                                                                  <div class="col-4">
                                                                                                  <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                                  <p class="card-text">'.$row["adult_count"].'</p>
                                                                                                  </div>
                                                                                                  <div class="col">
                                                                                                  <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                                  <p class="card-text">'.$row["child_count"].'</p>
                                                                                                  </div>
                                                                                              </div>
                                                                                            </div>
                                                                                            <div class="col-12 my-2">
                                                                                            <h4 class="card-title my-1">Price</h4>
                                                                                            <h3 class="card-text">'.$row["item_price"].' ₹</h3>
                                                                                            </div>

                                                                                          </div>
                                                                                          <hr />


                                                                                        <a href="#" class="btn btn-primary">Details</a>
                                                                                        <a href="#" class="btn btn-danger">Cancel</a>

                                                                                      </div>
                                                                                      </div>
                                                                                  </div>
                                                                                ';
                                                                               }
                                                                       }elseif ($row["cart_item_type"]==3) {
                                                                         // code...
                                                                         $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
                                                                         $result_taxi = mysqli_query($db, $sql_taxi);
                                                                               if (mysqli_num_rows($result_taxi) > 0) {
                                                                                $row_taxi = mysqli_fetch_assoc($result_taxi);
                                                                               echo '

                                                                               <div class="col-lg-12">
                                                                                 <div class="card">
                                                                                   <h5 class="card-header">Taxi Booking</h5>
                                                                                   <div class="card-body">
                                                                                     <h3 class="card-title">'.$row_taxi["taxi_name"].'</h3>
                                                                                     <hr />
                                                                                     <div class="row my-3">
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Booking Date</h5>
                                                                                         <p class="card-text my-0"> <strong>Date</strong></p>
                                                                                         <p class="card-text">'.$row["start_date"].'</p>
                                                                                         <p class="card-text my-0"> <strong>Pickup Time</strong></p>
                                                                                         <p class="card-text">'.$row["pickup_time"].'</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Pickup Locale</h5>
                                                                                         <p class="card-text my-0"> <strong>Location</strong></p>
                                                                                         <p class="card-text">'.$row["pickup_location"].'</p>
                                                                                         <p class="card-text my-0"> <strong>Ride Duration</strong></p>
                                                                                         <p class="card-text">'.$row["cab_hours"].' Hours</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                       <h3 class="card-title my-1">Price</h3>
                                                                                       <h2 class="card-text">'.$row["item_price"].' ₹</h2>
                                                                                       </div>

                                                                                     </div>
                                                                                     <hr/>
                                                                                     <a href="#" class="btn btn-primary">Details</a>
                                                                                     <a href="#" class="btn btn-danger">Cancel</a>

                                                                                   </div>
                                                                                   </div>
                                                                               </div>';
                                                                              }
                                                                       }elseif ($row["cart_item_type"]==4) {
                                                                         // code...
                                                                         $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
                                                                         $result_taxi = mysqli_query($db, $sql_taxi);
                                                                               if (mysqli_num_rows($result_taxi) > 0) {
                                                                                $row_taxi = mysqli_fetch_assoc($result_taxi);
                                                                               echo '

                                                                               <div class="col-lg-12">
                                                                                 <div class="card">
                                                                                   <h5 class="card-header">Taxi Booking</h5>
                                                                                   <div class="card-body">
                                                                                     <h3 class="card-title">'.$row_taxi["taxi_name"].'</h3>
                                                                                     <hr />
                                                                                     <div class="row my-3">
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Booking Date</h5>
                                                                                         <p class="card-text my-0"> <strong>From</strong></p>
                                                                                         <p class="card-text">'.$row["start_date"].'</p>
                                                                                         <p class="card-text my-0"> <strong>To</strong></p>
                                                                                         <p class="card-text">'.$row["end_date"].'</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                         <h5 class="card-title my-1">Guests</h5>
                                                                                         <p class="card-text my-0"> <strong>Adults</strong></p>
                                                                                         <p class="card-text">'.$row["head_count"].'</p>
                                                                                         <p class="card-text my-0"> <strong>Children</strong></p>
                                                                                         <p class="card-text">0</p>
                                                                                       </div>
                                                                                       <div class="col-4">
                                                                                       <h3 class="card-title my-1">Price</h3>
                                                                                       <h2 class="card-text">'.$row["item_price"].'</h2>
                                                                                       </div>

                                                                                     </div>
                                                                                     <hr/>
                                                                                     <a href="#" class="btn btn-primary">Details</a>
                                                                                     <a href="#" class="btn btn-danger">Cancel</a>

                                                                                   </div>
                                                                                   </div>
                                                                               </div>';
                                                                              }
                                                                       }else {
                                                                         // code...
                                                                       }
                                                                     }
                                                                   }

                                                                   ?>
                                                            </div>

                                                      </div>

                                                </div>
                                              </div>
                                            </div>

                  <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="section-block">
                              <h3 class="section-title">My Info</h3>
                          </div>
                      </div>
                    </div>

                          <div class="card">
                                                    <div class="card-body">
                                                            <div class="section-block">
                                                                    <h2 class="section-title">Personal information <a href="#" class="btn btn-rounded btn-primary">Edit</a></h2>
                                                            </div>

                                                            <form>
                                                                    <div class="form-group">
                                                                      <label for="exampleInputEmail1">Email address</label>
                                                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="exampleInputPassword1">Password</label>
                                                                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                                    </div>
                                                                    <div class="form-check">
                                                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                      <label class="form-check-label" for="exampleCheck1">Logout From Other </label>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-rounded btn-secondary mt-3 mr-2">Save</a>
                                                                    <button type="reset" class="btn btn-rounded  mt-3">Reset</a>
                                                                  </form>



                                                    </div>
                                                    <div class="card-footer">
                                                      <small class="text-muted">Last updated 3 mins ago</small>
                                                    </div>
                                                  </div>


                                            <div class="card">
                                                    <div class="card-body">
                                                            <div class="section-block">
                                                                    <h2 class="section-title">Contact information <a href="#" class="btn btn-rounded btn-primary">Edit</a></h2>
                                                            </div>

                                                            <p>Here wil be the form</p>


                                                      <a href="#" class="btn btn-rounded btn-secondary">Save</a>
                                                    </div>
                                                    <div class="card-footer">
                                                      <small class="text-muted">Last updated 3 mins ago</small>
                                                    </div>
                                                  </div>


                                            <div class="card">
                                                    <div class="card-body">
                                                            <div class="section-block">
                                                                    <h2 class="section-title">Account information <a href="#" class="btn btn-rounded btn-primary">Edit</a></h2>
                                                            </div>

                                                            <p>Here wil be the form</p>


                                                      <a href="#" class="btn btn-rounded btn-secondary">Save</a>
                                                    </div>
                                                    <div class="card-footer">
                                                      <small class="text-muted">Last updated 3 mins ago</small>
                                                    </div>
                                                  </div>

            </div>

                                    <div class="tab-pane fade" id="pills-cart" role="tabpanel" aria-labelledby="pills-packages-tab">
                                      <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="section-block">
                                                <h3 class="section-title">My Cart</h3>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-12 p-3" style="background:#fff;">
                                        <div class="row">
                                          <div class="col-lg-8 py-lg-5  mb-5">
                                            <!-- Shopping cart table -->
                                            <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                  <tr>
                                                    <th scope="col" class="border-0 bg-light">
                                                      <div class="p-2 px-3 text-uppercase">Item</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                      <div class="py-2 text-uppercase">Price</div>
                                                    </th>

                                                    <th scope="col" class="border-0 bg-light">
                                                      <div class="py-2 text-uppercase">Remove</div>
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody id="big_cart">



                                                </tbody>
                                              </table>
                                            </div>

                                          </div>
                                              <!-- End -->

                                          <div class="col-lg-4  py-lg-5 mb-5">
                                            <div class="col-lg-12">
                                              <div class="bg-light px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                                              <div class="py-4">

                                                <ul id="mini_cart" class="list-unstyled mb-4">


                                                </ul>

                                                <p class="font-italic mb-4">Tax and other details</p>
                                              </div>
                                            </div>
                                            <div class="col-lg-12">
                                              <div class="bg-light   px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                                              <div class="py-4">
                                                <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>

                                                <input type="text" placeholder="Apply coupon" id="coupon_name" aria-describedby="button-addon3" class="form-control border-0">

                                                <button onclick="checkout()" href="#" class="btn btn-dark mt-3  py-2 btn-block">Procceed to checkout</button>

                                            </div>
                                              <div class="bg-light   px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                                              <div class="py-4">
                                                <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>



<script type="text/javascript">
  function checkout(){
      var coupon = document.getElementById("coupon_name").value;

      if (coupon !=0) {
        var query = "pgRedirect.php?coupon="+ coupon;
        window.location.href = query;
      }else{
        var query = "pgRedirect.php"
        window.location.href = query;
      }

  }
</script>


                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->

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

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
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

      function delete_cart_item(id) {

          $.ajax({
              type: "POST",
              url: "delete-cart.php",
              data: {
                  parameter: id
              },
              dataType: 'JSON',
              success: function(response) {
                  if (response == 1) {
                      console.log(response);
                      update_staus_success("Deleted Sucessfully");
                      update_cart_mini();
                      update_cart_big();
                      get_order();

                  }else{
                      console.log(response);
                      update_staus_error("Somthing Happend");
                  }
              }
          });
      }

      //utility functions
      function update_staus_error(message) {
        $('#modelformessage').modal({
            keyboard: true
        });
          document.getElementById('status_message').innerHTML = message;
          $("#status_message").addClass("dangerclass");

      }

      function update_staus_success(message) {
        $('#modelformessage').modal({
            keyboard: true
        });
          document.getElementById('status_message').innerHTML = message;
          $("#status_message").removeClass("dangerclass")
      }

    update_cart_mini();
    update_cart_big();


      function update_cart_mini() {
             $.ajax({
                 type: "POST",
                 url: "populate-cart-mini.php",
                 data: {
                     l_loc: 'dummy',
                 },
                 dataType: 'JSON',
                 success: function(response_location_small) {
                     document.getElementById("mini_cart").innerHTML = response_location_small;
                 }
             });
         }


           function update_cart_big() {
                  $.ajax({
                      type: "POST",
                      url: "populate-cart-big.php",
                      data: {
                          l_loc: 'dummy',
                      },
                      dataType: 'JSON',
                      success: function(response_location_big) {
                          document.getElementById("big_cart").innerHTML = response_location_big;
                      }
                  });
              }
    </script>










    <?php

    if ($flag_query == "cart") {
      // code...
      echo '
      <script>
      document.getElementById("cart_button_press").click();
      </script>
      ';

    }elseif ($flag_query == "orders") {
      // code...
      echo '
      <script>
      document.getElementById("pills-profile-tab").click();
      </script>
      ';
    }

     ?>
     <?php if ($_SESSION["ver_status"] == 0): ?>

        <script type="text/javascript">
            update_staus_error("Please Verify Your Email");
        </script>

     <?php endif; ?>



     <script type="text/javascript">
     get_order();
     function get_order(){
       $.ajax({
           type: "POST",
           url: "cart_count.php",
           date :{
            dummy : "dummy",
           },
           dataType: 'JSON',
           success: function(response) {
               document.getElementById("total_orders").innerHTML = response;
           }
       });
     }

     get_completed_order();
     function get_completed_order(){
       $.ajax({
           type: "POST",
           url: "cart_count_completed.php",
           date :{
            dummy : "dummy",
           },
           dataType: 'JSON',
           success: function(response) {
               document.getElementById("completed_orders").innerHTML = response;
           }
       });
     }

     get_cancel_order();
     function get_cancel_order(){
       $.ajax({
           type: "POST",
           url: "cart_count_canceld.php",
           date :{
            dummy : "dummy",
           },
           dataType: 'JSON',
           success: function(response) {
               document.getElementById("canc_orders").innerHTML = response;
           }
       });
     }
     </script>


</body>

</html>
