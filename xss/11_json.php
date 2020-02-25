<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
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
	echo '{"result":[{"fn":"'.$fn.' in result ... "}]}';
?>