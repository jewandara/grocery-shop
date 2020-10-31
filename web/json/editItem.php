<?php


function updateItems($id, $set) {
	global $_SQL,$_PREFIX; 
	$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."items SET `last_update_stamp`=? ".$set." WHERE id=?");
	$stmt->bind_param("ii", intval(time()), intval($id) );
	$stmt->execute();
	$stmt->close();
}
$_SET = "";
if(!empty($_JSON["id"])){
	if(!empty($_JSON["code"])){ $_SET.=", code = '".strval($_JSON["code"])."' "; }
	if(!empty($_JSON["name"])){ $_SET.=", name = '".strval($_JSON["name"])."' "; }
	if(!empty($_JSON["category"])){ $_SET.=", category = '".strval($_JSON["category"])."' "; }
	if(!empty($_JSON["qty"])){ $_SET.=", qty = ".strval($_JSON["qty"])." "; }
	if(!empty($_JSON["unit"])){ $_SET.=", unit = '".strval($_JSON["unit"])."' "; }
	if(!empty($_JSON["price"])){ $_SET.=", price = ".strval($_JSON["price"])." "; }
	if(!empty($_JSON["stock"])){ $_SET.=", stock = ".strval($_JSON["stock"])." "; }
	if(!empty($_JSON["stock_alart"])){ $_SET.=", stock_alart = ".strval($_JSON["stock_alart"])." "; }
	updateItems($_JSON["id"], $_SET);
	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = "";
	echo json_encode($_RESULT);

} else{ 
	$_RESULT = new stdClass();
	$_RESULT->error = true;
	$_RESULT->message = "error";
	$_RESULT->result = "Id can not null";
	echo json_encode($_RESULT);
}


?>
