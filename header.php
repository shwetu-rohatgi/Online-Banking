<?php
 // ob_start();
 // session_start();
 ini_set('display_errors',1); 
 error_reporting(E_ALL); 
 $_POST = $_SESSION;
 //print_r($_SESSION);
 
 require_once 'dbconnect.php';
 
$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);


if(isset($_GET['home-logout'])) {
  
  echo "hello";
  print_r($_SESSION);

  date_default_timezone_set('Asia/Kolkata');
  $oDate = date("Y-m-d H:i:s");
  $re=mysql_query("SELECT MAX(sl_no) FROM logs WHERE userId=".$_SESSION['user']);
  $uRow=mysql_fetch_array($re)or die(mysql_error());
  $sno = $uRow[0];
  echo $sno;
  $qu2 = "UPDATE users SET cur_status = 0 WHERE userId=".$_SESSION['user'];
  $r3 = mysql_query($qu2)or die(mysql_error());

  //echo "task done";

  $qu3 = "UPDATE logs SET out_time = '$oDate' WHERE sl_no='$sno'";
  
  $r4 = mysql_query($qu3)or die(mysql_error());
  


  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
 }else{
	 echo " ";
 }

?>
<?php include 'header-top.php' ?>
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
              <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">User Account</a></li> -->
					<li id='caption'><a href="home.php">Dashboard</a></li>
					<li><a href="customer_account_statement.php">Statement</a></li>
					<li><a href="add_beneficiary.php">Add Beneficiary</a></li>
                    <li><a href="display_beneficiary.php">View Beneficiary</a></li>
                    <li><a href="customer_transfer.php">Transfer Funds</a></li>
					<!-- <li id='caption'><a>Settings</a></li> -->
					<li><a href="change_password_customer.php">Change Password</a></li>
				</ul>
                <ul class="nav navbar-nav navbar-right">
              
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;<strong> Hey! <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></strong></a>
                    <ul class="dropdown-menu">
					<form method="get" action="">
                      <li><span class="glyphicon glyphicon-log-out"></span>&nbsp;<button type="submit" name="home-logout" value="home-logout">Sign Out</button></li>
                    </form>
					</ul>
                  </li>

              </ul>
            </div>
          </nav>
