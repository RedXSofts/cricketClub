<?php

include_once ("database.php");
include_once ("commonfunctions.php");
$db=new Database();
$batTeamId=getBowlingTeamId();

$batTeam=getGetBattingRecord();

$bolTeam=getGetBowlingRecord();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Batting Score</title>
</head>
<body>
    <h1>Batting Detail</h1>
   <div class="mycard">
   <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Batsman</th>
      <th scope="col">R</th>
      <th scope="col">B</th>
      <th scope="col">4s</th>
      <th scope="col">6s</th>
      <th scope="col">SR</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($batTeams=$batTeam->fetch_assoc())
    {
        $player=$batTeams['player_id'];
        $player=getPlayer($player);
        $playerDetail=$player->fetch_assoc();
        if($playerDetail['team_id']==$batTeamId)
        {

  ?>
    <tr>
      <td scope="row"><?php echo  $playerDetail['player_name']; ?></td>
      <td><?php echo $batTeams['runs']; ?></td>
      <td><?php echo $batTeams['ball_faced']; ?></td>
      <td><?php echo $batTeams['fours']; ?></td>
      <td><?php echo $batTeams['sixes']; ?></td>
      <td><?php echo $batTeams['strike_rate']; ?></td>
    </tr>
    </tr>
        <?php } ?>
    <?php } ?>
  
  </tbody>
</table>


   </div>

   <h1>Bowling Detail</h1>
   <div class="mycard">
   <table class="table table-borderless">
  <thead>
  
    <tr>
    <th scope="col">Bowler</th>
      <th scope="col">O</th>
      <th scope="col">M</th>
      <th scope="col">R</th>
      <th scope="col">W</th>
      <th scope="col">ER</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($bolTeams=$bolTeam->fetch_assoc())
    {
        $player=$bolTeams['player_id'];
        $player=getPlayer($player);
        $playerDetail=$player->fetch_assoc();
        if($playerDetail['team_id']==$batTeamId)
        {

  ?>
    <tr>
      <td scope="row"><?php echo $playerDetail['player_name']; ?></td>
      <td><?php echo $bolTeams['overs']; ?></td>
      <td><?php echo $bolTeams['maidenballs']; ?></td>
      <td><?php echo $bolTeams['runs']; ?></td>
      <td><?php echo $bolTeams['wickets']; ?></td>
      <td><?php echo $bolTeams['economy_rate']; ?></td>
    </tr>
    
    </tr>
    <?php } ?>
    <?php } ?>
  
  </tbody>
</table>


   </div>

   <h1>Fall of Wickets</h1>
   <div class="mycard">
   <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Score</th>
      <th scope="col">Overs</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($bolTeams=$bolTeam->fetch_assoc())
    {
        $player=$bolTeams['player_id'];
        $player=getPlayer($player);
        $playerDetail=$player->fetch_assoc();
        if($playerDetail['team_id']==$batTeamId)
        {

  ?>
    <tr>
     <td scope="row"><?php echo $playerDetail['player_name']; ?></td>
     <td><?php echo $bolTeams['runs']; ?></td>
     <td><?php echo $bolTeams['overs']; ?></td>
    </tr>
    
    </tr>
    <?php } ?>
    <?php } ?>
  </tbody>
</table>


   </div>
   
</body>
</html>