<?php
include 'session.php';
$five = mysqli_real_escape_string($db,$_POST["five"]);
$four = mysqli_real_escape_string($db,$_POST["four"]);
$three = mysqli_real_escape_string($db,$_POST["three"]);
$two = mysqli_real_escape_string($db,$_POST["two"]);

$output = $five.$four.$three.$two;

if ($five == 'true') {
  $sts_five = 5;
}else {
  $sts_five = "";
}

if ($four == 'true') {
  $sts_four = 4;
}else {
  $sts_four = "";
}

if ($three == 'true') {
  $sts_three = 3;
}else {
  $sts_three = "";
}

if ($two == 'true') {
  $sts_two = 2;
}else {
  $sts_two = "";
}

$output = "";

if ($sts_two == "" & $sts_three == "" & $sts_four == "" & $sts_five == "") {
  $query = "SELECT * FROM hotels";
}else {
  $query = "SELECT * FROM hotels WHERE hotel_stars = '$sts_five' OR hotel_stars = '$sts_four' OR hotel_stars = '$sts_three' OR hotel_stars = '$sts_two'";
}


$result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row= mysqli_fetch_assoc($result)) {
          $output .=  '<div class="hotel-card">
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
                                       $output .=  '
                                     <li data-target="#carouselExampleIndicators_'.$row["hotel_id"].'" data-slide-to="'.$count.'" class="active"></li>
                                      ';
                                    }else{
                                       $output .=  '
                                       <li data-target="#carouselExampleIndicators_'.$row["hotel_id"].'" data-slide-to="'.$count.'"></li>
                                     ';
                                    }
                             $count++;
                             }
                             }


                              $output .= '
                            </ol>
                            <div class="carousel-inner" style=" width:100%;">';

                             $count = 0;
                            $sql_inner = 'SELECT * FROM hotel_images WHERE hotel_id = '.$row["hotel_id"].' ';
                             $result_inner = mysqli_query($db, $sql_inner);
                              if (mysqli_num_rows($result_inner) > 0) {
                              // output data of each hotel image.
                                while($row_inner= mysqli_fetch_assoc($result_inner)) {
                                 if($count==0){
                                   $output .=  '
                                 <div class="carousel-item active">
                                 <img class="d-block w-100" src="admin/'.$row_inner["hotel_image"].'" alt="'.$count.' slide">
                                 </div>
                                 ';
                                 }else{
                                       $output .=  '
                                     <div class="carousel-item">
                                     <img class="d-block w-100" src="admin/'.$row_inner["hotel_image"].'" alt="'.$count.' slide">
                                     </div>
                                     ';
                                 }

                               $count++;
                             }
                             }

                              $output .= '</div>
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
                    <div class="col-lg-12 px-0 pt-3">
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
                                            $output .=  '
                                                <div class="mr-1 mt-1">
                                                    <button type="button" class="btn btn-light"> '.$row_amen["amn_name"].'</button>
                                                </div>';
                                        }
                                      }
                                    }

                              $output .=  '</div>
                        </div>

                        <div class="col-lg-12 px-0 pt-3">
                            <div class="col-lg-12">
                                <h3>'.$row["price"].' ₹</h3>
                            </div>
                       </div>

                        <div class="col-lg-12 mt-2">
                            <div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="mr-1 mt-1">
                                        <a href="single.php?type=hotel&id='.$row["hotel_id"].'"><button class="button button5" style="background-color: #ffdd00;color: #3c3c3c;">Book Now</button>
                                        </div>
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

echo json_encode($output);

 ?>
