<html>
	<head>
		<title>IITR Bank</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="banking.css">
		<script src="banking.js"></script>
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
			<br>
			<div class="col-md-12">
				<div class="col-md-4">
					<form>
						<div class="form-group">
						  <label for="password">Password:</label>
						  <input type="password" class="form-control" id="password" required>
						</div>
						<div class="form-group">
						  <label for="rcode">Random Code:</label>
						  <input type="text" class="form-control" name="rcode_display" id="rcode_display" maxlength="6" required disabled>
						</div>
						<label for="usr">Select your Security Image: </label>
						<br>
						<br>
						<br>
						<h5 class="text-center"><a>Forgot Password? Click here!</a></h5>
						<br>
						<div class= "center-btn">
						<button type="submit" class="btn btn-primary a-btn">Login</button>
						</div>
						<!-- <button type="submit" class="btn btn-primary ml-70">Refresh</button> -->
					
					</form>

				</div>
				<div class="col-md-8">
					
				</div>
			</div>


		</div>
		<!-- <h1>Hello HTML</h1>
		<?php
			echo "<h4>Hello php !</h4>";
		?> -->

	</body>
<html>