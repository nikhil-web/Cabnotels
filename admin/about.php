<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
}
$sql = "SELECT * FROM about_page";
$result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        $row= mysqli_fetch_assoc($result);
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cabnotels - About</title>
  <script src="js/jquery.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php include 'includes/navbar.php'; ?>

  <div id="wrapper">

    <?php include 'includes/sidebar.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">About</li>
        </ol>

        <!-- Page Content -->
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card mb-3">
           <div class="card-header">
                <h5>About</h5>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Heading</th>
                    <th>Subheading</th>
                    <th>Content</th>
                    <th>Customers</th>
                    <th>Tours</th>
                    <th>Destinations</th>
                    <th>Experiance</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S.No.</th>
                    <th>Heading</th>
                    <th>Subheading</th>
                    <th>Content</th>
                    <th>Customers</th>
                    <th>Tours</th>
                    <th>Destinations</th>
                    <th>Experiance</th>
                    <th>Edit</th>
                  </tr>
                </tfoot>

                <tbody id="output_location">

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->


    </div>
    <!-- /.content-wrapper -->

  <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <img style="width:100%;" src="<?php echo $row["image"] ?>" alt="">
                </div>
                <div class="col-lg-4">
                  <form enctype="multipart/form-data" method="post" action="add-new-image-about.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" multiple="multiple" required="">
                        </div>
                    </div>
                   <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
                   </form>
                   <p>Update Picture for about page</p>
                </div>
              </div>
          </div>

          <hr>

            <p>Press Update to update</p>
            <form id="main_about_add" method="get">

              <div class="form-group">
                <label for="exampleFormControlInput1">Heading</label>
                <input type="text" class="form-control" id="heading" name="heading" placeholder="Heading" value="<?php echo $row["heading"];?>">
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Subheading</label>
                <input type="text" class="form-control" id="subheading" name="subheading" placeholder="Subheading" value="<?php echo $row["subheading"];?>">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5"> <?php echo $row["content"];?> </textarea>
              </div>



              <!-- Labels -->
              <h3>Select the Features</h3>
              <div class="row">

                <div class="col">
                  <label for="exampleFormControlInput1">Customers</label>
                  <input type="text" class="form-control" id="customers" name="customers" placeholder="Customers" value="<?php echo $row["customers"];?>">
                </div>

                <div class="col">
                  <label for="exampleFormControlInput1">Tours</label>
                  <input type="text" class="form-control" id="tours" name="tours" placeholder="Tours" value="<?php echo $row["tours"];?>">
                </div>

                <div class="col">
                  <label for="exampleFormControlInput1">Destinations</label>
                  <input type="text" class="form-control" id="destinations" name="destinations" placeholder="Destinations" value="<?php echo $row["destinations"];?>">
                </div>

                <div class="col">
                  <label for="exampleFormControlInput1">Experiance</label>
                  <input type="text" class="form-control" id="experiance" name="experiance" placeholder="Experiance" value="<?php echo $row["experiance"];?>">
                </div>


              </div>
              <!-- Labels -->
              <div class="form-group py-3">
                <label for="exampleFormControlInput1">Press Save Button To Save</label>
              </div>

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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <?php include 'includes/logout.php'; ?>

  <!-- Bootstrap core JavaScript-->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


  <script type="text/javascript">
  $(function() {
      $('#main_about_add').on('submit', function(e) {
          e.preventDefault();
          //console.log($('#main_hotel_add').serialize());
          if (validate()){
              $.ajax({
                  type: 'post',
                  url: 'update-about.php',
                  data: $('#main_about_add').serialize(),
                  dataType: 'JSON',
                  success: function(response) {
                      if (response == 1) {
                          get_about();
                          update_staus_success("Sucess");
                      } else if (response == 0) {
                          update_staus_error("....");
                      } else {
                          update_staus_error("Somthing Happend");
                      }
                  }
              });
          }else {
              update_staus_error("Insuficient Data Provided");
              validate();

          }

      });
  });

get_about();
   function get_about() {
          $.ajax({
              type: "POST",
              url: "get-about.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {
                  document.getElementById("output_location").innerHTML = response_location_all;
              }
          });
      }


function validate(){
  return true;
}

      //utility functions
      function update_staus_error(message) {
          document.getElementById('status_message').innerHTML = message;
          $("#status_message").addClass("alert-danger");
      }

      function update_staus_success(message) {
          document.getElementById('status_message').innerHTML = message;
          $("#status_message").addClass("alert-successs");
      }

  </script>

</body>

</html>
