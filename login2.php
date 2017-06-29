<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
  /*$_POST = $_SESSION;*/
 $error = false;
 
 if(isset($_POST['login-btn'] )) {
 $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
 if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userPass='$password'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
	  $_SESSION['user'] = $row['userId'];
	  header("Location: home.php");
   } else {
    $errMSG = "<h1>Incorrect Password, Try again...</h1>";
	echo $errMSG;
   }
    
  }
  
 }
 $_POST = $_SESSION;
 ?>
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
					<form method="post" action="">

						Welcome <?php if(!empty($_POST['email'])) echo $_POST['email'] ; ?>
						<br>
						<br>
						<div class="form-group">
						  <label for="password">Password:</label>
						  <input type="password" class="form-control" name="pass" id="password" required>
						</div>
						<div class="form-group">
						  <label for="rcode">Random Code:</label>
						  <input type="text" class="form-control" name="rcode_display" id="rcode_display" maxlength="6" value="<?php if(!empty($_POST['rcode'])) echo $_POST['rcode'];?>" required disabled>
						</div>
						<label for="usr">Select your Security Image: </label>
						<br>
						<br>
						<br>
						<h5 class="text-center"><a>Forgot Password? Click here!</a></h5>
						<br>
						<div class= "center-btn">
						<button type="submit" class="btn btn-primary a-btn" name="login-btn" id="btnlogin" value="login"><a class="a-btn">Login</a></button>
						</div>
						<!-- <button type="submit" class="btn btn-primary ml-70">Refresh</button> -->
					
					</form>

				</div>
				<div class="col-md-8 d3 mt0">
					<h3 class="text-center pb20 mt0">Choose your security Images</h3>
					<div class="d3-2">
				        <div class="d4">
				          <div class="d5">
				          	<div class="col-md-12">
					          	<div class="col-md-4"><img src="reg_images/01.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/02.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img2"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/03.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img3"></label>
								    </div>
					          	</div>
				          	</div>

					        <div class="col-md-12 mt10">
					          	<div class="col-md-4"><img src="reg_images/02.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img4"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/03.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img5"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/04.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img6"></label>
								    </div>
					          	</div>
				          	</div>
					
				</div>
			</div>


		</div>

	</body>
<html>
	