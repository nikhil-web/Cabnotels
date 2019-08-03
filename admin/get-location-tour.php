<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT *  FROM locations_tours ORDER by loc_id DESC';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '<tr style="
                  background: #f2f2f2;
              ">
                    <th>'.++$count.'</th>
                    <th>'.$row["loc_name"].'</th>';
                    $sql_inner = 'SELECT * FROM location_image WHERE loc_id = '.$row["loc_id"].'';
                    $result_inner = mysqli_query($db, $sql_inner);
                          if (mysqli_num_rows($result_inner) > 0) {
                            while($row_inner= mysqli_fetch_assoc($result_inner)) {
                            $output .= '
                          <th>
                              <img style="width:150px;" src="'.$row_inner["image"].'" class="img-fluid" alt="">
                          </th>';
                        }
                          }else{
                            $output .= '
                          <th>
                            <form enctype="multipart/form-data" method="post" action="add-new-image-location.php">
                             <div class="form-row">
                                   <div class="form-group col-md-6">
                                       <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" multiple="multiple" required="">
                                       <input type="hidden" class="form-control" id="location_id" name="location_id" value="'.$row["loc_id"].'">
                                   </div>
                               </div>
                              <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
                            </form>
                          </th>';
                          }


                    $output .='<th> <button onclick="delete_loc_tour('.$row["loc_id"].')" type="button" class="btn btn-danger">Delete</button></th>
                    </tr>';

                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
