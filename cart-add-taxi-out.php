<?php
include('session.php');

/*
taxi_id: id,
taxi_out_startdate : taxi_out_startdate,
taxi_out_starttime : taxi_out_starttime_send,
taxi_out_leave_date : taxi_out_leave_date,
taxi_out_leave_time : taxi_out_leave_time_send,
pickup_location_out : pickup_location_out,
leave_car_location :leave_car_location,
price_taxi_out : price_taxi_out,
*/

$taxi_id = mysqli_real_escape_string($db,$_POST['taxi_id']);

$taxi_out_startdate= mysqli_real_escape_string($db,$_POST['taxi_out_startdate']);

$taxi_out_starttime = mysqli_real_escape_string($db,$_POST['taxi_out_starttime']);

$taxi_out_leave_date = mysqli_real_escape_string($db,$_POST['taxi_out_leave_date']);

$taxi_out_leave_time = mysqli_real_escape_string($db,$_POST['taxi_out_leave_time']);

$pickup_location_out = mysqli_real_escape_string($db,$_POST['pickup_location_out']);

$leave_car_location = mysqli_real_escape_string($db,$_POST['leave_car_location']);

$price_taxi_out = mysqli_real_escape_string($db,$_POST['price_taxi_out']);






$user_id = $_SESSION["user_id"];

$output=0;

$sql = "INSERT INTO cart (id,cart_item_type,item_id,user_id, start_date,end_date, pickup_time, pickup_location, drop_location, drop_time, item_price) VALUES (NULL,'3' ,'$taxi_id' ,'$user_id','$taxi_out_startdate','$taxi_out_leave_date','$taxi_out_starttime','$pickup_location_out','$leave_car_location','$taxi_out_leave_time','$price_taxi_out')";
$result=mysqli_query($db,$sql);
if(!$result){
    $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      $output = $error_fetch;
  }else {
    $output = 1;
}
echo json_encode($output);
?>
