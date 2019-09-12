<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/

include 'session.php';

$hotel_id = mysqli_real_escape_string($db,$_GET['hotel_id']);
$checkin = mysqli_real_escape_string($db,$_GET['checkin_date']);
$checkout = mysqli_real_escape_string($db,$_GET['checkout_date']);
$number_room = mysqli_real_escape_string($db,$_GET['number_room']);
$number_adult = mysqli_real_escape_string($db,$_GET['number_adult']);
$child_num = mysqli_real_escape_string($db,$_GET['number_child']);
$price = mysqli_real_escape_string($db,$_GET['price']);

$head_count = (int)$number_adult + (int)$child_num;

$express = 1;

$sql = "INSERT INTO cart (id,cart_item_type,item_id,user_id, start_date, end_date , item_quantity, item_price,head_count,adult_count,child_count,express) VALUES (NULL,'1' ,'$hotel_id' ,'$user_id' ,'$checkin' ,'$checkout' ,'$number_room' ,'$price' ,'$head_count',$number_adult,$child_num,$express)";
$result=mysqli_query($db,$sql);
if(!$result){
    $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      echo  $error_fetch;
  }else {
    echo "Added To cart";
}


if (isset($_GET['coupon'])) {
  // code...
  $coupon_flag = 1;
  $coupon = mysqli_real_escape_string($db,$_GET['coupon']);
  echo $coupon;
            $sql = 'SELECT * FROM coupons WHERE coupons.coup = "'.$coupon.'" ';
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row= mysqli_fetch_assoc($result);
                $coup_valid = true;
                echo "valid coupon";
                $coupon_type = $row["discount_type"];
                $coupon_ammount = $row["rupee"];
            }else {
               $coup_valid = false;
               echo "invalid coupon";
            }

}else {
    $coupon_flag = 0;
    $coupon = "";
}


$sum = 0;
$sql = 'SELECT item_price FROM cart WHERE status = 0 AND express = 1 AND user_id = '.$_SESSION["user_id"].'';
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row= mysqli_fetch_assoc($result)) {
	$sum = (int)$sum  + (int)$row["item_price"];
}}

if ($coupon_flag == 1 && $coup_valid == true) {
	echo "coupon applid<br>";

	if ($coupon_type == 1) {
		// code...
			$total = (int)$sum - (int)$coupon_ammount;
	}elseif ($coupon_type == 2) {
		// code...
		$total =  (int)$sum - ((int)$coupon_ammount / 100) * (int)$sum ;

	}
}else {
	$total = (int)$sum;
}


$ORDER_ID = uniqid();
$CUST_ID = $_SESSION["user_id"];
$MOBILE_NO = $_SESSION["user_phone"];
$EMAIL = $_SESSION["user_email"];
$TXN_AMOUNT = $total;
$CALLBACK_URL = "http://localhost/cabnotels/pgResponse.php";


require_once("lib/encdec_paytm.php");
/* initialize an array with request parameters */
$paytmParams = array(

	/* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
	"MID" => "RlUbwA56080806291364",

	/* Find your WEBSITE in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
	"WEBSITE" => "WEBSTAGING",

	/* Find your INDUSTRY_TYPE_ID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
	"INDUSTRY_TYPE_ID" => "Retail",

	/* WEB for website and WAP for Mobile-websites or App */
	"CHANNEL_ID" => "WEB",

	/* Enter your unique order id */
	"ORDER_ID" => $ORDER_ID,

	/* unique id that belongs to your customer */
	"CUST_ID" => $CUST_ID,

	/* customer's mobile number */
	"MOBILE_NO" => $MOBILE_NO,

	/* customer's email */
	"EMAIL" => $EMAIL,

	/**
	* Amount in INR that is payble by customer
	* this should be numeric with optionally having two decimal points
	*/
	"TXN_AMOUNT" => $TXN_AMOUNT,

	/* on completion of transaction, we will send you the response on this URL */
	"CALLBACK_URL" => $CALLBACK_URL,
);

/**
* Generate checksum for parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys
*/
$checksum = getChecksumFromArray($paytmParams, "KFnKjc2&k6Bp7e!&");

/* for Staging */
$url = "https://securegw-stage.paytm.in/order/process";

/* for Production */
// $url = "https://securegw.paytm.in/order/process";

/* Prepare HTML Form and Submit to Paytm */
?>
<html>
	<head>
		<title>Merchant Checkout Page</title>
	</head>
	<body>
		<center><h1>Please do not refresh this page...</h1></center>
		<form method='post' action='<?php echo $url; ?>' name='paytm_form'>
				<?php
					foreach($paytmParams as $name => $value) {
						echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
					}
				?>
				<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checksum ?>">
		</form>
		<script type="text/javascript">
			document.paytm_form.submit();
		</script>
	</body>
</html>
