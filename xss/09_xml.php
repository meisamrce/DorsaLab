<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	header("Content-Type: application/xml; charset=utf-8");
	$fn = $main->get('fn'); 
	$xml = new XMLWriter();
	$xml->openURI("php://output");
	$xml->startDocument();
	$xml->setIndent(false);
	$data = array();
	$xml->startElement('fn');
	$xml->writeRaw($fn);
	$xml->endElement();		
	$xml->flush();
?>