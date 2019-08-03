<?php
include('session.php');
if($_SESSION['auth'] == false){
    navigate("index.php");
}
        $output = '';
        $count = 0;
        $sql = 'SELECT *  FROM about_page ';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '<tr style="
                  background: #f2f2f2;
              ">
                    <th>'.$count.'</th>
                    <th>'.$row["heading"].'</th>
                    <th>'.$row["subheading"].'</th>
                    <th>'.$row["content"].'</th>
                    <th>'.$row["customers"].'</th>
                    <th>'.$row["tours"].'</th>
                    <th>'.$row["destinations"].'</th>
                    <th>'.$row["experiance"].'</th>

                    <th> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">View</button> </th>

                    </tr>';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
