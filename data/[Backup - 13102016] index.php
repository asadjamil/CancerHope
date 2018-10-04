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

		  <script src="http://www.google-analytics.com/ga.js" async="" type="text/javascript"></script>
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

				<!-- Start of Side Nav Bar -->            
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
				<!-- End of Side Nav Bar -->
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
												<!--
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
                                    </li> -->
                                </ul>
                            </li>

                        </ul>
							
							                        
                    </div>


                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                        <ul class="list-inline links-list pull-right">

                            <!-- Logout Button -->
                            
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
                <!-- End of Logout Section -->

			
                
                
                
                
                <!-- Start of TABLE -->
                <!--Start of Table Structure
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
                                    
                                </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
                <end of table structure--> 
               
                <!--
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
					 End of Tabbed Tiles -->
					 
                <div class="row">
                    <div class="col-sm-12 col-xs-6">
                    		<div class="panel panel-primary" id="patient_information">
                    			<div class="panel-heading">
                    				<div class="panel-title">
                    					<h3>Patient Information</h3>
                           	</div>
                           
                        
										<div class="panel-options">
		                        	<ul class="nav nav-tabs">
		                           	<li class="active"><a href="#demographics" data-toggle="tab">Demographics</a></li>
		                            	<li class=""><a href="#diagnosis" data-toggle="tab">Diagnosis</a></li>
		                            	<li class=""><a href="#treatment" data-toggle="tab">Treatment/Side Effects</a></li>
		                            	<li class=""><a href="#psychosocial" data-toggle="tab">Psychosocial_Issues</a></li>
		                        	</ul>
	                        	</div>
                        	</div>
                           <!--End of Panel Primary-->
									 
									<!--Start of Panel Body-->									 
                           <div class="panel-body">
	                        	<div class="tab-content">
	                              <div id="demographics" class="tab-pane active">
	                            
	                            	  <!-- Start of Row - Caller Information - Header-->
	                                 <div class="row"> 
                         		        	
													<div class="col-md-6">                         		        	
                         		        		<div class="well well-sm">
															<h4>Caller Information</h4>
														</div>                			
                                   		</div>
                                   		
                                   		<div class="col-md-6">                         		        	
                         		        		<div class="well well-sm">
															<h4>Patient Vitals</h4>
														</div> 														               			
                                   		</div>
                                   	</div>
                                 	
                                 	<!-- Start of Row - Caller Information - Fields -->
                                 	<div class="row"> <!-- Start of Row 1 -->
                                 			<div class="col-md-3">
													<label class="control-label" for="full_name">Full Name</label>
													<input class="form-control" name="full_name" id="full_name" placeholder="Full Name" type="text">                              			
                                 			</div>
                                 			<div class="col-md-3">
													<label class="control-label" for="caller_phone">Caller Phone</label>
													<input class="form-control" name="caller_phone" id="caller_phone" placeholder="Phone" type="text">                            			
                                 			</div>
                                 			<div class="col-md-3">
                                 				<label class="control-label" for="prm_lang">Primary Language</label>
													<input class="form-control" name="prm_lang" id="prm_lang" placeholder="Primary Language" type="text">
                                 			</div>
                                 			
												<div class="col-sm-2"> 
                                 				<label class="control-label" for="dob">Date of Birth</label>
															<input class="form-control datepicker" type="text">
                                 				<!--<input class="form-control" name="dob" id="dob" placeholder="dob" type="text">-->
                                 			</div>
                                 			<div class="col-sm-1"> 
                                 				<label class="control-label" for="age">Age</label>
                                 				<input class="form-control" name="age" id="age" placeholder="age" type="text">
                                 			</div>
                                 	</div>
                                 	<br>
                                 	
                                 	<!-- Start of Row - Caller Information - Fields -->
                                 	<div class="row"> <!-- Start of Row 2 -->
                                 			<div class="col-md-3">
													<label class="control-label" for="relation">Relation to Patient</label>
													<input class="form-control" name="relation" id="relation" placeholder="Relation" type="text">                              			
                                 			</div>
                                 			<div class="col-md-3">
													<label class="control-label" for="how">How did you hear about us?</label>
													<input class="form-control" name="how" id="how" placeholder="" type="text">                            			
                                 			</div>
                                 			<div class="col-md-6">
                                 				<label class="control-label" for="sex">Sex</label>
													<input class="form-control" name="sex" id="sex" placeholder="Male/Female" type="text">
                                 			</div>
                                	</div>
                                	<br>
                                	<!-- Start of Row - Patient Contact Information-->
	                                 <div class="row"> 
                         		        	
													<div class="col-md-6">                         		        	
                         		        		<div class="well well-sm">
															<h4>Patient Contact Information</h4>
														</div>                			
                                   		</div>
                                   		
                                   		<div class="col-md-6">                         		        	
                         		        		<div class="well well-sm">
															<h4>Diagnosis & Treatment</h4>
													</div> 														               			
                                   		</div>
                                   	</div>
                                   	
                                   	<div class="row"> <!-- Start of Row 1 -->
                                 			<div class="col-md-2">
													<label class="control-label" for="pid">Patient ID</label>
													<input class="form-control" name="pid" id="pid" placeholder="PatientID" type="text">                              			
                                 			</div>
                                 			<div class="col-md-2">
													<label class="control-label" for="fname">First Name</label>
													<input class="form-control" name="fname" id="fname" placeholder="First Name" type="text">                            			
                                 			</div>
                                 			<div class="col-md-2">
                                 				<label class="control-label" for="lname">Last Name</label>
													<input class="form-control" name="lname" id="lname" placeholder="Last Name" type="text">
                                 			</div>
                                 			<div class="col-md-6">
                                 				<label class="control-label" for="diag">Diagnosis</label>
													<input class="form-control" name="diag" id="diag" placeholder="Diagnosis" type="text">
                                 			</div>
                                		</div>
                                		<br>
                                		
                                		<div class="row"> <!-- Start of Row 2 -->
                                 			<div class="col-md-6">
													<label class="control-label" for="addr">Address</label>
													<input class="form-control" name="addr" id="addr" placeholder="Address" type="text">                              			
                                 			</div>
                                 			<div class="col-md-6">
													<label class="control-label" for="treat">Treatment</label>
													<input class="form-control" name="treat" id="treat" placeholder="Treatment" type="text">                            			
                                 			</div>
                                 			
                                		</div>
                                		<br>
                                		
                                		<div class="row"> <!-- Start of Row 3 -->
                                 			<div class="col-md-2">
													<label class="control-label" for="city">City</label>
													<input class="form-control" name="city" id="city" placeholder="City" type="text">                              			
                                 			</div>
                                 			<div class="col-md-2">
													<label class="control-label" for="state">State</label>
													<input class="form-control" name="state" id="state" placeholder="state" type="text">                            			
                                 			</div>
                                 			<div class="col-md-2">
													<label class="control-label" for="zip">Zip</label>
													<input class="form-control" name="zip" id="zip" placeholder="zip" type="text">                            			
                                 			</div>
                                 			
                                 			<div class="col-md-6">
													<div class="well well-sm">
														<h4>General Comments</h4>
													</div>                			               			
                                 			</div>
                                 			
                                		</div>
									
									
									
									
									
									
									
									
									
									
									
									
									
									</div>	                                 	
                                 	<br>
                                 	

													
                               
                                		   
                                
                                    
										<div id="diagnosis" class="tab-pane">
                                 	<strong>Make Diagnosis Form</strong>
                                    <p>Delete these comments</p>
                                	</div>
                                    
                                 <div id="treatment" class="tab-pane">
                                 	<strong>Make Treatment Form</strong>
                                    <p>Delete these comments</p> 
                                	</div>

                                 <div id="psychosocial" class="tab-pane">
                                 	<strong>Make Psychosocial Form</strong>
                                    <p>Delete these comments</p> 
                                 </div>
                         		</div>
                         	</div>
                           <!-- End of Pannel Body-->
					 			</div>
				
					 		</div>
					 </div>

                 


                <!-- Footer -->
                <footer class="main">

                    &copy; 2016 <strong>Cancer Hope | Matching System</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

                </footer>
            </div>


            






        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">
		  <link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/main-gsap.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>
        <script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="http://demo.neontheme.com/assets/js/bootstrap-datepicker.js"></script>


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
		  <div style="top: 534.733px; left: 630px; right: auto; display: none;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
    	  <div style="top: 523.567px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Aug 2013</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">28</td><td class="off disabled" data-title="r0c1">29</td><td class="off disabled" data-title="r0c2">30</td><td class="off disabled" data-title="r0c3">31</td><td class="off disabled" data-title="r0c4">1</td><td class="available in-range" data-title="r0c5">2</td><td class="available in-range" data-title="r0c6">3</td></tr><tr><td class="available in-range" data-title="r1c0">4</td><td class="available in-range" data-title="r1c1">5</td><td class="available in-range" data-title="r1c2">6</td><td class="available in-range" data-title="r1c3">7</td><td class="available in-range" data-title="r1c4">8</td><td class="available in-range" data-title="r1c5">9</td><td class="available in-range" data-title="r1c6">10</td></tr><tr><td class="available in-range" data-title="r2c0">11</td><td class="available in-range" data-title="r2c1">12</td><td class="available in-range" data-title="r2c2">13</td><td class="available in-range" data-title="r2c3">14</td><td class="available active end-date" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available" data-title="r4c6">31</td></tr><tr><td class="available off" data-title="r5c0">1</td><td class="available off" data-title="r5c1">2</td><td class="available off" data-title="r5c2">3</td><td class="available off" data-title="r5c3">4</td><td class="available off" data-title="r5c4">5</td><td class="available off" data-title="r5c5">6</td><td class="available off" data-title="r5c6">7</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Aug 2013</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">28</td><td class="available off" data-title="r0c1">29</td><td class="available off" data-title="r0c2">30</td><td class="available off" data-title="r0c3">31</td><td class="available" data-title="r0c4">1</td><td class="available active start-date" data-title="r0c5">2</td><td class="available in-range" data-title="r0c6">3</td></tr><tr><td class="available in-range" data-title="r1c0">4</td><td class="available in-range" data-title="r1c1">5</td><td class="available in-range" data-title="r1c2">6</td><td class="available in-range" data-title="r1c3">7</td><td class="available in-range" data-title="r1c4">8</td><td class="available in-range" data-title="r1c5">9</td><td class="available in-range" data-title="r1c6">10</td></tr><tr><td class="available in-range" data-title="r2c0">11</td><td class="available in-range" data-title="r2c1">12</td><td class="available in-range" data-title="r2c2">13</td><td class="available in-range" data-title="r2c3">14</td><td class="available in-range" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available" data-title="r4c6">31</td></tr><tr><td class="available off" data-title="r5c0">1</td><td class="available off" data-title="r5c1">2</td><td class="available off" data-title="r5c2">3</td><td class="available off" data-title="r5c3">4</td><td class="available off" data-title="r5c4">5</td><td class="available off" data-title="r5c5">6</td><td class="available off" data-title="r5c6">7</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
    	  <div style="top: 658.4px; left: 630px; right: auto; display: none;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="off disabled" data-title="r3c3">19</td><td class="off disabled" data-title="r3c4">20</td><td class="off disabled" data-title="r3c5">21</td><td class="off disabled" data-title="r3c6">22</td></tr><tr><td class="off disabled" data-title="r4c0">23</td><td class="off disabled" data-title="r4c1">24</td><td class="off disabled" data-title="r4c2">25</td><td class="off disabled" data-title="r4c3">26</td><td class="off disabled" data-title="r4c4">27</td><td class="off disabled" data-title="r4c5">28</td><td class="off disabled" data-title="r4c6">29</td></tr><tr><td class="off disabled" data-title="r5c0">30</td><td class="off disabled" data-title="r5c1">31</td><td class="off disabled" data-title="r5c2">1</td><td class="off disabled" data-title="r5c3">2</td><td class="off disabled" data-title="r5c4">3</td><td class="off disabled" data-title="r5c5">4</td><td class="off disabled" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="off disabled" data-title="r3c3">19</td><td class="off disabled" data-title="r3c4">20</td><td class="off disabled" data-title="r3c5">21</td><td class="off disabled" data-title="r3c6">22</td></tr><tr><td class="off disabled" data-title="r4c0">23</td><td class="off disabled" data-title="r4c1">24</td><td class="off disabled" data-title="r4c2">25</td><td class="off disabled" data-title="r4c3">26</td><td class="off disabled" data-title="r4c4">27</td><td class="off disabled" data-title="r4c5">28</td><td class="off disabled" data-title="r4c6">29</td></tr><tr><td class="off disabled" data-title="r5c0">30</td><td class="off disabled" data-title="r5c1">31</td><td class="off disabled" data-title="r5c2">1</td><td class="off disabled" data-title="r5c3">2</td><td class="off disabled" data-title="r5c4">3</td><td class="off disabled" data-title="r5c5">4</td><td class="off disabled" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
		  <div style="top: 647.233px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>    
    	  <div style="top: 709.067px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11" selected="selected">11</option><option value="12">12</option></select> : <select class="minuteselect"><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM">AM</option><option value="PM" selected="selected">PM</option></select></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="selected">12</option></select> : <select class="minuteselect"><option value="0" selected="selected">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM" selected="selected">AM</option><option value="PM">PM</option></select></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
    	  <div style="top: 709.067px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11" selected="selected">11</option><option value="12">12</option></select> : <select class="minuteselect"><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM">AM</option><option value="PM" selected="selected">PM</option></select></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="selected">12</option></select> : <select class="minuteselect"><option value="0" selected="selected">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM" selected="selected">AM</option><option value="PM">PM</option></select></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
    	  <div style="top: 911.4px; left: 630px; right: auto; display: none;" class="daterangepicker dropdown-menu opensright show-calendar"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="available in-range" data-title="r1c5">7</td><td class="available in-range" data-title="r1c6">8</td></tr><tr><td class="available in-range" data-title="r2c0">9</td><td class="available in-range" data-title="r2c1">10</td><td class="available in-range" data-title="r2c2">11</td><td class="available in-range" data-title="r2c3">12</td><td class="available in-range" data-title="r2c4">13</td><td class="available in-range" data-title="r2c5">14</td><td class="available in-range" data-title="r2c6">15</td></tr><tr><td class="available in-range" data-title="r3c0">16</td><td class="available in-range" data-title="r3c1">17</td><td class="available in-range" data-title="r3c2">18</td><td class="available in-range" data-title="r3c3">19</td><td class="available in-range" data-title="r3c4">20</td><td class="available active end-date" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available active start-date" data-title="r1c5">7</td><td class="available in-range" data-title="r1c6">8</td></tr><tr><td class="available in-range" data-title="r2c0">9</td><td class="available in-range" data-title="r2c1">10</td><td class="available in-range" data-title="r2c2">11</td><td class="available in-range" data-title="r2c3">12</td><td class="available in-range" data-title="r2c4">13</td><td class="available in-range" data-title="r2c5">14</td><td class="available in-range" data-title="r2c6">15</td></tr><tr><td class="available in-range" data-title="r3c0">16</td><td class="available in-range" data-title="r3c1">17</td><td class="available in-range" data-title="r3c2">18</td><td class="available in-range" data-title="r3c3">19</td><td class="available in-range" data-title="r3c4">20</td><td class="available in-range" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><ul><li>Today</li><li>Yesterday</li><li>Last 7 Days</li><li>Last 30 Days</li><li>This Month</li><li>Last Month</li><li class="active">Custom Range</li></ul><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
    
    
    
    </body>
</html>