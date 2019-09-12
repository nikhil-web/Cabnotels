<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT *  FROM tours ORDER by tour_id DESC';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '<tr style="
                  background: #f2f2f2;
              ">
                    <th>'.++$count.'</th>
                    <th>'.$row["tour_name"].'</th>
                    <th>'.$row["tour_loc"].'</th>
                    <th> <button type="button" class="col-12 btn btn-primary mb-2" data-toggle="modal" data-target="#modal_image_'.$row["tour_id"].'">Add/View</button>  </th>
                    <th>
                    <button type="button" class="col-12 btn btn-primary mb-2" data-toggle="modal" data-target="#modal_includes_'.$row["tour_id"].'">Included</button>
                    <button type="button" class="col-12 btn btn-danger mb-2" data-toggle="modal" data-target="#modal_excludes_'.$row["tour_id"].'">Exculded</button>
                    </th>
                    <th>
                    ';

                    if ($row["price_flag"] == 1) {
                      $output .= '

                      <button type="button" class="col-12 btn btn-info mb-2" data-toggle="modal" data-target="#modal_price_table_'.$row["tour_id"].'">View</button>
                      <button type="button" class="col-12 btn btn-primary mb-2" data-toggle="modal" data-target="#modal_price_tour_update_'.$row["tour_id"].'">Update</button>';

                    }elseif ($row["price_flag"] == 0) {
                      $output .= '<button type="button" class="col-12 btn btn-primary mb-2" data-toggle="modal" data-target="#modal_price_tour_'.$row["tour_id"].'">Add</button>';
                    }
                    $output .='

                    <hr>
                    <a href="add_pricing.php?tour_id='.$row["tour_id"].'" class="col-12 btn btn-primary mb-2" href="#" role="button" target="__blank">Add Pricing</a>
                    </th>

                    <th>
                    <button type="button" class="col-12 btn btn-info mb-2" data-toggle="modal" data-target="#modal_timeline_'.$row["tour_id"].'">View</button>';

                    if ((int)$row["timeline_status"] == 1 ) {
                      // code...
                      $output .= '<a href="edit_schedule.php?tour_id='.$row["tour_id"].'" class="col-12 btn btn-primary mb-2" href="#" role="button">Add</a>';

                    }elseif ((int)$row["timeline_status"] == 0) {
                      // code...
                      $output .= '<a href="add_schedule.php?tour_id='.$row["tour_id"].'" class="col-12 btn btn-primary mb-2" href="#" role="button">Add</a>';
                    }

                    $output .= '
                      </th>

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
                      <form action="change_featured_flag.php" method="post">
                        <div class="form-group">
                        <select class="form-control" id="featured_flag" name="featured_flag" required>
                          <option value="" >--Select--</option>
                          <option value="1" >Featured</option>
                          <option value="0" >Not Featured</option>
                        </select>
                      </div>
                      <input type="hidden" class="form-control" id="tour_id" name="tour_id" value="'.$row["tour_id"].'">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary col-12">Submit</button>
                      </div>
                      </form>
                      </th>
                    <th>
                    <button onclick="delete_tour('.$row["tour_id"].')" type="button"     class="btn btn-danger">Delete</button>
                    </th>
                    </tr>';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
