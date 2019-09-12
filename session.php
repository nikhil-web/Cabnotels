<?php
   include('config.php');
   session_start();
   if(isset($_SESSION['user_id'])){
         $_SESSION['auth'] = true;
         $user_id=$_SESSION['user_id'];
         $fetch_details = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$user_id' ");
         $row = mysqli_fetch_array($fetch_details,MYSQLI_ASSOC);

         $_SESSION['auth'] = true;
         $_SESSION['user_id']= $row['user_id'];
         $_SESSION['first_name']= $row['first_name'];
         $_SESSION['user_name']= $row['first_name']." ".$row['last_name'];
         $_SESSION['user_email'] =$row['user_email'];
         $_SESSION['user_phone'] = $row['user_phone'];
         $_SESSION['user_locality']= $row['user_locality'];
         $_SESSION['user_adress'] =$row['user_adress'];
         $_SESSION['user_image'] =$row['picture'];
         $_SESSION['ver_status'] = $row['status'];

   }
  else{
      $_SESSION['auth'] = false;
  }
