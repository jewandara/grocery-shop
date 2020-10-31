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



$_WHERE = " 1=1 ";
if(!empty($_REQUEST['search']['value']) ) {
	$_WHERE.=" AND ( id LIKE '%".$_REQUEST['search']['value']."%' ";
	$_WHERE.=" OR first_name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR last_name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR contact LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR email LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR address LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR longitude LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR latitude LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR insert_stamp LIKE '%".$_REQUEST['search']['value']."%' ) ";
}
$_COLUMNS = array(
	0 => 'id', 
	1 => 'first_name', 
	2 => 'contact',
	3 => 'email',
	4 => 'address', 
	5 => 'longitude',
	6 => 'latitude'
);
$_ORDER = " ORDER BY ".$_COLUMNS[$_REQUEST['order'][0]['column']]." ".$_REQUEST['order'][0]['dir']." ";
$_LIMIT = " LIMIT ".$_REQUEST['start']." , ".$_REQUEST['length']." ";


$_MATCH[][] = array();
$_DATA = customers($_WHERE, $_ORDER, $_LIMIT);
$_COUNT = numberCount($_WHERE);
$i = 0;


if($_COUNT == 0){
	$_MATCH[0] = array( 
		"DT_RowId"=>"row_1", 
		"name"=>"No Data Found", 
		"contact"=>"No Data Found", 
		"email"=>"No Data Found", 
		"address"=>"No Data Found", 
		"gps"=>"No Data Found", 
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
		$_MATCH[$i] = array( 
			"DT_RowId"=>"row_".(string)($i+1), 
			"name"=>(string)$dt["first_name"]." ".(string)$dt["last_name"], 
			"contact"=>(string)$dt["contact"],
			"email"=>(string)$dt["email"],
			"address"=>(string)$dt["address"],
			"gps"=>"<a href='https://www.google.com/maps/dir/".(string)$dt["latitude"].",".(string)$dt["longitude"]."' target='_blank'>View Gmap</a>",
			"link"=>"<button onclick='updateCustomer(".(string)$dt["id"].")' style='padding-left:4px;padding-right:4px;'><i class='fa fa-pencil-square-o'></i></button>"
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
