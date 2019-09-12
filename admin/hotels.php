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

  <title>Cabnotels - Hotels</title>
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
          <li class="breadcrumb-item active">Hotels</li>
        </ol>

        <!-- Page Content -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Add New Hotel
        </button>


        <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card mb-3">
           <div class="card-header">
                <h1>Hotels</h1>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Hotel Name</th>
                    <th>Hotel loc</th>
                    <th>Hotel Picture</th>
                    <th>Hotel Address</th>
                    <th>Hotel Email</th>
                    <th>Price Table</th>
                    <th>Hotel Phone Number</th>
                    <th>Amenities</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S.No.</th>
                    <th>Hotel Name</th>
                    <th>Hotel loc</th>
                    <th>Hotel Picture</th>
                    <th>Hotel Address</th>
                    <th>Hotel Email</th>
                    <th>Price Table</th>
                    <th>Hotel Phone Number</th>
                    <th>Info</th>
                    <th>Delete</th>
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

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <div id="modals_for_hotel_details">



  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Type the name and press Add to add new Location</p>
          <form id="main_hotel_add" method="get">


            <div class="form-group">
              <label for="exampleFormControlInput1">Hotel Name</label>
              <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Hotel Name">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Hotel Location</label>
              <select id="hotel_loc" name="hotel_loc" class="form-control">
               <option value="0"> Select...</option>
               <?php
                                          					 $sql = 'SELECT * FROM locations ORDER BY loc_name ASC';
                                          					 $result = mysqli_query($db, $sql);
                                                 			if (mysqli_num_rows($result) > 0) {
                                                    		 // output data of each row
                                                     		while($row= mysqli_fetch_assoc($result)) {
                                                        	echo ' <option>'.$row["loc_name"].'</option>';
                                                    	}
                                                    }
                                        		?>
             </select>
            </div>

             <div class="form-group">
               <label for="exampleFormControlInput1">Enter the Address of the Hotel </label>
               <input type="text" class="form-control" id="hotel_add" name="hotel_add" placeholder="Enter the Addres of the Hotel">
             </div>
             <div class="form-group">
               <label for="exampleFormControlInput1">Hotel Email address</label>
               <input type="email" class="form-control" id="hotel_email" name="hotel_email" placeholder="Hotel Email address">
             </div>

             <div class="form-group">
               <label for="exampleFormControlInput1">Hotel Phone number</label>
               <input type="text" class="form-control" id="hotel_number" name="hotel_number" placeholder="Hotel Phone number">
             </div>

             <div class="form-group">
                <label for="tour_about">Hotel About Text</label>
                  <textarea class="form-control" id="hotel_about" name="hotel_about" rows="3"></textarea>
            </div>


            <!-- Amenities
            <h3>Select the Amenities</h3>
            <div class="row">

              <div class="col">
              <label for="exampleFormControlInput1">Wifi</label>
              <select id="wifi" name="wifi" class="form-control">
               <option value="0">Select...</option>
               <option value="1">Avaialble</option>
               <option value="2">Not Avaialabe</option>
               <option value="3">Paid</option>
             </select>
              </div>

              <div class="col">
              <label for="exampleFormControlInput1">Laundery</label>
              <select id="laundry" name="laundry" class="form-control">
              <option value="0">Select...</option>
               <option value="1">Avaialble</option>
               <option value="2">Not Avaialabe</option>
               <option value="3">Paid</option>
             </select>
              </div>

              <div class="col">
              <label for="exampleFormControlInput1">Elevater</label>
              <select id="elevater" name="elevater" class="form-control" >
              <option value="0">Select...</option>
               <option value="1">Avaialble</option>
               <option value="2">Not Avaialabe</option>
               <option value="3">Paid</option>
             </select>
              </div>

              <div class="col">
              <label for="exampleFormControlInput1">Parking</label>
              <select id="parking" name="parking" class="form-control">
              <option value="0">Select...</option>
               <option value="1">Avaialble</option>
               <option value="2">Not Avaialabe</option>
               <option value="3">Paid</option>
             </select>
              </div>
            </div>
            -->
            <!-- Labels -->
            <div class="form-group">
              <label for="exampleFormControlInput1">Hotel Star Rating</label>
               <select id="hotel_star" name="hotel_star" class="form-control" id="sel1">
               <option value="0">Select Stars</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Hotel Base Price (1 guest 1 night)</label>
              <input type="number" class="form-control" id="price" name="price" placeholder="Hotel Base Price (1 guest 1 night)">
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
      $('#main_hotel_add').on('submit', function(e) {
          e.preventDefault();
          //console.log($('#main_hotel_add').serialize());


          if (validate()){
              $.ajax({
                  type: 'post',
                  url: 'add-hotel.php',
                  data: $('#main_hotel_add').serialize(),
                  dataType: 'JSON',
                  success: function(response) {
                      if (response == 1) {
                          update_hotel();
                          update_hotel_modal();
                          update_staus_success("Sucessfully Added");
                      } else if (response == 0) {
                          update_staus_error("Hotel with same name is already present");
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

        function delete_hotel(hotel_id) {
            if (hotel_id) {
                $.ajax({
                    type: "POST",
                    url: "delete-hotel.php",
                    data: {
                      hotel_id: hotel_id,
                    },
                    dataType: 'JSON',
                    success: function() {
                        update_hotel();
                       // update_staus_success("Deleted");
                    }
                });
            }
        }


update_hotel();
update_hotel_modal();

   function update_hotel() {
          $.ajax({
              type: "POST",
              url: "get-hotel.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {
                  document.getElementById("output_location").innerHTML = response_location_all;
              }
          });
      }


      function update_hotel_modal() {
          $.ajax({
              type: "POST",
              url: "get-hotel-modal.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {

                  document.getElementById("modals_for_hotel_details").innerHTML = response_location_all;
              }
          });
      }

      function delete_amen(id) {
          $.ajax({
              type: "POST",
              url: "delete-amen-modal.php",
              data: {
                  id: id,
              },
              dataType: 'JSON',
              success: function(response) {
                  console.log(response);
                  location.reload();
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



                  function validate(){

                          hotel_name = document.getElementById('hotel_name').value;
                          hotel_loc = document.getElementById('hotel_loc').value;
                          hotel_add = document.getElementById('hotel_add').value;
                          hotel_email = document.getElementById('hotel_email').value;
                          hotel_number = document.getElementById('hotel_number').value;
                          hotel_star= document.getElementById('hotel_star').value;
                          hotel_about= document.getElementById('hotel_about').value;

                          var flag = 0;

                        if (hotel_name == "") {
                           document.getElementById('hotel_name').style.borderColor = "red";
                           flag = 1;
                          }
                          if (hotel_loc == '0') {
                          document.getElementById('hotel_loc').style.borderColor = "red";
                          flag = 1;
                        }
                        if (hotel_add == "") {
                          document.getElementById('hotel_add').style.borderColor = "red";
                          flag = 1;
                        }
                        if (hotel_email == "") {
                          document.getElementById('hotel_email').style.borderColor = "red";
                          flag = 1;
                        }
                        if (hotel_number == "") {
                            document.getElementById('hotel_number').style.borderColor = "red";
                            flag = 1;
                          }
                        if (hotel_star == '0') {
                          document.getElementById('hotel_star').style.borderColor = "red";
                          flag = 1;
                        }
                        if (hotel_about == '') {
                          document.getElementById('hotel_about').style.borderColor = "red";
                          flag = 1;
                        }



                        if(flag==0){
                          return true;
                        }else{
                          return false;
                        }

                      }


  </script>

</body>

</html>
