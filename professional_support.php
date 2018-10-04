<?php
    
    session_start();
    $username = $_SESSION["username"];
    // Check if Session has username and it is not empty
    if(!(isset($_SESSION["username"]) && $_SESSION["username"]!=''))
    {   
        header('Location: login.html');
        exit;
    }
?>
<?php 
    require('connection.php');
    
    // get all cancers names from database against tblzlucancers    
    $query = "SELECT tblzluspecial.id AS SpecialID,tblzluspecial.Name AS SpecialName FROM tblzluspecial";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    
    $specialNameArray = array();
    $specialIdArray = array();
    $specialNameArray[0] = 'Unknown';
    for ($i=1; $i<$rows; $i++)
    {

        $row = mysqli_fetch_assoc($result);
        $specialNameArray[$i] = $row["SpecialName"];
        $specialIdArray[$i] = $row["SpecialID"];           
    }
    
    // get all cancers names from database against tblzlucancers    
    $query = "SELECT tblzlucancers.id AS CancerID,tblzlucancers.Name AS CancerName FROM tblzlucancers";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    $cancerNameArray = array();
    $cancerIdArray = array();
    // Set Unknown at first index
    $cancerNameArray[0] = 'Unknown';
    for ($i=1; $i<$rows; $i++)
    {

        $row = mysqli_fetch_assoc($result);
        $cancerNameArray[$i] = $row["CancerName"];
        $cancerIdArray[$i] = $row["CancerID"];        
    }  

    $query = "SELECT tblzluchemotherapy.Name AS ChemotherapyName,tblzluchemotherapy.id FROM tblzluchemotherapy";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    $chemotherapyNameArray = array();
    $chemotherapyIdArray = array();
    $chemotherapyNameArray[0] = 'Unknown';
    for ($i=1; $i<$rows; $i++)
    {

        $row = mysqli_fetch_assoc($result);
        $chemotherapyIdArray[$i] = $row["id"];
        $chemotherapyNameArray[$i] = $row["ChemotherapyName"];        
    }  
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

        <title>CHNMS| Professional Support Person Info</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <script src="assets/js/jquery-1.11.0.min.js"></script>

        <!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">-->
        <!-- LATEST SELECT2 CSS-->        
        <link href="assets/dist/css/select2.css" rel="stylesheet" />

        <!-- Include Data Table Css -->
        <link href="assets/js/datatables/datatables.css" rel="stylesheet" />
          <script src="http://www.google-analytics.com/ga.js" async="" type="text/javascript"></script>
        

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
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
                                <li class="active">
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

                        <li class="active opened active">
                            <a href="index.php">
                                <i class="entypo-chart-bar"></i>
                                <span class="title">Reports</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span class="title">Not Matched Report</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">Matched Not Linked Report</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="title">Linked Not Confirmed Report</span>
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

                    <!-- Profile Info and Notifications -->
                    <div class="col-md-6 col-sm-8 clearfix">

                        <ul class="user-info pull-left pull-none-xsm">

                            <!-- Profile Info -->
                            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
                                    <?php echo $username;?> 
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
                                <a href="logout.php">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>
                <!-- Comments popups
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="alert alert-success" id="adddemosuccess">
                            <strong>New </strong> patient - demographics record added sucessfully!</div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="alert alert-info" id="updatedemosuccess">
                            <strong>Patient - Demographics Record </strong>updated sucessfully!</div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="alert alert-success" id="adddiagsuccess">
                            <strong>New </strong> patient - diagnosis record added sucessfully!</div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="alert alert-info" id="updatediagsuccess">
                            <strong>Patient - Diagnosis Record </strong>updated sucessfully!</div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="alert alert-success" id="addtreatmentsuccess">
                            <strong>New </strong> patient - treatment / side effets record added sucessfully!</div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="alert alert-info" id="updatetreatmentsuccess">
                            <strong>Patient - Treament / Side Effects Record </strong>updated sucessfully!</div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="alert alert-success" id="addpsychosuccess">
                            <strong>New </strong> patient - psychosocial issues record added sucessfully!</div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="alert alert-info" id="updatepsychosuccess">
                            <strong>Patient - Psychosocial Issues </strong>updated sucessfully!</div> 
                    </div>
                </div>
                -->
                <div class="row">
                    <div class="col-md-2 col-sm-8 "></div>
                    <div class="col-md-2 col-sm-8 "></div>
                    <div class="col-md-2 "></div>
                    <div id="search" class="col-md-3">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-search"></i></span>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" />
                        </div>
                        <div id="list"></div>
                    </div>
                    <div class="col-md-3 clearfix">
                        <div class="pull-left">  
                              <button id="addBtn" class="btn btn-info btn-sm" type="button">
                                <i class="entypo-plus-circled"></i>
                              </button>
                              <!--
                              <button  id="viewBtn" class="btn btn-info btn-sm" type="button">
                                <i class="entypo-eye"></i>
                              </button>
                          -->
                              <button id="editBtn" class="btn btn-info btn-sm" type="button">
                                <i class="entypo-pencil"></i>
                              </button>
                              <button class="btn btn-danger" id="delBtn">Delete</button>
                        </div> 
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
                                        <h3>Professional Support Information</h3>
                                    </div>
                           
                        
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs" id="mytabs">
                                        	<li class="active"><a href="#demographics" id="demographics1" class="demographics" data-toggle="tab">Demographics</a></li>
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
                                    <div class="row"> <!--ROW 1-->
                                            
                                        <div class="col-md-6">                         		        	
                         		        	<div class="well well-sm">
												<h4>Professional Support Person Contact Information</h4>
											</div>                			
                                   		</div>
                                   		
                                   		<div class="col-md-6">                         		        	
                         		        	<div class="well well-sm">
												<h4>Professional Support Information</h4>
											</div> 														               			
                                   		</div>
                                    </div>
                                    
                                    <div class="row"> <!-- ROW 2 -->
                                        <div class="col-md-1">
                                            <label class="control-label" for="pid">Patient ID</label>
                                            <input class="form-control" name="pid" id="pid" placeholder="PatientID" type="text">                                        
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" for="fname">First Name</label>
                                            <input class="form-control" name="fname" id="fname" placeholder="First Name" type="text">                                       
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="lname">Last Name</label>
                                            <input class="form-control" name="lname" id="lname" placeholder="Last Name" type="text">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="sp_status">Support Person Status</label>
                                            <select class="form-control" id="sp_status">
                                                <option value="unknown">Unknown</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>    
                                    </div>
                                    <br>
                                    
                                    <div class="row"> <!-- ROW 3 -->
                                        <div class="col-md-6">
                                            <label class="control-label" for="addr">Address</label>
                                            <input class="form-control" name="addr" id="addr" placeholder="Address" type="text">                                        
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" for="inact_date_start">Inactive Date Start</label>
                                            <input class="form-control" name="inact_date_start" id="inact_date_start" placeholder="Date Start" type="text">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" for="inact_date_end">Inactive Date End</label>
                                            <input class="form-control" name="inact_date_end" id="inact_date_end" placeholder="Date End" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Start of Row - Patient Contact Information-->
                                    <div class="row"> <!-- ROW 4 --> 
                                            
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

                                        <div class="col-md-2">
                                            <label class="control-label" for="train_date">Date of Initial Training</label>
                                            <input class="form-control" name="train_date" id="train_date" placeholder="Training Date" type="text">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="act_level">Preffered Activity Level (For a 30 Day period)</label>
                                            <input class="form-control" name="act_level" id="act_level" placeholder="act_level" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="row"> <!-- ROW 5 -->
                                        <div class="col-md-2">
                                            <label class="control-label" for="country">Country</label>
                                            <input class="form-control" name="country" id="country" placeholder="Country" type="text">                                          
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="hm_phone">Home Phone</label>
                                            <input class="form-control" name="hm_phone" id="hm_phone" placeholder="hm_phone" type="text">                                       
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="biz_phone">Business Phone</label>
                                            <input class="form-control" name="biz_phone" id="biz_phone" placeholder="biz_phone" type="text">                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="well well-sm">
                                                <h4>General Comments</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                        
                                    <div class="row"> <!-- ROW 6 -->
                                        <div class="col-md-3">
                                            <label class="control-label" for="other_phone">Other Phone</label>
                                            <input class="form-control" name="other_phone" id="other_phone" placeholder="other_phone" type="text">
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label" for="email">Email Address</label>
                                            <input class="form-control" name="email" id="email" placeholder="email" type="text">
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" id="general" placeholder="" style="height: 52px;"></textarea>
                                        </div>
                                    </div>
                                    <br/>
                                        
                                    <div class="row"> <!-- ROW 7  --> 
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <h4>Patient Support Person Vitals</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>

                                    <div class="row"> <!-- ROW 8  --> 
                                        <div class="col-sm-2"> 
                                            <label class="control-label" for="dob">Date of Birth</label>
                                            <input id="dob" class="form-control datepicker" type="text">
                                        </div>
                                        <div class="col-sm-1"> 
                                            <label class="control-label" for="psp_age">Age</label>
                                            <input class="form-control" name="psp_age" id="psp_age" placeholder="" type="text">
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label" for="sex">Sex</label>
                                            <select class="form-control" id="sex">
                                                <option value="unknown">Unknown</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label" for="prm_lang">Language Spoken</label>
                                            <input class="form-control" name="prm_lang" id="prm_lang" placeholder="" type="text">
                                        </div>

                                        <div class="col-sm-2"> 
                                            <label class="control-label" for="psp_age_ill">Age at time of Illness</label>
                                            <input class="form-control" name="psp_age_ill" id="psp_ill" placeholder="" type="text">
                                        </div>
                                    </div>
                                    <br/>

                                    <div class="row"> <!--ROW 9 -->
                                        <div class="col-md-6">
                                            <button id="btnUpdateDemographics" class="btn btn-success">Add</button>
                                        </div>
                                        <!--
                                        <div class="col-md-6">
                                            <button id="btnToggle" class="btn btn-danger">Toggle</button>
                                        </div>
                                        -->
                                    </div>
                                </div>                                      
                                 
                                    
                                <div id="psychosocial" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_lang">Primary Language</label>
                                            <select class="form-control" id="phy_lang">
                                               
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_mstatus">Marital Status</label>
                                            <select class="form-control" id="phy_mstatus">
                                                
                                            </select>
                                        </div>

                                        <div class="col-md-2"></div>                                    
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_nochild">No. of Children</label>
                                            <input type="text" class="form-control" id="phy_nochild">

                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_childname">Children Name</label>
                                            <select class="form-control" id="phy_childname">
                                                
                                            </select>
                                        </div>

                                        <div class="col-md-2"></div>                                    
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_occup">Occupation</label>
                                            <input class="form-control" name="phy_occup" id="phy_occup" placeholder="occup" type="text">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_work">Have you continued to work during your treatment ?</label>
                                            <select class="form-control" id="phy_work">
                                            	<option value="unknown">Unknown</option>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2"></div>                                    
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_race">Race (optional)</label>
                                            <select class="form-control" id="phy_race">
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="phy_rel">Religion (Optional)</label>
                                            <select class="form-control" id="phy_rel">
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2"></div>                                    
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <label class="control-label" for="phy_visit">If possible would you like a face to face visit ?</label>
                                            <select class="form-control" id="phy_visit">
                                               <option></option>
                                               <option>No</option>
                                               <option>Yes</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2"></div>                                    
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <label class="control-label" for="phy_comments">Comments</label>
                                            <textarea class="form-control" id="phy_comments" placeholder="" style="height: 70px;"></textarea>
                                        </div>
                                        
                                        <div class="col-md-2"></div>                                    
                                    </div> 
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <button id="psychosocialUpdateBtn" onclick="psychosocialUpdate();return false;" class="btn btn-success">Add</button>
                                        </div>
                                    </div>                       
                                </div>

                            </div>
                           <!-- End of Pannel Body-->
                            </div>
                
                            </div>
                     </div>

                 


                <!-- Footer -->
                <footer class="main" id="footerSection">

                    &copy; 2016 <strong>Cancer Hope | Matching System</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

                </footer>
            </div>


            






        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/main-gsap.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/cancerhopeJS/jquery.masked-input.js"></script>
        
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
        <script src="assets/js/cancerhopeJS/jquery.masked-input.js"></script>
        
        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>
        <script src="assets/dist/js/select2.full.js"></script>

        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>
          
        <script src="assets/js/cancerhopeJS/functions.js"></script>
        <script src="assets/js/cancerhopeJS/professional_support.js"></script>
    </body>
</html>