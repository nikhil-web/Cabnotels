<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cabnotels || Frontpage</title>
    <link rel="stylesheet" href="css/sb-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>



<div class="container">
  <h1>Frontpage Slider Images & Banner Text</h1>
  <p>Update the slider images and the Banner Text From Here</p>
  <hr>

  <div class="row">

      <?php
        $sql_banner = 'SELECT *  FROM frontpage_slider';
        $result_banner = mysqli_query($db, $sql_banner);
        if (mysqli_num_rows($result_banner) > 0) {
          // output data of each row
        while($row_banner= mysqli_fetch_assoc($result_banner)) {
          echo '
          <div class="col-lg-6 col-md-6 p-3">
            <div class="py-2">
              <img src="'.$row_banner["image_url"].'" class="img-fluid" alt="Responsive image">
            </div>
            <button data-toggle="modal" data-target="#banner'.$row_banner["id"].'" class="btn btn-primary" type="button" name="button">Update</button>
          </div>

        ';
      }
    }

?>
</div>
      <hr>
</div>


<?php
  $sql_modal = 'SELECT *  FROM frontpage_slider';
  $result_modal = mysqli_query($db, $sql_modal);
  if (mysqli_num_rows($result_modal) > 0) {
    // output data of each row
  while($row_modal= mysqli_fetch_assoc($result_modal)) {
    echo '

    <!-- Modal -->
    <div class="modal fade" id="banner'.$row_modal["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update About</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-8">
                    <img style="width:100%;" src="'.$row_modal["image_url"].'" alt="">
                  </div>
                  <div class="col-lg-4">
                    <form enctype="multipart/form-data" method="post" action="add-new-image-banner.php">
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" multiple="multiple" required="">

                          </div>
                            <input type="hidden" name="id" id="id" value="'.$row_modal["id"].'" required="">
                      </div>
                     <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
                     </form>
                     <p>Update Picture for about page</p>
                  </div>
                </div>
            </div>

            <hr>

              <p>Press Update to update</p>
              <form action="add_new_banner_details.php" method="post">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Heading</label>
                  <input type="text" class="form-control" id="heading" name="heading" placeholder="Heading" value="'.$row_modal["heading"].'">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlInput1">Subheading</label>
                  <input type="text" class="form-control" id="subheading" name="subheading" placeholder="Subheading" value="'.$row_modal["subheading"].'">
                </div>

                <input type="hidden" name="id" id="id" value="'.$row_modal["id"].'" required="">

                <button action="submit" type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Save</button>
                <button action="reset" type="reset" class="btn btn-primary btn-flat"><i class="fa fa-check-square-o"></i> Reset</button>
              </form>
              <div id="status_message" class="alert alert-primary" role="alert" style="margin-top:10px;">
                status
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- /#wrapper -->

  ';
}
}

?>



</body>
</html>
