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

    <title>Cabnotels - Users</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

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
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>S.NO.</th>
                      <th>Name</th>
                      <th>E-email</th>
                      <th>Contact number</th>
                      <th>Address</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.NO.</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Contact number</th>
                      <th>Address</th>
                      <th>Tools</th>
                    </tr>
                  </tfoot>
                  <tbody>

                      <?php
                      $sql = "SELECT * FROM users ";
                      $result = mysqli_query($db, $sql);

                          if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result)) {
                                  echo    '
                                  <tr>
                                  <td>'.$row["user_id"].'</td>
                                  <td>'.$row["first_name"].' '.$row["last_name"].'</td>
                                  <td>'.$row["user_email"].'</td>
                                  <td>'.$row["user_phone"].'</td>
                                  <td>'.$row["user_adress"].'</td>
                                  <td>  <button style="width: 100%;margin:1px;" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i> Edit</button></td>
                                  </tr>';
                                }
                              }
                       ?>



                  </tbody>
                </table>
              </div>
            </div>

          </div>

          <p class="small text-center text-muted my-5">

          </p>

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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
