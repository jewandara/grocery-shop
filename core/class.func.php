<?php

//Functions that do not interact with DB

//Retrieve a list of all .php files in models/languages
function getLanguageFiles()
{
	$directory = "languages/";
	$languages = glob($directory . "*.php");
	//print each file name
	return $languages;
}

//Retrieve a list of all .css files in models/site-templates 
function getTemplateFiles()
{
	$directory = "templates/";
	$languages = glob($directory . "*.css");
	//print each file name
	return $languages;
}

//Retrieve a list of all .php files in root files folder
function getPageFiles()
{
	$directory = "";

	$pages = glob($directory."web/*.*");
	foreach ($pages as $page){ $row[$page] = $page; }
	$pages = glob($directory."web/pages/*.*");
	foreach ($pages as $page){ $row[$page] = $page; }
	$pages = glob($directory."web/users/*.*");
	foreach ($pages as $page){ $row[$page] = $page; }
	$pages = glob($directory."web/users/admin/*.*");
	foreach ($pages as $page){ $row[$page] = $page; }
	$pages = glob($directory."web/users/client/*.*");
	foreach ($pages as $page){ $row[$page] = $page; }
	$pages = glob($directory."web/users/member/*.*");
	foreach ($pages as $page){ $row[$page] = $page; }

	foreach($row as $data){
		$page_url = str_replace('.php', '', $data); 
		$page_url = str_replace('.html', '', $page_url); 
		$page_url = str_replace('.htm', '', $page_url); 
		$page_url = str_replace('web/', '', $page_url); 
		$page_url = str_replace('pages/', '', $page_url); 
		$page_url = str_replace('users/', '', $page_url);
		$page_url = str_replace('admin/', '', $page_url);
		$page_url = str_replace('client/', '', $page_url);
		$page_url = str_replace('member/', '', $page_url);
		$RE[$page_url] = $page_url;
	}
	return $RE;
}

//Destroys a session as part of logout
function destroySession($name)
{
	if(isset($_SESSION[$name]))
	{
		$_SESSION[$name] = NULL;
		unset($_SESSION[$name]);
	}
}

//Generate a unique code
function getUniqueCode($length = "")
{	
	$code = md5(uniqid(rand(), true));
	if ($length != "") return substr($code, 0, $length);
	else return $code;
}

//Generate an activation key
function generateActivationToken($gen = null)
{
	do
	{
		$gen = md5(uniqid(mt_rand(), false));
	}
	while(validateActivationToken($gen));
	return $gen;
}

//@ Thanks to - http://phpsec.org
function generateHash($plainText, $salt = null)
{
	if ($salt === null)
	{
		$salt = substr(md5(uniqid(rand(), true)), 0, 25);
	}
	else
	{
		$salt = substr($salt, 0, 25);
	}
	
	return $salt . sha1($salt . $plainText);
}

//Checks if an email is valid
function isValidEmail($email)
{
	return preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",trim($email));
}

//Inputs language strings from selected language.
function lang($key,$markers = NULL)
{
	global $lang;
	if($markers == NULL)
	{
		$str = $lang[$key];
	}
	else
	{
		//Replace any dyamic markers
		$str = $lang[$key];
		$iteration = 1;
		foreach($markers as $marker)
		{
			$str = str_replace("%m".$iteration."%",$marker,$str);
			$iteration++;
		}
	}
	//Ensure we have something to return
	if($str == "")
	{
		return ("No language key found");
	}
	else
	{
		return $str;
	}
}

//Checks if a string is within a min and max length
function minMaxRange($min, $max, $what)
{
	if(strlen(trim($what)) < $min)
		return true;
	else if(strlen(trim($what)) > $max)
		return true;
	else
	return false;
}

//Replaces hooks with specified text
function replaceDefaultHook($str)
{
	global $default_hooks,$default_replace;	
	return (str_replace($default_hooks,$default_replace,$str));
}

//Displays error and success messages
function resultBlock($errors, $successes){
	if(count($errors) > 0)
	{
		$RE = "<div class='alert'><span class='closebtn'>&times;</span><strong>Error !</strong> ";
		foreach($errors as $error) { $RE = $RE."<br>* ".$error." "; }
		$RE = $RE."</div>";
		return $RE;
	} 
	elseif (count($successes) > 0)
	{
		$RE = "<div class='alert success'><span class='closebtn'>&times;</span><strong>Success !</strong> ";
		foreach($successes as $success) { $RE = $RE."<br>* ".$success." "; }
		$RE = $RE."</div>";
		return $RE;
	}
	else{ return ""; }
}

