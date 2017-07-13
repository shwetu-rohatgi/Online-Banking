<?php 
ob_start();
session_start();
        
//if(!isset($_SESSION['customer_login'])) 
   // header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Display Beneficiary</title>
        
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

          <div class="text">Welcome <?php echo $_SESSION['email']?></div>  
           <?php //include 'customer_navbar.php'?>
              <!--<div class="customer_top_nav">
             <div class="text">Welcome <?php echo $_SESSION['email']?></div>
            </div>-->
    
            <?php
include_once 'dbconnect.php';
$sender_id=$_SESSION["login_id"];
$sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id'";// in beneficiary1 table we have sender_id which is equivalent to sender Account_no of user table
$result=  mysql_query($sql) or die(mysql_error());
?>
     <br>
        <h3 style="text-align:center;color:#2E4372;">Added Beneficiary</h3>
		<br>
    <form action="delete_beneficiary.php">
<table align="center">
                        
                        <th>Id</th>
                        <th>Name</th>
                        <th>Beneficiary Account No</th>
                        <th>status</th>
                        
                        <?php
                        while($rws=  mysql_fetch_array($result)){
                            
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            echo ' checked';
                            echo " /></td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[5]."</td>";
                           
                            echo "</tr>";
                        } ?>
</table>
<br>
    <center><button type="submit" name="submit_id" value="DELETE BENEFICIARY" class='addstaff_button'/>DELETE BENEFICIARY</button></center>
    </form>
        <?php include 'footer.php'?> 