<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';

if ( isset($_POST['btn_dlt']) ) {
	$a_no1 = ($_POST['cust_acno1']);
	$a_no2 = ($_POST['cust_acno2']);
	if($a_no1 == $a_no2)
	{
		$query1 = "DELETE FROM users WHERE Account_no= $a_no1";
		$res1 = mysql_query($query1);
		$n1 = mysql_affected_rows();
		$query2 = "DELETE FROM tmp WHERE Acc_no= $a_no2";
		$res2 = mysql_query($query2);
		$n2 = mysql_affected_rows();
		if($n1 > 0 && $n2 > 0){
			$errMSG = "<h2>Record deleted successfully!</h2>";
			echo $errMSG;
			}
			else{

				echo "<h1>error deleting records! Record not found</h1>";
			}
	}
	
else {
    $errTyp = "<h1>The two fields did not Match</h1>";
    $errMSG = "<h1>Please enter carefully...</h1>";
	echo $errTyp;
	echo $errMSG;

	}

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
			      <a class="navbar-brand" href="#">Home</a>
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
				<h3 class="text-center">Admin Panel</h3>
				<br>
				  <form action="" method='post'>
				  <div class="form-group">
				    <label for="cust-acno">Customer Account Number:</label>
				    <input type="text" class="form-control" name="cust_acno1" id="cust-acno" required>
				  </div>
				  <div class="form-group">
				    <label for="cust-name">Confirm Account Number:</label>
				    <input type="text" class="form-control" name="cust_acno2" id="cust-name" required>
				  </div>

				  <button type="submit" class="btn btn-default btn-primary text-center float-left" name="btn_dlt"><a class="a-btn">Delete</a></button>
				  <button type="submit" class="btn btn-primary btn-danger text-center float-right" name="reg_btn"><a class="a-btn" href="admin-home.php">Back</a></button>
				</form>
			</div>
			<div class="col-md-8">
				<img src="banking.jpg" width = "100%"; >
			</div>
		</div>
	</body>
</html>