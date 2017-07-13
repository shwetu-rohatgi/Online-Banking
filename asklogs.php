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
			<div class="col-md-12">
				<h3 class="text-center">Logs</h3><br>
				<h4 class="text-center">Set Logs period to be displayed:</h4>
				<center>
					<form action="viewlogs.php" method="POST">
					    <br>
					    <div class="container">
					    	<div class="col-md-1"></div>
					        <div class="col-md-4 col-xs-4">
					        <center><label for="date1" class="text-center">Start Date [mm/dd/yyyy]</label>
					        <input type="date" class="form-control" name="date1" required>
					    	</center> 
					    	</div>

					    	<div class="col-md-1"></div>

					        <div class="col-md-4 col-xs-4 ml35" class="text-center">
					        <center><label for="date2">End Date [mm/dd/yyyy] </label>
					        <input type="date" class="form-control" name="date2" required>
					    	</center>
					    	</div>
					    	
					    	<div class="col-md-1"></div>
					    </div>
					    
					    <br>
					    <br>
					   
					    <button type="submit" class="btn btn-primary text-center" name="log-date-submit">Show Logs</button>
				 	</form>
	
				</center>
				
			</div>
		</div>
	</body>
</html>
<?php ob_end_flush(); ?>