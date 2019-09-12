<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/


$ORDER_ID = uniqid();
$CUST_ID = '123';
$MOBILE_NO = '9616382389';
$EMAIL = 'nikhilpandey.pandey9@gmail.com';
$TXN_AMOUNT = 1;
$CALLBACK_URL = "http://localhost/cabnotels/paytmkit/pgResponse.php";


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
