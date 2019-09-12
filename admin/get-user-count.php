<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT * from users';
        $result = mysqli_query($db, $sql);
        $output =mysqli_num_rows($result);
	      echo json_encode($output);
        mysqli_close($db);
