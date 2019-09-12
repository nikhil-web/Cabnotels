<?php
include('session.php');

/*
taxi_id: id,
taxi_pickup_date : taxi_pickup_date,
pickup_time : pickup_time,
pickup_location : pickup_location,
taxi_price_single : taxi_price_single,
*/

$taxi_id = mysqli_real_escape_string($db,$_POST['taxi_id']);
$taxi_pickup_date = mysqli_real_escape_string($db,$_POST['taxi_pickup_date']);
$pickup_time = mysqli_real_escape_string($db,$_POST['pickup_time']);
$pickup_location = mysqli_real_escape_string($db,$_POST['pickup_location']);
$taxi_price_single = mysqli_real_escape_string($db,$_POST['taxi_price_single']);
$taxi_duration = mysqli_real_escape_string($db,$_POST['taxi_duration']);

$user_id = $_SESSION["user_id"];

$output=0;

$sql = "INSERT INTO cart (id,cart_item_type,item_id,user_id, start_date, pickup_time, pickup_location,item_price,cab_hours) VALUES (NULL,'3' ,'$taxi_id' ,'$user_id','$taxi_pickup_date','$pickup_time','$pickup_location','$taxi_price_single','$taxi_duration')";
$result=mysqli_query($db,$sql);
if(!$result){
    $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      $output = $error_fetch;
  }else {
    $output = 1;
}
echo json_encode($output);
?>
