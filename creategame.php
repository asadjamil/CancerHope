
<?php
/*    
    session_start();
    $username = $_SESSION["username"];
    // Check if Session has username and it is not empty
    if(!(isset($_SESSION["username"]) && $_SESSION["username"]!=''))
    {   
        header('Location: login.html');
        exit;
    }
*/
?>

<?php 
    require('connection.php');  
    // get all cancers names from database against tblzlucancers    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="Farhan Jee" />

        <title>Snooker Club Management</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="stylesheet" href="assets/css/skins/grey.css">
        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">-->
        <!-- LATEST SELECT2 CSS-->        
        <link href="assets/dist/css/select2.css" rel="stylesheet" />

        <!-- Include Data Table Css -->
        <link href="assets/js/datatables/datatables.css" rel="stylesheet" />
          <script src="http://www.google-analytics.com/ga.js" async="" type="text/javascript"></script>
        
    </head> 
    <body class="page-body skin-grey loaded">
        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
            <!-- Start of Side Nav Bar -->            
            <div class="sidebar-menu">
                <div class="sidebar-menu-inner">
                    <header class="logo-env">
                        <!-- logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/cancerhope_logo.png" width="100" alt="" /></a>
                        </div>
                        <!-- logo collapse icon -->
                        <div class="sidebar-collapse">
                            <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                            <a href="#" class="sidebar-collapse-icon" ><i class="entypo-menu"></i></a>
                        </div>
                        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                        <div class="sidebar-mobile-menu visible-xs">
                            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>
                    </header>

                    <ul id="main-menu" class="main-menu">
                        
                        <li class="active opened active">
                            <a href="">
                                <i class="entypo-chart-bar"></i>
                                <span class="title">Game</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="creategame.php">
                                        <span class="title">Create Game</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="active opened active">
                            <a href="#">
                                <i class="entypo-chart-bar"></i>
                                <span class="title">Settings</span>
                            </a>
                            <ul>
                                <li>
                                    <div class="input-group">    
                                        <div class="input-group-btn"> 
                                             <button id="addPlayerBtn" class="btn btn-gold" data-toggle="modal" data-target="#addPlayer">Add Player</button> 
                                        </div>
                                        
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
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
                <!-- End of Side Nav Bar -->
            <div class="main-content">

                <div class="row">
                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                        
                        <ul class="list-inline links-list pull-right">
                            <!-- Logout Button -->
                            <li class="sep"></li>

                            <li>
                                <a href="logout.php">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-8 ">Show Table Layout Form</div>
                </div>

                <hr /> 
                <!-- End of Logout Section -->
                <div class="row">
                    <div class="col-md-1">                                              
                        <div class="input-group">    
                            <div class="input-group-btn"> 
                                 <button id="addPlayerBtn" class="btn btn-gold" data-toggle="modal" data-target="#addPlayer">Add Player</button> 
                            </div>
                        </div>
                    </div> 
                    <div id="search" class="col-md-3">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-search"></i></span>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Phone Number" />
                        </div>
                        <div id="list"></div>
                    </div>
                </div>

                <!--modal--> 
                <div class="row">
                    <div class="col-md-12">                      
                        <!-- Modal -->
                        <div class="modal fade" id="addPlayer" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">


                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="addLabel">Add Player</h4>
                                    </div>
                                    <form>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Personal Information</h4><br>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Name</label>
                                                        <input class="form-control" id="field-1" placeholder="John" type="text"> 
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6"> 
                                                    <div class="form-group"> 
                                                        <label for="field-2" class="control-label">Surname</label> 
                                                        <input class="form-control" id="field-2" placeholder="Doe" type="text"> 
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Gender</label>
                                                        <input class="form-control" id="field-1" placeholder="John" type="text"> 
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">CNIC</label>
                                                        <input class="form-control" id="field-1" placeholder="John" type="text"> 
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Contact Information</h4><br>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Phone</label>
                                                        <input class="form-control" id="field-1" placeholder="John" type="text"> 
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Email</label>
                                                        <input class="form-control" id="field-1" placeholder="John" type="text"> 
                                                    </div> 
                                                </div>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button onclick="saveDataOtherHistory();return false;" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div> <!-- End Modal Content -->
                            </div> <!-- End Modal Dialogue-->
                        </div> <!-- End Main Model--> 
                    </div> 
                </div>

                <div class="row">
                    
                    <div class="col-md-12">
                        <div id="FirstDiv" class="col-sm-6">
                            <h4>HI This is 1st Div</h4>
                        </div>

                        <div style="position:absolute;background:rgba(0,0,0,0.45);z-index:1" id="SecondDiv" class="col-sm-6">
                            <br>
                            <h4>Hello</h4>
                        </div>

                        <div id="ThridDiv" class="col-sm-6">
                        <h4>HI</h4>
                        </div>
                        
                    </div>
                </div>
                <!-- Footer -->
                <footer class="main" id="footerSection">

                    &copy; 2016-2017 <strong>Legends - Premium Snooker Lounge</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

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
        <!--<script src="assets/js/bootstrap-datepicker.js"></script>-->
        <script src="assets/js/joinable.js" id="script-resource-4"></script>    

        <!-- JS INCLUDED FOR DATE -->
        <script src="http://demo.neontheme.com/assets/js/bootstrap-datepicker.js" id="script-resource-12"></script>
        <script src="http://demo.neontheme.com/assets/js/bootstrap-timepicker.min.js" id="script-resource-13"></script>

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

        <!-- Data Table JS-->
        <script src="assets/js/datatables/datatables.js"></script>
        <!-- Scripts for Search Bar-->
        <script src="assets/js/select2/select2.min.js"></script>
        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>
        <script src="assets/dist/js/select2.full.js"></script>

        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>

    </body>
