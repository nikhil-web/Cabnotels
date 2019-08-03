<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
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

  <title>Cabnotels - locations</title>
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
          <li class="breadcrumb-item active">Locations</li>
        </ol>

        <!-- Page Content -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_hotel">
          Add New Hotel location
        </button>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_tour">
          Add New Tour location
        </button>


        <hr>
        <!-- DataTables Example -->

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="hotel-location-tab-pil" data-toggle="tab" href="#hotel-location-tab" role="tab" aria-controls="home" aria-selected="true">Hotel Locations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="tour-location-tab-pil" data-toggle="tab" href="#tour-location-tab" role="tab" aria-controls="profile" aria-selected="false">Tour Locations</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="hotel-location-tab" role="tabpanel" aria-labelledby="home-tab">
  <div class="card mb-3">
          <div class="card mb-3">
           <div class="card-header">
           <h3>Hotel Locations</h3>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Location Name</th>
                    <th>Tools</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S.No.</th>
                    <th>Location Name</th>
                    <th>Tools</th>
                  </tr>
                </tfoot>

                <tbody id="output_location_hotels">

                </tbody>
              </table>
            </div>
          </div>
        </div>

        </div>
  </div>
  <div class="tab-pane fade" id="tour-location-tab" role="tabpanel" aria-labelledby="profile-tab">
  <div class="card mb-3">
          <div class="card mb-3">
           <div class="card-header">
                <h3>Tour Locations</h3>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Location Name</th>
                    <th>Image</th>
                    <th>Tools</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S.No.</th>
                    <th>Location Name</th>
                    <th>Image</th>
                    <th>Tools</th>
                  </tr>
                </tfoot>

                <tbody id="output_location_tour">

                </tbody>
              </table>
            </div>
          </div>
        </div>

        </div>
  </div>
</div>


      <!-- /.container-fluid -->


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <div id="modals_for_hotel_details">



  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal_hotel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Hotel Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Type the name and press Add to add new Location</p>
          <form id="main_location_add_hotel" method="get">


            <div class="form-group">
              <label for="exampleFormControlInput1">location Name</label>
              <input type="text" class="form-control" id="location_name" name="location_name" placeholder="Hotel Name">
            </div>


            <button action="submit" type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Add</button>
            <button action="reset" type="reset" class="btn btn-primary btn-flat"><i class="fa fa-check-square-o"></i> Reset</button>
          </form>



          <div id="status_message" class="alert alert-primary" role="alert" style="margin-top:10px;">
            status
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal_tour" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Tour Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Type the name and press Add to add new Location</p>
          <form id="main_location_add_tour" method="get">


            <div class="form-group">
              <label for="exampleFormControlInput1">location Name</label>
              <input type="text" class="form-control" id="location_name_tour" name="location_name_tour" placeholder="Location Name">
            </div>


            <button action="submit" type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Add</button>
            <button action="reset" type="reset" class="btn btn-primary btn-flat"><i class="fa fa-check-square-o"></i> Reset</button>
          </form>



          <div id="status_message_tour" class="alert alert-primary" role="alert" style="margin-top:10px;">
            status
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  </div>




  <?php include 'includes/logout.php'; ?>

  <!-- Bootstrap core JavaScript-->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


  <script type="text/javascript">

  $(function() {
      $('#main_location_add_hotel').on('submit', function(e) {
          e.preventDefault();
          if (true){
              $.ajax({
                  type: 'post',
                  url: 'add-newloc.php',
                  data: $('#main_location_add_hotel').serialize(),
                  dataType: 'JSON',
                  success: function(response) {
                      if (response == 1) {
                          update_location();
                          update_staus_success("Sucessfully Added");
                      } else if (response == 0) {
                          update_staus_error("Hotel Location with same name is already present");
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


  function delete_loc(location_id) {
            if (location_id) {
                $.ajax({
                    type: "POST",
                    url: "delete-location.php",
                    data: {
                      loc_id: location_id,
                    },
                    dataType: 'JSON',
                    success: function() {
                      update_location();
                       // update_staus_success("Deleted");
                    }
                });
            }
        }


   update_location();


   function update_location() {
          $.ajax({
              type: "POST",
              url: "get-location.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {
                  document.getElementById("output_location_hotels").innerHTML = response_location_all;
              }
          });
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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                  //for tours Location

                  $(function() {
      $('#main_location_add_tour').on('submit', function(e) {
          e.preventDefault();
          if (true){
              $.ajax({
                  type: 'post',
                  url: 'add-newloc-tour.php',
                  data: $('#main_location_add_tour').serialize(),
                  dataType: 'JSON',
                  success: function(response) {
                      if (response == 1) {
                          update_location_tour();
                          update_staus_success_tour("Sucessfully Added");
                      } else if (response == 0) {
                          update_staus_error_tour("Tour Location with same name is already present");
                      } else {
                          update_staus_error_tour("Somthing Happend");
                      }
                  }
              });
          }else {
              update_staus_error_tour("Insuficient Data Provided");
              validate();
          }
      });
  });


  function delete_loc_tour(location_id) {
            if (location_id) {
                $.ajax({
                    type: "POST",
                    url: "delete-location-tour.php",
                    data: {
                      loc_id: location_id,
                    },
                    dataType: 'JSON',
                    success: function() {
                      update_location_tour();
                       // update_staus_success("Deleted");
                    }
                });
            }
        }


   update_location_tour();


   function update_location_tour() {
          $.ajax({
              type: "POST",
              url: "get-location-tour.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all_tour) {
                  document.getElementById("output_location_tour").innerHTML = response_location_all_tour;
              }
          });
      }




                  //utility functions
                  function update_staus_error_tour(message) {
                      document.getElementById('status_message_tour').innerHTML = message;
                      $("#status_message_tour").addClass("alert-danger");
                  }

                  function update_staus_success_tour(message) {
                      document.getElementById('status_message_tour').innerHTML = message;
                      $("#status_message_tour").addClass("alert-successs");
                  }

</script>

</body>

</html>
