<?php 
ob_start();
session_start();
        
//if(!isset($_SESSION['customer_login'])) 
   // header('location:index.php');   


			   
                $account_no=$_SESSION["login_id"];// account number of sender
                $name=$_SESSION["name"];
                
                $Payee_name=$_REQUEST['bname'];
                $acc_no=$_REQUEST['account_no'];
                
                include_once 'dbconnect.php';
                
                $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$account_no' AND reciever_id='$acc_no'";
                $result1=  mysql_query($sql1);
                $rws1=  mysql_fetch_array($result1);
                $s1=$rws1[1];
                $s2=$rws1[3];
                
                
                $sql="SELECT * FROM users WHERE Account_no='$acc_no'";
                
                $result=  mysql_query($sql) or die(mysql_error());
                $rws=  mysql_fetch_array($result) ;
                
                if($account_no==$rws[1]) //can't send request to himself
                {
                echo '<script>alert("You cant add yourself as a beneficiery!");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                elseif($s1==$account_no && $s2==$acc_no)
                {
                    echo '<script>alert("You cant add a beneficiery twice!");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                elseif($rws[2]!=$Payee_name && $rws[1]!=$acc_no) 
                {
                echo '<script>alert("Beneficiary Not Found!\nPlease enter correct details");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }
                
                
                else{
                     
                    $status="PENDING";
                $sql="insert into beneficiary1 values('','$account_no','$name','$acc_no','$Payee_name','$status')";
                mysql_query($sql) or die(mysql_error());
                header("location:display_beneficiary.php");
                }
				?>
                