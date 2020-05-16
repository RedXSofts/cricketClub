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
       $valuedate=$tm->getAllValue();
       if ($valuedate) {
        $value=$valuedate->fetch_assoc();
       }
    if (isset($_POST['update']))
    {
      
        $teamAv1=$_POST['teamAv1'];
        $teamAv2=$_POST['teamAv2'];
        $sessionOverV1=$_POST['sessionOverV1'];
        $sessionOverV2=$_POST['sessionOverV2'];
        $xBollV1=$_POST['xBollV1'];
        $xBollV2=$_POST['xBollV2'];
        $check = $tm->updateValue($teamAv1,$teamAv2,$sessionOverV1,$sessionOverV2,$xBollV1,$xBollV2);
    }

    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Client</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-----New Row---->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Update Client</b>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="col-lg-7" method="post" action="">
                                 <div class="row">
                                     <div style="color:red; text-align: center; font-size:16px;"><?php
                                         if (isset($_POST['addTeam'])) {
                                             echo "$check";
                                         }
                                         ?>
                                  </div>
                                 </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Team A Value 1:</label>
                                    <input class="form-control" value="<?php echo $value['teamAv1'];?>"  required type="text" name="teamAv1"  placeholder="Enter Name" />
                                </div>
                            
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Team A Value 2:</label>
                                    <input class="form-control" value="<?php echo $value['teamAv2']; ?>" required type="text"  name="teamAv2" placeholder="Enter Location" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Session Over V1:</label>
                                    <input class="form-control" value="<?php echo $value['sessionOverV1']; ?>"  required type="text" name="sessionOverV1"  placeholder="Enter Name" />
                                </div>
                            
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Session Over V2:</label>
                                    <input class="form-control" value="<?php echo $value['sessionOverV1']; ?>" required type="text"  name="sessionOverV2" placeholder="Enter Location" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>
                                    Add Team Name:</label>
                                    <input class="form-control" value="<?php echo $value['xBollV2']; ?>"  required type="text" name="xBollV1"  placeholder="Enter Name" />
                                </div>
                            
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Add Session Over:</label>
                                    <input class="form-control" value="<?php echo $value['xBollV1']; ?>" required type="text"  name="xBollV2" placeholder="Enter Location" />
                                </div>
                            </div>
                            
                            <div class="col-lg-12 text-center">
                            <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Update Value</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

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
