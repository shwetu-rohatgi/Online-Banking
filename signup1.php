<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';

//it will never let you open index page if session is set
  //if( isset($_SESSION['acc_no']) ) {
  //header("Location: signup4.php");
  //exit;
 //}
 $error = false;

if ( isset($_POST['cust-submit1']) ) {
	$c_no1 = ($_POST['cust-acc-no']);
	$c_no2 = ($_POST['cust-first-pwd']);
	$query=mysql_query("SELECT * FROM tmp WHERE Acc_no='$c_no1'");
	$row = mysql_fetch_array($query);
	echo $row;
	$_SESSION['acc_no'] = $c_no1;
	if($row['Acc_no']==$c_no1 && $row['tmp_pwd']==$c_no2)
	{
	// $_SESSION = $_POST;
	// header("Location: signup2.php");
		$count = 0; 
		if (!$error) {

		   $res=mysql_query("SELECT * FROM users WHERE Account_no=".$c_no1);
		   $row=mysql_fetch_array($res);
		   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
		   $_SESSION['userName'] = $row['userName'];
		   echo $row[1];
		   echo $count;
		   if( $count == 1 && $row['Account_no']==$c_no1) {
			  //$_SESSION = $_POST; 
			  session_write_close();
			  $_SESSION['user'] = $row['userId'];
			  $_SESSION = $_POST; 
			  header("Location: signup2.php");
			  		   
		   } else {
		   	$error = true;
		    $errMSG = "Incorrect Credentials, Try again...";
			echo $errMSG;
		   }
		  }
	}
	else
		echo "Invalid Credentials";

}
else
{
	echo "";
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>IITR Bank</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="banking.css">
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
			      <a class="navbar-brand" href="index.php">Home</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="#">Login</a></li>
			      <li><a href="#">Products</a></li>
			      <li><a href="#">Services</a></li>
			      <li><a href="#">Contact</a></li>
			    </ul>
			  </div>
			</nav>
			<div class="col-md-4">
				<h3 class="text-center">Customer Panel</h3>
				<br>
				<form method="post" action="">
				  <div class="form-group">
				    <label for="cust-acc-no">Enter your Account Number</label>
				    <input type="text" class="form-control" name="cust-acc-no" id="cust-acc-no">
				  </div>
				  <div class="form-group">
				    <label for="cust-first-pwd">Enter Bank generated Password:</label>
				    <input type="password" class="form-control" name="cust-first-pwd" id="cust-first-pwd">
				  </div>
				  <button type="submit" class="btn btn-default btn-primary" name="cust-submit1"><a class="a-btn">Next</button>
				</form>
			</div>
			<div class="col-md-8">
				<img src="banking.jpg" width = "100%"; >
			</div>
		</div>
	</body>
</html>