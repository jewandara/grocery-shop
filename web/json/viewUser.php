<?php

function users($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `username`, `contact`, `first_name`, `last_name`, `email`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`
    	FROM ".$_PREFIX."users WHERE ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $id, $username, $contact, $first_name, $last_name, $email, $last_activation_request, $lost_password_request, $active, $title, $sign_up_stamp, $last_sign_in_stamp );
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'username'=>$username, 'contact'=>$contact, 'first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'last_activation_request'=>$last_activation_request, 'lost_password_request'=>$lost_password_request, 'active'=>$active, 'title'=>$title, 'sign_up_stamp'=>$sign_up_stamp, 'last_sign_in_stamp'=>$last_sign_in_stamp );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function numberCount($WHERE)
{
    global $_SQL, $_PREFIX; 
    $Q = "SELECT COUNT(`id`) FROM ".$_PREFIX."users WHERE ".$WHERE;
	$result = mysqli_query($_SQL, $Q);
	return (mysqli_fetch_array($result))[0];
}


if(empty($_JSON["id"])){ $_WHERE = " 1=1 "; }
else{ $_WHERE = " id=".strval($_JSON["id"]); }

if(empty($_JSON["searchBy"])){ $_WHERE.= " "; }
else{ 
	$_WHERE.=" AND ( id LIKE '%".strval($_JSON["searchBy"])."%' ";
	$_WHERE.=" OR username LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR contact LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR first_name LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR last_name LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR email LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR title LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR active LIKE '%".strval($_JSON["searchBy"])."%' ) ";
}

if(empty($_JSON["orderBy"])){ $_ORDER = " "; }
else{ $_ORDER = " ORDER BY ".strval($_JSON["orderBy"]); }

if( (empty($_JSON["limitStart"])) or (empty($_JSON["limitLength"])) ){ $_LIMIT = " "; }
else{ $_LIMIT = " LIMIT  BY ".strval($_JSON["limitStart"]).", ".strval($_JSON["limitLength"])." "; }


$_CONTENT = new stdClass();
$_CONTENT->count = numberCount($_WHERE);
$_CONTENT->data = users($_WHERE, $_ORDER, $_LIMIT);

$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = $_CONTENT;

echo json_encode($_RESULT);

?>
