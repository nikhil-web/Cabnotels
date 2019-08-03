<?php
include('session.php');


$hotel_id = mysqli_real_escape_string($db,$_POST['hotel_id']);
$checkin = mysqli_real_escape_string($db,$_POST['checkin']);
$checkout = mysqli_real_escape_string($db,$_POST['checkout']);
$number_room = mysqli_real_escape_string($db,$_POST['num_room']);
$number_adult = mysqli_real_escape_string($db,$_POST['num_adult']);
$price = mysqli_real_escape_string($db,$_POST['price']);
$user_id = $_SESSION["user_id"];

$output=0;

$sql = "INSERT INTO cart (id,cart_item_type,item_id,user_id, start_date, end_date , item_quantity, item_price,head_count) VALUES (NULL,'1' ,'$hotel_id' ,'$user_id' ,'$checkin' ,'$checkout' ,'$number_room' ,'$price' ,'$number_adult')";
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