//Completely sanitizes text
function sanitize($str)
{
	return strtolower(strip_tags(trim(($str))));
}

//Functions that interact mainly with .users table
//------------------------------------------------------------------------------

//Delete a defined array of users
function deleteUsers($users) {
	global $_SQL,$_PREFIX; 
	$i = 0;
	$stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."users 
		WHERE id = ?");
	$stmt2 = $_SQL->prepare("DELETE FROM ".$_PREFIX."user_permission_matches 
		WHERE user_id = ?");
	foreach($users as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
		$i++;
	}
	$stmt->close();
	$stmt2->close();
	return $i;
}

//Check if a display name exists in the DB
function contactExists($displayname)
{
	global $_SQL, $_PREFIX;
	$stmt = $_SQL->prepare("SELECT active FROM ".$_PREFIX."users WHERE contact = ? LIMIT 1");
	$stmt->bind_param("s", $displayname);	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) { return true; }
	else { return false;	 }
	$stmt->close();
}

//Check if an email exists in the DB
function emailExists($email)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT active FROM ".$_PREFIX."users WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", $email);	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) { return true; }
	else { return false; }
	$stmt->close();
}

//Check if a user name and email belong to the same user
function emailUsernameLinked($email,$username)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT active
		FROM ".$_PREFIX."users
		WHERE user_name = ?
		AND
		email = ?
		LIMIT 1
		");
	$stmt->bind_param("ss", $username, $email);	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
	$stmt->close();
}

//Retrieve information for all users
function fetchAllUsers()
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT 
		id,
		user_name,
		display_name,
		password,
		email,
		activation_token,
		last_activation_request,
		lost_password_request,
		active,
		title,
		sign_up_stamp,
		last_sign_in_stamp
		FROM ".$_PREFIX."users");
	$stmt->execute();
	$stmt->bind_result($id, $user, $display, $password, $email, $token, $activationRequest, $passwordRequest, $active, $title, $signUp, $signIn);
	
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'user_name' => $user, 'display_name' => $display, 'password' => $password, 'email' => $email, 'activation_token' => $token, 'last_activation_request' => $activationRequest, 'lost_password_request' => $passwordRequest, 'active' => $active, 'title' => $title, 'sign_up_stamp' => $signUp, 'last_sign_in_stamp' => $signIn);
	}
	$stmt->close();
	return ($row);
}


function fetchUserDetails($username=NULL, $token=NULL, $id=NULL)
{
	global $_SQL,$_PREFIX; 
	if($username!=NULL) 
	{  
		$stmt = $_SQL->prepare("SELECT 
			id, username, contact, password,
			first_name, last_name, email,
			activation_token, last_activation_request, lost_password_request,
			active, title, sign_up_stamp, last_sign_in_stamp
			FROM ".$_PREFIX."users
			WHERE
			username = ?
			LIMIT 1");
		$stmt->bind_param("s", $username);
	}
	elseif($id!=NULL)
	{
		$stmt = $_SQL->prepare("SELECT 
			id, username, contact, password,
			first_name, last_name, email,
			activation_token, last_activation_request, lost_password_request,
			active, title, sign_up_stamp, last_sign_in_stamp
			FROM ".$_PREFIX."users
			WHERE
			id = ?
			LIMIT 1");
		$stmt->bind_param("i", $id);
	}
	else
	{
		$stmt = $_SQL->prepare("SELECT 
			id, username, contact, password,
			first_name, last_name, email,
			activation_token, last_activation_request, lost_password_request,
			active, title, sign_up_stamp, last_sign_in_stamp
			FROM ".$_PREFIX."users
			WHERE
			activation_token = ?
			LIMIT 1");
		$stmt->bind_param("s", $token);
	}
	$stmt->execute();
	$stmt->bind_result($id, $user, $contact, $password, $first_name, $last_name, $email, $token, $activationRequest, $passwordRequest, $active, $title, $signUp, $signIn);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'username' => $user, 'contact' => $contact, 'password' => $password, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'activation_token' => $token, 'last_activation_request' => $activationRequest, 'lost_password_request' => $passwordRequest, 'active' => $active, 'title' => $title, 'sign_up_stamp' => $signUp, 'last_sign_in_stamp' => $signIn);
	}
	$stmt->close();
	return ($row);
}

//Toggle if lost password request flag on or off
function flagLostPasswordRequest($username,$value)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
		SET lost_password_request = ?
		WHERE
		user_name = ?
		LIMIT 1
		");
	$stmt->bind_param("ss", $value, $username);
	return $stmt->execute();
	$stmt->close();
}

