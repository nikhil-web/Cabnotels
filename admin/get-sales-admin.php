<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT * from cart INNER JOIN users ON cart.user_id = users.user_id WHERE cart.status = 1';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $count++;

                    $output .= '<tr">
                      <td>'.$count.'</td>
                      <td>'.$row["orderid"].'</td>
                      <td>'.$row["first_name"].' '.$row["last_name"].'</td>
                      <td>'.$row["user_email"].'</td>
                      <td>'.$row["user_phone"].'</td>
                      <td>'.$row["item_price"].'</td>
                      </tr>';


                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
