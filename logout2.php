<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: signup1.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: signup4.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  unset($_SESSION['userName']);
  unset($_SESSION['acc_no']);
  unset($_SESSION['pic1']);
  unset($_SESSION['pic2']);
  unset($_SESSION['pic3']);
  unset($_SESSION['pic4']);

  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
 }
 ?>