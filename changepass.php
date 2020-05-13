<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Al Ghani Petroleum PSO</title>

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
    include_once 'classes/adminLogin.php';
    if (isset($_POST['changePassword']))
    {
        $user=new adminlogin();
        $oldPassword=$_POST['Cpassword'];
        $newPassword=$_POST['Npassword'];
        $newPassword1=$_POST['NCpassword'];
        if($newPassword==$newPassword1) {
            $userCheck = $user->changePassword(session::get('adminId'), $oldPassword, $newPassword);
        }
        else echo "<script>alert('Password Not Match');</script>";
    }

    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Change Password</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-----New Row---->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Change Password</b>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="col-lg-7" method="post" action="changepass.php">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['changePassword'])) {
                                         if($userCheck!=false)
                                         {
                                             echo "<script>alert('$userCheck');</script>";
                                             session::destroy();
                                         }else
                                         {
                                             echo "<script>alert('Current Password Not Valid..');</script>";
                                         }
                                     }
                                     ?>
                                  </span>
                            <div class="form-group">
                                <label>Current Password:</label>
                                <input class="form-control"  required type="password" name="Cpassword"  minlength="5" placeholder="Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>New Password:</label>
                                <input class="form-control" required type="password" id="password" name="Npassword" minlength="5" placeholder="Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input class="form-control" required type="password" minlength="5" name="NCpassword" id="confirm_password" placeholder="Enter Password" />
                            </div>
                            <button type="submit" name="changePassword" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Change Password</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
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
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

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
