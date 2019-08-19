<?php
    /*place database credintials here*/
    define('DB_SERVER', 'localhost');

    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'cabnotels');
<<<<<<< HEAD
      /*
    define('DB_USERNAME', 'cabnotel_nik_adm');
    define('DB_PASSWORD', '1016802075nikhil');
    define('DB_DATABASE', 'cabnotel_cabnotels');
    */
=======
 */
    define('DB_USERNAME', '');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', '');
   
>>>>>>> 796d4f67cdbd1a629a4f7ca3fca043221b856aa2
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
//   echo "connected";
    }
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function navigate($url) {
    echo "<script>location.href = '$url';</script>";
}
?>
