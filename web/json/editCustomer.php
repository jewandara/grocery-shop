<?php

function updateCustomer($id, $set) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."customers SET `update_stamp`=? ".$set." WHERE id=?");
	$stmt->bind_param("ii", intval(time()), intval($id) );
	$stmt->execute();
	$stmt->close();
}
$_SET = "";
if(!empty($_JSON["cust_id"])){
	if(!empty($_JSON["first_name"])){ $_SET.=", first_name = '".strval($_JSON["first_name"])."' "; }
	if(!empty($_JSON["last_name"])){ $_SET.=", last_name = '".strval($_JSON["last_name"])."' "; }
	if(!empty($_JSON["email"])){ $_SET.=", email = '".strval($_JSON["email"])."' "; }
	if(!empty($_JSON["contact"])){ $_SET.=", contact = '".strval($_JSON["contact"])."' "; }
	if(!empty($_JSON["address"])){ $_SET.=", address = '".strval($_JSON["address"])."' "; }
	if(!empty($_JSON["latitude"])){ $_SET.=", latitude = ".strval($_JSON["latitude"])." "; }
	if(!empty($_JSON["longitude"])){ $_SET.=", longitude = ".strval($_JSON["longitude"])." "; }

	updateCustomer($_JSON["cust_id"], $_SET);
	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = "";
	echo json_encode($_RESULT);

} else{ 
	$_RESULT = new stdClass();
	$_RESULT->error = true;
	$_RESULT->message = "error";
	$_RESULT->result = "Customer id can not be null value";
	echo json_encode($_RESULT);
}


?>