<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Client Training Center</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'includes/navbar.php'?>
    
    <?php
    // session_start();
    include_once 'classes/Team.php';
	$tm=new Team();

    $check = $tm->check_openers();

    if ($check) {
    

    if (isset($_POST['update']))
    {
        $striker=$_POST['striker'];
        $runs=$_POST['runs'];
		$runType=$_POST['runType'];
        // $match_status=$_POST['match_status'];
        $nonStriker=$_POST['nonStriker'];
        $newStriker=$_POST['newStriker'];
        $outPlayer = $_POST['outPlayer'];
		$newPlayer=$_POST['newPlayer'];
        $bowler=$_POST['bowler'];
        $newBowler=$_POST['newBowler'];

        // if ($match_status != "") {
        //     $tm->updateMatchSatausByPara($match_status);
        //     echo '<script>window.location.replace("addScore.php")</script>';
        // }

        if ($newStriker) {
        $tm->updateStriker($newStriker);
        }
        if ($runs or $runs == 0) {
            if ($runType) {
                $tm->updateLastBAll($runType);
                $tm->updateExtras($runs,$striker);
                $tm->remaningBallsAndRuns();
            }else{
                $tm->updateLastBAll($runs);
                 $_SESSION['balls']=$re_balls = $tm->updateRun($runs, $striker, $bowler);

                $tm->remaningBallsAndRuns();
            }
            // echo '<script>window.location.replace("addScore.php")</script>';
        }
        
        if ($newBowler) {
            $tm->updateBowler($bowler, $newBowler);
            echo '<script>window.location.replace("addScore.php")</script>';
        }
        if ($newPlayer) {
            $tm->updateLastBAll("O");
            $tm->outPlayer($outPlayer, $newPlayer);
            $tm->remaningBallsAndRuns();
            echo '<script>window.location.replace("addScore.php")</script>';
        }
    $tm->save_history($bowler,$striker,$runs,$runType,$newPlayer,$outPlayer);
    }
    if (isset($_POST['change'])) {

        $striker=$_POST['striker'];
        $tm->resetBall();
        $tm->changeTeam($striker);
        
    }
    if (isset($_POST['finish'])) {

        $tm->updateMatchSataus();

    }
    if (isset($_POST['undo'])) {

        $tm->undoLastBall();

    }

    if (isset($_POST['delete'])) {

        $tm->finishMatch();

    }

    // if (!$runType) {
    //     $runType = "";
    // }
    // if (!$outPlayer) {
    //     $outPlayer = 0;
    // }



    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Data</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-----New Row---->
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Update Score</b>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="col-lg-12" method="post" action="addScore.php">
                                 <div class="row">
                                     <div style="color:red; text-align: center; font-size:16px;"><?php
                                         // if (isset($_POST['update'])) {
                                         //     echo "$check";
                                         // }
                                         ?>
                                  </div>
                                 </div>
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label>Runs:</label>
								<input class="form-control" name="runs" placeholder="Enter Runs">
                            </div>

								<div class="form-group">
									<label>Run Type:</label>
									<select class="form-control" name="runType">
                                       <option value="">Choose Run Type</option>
                                       <option value="WD">WD</option>
                                       <option value="LB">LB</option>
                                       <option value="NB">NB</option>
                                       <option value="BY">BY</option>
                                   </select>
								</div>

                               <!--  <div class="form-group">
                                <label>Match Status:</label>
                                <input class="form-control" name="match_status" placeholder="Enter Match Status">
                            </div> -->
                            
                            </div>

                            <!-- <div class="col-lg-12 text-center">
                            <button type="submit" name="addteam" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Add Team</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                            </div>
                        </form>
 -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Update Player</b>
                    </div>
                    <div class="panel-body">
                                 <div class="row">
                                     <div style="color:red; text-align: center; font-size:16px;"><?php
                                         if (isset($_POST['addteam'])) {
                                             echo "$check";
                                         }
                                         ?>
                                  </div>
                                 </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>Striker:</label>
                                <?php
                                    $get=$tm->getStrikePlayer('1');
                                    if($get)
                                    {
                                        $value=$get->fetch_assoc();
                                    }?>
                                <input class="form-control"  placeholder="Enter Overs" value="<?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?>" readonly>
                                 <input type="hidden" name="striker" value="<?php echo $value['player_id']; ?>">
                            </div>
                                    <div class="form-group">
                                    <label>Change Striker:</label>
                                   <select class="form-control" name="newStriker">
                                    <option value="">Choose Striker</option>
                                    <?php
                                    // $get=$tm->getAllTeam();
                                    $get=$tm->getBattingPlayer('1');
                                    if($get)
                                    {
                                        while ($value=$get->fetch_assoc())
                                        { 
                                    ?>
                                            <option value="<?php echo $value['player_id']; ?>"><?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?></option>
                                        <?php }} ?>
                                </select>
                                </div>
                                
                            
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label>Non Striker:</label>
                                <?php
                                    $get=$tm->getStrikePlayerAndStatus();
                                    if($get)
                                    {
                                        $value=$get->fetch_assoc();
                                    }?>
                                <input class="form-control" name="" placeholder="Enter Overs" value="<?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?>" readonly>
                                 <input type="hidden" name="nonStriker" value="<?php echo $value['player_id']; ?>">
                            </div>
                                <div class="form-group">
                                    <label>Choose Out Player:</label>
                                   <select class="form-control" name="outPlayer">
                                    <option value="">Choose Out Player</option>
                                    <?php
                                    // $get=$tm->getAllTeam();
                                    $get=$tm->getBattingPlayer('1');
                                    if($get)
                                    {
                                        while ($value=$get->fetch_assoc())
                                        { 
                                    ?>
                                            <option value="<?php echo $value['player_id']; ?>"><?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?></option>
                                        <?php }} ?>
                                </select>
                                </div>

                            </div>
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Choose Player:if One is Out</label>
                                   <select class="form-control" name="newPlayer">
                                    <option value="">Choose Player</option>
                                    <?php
                                            $get=$tm->getTeamByDecision('1');
                                            if($get)
                                            {
                                                $value1=$get->fetch_assoc();
                                            $get1=$tm->getAllPlayerByStatusAndTeam('0',$value1['team']);
                                            while($value=$get1->fetch_assoc()){
                                    ?>
                                            <option value="<?php echo $value['id']; ?>"><?php
                                 echo $value['player_name'] ?></option>
                                        <?php }}?>
                                </select>
                                </div>
                            </div>

                            <!-- <div class="col-lg-12 text-center">
                            <button type="submit" name="addteam" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Add Team</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                            </div>
                        </form>
 -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Update Bowler</b>
                    </div>
                    <div class="panel-body">
                                 <div class="row">
                                     <div style="color:red; text-align: center; font-size:16px;"><?php
                                         if (isset($_POST['update'])) {
                                            
                                            if ($_SESSION['balls'] == 6) {
                                                echo "<script>alert('Please Change Your Bowler!!')</script>";
                                            }else{
                                            // echo $_SESSION['balls'];

                                            }
                                             
                                         }
                                         ?>
                                  </div>
                                 </div>
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label>Bowler:</label>

                                <?php
                                    $get=$tm->getBowlerPlayer('1');
                                    if($get)
                                    {
                                        $value=$get->fetch_assoc();
                                    }?>
                                <input class="form-control" placeholder="Enter Overs" value="<?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?>" readonly>
                                 <input type="hidden" name="bowler" value="<?php echo $value['player_id']; ?>">
                            </div>

                                <div class="form-group">
                                    <label>Choose Bowler</label>
                                   <select class="form-control" name="newBowler">
                                    <option value="">Choose Player</option>
                                    <?php
                                            $get=$tm->getTeamByDecision('0');
                                            if($get)
                                            {
                                                $value1=$get->fetch_assoc();
                                            $get1=$tm->getAllPlayerByStatusAndTeam('0',$value1['team']);
                                            while($value=$get1->fetch_assoc()){
                                    ?>
                                            <option value="<?php echo $value['id']; ?>"><?php
                                 echo $value['player_name'] ?></option>
                                        <?php }}?>
                                </select>
                                </div>
                            
                            </div>

                            

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-12 text-center">
                            <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-sign-in fa-fw"></i> Update Data</button>
                            <button type="submit" onclick="return confirm('Are You Sure To Undo Last Ball')" name="undo" class="btn btn-primary"><i class="fa fa-sign-in fa-fw"></i> Undo Last Ball</button>
                            <button type="submit" onclick="return confirm('Are You Sure To Change Team')" name="change" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Change Team</button>
                            <button type="submit" name="finish" onclick="return confirm('Are you sure to finish Match!')" class="btn btn-danger"><i class="fa fa-sign-out fa-fw"></i> Finish Match</button>
                            <button type="submit" name="delete" onclick="return confirm('Are you sure to Delete Match! All Data will be Deleted')" class="btn btn-danger"><i class="fa fa-sign-out fa-fw"></i> Delete Match</button>
                        </form>

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<?php }else{
    echo '<script>window.location.replace("addOpener.php")</script>';
} ?>
</body>

</html>
