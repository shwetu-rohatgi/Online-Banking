<?php 
ob_start();
session_start();
 $email = $_SESSION['email'];
 $account_no=$_SESSION["login_id"];// account number of sender
 $name=$_SESSION["name"];
 $_SESSION["login_id"]=$account_no;
 $_SESSION["name"]=$name;
 
//if ( isset($_SESSION['user'])!="" ) {
  //header("Location: home.php");
  //exit;
 //}
        
//if(!isset($_SESSION['customer_login'])) 
    //header('location:index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Beneficiary</title>
        
        <!-- <link rel="stylesheet" href="newcss.css"> -->
        <style>
            .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}
/* .content_customer td{
    
    
} */

        </style>
    </head>
       <?php include 'header.php' ?> 
<!-- <div class='content_customer'>
        <div class="text">Welcome <?php //echo $_SESSION['email']?></div> -->
           <?php //include 'customer_navbar.php'?>
            <div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['email']?></div>
            </div>
    
		<form action='add_beneficiary_process.php' method='post'>
        <br>
		<h3 style="text-align:center;color:#2E4372;">Add Beneficiary</h3>
		<br>
        <table align="center">
            <tr><td><span class="heading">Payee Name: </span></td><td><input type='text' name='bname' required></td></tr>
            <tr><td><span class="heading">Account No: </span></td><td><input type='text' name='account_no' required></td></tr>
			
        </table><br>
		<center><button type='submit' name='submitBtn' value='Add Beneficiary' class="addstaff_button">Add Beneficiary</button></center>
        
        </form>
    
     <?php include 'footer.php'?>
           