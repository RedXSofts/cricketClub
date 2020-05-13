<?php
include_once ("database.php");

$db=new Database();
$q="select * from team";
$msg=Array();
$value=$db->select($q);

$value=$value->fetch_assoc();

$msg['code']=$value['teamName'];

echo json_encode($msg);



?>
