<?php 

securePage($_SERVER['PHP_SELF']);

if(!empty($_POST))
{
	$cfgId = array();
	$newSettings = $_POST['settings'];
	if($_POST['settings'][4] == '1'){ $newSettings[4] = "true"; }
	else{ $newSettings[4] = "false";}
	
	//Validate new site name
	if ($newSettings[1] != $websiteName) {
		$newWebsiteName = $newSettings[1];
		if(minMaxRange(1,150,$newWebsiteName))
		{
			$_ERRORS[] = lang("CONFIG_NAME_CHAR_LIMIT",array(1,150));
		}
		else if (count($_ERRORS) == 0) {
			$cfgId[] = 1;
			$cfgValue[1] = $newWebsiteName;
			$websiteName = $newWebsiteName;
		}
	}
	
	//Validate new URL
	if ($newSettings[2] != $websiteUrl) {
		$newWebsiteUrl = $newSettings[2];
		if(minMaxRange(1,150,$newWebsiteUrl))
		{
			$_ERRORS[] = lang("CONFIG_URL_CHAR_LIMIT",array(1,150));
		}
		else if (substr($newWebsiteUrl, -1) != "/"){
			$_ERRORS[] = lang("CONFIG_INVALID_URL_END");
		}
		else if (count($_ERRORS) == 0) {
			$cfgId[] = 2;
			$cfgValue[2] = $newWebsiteUrl;
			$websiteUrl = $newWebsiteUrl;
		}
	}
	
	//Validate new site email address
	if ($newSettings[3] != $emailAddress) {
		$newEmail = $newSettings[3];
		if(minMaxRange(1,150,$newEmail))
		{
			$_ERRORS[] = lang("CONFIG_EMAIL_CHAR_LIMIT",array(1,150));
		}
		elseif(!isValidEmail($newEmail))
		{
			$_ERRORS[] = lang("CONFIG_EMAIL_INVALID");
		}
		else if (count($_ERRORS) == 0) {
			$cfgId[] = 3;
			$cfgValue[3] = $newEmail;
			$emailAddress = $newEmail;
		}
	}
	
	//Validate email activation selection
	if ($newSettings[4] != $emailActivation) {
		$newActivation = $newSettings[4];
		if($newActivation != "true" AND $newActivation != "false")
		{
			$_ERRORS[] = lang("CONFIG_ACTIVATION_TRUE_FALSE");
		}
		else if (count($_ERRORS) == 0) {
			$cfgId[] = 4;
			$cfgValue[4] = $newActivation;
			$emailActivation = $newActivation;
		}
	}
	
	//Validate new email activation resend threshold
	if ($newSettings[5] != $resend_activation_threshold) {
		$newResend_activation_threshold = $newSettings[5];
		if($newResend_activation_threshold > 72 OR $newResend_activation_threshold < 0)
		{
			$_ERRORS[] = lang("CONFIG_ACTIVATION_RESEND_RANGE",array(0,72));
		}
		else if (count($_ERRORS) == 0) {
			$cfgId[] = 5;
			$cfgValue[5] = $newResend_activation_threshold;
			$resend_activation_threshold = $newResend_activation_threshold;
		}
	}
	
	//Validate new language selection
	if ($newSettings[6] != $language) {
		$newLanguage = $newSettings[6];
		if(minMaxRange(1,150,$language))
		{
			$_ERRORS[] = lang("CONFIG_LANGUAGE_CHAR_LIMIT",array(1,150));
		}
		elseif (!file_exists($newLanguage)) {
			$_ERRORS[] = lang("CONFIG_LANGUAGE_INVALID",array($newLanguage));				
		}
		else if (count($_ERRORS) == 0) {
			$cfgId[] = 6;
			$cfgValue[6] = $newLanguage;
			$language = $newLanguage;
		}
	}
	
	//Validate new template selection
	if ($newSettings[7] != $template) {
		$newTemplate = $newSettings[7];
		if(minMaxRange(1,150,$template))
		{
			$_ERRORS[] = lang("CONFIG_TEMPLATE_CHAR_LIMIT",array(1,150));
		}
		elseif (!file_exists($newTemplate)) {
			$_ERRORS[] = lang("CONFIG_TEMPLATE_INVALID",array($newTemplate));				
		}
		else if (count($_ERRORS) == 0) {
			$cfgId[] = 7;
			$cfgValue[7] = $newTemplate;
			$template = $newTemplate;
		}
	}
	
	//Update configuration table with new settings
	if (count($_ERRORS) == 0 AND count($cfgId) > 0) {
		if (updateConfig($cfgId, $cfgValue)) {
			$successes[] = lang("CONFIG_UPDATE_SUCCESSFUL");
		}
		else {
			$_ERRORS[] = lang("SQL_ERROR");	
		}
	}
}

$languages = getLanguageFiles(); //Retrieve list of language files
$templates = getTemplateFiles(); //Retrieve list of template files
$permissionData = fetchAllPermissions(); //Retrieve list of all permission levels
$ERROR_MESSAGE = resultBlock($_ERRORS,$_SUCCESS);

?>