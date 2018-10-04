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
        <<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="Farhan Jee" />

        <title>Cancer Hope | Matching System For Cancer Support</title>

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
                                <img src="assets/images/cancerhope_logo.png" width="100" alt="" />
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
                                <li>
                                    <a href="summary.php">
                                        <span class="title">Summary</span>
                                    </a>
                                </li>
                                <li class="active">
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


                <script type="text/javascript">

                    jQuery(document).ready(function ($)
                    {
                        // Sample Toastr Notification
                        setTimeout(function ()
                        {
                            var opts = {
                                "closeButton": true,
                                "debug": false,
                                "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-center",
                                "toastClass": "black",
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "4000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };

                            toastr.success("3 new tickets were raised", "You have 5 new notifications", opts);
                        }, 3000);


                        // Sparkline Charts
                        $('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'});
                        $('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'});
                        $('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'});
                        $('.bar').sparkline([[1, 4], [2, 3], [3, 2], [4, 1]], {type: 'bar'});
                        $('.pie').sparkline('html', {type: 'pie', borderWidth: 0, sliceColors: ['#3d4554', '#ee4749', '#00b19d']});
                        $('.linechart').sparkline();
                        $('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'});
                        $('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'});


                        $(".monthly-sales").sparkline([35, 40, 32, 32, 36, 28, 32, 32, 37, 0, 64, 32], {
                            type: 'bar',
                            barColor: '#485671',
                            height: '80px',
                            barWidth: 20,
                            barSpacing: 5
                        });


                        // JVector Maps
                        var map = $("#map");

                        map.vectorMap({
                            map: 'uk_merc_en',
                            zoomMin: '3',
                            backgroundColor: '#383f47',
                            focusOn: {x: 0.5, y: 0.8, scale: 3}
                        });



                        // Line Charts
                        var line_chart_demo = $("#line-chart-demo");

                        var line_chart = Morris.Bar({
                            element: 'line-chart-demo',
                            data: [
                                {y: 'Browsing', a: 8, b: 9, c: 8},
                                {y: 'Streaming', a: 7, b: 9, c: 8},
                                {y: 'Social Networking', a: 9, b: 9, c: 8},
                                {y: 'Gaming', a: 6, b: 6, c: 5},
                                {y: 'VoIP', a: 3, b: 6, c: 5}
                            ],
                            xkey: 'y',
                            ykeys: ['a', 'b', 'c'],
                            labels: ['Last Week', 'Yesterday', 'Today'],
                            ymax: 10,
                            redraw: true,
                            hideHover: 'auto'
                        });

                        line_chart_demo.parent().attr('style', '');


                        // Donut Chart
                        var donut_chart_demo = $("#donut-chart-demo");

                        donut_chart_demo.parent().show();

                        var donut_chart = Morris.Donut({
                            element: 'donut-chart-demo',
                            data: [
                                {label: "Good", value: getRandomInt(10, 60)},
                                {label: "Average", value: getRandomInt(10, 30)},
                                {label: "Poor", value: getRandomInt(10, 20)}
                            ],
                            colors: ['DarkRed', 'IndianRed', 'LightCoral']
                        });

                        donut_chart_demo.parent().attr('style', '');
                        // Donut Chart2
                        var donut_chart_demo2 = $("#donut-chart-demo2");

                        donut_chart_demo2.parent().show();

                        var donut_chart2 = Morris.Donut({
                            element: 'donut-chart-demo2',
                            data: [
                                {label: "Good", value: getRandomInt(10, 50)},
                                {label: "Average", value: getRandomInt(10, 50)},
                                {label: "Poor", value: getRandomInt(10, 50)}
                            ],
                            colors: ['DarkSlateBlue', 'SlateBlue', 'Lavender']

                        });

                        donut_chart_demo2.parent().attr('style', '');
                        // Donut Chart3
                        var donut_chart_demo3 = $("#donut-chart-demo3");

                        donut_chart_demo3.parent().show();

                        var donut_chart3 = Morris.Donut({
                            element: 'donut-chart-demo3',
                            data: [
                                {label: "Good", value: getRandomInt(10, 50)},
                                {label: "Average", value: getRandomInt(10, 50)},
                                {label: "Poor", value: getRandomInt(10, 50)}
                            ],
                            colors: ['DarkGreen', 'YellowGree', 'PaleGreen']

                        });

                        donut_chart_demo3.parent().attr('style', '');
                        // Donut Chart4
                        var donut_chart_demo4 = $("#donut-chart-demo3");

                        donut_chart_demo4.parent().show();

                        var donut_chart4 = Morris.Donut({
                            element: 'donut-chart-demo4',
                            data: [
                                {label: "Good", value: getRandomInt(10, 50)},
                                {label: "Average", value: getRandomInt(10, 50)},
                                {label: "Poor", value: getRandomInt(10, 50)}
                            ],
                            colors: ['DarkKhaki', 'Khaki', 'PaleGoldenrod']
                        });

                        donut_chart_demo3.parent().attr('style', '');

                        // Area Chart
                        var area_chart_demo = $("#area-chart-demo");

                        area_chart_demo.parent().show();

                        var area_chart = Morris.Area({
                            element: 'area-chart-demo',
                            data: [
                                {y: '2015-10-08 12:00', a: 100, b: 190, c: 43, d: 15, e: 25},
                                {y: '2015-10-08 13:00', a: 75, b: 165, c: 23, d: 24, e: 55},
                                {y: '2015-10-08 14:00', a: 50, b: 140, c: 33, d: 14, e: 35},
                                {y: '2015-10-08 15:00', a: 75, b: 165, c: 47, d: 45, e: 12},
                                {y: '2015-10-08 16:00', a: 50, b: 140, c: 53, d: 34, e: 15},
                                {y: '2015-10-08 17:00', a: 75, b: 65, c: 93, d: 12, e: 25},
                                {y: '2015-10-08 18:00', a: 100, b: 190, c: 103, d: 5, e: 35}
                            ],
                            xkey: 'y',
                            ykeys: ['a', 'b', 'c', 'd', 'e'],
                            labels: ['Browsing', 'Streaming', 'Social Networking', 'Gaming', 'VoIP'],
                            postUnits: ' kbps',
                            hideHover: 'auto'

                        });

                        area_chart_demo.parent().attr('style', '');




                        // Rickshaw
                        var seriesData = [[], []];

                        var random = new Rickshaw.Fixtures.RandomData(50);
                        for (var i = 0; i < 50; i++)
                        {
                            random.addData(seriesData);

                        }

                        var graph = new Rickshaw.Graph({
                            element: document.getElementById("rickshaw-chart-demo"),
                            height: 193,
                            renderer: 'area',
                            stroke: true,
                            preserve: true,
                            series: [{
                                    color: '#73c8ff',
                                    data: seriesData[0],
                                    name: 'Upload'
                                }, {
                                    color: '#e0f2ff',
                                    data: seriesData[1],
                                    name: 'Download'
                                }
                            ]
                        });

                        graph.render();

                        var hoverDetail = new Rickshaw.Graph.HoverDetail({
                            graph: graph,
                            xFormatter: function (x) {
                                return new Date(x * 1000).toString();
                            }
                        });

                        var legend = new Rickshaw.Graph.Legend({
                            graph: graph,
                            element: document.getElementById('rickshaw-legend')
                        });

                        var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight({
                            graph: graph,
                            legend: legend
                        });

                        setInterval(function () {
                            random.removeData(seriesData);
                            random.addData(seriesData);

                            //seriesData[0][0]=5;
                            graph.update();

                        }, 2000);
                    });


                    function getRandomInt(min, max)
                    {
                        return Math.floor(Math.random() * (max - min + 1)) + min;
                    }
                </script>
                <div class="row">
                    <div class="col-sm-12 ">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>ID</th>
                                    <th>Calling Station</th>
                                    <th>IMEI</th>
                                    <th>Location</th>
                                    <th>Package</th>
                                    <th>QoE Scores (last week)</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Kevin Bob</td>
                                    <td>CX245462</td>
                                    <td>+445845648850</td>
                                    <td>3520720601266905 (iPhone 6)</td>
                                    <td>BTS0124F420EF784A67 (Park Grove, Cardiff)</td> 
                                    <td>PayAsYouGo_4GB</td> 
                                    <td class="text-center"><span class="inlinebar">7,8,7,9,5,2,3</span></td>
                                </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-3 col-xs-6">

                        <div class="tile-stats tile-red">
                            <div class="icon"><i class="entypo-down-bold"></i></div>
                            <div class="num" data-start="0" data-end="1937" data-postfix=" MB" data-duration="1500" data-delay="0">0</div>

                            <h3>Downloaded</h3>
                            <p>in last week</p>
                        </div>

                    </div>

                    <div class="col-sm-3 col-xs-6">

                        <div class="tile-stats tile-green">
                            <div class="icon"><i class="entypo-chart-bar"></i></div>
                            <div class="num" data-start="0" data-end="6" data-postfix=" /10" data-duration="500" data-delay="600">0</div>

                            <h3>QoE Score</h3>
                            <p>average of last week</p>
                        </div>

                    </div>

                    <div class="col-sm-3 col-xs-6">

                        <div class="tile-stats tile-aqua">
                            <div class="icon"><i class="entypo-mail"></i></div>
                            <div class="num" data-start="0" data-end="3" data-postfix="" data-duration="500" data-delay="1200">0</div>

                            <h3>Tickets Opened</h3>
                            <p>in last 6 months</p>
                        </div>

                    </div>

                    <div class="col-sm-3 col-xs-6">

                        <div class="tile-stats tile-blue">
                            <div class="icon"><i class="entypo-basket"></i></div>
                            <div class="num" data-start="0" data-end="192" data-prefix="&pound; " data-postfix="" data-duration="1500" data-delay="1800">0</div>

                            <h3>Top Up</h3>
                            <p>in last 6 months</p>
                        </div>

                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-sm-8">

                        <div class="panel panel-primary" id="charts_env">

                            <div class="panel-heading">
                                <div class="panel-title">Subscriber Stats</div>

                                <div class="panel-options">
                                    <ul class="nav nav-tabs">
                                        <li class=""><a href="#area-chart" data-toggle="tab">Application Categories</a></li>
                                        <li class="active"><a href="#line-chart" data-toggle="tab">QoE Score Trend</a></li>
                                        <li class=""><a href="#pie-chart" data-toggle="tab">Current Scores</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="tab-content">

                                    <div class="tab-pane" id="area-chart">
                                        <div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
                                    </div>

                                    <div class="tab-pane active" id="line-chart">
                                        <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
                                    </div>

                                    <div class="tab-pane active" id="pie-chart">
                                        <table class="table"> 
                                            <tr> 
                                                <th width="25%">
                                            <div id="donut-chart-demo" class="morrischart" style="height: 150px;"></div>
                                            </th>
                                            <th width="25%">
                                            <div id="donut-chart-demo2" class="morrischart" style="height: 150px;"></div>
                                            </th>
                                            <th width="25%">
                                            <div id="donut-chart-demo3" class="morrischart" style="height: 150px;"></div>
                                            </th>
                                            <th width="25%">
                                            <div id="donut-chart-demo4" class="morrischart" style="height: 150px;"></div>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th width="25%"><center><img src="assets/images/youtube.png" height="30"></center>
                                            </th>
                                            <th width="25%"><center><img src="assets/images/facebook.png" height="40"></center>
                                            </th>
                                            <th width="25%"><center><img src="assets/images/whatsapp.png" height="40"></center>
                                            </th>
                                            <th width="25%"><center><img src="assets/images/instagram.png" height="40"></center>
                                            </th>

                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <table class="table table-bordered table-responsive">

                                <thead>
                                    <tr>
                                        <th width="50%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Download Trend(last week)</div>
                                    <small>1,937 MB</small>
                                </div>
                                <span class="pull-right pageviews">240,365,333,265,134,254,346</span>

                                </th>
                                <th width="50%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Upload MB Trend (last week)</div>
                                    <small>750 MB</small>
                                </div>
                                <span class="pull-right uniquevisitors">80,93,105,200,73,114,85</span>
                                </th>
                                </tr>
                                </thead>

                            </table>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>
                                        Real Time Stats
                                        <br />
                                        <small>Current Subscriber Traffic (kbps)</small>
                                    </h4>
                                </div>

                                <div class="panel-options">
                                        <!--<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                    -->
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                </div>
                            </div>

                            <div class="panel-body no-padding">
                                <div id="rickshaw-chart-demo">
                                    <div id="rickshaw-legend"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <br />

                <div class="row">

                    <div class="col-sm-4">

                        <div class="panel panel-primary">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="padding-bottom-none text-center">
                                            <br />
                                            <br />
                                            <span class="monthly-sales"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="panel-heading">
                                            <h4>Monthly Revenue (&pound;)</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-sm-8">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title">Previous Tickets</div>

                                <div class="panel-options">
                                        <!--<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>-->
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                                </div>
                            </div>

                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Ticket #</th>
                                        <th>Severity</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>2015-09-10 16:33</td>
                                        <td>TN00744545</td>
                                        <td>Low</td>
                                        <td>Lag in WhatsApp messages being sent</td>
                                        <td><i class="entypo-cancel" style="color:red"></i></td>
                                    </tr>

                                    <tr>
                                        <td>2015-06-10 16:52</td>
                                        <td>TN00657732</td>
                                        <td>Moderate</td>
                                        <td>Slow browsing</td>
                                        <td><i class="entypo-check" style="color:green"></i></td>
                                    </tr>

                                    <tr>
                                        <td>2015-06-05 09:33</td>
                                        <td>TN00657433</td>
                                        <td>High</td>
                                        <td>No internet connection</td>
                                        <td><i class="entypo-check" style="color:green"></i></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <br />


                <script type="text/javascript">
                    // Code used to add Todo Tasks
                    jQuery(document).ready(function ($)
                    {
                        var $todo_tasks = $("#todo_tasks");

                        $todo_tasks.find('input[type="text"]').on('keydown', function (ev)
                        {
                            if (ev.keyCode == 13)
                            {
                                ev.preventDefault();

                                if ($.trim($(this).val()).length)
                                {
                                    var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>' + $(this).val() + '</label></div></li>');
                                    $(this).val('');

                                    $todo_entry.appendTo($todo_tasks.find('.todo-list'));
                                    $todo_entry.hide().slideDown('fast');
                                    replaceCheckboxes();
                                }
                            }
                        });
                    });
                </script>

                <div class="row">

                    <div class="col-sm-3">
                        <div class="tile-block" id="todo_tasks">

                            <div class="tile-header">
                                <i class="entypo-list"></i>

                                <a href="#">
                                    Tasks
                                    <span>To do list, tick one.</span>
                                </a>
                            </div>

                            <div class="tile-content">

                                <input type="text" class="form-control" placeholder="Add Task" />


                                <ul class="todo-list">
                                    <li>
                                        <div class="checkbox checkbox-replace color-white">
                                            <input type="checkbox" />
                                            <label>Compile Ticket Report</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox checkbox-replace color-white">
                                            <input type="checkbox" id="task-2" checked />
                                            <label>TN00384573 status update</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox checkbox-replace color-white">
                                            <input type="checkbox" id="task-3" />
                                            <label>Follow up with Rick</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox checkbox-replace color-white">
                                            <input type="checkbox" id="task-4" />
                                            <label>Review process</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox checkbox-replace color-white">
                                            <input type="checkbox" id="task-5" checked="" />
                                            <label>Compress &amp; Backup DB</label>
                                        </div>
                                    </li>
                                </ul>

                            </div>

                            <div class="tile-footer">
                                <a href="#">View all tasks</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9">

                        <script type="text/javascript">
                            jQuery(document).ready(function ($)
                            {
                                var map = $("#map-2");



                                map.vectorMap({
                                    map: 'uk_merc_en',
                                    zoomMin: '1',
                                    backgroundColor: '#383f47',
                                    focusOn: {x: 0.5, y: 0.8, scale: 1},
                                    series: {regions: [{values: {
                                                    "UKM": "darkgreen",
                                                    "UKN": "lightgreen",
                                                    "UKL": "lightgreen",
                                                    "UKK": "orange",
                                                    "UKJ": "yellow",
                                                    "UKI": "red",
                                                    "UKH": "lightgreen",
                                                    "UKG": "darkgreen",
                                                    "UKF": "orange",
                                                    "UKE": "orange",
                                                    "UKD": "yellow",
                                                    "UKC": "red",
                                                }, attribute: 'fill'
                                            }]}
                                });
                            });
                        </script>
                        <script type="text/javascript">
                            jQuery(document).ready(function ($)
                            {
                                var map = $("#map-3");



                                map.vectorMap({
                                    map: 'uk_em_merc_en',
                                    zoomMin: '5',
                                    backgroundColor: '#383f47',
                                    focusOn: {x: 1.5, y: 0.75, scale: 5},
                                    series: {regions: [{values: {
                                                    "UKF": "orange"
                                                }, attribute: 'fill'}]}
                                });


                            });
                        </script>		
                        <div class="tile-group">

                            <div class="tile-left" style="height: 400px;">
                                <div class="tile-entry">
                                    <h3>Regional Quality</h3>
                                    <span>Last known location</span>
                                </div>
                                <div class="tile-entry">
                                    <h4>East Midlands</h4>
                                    <span>Score: 5</span>

                                </div>		
                                <div class="tile-entry">
                                    <div id="map-3"  style="height: 200px;"></div>	
                                </div>



                                <div class="tile-entry">
                                </div>
                            </div>

                            <div class="tile-right">


                                <div id="map-2" class="map" ></div>

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

    </body>
</html>