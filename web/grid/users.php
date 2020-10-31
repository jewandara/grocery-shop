<?php

function items($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `username`, `contact`, `first_name`, `last_name`, `email`, `title`, `active` 
    	FROM ".$_PREFIX."users WHERE ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $id, $username, $contact, $first_name, $last_name, $email, $title, $active );
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'username'=>$username, 'contact'=>$contact, 'first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 
				'title'=>$title, 'active'=>$active );
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


if( ((!empty($_GET)) or (!empty($_GET["search"]))) and ($_GET["search"]!="all") ){  $_WHERE = " title LIKE '%".$_GET["search"]."%' "; } 
else{ $_WHERE = " 1=1 "; }


if(!empty($_REQUEST['search']['value']) ) {
	$_WHERE.=" AND ( id LIKE '%".$_REQUEST['search']['value']."%' ";
	$_WHERE.=" OR username LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR contact LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR first_name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR last_name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR email LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR title LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR active LIKE '%".$_REQUEST['search']['value']."%' ) ";
}
$_COLUMNS = array(
	0 => 'id', 
	1 => 'title',
	2 => 'username', 
	3 => 'contact', 
	4 => 'name',
	5 => 'email', 
	6 => 'active', 
	7 => 'link'
);
$_ORDER = " ORDER BY ".$_COLUMNS[$_REQUEST['order'][0]['column']]." ".$_REQUEST['order'][0]['dir']." ";
$_LIMIT = " LIMIT ".$_REQUEST['start']." , ".$_REQUEST['length']." ";


$_MATCH[][] = array();
$_DATA = items($_WHERE, $_ORDER, $_LIMIT);
$_COUNT = numberCount($_WHERE);




$i = 0;

if($_COUNT == 0){
	$_MATCH[0] = array( 
		"DT_RowId"=>"row_1", 
		"title"=>"No Data Found", 
		"username"=>"No Data Found", 
		"contact"=>"No Data Found",
		"name"=>"No Data Found", 
		"email"=>"No Data Found", 
		"active"=>"No Data Found", 
		"link"=>"No Data Found"
	);
	$json_data = array(
		"draw" => intval( $_REQUEST['draw'] ), 
		"recordsTotal" => intval(0), 
		"recordsFiltered" => intval(0), 
		"data" => $_MATCH 
	);
}
else {
	foreach ($_DATA as $dt) {
		if($dt["title"]=='Administrator'){ $title = "<span class='label info'>Administrator</span>";}
		else if($dt["title"]=='Manager'){ $title = "<span class='label warning'>Manager</span>";}
		else if($dt["title"]=='User'){ $title = "<span class='label success'>User</span>";}
		else{ $title = "<span class='label danger'>Other</span>";}

		if(boolval($dt["active"])){ $active = "<span class='label success'>Active</span>";}
		else{ $active = "<span class='label danger'>Inactive</span>";}

		$_MATCH[$i] = array( 
			"DT_RowId"=>"row_".(string)($i+1), 
			"title"=>(string)$title, 
			"username"=>(string)$dt["username"], 
			"contact"=>(string)$dt["contact"],
			"name"=>(string)$dt["first_name"]." ".(string)$dt["last_name"],
			"email"=>(string)$dt["email"],
			"active"=>(string)$active,
			"link"=>"<button onclick='updateUser(".(string)$dt["id"].")' style='padding-left:4px;padding-right:4px;'><i class='fa fa-pencil-square-o'></i></button>"
		);
		$i += 1;
	}
	$json_data = array(
		"draw"            => intval( $_REQUEST['draw'] ),
		"recordsTotal"    => intval( $_COUNT ),
		"recordsFiltered" => intval( $_COUNT ),
		"data"            => $_MATCH 
	);
}


echo json_encode($json_data);


?>
