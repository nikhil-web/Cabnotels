<?php
      include('session.php');
      if($_SESSION['auth'] == false)
      {
          navigate("index.php");
      }
     $output = 0;

      $heading = mysqli_real_escape_string($db,$_POST["heading"]);
      $subheading = mysqli_real_escape_string($db,$_POST["subheading"]);
      $content = mysqli_real_escape_string($db,$_POST["content"]);
      $customers = mysqli_real_escape_string($db,$_POST["customers"]);
      $tours = mysqli_real_escape_string($db,$_POST["tours"]);
      $destinations = mysqli_real_escape_string($db,$_POST["destinations"]);
      $experiance = mysqli_real_escape_string($db,$_POST["experiance"]);

      $output=0;

      $sql = "UPDATE about_page SET heading='$heading',subheading='$subheading',content='$content',customers='$customers',tours='$tours',destinations='$destinations',experiance='$experiance' ";
      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        $output = 0;
      }else{
        $output = 1;
      }
      echo json_encode($output);
