<?php
	require_once '../config.php';
	header("Content-Type: text/json; charset=utf-8");
	$user = $main->post('user'); 
	if($user == '')
		$data = array();
	else
	{
		$data = array();
		$q = "SELECT id,fn,ln,username FROM users WHERE username LIKE '%$user%' AND temp = '' ";
		$r = $main->query($q);	
		while($users = $main->getRow($r))
			$data[] = $users;
	}
	echo $main->toJSON($data);	
?>