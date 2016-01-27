<?php
session_start();
if($_SESSION['email']=="")
{
  header('location:index.php');
}
?>
