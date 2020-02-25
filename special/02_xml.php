<?php
	require_once '../config.php';
	$xml = file_get_contents("php://input");
	libxml_disable_entity_loader (false);
	$dom = new DOMDocument(); 
	$dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD); 
	$data = simplexml_import_dom($dom); 
	$id = $data->id;
	print $id;	
?>