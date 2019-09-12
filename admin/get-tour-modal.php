<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT * FROM tours';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '
                  <!--repeat-->
<div class="modal fade" id="modal_image_'.$row["tour_id"].'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Uplaod Pictures for '.$row["tour_name"].'</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <div class="card">
         <div class="card-body">
           <form enctype="multipart/form-data" method="post" action="add-new-image-tour.php">
           <div class="form-row">
                 <div class="form-group col-md-6">
                     <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" multiple="multiple" required="">
                     <input type="hidden" class="form-control" id="tour_id" name="tour_id" value="'.$row["tour_id"].'">
                 </div>
             </div>
            <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
            </form>

          <hr>

          <div class="container gallery-container">

    <h1>'.$row["tour_name"].' Pictures</h1>

    <p class="page-description text-center">Previous Pictures will appear here</p>

    <div class="tz-gallery">
        <div class="row">';


        $sql_inner = 'SELECT * FROM tour_images WHERE tour_id = '.$row["tour_id"].'';
        $result_inner = mysqli_query($db, $sql_inner);
              if (mysqli_num_rows($result_inner) > 0) {
                  // output data of each row
                  while($row_inner= mysqli_fetch_assoc($result_inner)) {
                    $output.='
                    <div class="col-sm-6 col-md-4 mb-4">

                    <div class="col-12-fluid">
                      <a class="lightbox" href="'.$row_inner["tour_image"].'">
                        <img src="'.$row_inner["tour_image"].'" alt="Park">
                       </a>
                     </div>
                     <div class="col-12-fluid my-2">
                     <a href="delete-image-tour.php?id_image='.$row_inner["id"].'"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>


                  </div>';
                  }
                }else{
                  $output.='No image found';
                }




        $output.='</div>

    </div>

</div>


       </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_timeline_'.$row["tour_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Timeline For   '.$row["tour_name"].'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
          <div class="col-12 p-3">

          <ul class="nav nav-tabs" id="myTab" role="tablist">';

          $count = 0;
          for ($i=0; $i < (int)$row["num_days"]; $i++) {
            // code...
            if ($i == 0) {
              // code...
              $output .= '
              <li class="nav-item mr-1">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab_'.$row["tour_id"].'_'.$i.'" role="tab" aria-controls="pills-home" aria-selected="true">Day '. ++$count .'</a>
              </li>';
            }else {
              $output .= '
              <li class="nav-item mr-1">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#tab_'.$row["tour_id"].'_'.$i.'" role="tab" aria-controls="pills-home" aria-selected="true">Day '.++$count.'</a>
              </li>';
            }
          }


      $output .= '</ul>
            <div class="tab-content" id="myTabContent">';
            $count = 0;
            for ($i=0; $i < (int)$row["num_days"]; $i++) {
              // code...
                if ($i == 0) {
              $output .= '
                <div class="tab-pane fade show active" id="tab_'.$row["tour_id"].'_'.$i.'" role="tabpanel">
                  <div class="p-3">
                  <h3>Day '.++$count.' Schedule</h3>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th scope="col">#</th>
                      <th scope="col">Heading</th>
                      <th scope="col">Content</th>
                      <th scope="col">Tools</th>
                      </tr>
                    </thead>
                    <tbody>';

                    $sql_timeline = 'SELECT * FROM timeline WHERE timeline.tour_id = '.$row["tour_id"].' AND timeline.day = '.$i.'';

                    $result_timeline = mysqli_query($db, $sql_timeline);
                     if (mysqli_num_rows($result_timeline) > 0) {
                     // output data of each hotel image.
                     $count_timeline = 0;
                       while($row_timeline= mysqli_fetch_assoc($result_timeline)) {

                         $output .= '<tr>
                           <th scope="row">'.++$count_timeline.'</th>
                           <td>'.$row_timeline["point_heading"].'</td>
                           <td>'.$row_timeline["point_content"].'</td>
                           <td>
                           <a href="delete-timeline.php?id='.$row_timeline["id"].'" class="btn btn-danger" href="#" role="button">DELETE</a>
                           </td>
                         </tr>
                         ';
                       }
                     }



                    $output .='</tbody>
                    </table>
                  </div>

                </div>
              ';
            }else {
              $output .= '
              <div class="tab-pane fade" id="tab_'.$row["tour_id"].'_'.$i.'" role="tabpanel">
              <div class="p-3">
              <h3>Day '.++$count.' Schedule</h3>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Heading</th>
                    <th scope="col">Content</th>
                    <th scope="col">Tools</th>
                  </tr>
                </thead>
                <tbody>';

                $sql_timeline = 'SELECT * FROM timeline WHERE timeline.tour_id = '.$row["tour_id"].' AND timeline.day = '.$i.'';

                $result_timeline = mysqli_query($db, $sql_timeline);
                 if (mysqli_num_rows($result_timeline) > 0) {
                 // output data of each hotel image.
                   while($row_timeline= mysqli_fetch_assoc($result_timeline)) {
                     $output .= '<tr>
                       <th scope="row">'.++$count.'</th>
                       <td>'.$row_timeline["point_heading"].'</td>
                       <td>'.$row_timeline["point_content"].'</td>
                       <td>
                       <a href="delete-timeline.php?id='.$row_timeline["id"].'" class="btn btn-danger" href="#" role="button">DELETE</a>
                       </td>
                     </tr>
                     ';
                   }
                 }
                $output .='</tbody>
                </table>
              </div>
              </div>
              ';
                }
              }
          $output .='</div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                <!--repeat-->

