<?php
 ob_start();
 session_start();
 
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['reg_btn']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $gen = $_POST['optradio'];
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
   echo $nameError;
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
   echo $nameError;
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
   echo $nameError;
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
   echo $emailError;
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
	echo $emailError;
   }
  }
 // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
   echo $passError;
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
   echo $passError;
  }
 $phoneNumber = $_POST['mobile'];
 

if(!empty($phoneNumber)) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$phoneNumber)) // phone number is valid
    {
      $phoneNumber = '0' . $phoneNumber;
	  $fphone = $phoneNumber;

      // your other code here
    }
    else
     // phone number is not valid
    {
	 $error = true;
      echo 'Phone number invalid !';
    }
}
else // phone number is empty
{
	$error = true;
  echo 'You must provide a phone number !';
}
$date = $_POST['dob'];
$min_amt = $_POST['minval'];

 // password validation
  if (empty($min_amt)){
   $error = true;
   $amtError = "Please enter Minimum Value";
   echo $amtError;
  } else if(($min_amt) < 1000) {
   $error = true;
   $amtError = "Minimum amount should be 1000";
   echo $amtError;
  }

  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,Gender,DOB,Balance,mobile,userEmail,userPass) VALUES('$name','$gen','$date','$min_amt','$fphone','$email','$password')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "<h1>success</h1>";
    $errMSG = "<h2>Successfully registered, you may login now</h2>";
	echo $errTyp;
	echo $errMSG;
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "<h1>danger</h1>";
    $errMSG = "<h1>Something went wrong, try again later...</h1>";
	echo $errTyp;
	echo $errMSG;
   } 
   
  }
  
  }
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
			      <li class="active"><a href="#">Register</a></li>
			      <li><a href="#">Products</a></li>
			      <li><a href="#">Services</a></li>
			      <li><a href="#">Contact</a></li>
			    </ul>
			  </div>
			</nav>
			<br>
			<div class="col-md-12">
				<div class="col-md-4">
					<form action="" method="post">
						<div class="form-group">
						  <label for="name">Customer's Name:</label>
						  <input type="text" class="form-control" name="name" id="name" required>
						  <label for="optradio">Gender:</label>
						  <br>
							<div class="radio">
							<label><input type="radio" name="optradio" checked id="radio1" value="M">M</label>
							</div>
							<div class="radio">
							<label><input type="radio" name="optradio" id="radio2" value="F">F</label>
							</div>
							<br><br>
							<label for="dob">DOB:</label>
						  	<input type="date" class="form-control" id="dob" name="dob" required>
						  	<label for="minval">Minimum Amount:</label>
						  	<input type="text" class="form-control" name="minval" id="textInput" value="1000" required><br>
						  	<label for="mobile">Mobile:</label>
						  	<input type="text" class="form-control" id="mobile" name="mobile" required>
						  	<label for="email">Email:</label>
						  	<input type="email" class="form-control" name="email" id="email" required>
							<label for="password">Password:</label>
						  	<input type="password" class="form-control" name="pass" id="password" required>
							</div>
						<br>
						<button type="submit" class="btn btn-primary text-center" name="reg_btn"><a class="a-btn">Register</a></button>
						<!-- <button type="submit" class="btn btn-primary ml-70">Refresh</button> -->
					
					</form>

				</div>
				<div class="col-md-8 d3 mt0">
					<h3 class="text-center pb20 mt0">Select Upto 4 Random Images</h3>
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
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/03.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
				          	</div>

					        <div class="col-md-12 mt10">
					          	<div class="col-md-4"><img src="reg_images/02.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/03.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/04.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
				          	</div>

				          	<div class="col-md-12 mt10">
					          	<div class="col-md-4"><img src="reg_images/03.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/02.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/01.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
				          	</div>

				          	<div class="col-md-12 mt10">
					          	<div class="col-md-4"><img src="reg_images/04.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/01.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/02.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
				          	</div>

				          	<div class="col-md-12 mt10">
					          	<div class="col-md-4"><img src="reg_images/02.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/03.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
					          	<div class="col-md-4"><img src="reg_images/04.jpg" class="reg-img">
					          		<div class="checkbox">
								      <label><input type="checkbox" id="img1"></label>
								    </div>
					          	</div>
				          	</div>

				          </div>
				        </div>
				    </div>
				</div>
			</div>


		</div>

	</body>
<html>

	



