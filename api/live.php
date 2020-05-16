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
$msg['strikerBalls']=$StrikerPlayers['ball_faced'];
$msg['strikerSixes']=$StrikerPlayers['sixes'];
$msg['strikerRate']=$StrikerPlayers['strike_rate'];

$msg['nonstrikerScore']=$NonStrikerPlayers['runs'];
$msg['nonstrikerFours']=$NonStrikerPlayers['fours'];
$msg['nonstrikerBall']=$NonStrikerPlayers['ball_faced'];
$msg['nonstrikerSixes']=$NonStrikerPlayers['sixes'];
$msg['nonstrikerRate']=$NonStrikerPlayers['strike_rate'];


$msg['striker']=getPlayerNameById($StrikerPlayers['player_id']);
$msg['nonstriker']=getPlayerNameById($NonStrikerPlayers['player_id']);

$bplayer=activegetBowling();
$bowPlayer=$bplayer->fetch_assoc();

$msg['activeBowler']=getPlayerNameById($bowPlayer['player_id']);
$msg['maidenballs']=$bowPlayer['maidenballs'];
$over=$bowPlayer['maidenballs'].$bowPlayer['balls_bowled'];
$msg['overs']=$over;
$msg['runs']=$bowPlayer['runs'];
$msg['wickets']=$bowPlayer['wickets'];
$msg['economy_rate']=$bowPlayer['economy_rate'];

$tossId=getTossWinnerTeamId();

$teamDetail=getTossWinerScoreWiner($tossId);

$teamDetails=$teamDetail->fetch_assoc();
$msg['target']=$teamDetails['target'];


$batId=getBatingTeamId();

$batingTeamDetail=getTeamScoreBoard($batId);

$batingTeamScoreDetail=$batingTeamDetail->fetch_assoc();
$msg['beatingOver']=$batingTeamScoreDetail['overs'];
$msg['beatingScoreOuts']=$batingTeamScoreDetail['runs']."-".$batingTeamScoreDetail['no_of_outs'];
$msg['justRuns']=$batingTeamScoreDetail['runs'];
$msg['matchStatus']=getMatchStatus();

$lastsixball=lastSixBalls();
$lastsixballs=$lastsixball->fetch_assoc();
$msg['b1']=$lastsixballs['b1'];
$msg['b2']=$lastsixballs['b2'];
$msg['b3']=$lastsixballs['b3'];
$msg['b4']=$lastsixballs['b4'];
$msg['b5']=$lastsixballs['b5'];
$msg['b6']=$lastsixballs['b6'];

$tossWinner=getTossWinnerTeamId();

$tossWinnerTeamDeatils=getTeamScoreBoard($tossWinner);
$tossWinnerTeamDeatils1=$tossWinnerTeamDeatils->fetch_assoc();
$msg['crr']=$tossWinnerTeamDeatils1['run_rate'];
$msg['rrr']=$tossWinnerTeamDeatils1['rrr'];
$msg['remainingball']=$tossWinnerTeamDeatils1['remainingball'];
$msg['remainingruns']=$tossWinnerTeamDeatils1['remainingruns'];


$value=sixvalue();
$sixValue=$value->fetch_assoc();
$msg['v1']=$sixValue['teamAv1'];
$msg['v2']=$sixValue['teamAv2'];
$msg['v3']=$sixValue['sessionOverV1'];
$msg['v4']=$sixValue['sessionOverV2'];
$msg['v5']=$sixValue['xBollV1'];
$msg['v6']=$sixValue['xBollV2'];



echo json_encode($msg);



?>
