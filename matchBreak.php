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
    if (isset($_POST['statusbtn']))
    {
       // echo '<script>alert("$_POST['status']")</script>';
        $status=$_POST['status'];
        // echo $status;
        // $_POST['status'];
        $check = $tm->updateStatus($status);
    }

    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Put Match On Break</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-----New Row---->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Put Match On Break</b>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="col-lg-12" method="post" action="matchBreak.php">
                            <div class="row">
                                <div style="color:red; text-align: center; font-size:16px;"><?php
                                    if (isset($_POST['status'])) {
                                        echo "$check";
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Enter Match Status</label>
                                            <!-- <select name="status" class="form-control">
                                                <option>choose status</option>
                                                <option>Continue</option>
                                                <option>Break</option>
                                                <option>Cancel</option>
                                            </select> -->
                                            <input type="text" name="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" name="statusbtn" class="btn btn-primary">Update</button>
                                </div>
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
