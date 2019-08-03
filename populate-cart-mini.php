<?php
include('session.php');
$output = "";

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
             $output .= '
             <li style="width:100%;" class="list-group-item d-flex justify-content-between lh-condensed">
                   <div>
                     <h6 class="my-0">Hotel Booking</h6>
                     <small class="">'.$row_hotel["hotel_name"].'</small>
                   </div>
                   <span class="">Rs. '.$row["item_price"].'</span>
             </li>
             ';
           }
           }elseif ($row["cart_item_type"]==2) {
             // code...

              $sql_tour = 'SELECT * FROM tours WHERE tour_id = '.$row["item_id"].'';
              $result_tour = mysqli_query($db, $sql_tour);
                    if (mysqli_num_rows($result_tour) > 0) {
                     $row_tour = mysqli_fetch_assoc($result_tour);
                     $output .= '
                     <li style="width:100%;" class="list-group-item d-flex justify-content-between lh-condensed">
                           <div>
                             <h6 class="my-0">Tour Booking</h6>
                             <small class="">'.$row_tour["tour_name"].'</small>
                           </div>
                             <span class="">Rs. '.$row["item_price"].'</span>
                     </li>';
                   }
           }elseif ($row["cart_item_type"]==3) {
             // code...

             $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
             $result_taxi = mysqli_query($db, $sql_taxi);
                   if (mysqli_num_rows($result_taxi) > 0) {
                    $row_taxi = mysqli_fetch_assoc($result_taxi);
                    $output .= '
                    <li style="width:100%;" class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Taxi Booking</h6>
                            <small class="">Maruti Suzuki Swift</small>
                          </div>
                           <span class="">Rs. '.$row["item_price"].'</span>
                    </li>';
                  }
           }else {
             //err
           }
         }
       }
       echo json_encode($output);
       mysqli_close($db);
 ?>
