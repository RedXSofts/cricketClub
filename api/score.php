<?php
include_once ("database.php");
include_once ("commonfunctions.php");

$msg=Array();

$batTeamId=getBatingTeamId();
$bowlTeamId=getBowlingTeamId();




$msg['batingteam']=getBatingTeam();
$msg['bowlingteam']=getBowlingTeam();

echo json_encode($msg);



?>
