<?php
include('session.php');

/*  tour_id: id,
  tour_start_date : tour_start_date,
  tour_adult_count : adult,
  tour_child_count : child,
  tour_cab_type : cab,
  tour_hotel_type : hotel,
  tour_price : tour_price
*/

$tour_id = mysqli_real_escape_string($db,$_POST['tour_id']);
$tour_start_date = mysqli_real_escape_string($db,$_POST['tour_start_date']);
$tour_adult_count = mysqli_real_escape_string($db,$_POST['tour_adult_count']);
$tour_child_count = mysqli_real_escape_string($db,$_POST['tour_child_count']);
$tour_cab_type = mysqli_real_escape_string($db,$_POST['tour_cab_type']);
$tour_hotel_type = mysqli_real_escape_string($db,$_POST['tour_hotel_type']);
$tour_price = mysqli_real_escape_string($db,$_POST['tour_price']);

$user_id = $_SESSION["user_id"];

$tour_head_count = (int)$tour_adult_count + (int)$tour_child_count;

$output=0;

$sql = "INSERT INTO cart (id, cart_item_type, item_id, user_id, start_date, item_price, head_count,adult_count,child_count,cab_type,room_type) VALUES (NULL,'2' ,'$tour_id' ,'$user_id' ,'$tour_start_date' ,'$tour_price' ,'$tour_head_count','$tour_adult_count','$tour_child_count','$tour_cab_type','$tour_hotel_type')";
//$sql = "INSERT INTO cart (cart_item_type,item_id,user_id) VALUES ('1', '$hotel_id','$user_id')";
$result=mysqli_query($db,$sql);
if(!$result){
    $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      $output = $error_fetch;
  }else {
    $output = 1;
}

echo json_encode($output);

?>
