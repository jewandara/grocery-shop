<?php

function removeOrderDetails($oid, $iid) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("DELETE FROM ".$_PREFIX."order_details WHERE `item_id` = ? AND `order_id` = ? ");
	$stmt->bind_param("ii", intval($iid), intval($oid) );
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

function viewOrderDetails($oid) {
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `item_id`, `order_id`, `qty`, `price` 
    	FROM ".$_PREFIX."order_details 
    	WHERE order_id = ".$oid." ");
	$STMT->execute();
	$STMT->bind_result( $item_id, $order_id, $qty, $price);
	while ($STMT->fetch()){
		$row[] = array( 'item_id'=>$item_id, 'order_id'=>$order_id, 'qty'=>$qty, 'price'=>$price );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
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

function viewOrders($id) {
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `cust_id`, `method`, `status`, `amount`, `discount`, `balance`, `insert_stamp`, `delivery_stamp`, `paid_stamp`
    	FROM ".$_PREFIX."orders WHERE id = ".$id." ");
	$STMT->execute();
	$STMT->bind_result( $id, $cust_id, $method, $status, $amount, $discount, $balance, $insert_stamp, $delivery_stamp, $paid_stamp);
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'cust_id'=>$cust_id, 'method'=>$method, 'status'=>$status, 'amount'=>$amount, 'discount'=>$discount, 
				'balance'=>$balance, 'insert_stamp'=>$insert_stamp, 'delivery_stamp'=>$delivery_stamp, 'paid_stamp'=>$paid_stamp);
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function updateOrderAmmount($id, $amount, $balance, $discount) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."orders SET amount=?, balance=?, discount=? WHERE id=?");
	$stmt->bind_param("iddd", intval($id), floatval($amount), floatval($balance), floatval($discount) );
	$stmt->execute();
	$stmt->close();
}

function updateOrderMethod($id, $method) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."orders SET method=? WHERE id=?");
	$stmt->bind_param("si", strval($method), intval($id) );
	$stmt->execute();
	$stmt->close();
}

function updateOrderStatus($id, $status) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."orders SET status=? WHERE id=?");
	$stmt->bind_param("si", strval($status), intval($id) );
	$stmt->execute();
	$stmt->close();
}






$TotalAmmount = 0.0;
$OrderDetails = viewOrderDetails($_JSON["order_id"]);
$Orders = viewOrders($_JSON["order_id"]);
$_ITEMS[][] = array();
$i = 0;

if(!empty($_JSON["removeitems"])){
	foreach ($_JSON["removeitems"] as $itemId) { removeOrderDetails($_JSON["order_id"], $itemId); }
}

if(!empty($_JSON["additems"])){
	foreach ($_JSON["additems"] as $item) {
		$NewItem = viewitem($item[0]);
		$ItemPerPrice = floatval($NewItem[0]["price"]) * floatval($item[1]);
		addOrderDetails($NewItem[0]["id"], $_JSON["order_id"], $item[1], $ItemPerPrice);
	}
}

foreach ($OrderDetails as $item) { 
	$TotalAmmount += floatval($item["price"]);
	$NewItem = viewitem($item["item_id"]);
	$_ITEMS[$i] = array( 
		"code" => $NewItem[0]["code"],
		"name" =>  $NewItem[0]["name"],
		"qty" => intval($item["qty"]),
		"unitprice" => array( intval($NewItem[0]["qty"]), strval($NewItem[0]["unit"]) , floatval($NewItem[0]["price"]) ),
		"totalprice" => floatval($item["price"])
	);
	$i+=1;
}

if(empty($_JSON["discount"])){ 
	$BLANCE = $TotalAmmount - floatval($Orders[0]["discount"]);
	updateOrderAmmount($_JSON["order_id"], $TotalAmmount, $BLANCE, $Orders[0]["discount"]);
}
else{ 
	$BLANCE = $TotalAmmount - floatval($_JSON["discount"]);
	updateOrderAmmount($_JSON["order_id"], $TotalAmmount, $BLANCE, $_JSON["discount"]);
}




if(!empty($_JSON["method"])){ updateOrderMethod($_JSON["order_id"], $_JSON["method"]); }
if(!empty($_JSON["status"])){ updateOrderStatus($_JSON["order_id"], $_JSON["status"]); }








$_ORDER = new stdClass();
$_ORDER->order_id = intval($_JSON["order_id"]);
$_ORDER->cust_id = intval($Orders[0]["cust_id"]);
$_ORDER->method = $Orders[0]["method"];
$_ORDER->totalAmmount = $TotalAmmount;
$_ORDER->discount = floatval($Orders[0]["discount"]);
$_ORDER->balance = $BLANCE;
$_ORDER->items = $_ITEMS;



$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = $_ORDER;
echo json_encode($_RESULT);


?>
