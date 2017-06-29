<?php
 ob_start();
 session_start();

 ?>
<html>
  <head>
    <title>IITR Bank</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
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
          <ul class="nav navbar-nav navbar-right">
              
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;<strong> Hey! <?php echo $_SESSION['userName']; ?>&nbsp;<span class="caret"></span></strong></a>
                    <ul class="dropdown-menu">
                      <li><a href="logout2.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                    </ul>
                  </li>

          </ul>
        </div>
      </nav>
      <br>
      <div class="col-md-12">
        
        
        
        	Welcome <?php if(!empty($_SESSION['userName'])) echo $_SESSION['userName'] ; ?>
          
          <h1 class="text-center">Details Updated Successfully !<h1><br>
          <h2 class="text-center">Click <a href="logout2.php?logout">here</a> to Login and Continue<h2>
        
        

        
        
      </div>

    </div>
  </body>
</html>
<?php ob_end_flush(); ?>