</html>
<?php
/*    
    session_start();
    $username = $_SESSION["username"];
    // Check if Session has username and it is not empty
    if(!(isset($_SESSION["username"]) && $_SESSION["username"]!=''))
    {   
        header('Location: login.html');
        exit;
    }
*/
?>

<?php 
    require('connection.php');  
    // get all cancers names from database against tblzlucancers    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="Farhan Jee" />

        <title>Snooker Club Management</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="stylesheet" href="assets/css/skins/red.css">
        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">-->
        <!-- LATEST SELECT2 CSS-->        
        <link href="assets/dist/css/select2.css" rel="stylesheet" />

        <!-- Include Data Table Css -->
        <link href="assets/js/datatables/datatables.css" rel="stylesheet" />
		  <script src="http://www.google-analytics.com/ga.js" async="" type="text/javascript"></script>
        
    </head> 
    <body class="page-body skin-red loaded">
        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			<!-- Start of Side Nav Bar -->            
            <div class="sidebar-menu">
                <div class="sidebar-menu-inner">
                    <header class="logo-env">
                        <!-- logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/cancerhope_logo.png" width="100" alt="" /></a>
                        </div>
                        <!-- logo collapse icon -->
                        <div class="sidebar-collapse">
                        	<!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                            <a href="#" class="sidebar-collapse-icon" ><i class="entypo-menu"></i></a>
                        </div>
                        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                        <div class="sidebar-mobile-menu visible-xs">
                            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                                <i class="entypo-menu"></i>
                            </a>
                        </div>
                    </header>

                    <ul id="main-menu" class="main-menu">
                        
                        <li class="active opened active">
                            <a href="">
                                <i class="entypo-chart-bar"></i>
                                <span class="title">Game</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="creategame.php">
                                        <span class="title">Create Game</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="active opened active">
                            <a href="#">
                                <i class="entypo-chart-bar"></i>
                                <span class="title">Settings</span>
                            </a>
                            <ul>
                                <li>
                                    <div class="input-group">    
                                        <div class="input-group-btn"> 
                                             <button id="addPlayerBtn" class="btn btn-gold" data-toggle="modal" data-target="#addPlayer">Add Player</button> 
                                        </div>
                                        
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">-</span>
                                    </a>
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
				<!-- End of Side Nav Bar -->
            <div class="main-content">

                <div class="row">
                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                        
                        <ul class="list-inline links-list pull-right">
                            <!-- Logout Button -->
                            <li class="sep"></li>

                            <li>
                                <a href="logout.php">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-8 ">Show Table Layout Form</div>
                </div>

                <hr /> 
                <!-- End of Logout Section -->
                <div class="row">
                    <div class="col-md-3">                                              
                        
                        <div class="input-group">    
                            <div class="input-group-btn"> 
                                 <button id="addPlayerBtn" class="btn btn-gold" data-toggle="modal" data-target="#addPlayer">Add Player</button> 
                            </div>
                            
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-12">
                                          
                        <!-- Modal -->
                        <div class="modal fade" id="addPlayer" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="addLabel">Add Player</h4>
                                    </div>
                                    <form>
                                        <div class="modal-body">
                                            <!--
                                            <label class="control-label">Date </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" id="date">
                                                <div class="input-group-addon">
                                                <a href="#">
                                                    <i class="entypo-calendar"></i>
                                                </a>
                                                </div>
                                            </div>
                                            -->
                                        
                                            <label class="control-label" for="other_health">Other Health Problem</label>
                                            <select class="form-control" id="other_health">
                                            </select>
                                                                                                        
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button onclick="saveDataOtherHistory();return false;" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div> <!-- End Modal Content -->
                            </div> <!-- End Modal Dialogue-->
                        </div> <!-- End Main Model--> 
                    </div> 
                </div>
                <!-- Footer -->
                <footer class="main" id="footerSection">

                    &copy; 2016-2017 <strong>Legends - Premium Snooker Lounge</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

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
        <!--<script src="assets/js/bootstrap-datepicker.js"></script>-->
		<script src="assets/js/joinable.js" id="script-resource-4"></script>	

        <!-- JS INCLUDED FOR DATE -->
        <script src="http://demo.neontheme.com/assets/js/bootstrap-datepicker.js" id="script-resource-12"></script>
        <script src="http://demo.neontheme.com/assets/js/bootstrap-timepicker.min.js" id="script-resource-13"></script>

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

        <!-- Data Table JS-->
        <script src="assets/js/datatables/datatables.js"></script>
        <!-- Scripts for Search Bar-->
        <script src="assets/js/select2/select2.min.js"></script>
        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>
        <script src="assets/dist/js/select2.full.js"></script>

        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>

    </body>
</html>