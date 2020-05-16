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
$winnerTeam=getTeamScoreBoard($tossWinnerId);
$bowlerTeam=getTeamScoreBoard($batWinnerId);

$winnerTeamScoreDetail=$winnerTeam->fetch_assoc();
$BowlerTeamScoreDetail=$bowlerTeam->fetch_assoc();

$msg['teambatOver']=$winnerTeamScoreDetail['overs'];
$msg['teambatOuts']=$winnerTeamScoreDetail['no_of_outs'];
$msg['teambatruns']=$winnerTeamScoreDetail['runs'];
$msg['teambatId']=$tossWinnerId;

$msg['teambollOver']=$BowlerTeamScoreDetail['overs'];
$msg['teambollOuts']=$BowlerTeamScoreDetail['no_of_outs'];
$msg['teambollruns']=$BowlerTeamScoreDetail['runs'];
$msg['teambollId']=$batWinnerId;



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