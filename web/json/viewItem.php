<?php

function items($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `id`, `code`, `name`, `category`, `qty`, `unit`, `price`, `stock`, `stock_alart`, `last_update_stamp`, `insert_stamp` 
    	FROM `gs_items` WHERE ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $id, $code, $name, $category, $qty, $unit, $price, $stock, $stock_alart, $last_update_stamp, $insert_stamp );
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$id, 'code'=>$code, 'name'=>$name, 'category'=>$category, 'qty'=>$qty, 'unit'=>$unit, 
				'price'=>$price, 'stock'=>$stock, 'stock_alart'=>$stock_alart, 'last_update_stamp'=>$last_update_stamp, 'insert_stamp'=>$insert_stamp );
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




if(!empty($_JSON["id"])){ $_WHERE = " id=".strval($_JSON["id"]); }
else if(!empty($_JSON["code"])){ $_WHERE = " code='".strval($_JSON["code"])."' "; }
else if(!empty($_JSON["category"])){ $_WHERE = " category='".strval($_JSON["category"])."' "; }
else { $_WHERE = " 1=1 ";  }

if(empty($_JSON["searchBy"])){ $_WHERE.= " "; }
else{ 
	$_WHERE.=" AND ( id LIKE '%".strval($_JSON["searchBy"])."%' ";
	$_WHERE.=" OR code LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR name LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR category LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR qty LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR unit LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR price LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR stock LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR last_update_stamp LIKE '%".strval($_JSON["searchBy"])."%'  ";
	$_WHERE.=" OR insert_stamp LIKE '%".strval($_JSON["searchBy"])."%' ) ";
}

if(empty($_JSON["orderBy"])){ $_ORDER = " "; }
else{ $_ORDER = " ORDER BY ".strval($_JSON["orderBy"]); }

if( (empty($_JSON["limitStart"])) or (empty($_JSON["limitLength"])) ){ $_LIMIT = " "; }
else{ $_LIMIT = " LIMIT  BY ".strval($_JSON["limitStart"]).", ".strval($_JSON["limitLength"])." "; }


$_CONTENT = new stdClass();
$_CONTENT->count = numberCount($_WHERE);
$_CONTENT->data = items($_WHERE, $_ORDER, $_LIMIT);

$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = $_CONTENT;

echo json_encode($_RESULT);

?>
