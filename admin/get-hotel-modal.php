<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT * FROM hotels';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '
                  <!--amenities modal-->
                  <div class="modal fade" id="modal_'.$row["hotel_id"].'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Details for '.$row["hotel_name"].'</h5>
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
                         $sql_inner_amen = 'SELECT * FROM amen_hotel WHERE hotel_id = '.$row["hotel_id"].' ';
                         $result_amen = mysqli_query($db, $sql_inner_amen);
                               if (mysqli_num_rows($result_amen) > 0) {
                                   // output data of each row
                                   while($row_amen= mysqli_fetch_assoc($result_amen)) {
                                     $output .= '
                                     <tr>
                                     <th scope="row">'.++$count.'</th>
                                     <td>'.$row_amen["amn_name"].'</td>
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


<!--image modal-->
<div class="modal fade" id="modal_image_'.$row["hotel_id"].'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Uplaod Pictures for '.$row["hotel_name"].'</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <div class="card">
         <div class="card-body">
           <form enctype="multipart/form-data" method="post" action="add-new-image.php">
           <div class="form-row">
                 <div class="form-group col-md-6">
                     <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" multiple="multiple" required="">
                     <input type="hidden" class="form-control" id="hotel_id" name="hotel_id" value="'.$row["hotel_id"].'">
                 </div>
             </div>
            <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
            </form>

          <hr>

          <div class="container gallery-container">

    <h1>'.$row["hotel_name"].' Pictures</h1>

    <p class="page-description text-center">Previous Pictures will appear here</p>

    <div class="tz-gallery">
        <div class="row">';


        $sql_inner = 'SELECT * FROM hotel_images WHERE hotel_id = '.$row["hotel_id"].'';
        $result_inner = mysqli_query($db, $sql_inner);
              if (mysqli_num_rows($result_inner) > 0) {
                  // output data of each row
                  while($row_inner= mysqli_fetch_assoc($result_inner)) {
                    $output.='
                    <div class="col-sm-6 col-md-4 mb-4">

                    <div class="col-12-fluid">
                      <a class="lightbox" href="'.$row_inner["hotel_image"].'">
                        <img src="'.$row_inner["hotel_image"].'" alt="Park">
                       </a>
                     </div>
                     <div class="col-12-fluid my-2">
                     <a href="delete-image-hotel.php?id_image='.$row_inner["id"].'"><button type="button" class="btn btn-danger">Delete</button></a>
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

<!--amenities add modal-->
<div class="modal fade" id="modal_add_amen_'.$row["hotel_id"].'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Add New amenities for '.$row["hotel_name"].'</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>

    <div class="card">
       <div class="card-body">

         <form method="post" action="add-new-amenities.php">
         <div class="form-row">
               <div class="form-group col-md-12">
                    <input type="text" class="form-control" id="amen_name" name="amen_name" placeholder="Amenities Name">
                    <input type="hidden" class="form-control" id="hotel_id" name="hotel_id" value="'.$row["hotel_id"].'">
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

<div class="modal fade" id="modal_price_table_'.$row["hotel_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    $sql_price = 'select * from hotel_price WHERE hotel_id = '.$row["hotel_id"].'';
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

<div class="modal fade" id="modal_price_tour_'.$row["hotel_id"].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Pricing Deatils For   '.$row["hotel_name"].'</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="container">
    <h5>Fill the Pricing corresponding to the number of people</h5>

  <div class="col-12 my-4">
  <form action="add_price_hotel.php" method="POST">

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


<input type="hidden" class="form-control" id="hotel_id" name="hotel_id" value="'.$row["hotel_id"].'">



<button type="submit" class="btn btn-primary">Submit</button>
<button type="Reset" class="btn btn-primary">Reset</button>

    </form>
      </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_price_tour_update_'.$row["hotel_id"].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Pricing Deatils For   '.$row["hotel_name"].'</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  $sql_price = 'select * from hotel_price WHERE hotel_id = '.$row["hotel_id"].'';
  $result_price = mysqli_query($db, $sql_price);
  $counting = 0;
  $row_price= mysqli_fetch_assoc($result_price);

  $output .='
  <div class="container">
    <h5>Fill the Pricing corresponding to the number of people</h5>

  <div class="col-12 my-4">
  <form action="update_price_hotel.php" method="POST">

      <div class="form-group row">
        <label for="p_one" class="col-sm-2 col-form-label">One</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="p_one" name="p_one" value="'.$row_price["p_1"].'" value="'.$row_price["p_1"].'" required="">
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
  <input type="number" class="form-control" id="p_eight" name="p_eight" value="'.$row_price["p_8"].'" required="">
</div>
</div>


<input type="hidden" class="form-control" id="hotel_id" name="hotel_id" value="'.$row["hotel_id"].'">



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
