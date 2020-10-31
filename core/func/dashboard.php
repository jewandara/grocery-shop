<?php 

securePage($_SERVER['PHP_SELF']);

function selectOutOfStock()
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `code`, `name`, `category` FROM ".$_PREFIX."items WHERE `stock`<`stock_alart` ");
	$STMT->execute();
	$STMT->bind_result( $code, $name, $category );
	while ($STMT->fetch()){ $row[] = array( 'code'=>$code, 'name'=>$name, 'category'=>$category ); }
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

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


function totalCategoryQty($cata)
{
    global $_SQL, $_PREFIX;
	return (mysqli_fetch_array(mysqli_query($_SQL, "
		SELECT SUM(gs_order_details.qty) 
		FROM ".$_PREFIX."items, ".$_PREFIX."order_details 
		WHERE gs_items.id = gs_order_details.item_id 
		AND gs_items.category = '".$cata."' ")))[0];
}

function totalCategoryAmount($cata)
{
    global $_SQL, $_PREFIX;
	return (mysqli_fetch_array(mysqli_query($_SQL, "
		SELECT SUM(gs_order_details.price) 
		FROM ".$_PREFIX."items, ".$_PREFIX."order_details 
		WHERE gs_items.id = gs_order_details.item_id 
		AND gs_items.category = '".$cata."' ")))[0];
}

function totalOrders()
{
    global $_SQL, $_PREFIX;
	return (mysqli_fetch_array(mysqli_query($_SQL, "SELECT COUNT(id) FROM ".$_PREFIX."orders ")))[0];
}
function totalItems()
{
    global $_SQL, $_PREFIX;
	return (mysqli_fetch_array(mysqli_query($_SQL, "SELECT COUNT(id) FROM ".$_PREFIX."items ")))[0];
}
function totalUsers()
{
    global $_SQL, $_PREFIX;
	return (mysqli_fetch_array(mysqli_query($_SQL, "SELECT COUNT(id) FROM ".$_PREFIX."users ")))[0];
}
function totalCustomers()
{
    global $_SQL, $_PREFIX;
	return (mysqli_fetch_array(mysqli_query($_SQL, "SELECT COUNT(id) FROM ".$_PREFIX."customers ")))[0];
}

function totalOrderAmmount($method, $date)
{
    global $_SQL, $_PREFIX;
    $quary = "SELECT SUM(balance) FROM ".$_PREFIX."orders WHERE method = '".$method."' AND paid_stamp LIKE '".$date."%' ";
	return (mysqli_fetch_array(mysqli_query($_SQL, $quary)))[0];
}

function totalOrdersStatus($status)
{
    global $_SQL, $_PREFIX;
    if($status == "CLOSE"){ return (mysqli_fetch_array(mysqli_query($_SQL, "SELECT COUNT(id) FROM ".$_PREFIX."orders WHERE status = 'PAID' ")))[0]; }
	else{ return (mysqli_fetch_array(mysqli_query($_SQL, "SELECT COUNT(id) FROM ".$_PREFIX."orders WHERE status = 'DELIVERY' OR status = 'OPEN' ")))[0]; }
}

/*
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
 */


$totalOrdersStatusClose = totalOrdersStatus("CLOSE");
$totalOrdersStatusPending = totalOrdersStatus("PENDING");


/*
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
 */



$CategoryNames = array();
$pieChartData = array();
$revenueTableData = array();
$revenueTableColors = array();
$colors = array("#99b433", "#00a300", "#1e7145", "#ff0097", "#9f00a7", "#7e3878", "#603cba", "#1d1d1d", "#00aba9", "#eff4ff", "#2d89ef", "#2b5797", "#ffc40d", "#e3a21a", "#da532c", "#ee1111", "#b91d47" );
$i = 0;
$Category = selectAllCategory();
foreach ($Category as $dt) {
	array_push($CategoryNames, "'".(string)$dt["category"]."'");
	array_push($pieChartData, totalCategoryQty((string)$dt["category"]));
	$tableTr = "<tr>
					<td><i class='fa fa-bookmark gs-xlarge' style='color:".$colors[$i]."'></i></td>
					<td>Total Revenue of ".(string)$dt["category"]." items </td>
					<td><i>LKR ".(string)(number_format(totalCategoryAmount((string)$dt["category"]), 2))."</i></td>
				</tr>";
	array_push($revenueTableData, $tableTr);
	array_push($revenueTableColors, "'".$colors[$i]."'");

	$i += 1;
}


$totalOrders = totalOrders();
$totalItems = totalItems();
$totalUsers = totalUsers();
$totalCustomers = totalCustomers();

/*
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
=======================================================================================================
 */


$OrderLabelArry = array();
$OrderCashArry = array();
$OrderVisaArry = array();
$OrderMasterArry = array();
for ($x = 30; $x >= 0; $x--) {
	$DAY =  previousDay($x);
	array_push($OrderLabelArry, "[".$DAY[0].", '".$DAY[3]."']");
	array_push($OrderCashArry, totalOrderAmmount("CASH", $DAY[4]));
	array_push($OrderVisaArry, totalOrderAmmount("VISA", $DAY[4]));
	array_push($OrderMasterArry, totalOrderAmmount("MASTER", $DAY[4]));
}


?>