//Check if a user is logged in
function isUserLoggedIn()
{
	global $loggedInUser, $_SQL, $_PREFIX;
	$stmt = $_SQL->prepare("SELECT  id, password
		FROM ".$_PREFIX."users WHERE id = ? AND  password = ?  AND active = 1 LIMIT 1");
	$stmt->bind_param("is", $loggedInUser->user_id, $loggedInUser->hash_pw);	
	$stmt->execute();
	$stmt->store_result();
	if($loggedInUser == NULL) { return false; }
	else
	{
		if ($stmt->num_rows > 0) { return true; }
		else { destroySession("GroceryShopUserSession"); return false; }
	}
	$stmt->close();
}

//Change a user from inactive to active
function setUserActive($token)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
		SET active = 1
		WHERE
		activation_token = ?
		LIMIT 1");
	$stmt->bind_param("s", $token);
	return $stmt->execute();
	$stmt->close();	
}

//Change a user's display name
function updateDisplayName($id, $display)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
		SET display_name = ?
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("si", $display, $id);
	return $stmt->execute();
	$stmt->close();	
}

//Update a user's email
function updateEmail($id, $email)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
		SET 
		email = ?
		WHERE
		id = ?");
	$stmt->bind_param("si", $email, $id);
	return $stmt->execute();
	$stmt->close();	
}

//Input new activation token, and update the time of the most recent activation request
function updateLastActivationRequest($new_activation_token,$username,$email)
{
	global $_SQL,$_PREFIX; 	
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
		SET activation_token = ?,
		last_activation_request = '".time()."'
		WHERE email = ? AND user_name = ?");
	$stmt->bind_param("sss", $new_activation_token, $email, $username);
	return $stmt->execute();
	$stmt->close();
}

//Generate a random password, and new token
function updatePasswordFromToken($pass,$token)
{
	global $_SQL,$_PREFIX;
	$new_activation_token = generateActivationToken();
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
		SET password = ?,
		activation_token = ?
		WHERE
		activation_token = ?");
	$stmt->bind_param("sss", $pass, $new_activation_token, $token);
	return $stmt->execute();
	$stmt->close();	
}

//Update a user's title
function updateTitle($id, $title)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
		SET 
		title = ?
		WHERE
		id = ?");
	$stmt->bind_param("si", $title, $id);
	return $stmt->execute();
	$stmt->close();	
}

//Check if a user ID exists in the DB
function userIdExists($id)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT active
		FROM ".$_PREFIX."users
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
	$stmt->close();
}

//Checks if a username exists in the DB
function usernameExists($username)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT active FROM ".$_PREFIX."users WHERE username = ? LIMIT 1");
	$stmt->bind_param("s", $username);	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) { return true; }
	else { return false; }
	$stmt->close();
}


function validateActivationToken($token, $lostpass=NULL)
{
	global $_SQL,$_PREFIX;
	if($lostpass == NULL) 
	{ $stmt = $_SQL->prepare("SELECT active FROM ".$_PREFIX."users WHERE active = 0 AND activation_token = ? LIMIT 1"); }
	else 
	{ $stmt = $_SQL->prepare("SELECT active FROM ".$_PREFIX."users WHERE active = 1 AND activation_token = ? AND lost_password_request = 1  LIMIT 1"); }
	$stmt->bind_param("s", $token);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) { return true; }
	else { return false; }
	$stmt->close();
}

//Functions that interact mainly with .permissions table
//------------------------------------------------------------------------------

//Create a permission level in DB
function createPermission($permission) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."permissions (
		name
		)
		VALUES (
		?
		)");
	$stmt->bind_param("s", $permission);
	return $stmt->execute();
	$stmt->close();
}

