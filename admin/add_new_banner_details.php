<?php
      include('session.php');
      if($_SESSION['auth'] == false){
          navigate("index.php");
    }

      $id = mysqli_real_escape_string($db,$_POST["id"]);
      $header = mysqli_real_escape_string($db,$_POST["heading"]);
      $subheading = mysqli_real_escape_string($db,$_POST["subheading"]);

      $sql = "UPDATE frontpage_slider SET heading = '$header', subheading = '$subheading' WHERE id = '$id'";
      $result=mysqli_query($db,$sql);
      if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        echo $error_fetch;
      }else{
      navigate("frontpage.php");
      }
