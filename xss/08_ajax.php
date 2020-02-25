<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	$fn = $main->get('fn'); 
	print $fn;
?>