
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="dashboard.php">Client Training Center</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="changepass.php"><i class="fa fa-user fa-fw"></i>Change Password</a>
                </li>
                <li class="divider"></li>
                <li><a href="?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
                 <?php
                            if (isset($_GET['action']) && $_GET['action']=="logout") {
                                session::destroy();
                            }
                            ?>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search..." disabled>
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button" disabled>
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="###"><span class="glyphicon glyphicon-user"></span></i> Teams<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="addTeam.php">Add Team</a>
                        </li>
                        <li>
                            <a href="teamList.php">Manage Teams</a>
                        </li>
                        <li>
                            <a href="cteam.php">Upcoming Teams</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="##"><i class="fa fa fa-list-alt" aria-hidden="true"></i> Players<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="addPlayer.php">Add Player</a>
                        </li>
                        <li>
                            <a href="playerList.php">Manage Players</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="##"><i class="fa fa fa-list-alt" aria-hidden="true"></i> Matches<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="addMatch.php">Add Match</a>
                        </li>
                        <li>
                            <a href="matchBreak.php">Match Break</a>
                        </li>
                        <li>
                            <a href="updateValue.php">Update Values</a>
                        </li>
                        <li>
                            <a href="addOpener.php">Add Openers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="##"><i class="fa fa fa-list-alt" aria-hidden="true"></i> Scores<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="addScore.php">Add score</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
