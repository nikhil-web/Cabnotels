<?php
    /*place database credintials here*/
    define('DB_SERVER', 'localhost');
  /* 
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'cabnotels');
 */
    define('DB_USERNAME', '');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', '');
   
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
