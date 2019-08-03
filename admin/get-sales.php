<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT * FROM sales INNER JOIN users on sales.user_id = users.user_id ORDER BY sales.sales_id DESC';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $count++;
                  if ($row["view_status"] == 1) {
                    $output .= '<tr style="background-color:#28a745;">
                      <td>'.$count.'</td>
                      <td>'.$row["order_id"].'</td>
                      <td>'.$row["user_name"].'</td>
                      <td>'.$row["user_email"].'</td>
                      <td>'.$row["contact_phone"].'</td>
                      <td>'.$row["user_adress"].'</td>
                      <td>'.$row["sales_ammount"].'</td>
                      <td>

                              <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"  data-toggle="modal" data-target="#sales_id_finish_'.$row["sales_id"].'"><i class="fa fa-eye"></i> View</button>

                      </td>
                      <td>
                              <button style="width: 100%;margin:1px;" class="btn btn-danger btn-sm edit btn-flat" data-toggle="modal" data-target="#update_order_status_'.$row["sales_id"].'"><i class="fa fa-eye"></i> Edit</button>

                          </td>
                      </tr>';
                  }else {
                    $output .= '<tr style="background-color:#dc3545">
                      <td>'.$count.'</td>
                      <td>'.$row["order_id"].'</td>
                      <td>'.$row["user_name"].'</td>
                      <td>'.$row["user_email"].'</td>
                      <td>'.$row["contact_phone"].'</td>
                      <td>'.$row["user_adress"].'</td>
                      <td>'.$row["sales_ammount"].'</td>
                      <td>

                              <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"  data-toggle="modal" data-target="#sales_id_finish_'.$row["sales_id"].'"><i class="fa fa-eye"></i> View</button>

                      </td>
                      <td>
                              <button style="width: 100%;margin:1px;" class="btn btn-danger btn-sm edit btn-flat" data-toggle="modal" data-target="#update_order_status_'.$row["sales_id"].'"><i class="fa fa-eye"></i> Edit</button>

                          </td>
                      </tr>';
                  }

                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
