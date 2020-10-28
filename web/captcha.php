<?php

session_start();
$md5_hash = md5(rand(0,99999)); 
$security_code = substr($md5_hash, 25, 5); 
$enc = md5($security_code);
$_SESSION['captcha'] = $enc;

$width = 220;
$height = 50; 

$image = ImageCreate($width, $height);  
$white = ImageColorAllocate($image, 255, 255, 255);
$black = ImageColorAllocate($image, 0, 0, 0);
$grey = ImageColorAllocate($image, 200, 200, 200);

ImageFill($image, 0, 0, $white); 
#ImageString($image, 10, 50, 0, $security_code, $black); 
$randomFont = rand(1,40);
$font = dirname(__FILE__).'/fonts/captcha/'.$randomFont.'.ttf';
$size = 25;
$rotate = 0;
imagettftext($image, $size, $rotate, 10, 40, $black, $font, $security_code);

header("Content-Type: image/png"); 
ImagePng($image);
ImageDestroy($image);

?>
