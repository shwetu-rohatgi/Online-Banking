<?php
ob_start();
session_start();



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
			    <ul class="nav navbar-nav navbar-right">
              
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;<strong> Hey! Admin&nbsp;<span class="caret"></span></strong></a>
                    <ul class="dropdown-menu">
                      <li><a href="admin.php?"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                    </ul>
                  </li>

              </ul>
			  </div>
			</nav>
			<div class="col-md-4">
				<h3 class="text-center">Admin Dashboard</h3>
				<center>
					<button class="btn btn-primary btn-group-lg center-btn mt40"><a href="addcustomer.php" class="a-btn">Add New Customer</a></button><br>
					<button class="btn btn-primary btn-group-lg center-btn mt40"><a href="admin_beneficiary.php" class="a-btn">Approve Beneficiary</a></button><br>
					<button class="btn btn-primary btn-group-lg center-btn mt40"><a href="deletecustomer.php" class="a-btn">Delete Customer</a></button><br>
					<button class="btn btn-primary btn-group-lg center-btn mt40"><a href="asklogs.php" class="a-btn">View Logs</a></button>
				</center>
				
			</div>
			<div class="col-md-8">
				<img src="banking.jpg" width = "100%"; >
			</div>
		</div>
	</body>
</html>
<?php ob_end_flush(); ?>