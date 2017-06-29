<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';

 $error = false;
 if( isset($_POST['cust-submit-img']) ){
 	if (!$error){
	 	if($count == 4){

	 		// password encrypt using SHA256();

	 		
	 		$query1 = "UPDATE users SET userImg1 = '$img1' WHERE Account_no='$acc_no'";
	 		$query2 = "UPDATE users SET userImg2 = '$img2' WHERE Account_no='$acc_no'";
	 		$query3 = "UPDATE users SET userImg3 = '$img3' WHERE Account_no='$acc_no'";
	 		$query4 = "UPDATE users SET userImg4 = '$img4' WHERE Account_no='$acc_no'";
	 		$res = mysql_query($query1);
	 		$res = mysql_query($query2);
	 		$res = mysql_query($query3);
	 		$res = mysql_query($query4);


	 		if($res){
	 			$errTyp = "<h1>success</h1>";
			    $errMSG = "<h2>Successfully Password Changed</h2>";
				echo $errTyp;
				echo $errMSG;
			    unset($pass1);
			    unset($pass2);
	 		 } 
	 		 else{
			    $errMSG = "<h1>Invalid Selection</h1>";
				echo $errMSG;
	 		}
	 	}
	 	else{
	 		echo "Please select upto 4 images only!";
	 	}
 	}else{
 		echo "Some error occured try login again!";
 	}
 }
 else
{
	echo "fuck";
}
 $POST = $_SESSION;

?>

<html>
	<head>
		<title>IITR Bank</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
				<form method="post" action="">
				<div class="col-md-4">
					<h3 class="text-center">Customer Panel</h3>
					<br>
					
					  <label for="usr">Select your Security Image: </label>
					  <br><br>
					  <button type="submit" class="btn btn-default btn-primary" name="cust-submit-img" id="cust-submit-img"><a class="a-btn">Submit</a></button>

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
				</form>
			</div>


		</div>

	</body>
</html>