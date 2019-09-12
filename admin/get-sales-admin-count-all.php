<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT * from cart INNER JOIN users ON cart.user_id = users.user_id WHERE cart.status = 0';
        $result = mysqli_query($db, $sql);
        $output =mysqli_num_rows($result);
	      echo json_encode($output);
        mysqli_close($db);
