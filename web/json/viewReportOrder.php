<?php

function orders($WHERE)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `cust_id`, `method`, `status`, `amount`, `discount`, `balance`, `insert_stamp`, `delivery_stamp`, `paid_stamp`
    	FROM ".$_PREFIX."orders WHERE ".$WHERE." ");
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

function numberCount($WHERE)
{
    global $_SQL, $_PREFIX; 
    $Q = "SELECT COUNT(`id`) FROM ".$_PREFIX."orders WHERE ".$WHERE;
	$result = mysqli_query($_SQL, $Q);
	return (mysqli_fetch_array($result))[0];
}

if(!empty($_JSON["date"])){ 
	if(!empty($_JSON["status"])){ 
		if( $_JSON["status"] == "PAID"){  $_WHERE = " status = 'PAID' AND paid_stamp LIKE '".strval($_JSON["date"])."%' "; }
		else{ $_WHERE = " status = 'DELIVERY' AND insert_stamp LIKE '".strval($_JSON["date"])."%' "; }
	}
	else{ $_WHERE = " 1 = 1 AND insert_stamp LIKE '".strval($_JSON["date"])."%' "; }

	$_CONTENT = new stdClass();
	$_CONTENT->count = numberCount($_WHERE);
	$_CONTENT->data = orders($_WHERE);
	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = $_CONTENT;
	echo json_encode($_RESULT);
}


if(!empty($_JSON["month"])){ 
	if(!empty($_JSON["status"])){ 
		if( $_JSON["status"] == "PAID"){  $_WHERE = " status = 'PAID' AND paid_stamp LIKE '".strval($_JSON["month"])."%' "; }
		else{ $_WHERE = " status = 'DELIVERY' AND insert_stamp LIKE '".strval($_JSON["month"])."%' "; }
	}
	else{ $_WHERE = " 1 = 1 AND insert_stamp LIKE '".strval($_JSON["month"])."%' "; }

	$_CONTENT = new stdClass();
	$_CONTENT->count = numberCount($_WHERE);
	$_CONTENT->data = orders($_WHERE);
	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = $_CONTENT;
	echo json_encode($_RESULT);
}
?>