<div class="modal fade" id="modal_includes_'.$row["tour_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

    <div class="card mb-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="container">
                                    <p>Add Every Thing That is included</p>
                                    <form action="add-include.php" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="c_name">Includes</label>
                                                <input type="text" class="form-control" id="includes" name="includes" placeholder="Includes" required>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" id="tour_id" name="tour_id" value ="'.$row["tour_id"].'">
                                        <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
                                    </form>

                                    <div id="status_message" class="alert alert-primary" role="alert" style="margin-top:10px;">
                                        status
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Included Item</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Location Name</th>
                                            </tr>
                                        </tfoot>

                    <tbody>';
                    $sql_includes = 'select * from included WHERE tour_id = '.$row["tour_id"].'';
                    $result_includes = mysqli_query($db, $sql_includes);
                    $counting = 0;
                     if (mysqli_num_rows($result_includes) > 0) {
                        $counting = 0;
                     // output data of each hotel image.
                       while($row_includes= mysqli_fetch_assoc($result_includes)) {

                         $output .= '<tr>
                               <th>'.++$counting.'</th>
                               <th>'.$row_includes["name"].'</th>
                             </tr>';
                       }
                     }

                    $output .= '</tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_excludes_'.$row["tour_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

    <div class="card mb-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="container">
                                    <p>Add Every Thing That is Excuded</p>
                                    <form action="add-exclude.php" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="c_name">Excluded</label>
                                                <input type="text" class="form-control" id="exclude" name="exclude" placeholder="Excludes" required>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" id="tour_id" name="tour_id" value ="'.$row["tour_id"].'">
                                        <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
                                    </form>

                                    <div id="status_message" class="alert alert-primary" role="alert" style="margin-top:10px;">
                                        status
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Included Item</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Location Name</th>
                                            </tr>
                                        </tfoot>

                    <tbody>';
                    $sql_includes = 'select * from exclude WHERE tour_id = '.$row["tour_id"].'';
                    $result_includes = mysqli_query($db, $sql_includes);
                    $counting = 0;
                     if (mysqli_num_rows($result_includes) > 0) {
                        $counting = 0;
                     // output data of each hotel image.
                       while($row_includes= mysqli_fetch_assoc($result_includes)) {

                         $output .= '<tr>
                               <th>'.++$counting.'</th>
                               <th>'.$row_includes["name"].'</th>
                             </tr>';
                       }
                     }

                    $output .= '</tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_price_tour_'.$row["tour_id"].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Pricing Deatils For   '.$row["tour_name"].'</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="container">
    <h5>Fill the Pricing corresponding to the number of people</h5>

  <div class="col-12 my-4">
  <form action="add_price_tour.php" method="POST">

      <div class="form-group row">
        <label for="p_one" class="col-sm-2 col-form-label">One</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="p_one" name="p_one" placeholder="Price For 1" required="">
        </div>
      </div>

      <div class="form-group row">
      <label for="p_two" class="col-sm-2 col-form-label">Two</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="p_two" name="p_two" placeholder="Price For 2" required="">
      </div>
    </div>

    <div class="form-group row">
    <label for="p_three" class="col-sm-2 col-form-label">Three</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="p_three" name="p_three" placeholder="Price For 3" required="">
    </div>
  </div>


  <div class="form-group row">
  <label for="p_four" class="col-sm-2 col-form-label">four</label>
  <div class="col-sm-10">
    <input type="number" class="form-control" id="p_four" name="p_four" placeholder="Price For 4" required="">
  </div>
</div>


<div class="form-group row">
<label for="p_five" class="col-sm-2 col-form-label">Five</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_five" name="p_five" placeholder="Price For 5" required="">
</div>
</div>


<div class="form-group row">
<label for="p_six" class="col-sm-2 col-form-label">Six</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_six" name="p_six" placeholder="Price For 6" required="">
</div>
</div>


<div class="form-group row">
<label for="p_seven" class="col-sm-2 col-form-label">Seven</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_seven" name="p_seven" placeholder="Price For 7" required="">
</div>
</div>


<div class="form-group row">
<label for="p_eight" class="col-sm-2 col-form-label">Eight</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_eight" name="p_eight" placeholder="Price For 8" required="">
</div>
</div>


<input type="hidden" class="form-control" id="tour_id" name="tour_id" value="'.$row["tour_id"].'">



<button type="submit" class="btn btn-primary">Submit</button>
<button type="Reset" class="btn btn-primary">Reset</button>

    </form>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_price_table_'.$row["tour_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

    <div class="card mb-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="container">
                                    <p>Pricing table</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>People.</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>People.</th>
                                              <th>Price</th>
                                            </tr>
                                        </tfoot>

                    <tbody>';
                    $sql_price = 'select * from tour_price WHERE tour_id = '.$row["tour_id"].'';
                    $result_price = mysqli_query($db, $sql_price);
                    $counting = 0;
                     if (mysqli_num_rows($result_price) > 0) {
                        $counting = 0;
                     // output data of each hotel image.
                       while($row_price= mysqli_fetch_assoc($result_price)) {

                         $output .= '
                              <tr>
                               <th>One</th>
                               <th>'.$row_price["p_1"].'</th>
                             </tr>
                             <tr>
                             <th>Two</th>
                             <th>'.$row_price["p_2"].'</th>
                           </tr>
                           <tr>
                           <th>Three</th>
                           <th>'.$row_price["p_3"].'</th>
                         </tr>
                         <tr>
                         <th>Four</th>
                         <th>'.$row_price["p_4"].'</th>
                       </tr>
                       <tr>
                       <th>Five</th>
                       <th>'.$row_price["p_5"].'</th>
                     </tr>
                     <tr>
                     <th>Six</th>
                     <th>'.$row_price["p_6"].'</th>
                   </tr>
                   <tr>
                   <th>Seven</th>
                   <th>'.$row_price["p_7"].'</th>
                 </tr>
                 <tr>
                 <th>Eight</th>
                 <th>'.$row_price["p_8"].'</th>
               </tr>';
                       }
                     }

                    $output .= '</tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>





<div class="modal fade" id="modal_price_tour_update_'.$row["tour_id"].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Pricing Deatils For   '.$row["tour_name"].'</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  ';

  $sql_price = 'select * from tour_price WHERE tour_id = '.$row["tour_id"].'';
  $result_price = mysqli_query($db, $sql_price);
  $counting = 0;
  $row_price= mysqli_fetch_assoc($result_price);

  $output .='

  <div class="container">
    <h5>Fill the Pricing corresponding to the number of people</h5>

  <div class="col-12 my-4">
  <form action="update_price_tour.php" method="POST">

      <div class="form-group row">
        <label for="p_one" class="col-sm-2 col-form-label">One</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="p_one" name="p_one" value="'.$row_price["p_1"].'" required="">
        </div>
      </div>

      <div class="form-group row">
      <label for="p_two" class="col-sm-2 col-form-label">Two</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="p_two" name="p_two" value="'.$row_price["p_2"].'" required="">
      </div>
    </div>

    <div class="form-group row">
    <label for="p_three" class="col-sm-2 col-form-label">Three</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="p_three" name="p_three" value="'.$row_price["p_3"].'" required="">
    </div>
  </div>


  <div class="form-group row">
  <label for="p_four" class="col-sm-2 col-form-label">four</label>
  <div class="col-sm-10">
    <input type="number" class="form-control" id="p_four" name="p_four" value="'.$row_price["p_4"].'" required="">
  </div>
</div>


<div class="form-group row">
<label for="p_five" class="col-sm-2 col-form-label">Five</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_five" name="p_five" value="'.$row_price["p_5"].'" required="">
</div>
</div>


<div class="form-group row">
<label for="p_six" class="col-sm-2 col-form-label">Six</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_six" name="p_six" value="'.$row_price["p_6"].'" required="">
</div>
</div>


<div class="form-group row">
<label for="p_seven" class="col-sm-2 col-form-label">Seven</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_seven" name="p_seven" value="'.$row_price["p_7"].'" required="">
</div>
</div>


<div class="form-group row">
<label for="p_eight" class="col-sm-2 col-form-label">Eight</label>
<div class="col-sm-10">
  <input type="number" class="form-control" id="p_eight" name="p_eight" value="'.$row_price["p_8"].'"" required="">
</div>
</div>


<input type="hidden" class="form-control" id="tour_id" name="tour_id" value="'.$row["tour_id"].'">



<button type="submit" class="btn btn-primary">Submit</button>
<button type="Reset" class="btn btn-primary">Reset</button>

    </form>
      </div>
      </div>
    </div>
  </div>
</div>
';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
