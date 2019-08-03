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

  <title>Cabnotels - Taxi</title>
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
          <li class="breadcrumb-item active">Taxi</li>
        </ol>

        <!-- Page Content -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Add New Taxi
        </button>


        <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card mb-3">
           <div class="card-header">
                <h3>Taxi</h3>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Taxi Name</th>
                    <th>Taxi location</th>
                    <th>Taxi Picture</th>
                    <th>Taxi Discription</th>
                    <th>Taxi Price</th>
                    <th>Taxi Number</th>
                    <th>Amenities</th>
                    <th>Featurd</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>S.No.</th>
                  <th>Taxi Name</th>
                  <th>Taxi location</th>
                  <th>Taxi Picture</th>
                  <th>Taxi Discription</th>
                  <th>Taxi Price</th>
                  <th>Taxi Number</th>
                  <th>Amenities</th>
                  <th>Featurd</th>
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


  <div id="modals_for_taxi_details">



  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Add Taxi</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Type the name and press Add to add new Taxi</p>
          <form id="main_taxi_add" method="get">


            <div class="form-group">
              <label for="exampleFormControlInput1">Taxi Name</label>
              <input type="text" class="form-control" id="taxi_name" name="taxi_name" placeholder="taxi Name">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">taxi Location</label>
              <select id="taxi_loc" name="taxi_loc" class="form-control">
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
               <label for="exampleFormControlInput1">Description of the taxi </label>
               <input type="text" class="form-control" id="taxi_disc" name="taxi_disc" placeholder="Enter the Discription of taxi">
             </div>
             <div class="form-group">
               <label for="exampleFormControlInput1">Taxi Price in INR</label>
               <input type="number" class="form-control" id="taxi_price" name="taxi_price" placeholder="Taxi Price">
             </div>

             <div class="form-group">
               <label for="exampleFormControlInput1">Taxi Number</label>
               <input type="text" class="form-control" id="taxi_number" name="taxi_number" placeholder="Taxi Number">
             </div>

             <div class="form-group">
               <label for="taxi_type">Taxi Type</label>
               <select id="taxi_type" name="taxi_type" class="form-control">
               <option value = "0" >Select..</option>
											<option value = "Hatchback">Hatchback</option>
											<option value = "Sedan">Sedan</option>
											<option value = "Sport utility vehicle (SUV)">Sport utility vehicle (SUV)</option>
             </select>
             </div>



            <div class="form-group">
              <label for="exampleFormControlInput1">Taxi Star Rating</label>
               <select id="taxi_star" name="taxi_star" class="form-control" id="sel1">
               <option value="0">Select Stars</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </select>
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
      $('#main_taxi_add').on('submit', function(e) {
          e.preventDefault();
          console.log($('#main_taxi_add').serialize());


          if (validate()){
            update_staus_success("Please Wait");
              $.ajax({
                  type: 'post',
                  url: 'add-taxi.php',
                  data: $('#main_taxi_add').serialize(),
                  dataType: 'JSON',
                  success: function(response) {
                      if (response == 1) {
                          update_taxi();
                         // update_taxi_modal();
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

        function delete_taxi(taxi_id) {
            if (taxi_id) {
                $.ajax({
                    type: "POST",
                    url: "delete-taxi.php",
                    data: {
                      taxi_id: taxi_id,
                    },
                    dataType: 'JSON',
                    success: function() {
                        update_taxi();
                       // update_staus_success("Deleted");
                    }
                });
            }
        }


update_taxi();
update_taxi_modal();

   function update_taxi() {
          $.ajax({
              type: "POST",
              url: "get-taxi.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {
                  document.getElementById("output_location").innerHTML = response_location_all;
              }
          });
      }


      function update_taxi_modal() {
          $.ajax({
              type: "POST",
              url: "get-taxi-modal.php",
              data: {
                  l_loc: 'dummy',
              },
              dataType: 'JSON',
              success: function(response_location_all) {
                  document.getElementById("modals_for_taxi_details").innerHTML = response_location_all;
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

                          taxi_name = document.getElementById('taxi_name').value;
                          taxi_loc = document.getElementById('taxi_loc').value;
                          taxi_disc = document.getElementById('taxi_disc').value;
                          taxi_price = document.getElementById('taxi_price').value;
                          taxi_number = document.getElementById('taxi_number').value;
                          taxi_type = document.getElementById('taxi_type').value;
                          taxi_star= document.getElementById('taxi_star').value;


                          var flag = 0;

                        if (taxi_name == "") {
                           document.getElementById('taxi_name').style.borderColor = "red";
                           flag = 1;
                          }
                          if (taxi_loc == '0') {
                          document.getElementById('taxi_loc').style.borderColor = "red";
                          flag = 1;
                        }
                        if (taxi_disc == "") {
                          document.getElementById('taxi_disc').style.borderColor = "red";
                          flag = 1;
                        }
                        if (taxi_price == "") {
                          document.getElementById('taxi_price').style.borderColor = "red";
                          flag = 1;
                        }
                        if (taxi_number == "") {
                            document.getElementById('taxi_number').style.borderColor = "red";
                            flag = 1;
                          }
                          if (taxi_type == '0') {
                            document.getElementById('taxi_type').style.borderColor = "red";
                            flag = 1;
                          }
                        if (taxi_star == '0') {
                          document.getElementById('taxi_star').style.borderColor = "red";
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