//Delete a permission level from the DB
function deletePermission($permission) {
	global $_SQL,$_PREFIX; 
	$i = 0;
	$stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."permissions 
		WHERE id = ?");
	$stmt2 = $_SQL->prepare("DELETE FROM ".$_PREFIX."user_permission_matches 
		WHERE permission_id = ?");
	$stmt3 = $_SQL->prepare("DELETE FROM ".$_PREFIX."permission_page_matches 
		WHERE permission_id = ?");
	foreach($permission as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
		$stmt3->bind_param("i", $id);
		$stmt3->execute();
		$i++;
	}
	$stmt->close();
	$stmt2->close();
	$stmt3->close();
	return $i;
}

//Retrieve information for all permission levels
function fetchAllPermissions()
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT 
		id,
		name
		FROM ".$_PREFIX."permissions");
	$stmt->execute();
	$stmt->bind_result($id, $name);
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'name' => $name);
	}
	$stmt->close();
	return ($row);
}

//Retrieve information for a single permission level
function fetchPermissionDetails($id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT 
		id,
		name
		FROM ".$_PREFIX."permissions
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->bind_result($id, $name);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'name' => $name);
	}
	$stmt->close();
	return ($row);
}

//Check if a permission level ID exists in the DB
function permissionIdExists($id)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT id
		FROM ".$_PREFIX."permissions
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();
	
	if ($stmt->num_rows > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
	$stmt->close();
}

//Check if a permission level name exists in the DB
function permissionNameExists($permission)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT id
		FROM ".$_PREFIX."permissions
		WHERE
		name = ?
		LIMIT 1");
	$stmt->bind_param("s", $permission);	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
	$stmt->close();
}

//Change a permission level's name
function updatePermissionName($id, $name)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."permissions
		SET name = ?
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("si", $name, $id);
	return $stmt->execute();
	$stmt->close();	
}

//Functions that interact mainly with .user_permission_matches table
//------------------------------------------------------------------------------

//Match permission level(s) with user(s)
function addPermission($permission, $user) {
	global $_SQL,$_PREFIX; 
	$i = 0;
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."user_permission_matches (
		permission_id,
		user_id
		)
		VALUES (
		?,
		?
		)");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $user);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($user)){
		foreach($user as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Retrieve information for all user/permission level matches
function fetchAllMatches()
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT 
		id,
		user_id,
		permission_id
		FROM ".$_PREFIX."user_permission_matches");
	$stmt->execute();
	$stmt->bind_result($id, $user, $permission);
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'user_id' => $user, 'permission_id' => $permission);
	}
	$stmt->close();
	return ($row);	
}

