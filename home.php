<?php
 ob_start();
 session_start();
 // print_r($_SESSION);
 // echo session_id();
 ini_set('display_errors',1); 
 error_reporting(E_ALL); 
 
 $_POST = $_SESSION;
 
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
  
                $name= $userRow[2];
                $account_no= $userRow[1];
                $acc_status=$userRow[13];
                
                $gender=$userRow[3];
                $mobile=$userRow[6];
                $email=$userRow[7];
                
                $_SESSION['login_id']=$account_no;
                $_SESSION['name']=$name;


     $sql="SELECT MAX(transactionid) from `".$account_no."`";
     $result=mysql_query($sql) or die(mysql_error());
     $rws=  mysql_fetch_array($result);
     $s_last_tid=$rws[0];

     $sql="SELECT * from `".$account_no."` WHERE transactionid='$s_last_tid'";
     $result=mysql_query($sql) or die(mysql_error());
     while($rws= mysql_fetch_array($result)) {
     $s_amount=$rws[5];
	 }


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="banking.css">

<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2016"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>

</head>

<body>

 
      <div class="container">
        <h1 class="float-left">IITR Bank</h1>
        <h1 class="float-right">IITR</h1>
        <br>
        <br>
        <br>
        <hr>
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Home</a>
              </div>
              <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">User Account</a></li> -->
                <li id='caption'><b><u>Dashboard</u></b></li>
				<li><a href="customer_account_statement.php">Accounts Statement</a></li>

                <!-- <li><a href="#">Transactions</a></li> -->
                <!-- <li><a href="#">Settings</a></li> -->
              </ul>
			  <ul class="nav navbar-nav">
        <li id='caption'><b><u>Funds Transfer</u></b></li>
        <li><a href="add_beneficiary.php">Add Beneficiary</a></li>
                    <li><a href="display_beneficiary.php">View added Beneficiary</a></li>
                    <li><a href="customer_transfer.php">Transfer Funds</a></li>
                    </ul>
 <ul class="nav navbar-nav">
        <li id='caption'><b><u>Settings</u></b></li>
        <li><a href="change_password_customer.php">Change Password</a></li>
                    </ul>
              <ul class="nav navbar-nav navbar-right">
              
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;<strong> Hey! <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></strong></a>
                    <ul class="dropdown-menu">
                      <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                    </ul>
                  </li>

              </ul>
            </div>
          </nav>
          <TABLE WIDTH="100%" ALIGN="CENTER">
            <TR BGCOLOR="#f2eded">
              <TD><MARQUEE>Welcome <?php if(!empty($_POST['email'])) echo $userRow['userName']; ?> To Secure Net Banking...</MARQUEE></TD>
            </TR>
          </TABLE>
          <table WIDTH="100%" ALIGN="CENTER">
            <tr bgcolor="">
                <td colspan="7" id="dateformat" height="30">&nbsp;&nbsp;
                  <script language="JavaScript" type="text/javascript">
                  document.write(TODAY);  
                  </script>
                </td>
            </tr>
          </table>
        
            <h2 class="text-center">My Account</h2>
            <div class="col-md-12">
                <form method="post" action="">
                  <br>
                  <br>
                  <div class="col-md-12 mb20">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="act-type">Account Type:</label>
                        <input type="text" class="form-control" name="act-type" id="act-type" value="Saving Account">
                      </div>
                      <div class="form-group">
                        <label for="act-num">Account Number:</label>
                        <input type="text" class="form-control" name="act-num" id="act-num" value="<?php if(!empty($_POST['email'])) echo $userRow['Account_no']; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="act-cur">Account Curreny:</label>
                        <input type="text" class="form-control" name="act-cur" id="act-cur" value="INR" disabled>
                      </div>
                      <div class="form-group">
                        <label for="act-bal">Account Balance:</label>
                        <input type="text" class="form-control" name="act-bal" id="act-bal" value="<?php if(!empty($_POST['email'])) echo $s_amount; ?>" disabled>
                      </div>
                    </div>
                  </div>

                  <div class= "center-btn">
                  <button type="submit" class="btn btn-primary" name="continue"><a class="a-btn">Continue</a></button>
                  </div>
                  
                
                </form>
            </div>
    
  </body>
</html>
<!-- <?php ob_end_flush(); ?> -->