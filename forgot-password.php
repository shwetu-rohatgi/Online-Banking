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
			      <li class="active"><a href="#">Forgot Password</a></li>
			      <li><a href="#">Products</a></li>
			      <li><a href="#">Services</a></li>
			      <li><a href="#">Contact</a></li>
			    </ul>
			  </div>
			</nav>
			<br>
			<div class="col-md-12">
				<div class="col-md-4">
					<form action="" method="post" id="forgotform">
						<div class="form-group">
						  <label for="usrname">Enter you Email Address:</label>
						  <input type="email" class="form-control" name="forgot-email" id="forgot-email" required>
						</div>
					    <br>
					    <center><button type="submit" class="btn btn-primary" id="forgotbtn" name="forgotpwd">Send</button></center>
						<br>
						<h4 class="text-center" id="sent-text">Please check your mail account to set new password !</h4>
					
					</form>

				</div>
				<div class="col-md-8">
					<img src="banking.jpg" width = "100%"; >
				</div>
			</div>


		</div>
		<script src="banking.js"></script>
		<script type="text/javascript">
		    $("#forgotform").submit(function(e) {
			    e.preventDefault();
			});
		</script>
	</body>
<html>
