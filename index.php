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
					<form action="login.php" method="post">
						<div class="form-group">
						  <label for="usrname">Username:</label>
						  <input type="text" class="form-control" name="usrname" id="usrname" required>
						</div>
						<div class="form-group">
						  <label for="rcode">Random Code:</label>
						  <input type="text" class="form-control" name="rcode" id="rcode" maxlength="6" required>
						</div>
						<div class="checkbox">
					      <label><input type="checkbox" id="checkme">I have Verified the presence of padlock symbol and HTTPS in the URL</label>
					    </div>
					    <br>
					    <br>
					    <br>
						<h5 class="text-center"><a href="register.php">New User? Register Here</a></h5>
						<br>
						<button type="submit" class="btn btn-primary ml-70" id="submitbtn" disabled><a class="a-btn">Submit</a></button>
						<button type="submit" class="btn btn-primary ml-70">Reset</button>
					
					</form>

				</div>
				<div class="col-md-8">
					<img src="banking.jpg" width = "100%"; >
				</div>
			</div>


		</div>

	</body>
<html>