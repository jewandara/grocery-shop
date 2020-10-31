<?php

function orders($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `cust_id`, `method`, `status`, `amount`, `discount`, `balance`, `insert_stamp`, `delivery_stamp`, `paid_stamp`
    	FROM ".$_PREFIX."orders WHERE ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
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


if(empty($_JSON["id"])){ $_WHERE = " 1=1 "; }
else{ $_WHERE = " id=".strval($_JSON["id"]); }

if(empty($_JSON["searchBy"])){ $_WHERE.= " "; }
else{ 
	$_WHERE.=" AND ( id LIKE '%".strval($_JSON["searchBy"])."%' ";
	$_WHERE.=" OR cust_id LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR method LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR status LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR amount LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR discount LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR balance LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR insert_stamp LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR delivery_stamp LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR paid_stamp LIKE '%".strval($_JSON["searchBy"])."%' ) ";
}

if(empty($_JSON["orderBy"])){ $_ORDER = " "; }
else{ $_ORDER = " ORDER BY ".strval($_JSON["orderBy"]); }

if( (empty($_JSON["limitStart"])) or (empty($_JSON["limitLength"])) ){ $_LIMIT = " "; }
else{ $_LIMIT = " LIMIT  BY ".strval($_JSON["limitStart"]).", ".strval($_JSON["limitLength"])." "; }


$_CONTENT = new stdClass();
$_CONTENT->count = numberCount($_WHERE);
$_CONTENT->data = orders($_WHERE, $_ORDER, $_LIMIT);

$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = $_CONTENT;

echo json_encode($_RESULT);

?>
