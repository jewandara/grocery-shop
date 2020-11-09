<?php

function selectAllCategory()
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT DISTINCT(`category`) FROM ".$_PREFIX."items");
	$STMT->execute();
	$STMT->bind_result( $category );
	while ($STMT->fetch()){ $row[] = array( 'category'=>$category ); }
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

function totalCategoryQtyItem($cata)
{
    global $_SQL, $_PREFIX;
	return (mysqli_fetch_array(mysqli_query($_SQL, "
		SELECT SUM(gs_order_details.qty) 
		FROM ".$_PREFIX."items, ".$_PREFIX."order_details 
		WHERE gs_items.id = gs_order_details.item_id 
		AND gs_items.category = '".$cata."' ")))[0];
}

if( $_JSON["type"] == "category" ){ 
	$i = 0;
	$CategoryData[] = array();
	$Category = selectAllCategory();
	foreach ($Category as $dt) {
		$C = totalCategoryQtyItem((string)$dt["category"]);
		$d = array((string)$dt["category"], $C);
		array_push($CategoryData, $d);
		$i += 1;
	}

	$_RESULT = new stdClass();
	$_RESULT->error = false;
	$_RESULT->message = "success";
	$_RESULT->result = $CategoryData;
	echo json_encode($_RESULT);
}




?>
