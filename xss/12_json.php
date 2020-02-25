<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	header("Content-Type: text/json; charset=utf-8");
	$data = array();
	$fn = $main->get('fn');
	$fn = preg_replace('/<script>/i',"", $fn);
	$fn = preg_replace('/<\/script>/i',"", $fn);
	$data = array(
		"result" => array(
			array(
				"fn" => $fn
			)
		)
	);
	echo $main->toJSON($data);	
?>