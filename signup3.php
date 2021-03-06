<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
 print_r($_SESSION);
echo $_SESSION['user'];

 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: signup3.php");
  exit;
 }

  $pictures = array("01.jpg", "02.jpg", "03.jpg","04.jpg", "05.jpg", "06.jpg","07.jpg", "08.jpg", "09.jpg","10.jpg", "11.jpg", "12.jpg","13.jpg", "14.jpg", "15.jpg","16.jpg", "17.jpg", "18.jpg","19.jpg", "20.jpg", "21.jpg","22.jpg", "23.jpg", "24.jpg","25.jpg", "26.jpg", "27.jpg","28.jpg", "29.jpg", "30.jpg","31.jpg", "32.jpg", "33.jpg","34.jpg", "35.jpg", "36.jpg","37.jpg", "38.jpg", "39.jpg","40.jpg", "41.jpg", "42.jpg","43.jpg", "44.jpg", "45.jpg","46.jpg", "47.jpg", "48.jpg","49.jpg", "50.jpg");
  $pic_string = array_rand($pictures,12);
  shuffle($pic_string);

  if( isset($_POST['cust-submit-img']) ){
    $flag = 0;
      if(!empty($_POST['images_selected'])) {
        $pic_array = array();
        $i=0;
        foreach($_POST['images_selected'] as $checked) {
                echo $checked; //echoes the value set in the HTML form for each checked checkbox.
                             //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                             //in your case, it would echo whatever $row['Report ID'] is equivalent to.
                $pic_array[$i] = $checked;
                $i++;
        }
        
        $_SESSION['pic1'] = $pic_array[0];
        $_SESSION['pic2'] = $pic_array[1];
        $_SESSION['pic3'] = $pic_array[2];
        $_SESSION['pic4'] = $pic_array[3];
        $flag = 1;
      }
      else{
        echo " ";
      }
      if($flag == 1){
        //$_SESSION = $_POST;
        header("Location: signup4.php");
        exit;
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
          Welcome <?php if(!empty($_SESSION['userName'])) echo $_SESSION['userName']; ?>
          <br>
          <h3 class="text-center">Customer Panel</h3>
          <br>
          
            <label for="usr">Select your Security Image: </label>
            <br><br>
            <button type="submit" class="btn btn-default btn-primary" name="cust-submit-img" id="cust-submit-img" disabled><a class="a-btn">Submit</a></button>

        </div>
        <div class="col-md-8 d3 mt0">
          <h3 class="text-center pb20 mt0">Select Upto 4 Random Images</h3>
          <div class="d3-2">
                <div class="d4">
                  <div class="d5">
                    <?php
                      for($i=0;$i<12;$i++){
                        echo '<span class="image-checkbox-container">';
                        echo '<input type="checkbox" class="image-checkbox" name="images_selected[]" value="'.$pictures[$pic_string[$i]].'" />'; 
                        echo '<img src="textplacement/reg_images/'.$pictures[$pic_string[$i]].'" id='.$pictures[$pic_string[$i]].' name='.$pictures[$pic_string[$i]].' height="35%" width="31%" />';
                        echo '</span>';
                      }
                    ?>

                  </div>
                </div>
            </div>
        </div>
        </form>
      </div>

    </div>
    <script>
    if(location.search)
        alert(location.search);

    $('.image-checkbox-container img').live('click', function(){
        if(!$(this).prev('input[type="checkbox"]').prop('checked')){
            $(this).prev('input[type="checkbox"]').prop('checked', true).attr('checked','checked');
            this.style.border = '4px solid #38A';
            //this.style.margin = '0px';
        }else{
            $(this).prev('input[type="checkbox"]').prop('checked', false).removeAttr('checked');
            this.style.border = '0';
            //this.style.margin = '4px';
        }
    });
    
    $('.image-checkbox-container img').live('click', function(){
    var a = $('.image-checkbox:checked').size();
    console.log(a);
        if (a==4) {
            $('#cust-submit-img').removeAttr('disabled');
        } else {
            $('#cust-submit-img').attr('disabled', 'disabled');
        }
    });
    
    </script>
  </body>
</html>