<?php

	function getAllTeam()
   	{
   	   $db=new Database();
       $query="select * from team";
       $result=$db->select($query);
       return $result;
    }
    function getPlayerId($id)
   	{
   	   $db=new Database();
       $query="select * from players where team_id='$id'";
       $result=$db->select($query);
       return $result;
    }
    function getPlayerNameById($id)
   	{
   	   $db=new Database();
       $query="select * from players where id='$id'";
       $result=$db->select($query);
       $name=$result->fetch_assoc();
       return $name['player_name'];
    }
    function getBatingTeam()
   	{
   	   $db=new Database();
       $query="select * from matches where decision='1'";
       $result=$db->select($query);
       $teamId=$result->fetch_assoc();
       $id=$teamId['team'];
       $query1="select * from team where id='$id'";
       $result1=$db->select($query1);
       $getTeam=$result1->fetch_assoc();
       return $getTeam['teamName'];
    }
     function getBatingTeamId()
   	{
   	   $db=new Database();
       $query="select * from matches where decision='1'";
       $result=$db->select($query);
       $teamId=$result->fetch_assoc();
       $id=$teamId['team'];
       $query1="select * from team where id='$id'";
       $result1=$db->select($query1);
       $getTeam=$result1->fetch_assoc();
       return $getTeam['id'];
    }
    function getBowlingTeam()
   	{
   	   $db=new Database();
       $query="select * from matches where decision='0'";
       $result=$db->select($query);
       $teamId=$result->fetch_assoc();
       $id=$teamId['team'];
       $query1="select * from team where id='$id'";
       $result1=$db->select($query1);
       $getTeam=$result1->fetch_assoc();
       return $getTeam['teamName'];
    }
    function getBowlingTeamId()
   	{
   	   $db=new Database();
       $query="select * from matches where decision='0'";
       $result=$db->select($query);
       $teamId=$result->fetch_assoc();
       $id=$teamId['team'];
       $query1="select * from team where id='$id'";
       $result1=$db->select($query1);
       $getTeam=$result1->fetch_assoc();
       return $getTeam['id'];
    }

	function StrikerPlayer()
   	{
   	   $db=new Database();
       $query="select * from battingtable where striker_status='1' AND status='1'";
       $result=$db->select($query);
       return $result;
    }
    function NonStrikerPlayer()
   	{
   	   $db=new Database();
       $query="select * from battingtable where striker_status='0' AND status='1'";
       $result=$db->select($query);
       return $result;
    }
    function activegetBowling()
    {
       $db=new Database();
       $query="select * from bowlingtable where status='1'";
       $result=$db->select($query);
       return $result;
    }
    function getTeamScoreBoard($id)
    {
       $db=new Database();
       $query="select * from score_board where team_id='$id'";
       $result=$db->select($query);
       return $result;
    }


    function getGetBattingRecord()
    {
       $db=new Database();
       $query="select * from battingtable";
       $result=$db->select($query);
       return $result;
    }
    function getGetBowlingRecord()
    {
       $db=new Database();
       $query="select * from bowlingtable";
       $result=$db->select($query);
       return $result;
    }
    function getPlayer($id)
    {
       $db=new Database();
       $query="select * from players where id='$id'";
       $result=$db->select($query);
       return $result;
    }


    function getTossWinnerTeamId()
    {
       $db=new Database();
       $query="select * from matches where toss='1'";
       $result=$db->select($query);
       $results=$result->fetch_assoc();
       return $results['team'];
    }

    function getTossWinerScoreWiner($id)
    {
       $db=new Database();
       $query="select * from score_board where team_id='$id'";
       $result=$db->select($query);
       return $result;
    }
    function getMatchStatus()
    {
       $db=new Database();
       $query="select * from matches";
       $result=$db->select($query);
       $results=$result->fetch_assoc();
       return $results['status'];
    }

    function lastSixBalls()
    {
       $db=new Database();
       $query="select * from sixballs";
       $result=$db->select($query);
       return $result;
    }

    function sixvalue()
    {
       $db=new Database();
       $query="select * from bettable";
       $result=$db->select($query);
       return $result;
    }
    


?>
