<?php
 ob_start();
 session_start();
 // print_r($_SESSION);
 // echo session_id();
 ini_set('display_errors',1); 
 error_reporting(E_ALL); 
 $_POST = $_SESSION;
 //print_r($_SESSION);
 
 require_once 'dbconnect.php';
 date_default_timezone_set('Asia/Kolkata');
 $hDate = date("Y-m-d H:i:s");
 echo $hDate;
 $ms = round(microtime(true) * 1000);
 echo $ms;
 
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


     $re=mysql_query("SELECT MAX(sl_no) FROM logs WHERE userId=".$_SESSION['user']);//88
     $uRow=mysql_fetch_array($re);
	 $sno = $uRow[0];//79
    // print_r($uRow);
     $resss=mysql_query("SELECT imsec FROM logs WHERE sl_no='$sno'");
     $uRow1=mysql_fetch_array($resss);
	 $que=mysql_query("SELECT cur_status,Account_no FROM users WHERE userId=".$_SESSION['user']) or die(mysql_error());
	 $uRow6=mysql_fetch_array($que);
	 print_r($uRow6);
	 $s = $uRow6[0];
	 $ano = $uRow6[1];
	 echo "<br>";
	 echo $s;
	 $msec = $uRow1[0];
	 //$diff = ($ms-$msec)/1000;
	 print_r($uRow1);
	// echo $s;
	 //echo $diff;
	 //echo $msec;
	 echo $diff;
	 if(!$s)
	 {
     $qu = "UPDATE logs SET login2 = '$hDate' WHERE sl_no='$sno'";
	 $r = mysql_query($qu);
	 
	 $difference = ($ms-$msec)/1000;
	 $qu1 = "UPDATE users SET cur_status = 1 WHERE userId=".$_SESSION['user'];
	 $r1 = mysql_query($qu1);


	 $qu2 = "UPDATE logs SET diff = '$difference' WHERE sl_no='$sno'";
     $r2 = mysql_query($qu2);

	 $quer14 = "SELECT net_attempt from attempts WHERE Account_no='$ano'";
	 $resq14 = mysql_query($quer14) or die(mysql_error());
	 $fetch14 = mysql_fetch_array($resq14);
	 $ta = $fetch14[0];


	 $quer13 = "UPDATE logs SET total_attempt = '$ta'  WHERE sl_no='$sno'";
	 $resq13 = mysql_query($quer13);


	 $quer11 = "UPDATE attempts SET net_attempt = 0 WHERE userId=".$_SESSION['user'];
	 $resq1 = mysql_query($quer11);
	 //unset($uRow);
	 }
	

  //unset($uRow);ss


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
<!-- <!DOCTYPE html>
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
 -->
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2016"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>

</head>

<!-- <body>

 
      <div class="container">
        <h1 class="float-left">IITR Bank</h1>
        <h1 class="float-right">IITR</h1>
        <br>
        <br>
        <br>
        <hr>
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">User Account</a></li>
					<li id='caption'><a>Dashboard</a></li>
					<li><a href="customer_account_statement.php">Statement</a></li>
					<li><a href="add_beneficiary.php">Add Beneficiary</a></li>
                    <li><a href="display_beneficiary.php">View Beneficiary</a></li>
                    <li><a href="customer_transfer.php">Transfer Funds</a></li>
					<li id='caption'><a>Settings</a></li>
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
 -->          
              <?php include 'header.php' ?>
			  <MARQUEE BGCOLOR="#f2eded">Welcome <?php if(!empty($_POST['email'])) echo $userRow['userName']; ?> To Secure Net Banking...</MARQUEE>
			  <br>
                  <script language="JavaScript" type="text/javascript">
                  document.write(TODAY);  
                  </script>
             
        
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