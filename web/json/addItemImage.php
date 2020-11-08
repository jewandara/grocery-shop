<?php

function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 80)
{
    // Obtain image from given source file.
    if (!$image = @imagecreatefromjpeg($sourceImage))
    {
        return false;
    }

    // Get dimensions of source image.
    list($origWidth, $origHeight) = getimagesize($sourceImage);

    if ($maxWidth == 0)
    {
        $maxWidth  = $origWidth;
    }

    if ($maxHeight == 0)
    {
        $maxHeight = $origHeight;
    }

    // Calculate ratio of desired maximum sizes and original sizes.
    $widthRatio = $maxWidth / $origWidth;
    $heightRatio = $maxHeight / $origHeight;

    // Ratio used for calculating new image dimensions.
    $ratio = min($widthRatio, $heightRatio);

    // Calculate new image dimensions.
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

	resizeImage($Savelocation, $Thumblocation, 200, 200);


	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = "Image Uploaded Successfully";
	echo json_encode($_RESULT);

}


?>
