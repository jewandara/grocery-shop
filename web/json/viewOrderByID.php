<?php

function orders($WHERE)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `cust_id`, `method`, `status`, `amount`, `discount`, `balance`, `insert_stamp`, `delivery_stamp`, `paid_stamp`
    	FROM ".$_PREFIX."orders WHERE ".$WHERE."  LIMIT 1 ");
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

function orderDetail($WHERE)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT gs_order_details.item_id, gs_order_details.order_id, gs_order_details.qty, gs_order_details.price, gs_items.code, gs_items.name, gs_items.category 
    	FROM ".$_PREFIX."order_details, ".$_PREFIX."items 
    	WHERE gs_order_details.item_id = gs_items.id AND ".$WHERE." ");
	$STMT->execute();
	$STMT->bind_result( $item_id, $order_id, $qty, $price, $code, $name, $category );
	while ($STMT->fetch()){
		$row[] = array( 'item_id'=>$item_id, 'order_id'=>$order_id, 'qty'=>$qty, 'price'=>$price, 'code'=>$code, 'name'=>$name, 'category'=>$category );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function customer($WHERE)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `first_name`, `last_name`, `contact`, `email`, `address`, `longitude`, `latitude`, `insert_stamp` 
    	FROM ".$_PREFIX."customers WHERE ".$WHERE."  LIMIT 1 ");
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


if(!empty($_GET["id"])){ 

	$ORDER_DATA = orders(" id=".strval($_GET["id"]));

	$_ORDER = new stdClass();
	$_ORDER->data = $ORDER_DATA;

	$_ITEMS = new stdClass();
	$_ITEMS->data = orderDetail(" order_id=".strval($_GET["id"]));

	$_CUSTOMER = new stdClass();
	$_CUSTOMER->data = customer(" id=".strval($ORDER_DATA[0]["cust_id"]));

	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->order = $_ORDER;
	$_RESULT->customer = $_CUSTOMER;
	$_RESULT->items = $_ITEMS;

	echo json_encode($_RESULT);

}
?>
