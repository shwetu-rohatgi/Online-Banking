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
				<form>
				  <div class="form-group">
				    <label for="cust-acno">Customer Account Number:</label>
				    <input type="text" class="form-control" id="cust-acno">
				  </div>
				  <div class="form-group">
				    <label for="cust-name">Customer Name:</label>
				    <input type="text" class="form-control" id="cust-name">
				  </div>

				  <button type="submit" class="btn btn-default btn-primary"><a class="a-btn" href="admin-home.php">Delete</button>
				</form>
			</div>
			<div class="col-md-8">
				<img src="banking.jpg" width = "100%"; >
			</div>
		</div>
	</body>
</html>