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
    include_once 'classes/client.php';
    if (isset($_POST['addEmp']))
    {
        $emp=new Client();
        $name=$_POST['name'];
        $vatNo=$_POST['vatNo'];
        $location=$_POST['address'];
        $landNo=$_POST['landNo'];
        $email=$_POST['email'];
        $poNo=$_POST['poNo'];
        $check = $emp->addClient($name,$vatNo,$location,$landNo,$email,$poNo);
    }

    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Client</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-----New Row---->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Add Client</b>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="col-lg-7" method="post" action="addClient.php">
                                 <div class="row">
                                     <div style="color:red; text-align: center; font-size:16px;"><?php
                                         if (isset($_POST['addEmp'])) {
                                             echo "$check";
                                         }
                                         ?>
                                  </div>
                                 </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <input class="form-control"  required type="text" name="name"  placeholder="Enter Name" />
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <input class="form-control" required type="text" id="password" name="address" placeholder="Enter Address" />
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>Vat Number:</label>
                                <input class="form-control" required type="number" name="vatNo" id="confirm_password" placeholder="Enter Vat number" />
                            </div>
                                 <div class="form-group">
                                    <label>P.O Number:</label>
                                    <input class="form-control" required type="Number" name="poNo" id="confirm_password" placeholder="Enter Mobile Number" />
                                </div>
                            </div>
                             <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Email:(Optional)</label>
                                    <input class="form-control" type="Email" name="email" id="confirm_password" placeholder="Enter Email Address" />
                                </div>

                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Landline Number:</label>
                                    <input class="form-control" required type="Number" name="landNo" id="confirm_password" placeholder="Enter Mobile Number" />
                                </div>
                            </div>
                            <div class="col-lg-8">
                            <button type="submit" name="addEmp" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Add Client</button>
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
