<?php
include_once ("database.php");
include_once ("commonfunctions.php");
$db=new Database();
$msg=Array();

$team=getallTeam();

$i=1;
while ($detail=$team->fetch_assoc()) 
{ 
	$msg["cteam$i"]=$detail['teamName'];
	$i++;	
}

$msg['batingteam']=getBatingTeam();
$msg['bowlingteam']=getBowlingTeam();

$playerS=StrikerPlayer();
$playerN=NonStrikerPlayer();

$StrikerPlayers=$playerS->fetch_assoc();
$NonStrikerPlayers=$playerN->fetch_assoc();

$msg['strikerScore']=$StrikerPlayers['runs'];
$msg['strikerFours']=$StrikerPlayers['fours'];
$msg['strikerSixes']=$StrikerPlayers['sixes'];
$msg['strikerRate']=$StrikerPlayers['strike_rate'];

$msg['nonstrikerScore']=$NonStrikerPlayers['runs'];
$msg['nonstrikerFours']=$NonStrikerPlayers['fours'];
$msg['nonstrikerSixes']=$NonStrikerPlayers['sixes'];
$msg['nonstrikerRate']=$NonStrikerPlayers['strike_rate'];

$msg['striker']=getPlayerNameById($StrikerPlayers['player_id']);
$msg['nonstriker']=getPlayerNameById($NonStrikerPlayers['player_id']);



echo json_encode($msg);



?>
