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


	public function addPlayer($player_name,$team_id)
    {
        $query = "INSERT INTO players(player_name,team_id) VALUES('$player_name','$team_id')";
        $result = $this->db->insert($query);
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