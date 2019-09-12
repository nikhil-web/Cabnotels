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

  <title>Cabnotels - <?php echo $_SESSION["admin_name"]; ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <title>Cabnotels</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                    </div>
                                    <h1 id="all_orders">?</h1>
                                    <div class="mr-5">Orders In Cart</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                      <span class="float-left">Manage</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">

                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-shopping-cart"></i>
                                    </div>
                                    <h1 id="open_new_orders">?</h1>
                                    <div class="mr-5">Paid Orders</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1">
                                    <span class="float-left">Manage</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>

                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-life-ring"></i>
                                    </div>
                                    <h1>0</h1>
                                    <div class="mr-5">Cancled Orders</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">Manage</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning   o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-life-ring"></i>
                                    </div>
                                    <h1 id="users_count">?</h1>
                                    <div class="mr-5">Users</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">Manage</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>


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
                                <th>Ammount</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>

                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>E-email</th>
                                <th>Contact number</th>
                                <th>Ammount</th>
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

  <?php include 'includes/logout.php'; ?>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


  <script type="text/javascript">
  update_sales();

async  function update_sales() {
         $.ajax({
             type: "POST",
             url: "get-sales-admin.php",
             data: {
                 l_loc: 'dummy',
             },
             dataType: 'JSON',
             success: function(response_location_all) {
                 document.getElementById("output_location").innerHTML = response_location_all;
             }
         });
     }

     update_sales_open_orders();

  async   function update_sales_open_orders() {
            $.ajax({
                type: "POST",
                url: "get-sales-admin-count.php",
                data: {
                    l_loc: 'dummy',
                },
                dataType: 'JSON',
                success: function(resp) {
                    document.getElementById("open_new_orders").innerHTML = resp;
                }
            });
        }

        update_sales_all_orders();

    async    function update_sales_all_orders() {
               $.ajax({
                   type: "POST",
                   url: "get-sales-admin-count-all.php",
                   data: {
                       l_loc: 'dummy',
                   },
                   dataType: 'JSON',
                   success: function(resp) {
                       document.getElementById("all_orders").innerHTML = resp;
                   }
               });
           }

get_user_number();
           async   function get_user_number() {
                     $.ajax({
                         type: "POST",
                         url: "get-user-count.php",
                         data: {
                             l_loc: 'dummy',
                         },
                         dataType: 'JSON',
                         success: function(resp) {
                             document.getElementById("users_count").innerHTML = resp;
                         }
                     });
                 }




function update_values(){
  update_sales();
  update_sales_open_orders();
  update_sales_all_orders();
}


  </script>





</body>

</html>
