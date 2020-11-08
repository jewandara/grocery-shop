<?php

function orders($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT gs_orders.id, gs_orders.cust_id, gs_orders.method, gs_orders.status, gs_orders.amount, gs_orders.discount, gs_orders.balance, gs_customers.first_name, gs_customers.last_name, gs_customers.contact, gs_customers.email, gs_customers.address, gs_customers.longitude, gs_customers.latitude 
    	FROM ".$_PREFIX."orders, ".$_PREFIX."customers WHERE (gs_orders.cust_id = gs_customers.id) AND ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $id, $cust_id, $method, $status, $amount, $discount, $balance, $first_name, $last_name, $contact, $email, $address, $longitude, $latitude );
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'cust_id'=>$cust_id, 'method'=>$method, 'status'=>$status, 'amount'=>$amount, 'discount'=>$discount, 'balance'=>$balance, 'first_name'=>$first_name, 'last_name'=>$last_name, 'contact'=>$contact, 'email'=>$email, 'address'=>$address, 'longitude'=>$longitude, 'latitude'=>$latitude );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function numberCount($WHERE)
{
    global $_SQL, $_PREFIX; 
    $Q = "SELECT COUNT(gs_orders.id) FROM ".$_PREFIX."orders, ".$_PREFIX."customers WHERE ".$WHERE;
	$result = mysqli_query($_SQL, $Q);
	return (mysqli_fetch_array($result))[0];
}

if( ((!empty($_GET)) or (!empty($_GET["search"]))) and ($_GET["search"]!="all") ){  $_WHERE = " gs_orders.status = '".$_GET["search"]."' "; } 
else{ $_WHERE = " 1=1 "; }

if(!empty($_REQUEST['search']['value']) ) {
	$_WHERE.=" AND ( gs_orders.id LIKE '%".$_REQUEST['search']['value']."%' ";
	$_WHERE.=" OR gs_orders.cust_id LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_orders.method LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_orders.status LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_orders.amount LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_orders.discount LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_orders.balance LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_customers.first_name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_customers.last_name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_customers.contact LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_customers.email LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR gs_customers.address LIKE '%".$_REQUEST['search']['value']."%' ) ";
}
$_COLUMNS = array(
	0 => 'cust_id', 
	1 => 'id', 
	2 => 'status', 
	3 => 'method',
	4 => 'first_name',
	5 => 'address', 
	6 => 'balance',
	7 => 'id'
);
$_ORDER = " ORDER BY ".$_COLUMNS[$_REQUEST['order'][0]['column']]." ".$_REQUEST['order'][0]['dir']." ";
$_LIMIT = " LIMIT ".$_REQUEST['start']." , ".$_REQUEST['length']." ";


$_MATCH[][] = array();
$_DATA = orders($_WHERE, $_ORDER, $_LIMIT);
$_COUNT = numberCount($_WHERE);



if(isUserLoggedIn()) { 
	if ($loggedInUser->checkPermission(array(3))) { $_MENU = $_MENU_MANAGER; }
	else if ($loggedInUser->checkPermission(array(2))) { $_MENU = $_MENU_ADMIN; }
	else if ($loggedInUser->checkPermission(array(1))) { $_MENU = $_MENU_USER; }

}



$i = 0;

if($_COUNT == 0){
	$_MATCH[0] = array( 
		"DT_RowId"=>"row_1", 
		"id"=>"No Data Found", 
		"status"=>"No Data Found", 
		"method"=>"No Data Found", 
		"first_name"=>"No Data Found", 
		"address"=>"No Data Found", 
		"balance"=>"No Data Found",
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
		if($dt["status"]=='PENDING'){ $status = "<span class='label danger'>PENDING</span>";}
		else if($dt["status"]=='OPEN'){ $status = "<span class='label warning'>OPEN</span>";}
		else if($dt["status"]=='DELIVERY'){ $status = "<span class='label info'>DELIVERY</span>";}
		else if($dt["status"]=='PAID'){ $status = "<span class='label success'>PAID</span>";}
		else{ $status = "<span class='label other'>OTHER</span>";}

		$_MATCH[$i] = array( 
			"DT_RowId"=>"row_".(string)($i+1), 
			"id"=>(string)$dt["id"], 
			"status"=>(string)$status, 
			"method"=>(string)$dt["method"],
			"first_name"=>(string)$dt["first_name"]." ".(string)$dt["last_name"],
			"address"=>(string)$dt["address"],
			"balance"=>"LKR ".(string)(number_format($dt["balance"], 2)),
			"link"=>"<button onclick='updateOrder(".(string)$dt["id"].")' style='padding-left:4px;padding-right:4px;'><i class='fa fa-pencil-square-o'></i></button><button onclick='viewOrderDetails(".(string)$dt["id"].")' style='margin-left:6px;padding-left:4px;padding-right:4px;'><i class='fa fa-file-text'></i></button>"
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
