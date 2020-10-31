<?php

function orderDetail($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT gs_order_details.item_id, gs_order_details.order_id, gs_order_details.qty, gs_order_details.price, gs_items.code, gs_items.name, gs_items.category 
    	FROM ".$_PREFIX."order_details, ".$_PREFIX."items 
    	WHERE gs_order_details.item_id = gs_items.id AND ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $item_id, $order_id, $qty, $price, $code, $name, $category );
	while ($STMT->fetch()){
		$row[] = array( 'item_id'=>$item_id, 'order_id'=>$order_id, 'qty'=>$qty, 'price'=>$price, 'code'=>$code, 'name'=>$name, 'category'=>$category );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function numberCount($WHERE)
{
    global $_SQL, $_PREFIX; 
    $Q = "SELECT COUNT(`item_id`) FROM ".$_PREFIX."order_details WHERE ".$WHERE;
	$result = mysqli_query($_SQL, $Q);
	return (mysqli_fetch_array($result))[0];
}


if(empty($_JSON["id"])){ $_WHERE = " 1=1 "; }
else{ $_WHERE = " gs_order_details.order_id=".strval($_JSON["id"]); }

if(empty($_JSON["searchBy"])){ $_WHERE.= " "; }
else{ 
	$_WHERE.=" AND ( gs_order_details.item_id LIKE '%".strval($_JSON["searchBy"])."%' ";
	$_WHERE.=" OR gs_order_details.order_id LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR gs_order_details.qty LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR gs_order_details.price LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR gs_items.code LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR gs_items.name LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR gs_items.category LIKE '%".strval($_JSON["searchBy"])."%' ) ";
}

if(empty($_JSON["orderBy"])){ $_ORDER = " "; }
else{ $_ORDER = " ORDER BY ".strval($_JSON["orderBy"]); }

if( (empty($_JSON["limitStart"])) or (empty($_JSON["limitLength"])) ){ $_LIMIT = " "; }
else{ $_LIMIT = " LIMIT  BY ".strval($_JSON["limitStart"]).", ".strval($_JSON["limitLength"])." "; }


$_CONTENT = new stdClass();
$_CONTENT->count = numberCount($_WHERE);
$_CONTENT->data = orderDetail($_WHERE, $_ORDER, $_LIMIT);

$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = $_CONTENT;

echo json_encode($_RESULT);

?>
