<?php


function addCustomers() {
	global $_SQL,$_PREFIX, $_JSON; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."customers ( first_name, last_name, contact, email, address, longitude, latitude ) 
		VALUES ( ?, ?, ?, ?, ?, ?, ? )");

	$stmt->bind_param("sssssdd", strval($_JSON["first_name"]), strval($_JSON["last_name"]), strval($_JSON["contact"]), strval($_JSON["email"]), strval($_JSON["address"]), floatval($_JSON["longitude"]), floatval($_JSON["latitude"]) );
	$stmt->execute();
	$last_id = $stmt->insert_id;
	$stmt->close(); 
	return $last_id;
}

function cxEmailExists($email)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT id FROM ".$_PREFIX."customers WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", strval($email));	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) { return true; }
	else { return false; }
	$stmt->close();
}

function cxContactExists($contact)
{
	global $_SQL,$_PREFIX;
	$stmt = $_SQL->prepare("SELECT id FROM ".$_PREFIX."customers WHERE contact = ? LIMIT 1");
	$stmt->bind_param("s", strval($contact));	
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) { return true; }
	else { return false; }
	$stmt->close();
}


if(cxEmailExists($_JSON["email"])){
	$_RESULT = new stdClass();
	$_RESULT->error = true;
	$_RESULT->message = "email";
	$_RESULT->result = "There is an existing customer email address in the database.";
	echo json_encode($_RESULT);
}
else if(cxContactExists($_JSON["contact"])){
	$_RESULT = new stdClass();
	$_RESULT->error = true;
	$_RESULT->message = "contact";
	$_RESULT->result = "There is an existing customer contact number in the database.";
	echo json_encode($_RESULT);
}
else{
	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = addCustomers();
	echo json_encode($_RESULT);
}

?>
