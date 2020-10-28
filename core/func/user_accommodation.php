<?php 

securePage($DOMAIN_CURRENT_PATH);

$accId = $_GET['id'];

if(!empty($_POST))
{	
	//print_r($_POST); 
	if(!empty($_POST['removeImage'])){
		$deletions = $_POST['removeImage'];
		if ($deletion_count = deleteAccommodationImages($deletions)) {
			$successes[] = lang("ACCOMMODATION_IMAGES_DELETIONS_SUCCESSFUL", array($deletion_count));
		}
		else { $errors[] = lang("SQL_ERROR"); }
	}
	else
	{



		if(isset($_POST['features']) && $_POST['features'] != "-1"){
			if (createAccommodationServices($accId, $_POST['features'])){

				$successes[] = lang("ACCOMMODATION_FEATURES_ADDED_SUCCESSFUL");
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
		
		/*
		//Update display name
		if ($userdetails['display_name'] != $_POST['display']){
			$displayname = trim($_POST['display']);
			
			//Validate display name
			if(displayNameExists($displayname))
			{
				$errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			}
			elseif(minMaxRange(5,25,$displayname))
			{
				$errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
			}
			elseif(!ctype_alnum($displayname)){
				$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
			}
			else {
				if (updateDisplayName($userId, $displayname)){
					$successes[] = lang("ACCOUNT_DISPLAYNAME_UPDATED", array($displayname));
				}
				else {
					$errors[] = lang("SQL_ERROR");
				}
			}
		}
		else { $displayname = $userdetails['display_name']; }
		
		//Activate account
		if(isset($_POST['activate']) && $_POST['activate'] == "activate"){
			if (setUserActive($userdetails['activation_token'])){
				$successes[] = lang("ACCOUNT_MANUALLY_ACTIVATED", array($displayname));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
		
		//Update email
		if ($userdetails['email'] != $_POST['email']){
			$email = trim($_POST["email"]);
			
			//Validate email
			if(!isValidEmail($email))
			{
				$errors[] = lang("ACCOUNT_INVALID_EMAIL");
			}
			elseif(emailExists($email))
			{
				$errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));
			}
			else {
				if (updateEmail($userId, $email)){
					$successes[] = lang("ACCOUNT_EMAIL_UPDATED");
				}
				else {
					$errors[] = lang("SQL_ERROR");
				}
			}
		}
		
		//Update title
		if ($userdetails['title'] != $_POST['title']){
			$title = trim($_POST['title']);
			
			//Validate title
			if(minMaxRange(1,50,$title))
			{
				$errors[] = lang("ACCOUNT_TITLE_CHAR_LIMIT",array(1,50));
			}
			else {
				if (updateTitle($userId, $title)){
					$successes[] = lang("ACCOUNT_TITLE_UPDATED", array ($displayname, $title));
				}
				else {
					$errors[] = lang("SQL_ERROR");
				}
			}
		}
		
		//Remove permission level
		if(!empty($_POST['removePermission'])){
			$remove = $_POST['removePermission'];
			if ($deletion_count = removePermission($remove, $userId)){
				$successes[] = lang("ACCOUNT_PERMISSION_REMOVED", array ($deletion_count));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
		
		if(!empty($_POST['addPermission'])){
			$add = $_POST['addPermission'];
			if ($addition_count = addPermission($add, $userId)){
				$successes[] = lang("ACCOUNT_PERMISSION_ADDED", array ($addition_count));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
		*/


		if (isset($_POST['uploadImage'])) {
		    $uploadFolder = 'img/accommodation/';
		    if(!empty($_POST['img_description'])) { $imageDescription = $_POST['img_description']; } else { $imageDescription = ""; }
		    $j = 0;
		    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
		        $imageSource = $_FILES['imageFile']['tmp_name'][$key];
		        $imageName = $_FILES['imageFile']['name'][$key];
				$imageSize = $_FILES["imageFile"]["size"][$key];
		    	if($imageSize > 5242880) { $errors[] = lang("UPLOAD_SIZE"); }
				else{
					$TYPE = findImageType($imageName);
					if($TYPE == ""){ $errors[] = lang("UPLOAD_TYPE"); }
					else
					{
						$GEN = strtoupper(md5(uniqid(mt_rand(), false)));
						$newImageName = $GEN.'.'.$TYPE[1];
			    		$uploadFolderTarget = $uploadFolder.$newImageName;
			    		//echo $uploadFolderTarget;
			    		$uploadFolderThumbTarget = $uploadFolder.'thumb/'.$newImageName;
			    		//echo $uploadFolderThumbTarget;
			        	$resulTarget = move_uploaded_file($imageSource, $uploadFolderTarget);
			        	echo ($TYPE[0]);
						switch ($TYPE[0]) {
							case '.PNG': $img = imagecreatefrompng($uploadFolderTarget); break;
							case '.JPEG': $img = imagecreatefromjpeg($uploadFolderTarget); break;
							case '.JPG': $img = imagecreatefromjpeg($uploadFolderTarget); break;
							default: $img = imagecreatefromjpeg($uploadFolderTarget); break;
						}
						$width = imagesx($img);
						$height = imagesy($img);
						$new_width = 64;
						$new_height = floor( $height * ( 64 / $width ) );
						// create a new temporary image
						$tmp_img = imagecreatetruecolor( $new_width, $new_height );
						// copy and resize old image into new image 
						imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
						// save thumbnail into a file
						imagejpeg( $tmp_img, $uploadFolderThumbTarget);
						uploadNewAccommodationImages( $accId, $newImageName, $imageDescription );
						$j = $j + 1;
					}
		        }
		    }
		    if(count($errors) == 0){ $successes[] = lang("ACCOMMODATION_IMAGES_ADDED_SUCCESSFUL", array ($j)); }
		}

	}
}

$accommodationsDetails = fetchAccommodationData($loggedInUser->user_id, $accId)[0];

$accommodationImageData = fetchAccommodationImageData($accId);

$servicesData = fetchServices();

$accommodationServicesData = fetchAccommodationServices($accId);

$ERROR_MESSAGE = resultBlock($errors,$successes);

?>