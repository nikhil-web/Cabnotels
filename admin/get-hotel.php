<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT *  FROM hotels ORDER by hotel_id DESC';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '<tr style="
                  background: #f2f2f2;
              ">
                    <th>'.++$count.'</th>
                    <th>'.$row["hotel_name"].'</th>
                    <th>'.$row["hotel_loc"].'</th>
                    <th> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_image_'.$row["hotel_id"].'">Add/View</button>  </th>
                    <th>'.$row["hotel_add"].'</th>
                    <th>'.$row["hotel_email"].'</th>

                    <th>
                    <button type="button" class="col-12 btn btn-info mb-2" data-toggle="modal" data-target="#modal_price_table_'.$row["hotel_id"].'">View</button>
                    <button type="button" class="col-12 btn btn-primary mb-2" data-toggle="modal" data-target="#modal_price_tour_'.$row["hotel_id"].'">Add</button>
                    </th>

                    <th>'.$row["hotel_number"].'</th>

                    <th>

                    <button style="width: 100%;" type="button col-12 p-2" class="btn btn-primary" data-toggle="modal" data-target="#modal_'.$row["hotel_id"].'">View</button>

                    <button style="width: 100%;" type="button col-12 p-2" class="btn btn-warning my-2" data-toggle="modal" data-target="#modal_add_amen_'.$row["hotel_id"].'">Add</button> </th>

                    <th>
                    <button onclick="delete_hotel('.$row["hotel_id"].')" type="button" class="btn btn-danger">Delete</button>
                    </th>
                    </tr>';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
