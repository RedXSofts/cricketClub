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
    include_once 'classes/Team.php';
	$tm=new Team();
    if (isset($_POST['update']))
    {
        $runs = 0;
        $runs=$_POST['runs'];
        $runs += $runs;
		$runType=$_POST['runType'];
		$striker=$_POST['striker'];
        $nonStriker=$_POST['nonStriker'];
        $newStriker=$_POST['newStriker'];
        $outPlayer = $_POST['outPlayer'];
		$newPlayer=$_POST['newPlayer'];
        $bowler=$_POST['bowler'];
        $newBowler=$_POST['newBowler'];

        $tm->updateRun($runs, $striker, $bowler);
        $tm->updateStriker($striker);
        // $check = $tm->createMatch($team,$decision,$stadium,$over);
    }

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
								<input class="form-control" name="runs" placeholder="Enter Overs">
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
                                <input class="form-control" name="striker" placeholder="Enter Overs" value="<?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?>" readonly>
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
                                    $get=$tm->getStrikePlayer('0');
                                    if($get)
                                    {
                                        $value=$get->fetch_assoc();
                                    }?>
                                <input class="form-control" name="nonStriker" placeholder="Enter Overs" value="<?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?>" readonly>
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
                                            <option value="<?php echo $value['player_id']; ?>"><?php
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
                                         if (isset($_POST['addteam'])) {
                                             echo "$check";
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
                                <input class="form-control" name="bowler" placeholder="Enter Overs" value="<?php

                                $get1=$tm->getAllPlayerById($value['player_id']);
                                $value1=$get1->fetch_assoc();

                                 echo $value1['player_name'] ?>" readonly>
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
                                            <option value="<?php echo $value['player_id']; ?>"><?php
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
                            <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Update Data</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                            </div>
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

</body>

</html>
