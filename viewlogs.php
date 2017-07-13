<?php
ob_start();
session_start();
include_once 'dbconnect.php';

if(isset($_REQUEST['log-date-submit'])) {
            
        $date1=$_REQUEST['date1'];
        $date2=$_REQUEST['date2'];

		$sql="SELECT * FROM logs WHERE logsdate BETWEEN '$date1' AND '$date2'";
		$result = mysql_query($sql) or die(mysql_error());

		$sql2="SELECT * FROM logs WHERE logsdate BETWEEN '$date1' AND '$date2'";
		$result2 = mysql_query($sql) or die(mysql_error());
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
				<h3 class="text-center">Logs</h3>
				<div class='log_customer'>
				<center>
					<table align="center">
                        <th>S.No</th>
                        <th>Unique ID</th>
                        <th>Account No</th>
                        <th>Login Time.1</th>
                        <th>Login Time.2</th>
                        <th>Net Login time</th>
                        <th>Logout Time</th>
                        <th>Total Attempts<th>
                        
                        
                        
                        <?php
                        while($rws = mysql_fetch_array($result)){
                            echo "<tr><td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            echo "<td>".$rws[7]."</td>";
							echo "<td>".$rws[8]."</td>";
							echo "<td>".$rws[9]."</td>";
                           
                            echo "</tr>";
                        } 
                        ?>
					</table>
					<br>
			<br><br>
				</center>
				</div>
				
			</div>
		</div>
	</body>
</html>
<?php ob_end_flush(); ?>