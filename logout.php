<?php
include('session.php');
if($_SESSION['auth'] == true){
session_unset();
// destroy the session
if(session_destroy()){
   mysqli_close($db);
   header("location:login.php");
}
}else{
    header("location:login.php");
}
?>
