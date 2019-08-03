<?php
   include('config.php');
   session_start();
   if(isset($_SESSION['admin_id'])){
        $_SESSION['auth'] = true;
         $admin_id=$_SESSION['admin_id'];
         $fetch_details = mysqli_query($db,"SELECT * FROM admin WHERE admin_id = '$admin_id' ");
         $row = mysqli_fetch_array($fetch_details,MYSQLI_ASSOC);

       $_SESSION['auth'] = true;
       $_SESSION['admin_id']= $row['admin_id'];
       $_SESSION['admin_name'] =$row['admin_name'];
       $_SESSION['admin_email'] = $row['admin_email'];
   }
    else{
      $_SESSION['auth'] = false;
    }
