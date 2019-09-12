<?php
            include('session.php');
            if($_SESSION['auth'] == false){
                navigate("index.php");
            }
                          $output = '';
                    $sql = 'SELECT * FROM sales INNER JOIN users on sales.user_id = users.user_id';
                    $result = mysqli_query($db, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row_outer= mysqli_fetch_assoc($result)) {
                            $output .=   '<!-- This is the Modal for '.$row_outer["sales_id"].' -->
                                      <div class="modal fade" id="sales_id_finish_'.$row_outer["sales_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Orderd Products</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>

                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container">

                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                            <thead>
                                                                                <tr>

                                                                                    <th>Food ID.</th>
                                                                                    <th>Restaurant Name</th>
                                                                                    <th>Name</th>
                                                                                    <th>Qantity</th>
                                                                                    <th>Status Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>

                                                                                  <th>Food ID.</th>
                                                                                  <th>Restaurant Name</th>
                                                                                  <th>Name</th>
                                                                                  <th>Qantity</th>
                                                                                  <th>Status Status</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tbody>';

                                                                            $item_id = explode("_",$row_outer["cart_id_aray"]);
                                                                             for ($i=0; $i < sizeof($item_id)-1; $i++) {
                                                                                $sql_inner = 'SELECT * FROM cart INNER JOIN food_item on cart.food_item_id = food_item.food_item_id INNER JOIN res ON cart.res_id = res.res_id WHERE cart.user_id = '.$row_outer["user_id"].' AND cart.cart_item_id ='.$item_id[$i].' AND cart.status != 0';
                                                                                $result_item = mysqli_query($db, $sql_inner);

                                                                                    $row_item = mysqli_fetch_assoc($result_item);
                                                                                    $output .='<tr>

                                                                                             <td>'.$row_item["food_item_id"].'</td>
                                                                                             <td>'.$row_item["res_name"].'</td>
                                                                                             <td>'.$row_item["food_item_name"].'</td>
                                                                                             <td>'.$row_item["qnty"].'</td>
                                                                                             ';
                                                                                              if($row_item["status"] == 1){
                                                                                               $output .= '
                                                                                               <td>
                                                                                                  <div class="alert alert-secondary">
                                                                                                    <strong>Order placed!</strong>
                                                                                                  </div>
                                                                                                </td>';
                                                                                             }elseif ($row_item["status"] == 2) {
                                                                                               $output .= '
                                                                                               <td>
                                                                                               <div class="alert alert-info">
                                                                                               <strong>Processing</strong>
                                                                                               </div>
                                                                                                </td>';
                                                                                             }elseif ($row_item["status"] == 3) {
                                                                                               $output .= '
                                                                                               <td>
                                                                                                  <div class="alert alert-warning">
                                                                                                    <strong>Cooking</strong>
                                                                                                  </div>
                                                                                                </td>';
                                                                                             }elseif ($row_item["status"] == 4) {
                                                                                               $output .= '
                                                                                               <td><div class="alert alert-primary">
                                                                                               <strong>Out For Delivery</strong>
                                                                                               </div></td>';
                                                                                             }elseif ($row_item["status"] == 5) {
                                                                                               $output .= '
                                                                                               <td><div class="alert alert-success">
                                                                                               <strong>Deliverd</strong>
                                                                                               </div></td>';
                                                                                             }
                                                                                             elseif ($row_item["status"] == -1) {
                                                                                               $output .= '
                                                                                               <td>
                                                                                                  <div class="alert alert-danger">
                                                                                                  <strong>Order Cancled!</strong>
                                                                                                  </div>
                                                                                                </td>';
                                                                                             }else {
                                                                                               $output .= '
                                                                                               <td>
                                                                                                  <div class="alert alert-secondary">
                                                                                                    <strong>Error Please contact Dev</strong>
                                                                                                  </div>
                                                                                                </td>';
                                                                                             }


                                                                                      $output .='</tr>';

                                                                             }

                                                                             $output .= '
                                                                              </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- This is the Modal for '.$row_outer["sales_id"].' -->
                                            ';
                                }
                              }else {

                              }



                              echo json_encode($output);
                              mysqli_close($db);
        ?>
