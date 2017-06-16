<?php

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
$id = 72;
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
echo $accno;
echo "<br>";
echo randomPassword();

?>