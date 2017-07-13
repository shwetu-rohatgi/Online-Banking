<?php
ob_start();
session_start();

$adminid = array("12345001","12345002","12345003","12345004");
$adminpwd = array("abc123","def456","ghi789","xyz123");
if( isset($_POST['admin-btn-login']) ) {

    $flag = 0;
	$admin_id = ($_POST['admin-id']);
	$admin_pwd = ($_POST['admin-pwd']);
	for($i=0;$i<4;$i++)
	{
    if( $adminid[$i] == $admin_id && $adminpwd[$i] == $admin_pwd){
	   header("Location: admin-home.php");
	   $flag = 1;
	}
	}
	if($flag==0){
		echo "Invalid credentials, Try again !";
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
				<h3 class="text-center">Admin Panel</h3>
				<form action="" method="post">
				  <div class="form-group">
				    <label for="admin-id">Admin ID:</label>
				    <input type="text" class="form-control" name="admin-id" id="admin-id">
				  </div>
				  <div class="form-group">
				    <label for="admin-pwd">Password:</label>
				    <input type="password" class="form-control" name= "admin-pwd" id="admin-pwd">
				  </div>
				  <button type="submit" class="btn btn-default btn-primary" name="admin-btn-login"><a class="a-btn">Login</a></button>
				</form>
			</div>
			<div class="col-md-8">
				<img src="banking.jpg" width = "100%"; >
			</div>
		</div>
	</body>
</html>