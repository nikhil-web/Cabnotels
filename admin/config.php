<?php
    /*place database credintials here*/
    define('DB_SERVER', 'localhost');

    $whitelist = array(
      '127.0.0.1','192.168.0.6',
    '::1'
    );

if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // not valid
        define('DB_USERNAME', 'cabnotel_nik_adm');define('DB_PASSWORD', '1016802075nikhil');define('DB_DATABASE', 'cabnotel_cabnotels');
}else{
        define('DB_USERNAME', 'root');define('DB_PASSWORD', '');define('DB_DATABASE', 'cabnotels');

}


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
