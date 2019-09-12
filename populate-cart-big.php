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
             <tr>
               <th scope="row" class="border-0">
                 <div class="py-2">
                   <div class="my-3 d-inline-block align-middle">
                     <h5 class="mb-3"> <a href="#" class="text-dark d-inline-block align-middle">  <i class="fas fa-hotel"></i> Hotel Booking</a></h5><span class="text-muted font-italic d-block">
                       <p>'.$row_hotel["hotel_name"].'</p>
                     </span>
                   </div>
                 </div>
               </th>
               <td class="border-0 align-middle"><strong>Rs. '.$row["item_price"].'</strong></td>

               <td class="border-0 align-middle">  <button onclick="delete_cart_item('.$row["id"].')" class="btn btn-dark mt-3  p-2 btn-block"><i class="fa fa-trash"></i> Remove</button></td>
             </tr>
             ';
           }
           }elseif ($row["cart_item_type"]==2) {
             // code...
              $sql_tour = 'SELECT * FROM tours WHERE tour_id = '.$row["item_id"].'';
              $result_tour = mysqli_query($db, $sql_tour);
                    if (mysqli_num_rows($result_tour) > 0) {
                     $row_tour = mysqli_fetch_assoc($result_tour);
                      $output .= '
                     <tr>
                       <th scope="row" class="border-0">
                         <div class="py-2">
                           <div class="my-3 d-inline-block align-middle">
                             <h5 class="mb-3"> <a href="#" class="text-dark d-inline-block align-middle">   <i class="fas fa-fw fa-chart-area"></i> Tour Booking</a></h5><span class="text-muted font-italic d-block">
                               <p>'.$row_tour["tour_name"].'</p>
                             </span>
                           </div>
                         </div>
                       </th>
                       <td class="border-0 align-middle"><strong>Rs. '.$row["item_price"].'</strong></td>

                       <td class="border-0 align-middle">  <button onclick="delete_cart_item('.$row["id"].')" class="btn btn-dark mt-3  p-2 btn-block"><i class="fa fa-trash"></i> Remove</button></td>
                     </tr>';
                   }
           }elseif ($row["cart_item_type"]==3) {
             // code...
             $sql_taxi = 'SELECT * FROM taxi WHERE taxi_id = '.$row["item_id"].'';
             $result_taxi = mysqli_query($db, $sql_taxi);
                   if (mysqli_num_rows($result_taxi) > 0) {
                    $row_taxi = mysqli_fetch_assoc($result_taxi);
                   $output .= '
                    <tr>
                      <th scope="row" class="border-0">
                        <div class="py-2">
                          <div class="my-3 d-inline-block align-middle">
                            <h5 class="mb-3"> <a href="#" class="text-dark d-inline-block align-middle"> <i class="fas fa-car"></i> Taxi Booking</a></h5><span class="text-muted font-italic d-block">
                              <p>'.$row_taxi["taxi_name"].'</p>
                            </span>
                          </div>
                        </div>
                      </th>
                      <td class="border-0 align-middle"><strong>Rs. '.$row["item_price"].'</strong></td>
                      
                      <td class="border-0 align-middle">  <button onclick="delete_cart_item('.$row["id"].')" class="btn btn-dark mt-3  p-2 btn-block"><i class="fa fa-trash"></i> Remove</button></td>
                    </tr>';
                  }
           }else {
             // code...
           }
         }
       }
       echo json_encode($output);
       mysqli_close($db);
 ?>
