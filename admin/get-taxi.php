<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT *  FROM taxi ORDER by taxi_id DESC';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '<tr style="
                  background: #f2f2f2;
              ">
                    <th>'.++$count.'</th>
                    <th>'.$row["taxi_name"].'</th>
                    <th>'.$row["taxi_loc"].'</th>
                    <th> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_image_'.$row["taxi_id"].'">Add/View</button>  </th>
                    <th>'.$row["taxi_disc"].'</th>
                    <th>'.$row["taxi_price"].'</th>

                    <th>'.$row["taxi_number"].'</th>

                    <th>

                    <button style="width: 100%;" type="button col-12 p-2" class="btn btn-primary" data-toggle="modal" data-target="#modal_view_amen_'.$row["taxi_id"].'">View</button>

                    <button style="width: 100%;" type="button col-12 p-2" class="btn btn-warning my-2" data-toggle="modal" data-target="#modal_add_amen_'.$row["taxi_id"].'">Add</button> </th>


                    <th>';
                    if ((int)$row["featured"]==1) {
                      // code...
                      $output .='
                      <div class="alert alert-success mb-3" role="alert">
                      <p class="p-0 m-0">Featured!</p>';
                    }else {
                      // code...
                      $output .='
                      <div class="alert alert-danger mb-3" role="alert">
                      <p class="p-0 m-0">Not Featured!</p>';
                    }
                    $output .='
                    </div>
                    <form action="change_featured_flag_taxi.php" method="post">
                      <div class="form-group">
                      <select class="form-control" id="featured_flag" name="featured_flag" required>
                        <option value="" >--Select--</option>
                        <option value="1" >Featured</option>
                        <option value="0" >Not Featured</option>
                      </select>
                    </div>
                    <input type="hidden" class="form-control" id="taxi_id" name="taxi_id" value="'.$row["taxi_id"].'">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary col-12">Submit</button>
                    </div>
                    </form>
                    </th>
                    <th>
                    <button onclick="delete_taxi('.$row["taxi_id"].')" type="button" class="btn btn-danger">Delete</button>
                    </th>
                    </tr>';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
