<?php

function customers($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `first_name`, `last_name`, `contact`, `email`, `address`, `longitude`, `latitude`, `insert_stamp` 
    	FROM ".$_PREFIX."customers WHERE ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $id, $first_name, $last_name, $contact, $email, $address, $longitude, $latitude, $insert_stamp);
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'first_name'=>$first_name, 'last_name'=>$last_name, 'contact'=>$contact, 'email'=>$email, 'address'=>$address, 
				'longitude'=>$longitude, 'latitude'=>$latitude, 'insert_stamp'=>$insert_stamp);
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function numberCount($WHERE)
{
    global $_SQL, $_PREFIX; 
    $Q = "SELECT COUNT(`id`) FROM ".$_PREFIX."customers WHERE ".$WHERE;
	$result = mysqli_query($_SQL, $Q);
	return (mysqli_fetch_array($result))[0];
}


if(empty($_JSON["id"])){ $_WHERE = " 1=1 "; }
else{ $_WHERE = " id=".strval($_JSON["id"]); }

if(empty($_JSON["searchBy"])){ $_WHERE.= " "; }
else{ 
	$_WHERE.=" AND ( id LIKE '%".strval($_JSON["searchBy"])."%' ";
	$_WHERE.=" OR first_name LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR last_name LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR contact LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR email LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR address LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR longitude LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR latitude LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR insert_stamp LIKE '%".strval($_JSON["searchBy"])."%' ) ";
}

if(empty($_JSON["orderBy"])){ $_ORDER = " "; }
else{ $_ORDER = " ORDER BY ".strval($_JSON["orderBy"]); }

if( (empty($_JSON["limitStart"])) or (empty($_JSON["limitLength"])) ){ $_LIMIT = " "; }
else{ $_LIMIT = " LIMIT  BY ".strval($_JSON["limitStart"]).", ".strval($_JSON["limitLength"])." "; }


$_CONTENT = new stdClass();
$_CONTENT->count = numberCount($_WHERE);
$_CONTENT->data = customers($_WHERE, $_ORDER, $_LIMIT);

$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = $_CONTENT;

echo json_encode($_RESULT);

?>
