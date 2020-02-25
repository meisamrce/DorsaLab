<?php
	require_once '../config.php';
	header("Content-Type: application/xml; charset=utf-8");
	$user = $main->post('user'); 
	$xml = new XMLWriter();

	$xml->openURI("php://output");
	$xml->startDocument();
	$xml->setIndent(false);
	
	if($user == '')
	{
		$data = array();
		$xml->startElement('users');
		$xml->endElement();		
		$xml->flush();
	}
	else
	{
		$data = array();
		$q = "SELECT id,fn,ln,username FROM users WHERE username LIKE '%$user%' AND temp = '' ";
		$r = $main->query($q);	
		$xml->startElement('users');
					
		while($users = $main->getRow($r))
		{
			$xml->startElement("user");
				$xml->startElement("id");
				$xml->writeRaw($users['id']);
				$xml->endElement();
				$xml->startElement("fn");
				$xml->writeRaw($users['fn']);
				$xml->endElement();
				$xml->startElement("ln");
				$xml->writeRaw($users['ln']);
				$xml->endElement();
				$xml->startElement("username");
				$xml->writeRaw($users['username']);
				$xml->endElement();				
			$xml->endElement();
		}
		$xml->endElement();	
		$xml->flush();
	}
	
?>