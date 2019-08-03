<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cabnotels-Sales</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

  <body id="page-top">

  <?php include 'includes/navbar.php'; ?>

    <div id="wrapper">

      <!--Sidebar-->
      <?php include 'includes/sidebar.php' ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <h3>User Wise Sales Report</h3>
          </ol>

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Sales</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Sales Today</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No.</th>
                      <th>Order ID</th>
                      <th>Name</th>
                      <th>E-email</th>
                      <th>Contact number</th>
                      <th>Address</th>
                      <th>Ammount</th>
                      <th>View</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>

                      <th>No.</th>
                      <th>Order ID</th>
                      <th>Name</th>
                      <th>E-email</th>
                      <th>Contact number</th>
                      <th>Address</th>
                      <th>Ammount</th>
                      <th>View</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>

                  <tbody id='output_location'>




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
<div id="modals_for_status">



</div>


<div id="modals_for_status_action">



</div>



  <?php include 'includes/logout.php'; ?>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


  <script type="text/javascript">


  function save_status(cart_id){
      //console.log(cart_id);
      var new_data_source_id =  "new_status_"+cart_id;
     // console.log(new_data_source_id);
      var e = document.getElementById(new_data_source_id);
      var value = e.options[e.selectedIndex].value;
     // console.log(value);

      $.ajax({
          type: "POST",
          url: "update-sales-status.php",
          data: {
              cart_id: cart_id,
              new_status: value,
          },
          dataType: 'JSON',
          success: function(response_update_ststus) {
                //console.log(response_update_ststus);
                if(response_update_ststus == 1){
                    update_staus_success("Sucessfully Updated",cart_id);
                    update_modal_status();
                }else {
                    update_staus_err("Critical error Contact DEV",cart_id);
                }
          }
      });
    }


  update_sales()

  function update_sales() {
         $.ajax({
             type: "POST",
             url: "get-sales.php",
             data: {
                 l_loc: 'dummy',
             },
             dataType: 'JSON',
             success: function(response_location_all) {
                 document.getElementById("output_location").innerHTML = response_location_all;
             }
         });
     }

     

update_modal_status();

     function update_modal_status() {
            $.ajax({
                type: "POST",
                url: "get-sales-modal-status.php",
                data: {
                    l_loc: 'dummy',
                },
                dataType: 'JSON',
                success: function(response_location_all) {
                    document.getElementById("modals_for_status").innerHTML = response_location_all;
                    console.log(response_location_all);
                }
            });
        }

modals_for_status_action();

             function modals_for_status_action() {
                    $.ajax({
                        type: "POST",
                        url: "get-sales-modal-status-action.php",
                        data: {
                            l_loc: 'dummy',
                        },
                        dataType: 'JSON',
                        success: function(response_action) {
                            document.getElementById("modals_for_status_action").innerHTML = response_action;
                          //  console.log(response_action);
                        }
                    });
                }
  //utility functions
                function update_staus_err(message,cart_id) {
                    document.getElementById("status_message_success_"+cart_id).style.display = "none";
                    document.getElementById("status_message_err_"+cart_id).style.display = "block";
                    document.getElementById("status_message_err_"+cart_id).innerHTML = message;
                }
                //utility functions
                function update_staus_success(message,cart_id) {
                    document.getElementById("status_message_err_"+cart_id).style.display = "none";
                    document.getElementById("status_message_success_"+cart_id).style.display = "block";
                    document.getElementById("status_message_success_"+cart_id).innerHTML = message;
                }
  </script>

  </body>

</html>
