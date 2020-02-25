<?php
	require_once '../config.php';
	$server = new nusoap_server();
	$server->configureWSDL("Ping Service", "urn:service");
	$server->register("ping",
	array("ip" => "xsd:string"),array("ping_service" => "xsd:string"),
	"urn:ping_service",
	"urn:ping_service#ping");
	$server->service(file_get_contents("php://input"));
	
	function ping($ip)
	{
		global $main;
		if( stristr( php_uname(), 'Windows NT' ) ) {
			// Windows
			$cmd = shell_exec( 'ping  ' . $ip );
		}
		else {
			// *nix
			$cmd = shell_exec( 'ping  -c 4 ' . $ip );
		}
		return $cmd;
	}	
?>