<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
   header("location:login.php");
}else{
  $login_flag = 1;
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
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php"><img style="width: 100px;" src="images/logo.png" alt="">   </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Nikhil Pandey</span>Your Booking is accepted
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Your Booking ID-121212</span> Is cancled
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $_SESSION["user_image"]; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
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
                                <div class="card-body border-top">
                                    <h3 class="font-16">Rating</h3>
                                    <h1 class="mb-0">4.8</h1>
                                    <div class="rating-star">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <p class="d-inline-block text-dark"> 14 Reviews </p>
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
                                      <a class="nav-link" id="" data-toggle="pill" href="#pills-cart" role="tab" aria-controls="pills-packages" aria-selected="false">Cart</a>

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
                                                    <div class="card-body">
                                                        <h1 class="mb-1">9</h1>
                                                        <p>Upcoming</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">4</h1>
                                                        <p>Completed</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">8</h1>
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

                                                            <?php

                                                            $sql = 'SELECT * FROM cart WHERE status = 0 AND user_id = '.$_SESSION["user_id"].' ORDER BY id DESC';
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
                                                                        <div class="card">
                                                                          <div class="card-body">
                                                                            <h5 class="card-title"><i class="fas fa-hotel"></i> Hotel Booking</h5>
                                                                            <div class="table-responsive">
                                                                              <table class="table">
                                                                                <thead>
                                                                                  <tr>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                    </th>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="py-2 text-uppercase">Price</div>
                                                                                    </th>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="py-2 text-uppercase">Details</div>
                                                                                    </th>
                                                                                  </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                  <tr>
                                                                                    <th scope="row" class="border-0">
                                                                                      <div class="py-2">
                                                                                        <div class="my-3 d-inline-block align-middle">
                                                                                          <span class="text-muted font-italic d-block">
                                                                                            <h5>'.$row_hotel["hotel_name"].'</h5>
                                                                                          </span>
                                                                                        </div>
                                                                                      </div>
                                                                                    </th>
                                                                                    <td class="border-0 align-middle"><strong>'.$row["item_price"].' INR</strong></td>
                                                                                    <td class="border-0 align-middle">

                                                                                        <p><strong>From </strong> '.$row["start_date"].' <strong>To</strong> '.$row["start_date"].' </p>
                                                                                        <p><strong>Location </strong> '.$row_hotel["hotel_loc"].' </p>
                                                                                        <p><strong>People </strong> '.$row["head_count"].'</p>

                                                                                    </td>

                                                                                  </tr>
                                                                                </tbody>
                                                                              </table>
                                                                            </div>
                                                                            <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                            <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                          </div>
                                                                          <div class="card-footer">
                                                                            <small class="text-muted">Added on '.$row["date_added"].'</small>
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
                                                                                <div class="card">
                                                                                  <div class="card-body">
                                                                                    <h5 class="card-title"><i class="fas fa-car"></i> Taxi Booking</h5>
                                                                                    <div class="table-responsive">
                                                                                      <table class="table">
                                                                                        <thead>
                                                                                          <tr>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                            </th>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="py-2 text-uppercase">Price</div>
                                                                                            </th>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="py-2 text-uppercase">Details</div>
                                                                                            </th>
                                                                                          </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                          <tr>
                                                                                            <th scope="row" class="border-0">
                                                                                              <div class="py-2">
                                                                                                <div class="my-3 d-inline-block align-middle">
                                                                                                  <span class="text-muted font-italic d-block">
                                                                                                    <h5>'.$row_tour["tour_name"].'</h5>
                                                                                                  </span>
                                                                                                </div>
                                                                                              </div>
                                                                                            </th>
                                                                                            <td class="border-0 align-middle"><strong>Rs. '.$row["head_count"]*$row["item_price"].'</strong></td>
                                                                                            <td class="border-0 align-middle">
                                                                                                <p><strong>People :</strong>'.$row["head_count"].'</p>

                                                                                                <p><strong>Date :</strong>'.$row["start_date"].'</p>

                                                                                            </td>

                                                                                          </tr>
                                                                                        </tbody>
                                                                                      </table>
                                                                                    </div>
                                                                                    <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                                    <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                                  </div>
                                                                                  <div class="card-footer">
                                                                                  <small class="text-muted">Added on '.$row["date_added"].'</small>
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

                                                                             <div class="card">
                                                                               <div class="card-body">
                                                                                 <h5 class="card-title"><i class="fas fa-car"></i> Taxi Booking</h5>
                                                                                 <div class="table-responsive">
                                                                                   <table class="table">
                                                                                     <thead>
                                                                                       <tr>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                         </th>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="py-2 text-uppercase">Price</div>
                                                                                         </th>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="py-2 text-uppercase">Details</div>
                                                                                         </th>
                                                                                       </tr>
                                                                                     </thead>
                                                                                     <tbody>
                                                                                       <tr>
                                                                                         <th scope="row" class="border-0">
                                                                                           <div class="py-2">
                                                                                             <div class="my-3 d-inline-block align-middle">
                                                                                               <span class="text-muted font-italic d-block">
                                                                                                 <h5>'.$row_taxi["taxi_name"].'</h5>
                                                                                               </span>
                                                                                             </div>
                                                                                           </div>
                                                                                         </th>
                                                                                         <td class="border-0 align-middle"><strong>$79.00</strong></td>
                                                                                         <td class="border-0 align-middle">
                                                                                             <p><strong>Pickup :</strong>'.$row["pickup_location"].'</p>
                                                                                             <p><strong>Drop :</strong>'.$row["drop_location"].'</p>
                                                                                             <p><strong>Time :</strong>'.$row["pickup_time"].'</p>
                                                                                             <p><strong>Date :</strong>'.$row["start_date"].'</p>

                                                                                         </td>

                                                                                       </tr>
                                                                                     </tbody>
                                                                                   </table>
                                                                                 </div>
                                                                                 <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                                 <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                               </div>
                                                                               <div class="card-footer">
                                                                               <small class="text-muted">Added on '.$row["date_added"].'</small>
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
                                                     <!--Tab one-->

                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                            <div class="section-block">
                                                                    <h3 class="section-title">Completed Orders</h3>
                                                            </div>
                                                            <?php

                                                            $sql = 'SELECT * FROM cart WHERE status = 1 AND user_id = '.$_SESSION["user_id"].' ORDER BY id DESC';
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
                                                                        <div class="card">
                                                                          <div class="card-body">
                                                                            <h5 class="card-title"><i class="fas fa-hotel"></i> Hotel Booking</h5>
                                                                            <div class="table-responsive">
                                                                              <table class="table">
                                                                                <thead>
                                                                                  <tr>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                    </th>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="py-2 text-uppercase">Price</div>
                                                                                    </th>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="py-2 text-uppercase">Details</div>
                                                                                    </th>
                                                                                  </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                  <tr>
                                                                                    <th scope="row" class="border-0">
                                                                                      <div class="py-2">
                                                                                        <div class="my-3 d-inline-block align-middle">
                                                                                          <span class="text-muted font-italic d-block">
                                                                                            <h5>'.$row_hotel["hotel_name"].'</h5>
                                                                                          </span>
                                                                                        </div>
                                                                                      </div>
                                                                                    </th>
                                                                                    <td class="border-0 align-middle"><strong>'.$row["item_price"].' INR</strong></td>
                                                                                    <td class="border-0 align-middle">

                                                                                        <p><strong>From </strong> '.$row["start_date"].' <strong>To</strong> '.$row["start_date"].' </p>
                                                                                        <p><strong>Location </strong> '.$row_hotel["hotel_loc"].' </p>
                                                                                        <p><strong>People </strong> '.$row["head_count"].'</p>

                                                                                    </td>

                                                                                  </tr>
                                                                                </tbody>
                                                                              </table>
                                                                            </div>
                                                                            <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                            <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                          </div>
                                                                          <div class="card-footer">
                                                                            <small class="text-muted">Added on '.$row["date_added"].'</small>
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
                                                                                <div class="card">
                                                                                  <div class="card-body">
                                                                                    <h5 class="card-title"><i class="fas fa-car"></i> Taxi Booking</h5>
                                                                                    <div class="table-responsive">
                                                                                      <table class="table">
                                                                                        <thead>
                                                                                          <tr>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                            </th>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="py-2 text-uppercase">Price</div>
                                                                                            </th>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="py-2 text-uppercase">Details</div>
                                                                                            </th>
                                                                                          </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                          <tr>
                                                                                            <th scope="row" class="border-0">
                                                                                              <div class="py-2">
                                                                                                <div class="my-3 d-inline-block align-middle">
                                                                                                  <span class="text-muted font-italic d-block">
                                                                                                    <h5>'.$row_tour["tour_name"].'</h5>
                                                                                                  </span>
                                                                                                </div>
                                                                                              </div>
                                                                                            </th>
                                                                                            <td class="border-0 align-middle"><strong>Rs. '.$row["head_count"]*$row["item_price"].'</strong></td>
                                                                                            <td class="border-0 align-middle">
                                                                                                <p><strong>People :</strong>'.$row["head_count"].'</p>

                                                                                                <p><strong>Date :</strong>'.$row["start_date"].'</p>

                                                                                            </td>

                                                                                          </tr>
                                                                                        </tbody>
                                                                                      </table>
                                                                                    </div>
                                                                                    <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                                    <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                                  </div>
                                                                                  <div class="card-footer">
                                                                                  <small class="text-muted">Added on '.$row["date_added"].'</small>
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

                                                                             <div class="card">
                                                                               <div class="card-body">
                                                                                 <h5 class="card-title"><i class="fas fa-car"></i> Taxi Booking</h5>
                                                                                 <div class="table-responsive">
                                                                                   <table class="table">
                                                                                     <thead>
                                                                                       <tr>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                         </th>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="py-2 text-uppercase">Price</div>
                                                                                         </th>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="py-2 text-uppercase">Details</div>
                                                                                         </th>
                                                                                       </tr>
                                                                                     </thead>
                                                                                     <tbody>
                                                                                       <tr>
                                                                                         <th scope="row" class="border-0">
                                                                                           <div class="py-2">
                                                                                             <div class="my-3 d-inline-block align-middle">
                                                                                               <span class="text-muted font-italic d-block">
                                                                                                 <h5>'.$row_taxi["taxi_name"].'</h5>
                                                                                               </span>
                                                                                             </div>
                                                                                           </div>
                                                                                         </th>
                                                                                         <td class="border-0 align-middle"><strong>$79.00</strong></td>
                                                                                         <td class="border-0 align-middle">
                                                                                             <p><strong>Pickup :</strong>'.$row["pickup_location"].'</p>
                                                                                             <p><strong>Drop :</strong>'.$row["drop_location"].'</p>
                                                                                             <p><strong>Time :</strong>'.$row["pickup_time"].'</p>
                                                                                             <p><strong>Date :</strong>'.$row["start_date"].'</p>

                                                                                         </td>

                                                                                       </tr>
                                                                                     </tbody>
                                                                                   </table>
                                                                                 </div>
                                                                                 <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                                 <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                               </div>
                                                                               <div class="card-footer">
                                                                               <small class="text-muted">Added on '.$row["date_added"].'</small>
                                                                               </div>
                                                                             </div>';
                                                                            }
                                                                     }
                                                                 }
                                                                }else{
                                                                   echo '<h3>No Data</h3>';
                                                                 }


                                                             ?>


                                                    </div>


                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                            <div class="section-block">
                                                                    <h3 class="section-title">Cancled Orders</h3>
                                                            </div>

                                                            <?php

                                                            $sql = 'SELECT * FROM cart WHERE status = -1 AND user_id = '.$_SESSION["user_id"].' ORDER BY id DESC';
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
                                                                        <div class="card">
                                                                          <div class="card-body">
                                                                            <h5 class="card-title"><i class="fas fa-hotel"></i> Hotel Booking</h5>
                                                                            <div class="table-responsive">
                                                                              <table class="table">
                                                                                <thead>
                                                                                  <tr>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                    </th>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="py-2 text-uppercase">Price</div>
                                                                                    </th>
                                                                                    <th scope="col" class="border-0 bg-light">
                                                                                      <div class="py-2 text-uppercase">Details</div>
                                                                                    </th>
                                                                                  </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                  <tr>
                                                                                    <th scope="row" class="border-0">
                                                                                      <div class="py-2">
                                                                                        <div class="my-3 d-inline-block align-middle">
                                                                                          <span class="text-muted font-italic d-block">
                                                                                            <h5>'.$row_hotel["hotel_name"].'</h5>
                                                                                          </span>
                                                                                        </div>
                                                                                      </div>
                                                                                    </th>
                                                                                    <td class="border-0 align-middle"><strong>'.$row["item_price"].' INR</strong></td>
                                                                                    <td class="border-0 align-middle">

                                                                                        <p><strong>From </strong> '.$row["start_date"].' <strong>To</strong> '.$row["start_date"].' </p>
                                                                                        <p><strong>Location </strong> '.$row_hotel["hotel_loc"].' </p>
                                                                                        <p><strong>People </strong> '.$row["head_count"].'</p>

                                                                                    </td>

                                                                                  </tr>
                                                                                </tbody>
                                                                              </table>
                                                                            </div>
                                                                            <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                            <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                          </div>
                                                                          <div class="card-footer">
                                                                            <small class="text-muted">Added on '.$row["date_added"].'</small>
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
                                                                                <div class="card">
                                                                                  <div class="card-body">
                                                                                    <h5 class="card-title"><i class="fas fa-car"></i> Taxi Booking</h5>
                                                                                    <div class="table-responsive">
                                                                                      <table class="table">
                                                                                        <thead>
                                                                                          <tr>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                            </th>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="py-2 text-uppercase">Price</div>
                                                                                            </th>
                                                                                            <th scope="col" class="border-0 bg-light">
                                                                                              <div class="py-2 text-uppercase">Details</div>
                                                                                            </th>
                                                                                          </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                          <tr>
                                                                                            <th scope="row" class="border-0">
                                                                                              <div class="py-2">
                                                                                                <div class="my-3 d-inline-block align-middle">
                                                                                                  <span class="text-muted font-italic d-block">
                                                                                                    <h5>'.$row_tour["tour_name"].'</h5>
                                                                                                  </span>
                                                                                                </div>
                                                                                              </div>
                                                                                            </th>
                                                                                            <td class="border-0 align-middle"><strong>Rs. '.$row["head_count"]*$row["item_price"].'</strong></td>
                                                                                            <td class="border-0 align-middle">
                                                                                                <p><strong>People :</strong>'.$row["head_count"].'</p>

                                                                                                <p><strong>Date :</strong>'.$row["start_date"].'</p>

                                                                                            </td>

                                                                                          </tr>
                                                                                        </tbody>
                                                                                      </table>
                                                                                    </div>
                                                                                    <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                                    <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                                  </div>
                                                                                  <div class="card-footer">
                                                                                  <small class="text-muted">Added on '.$row["date_added"].'</small>
                                                                                  </div>
                                                                                </div>
                                                                              ';
                                                                             }
                                                                     }elseif ($row["cart_item_type"]== -1) {
                                                                       // code...
                                                                       $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
                                                                       $result_taxi = mysqli_query($db, $sql_taxi);
                                                                             if (mysqli_num_rows($result_taxi) > 0) {
                                                                              $row_taxi = mysqli_fetch_assoc($result_taxi);
                                                                             echo '

                                                                             <div class="card">
                                                                               <div class="card-body">
                                                                                 <h5 class="card-title"><i class="fas fa-car"></i> Taxi Booking</h5>
                                                                                 <div class="table-responsive">
                                                                                   <table class="table">
                                                                                     <thead>
                                                                                       <tr>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="p-2 px-3 text-uppercase">Item</div>
                                                                                         </th>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="py-2 text-uppercase">Price</div>
                                                                                         </th>
                                                                                         <th scope="col" class="border-0 bg-light">
                                                                                           <div class="py-2 text-uppercase">Details</div>
                                                                                         </th>
                                                                                       </tr>
                                                                                     </thead>
                                                                                     <tbody>
                                                                                       <tr>
                                                                                         <th scope="row" class="border-0">
                                                                                           <div class="py-2">
                                                                                             <div class="my-3 d-inline-block align-middle">
                                                                                               <span class="text-muted font-italic d-block">
                                                                                                 <h5>'.$row_taxi["taxi_name"].'</h5>
                                                                                               </span>
                                                                                             </div>
                                                                                           </div>
                                                                                         </th>
                                                                                         <td class="border-0 align-middle"><strong>$79.00</strong></td>
                                                                                         <td class="border-0 align-middle">
                                                                                             <p><strong>Pickup :</strong>'.$row["pickup_location"].'</p>
                                                                                             <p><strong>Drop :</strong>'.$row["drop_location"].'</p>
                                                                                             <p><strong>Time :</strong>'.$row["pickup_time"].'</p>
                                                                                             <p><strong>Date :</strong>'.$row["start_date"].'</p>

                                                                                         </td>

                                                                                       </tr>
                                                                                     </tbody>
                                                                                   </table>
                                                                                 </div>
                                                                                 <a href="#" class="btn btn-rounded btn-primary">Details</a>
                                                                                 <a href="#" class="btn btn-rounded btn-secondary">View</a>
                                                                               </div>
                                                                               <div class="card-footer">
                                                                               <small class="text-muted">Added on '.$row["date_added"].'</small>
                                                                               </div>
                                                                             </div>';
                                                                            }
                                                                     }
                                                                 }
                                                                }else{
                                                                   echo '<h3>No Data</h3>';
                                                                 }


                                                             ?>
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
                                                      <div class="py-2 text-uppercase">Details</div>
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

                                                <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">

                                                <button href="#" class="btn btn-dark mt-3  py-2 btn-block">Procceed to checkout</button>

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
                      update_staus_success("Deleted Sucessfully")
                  }else{
                      console.log(response);
                      update_staus_error("Somthing Happend")
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
          update_cart_mini();
          update_cart_big();
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
</body>

</html>
