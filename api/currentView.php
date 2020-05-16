<?php
include_once ("database.php");

$db=new Database();

  	function getAllTeam()
   	{
   	   $db=new Database();
       $query="select * from team";
       $result=$db->select($query);
       return $result;
    }
    function getCommingTeam()
   	{
   	   $db=new Database();
       $query="select * from cteam";
       $result=$db->select($query);
       return $result;
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
    function getStadium()
	{
	$db=new Database();
	$query="select * from matches";
	$result=$db->select($query);
	return $result;
	}

$data=array();
$team=getallTeam();
$i=1;
while ($detail=$team->fetch_assoc()) 
{ 
	$data["cteam$i"]=$detail['teamName'];
	
	$i++;	
	
}
$st=getStadium();
$stm=$st->fetch_assoc();
$data["cstadium"]=$stm['stadium'];

$cteam=getCommingTeam();
$cteams=$cteam->fetch_assoc();

$data['uteam1']=$cteams['teamAName'];
$data['uteam2']=$cteams['teamAName'];
$data['ustadium']=$cteams['stadium'];
$data['batingteam']=getBatingTeam();
echo json_encode($data);