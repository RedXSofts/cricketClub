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
        // $match = "SELECT * FROM matches";
        // $res = $this->db->select($match);
        // $res = $res->fetch_assoc();
        // $id = $res['id'];

     $query = "UPDATE matches SET status='$status'";
     $result = $this->db->update($query);
     // if ($result){
     //     echo "Status updated to".$status;
     // }
     // else{
     //     echo "Some Errors occured";
     // }
	}
	public function createMatch($team,$decision,$stadium,$over)
	{
	   // $status = 'continue';
	    
	   // $data = [
    //         'team' => $team,
    //         'decision' => $decision,
    //         'stadium' => $stadium,
    //     ];
    //     $sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
    //     $stmt= $pdo->prepare($sql);
    //     $stmt->execute($data);
	    
// 		$query = "INSERT INTO matches(team,toss,decision,stadium,over,status) VALUES('$team','1','$decision','$stadium','$over','$status')";
		
		$query = "INSERT INTO matches(`team`,`toss`,`over`,`decision`,`stadium`,`status`) VALUES($team,'1',$over,'$decision','$stadium','continue')";
		$result = $this->db->insert($query);


        $query2 = "INSERT INTO score_board(team_id) VALUES('$team')";
        $result2 = $this->db->insert($query2);

		$get=$this->getRemainingTeam($team);
		$gets=$get->fetch_assoc();
		$team=$gets['id'];
		if($decision=='1')
			$decision=0;
		else $decision=1;

// 		$query1 = "INSERT INTO matches(team,toss,decision,stadium,over,status) VALUES('$team','0,'$decision','$stadium','$over','$status')";

$query1 = "INSERT INTO matches(`team`,`over`,`decision`,`stadium`,`status`) VALUES('$team','$over','$decision','$stadium','continue')";
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
        if ($result) {
            $msg = "Team Added Successfully";
            return $msg;
        } else {
            $msg = "Team Not Added Successfully";
            return $msg;
        }

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

    public function updateCteam($team_one,$team_two,$location)
    {
        $query = "update cteam set teamAName='$team_one',teamBName='$team_two',stadium='$location'";
            $result = $this->db->update($query);

    }
    public function getAllCTeam(){
        $query="select * from cteam";
        $result=$this->db->select($query);
        return $result;
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

    public function changeTeam($player_id){

        $query3="select * from players where id='$player_id'";
        $result3=$this->db->select($query3);

        $value = $result3->fetch_assoc();
        $team_id = $value['team_id'];

        $query = "select * from score_board where team_id = $team_id";
        $result = $this->db->select($query);
        $value = $result->fetch_assoc();
        $runs = $value['runs'];

        $target = $runs + 1;

        $query4 = "update score_board set target='$target' where team_id='$team_id'";
        $team = $this->db->update($query4);

        // $remainingTeam = $this->getRemainingTeam($team_id);
        $get=$this->getRemainingTeam($team_id);
        $gets = $get->fetch_assoc();
        $remainingTeam= $gets['id'];

        $query4 = "update matches set decision=1 where team='$remainingTeam'";
        $result4 = $this->db->update($query4);

        $query4 = "update bowlingtable set status='0'";
        $result4 = $this->db->update($query4);

        $query4 = "update battingtable set status='0',striker_status='0'";
        $result4 = $this->db->update($query4);

        // echo '<script>window.location.replace("addOpener.php")</script>';
    }

    public function getAllValue(){
        $query = "select * from bettable";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateValue($teamAv1,$teamAv2,$sessionOverV1,$sessionOverV2,$xBollV1,$xBollV2){
        $query = "update bettable set teamAv1='$teamAv1',teamAv2='$teamAv2',sessionOverV1='$sessionOverV1',sessionOverV2='$sessionOverV2',xBollV1='$xBollV1',xBollV2='$xBollV2'";
        $result = $this->db->update($query);

    }

    public function updateLastBAll($value){

        $query = "select * from sixballs";
        $result = $this->db->select($query);
        $result1=$result->fetch_assoc();
        $arr = array();

        $arr[0] =$result1['b1'];
        $arr[1] =$result1['b2'];
        $arr[2] =$result1['b3'];
        $arr[3] =$result1['b4'];
        $arr[4] =$result1['b5'];
        $arr[5] =$result1['b6'];

        $query1 = "UPDATE sixballs SET b1='$arr[1]',b2='$arr[2]',b3='$arr[3]',b4='$arr[4]',b5='$arr[5]',b6='$value'";
        $result1 = $this->db->update($query1);
    }
    public function resetBall(){
        
        $query1 = "UPDATE sixballs SET b1='0',b2='0',b3='0',b4='0',b5='0',b6='0'";
        $result1 = $this->db->update($query1);


    }
    public function finishMatch(){
        
        $query = "DELETE FROM matches";
        $result = $this->db->update($query);

        $query2 = "DELETE FROM team";
        $result2 = $this->db->update($query2);

        $query3 = "DELETE FROM battingtable";
        $result3 = $this->db->update($query3);

        $query4 = "DELETE FROM bowlingtable";
        $result4 = $this->db->update($query4);

        $query5 = "DELETE FROM players";
        $result5 = $this->db->update($query5);

        $query6 = "DELETE FROM score_board";
        $result6 = $this->db->update($query6);

        $query7 = "DELETE FROM players";
        $result7 = $this->db->update($query7);

        $query8 = "UPDATE sixballs SET b1='0',b2='0',b3='0',b4='0',b5='0',b6='0'";
        $result8 = $this->db->update($query8);

        $query9 = "UPDATE bettable SET teamAv1='0',teamAv2='0',sessionOverV1='0',sessionOverV2='0',xBollV1='0',xBollV2='0'";
        $result9 = $this->db->update($query9);

        echo '<script>window.location.replace("addTeam.php")</script>';
    }
}