//Retrieve list of permission levels a user has
function fetchUserPermissions($user_id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT
		id,
		permission_id
		FROM ".$_PREFIX."user_permission_matches
		WHERE user_id = ?
		");
	$stmt->bind_param("i", $user_id);	
	$stmt->execute();
	$stmt->bind_result($id, $permission);
	while ($stmt->fetch()){
		$row[$permission] = array('id' => $id, 'permission_id' => $permission);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Retrieve list of users who have a permission level
function fetchPermissionUsers($permission_id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT id, user_id
		FROM ".$_PREFIX."user_permission_matches
		WHERE permission_id = ?
		");
	$stmt->bind_param("i", $permission_id);	
	$stmt->execute();
	$stmt->bind_result($id, $user);
	while ($stmt->fetch()){
		$row[$user] = array('id' => $id, 'user_id' => $user);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Unmatch permission level(s) from user(s)
function removePermission($permission, $user) {
	global $_SQL,$_PREFIX; 
	$i = 0;
	$stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."user_permission_matches 
		WHERE permission_id = ?
		AND user_id =?");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $user);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($user)){
		foreach($user as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Functions that interact mainly with .configuration table
//------------------------------------------------------------------------------

//Update configuration table
function updateConfig($id, $value)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."configuration
		SET 
		value = ?
		WHERE
		id = ?");
	foreach ($id as $cfg){
		$stmt->bind_param("si", $value[$cfg], $cfg);
		return $stmt->execute();
	}
	$stmt->close();	
}

//Functions that interact mainly with .pages table
//------------------------------------------------------------------------------

//Add a page to the DB
function createPages($pages) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."pages (
		page
		)
		VALUES (
		?
		)");
	foreach($pages as $page){
		$stmt->bind_param("s", $page);
		$stmt->execute();
	}
	$stmt->close();
}

//Delete a page from the DB
function deletePages($pages) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."pages 
		WHERE id = ?");
	$stmt2 = $_SQL->prepare("DELETE FROM ".$_PREFIX."permission_page_matches 
		WHERE page_id = ?");
	foreach($pages as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
	}
	$stmt->close();
	$stmt2->close();
}

//Fetch information on all pages
function fetchAllPages()
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT 
		id,
		page,
		private
		FROM ".$_PREFIX."pages");
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$row[$page] = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Fetch information for a specific page
function fetchPageDetails($id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT 
		id,
		page,
		private
		FROM ".$_PREFIX."pages
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	return ($row);
}

//Check if a page ID exists
function pageIdExists($id)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT private
		FROM ".$_PREFIX."pages
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();	
	if ($stmt->num_rows > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
	$stmt->close();
}

//Toggle private/public setting of a page
function updatePrivate($id, $private)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."pages
		SET 
		private = ?
		WHERE
		id = ?");
	$stmt->bind_param("ii", $private, $id);
	return $stmt->execute();
	$stmt->close();	
}

//Functions that interact mainly with .permission_page_matches table
//------------------------------------------------------------------------------

//Match permission level(s) with page(s)
function addPage($page, $permission) {
	global $_SQL,$_PREFIX; 
	$i = 0;
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."permission_page_matches (
		permission_id,
		page_id
		)
		VALUES (
		?,
		?
		)");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $page);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($page)){
		foreach($page as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $page);
		$stmt->execute();
		$i++;
	}
		$stmt->close();
	return $i;
}

