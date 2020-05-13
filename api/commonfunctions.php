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



?>