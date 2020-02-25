<?php
	require_once '../config.php';
	$server = new nusoap_server();
	$server->configureWSDL("Email Service", "urn:service");
	$server->register("get_email",
	array("username" => "xsd:string"),array("email_service" => "xsd:string"),
	"urn:email_service",
	"urn:email_service#get_email");
	$server->service(file_get_contents("php://input"));
	
	function get_email($username)
	{
		global $main;
		$q = "SELECT * FROM users WHERE username = '$username' LIMIT 0,1 ";
		$r = $main->query($q);
		$user = $main->getRow($r);
		return $user['email'];
	}	
?>