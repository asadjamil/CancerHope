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
                                <i class="entypo-database"></i>
                                <span class="title">Matching Process Activities</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="index.php">
                                        <span class="title">Patient Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="patient_support.php">
                                        <span class="title">Patient Support Person Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="family_support.php">
                                        <span class="title">Family Support Person Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="professional_support.php">
                                        <span class="title">Professional Support Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="patient_activity.php">
                                        <span class="title">Patient Activity</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="support_person_activity.php">
                                        <span class="title">Support Person Activity</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="match.php">
                                        <span class="title">Match</span>
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
                           
                            <li class="sep"></li>

                            <li>
                                <a href="login.html">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

                
                 
				
              
                <!-- Footer -->
                <footer class="main">

                    &copy; 2016 <strong>Cancer Hope - Matching System For Cancer Support</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

                </footer>
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