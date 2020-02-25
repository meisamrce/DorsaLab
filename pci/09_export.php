<?php
require_once '../config.php';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data-export.csv');
	$q = "SELECT title,price,number FROM products ";
	$r = $main->query($q);
$output = fopen('php://output', 'w');

fputcsv($output, array('Title', 'Price', 'Number'));

while ($row = $main->getRow($r))
{
	fputcsv($output, $row);
}
?>