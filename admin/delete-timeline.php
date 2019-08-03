<?php
  include('session.php');
  if($_SESSION['auth'] == false){
      navigate("index.php");
    }

    if(isset($_GET["id"])){
      $id = mysqli_real_escape_string($db,$_GET["id"]);
    }else {
      // code...
      navigate("index.php");
    }



      $output=0;
      $sql = "DELETE FROM timeline WHERE timeline.id = $id";
      $result=mysqli_query($db,$sql);
      if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
          echo $error_fetch;
      }else{
          navigate("tours.php");
    }

?>
