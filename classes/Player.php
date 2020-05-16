<?php
$filepath=realpath(dirname(__FILE__)); 
include_once ($filepath.'/session.php');
include_once ($filepath.'/database.php');
include_once ($filepath.'/format.php');
class Player
{   private $db;
    private $fm;
	function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
    public function getPlayerData($id){
        $query = "SELECT * FROM players WHERE id=$id";
        $res = $this->db->select($query);
        $res = $res->fetch_assoc();
        return $res['player_name'];
    }
    public function update_player($n,$id){
        
        $query = "UPDATE players SET player_name = '$n' WHERE id=$id";
    
        $res = $this->db->update($query);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
    public function count_teamA_players()
    {
        $team_q1 = "SELECT * FROM team limit 1";
        $team_res1 = $this->db->select($team_q1);
        $team_res1 = $team_res1->fetch_assoc();
        $team_id = $team_res1['id'];
        $query1 = "SELECT COUNT(*) as teamA FROM players where team_id = $team_id";
        $player_res1 = $this->db->select($query1);
        $player_res1 = $player_res1->fetch_assoc();
        return $player_res1['teamA'];
	}
    public function count_teamB_players()
    {
        $team_q = "SELECT * FROM team limit 1,1";
        $team_res = $this->db->select($team_q);
        $team_res = $team_res->fetch_assoc();
        $team_id = $team_res['id'];
        $query = "SELECT COUNT(*) as teamB FROM players where team_id = $team_id";
        $player_res = $this->db->select($query);
        $player_res = $player_res->fetch_assoc();
        return $player_res['teamB'];
    }

	public function addPlayer($players,$team_id)
    {
    	$size=count($players);
		$counter=0;

		for ($i=0; $i<$size; $i++)
		{
			$j=$i+1;
			$query = "INSERT INTO players(player_name,team_id,position) VALUES('$players[$i]','$team_id','$j')";
			$result = $this->db->insert($query);
			$counter++;
		}

		if($counter==$size)
		{
			$update="update team set status=1 where id=$team_id";
			$this->db->update($update);
			return "All Players Inserted";

		}
		else
		{
			return "All Players not inserted";
		}


    }
    public function updatePlayer($player_name,$team_id, $id)
    {
            $query = "update players set player_name='$player_name',team_id='$team_id' where id='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "Players Updated";
                return $msg;
            } else {
                $msg = "Players Not Updated";
                return $msg;
            }
    }

      public function getAllPlayer()
    {
        $query="select * from players";
        $result=$this->db->select($query);
        return $result;
    }

	public function getAllteams()
	{
		$query="select * from team where status=0";
		$result=$this->db->select($query);
		return $result;
	}


      public function getAllPlayerById($id)
    {
        $query="select * from players where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getAllRecord($id,$table)
    {
        $query="select * from $table where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getAllRecordByTable($table)
    {
        $query="select * from $table";
        $result=$this->db->select($query);
        return $result;
    }

	public function delete($id)
    {
        $query="delete from players where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }


}
