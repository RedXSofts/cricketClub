<?php
$filepath=realpath(dirname(__FILE__)); 
include_once ($filepath.'/session.php');
include_once ($filepath.'/database.php');
include_once ($filepath.'/format.php');
class Team
{   private $db;
    private $fm;
	function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}

	public function createMatch($team,$decision,$stadium,$over)
	{
		$query = "INSERT INTO matches(team,toss,decision,stadium,over) VALUES('$team','1','$decision','$stadium','$over')";
		$result = $this->db->insert($query);

		$get=$this->getRemainingTeam($team);
		$gets=$get->fetch_assoc();
		$team=$gets['id'];
		if($decision=='1')
			$decision=0;
		else $decision=1;

		$query1 = "INSERT INTO matches(team,decision,stadium,over) VALUES('$team','$decision','$stadium','$over')";
		$result1 = $this->db->insert($query1);

		if($result1)
		{
			return "Match Successfully Created";
		}else
		{
			return "Match Not Created";
		}

	}


	public function addTeam($teamName,$location)
    {
        $query = "INSERT INTO team(teamName,location) VALUES('$teamName','$location')";
        $result = $this->db->insert($query);

    }
    public function updateTeam($teamName,$location, $id)
    {
            $query = "update team set teamName='$teamName',location='$location' where id='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "Team Updated";
                return $msg;
            } else {
                $msg = "Team Not Updated";
                return $msg;
            }


    }

      public function getAllTeam()
    {
        $query="select * from team";
        $result=$this->db->select($query);
        return $result;
    }

	public function getRemainingTeam($id)
	{
		$query="select * from team where id <> '$id'";
		$result=$this->db->select($query);

		return $result;
	}
      public function getAllTeamById($id)
    {
        $query="select * from team where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }

	public function delete($id)
    {
        $query="delete from team where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }


}
