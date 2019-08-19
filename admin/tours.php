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

  <title>Cabnotels - Tours</title>
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
          <li class="breadcrumb-item active">Tours</li>
        </ol>

        <!-- Page Content -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Add New Tour Package
        </button>

        <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card mb-3">
           <div class="card-header">
                <h3>Tour Packages</h3>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Tour Name</th>
                    <th>Tour loc</th>
                    <th>Tour Picture</th>
                    <th>Extra</th>
                    <th>Tour Price(INR)</th>
                    <th>Tour Info</th>
                    <th>Timeline</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S.No.</th>
                    <th>Tour Name</th>
                    <th>Tour loc</th>
                    <th>Tour Picture</th>
                    <th>Extra</th>
                    <th>Tour Price(INR)</th>
                    <th>Tour Info</th>
                    <th>Timeline</th>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Tour Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Type the name and press Add to add new Tour Package</p>
          <form id="main_tour_add" method="get">
            <div class="form-group">
              <label for="exampleFormControlInput1">Tour Name</label>
              <input type="text" class="form-control" id="tour_name" name="tour_name" placeholder="Tour Name">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Tour Pakage Location</label>
              <select id="tour_loc" name="tour_loc" class="form-control">
               <option value="0"> Select...</option>
               <?php
                                          					 $sql = 'SELECT * FROM locations_tours ORDER BY loc_name ASC';
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
                <label for="tour_about">Tour About Text</label>
                  <textarea class="form-control" id="tour_about" name="tour_about" rows="3"></textarea>
            </div>

            <!-- Labels -->
            <h3>Select the Details</h3>

            <div class="row">
              <div class="col">
              <label for="exampleFormControlInput1">Days</label>
              <select id="days" name="days" class="form-control">
              <option value="0">Select Days</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
             </select>
              </div>

              <div class="col">
              <label for="exampleFormControlInput1">Nights</label>
              <select id="night" name="night" class="form-control">
              <option value="0">Select Nights</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
               <option value="7">7</option>
               <option value="8">8</option>
               <option value="9">9</option>
               <option value="10">10</option>
             </select>
              </div>

              <div class="col">
              <label for="num_days">Nights</label>
              <select id="num_days" name="num_days" class="form-control">
              <option value="0">Select Total Days</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
               <option value="7">7</option>
               <option value="8">8</option>
               <option value="9">9</option>
               <option value="10">10</option>
             </select>
              </div>

            </div>
            <!-- Labels -->
            <div class="form-group">
              <label for="exampleFormControlInput1">Tour Price</label>
              <input type="number" class="form-control" id="tour_price" name="tour_price" placeholder="Tour Price in INR">
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
      $('#main_tour_add').on('submit', function(e) {
          e.preventDefault();
          //console.log($('#main_hotel_add').serialize());
          if (validate()){
              $.ajax({
                  type: 'post',
                  url: 'add-tour.php',
                  data: $('#main_tour_add').serialize(),
                  dataType: 'JSON',
                  success: function(response) {
                      if (response == 1) {
                          update_tour();
                          update_tour_modal();
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


  function add_include(tour_id) {
      var id = "includes_"+tour_id;
      var data = document.getElementById(id).value

      if (data == "") {
        alert("Please Provide Some Data");
      }else{
        $.ajax({
            type: "POST",
            url: "add-include.php",
            data: {
              tour_id_send: tour_id,
              data_send : data,
            },
            dataType: 'JSON',
            success: function(response) {
              if (response == 1) {
                console.log(id+" "+data);
              }else {
                alert("err");
              }
            }
        });

      }

  }



        function delete_tour(tour_id) {
            if (tour_id) {
                $.ajax({
                    type: "POST",
                    url: "delete-tour.php",
                    data: {
                      tour_id: tour_id,
                    },
                    dataType: 'JSON',
                    success: function() {
                        update_tour();
                        update_tour_modal();
                       // update_staus_success("Deleted");
                    }
                });
            }
        }

update_tour();
update_tour_modal();

   function update_tour() {
          $.ajax({
              type: "POST",
              url: "get-tour.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {
                  document.getElementById("output_location").innerHTML = response_location_all;
              }
          });
      }


      function update_tour_modal() {
          $.ajax({
              type: "POST",
              url: "get-tour-modal.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {
                  document.getElementById("modals_for_hotel_details").innerHTML = response_location_all;
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

                          hotel_name = document.getElementById('tour_name').value;
                          hotel_loc = document.getElementById('tour_loc').value;
                          hotel_add = document.getElementById('days').value;
                          hotel_email = document.getElementById('night').value;
                          hotel_number = document.getElementById('tour_price').value;

                          var flag = 0;

                        if (hotel_name == "") {
                           document.getElementById('tour_name').style.borderColor = "red";
                           flag = 1;
                          }
                          if (hotel_loc == "") {
                          document.getElementById('tour_loc').style.borderColor = "red";
                          flag = 1;
                        }
                        if (hotel_add == '0') {
                          document.getElementById('days').style.borderColor = "red";
                          flag = 1;
                        }
                        if (hotel_email == '0') {
                          document.getElementById('night').style.borderColor = "red";
                          flag = 1;
                        }
                        if (hotel_number == "") {
                            document.getElementById('tour_price').style.borderColor = "red";
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
