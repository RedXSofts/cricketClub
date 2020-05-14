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

    public function any_match()
    {
        $query = "SELECT COUNT(*) as total FROM matches WHERE status= 'continue'";
        $result = $this->db->select($query);
        $res = $result->fetch_assoc();
        if ($res['total'] > 0){
            return true;
        }
        return false;

	}

    public function updateStatus($status)
    {
        $match = "SELECT * FROM matches limit 1";
        $res = $this->db->select($match);
        $res = $res->fetch_assoc();
        $id = $res['id'];

     $query = "UPDATE matches SET status=$status WHERE id = $id";
     $result = $this->db->update($query);
     if ($result){
         echo "Status updated to".$status;
     }
     else{
         echo "Some Errors occured";
     }
	}
	public function createMatch($team,$decision,$stadium,$over)
	{
		$query = "INSERT INTO matches(team,toss,decision,stadium,over,status) VALUES('$team','1','$decision','$stadium','$over','continue')";
		$result = $this->db->insert($query);


        $query2 = "INSERT INTO score_board(team_id) VALUES('$team')";
        $result2 = $this->db->insert($query2);

		$get=$this->getRemainingTeam($team);
		$gets=$get->fetch_assoc();
		$team=$gets['id'];
		if($decision=='1')
			$decision=0;
		else $decision=1;

		$query1 = "INSERT INTO matches(team,decision,stadium,over,status) VALUES('$team','$decision','$stadium','$over','continue')";
		$result1 = $this->db->insert($query1);

        $query3 = "INSERT INTO score_board(team_id) VALUES('$team')";
        $result3 = $this->db->insert($query3);

		if($result1)
		{
			return "Match Successfully Created";
		}else
		{
			return "Match Not Created";
		}

	}

    public function count_teams()
    {
        $query ="SELECT count(*) as total FROM team";
        $result = $this->db->select($query);
        $result = $result->fetch_assoc();
        return $result['total'];
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
    public function getTeamByDecision($decision)
    {
        $query="select * from matches where decision=$decision";
        $result=$this->db->select($query);

        return $result;
    }
    public function getAllPlayerByTeam($team_id)
    {
        $query="select * from players where team_id=$team_id";
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

      public function addplayers($players)
    {
        $size=count($players);
        $counter=0;

        for ($i=0; $i<$size; $i++)
        {
            $j=$i+1;
            if ($i == 0) {
                $query = "INSERT INTO battingtable(player_id,status,striker_status) VALUES('$players[$i]','1','1')";
            $result = $this->db->insert($query);
            }
            else{
                $query = "INSERT INTO battingtable(player_id,status) VALUES('$players[$i]','1')";
            $result = $this->db->insert($query);
            }
            
            $counter++;

            $query = "update players set status=1 where id='$players[$i]'";
            $result = $this->db->update($query);
        }
        if($counter==$size)
        {

            return "Opener Inserted";
        }else {
                $msg = "Opener Inserted";
                return $msg;
            }
    }

    public function addbowler($bowler)
    {
        $query = "INSERT INTO bowlingtable(player_id,status) VALUES('$bowler','1')";
        $result = $this->db->insert($query);
        if($result)
        {
            return "bowler Inserted";
        } else {
                $msg = "bowler not Inserted";
                return $msg;
            }
    }

    public function getStrikePlayer($striker_status){

        $query="select * from battingtable where striker_status=$striker_status";
        $result=$this->db->select($query);
        return $result;
    }

    public function getStrikePlayerAndStatus(){
        $query="select * from battingtable where striker_status='0' AND status = '1'";
        $result=$this->db->select($query);
        return $result;
    }

      public function getAllPlayerById($id)
    {
        $query="select * from players where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }

    public function getBattingPlayer($status){

        $query="select * from battingtable where status=$status";
        $result=$this->db->select($query);
        return $result;
    }

    public function getBowlerPlayer($status){

        $query="select * from bowlingtable where status=$status";
        $result=$this->db->select($query);
        return $result;
    }


    public function getDataByQuery($query)
    {
        $query=$query;
        $result=$this->db->select($query);
        return $result;
    }
    public function getAllRecord($table)
    {
        $query="select * from $table";
        $result=$this->db->select($query);
        return $result;
    }
    public function getAllPlayerByStatusAndTeam($status,$team_id)
    {
        $query="select * from players where status = $status AND team_id = $team_id";
        $result=$this->db->select($query);
        return $result;
    }

    public function addCteam($team_one,$team_two,$location)
    {
        $query = "INSERT INTO cteam(teamAName,teamBName,stadium) VALUES('$team_one','$team_two','$location')";
        $result = $this->db->insert($query);

    }

    public function updateStriker($player_id){
        $query = "update battingtable set striker_status='0'";
            $result = $this->db->update($query);

        $query = "update battingtable set striker_status='1' where player_id = '$player_id'";
            $result = $this->db->update($query);
    }


    

    public function updateBowler($bowler, $newBowler){

        $query = "update bowlingtable set status = '0' where player_id = '$bowler'";
        $result = $this->db->update($query);

        $query2="select * from bowlingtable where player_id='$newBowler'";
        $result2=$this->db->select($query2);

        if ($result2) {
           $query3 = "update bowlingtable set status = '1' where player_id='$newBowler'";
           $result3 = $this->db->update($query3);
        }
        else{
            $query4 = "INSERT INTO bowlingtable(player_id,status) VALUES('$newBowler','1')";

            $result = $this->db->insert($query4);
        }

        
    }

    public function outPlayer($outPlayer, $newPlayer){

        $query2="select * from battingtable where player_id='$outPlayer'";
        $result2=$this->db->select($query2);

        if ($result2!=false) {
           $query = "update battingtable set status = '0', striker_status = '0' where player_id='$outPlayer'";
            $result = $this->db->update($query);

            $value = $result2->fetch_assoc();
            if ($value['striker_status'] == 1) {
                $query2 = "INSERT INTO battingtable(player_id,status,striker_status) VALUES('$newPlayer','1','1')";
                $result2 = $this->db->insert($query2);
            }else{
                $query2 = "INSERT INTO battingtable(player_id,status) VALUES('$newPlayer','1')";
                $result2 = $this->db->insert($query2);
            }
        }
        $query3 = "update players set status='1' where id='$newPlayer'";
        $result3 = $this->db->update($query3);  
    }

    public function getRunsByPlayerId($player_id, $table){
        $query = "select * from $table where player_id = $player_id";
            $result = $this->db->select($query);
        $result1 = $result->fetch_assoc();
        return $result1['runs'];

    }

    public function updateRun($runs, $striker, $bowler){


        $query3="select * from players where id='$striker'";
        $result3=$this->db->select($query3);

        $value = $result3->fetch_assoc();
        $team_id = $value['team_id'];

        $pre_runs = $this->getRunsByPlayerId($striker, "battingtable");

        $totallruns = $pre_runs + $runs;

        if ($runs == 4) {
            $query = "select * from battingtable where player_id = $striker";
            $result = $this->db->select($query);
            $value = $result->fetch_assoc();
            $fours = $value['fours'];
            $fours= $fours + 1;

            $query = "update battingtable set fours='$fours' where player_id = '$striker'";
            $result = $this->db->update($query);

            $query4 = "update score_board set fours='$fours' where team_id = '$team_id'";
            $result4 = $this->db->update($query4);
        }
        if ($runs == 6) {
            $query = "select * from battingtable where player_id = $striker";
            $result = $this->db->select($query);
            $value = $result->fetch_assoc();
            $sixes = $value['sixes'];
            $sixes= $sixes + 1;

            $query = "update battingtable set sixes='$sixes' where player_id = '$striker'";
            $result = $this->db->update($query);

            $query4 = "update score_board set sixes='$sixes' where team_id = '$team_id'";
            $result4 = $this->db->update($query4);

        }


        $query = "update battingtable set runs=$totallruns where player_id = '$striker'";
        $result = $this->db->update($query);


        $pre_runs = $this->getRunsByPlayerId($bowler, 'bowlingtable');

        $runs = $pre_runs + $runs;


        $query2 = "update bowlingtable set runs=$runs where player_id = '$bowler'";
        $result2 = $this->db->update($query2);

        $query4 = "update score_board set runs=$runs where team_id = '$team_id'";
        $result4 = $this->db->update($query4);


        $this->updateBalls($striker, $bowler, $team_id);

    }
    public function updateBalls($striker, $bowler, $team_id){
        $query = "select * from battingtable where player_id = $striker";
        $result = $this->db->select($query);
        $value = $result->fetch_assoc();
        $ball_faced = $value['ball_faced'];
        $runs = $value['runs'];
        $ball_faced= $ball_faced + 1;

        $strike_rate = ($runs/$ball_faced)*100;

        

        $query = "update battingtable set ball_faced='$ball_faced',strike_rate='$strike_rate'  where player_id = '$striker'";
        $result = $this->db->update($query);


        $query = "select * from score_board where team_id = $team_id";
        $result = $this->db->select($query);
        $value = $result->fetch_assoc();
        $balls = $value['balls'];
        $runs = $value['runs'];
        $balls= $balls + 1;
        $overs = $balls/6;

        $run_rate = $runs/$overs;

        $query4 = "update score_board set balls='$balls', overs='$overs',run_rate='$run_rate' where team_id = '$team_id'";
        $result4 = $this->db->update($query4);


        $query = "select * from bowlingtable where player_id = $bowler";
        $result = $this->db->select($query);
        $value = $result->fetch_assoc();
        $balls_bowled = $value['balls_bowled'];
        $runs = $value['runs'];
        $balls_bowled= $balls_bowled + 1;

        $overs=$balls_bowled/6;
        $economy_rate = $runs/$overs;

        $query4 = "update bowlingtable set balls_bowled='$balls_bowled',economy_rate='$economy_rate' where player_id = '$bowler'";
        $result4 = $this->db->update($query4);

    }
    public function updateExtras($extra,$player_id){
        $query3="select * from players where id='$player_id'";
        $result3=$this->db->select($query3);

        $value = $result3->fetch_assoc();
        $team_id = $value['team_id'];

        $query = "select * from score_board where team_id = $team_id";
        $result = $this->db->select($query);
        $value = $result->fetch_assoc();
        $pre_extras = $value['extras'];
        $pre_runs = $value['runs'];

        $runs = $pre_runs + $extra;
        $totallExtras = $pre_extras + $extra;

        $query4 = "update score_board set extras='$totallExtras', runs='$runs' where team_id = '$team_id'";
        $result4 = $this->db->update($query4);

    }
}

