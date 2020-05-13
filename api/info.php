<?php
include_once ("database.php");
include_once ("commonfunctions.php");
$db=new Database();
$msg=Array();


$tossWinnerName=getBatingTeam();
$bWinnerName=getBowlingTeam();

$msg['winnerTeam']=$tossWinnerName;
$msg['bowlerTeam']=$bWinnerName;

 $tossWinnerId=getBatingTeamId();
 $batWinnerId=getBowlingTeamId();

$teamA=getPlayerId($tossWinnerId);
$teamB=getPlayerId($batWinnerId);

$i=1;
while ($detail=$teamA->fetch_assoc()) 
{ 
	$msg["playerA$i"]=$detail['player_name'];
	$i++;	
}

$i=1;
while ($detailB=$teamB->fetch_assoc()) 
{ 
	$msg["playerB$i"]=$detailB['player_name'];
	$i++;	
}





echo json_encode($msg);