//Retrieve list of permission levels that can access a page
function fetchPagePermissions($page_id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT
		id,
		permission_id
		FROM ".$_PREFIX."permission_page_matches
		WHERE page_id = ?
		");
	$stmt->bind_param("i", $page_id);	
	$stmt->execute();
	$stmt->bind_result($id, $permission);
	while ($stmt->fetch()){
		$row[$permission] = array('id' => $id, 'permission_id' => $permission);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Retrieve list of pages that a permission level can access
function fetchPermissionPages($permission_id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT
		id,
		page_id
		FROM ".$_PREFIX."permission_page_matches
		WHERE permission_id = ?
		");
	$stmt->bind_param("i", $permission_id);	
	$stmt->execute();
	$stmt->bind_result($id, $page);
	while ($stmt->fetch()){
		$row[$page] = array('id' => $id, 'permission_id' => $page);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Unmatched permission and page
function removePage($page, $permission) {
	global $_SQL,$_PREFIX; 
	$i = 0;
	$stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."permission_page_matches 
		WHERE page_id = ?
		AND permission_id =?");
	if (is_array($page)){
		foreach($page as $id){
			$stmt->bind_param("ii", $id, $permission);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $page, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Check if a user has access to a page
function securePage($uri){
	//Separate document name from uri
	$tokens = explode('/', $uri);
	$page = $tokens[sizeof($tokens)-1];
	global $_DOMAIN, $_SQL, $_PREFIX, $loggedInUser;
	//retrieve page details
	$stmt = $_SQL->prepare("SELECT id, page, private FROM ".$_PREFIX."pages WHERE page = ? LIMIT 1");
	$stmt->bind_param("s", $page);
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){ $pageDetails = array('id' => $id, 'page' => $page, 'private' => $private); }
	$stmt->close();
	//If page does not exist in DB, allow access
	if (empty($pageDetails)){ return true; }
	//If page is public, allow access
	elseif ($pageDetails['private'] == 0) { return true; }
	//If user is not logged in, deny access
	elseif(!isUserLoggedIn()) 
	{
		header("Location: ".$_DOMAIN."login/index.php?comment=unauthorized ");
		return false;
	}
	else {
		//Retrieve list of permission levels with access to page
		$stmt = $_SQL->prepare("SELECT permission_id FROM ".$_PREFIX."permission_page_matches WHERE page_id = ? ");
		$stmt->bind_param("i", $pageDetails['id']);	
		$stmt->execute();
		$stmt->bind_result($permission);
		while ($stmt->fetch()){ $pagePermissions[] = $permission; }
		$stmt->close();
		//Check if user's permission levels allow access to page
		if ($loggedInUser->checkPermission($pagePermissions)){ return true; }
		else {
			header("Location: ".$_DOMAIN."dashboard");
			return false;	
		}
	}
}











//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//Functions that interact mainly with .users table
//------------------------------------------------------------------------------

//Delete a defined array of users
function deleteUserAccommodations($id) {
	global $_SQL,$_PREFIX; 
	$i = 0;
	$comments_stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."accommodation_comments WHERE accommodation_id = ?");
	$ratings_stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."accommodation_ratings WHERE accommodation_id = ?");
	$services_stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."accommodation_services WHERE accommodation_id = ?");
	$accommodation_stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."accommodation WHERE id = ?");

	foreach($users as $id){
		$comments_stmt->bind_param("i", $id);
		$comments_stmt->execute();
		$ratings_stmt->bind_param("i", $id);
		$ratings_stmt->execute();
		$services_stmt->bind_param("i", $id);
		$services_stmt->execute();
		$accommodation_stmt->bind_param("i", $id);
		$accommodation_stmt->execute();
		$i++;
	}
	$comments_stmt->close();
	$ratings_stmt->close();
	$services_stmt->close();
	$accommodation_stmt->close();
	return $i;
}

//Retrieve information for all users
function fetchAllUserAccommodations($id ="")
{
	global $_SQL,$_PREFIX; 
	if($id==""){
		$stmt = $_SQL->prepare("SELECT 
			ACC.`id`, 
			ACC.`user_id`,
			USR.`user_name`, 
			USR.`display_name`, 
			USR.`email`, 
			ACC.`name`, 
			ACC.`quantity`, 
			ACC.`duration_price`, 
			ACC.`duration_count`, 
			ACC.`duration_type`, 
			ACC.`size`, 
			ACC.`capacity`, 
			ACC.`address`, 
			ACC.`longitude`, 
			ACC.`latitude`, 
			ACC.`date_time` 
			FROM ".$_PREFIX."accommodation AS ACC,  ".$_PREFIX."users AS USR  
			WHERE ACC.user_id = USR.id ");
	}else{
		$stmt = $_SQL->prepare("SELECT 
			ACC.`id`, 
			ACC.`user_id`,
			USR.`user_name`, 
			USR.`display_name`, 
			USR.`email`, 
			ACC.`name`, 
			ACC.`quantity`, 
			ACC.`duration_price`, 
			ACC.`duration_count`, 
			ACC.`duration_type`, 
			ACC.`size`, 
			ACC.`capacity`, 
			ACC.`address`, 
			ACC.`longitude`, 
			ACC.`latitude`, 
			ACC.`date_time` 
			FROM ".$_PREFIX."accommodation AS ACC,  ".$_PREFIX."users AS USR  
			WHERE ACC.user_id = USR.id AND `user_id` = '".$id."' ");
	}
	$stmt->execute();
	$stmt->bind_result($id, $uid, $user_name, $display_name, $email, $name, $quantity, $duration_price, $duration_count, $duration_type, $size, $capacity, $address, $longitude, $latitude, $date_time);
	while ($stmt->fetch()){
		$row[] = array('id'=>$id, 'user_id'=>$uid, 'user_name'=>$user_name, 'display_name'=>$display_name, 'email'=>$email, 'name'=>$name, 'quantity'=>$quantity, 'duration_price'=>$duration_price, 'duration_count'=>$duration_count, 'duration_type'=>$duration_type, 'size'=>$size, 'capacity'=>$capacity, 'address'=>$address, 'longitude'=>$longitude, 'latitude'=>$latitude, 'date_time'=>$date_time);
	}
	$stmt->close();
	if(!empty($row)){ return ($row); }
	else{ return null; }
}


//Retrieve information for all users
function fetchAccommodationData($uid ="", $aid ="")
{
	global $_SQL,$_PREFIX; 
	if($uid==""){ return null; }
	else{ 
		$stmt = $_SQL->prepare("SELECT 
			`id`, 
			`user_id`, 
			`name`, 
			`quantity`, 
			`duration_price`, 
			`duration_count`, 
			`duration_type`, 
			`size`, 
			`capacity`, 
			`address`, 
			`longitude`, 
			`latitude`, 
			`date_time` 
			FROM ".$_PREFIX."accommodation 
			WHERE `id`= ".$aid." AND `user_id`= ".$uid." ");
	

		$stmt->execute();
		$stmt->bind_result($id, $uid, $name, $quantity, $duration_price, $duration_count, $duration_type, $size, $capacity, $address, $longitude, $latitude, $date_time);
		while ($stmt->fetch()){
			$row[] = array('id'=>$id, 'user_id'=>$uid, 'name'=>$name, 'quantity'=>$quantity, 'duration_price'=>$duration_price, 'duration_count'=>$duration_count, 'duration_type'=>$duration_type, 'size'=>$size, 'capacity'=>$capacity, 'address'=>$address, 'longitude'=>$longitude, 'latitude'=>$latitude, 'date_time'=>$date_time);
		}
		$stmt->close();
		if(!empty($row)){ return ($row); }
		else{ return null; }
	}
}


//Retrieve information for all users
function fetchAccommodationImageData($id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT 
		`id`, 
		`acc_id`, 
		`url`, 
		`name`, 
		`date_time`
		FROM ".$_PREFIX."accommodation_image 
		WHERE acc_id = '".$id."' ");
	$stmt->execute();
	$stmt->bind_result($id, $aid, $url, $name, $date_time);
	while ($stmt->fetch()){
		$row[] = array('id'=>$id, 'acc_id'=>$aid, 'url'=>$url, 'name'=>$name, 'date_time'=>$date_time);
	}
	$stmt->close();
	if(!empty($row)){ return ($row); }
	else{ return null; }
}

//Delete a defined array of users
function deleteAccommodationImages($images) {
	global $_SQL, $_PREFIX; 
	$i = 0;
	$stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."accommodation_image WHERE id = ?");
	foreach($images as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}



function findImageType($PATH)
{
	$PATH = strtoupper($PATH);
	if(!preg_match("/\.(PNG|JPG|GIF|JPEG)$/",$PATH, $RE)) return "";
	return $RE;
}


function uploadNewAccommodationImages($id, $url, $name) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."accommodation_image ( `acc_id`, `url`, `name` )
		VALUES ( ?, ?, ? )");
	$stmt->bind_param("sss", $id, $url, $name);
	return $stmt->execute();
	$stmt->close();
}




//Create a permission level in DB
function createNewAccommodation($Id, $Accommodation, $Address) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."accommodation ( `user_id`, `name`, `address` )
		VALUES ( ?, ?, ? )");
	$stmt->bind_param("iss", $Id, $Accommodation, $Address);
	return $stmt->execute();
	$stmt->close();
}


function fetchServices()
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT  `id`, `category`, `services` 
		FROM ".$_PREFIX."services ");
	$stmt->execute();
	$stmt->bind_result($id, $category, $services);
	while ($stmt->fetch()){
		$row[] = array('id'=>$id, 'category'=>$category, 'services'=>$services );
	}
	$stmt->close();
	if(!empty($row)){ return ($row); }
	else{ return null; }
}



function fetchAccommodationServices($id)
{
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("SELECT SER.`id`, SER.`category`, SER.`services` 
								FROM 
									".$_PREFIX."accommodation_services AS ACS, 
									".$_PREFIX."services AS SER, 
									".$_PREFIX."accommodation AS ACC 
								WHERE 
									ACS.`accommodation_id` = ACC.`id` 
									AND ACS.`services_id` = SER.`id` 
									AND ACC.`id` = ".$id);
	$stmt->execute();
	$stmt->bind_result($id, $category, $services);
	while ($stmt->fetch()){
		$row[] = array('id'=>$id, 'category'=>$category, 'services'=>$services );
	}
	$stmt->close();
	if(!empty($row)){ return ($row); }
	else{ return null; }
}


function createAccommodationServices($aid, $sid) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."accommodation_services 
		(`accommodation_id`, `services_id`) VALUES ( ?, ? )");
	$stmt->bind_param("ss", $aid, $sid);
	return $stmt->execute();
	$stmt->close();
}

?>
