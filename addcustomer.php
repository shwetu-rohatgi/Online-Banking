<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';

 $error = false;
 $count = 0;

 if ( isset($_POST['reg_btn']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
 /* $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);*/

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

 $phoneNumber = $_POST['mobile'];
 

if(!empty($phoneNumber)) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$phoneNumber)) // phone number is valid
    {
      $phoneNumber = '0' . $phoneNumber;
	  $fphone = $phoneNumber;
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

 //amount validation
  if (empty($min_amt)){
   $error = true;
   $amtError = "Please enter Minimum Value";
   echo $amtError;
  } else if(($min_amt) < 1000) {
   $error = true;
   $amtError = "Minimum amount should be 1000";
   echo $amtError;
  }

  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,Gender,DOB,Balance,mobile,userEmail) VALUES('$name','$gen','$date','$min_amt','$fphone','$email')";
   $res = mysql_query($query);
    
   if ($res) {
    $errMSG = "<div class=\"bg-yellow\"><center><h4>Successfully registered!</h4></center></div>";
	  echo $errMSG;
	$query=mysql_query("SELECT userId FROM users WHERE userEmail='$email'");
	$row = mysql_fetch_array($query);
	$uid = $row['userId'];
	echo"<br>";
	//function for random password 
  function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }

    // function for formatted account no.
  function accountno($uid){
    $id = $uid-1;
    if($id<10){
    	$accno = "3284"."000000".$id;
    }
    else if($id<100){
    	$accno = "3284"."00000".$id;
    }
    else if($id<1000){
    	$accno = "3284"."0000".$id;
    }
    else if($id<10000){
    	$accno = "3284"."000".$id;
    }
    else if($id<100000){
    	$accno = "3284"."00".$id;
    }
    else if($id<1000000){
    	$accno = "3284"."0".$id;
    }
    else if($id<10000000){
    	$accno = "3284".$id;
    }
    else{
    	echo "Account no. does not exist";
    }
    return $accno;
  }
    $finalacc_no = accountno($uid);
    $temp_pwd = randomPassword();
    $query1 = "UPDATE users SET Account_no='$finalacc_no' WHERE userEmail = '$email'";
    mysql_query($query1);
    $query2 = "INSERT INTO tmp(Acc_no,tmp_pwd) VALUES('$finalacc_no','$temp_pwd')";
    mysql_query($query2);
    echo "<div class=\"bg-yellow\"><center><h4>Account No.: </h4>".$finalacc_no ." <br> <h4>First Time Password: </h4>" . $temp_pwd."</center></div>";
	$query3 = "CREATE TABLE `".$finalacc_no."` (
transactionid int(12) NOT NULL AUTO_INCREMENT,
  transactiondate date DEFAULT NULL,
  name varchar(255) DEFAULT NULL,
  credit int(10) DEFAULT NULL,
  debit int(10) DEFAULT NULL,
  amount float(10,2) DEFAULT NULL,
  narration varchar(255) NOT NULL,
  PRIMARY KEY (transactionid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
mysql_query($query3);
 $date=date("Y-m-d");
 $query4 = "INSERT INTO `".$finalacc_no."`(transactiondate,name,credit,debit,amount,narration) VALUES('$date','$name','$min_amt','','$min_amt','cash deposit')";
 mysql_query($query4);

    unset($name);
    unset($email);
    	 
      //unset($pass);
    } else {
        $errTyp = "<center><h4>danger</h4></center>";
        $errMSG = "<center><h4>Something went wrong, try again later...</h4></center>";
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
					<form action="" method="post" id="addcust_form">
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
						  	<input type="date" class="form-control" id="dob" name="dob" required><br>
						  	<label for="minval">Account Balance:</label>
						  	<input type="text" class="form-control" name="minval" id="textInput" value="1000" required><br>
						  	<label for="mobile">Mobile:</label>
						  	<input type="text" class="form-control" id="mobile" name="mobile" required>
						  	<label for="email">Email:</label>
						  	<input type="email" class="form-control" name="email" id="email" required>
							<!-- <label for="password">Password:</label>
													  	<input type="password" class="form-control" name="pass" id="password" required> -->
							</div>
						<button type="submit" class="btn btn-primary text-center float-left" name="reg_btn" id="myBtn"><a class="a-btn">Register</a></button>
            <button type="submit" class="btn btn-primary btn-danger text-center float-right" name="reg_btn"><a class="a-btn" href="admin-home.php">Back</a></button>
						<!-- <button type="submit" class="btn btn-primary ml-70">Refresh</button> -->
					
					<br>
          <br>

          </form>
          
				</div>
				<div class="col-md-8">
					<img src="banking.jpg" width = "100%"; >
				</div>
				
			</div>


		</div>

	</body>
<html>

	



