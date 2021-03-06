<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Main Church Application">
        <meta name="author" content="IT Unit">

        <title>Main Church Application</title>

        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="assets/css/bootstrap.min.css"/>

        <!-- MetisMenu CSS -->
        <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>

    </head>

    <body>
        <div id="wrapper">
            <!-- The div below will only show when the day is to be ended. It is hidden by default -->
            <div id="end-the-day-notification">
                <day id="notification-wrapper">
                    <p class="end-day-info">This action is Irreversible! Are you sure you want to end the day?</p>
                    <div id="btns-holder">
                        <div class="do-not-end-day special_btn">Cancel</div>
                        <a class="special_btn end" href="day_end.php">End the Day</a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true && $_SESSION['admin_type']==='cashier'): ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#">
                            <div class="logo-container">
                            <div class="logo">
                                <img src="assets/img/logo_sm.png">
                            </div>
                            <div class="brand">
                            Main Church Application
                            </div>
                        </div>
                        </a>
                    </div>
                    <!-- /.navbar-header -->
                    <ul class="nav navbar-top-links navbar-right">
                        <!-- /.dropdown -->
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->
                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                                </li>
                                <li <?php echo (CURRENT_PAGE == "members.php" || CURRENT_PAGE == "add_member.php") ? 'class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-user-circle fa-fw"></i> Members<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="members.php"><i class="fa fa-list fa-fw"></i>List all</a>
                                        </li>
                                        <li>
                                            <a href="add_member.php"><i class="fa fa-plus fa-fw"></i>Add New</a>
                                        </li>
                                    </ul>
                                </li>

                                <?php
                                    // If Day has ended, hide the income navigations
                                    $db = getDbInstance();
                                    $db->where("day", date('Y-m-d'));
                                    $db->where("day_ended", true);
                                    $db->where("day_ended_for", $_SESSION["username"]);
                                    $row = $db->get('start_and_end_day_controller');
                                    if ($db->count ===0) {?>
                                    <li>
                                        <a href="#"><i class="fa fa-money"></i> Income<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="#"><i class="fa fa-money"></i> Insurance<span class="fa arrow"></span></a>
                                                <ul class="nav nav-second-level">
                                                    <li>
                                                        <a href="insurance.php"><i class="fa fa-money"></i> Premium Recieved</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-credit-card"></i> Indemnity/Compensation Received </a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-money"></i> Tithe<span class="fa arrow"></span></a>
                                                <ul class="nav nav-second-level">
                                                    <li>
                                                        <a href="add_tithe.php"><i class="fa fa-credit-card"></i> Post Tithe</a>
                                                    </li>
                                                    <li>
                                                        <a href="reverse_tithe.php"><i class="fa fa-undo"></i> Tithe Reversal</a>
                                                    </li>
                                                    <li>
                                                        <a href="daily_transact_grid.php"><i class="fa fa-eye"></i> View Transactions</a>
                                                    </li>
                                                    <li>
                                                        <a href="reprint_tithe.php"><i class="fa fa-search"></i> Search Receipt(s)</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-line-chart"></i> Reports </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="other_payment.php"><i class="fa fa-money"></i> Other Payments</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php
                                        } //End of day closing if statement
                                ?>
                                <li class="end-the-day">
                                    <p class="end-or-start-day">
                                        <i class="fa fa-hourglass-end"></i> End the Day
                                    </p>
                                </li>
                                <li>
                                    <a href="cash_analysis.php"><i class="fa fa-money"></i> End of Day Cash Analysis</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
            <?php endif;?>
            <!-- The End of the Header -->