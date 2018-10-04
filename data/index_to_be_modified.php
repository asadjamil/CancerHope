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
	   <!--Style for Data Tables-->
	   <style>
	   	.file-input-wrapper { overflow: hidden; position: relative; cursor: pointer; z-index: 1; }
	   	.file-input-wrapper input[type=file], .file-input-wrapper input[type=file]:focus, .file-input-wrapper input[type=file]:hover { position: absolute; top: 0; left: 0; cursor: pointer; opacity: 0; filter: alpha(opacity=0); z-index: 99; outline: 0; }.file-input-name { margin-left: 8px; }
	   </style>
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
                                <li class="active">
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
                                <li>
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
					 <!-- Patient Information Search -->
                <div class="row">
                
                		<div class="col-sm-3 ">
                			<div class="tile-stats tile-orange"> 
                				<div class="icon">
                					<i class="entypo-suitcase"></i>
                				</div> 
	                				<div class="num">
	                				18877
	                				</div> 
	                				<h3>Registered Patients</h3> 
	                				<p>so far in system</p> 
	                		</div> 
                		</div>
                		
                		<!--Script for Data Tables-->
					<script type="text/javascript">
						jQuery( document ).ready( function( $ ) {
						var $table1 = jQuery( '#table-1' );
						// Initialize DataTable
						$table1.DataTable( {
						"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
						"bStateSave": true
						});
						// Initalize Select Dropdown after DataTables is created
						$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
						minimumResultsForSearch: -1
						});
						} );
					</script>

                		<div class="col-sm-3 ">
                		<div class="dataTables_wrapper" id="table-1_wrapper">
                			<div id="table-1_length" class="dataTables_length">
                				<label>Show 
	                				<div id="s2id_autogen1" class="select2-container">
		                				<a href="javascript:void(0)" class="select2-choice" tabindex="-1">   
		                					<span id="select2-chosen-2" class="select2-chosen">
		                						10
		                					</span>
		                					<abbr class="select2-search-choice-close"></abbr>   
		                					
		                					<span class="select2-arrow" role="presentation">
		                						<b role="presentation"></b>
		                					</span>
		                				</a>	
		                					<label for="s2id_autogen2" class="select2-offscreen"></label>
		                					<input id="s2id_autogen2" aria-labelledby="select2-chosen-2" class="select2-focusser select2-offscreen" aria-haspopup="true" role="button" type="text">
			                				
			                				<div class="select2-drop select2-display-none">   
		     	           						<div class="select2-search select2-search-hidden select2-offscreen">       
			     	           						<label for="s2id_autogen2_search" class="select2-offscreen"></label>       
		     		           						<input placeholder="" id="s2id_autogen2_search" aria-owns="select2-results-2" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" type="text">   
		     		           					</div>   
		     		           					
		     		           					<ul id="select2-results-2" class="select2-results" role="listbox">   </ul>
	     		           				</div>
	     		           		</div>
	     		           		<select style="display: none;" title="" tabindex="-1" class="" aria-controls="table-1" name="table-1_length">
		     		           		<option value="10">10</option>
		     		           		<option value="25">25</option>
		     		           		<option value="50">50</option>
		     		           		<option value="-1">All</option>
	     		           		</select> entries
     		           		</label>
     		           	</div>
     		           	
     		           	<div class="dataTables_filter" id="table-1_filter">
     		           		<label>Search:<input aria-controls="table-1" placeholder="" class="" type="search"></label>
     		           	</div>
     		           	
     		           	<table aria-describedby="table-1_info" role="grid" class="table table-bordered datatable dataTable" id="table-1"> 
     		           		<thead> 
     		           			<tr role="row">
     		           				<th aria-label="Rendering engine: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="table-1" tabindex="0" class="sorting" data-hide="phone">Rendering engine</th>
     		           				<th aria-label="Browser: activate to sort column ascending" style="width: 271.167px;" colspan="1" rowspan="1" aria-controls="table-1" tabindex="0" class="sorting">Browser</th>
     		           				<th aria-label="Platform(s): activate to sort column ascending" style="width: 248.167px;" colspan="1" rowspan="1" aria-controls="table-1" tabindex="0" class="sorting" data-hide="phone">Platform(s)</th>
     		           				<th aria-label="Engine version: activate to sort column ascending" style="width: 192.167px;" colspan="1" rowspan="1" aria-controls="table-1" tabindex="0" class="sorting" data-hide="phone,tablet">Engine version</th>
     		           				<th aria-label="CSS grade: activate to sort column ascending" aria-sort="descending" style="width: 141.167px;" colspan="1" rowspan="1" aria-controls="table-1" tabindex="0" class="sorting_desc">CSS grade</th>
     		           			</tr> 
     		           		</thead> 
     		           		<!-- Data Entry in Table-->
     		           		<tbody>                                                          
     		           			<tr role="row" class="gradeX odd"> 
     		           				<td>Trident</td> 
     		           				<td>Internet Explorer 4.0</td> 
     		           				<td>Win 95+</td> 
     		           				<td class="center">4</td> 
     		           				<td class="center sorting_1">X</td> 
     		           				</tr>
     		           				
  		           				<tr role="row" class="gradeX even"> 
     		           				<td>Tasman</td> 
     		           				<td>Internet Explorer 4.5</td> 
     		           				<td>Mac OS 8-9</td> 
     		           				<td class="center">-</td> 
     		           				<td class="center sorting_1">X</td> 
  		           				</tr>
  		           				
  		           				<tr role="row" class="gradeX odd"> 
  		           					<td>Misc</td> 
  		           					<td>Dillo 0.8</td> 
  		           					<td>Embedded devices</td> 
  		           					<td class="center">-</td> 
  		           					<td class="center sorting_1">X</td> 
  		           				</tr>
  		           				<tr role="row" class="gradeX even"> 
	  		           				<td>Misc</td> 
  			           				<td>Links</td> 
  			           				<td>Text only</td> 
  			           				<td class="center">-</td> 
  			           				<td class="center sorting_1">X</td> 
  			           			</tr>
  			           			
  			           			<tr role="row" class="gradeX odd"> 
  			           				<td>Misc</td> 
  			           				<td>Lynx</td> 
  			           				<td>Text only</td> 
  			           				<td class="center">-</td> 
  			           				<td class="center sorting_1">X</td> 
  			           			</tr>
  			           			
  			           			<tr role="row" class="gradeC even"> 
  			           				<td>Trident</td> 
  			           				<td>Internet Explorer 5.0</td> 
  			           				<td>Win 95+</td> 
  			           				<td class="center">5</td> 
  			           				<td class="center sorting_1">C</td> 
  			           			</tr>
  			           			
  			           		</tbody> 
  			           		
  			           		<tfoot> 
  			           			<tr>
  			           				<th colspan="1" rowspan="1">Rendering engine</th>
  			           				<th colspan="1" rowspan="1">Browser</th>
  			           				<th colspan="1" rowspan="1">Platform(s)</th>
  			           				<th colspan="1" rowspan="1">Engine version</th>
  			           				<th colspan="1" rowspan="1">CSS grade</th></tr> 
  			           		</tfoot> </table>
  			           		
  			           		<div aria-live="polite" role="status" id="table-1_info" class="dataTables_info">Showing 1 to 10 of 57 entries</div>
  			           		<div id="table-1_paginate" class="dataTables_paginate paging_simple_numbers">
	  			           		<a id="table-1_previous" tabindex="0" data-dt-idx="0" aria-controls="table-1" class="paginate_button previous disabled">Previous</a>
	  			           		<span>
	  			           			<a tabindex="0" data-dt-idx="1" aria-controls="table-1" class="paginate_button current">1</a>
	  			           			<a tabindex="0" data-dt-idx="2" aria-controls="table-1" class="paginate_button ">2</a>
	  			           			<a tabindex="0" data-dt-idx="3" aria-controls="table-1" class="paginate_button ">3</a>
	  			           			<a tabindex="0" data-dt-idx="4" aria-controls="table-1" class="paginate_button ">4</a>
	  			           			<a tabindex="0" data-dt-idx="5" aria-controls="table-1" class="paginate_button ">5</a>
	  			           			<a tabindex="0" data-dt-idx="6" aria-controls="table-1" class="paginate_button ">6</a>
	  			           		</span>
	  			           		
	  			           		<a id="table-1_next" tabindex="0" data-dt-idx="7" aria-controls="table-1" class="paginate_button next">Next</a>
	  			           	</div>
	  			          </div>
                		</div>
                		<div class="col-sm-3 ">
								<a href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" class="btn btn-default">Show Me</a>
									 
							
								</div>	 
									<script>
									$(document).ready(function(){
									    $("#myBtn").click(function(){
									        $("#myModal").modal();
									    });
									});
									</script>

                		
                	
                </div>
                <br />
                
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
                
                <br />
  				<div class="row">
					 <div class="col-md-12"> 
						<ul class="nav nav-tabs bordered">
						 	<!-- available classes "bordered", "right-aligned" --> 
						 	<li class="active"> 
						 		<a aria-expanded="true" href="#home" data-toggle="tab"> 
						 			<span class="visible-xs">
						 				<i class="entypo-home"></i>
						 			</span> 
						 			<span class="hidden-xs">Home</span>
						 		</a> 
						 	</li> 
						 	
						 	<li class=""> 
						 		<a aria-expanded="false" href="#profile" data-toggle="tab"> 
						 			<span class="visible-xs">
						 				<i class="entypo-user"></i>
						 			</span> 
						 			
						 			<span class="hidden-xs">Profile</span> 
						 		</a> 
						 	</li> 
	
						 	<li class=""> 
						 		<a aria-expanded="false" href="#messages" data-toggle="tab"> 
						 			<span class="visible-xs">
							 			<i class="entypo-mail"></i>
						 			</span> <span class="hidden-xs">Messages</span> 
						 		</a> 
						 	</li> 
	
						 	<li class=""> 
						 		<a aria-expanded="false" href="#settings" data-toggle="tab"> 
						 			<span class="visible-xs">
						 				<i class="entypo-cog"></i>
						 			</span> 
						 			
						 			<span class="hidden-xs">Settings</span> 
						 		</a> 
						 	</li>
						</ul> 
						<div class="tab-content"> 
							<div class="tab-pane active" id="home"> 
								<div style="position: relative; overflow: hidden; width: auto; height: 120px;" class="slimScrollDiv">
									<div style="overflow: hidden; width: auto; height: 120px;" class="scrollable" data-height="120"> 
										<p>Home L1</p> 
										<p>Home L2</p> 
										<p>Home L3</p>
									</div>
									<div style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 6px; position: absolute; top: 67px; opacity: 0.3; display: none; border-radius: 3px; z-index: 99; right: 1px; height: 52.5547px;" class="slimScrollBar"></div>
									<div style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div>
								</div> 
							</div> 
							
							<div class="tab-pane" id="profile"> 
								<p>Profile L1</p> 
								<p>Profile L2</p> 
								<p>Profile L3</p> 
							</div> 
							
							<div class="tab-pane" id="messages"> 
								<div class="row">
						 			<div class="col-md-4">
						 			<p>Messages L1</p>
						 			</div> 								
									<div class="col-md-4">
						 			<p>Messages L1</p>
						 			</div>
						 			<div class="col-md-4">
						 			<p>Message L3</p>
						 			</div>
						 		</div>
							</div> 
	
							<div class="tab-pane" id="settings"> 
								<div class="row">
						 			<div class="col-md-4">
						 			<p>Settings L1</p>
						 			</div> 								
									<div class="col-md-4">
						 			<p>Settings L1</p>
						 			</div>
						 			<div class="col-md-4">
						 			<p>Settings L3</p>
						 			</div>
						 		</div>
								
								
								
							</div> 
						</div> 
					</div> 
				</div> 
				
              
                <!-- Footer -->
                <footer class="main">

                    &copy; 2016 <strong>Cancer Hope - Matching System For Cancer Support</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

                </footer>
            </div>
		  
		  <!--MODAL 6-->		  
		  <div style="display: none;" class="modal fade" id="modal-6">
			 <div class="modal-dialog"> 
			 	<div class="modal-content"> 
			 		<div class="modal-header"> 
			 			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
			 			<h4 class="modal-title">Patient Information Search</h4> 
			 		</div> 
			 			<div class="modal-body"> 
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
			 					<div class="col-md-12"> 
			 						<div class="form-group"> 
			 							<label for="field-3" class="control-label">Address</label> 
			 							<input class="form-control" id="field-3" placeholder="Address" type="text"> 
			 						</div>
			 					</div> 
			 				</div> 
			 				
			 				<div class="row"> 
			 					<div class="col-md-4"> 
			 						<div class="form-group"> 
			 							<label for="field-4" class="control-label">City</label> 
			 							<input class="form-control" id="field-4" placeholder="Boston" type="text"> 
			 						</div> 
			 					</div> 
			 					
			 					<div class="col-md-4"> 
			 						<div class="form-group"> 
			 							<label for="field-5" class="control-label">Country</label> 
			 							<input class="form-control" id="field-5" placeholder="United States" type="text"> 
			 						</div> 
			 					</div> 
			 					
			 					<div class="col-md-4"> 
			 						<div class="form-group"> 
			 							<label for="field-6" class="control-label">Zip</label> 
			 							<input class="form-control" id="field-6" placeholder="123456" type="text"> 
			 						</div> 
			 					</div> 
			 				</div> 
			 				
			 				<div class="row"> 
			 					<div class="col-md-12"> 
			 						<div class="form-group no-margin"> 
				 						<label for="field-7" class="control-label">Personal Info</label> 
				 						<textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 30.6667px;" class="form-control autogrow" id="field-7" placeholder="Write something about yourself"></textarea> 
			 						</div> 
			 					</div> 
			 				</div> 
			 			</div> 
			 			
			 			<div class="modal-footer"> 
			 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
			 				<button type="button" class="btn btn-info">Save changes</button> 
			 			</div> 
			 		</div> 
			 	</div>
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