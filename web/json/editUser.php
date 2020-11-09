<?php

function updateUser($username, $set) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users SET `last_sign_in_stamp`=? ".$set." WHERE username=?");
	$stmt->bind_param("is", intval(time()), strval($username) );
	$stmt->execute();
	$stmt->close();
}

function updatePermission($username, $title) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."user_permission_matches 
				SET
					permission_id=(SELECT id FROM ".$_PREFIX."permissions WHERE name =? LIMIT 1) 
				WHERE 
					user_id=(SELECT id FROM ".$_PREFIX."users WHERE username =? LIMIT 1)");
	$stmt->bind_param("ss", strval($title), strval($username));
	$stmt->execute();
	$stmt->close();
}

$_SET = "";
if(!empty($_JSON["username"])){
	if(!empty($_JSON["first_name"])){ $_SET.=", first_name = '".strval($_JSON["first_name"])."' "; }
	if(!empty($_JSON["last_name"])){ $_SET.=", last_name = '".strval($_JSON["last_name"])."' "; }
	if(!empty($_JSON["email"])){ $_SET.=", email = '".strval($_JSON["email"])."' "; }
	if(!empty($_JSON["contact"])){ $_SET.=", contact = '".strval($_JSON["contact"])."' "; }
	if(!empty($_JSON["lost_password_request"])){ $_SET.=", lost_password_request = ".strval($_JSON["lost_password_request"])." "; }
	//if(!empty($_JSON["active"])){ $_SET.=", active = ".$_JSON["active"]." "; }
	$_SET.=", active = ".$_JSON["active"]." ";
	if(!empty($_JSON["title"])){ 
		$_SET.=", title = '".strval($_JSON["title"])."' "; 
		updatePermission($_JSON["username"], $_JSON["title"]);
	}

	updateUser($_JSON["username"], $_SET);
	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = "";
	echo json_encode($_RESULT);

} else{ 
	$_RESULT = new stdClass();
	$_RESULT->error = true;
	$_RESULT->message = "error";
	$_RESULT->result = "Username can not null";
	echo json_encode($_RESULT);
}


?>
