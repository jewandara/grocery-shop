<?php


function addItems($data) {
	global $_SQL,$_PREFIX, $_JSON; 
	$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."items ( code, name, category, qty, unit, price, stock, stock_alart, last_update_stamp) 
		VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ? )");

	$stmt->bind_param("sssisdiii", $data, $_JSON["name"], $_JSON["category"], $_JSON["qty"], $_JSON["unit"], $_JSON["price"], $_JSON["stock"], $_JSON["stock_alart"], intval(time()) );
	$stmt->execute();
	$last_id = $stmt->insert_id;
	$stmt->close(); 
	return $last_id;
}

function numberCodeCount($st)
{
    global $_SQL, $_PREFIX; 
    $Q = "SELECT COUNT(`id`) FROM ".$_PREFIX."items WHERE code LIKE '".$st."%'";
	$result = mysqli_query($_SQL, $Q);
	return (mysqli_fetch_array($result))[0];
}

function createCode($cate) {
	$ST = strtoupper(substr($cate,0,2));
	$CO = intval(numberCodeCount($ST))+1;
	$ID = str_pad($CO, 10, '0', STR_PAD_LEFT);
	return $ST."".$ID; 
}

$code = createCode($_JSON["category"]);

$_RESULT = new stdClass();
$_RESULT->error = false;
$_RESULT->message = "success";
$_RESULT->result = addItems($code);
echo json_encode($_RESULT);


?>
