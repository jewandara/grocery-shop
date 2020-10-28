<?php

//header("Content-Type: application/json;charset=utf-8");
require_once(dirname(__FILE__).'/core/class.define.php');
require_once(dirname(__FILE__).'/core/class.url.php');
require_once(dirname(__FILE__).'/core/class.sql.php');


function items($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `code`, `name`, `category`, `qty`, `unit`, `price`, `stock`, `last_update_stamp`, `insert_stamp` 
    	FROM `gs_items` WHERE ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $id, $code, $name, $category, $qty, $unit, $price, $stock, $last_update_stamp, $insert_stamp );
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'code'=>$code, 'name'=>$name, 'category'=>$category, 'qty'=>$qty, 'unit'=>$unit, 
				'price'=>$price, 'stock'=>$stock, 'last_update_stamp'=>$last_update_stamp, 'insert_stamp'=>$insert_stamp );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function numberCount($WHERE)
{
    global $_SQL, $_PREFIX; 
    $Q = "SELECT COUNT(`id`) FROM `gs_items` WHERE ".$WHERE;
	$result = mysqli_query($_SQL, $Q);
	return (mysqli_fetch_array($result))[0];
}



$_WHERE = " 1=1 ";
if(!empty($_REQUEST['search']['value']) ) {
	$_WHERE.=" AND ( id LIKE '%".$_REQUEST['search']['value']."%' ";
	$_WHERE.=" OR code LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR category LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR qty LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR unit LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR price LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR stock LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR last_update_stamp LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR insert_stamp LIKE '%".$_REQUEST['search']['value']."%' ) ";
}
$_COLUMNS = array(
	0 => 'id', 
	1 => 'code', 
	2 => 'name', 
	3 => 'category',
	4 => 'qty',
	5 => 'unit', 
	6 => 'price', 
	7 => 'stock', 
	8 => 'last_update_stamp',
	9 => 'insert_stamp'
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
		"code"=>"No Data Found", 
		"name"=>"No Data Found", 
		"category"=>"No Data Found", 
		"qty"=>"No Data Found", 
		"unit"=>"No Data Found", 
		"price"=>"No Data Found", 
		"stock"=>"No Data Found", 
		"last_update_stamp"=>"No Data Found", 
		"insert_stamp"=>"No Data Found"
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
			"code"=>(string)$dt["code"], 
			"name"=>(string)$dt["name"], 
			"category"=>(string)$dt["category"],
			"qty"=>(string)$dt["qty"],
			"unit"=>(string)$dt["unit"],
			"price"=>(string)$dt["price"],
			"stock"=>(string)$dt["stock"],
			"last_update_stamp"=>(string)$dt["last_update_stamp"],
			"insert_stamp"=>(string)$dt["insert_stamp"]
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












/*
$_MATCH[][] = array();
	$row = array( "DT_RowId"=>"row_1", "code"=>"CB23423434", "name"=>"HESJHVJK kj kh ", "position"=>"sdfsdf sdf sdN", "office"=>"Accountant");
	$_MATCH[0] = $row;
	$json_data = array(
		"draw" => 1, 
		"recordsTotal" => 10, 
		"recordsFiltered" => 10, 
		"data" => $_MATCH 
	);
	echo json_encode($json_data);
*/



?>
