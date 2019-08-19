<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT *  FROM locations ORDER by loc_id DESC';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '<tr style="
                  background: #f2f2f2;
              ">
                    <th>'.++$count.'</th>
                    <th>'.$row["loc_name"].'</th>
                    <th> <button onclick="delete_loc('.$row["loc_id"].')" type="button" class="btn btn-danger">Delete</button></th>
                    </tr>';

                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
