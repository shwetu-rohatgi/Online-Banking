<?php 
session_start();
        
//if(!isset($_SESSION['staff_login'])) 
   // header('location:staff_login.php');   
?>
 
	
    <?php include 'Admin_navbar.php'?>
            
    <br><br>       
    <h3 style="text-align:center;color:#2E4372;">Beneficiary Requests</h3><br>
<?php
include_once 'dbconnect.php';
$sql="SELECT * FROM beneficiary1 WHERE status='PENDING'";
$result=  mysql_query($sql) or die(mysql_error());
?>
           
           <form action="admin_approve_beneficiery.php" method="POST">
<table align="center">
                        <th>id</th>
                        <th>Sender</th>
                        <th>Sender Account No:</th>
                        <th>Reciever</th>
                        <th>Reciever Account No:</th>
                        <th>Status</th>
                        
                        
                        
                        <?php
                        while($rws=  mysql_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            echo ' checked';
                            echo " /></td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[5]."</td>";
                           
                            echo "</tr>";
                        } ?>
</table>
            <br>
                    <center><button type="submit" name="submit_id" value="APPROVE BENEFICIARY" class='addstaff_button '>APPROVE BENEFICIARY</button></center>
                            
               </form>
          
    <?php include 'footer.php'?>




                