<?php 

securePage($_SERVER['PHP_SELF']);

$pages = getPageFiles();
$dbpages = fetchAllPages();
$creations = array();
$deletions = array();
foreach ($pages as $page){
	if(!isset($dbpages[$page])){
		$creations[] = $page;	
	}
}

if (count($creations) > 0) { createPages($creations)	; }
if (count($dbpages) > 0){
	foreach ($dbpages as $page){
		if(!isset($pages[$page['page']])){ $deletions[] = $page['id'];	 }
	}
}

if (count($deletions) > 0) { deletePages($deletions); }
$dbpages = fetchAllPages();

$ERROR_MESSAGE = resultBlock($_ERRORS,$_SUCCESS);

$_TR = "";

foreach ($dbpages as $page){
	$_TR.= "
	<tr>
	<td><b>".$page['id']."</b></td>
	<td><a href='".$_DOMAIN.$page['page']."'>/".$page['page']."</a></td>";
	if($page['private']==0){ $_TR.= "<td><a class='label success'>Public</a></td>"; }
	else{ $_TR.= "<td><a class='label danger'>Private</a></td>"; }
	$_TR.= "</tr>";
}



$ERROR_MESSAGE = resultBlock($_ERRORS,$_SUCCESS);

?>
