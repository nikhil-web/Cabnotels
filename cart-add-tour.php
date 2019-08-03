<?php
include('session.php');


$tour_id = mysqli_real_escape_string($db,$_POST['tour_id']);
$tour_start_date = mysqli_real_escape_string($db,$_POST['tour_start_date']);
$tour_head_count = mysqli_real_escape_string($db,$_POST['tour_head_count']);
$tour_price = mysqli_real_escape_string($db,$_POST['tour_price']);
$user_id = $_SESSION["user_id"];

$output=0;

$sql = "INSERT INTO cart (id, cart_item_type, item_id, user_id, start_date, item_price, head_count) VALUES (NULL,'2' ,'$tour_id' ,'$user_id' ,'$tour_start_date' ,'$tour_price' ,'$tour_head_count')";
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
