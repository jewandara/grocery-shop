<?php


function addOrders($amount, $balance) {
	global $_SQL,$_PREFIX, $_JSON; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."orders ( cust_id, method, status, amount, discount, balance ) VALUES ( ?, ?, 'PENDING', ?, ?, ? )");
	$stmt->bind_param("isddd", intval($_JSON["cust_id"]), $_JSON["method"], floatval($amount), floatval($_JSON["discount"]), floatval($balance) );
	$stmt->execute();
	$last_id = $stmt->insert_id;
	$stmt->close(); 
	return $last_id;
}

function updateOrders($id, $amount, $balance) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."orders SET status='OPEN', amount=?, balance=? WHERE id=?");
	$stmt->bind_param("ddi", floatval($amount), floatval($balance), intval($id));
	$stmt->execute();
	$stmt->close();
}

function addOrderDetails($item_id, $order_id, $qty, $price) {
	global $_SQL,$_PREFIX, $_JSON; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."order_details (item_id, order_id, qty, price ) 
		VALUES ( ?, ?, ?, ? )");

	$stmt->bind_param("iiid", $item_id, $order_id, $qty, $price);
	$stmt->execute();
	$last_id = $stmt->insert_id;
	$stmt->close(); 
	return $last_id;
}

function viewitem($id)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `code`, `name`, `category`, `qty`, `unit`, `price`, `stock`
    	FROM ".$_PREFIX."items WHERE `id` = ".$id." ");
	$STMT->execute();
	$STMT->bind_result( $id, $code, $name, $category, $qty, $unit, $price, $stock);
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'code'=>$code, 'name'=>$name, 'category'=>$category, 'qty'=>$qty, 'unit'=>$unit, 
				'price'=>$price, 'stock'=>$stock );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function updateItemStock($id, $qty)
{
    global $_SQL, $_PREFIX; 
    $stmt = $_SQL->prepare("UPDATE ".$_PREFIX."items SET stock= (stock - ?) WHERE `id` = ? ");
	$stmt->bind_param("ii", intval($qty), intval($id) );
	$stmt->execute();
	$stmt->close();
}




$TotalAmmount = 0.0;
$OrderID = addOrders($TotalAmmount, $TotalAmmount);
$_ITEMS[][] = array();
$i = 0;

foreach ($_JSON["items"] as $item) {
	$NewItem = viewitem($item[0]);
	$ItemPerPrice = floatval($NewItem[0]["price"]) * floatval($item[1]);
	$TotalAmmount += $ItemPerPrice;
	addOrderDetails($NewItem[0]["id"], $OrderID, $item[1], $ItemPerPrice);
	/*--------------------------------*/
	$_ITEMS[$i] = array( 
		"code" => $NewItem[0]["code"],
		"name" =>  $NewItem[0]["name"],
		"qty" => intval($item[1]),
		"unitprice" => array( intval($NewItem[0]["qty"]), strval($NewItem[0]["unit"]) , floatval($NewItem[0]["price"]) ),
		"totalprice" => floatval($ItemPerPrice)
	);
	updateItemStock($item[0], $item[1]);
	$i+=1;
}

$BLANCE = $TotalAmmount - floatval($_JSON["discount"]);
updateOrders($OrderID, $TotalAmmount, $BLANCE);

$_ORDER = new stdClass();
$_ORDER->order_id = $OrderID;
$_ORDER->cust_id = intval($_JSON["cust_id"]);
$_ORDER->method = $_JSON["method"];
$_ORDER->totalAmmount = $TotalAmmount;
$_ORDER->discount = floatval($_JSON["discount"]);
$_ORDER->balance = $BLANCE;
$_ORDER->items = $_ITEMS;


$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = $_ORDER;
echo json_encode($_RESULT);


?>
