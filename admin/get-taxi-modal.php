<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT * FROM taxi';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '
                  <!--repeat-->
                  <!--amenities add modal-->
                  <div class="modal fade" id="modal_add_amen_'.$row["taxi_id"].'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title">Add New amenities for '.$row["taxi_name"].'</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>

                      <div class="card">
                         <div class="card-body">

                           <form method="post" action="add-new-amenities-taxi.php">
                           <div class="form-row">
                                 <div class="form-group col-md-12">
                                      <input type="text" class="form-control" id="amen_name" name="amen_name" placeholder="Amenities Name">
                                      <input type="hidden" class="form-control" id="taxi_id" name="taxi_id" value="'.$row["taxi_id"].'">
                                 </div>
                             </div>
                            <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
                            <button action="Reset" type="Reset" class="btn btn-primary btn-flat" name="edit"><i class="fas fa-refrest"></i> Reset</button>
                          </form>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>
                  <!--add aminities modal-->

                  <!--repeat-->

                <!--repeat-->
<div class="modal fade" id="modal_image_'.$row["taxi_id"].'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="card">
        <h5 class="card-header">Uplaod Pictures for '.$row["taxi_name"].'</h5>
         <div class="card-body">
           <h5 class="card-title">Title</h5>


           <form enctype="multipart/form-data" method="post" action="add-new-image-taxi.php">
           <div class="form-row">
                 <div class="form-group col-md-6">
                     <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" multiple="multiple" required="">
                     <input type="hidden" class="form-control" id="taxi_id" name="taxi_id" value="'.$row["taxi_id"].'">
                 </div>
             </div>
            <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
            </form>

          <hr>

          <div class="container gallery-container">

    <h1>'.$row["taxi_name"].' Pictures</h1>

    <p class="page-description text-center">Previous Pictures will appear here</p>

    <div class="tz-gallery">
        <div class="row">';


        $sql_inner = 'SELECT * FROM taxi_images WHERE taxi_id = '.$row["taxi_id"].'';
        $result_inner = mysqli_query($db, $sql_inner);
              if (mysqli_num_rows($result_inner) > 0) {
                  // output data of each row
                  while($row_inner= mysqli_fetch_assoc($result_inner)) {
                    $output.='
                    <div class="col-sm-6 col-md-4 mb-4">

                    <div class="col-12-fluid">
                      <a class="lightbox" href="'.$row_inner["taxi_image"].'">
                        <img src="'.$row_inner["taxi_image"].'" alt="Park">
                       </a>
                     </div>
                     <div class="col-12-fluid my-2">
                     <a href="delete-image-taxi.php?id_image='.$row_inner["id"].'"><button type="button" class="btn btn-danger">Delete</button></a>
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
                <!--repeat-->


                <!--amenities modal-->
                <div class="modal fade" id="modal_view_amen_'.$row["taxi_id"].'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">Details for '.$row["taxi_name"].'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card">
                  <div class="card-body">
                   <h5 class="card-title">Amenities Details</h5>
                   <table class="table table-striped">
                   <thead>
                     <tr>
                       <th scope="col">#</th>
                       <th scope="col">Amenities</th>
                       <th scope="col">status</th>
                       <th scope="col">Tools</th>
                     </tr>
                   </thead>
                   <tbody>

                       ';
                       $count=0;
                       $sql_inner_amen = 'SELECT * FROM amen_taxi WHERE taxi_id = '.$row["taxi_id"].' ';
                       $result_amen = mysqli_query($db, $sql_inner_amen);
                             if (mysqli_num_rows($result_amen) > 0) {
                                 // output data of each row
                                 while($row_amen= mysqli_fetch_assoc($result_amen)) {
                                   $output .= '
                                   <tr>
                                   <th scope="row">'.++$count.'</th>
                                   <td>'.$row_amen["amen_name"].'</td>
                                   <th>';
                                   if ((int)$row_amen["status"]==1) {
                                     // code...
                                     $output .='
                                     <div class="alert alert-success mb-3" role="alert">
                                     <p class="p-0 m-0">Avaialabe!</p>';
                                   }else {
                                     // code...
                                     $output .='
                                     <div class="alert alert-danger mb-3" role="alert">
                                     <p class="p-0 m-0">Not Avaialabe!</p>';
                                   }
                                   $output .='
                                   </div>
                                   <form action="change_amen_flag.php" method="post">
                                     <div class="form-group">
                                     <select class="form-control" id="amen_flag" name="amen_flag" required>
                                       <option value="" >--Select--</option>
                                       <option value="1" >Avaialabe</option>
                                       <option value="0" >Not Avaialabe</option>
                                     </select>
                                   </div>
                                   <input type="hidden" class="form-control" id="amen_id" name="amen_id" value="'.$row_amen["id"].'">
                                   <div class="form-group">
                                     <button type="submit" class="btn btn-primary col-12">Submit</button>
                                   </div>
                                   </form>
                                   </th>
                                   <td scope="row">
                                     <button onclick="delete_amen('.$row_amen["id"].')" type="button" class="btn btn-danger">Delete</button>
                                   </td>
                              </tr>';
                    }
                  }
                     $output.='
                 </tbody>
                 </table>
                   </div>
                  </div>
                  </div>
                </div>
                </div>
              <!--amenities modal-->

                ';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
