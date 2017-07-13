<?php 
session_start();
        
//if(!isset($_SESSION['customer_login'])) 
    //header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Statement</title>
        
        <!-- <link rel="stylesheet" href="newcss.css"> -->
        <style>
            .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}

        </style>
    </head>
        <?php include 'header.php' ?>

		<!-- <div class='content_customer'>
		<div class="text">Welcome <?php echo $_SESSION['email']?></div> -->
        <?php //include 'customer_navbar.php'?>
    
    
		<div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['email']?></div>
        </div>

    <br><br>
    <h3 style="text-align:center;color:#2E4372;">Account summary by Date</h3><br>
    <form action="customer_account_statement_date.php" method="POST">
    <table align="center">
        <tr><td>Start Date [mm/dd/yyyy] </td><td>
        <input type="date" name="date1" required></td></tr>
        
        <tr><td>End Date [mm/dd/yyyy] </td><td>
        <input type="date" name="date2" required></td></tr>
     </table>
     <br>
        <center><button type="submit" name="summary_date" value="Go" class="addstaff_button"/>Go</button></center>
        
    </form>  
    
       <?php include 'footer.php'?>