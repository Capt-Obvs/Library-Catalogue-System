<?php
session_start();
include('config.php');   
  
if(!isset($_SESSION['user_id'])){
    header("location:sign-in");
}else if (!isset($_SESSION['admin_id'])){
    header("location:sign-in");
}
?>