<?php
$cookie_name = "logged2";
if (!isset($_COOKIE[$cookie_name])) {
    if ($_COOKIE[$cookie_name] != "demo") {
        header('Location: login.html');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png"  href="favicon.ico">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>SWSAM | Summary</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <script>$.noConflict();</script>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body  page-fade" data-url="http://swsam.co.uk">

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <div class="sidebar-menu">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <!-- logo -->
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets/images/wizdom_logo.png" width="100" alt="" />
                            </a>
                        </div>

                        <!-- logo collapse icon -->
                        <div class="sidebar-collapse">
                            <a href="#" class="sidebar-collapse-icon" ><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>


                        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                        <div class="sidebar-mobile-menu visible-xs">
                            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>

                    </header>


                    <ul id="main-menu" class="main-menu">
                        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                        <li class="active opened active">
                            <a href="index.php">
                                <i class="entypo-gauge"></i>
                                <span class="title">Dashboards</span>
                            </a>
                            <ul>
                                <li class="active">
                                    <a href="summary.php">
                                        <span class="title">Summary</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php">
                                        <span class="title">Customer Experience</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">
                                        <span class="title">Network Performance</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">
                                        <span class="title">Regional Reports</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span class="title">Documentation</span>
                                        <span class="badge badge-success badge-roundless">v1.0</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="entypo-mail"></i>
                                <span class="title">Tickets</span>
                                <span class="badge badge-secondary">8</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="entypo-inbox"></i>
                                        <span class="title">Inbox</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="entypo-pencil"></i>
                                        <span class="title">Compose</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="entypo-attach"></i>
                                        <span class="title">View</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="entypo-chart-bar"></i>
                                <span class="title">Performance</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-flow-tree"></i>
                                <span class="title">Regional</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="entypo-flow-line"></i>
                                        <span class="title">North</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="entypo-flow-line"></i>
                                        <span class="title">Central</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="entypo-flow-line"></i>
                                        <span class="title">South</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="entypo-flow-parallel"></i>
                                                <span class="title">Network Health</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="entypo-flow-parallel"></i>
                                                <span class="title">Top Applications</span>
                                            </a>

                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <header class="logo-env">


                        <div class="logo">
                            <a href="http://swsam.co.uk">
                                <img src="assets/images/swsam.png" width="120" alt="" />
                            </a>
                        </div>
                    </header>			

                </div>

            </div>

            <div class="main-content">

                <div class="row">

                    <!-- Profile Info and Notifications -->
                    <div class="col-md-6 col-sm-8 clearfix">

                        <ul class="user-info pull-left pull-none-xsm">

                            <!-- Profile Info -->
                            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
                                    Thomas Anderson
                                </a>

                                <ul class="dropdown-menu">

                                    <!-- Reverse Caret -->
                                    <li class="caret"></li>

                                    <!-- Profile sub-links -->
                                    <li>
                                        <a href="#">
                                            <i class="entypo-user"></i>
                                            Edit Profile
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="entypo-mail"></i>
                                            Inbox
                                        </a>
                                    </li>


                                    <li>
                                        <a href="#">
                                            <i class="entypo-clipboard"></i>
                                            Tasks
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                        <ul class="user-info pull-left pull-right-xs pull-none-xsm">

                            <!-- Raw Notifications -->
                            <li class="notifications dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="entypo-attention"></i>
                                    <span class="badge badge-info">6</span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="top">
                                        <p class="small">
                                            <a href="#" class="pull-center">Mark all Read</a>
                                            You have <strong>3</strong> new notifications.
                                        </p>
                                    </li>

                                    <li>
                                        <ul class="dropdown-menu-list scroller">
                                            <li class="unread notification-success">
                                                <a href="#">
                                                    <i class="entypo-plus-squared pull-right"></i>

                                                    <span class="line">
                                                        <strong>New ticket opened for your region</strong>
                                                    </span>

                                                    <span class="line small">
                                                        30 seconds ago
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="unread notification-secondary">
                                                <a href="#">
                                                    <i class="entypo-bell pull-right"></i>

                                                    <span class="line">
                                                        <strong>Task TSK0039844 overdue</strong>
                                                    </span>

                                                    <span class="line small">
                                                        25 minutes ago
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="notification-primary">
                                                <a href="#">
                                                    <i class="entypo-user pull-right"></i>

                                                    <span class="line">
                                                        <strong>Profile Updated</strong>
                                                    </span>

                                                    <span class="line small">
                                                        3 hours ago
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="notification-danger">
                                                <a href="#">
                                                    <i class="entypo-cancel-circled pull-right"></i>

                                                    <span class="line">
                                                        Ticket TN0098983 status escalated to Severe
                                                    </span>

                                                    <span class="line small">
                                                        9 hours ago
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="notification-info">
                                                <a href="#">
                                                    <i class="entypo-info pull-right"></i>

                                                    <span class="line">
                                                        Ticket TN0084747 status changed to resolved
                                                    </span>

                                                    <span class="line small">
                                                        yesterday at 10:30am
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="notification-warning">
                                                <a href="#">
                                                    <i class="entypo-rss pull-right"></i>

                                                    <span class="line">
                                                        New comments waiting approval
                                                    </span>

                                                    <span class="line small">
                                                        last week
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="external">
                                        <a href="#">View all notifications</a>
                                    </li>
                                </ul>

                            </li>

                            <!-- Message Notifications -->
                            <li class="notifications dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="entypo-mail"></i>
                                    <span class="badge badge-secondary">2</span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <form class="top-dropdown-search">

                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search..." name="s" />
                                            </div>

                                        </form>

                                        <ul class="dropdown-menu-list scroller">
                                            <li class="active">
                                                <a href="#">
                                                    <span class="image pull-right">
                                                        <img src="assets/images/morpheus.jpg" width = "60" alt="" class="img-circle" />
                                                    </span>

                                                    <span class="line">
                                                        <strong>Morpheus Fishburne</strong>
                                                        - yesterday
                                                    </span>

                                                    <span class="line desc small">
                                                        Customer CX93848 is complaining of choppy video calls over Skype.
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="active">
                                                <a href="#">
                                                    <span class="image pull-right">
                                                        <img src="assets/images/trinity.jpg" width = "60" alt="" class="img-circle" />
                                                    </span>

                                                    <span class="line">
                                                        <strong>Trinity Moss</strong>
                                                        - 2 days ago
                                                    </span>

                                                    <span class="line desc small">
                                                        Assigning TN00874848 to you. Seems like another slow browsing issue due to DNS latency. 
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <span class="image pull-right">
                                                        <img src="assets/images/smith.jpg" width = "60" alt="" class="img-circle" />
                                                    </span>

                                                    <span class="line">
                                                        Smith Weaving
                                                        - a week ago
                                                    </span>

                                                    <span class="line desc small">
                                                        South region performance degrading since yesterday.
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <span class="image pull-right">
                                                        <img src="assets/images/cypher.jpg" width = "60" alt="" class="img-circle" />
                                                    </span>

                                                    <span class="line">
                                                        Cypher Pantoliano
                                                        - 16 days ago
                                                    </span>

                                                    <span class="line desc small">
                                                        Your attention required for TN00738947 before closing the ticket.
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="external">
                                        <a href="#">All Messages</a>
                                    </li>
                                </ul>

                            </li>

                            <!-- Task Notifications -->
                            <li class="notifications dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="entypo-list"></i>
                                    <span class="badge badge-warning">5</span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="top">
                                        <p>You have 4 pending tasks</p>
                                    </li>

                                    <li>
                                        <ul class="dropdown-menu-list scroller">
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Performance Evaluation</span>
                                                        <span class="percent">27%</span>
                                                    </span>

                                                    <span class="progress">
                                                        <span style="width: 27%;" class="progress-bar progress-bar-success">
                                                            <span class="sr-only">27% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">QoS Tuning</span>
                                                        <span class="percent">83%</span>
                                                    </span>

                                                    <span class="progress progress-striped">
                                                        <span style="width: 83%;" class="progress-bar progress-bar-danger">
                                                            <span class="sr-only">83% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Market Feedback</span>
                                                        <span class="percent">91%</span>
                                                    </span>

                                                    <span class="progress">
                                                        <span style="width: 91%;" class="progress-bar progress-bar-success">
                                                            <span class="sr-only">91% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Gaming research</span>
                                                        <span class="percent">12%</span>
                                                    </span>

                                                    <span class="progress progress-striped">
                                                        <span style="width: 12%;" class="progress-bar progress-bar-warning">
                                                            <span class="sr-only">12% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Create Backup</span>
                                                        <span class="percent">100%</span>
                                                    </span>

                                                    <span class="progress progress-striped">
                                                        <span style="width: 100%;" class="progress-bar progress-bar-info">
                                                            <span class="sr-only">100% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="external">
                                        <a href="#">See all tasks</a>
                                    </li>
                                </ul>

                            </li>

                        </ul>

                    </div>


                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                        <ul class="list-inline links-list pull-right">

                            <!-- Language Selector -->
                            <li class="dropdown language-selector">

                                Language: &nbsp;
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                                    <img src="assets/images/flag-uk.png" />
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#">
                                            <img src="assets/images/flag-de.png" />
                                            <span>Deutsch</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="#">
                                            <img src="assets/images/flag-uk.png" />
                                            <span>English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/images/flag-fr.png" />
                                            <span>François</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img src="assets/images/flag-es.png" />
                                            <span>Español</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li class="sep"></li>


                            <li>
                                <a href="#" data-toggle="chat" data-collapse-sidebar="1">
                                    <i class="entypo-chat"></i>
                                    Chat

                                    <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
                                </a>
                            </li>

                            <li class="sep"></li>

                            <li>
                                <a href="login.html">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

                <hr />


                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <h1>Summary</h1>
                            <h3>- Application Level</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Top Domains By Hits (Millions)</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <h5>Youtube.com</h5>
                                <div class="progress progress-striped active">
                                    <div style="width: 90.3%" aria-valuemax="1000" aria-valuemin="0" aria-valuenow="903" role="progressbar" class="progress-bar progress-bar-danger">
                                        <span>903</span>
                                    </div>
                                </div>

                                <h5>facebook.com</h5>
                                <div class="progress progress-striped active">
                                    <div style="width: 82.1%" aria-valuemax="1000" aria-valuemin="0" aria-valuenow="821" role="progressbar" class="progress-bar progress-bar-info">
                                        <span>821</span>
                                    </div>
                                </div>

                                <h5>instagram.com</h5>
                                <div class="progress progress-striped active">
                                    <div style="width: 78.6%" aria-valuemax="1000" aria-valuemin="0" aria-valuenow="786" role="progressbar" class="progress-bar progress-bar-success">
                                        <span>786</span>
                                    </div>
                                </div>

                                <h5>snapchat.com</h5>
                                <div class="progress progress-striped active">
                                    <div style="width: 55.1%" aria-valuemax="1000" aria-valuemin="0" aria-valuenow="551" role="progressbar" class="progress-bar progress-bar-warning">
                                        <span>551</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Top Packages By Subscribers</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="pkgBySubs" style="margin: 0 auto"></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Top Applications</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="topApps" style="margin: 0 auto"></div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Youtube Quality</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="ytDonutChart" style="margin: 0 auto"></div>
                                <div id="ytBarChart" style="margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Facebook Quality</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="fbDonutChart" style="margin: 0 auto"></div>
                                <div id="fbBarChart" style="margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Snapchat Quality</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="snapDonutChart" style="margin: 0 auto"></div>
                                <div id="snapBarChart" style="margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Instagram Quality</div>

                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="instaDonutChart" style="margin: 0 auto"></div>
                                <div id="instaBarChart" style="margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="main">

                    &copy; 2015 <strong>Dashboards</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

                </footer>
            </div>


            <div id="chat" class="fixed" data-current-user="Anderson" data-order-by-status="1" data-max-chat-history="25">

                <div class="chat-inner">


                    <h2 class="chat-header">
                        <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

                        <i class="entypo-users"></i>
                        Chat
                        <span class="badge badge-success is-hidden">0</span>
                    </h2>


                    <div class="chat-group" id="group-1">
                        <strong>Favorites</strong>

                        <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Maggie Greene</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Rick Grimes</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Carol Peletier</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Carl Grimes</em></a>
                        <a href="#"><span class="user-status is-idle"></span> <em>Merle Dixon</em></a>
                    </div>


                    <div class="chat-group" id="group-2">
                        <strong>Call Center</strong>

                        <a href="#"><span class="user-status is-offline"></span> <em>Tyreese Coleman</em></a>
                        <a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Hershel Greene</em></a>
                    </div>


                    <div class="chat-group" id="group-3">
                        <strong>IT</strong>

                        <a href="#"><span class="user-status is-busy"></span> <em>Tara Chambler</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Shane Walsh</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Lori Grimes</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Noah Williams</em></a>
                    </div>

                </div>

                <!-- conversation template -->
                <div class="chat-conversation">

                    <div class="conversation-header">
                        <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

                        <span class="user-status"></span>
                        <span class="display-name"></span>
                        <small></small>
                    </div>

                    <ul class="conversation-body">
                    </ul>

                    <div class="chat-textarea">
                        <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                    </div>

                </div>

            </div>


            <!-- Chat Histories -->
            <ul class="chat-history" id="sample_history">
                <li>
                    <span class="user">Anderson</span>
                    <p>Are you there?</p>
                    <span class="time">09:00</span>
                </li>

                <li class="opponent">
                    <span class="user">Maggie Greene</span>
                    <p>Yes. Whats Up?</p>
                    <span class="time">09:25</span>
                </li>

                <li class="opponent">
                    <span class="user">Maggie Greene</span>
                    <p>Seems like you are busy!</p>
                    <span class="time">09:26</span>
                </li>

                <li class="opponent unread">
                    <span class="user">Maggie Greene</span>
                    <p>Did you figure out the issue?</p>
                    <span class="time">09:27</span>
                </li>
            </ul>




            <!-- Chat Histories -->
            <ul class="chat-history" id="sample_history_2">
                <li class="opponent unread">
                    <span class="user">Andrea Holden</span>
                    <p>I am going out.</p>
                    <span class="time">08:21</span>
                </li>

                <li class="opponent unread">
                    <span class="user">Andrea Holden</span>
                    <p>Call me when you see this message.</p>
                    <span class="time">08:27</span>
                </li>
            </ul>


        </div>






        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/main-gsap.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>
        <script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


        <!-- Imported scripts on this page -->
        <!--<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>-->
        <script src="assets/js/jvectormap/jquery-jvectormap-uk-merc-en.js"></script>
        <script src="assets/js/jvectormap/jquery-jvectormap-uk-em-merc-en.js"></script>
        <script src="assets/js/jquery.sparkline.min.js"></script>
        <script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
        <script src="assets/js/rickshaw/rickshaw.min.js"></script>
        <script src="assets/js/raphael-min.js"></script>
        <script src="assets/js/morris.min.js"></script>
        <script src="assets/js/toastr.js"></script>
        <script src="assets/js/neon-chat.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>

        <!-- Custom Scripts - Arslan -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <script type="text/javascript">
            jQuery(function ($) {
                // Package By Subscribers Chart
                $('#pkgBySubs').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    exporting: {buttons: false},
                    title: false,
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.num}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.num}',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                            name: 'Packages',
                            colorByPoint: true,
                            data: [{
                                    name: 'Youtube',
                                    y: 35,
                                    num: 901
                                }, {
                                    name: 'Facebook',
                                    y: 30,
                                    num: 821
                                }, {
                                    name: 'Instagram',
                                    y: 25,
                                    num: 700
                                }, {
                                    name: 'Snapchat',
                                    y: 7,
                                    num: 200
                                }, {
                                    name: 'App Store',
                                    y: 3,
                                    num: 50
                                }],
                            colors: [
                                '#cc2424', // youtube
                                '#21a9e1', // fb
                                '#00a651', // instagram
                                '#fad839', // snapchat
                                '#1C78F5'  // app store
                            ]
                        }],
                    credits: {enabled: false}
                });


                // Custom Colors 
                $('#topApps').highcharts({
                    chart: {
                        type: 'column'
                    },
                    exporting: {buttons: false},
                    plotOptions: {
                        column: {
                            colorByPoint: true
                        }
                    },
                    title: false,
                    xAxis: {
                        type: 'category',
                        labels: {
                            rotation: -45
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Total BW (CBs)'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: '<b>{point.y}</b>'
                    },
                    series: [{
                            name: 'Top Apps',
                            data: [
                                ['Youtube', 52000],
                                ['Facebook', 12000],
                                ['Instagram', 5000],
                                ['Snapchat', 2000],
                                ['App Store', 1000]
                            ],
                            colors: [
                                '#cc2424', // youtube
                                '#21a9e1', // fb
                                '#00a651', // instagram
                                '#fad839', // snapchat
                                '#1C78F5'  // app store
                            ]
                        }],
                    credits: {enabled: false}
                });


                // Youtube Donut Chart + Bar Chart
                var ytDonutChart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'ytDonutChart',
                        title: {
                            text: ""
                        }
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: {
                        align: 'center',
                        verticalAlign: 'middle',
                        width: 32,
                        x: 30,
                        y: 0
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'Youtube Quality',
                            innerSize: '70%',
                            data: [
                                ['Good', 80],
                                ['Medium', 15],
                                ['Poor', 5]
                            ],
                            colors: [
                                '#FF8A8A', // good
                                '#FF5757', // medium
                                '#cc2424'   // poor
                            ]
                        }]
                });
                ytDonutChart.setTitle({
                    useHTML: true,
                    text: '<img src="https://cdn2.iconfinder.com/data/icons/micon-social-pack/512/youtube2-32.png"/>'
                });
                $('#ytBarChart').highcharts({
                    chart: {
                        type: 'column'
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: false,
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Bandwidth (Gbps)'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            colorByPoint: true
                        }
                    },
                    tooltip: false,
                    series: [{
                            name: 'Population',
                            data: [
                                ['iPhone 6S', 2300],
                                ['iPhone 6 Plus', 1500],
                                ['iPhone 5S', 1100],
                                ['Galaxy S6', 500],
                                ['Note 3', 200]
                            ],
                            colors: [
                                '#FF8A8A'
                            ],
                            dataLabels: {
                                enabled: true
                            }
                        }]
                });


                // FB Donut Chart + Bar Chart
                var fbDonutChart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'fbDonutChart',
                        title: {
                            text: ""
                        }
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: {
                        align: 'center',
                        verticalAlign: 'middle',
                        width: 32,
                        x: 30,
                        y: 0
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'Facebook Quality',
                            innerSize: '70%',
                            data: [
                                ['Good', 80],
                                ['Medium', 15],
                                ['Poor', 5]
                            ],
                            colors: [
                                '#21A9E1', // good
                                '#005D95', // medium
                                '#00437B'   // poor
                            ]
                        }]
                });
                fbDonutChart.setTitle({
                    useHTML: true,
                    text: '<img src="https://cdn2.iconfinder.com/data/icons/micon-social-pack/512/facebook-32.png"/>'
                });
                $('#fbBarChart').highcharts({
                    chart: {
                        type: 'column'
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: false,
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Bandwidth (Gbps)'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            colorByPoint: true
                        }
                    },
                    tooltip: false,
                    series: [{
                            name: 'Population',
                            data: [
                                ['iPhone 6S', 2300],
                                ['iPhone 6 Plus', 1500],
                                ['iPhone 5S', 1100],
                                ['Galaxy S6', 500],
                                ['Note 3', 200]
                            ],
                            colors: [
                                '#21A9E1'
                            ],
                            dataLabels: {
                                enabled: true
                            }
                        }]
                });



                // Instagram Donut Chart + Bar Chart
                var instaDonutChart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'instaDonutChart',
                        title: {
                            text: ""
                        }
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: {
                        align: 'center',
                        verticalAlign: 'middle',
                        width: 32,
                        x: 30,
                        y: 0
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'Instagram Quality',
                            innerSize: '70%',
                            data: [
                                ['Good', 80],
                                ['Medium', 15],
                                ['Poor', 5]
                            ],
                            colors: [
                                '#1AC06B', // good
                                '#008D38', // medium
                                '#004100'   // poor
                            ]
                        }]
                });
                instaDonutChart.setTitle({
                    useHTML: true,
                    text: '<img src="https://cdn2.iconfinder.com/data/icons/micon-social-pack/512/instagram-32.png"/>'
                });
                $('#instaBarChart').highcharts({
                    chart: {
                        type: 'column'
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: false,
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Bandwidth (Gbps)'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            colorByPoint: true
                        }
                    },
                    tooltip: false,
                    series: [{
                            name: 'Population',
                            data: [
                                ['iPhone 6S', 2300],
                                ['iPhone 6 Plus', 1500],
                                ['iPhone 5S', 1100],
                                ['Galaxy S6', 500],
                                ['Note 3', 200]
                            ],
                            colors: [
                                '#1AC06B'
                            ],
                            dataLabels: {
                                enabled: true
                            }
                        }]
                });


                // Snapchat Donut Chart + Bar Chart
                var snapDonutChart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'snapDonutChart',
                        title: {
                            text: ""
                        }
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: {
                        align: 'center',
                        verticalAlign: 'middle',
                        width: 32,
                        x: 30,
                        y: 0
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'SnapChat Quality',
                            innerSize: '70%',
                            data: [
                                ['Good', 80],
                                ['Medium', 15],
                                ['Poor', 5]
                            ],
                            colors: [
                                '#FAD839', // good
                                '#E1BF20', // medium
                                '#AE8C00'   // poor
                            ]
                        }]
                });
                snapDonutChart.setTitle({
                    useHTML: true,
                    text: '<img src="https://cdn0.iconfinder.com/data/icons/social-flat-rounded-rects/512/snapchat-32.png"/>'
                });
                $('#snapBarChart').highcharts({
                    chart: {
                        type: 'column'
                    },
                    credits: {enabled: false},
                    exporting: {buttons: false},
                    title: false,
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Bandwidth (Gbps)'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            colorByPoint: true
                        }
                    },
                    tooltip: false,
                    series: [{
                            name: 'Population',
                            data: [
                                ['iPhone 6S', 2300],
                                ['iPhone 6 Plus', 1500],
                                ['iPhone 5S', 1100],
                                ['Galaxy S6', 500],
                                ['Note 3', 200]
                            ],
                            colors: [
                                '#FAD839'
                            ],
                            dataLabels: {
                                enabled: true
                            }
                        }]
                });
            });
        </script>
    </body>
</html>