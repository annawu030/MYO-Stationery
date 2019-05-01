<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$data = [];
foreach ($request as $k => $v)
{
 $data[0][$k] = $v;
}
echo json_encode($data);
?> 