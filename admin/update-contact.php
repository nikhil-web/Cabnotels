<?php
      include('session.php');
      if($_SESSION['auth'] == false)
      {
          navigate("index.php");
      }
     $output = 0;

      $location = mysqli_real_escape_string($db,$_POST["location"]);
      $pnum = mysqli_real_escape_string($db,$_POST["pnum"]);
      $email = mysqli_real_escape_string($db,$_POST["email"]);

      $output=0;

      $sql = "UPDATE contact_page SET location='$location',phonenumber='$pnum',email='$email'";
      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        $output = 0;
      }else{
        $output = 1;
      }
      echo json_encode($output);
