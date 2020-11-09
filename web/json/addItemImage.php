<?php

function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 80)
{
    if (!$image = @imagecreatefromjpeg($sourceImage)) { return false; }
    list($origWidth, $origHeight) = getimagesize($sourceImage);
    if ($maxWidth == 0) {  $maxWidth  = $origWidth; }
    if ($maxHeight == 0) {  $maxHeight = $origHeight;  }
    $widthRatio = $maxWidth / $origWidth;
    $heightRatio = $maxHeight / $origHeight;
    $ratio = min($widthRatio, $heightRatio);
    $newWidth  = (int)$origWidth  * $ratio;
    $newHeight = (int)$origHeight * $ratio;
    // Create final image with new dimensions.
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
    imagejpeg($newImage, $targetImage, $quality);
    // Free up the memory.
    imagedestroy($image);
    imagedestroy($newImage);
    return true;
}

if(isset($_FILES['file']['name'])){

	$filename = $_FILES['file']['name'];
	$location = $_FOLDER."images/items/".$filename;
	$Savelocation = $_FOLDER."images/items/".$_GET['id'].".jpg";
	$Thumblocation = $_FOLDER."images/items/thumb/".$_GET['id'].".jpg";
	$xxsmallThumblocation = $_FOLDER."images/items/xxsmall/".$_GET['id'].".jpg";
	$xxxsmallThumblocation = $_FOLDER."images/items/xxxsmall/".$_GET['id'].".jpg";

	if (file_exists($Savelocation)) { unlink($Savelocation); }

	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);
	$valid_extensions = array("jpg","jpeg","png");
	$response = 0;

	if(in_array(strtolower($imageFileType), $valid_extensions)) {
	  if(move_uploaded_file($_FILES['file']['tmp_name'], $Savelocation)){
	     $response = $location;
	  }
	}

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext == 'gif') {
        $image = imagecreatefromgif($Savelocation);
        imagejpeg($image, $Savelocation, 70);
    }
    if ($ext == 'png') {
        $image = imagecreatefrompng($Savelocation);
        imagejpeg($image, $Savelocation, 70);
    }

    if(file_exists($Thumblocation)){ unlink($Thumblocation); }
    if(file_exists($xxsmallThumblocation)){ unlink($xxsmallThumblocation); }
    if(file_exists($xxxsmallThumblocation)){ unlink($xxxsmallThumblocation); }

	resizeImage($Savelocation, $Thumblocation, 200, 200);
	resizeImage($Savelocation, $xxsmallThumblocation, 64, 64);
	resizeImage($Savelocation, $xxxsmallThumblocation, 16, 16);

	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = "Image Uploaded Successfully";
	echo json_encode($_RESULT);

}


?>
