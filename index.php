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

        <title>Cancer Hope | Matching System For Cancer Support</title>

        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">-->
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
                            <div class="panel panel-primary" id="patient_information" hidden>
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h3>Patient Information</h3>
                                    </div>
                           
                        
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs" id="mytabs">
                                        <li class="active"><a href="#demographics" id="demographics1" class="demographics" data-toggle="tab">Demographics</a></li>
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
                                        <div class="col-md-1">
                                            <div class="radio"> 
                                                <label> 
                                                    <input name="CallerInfoRadios" id="patientCaller" class="patientCaller" value="Patient" checked="" type="radio">Patient
                                                </label>
                                            
                                              
                                            </div>  
                                            <div class="radio"> 
                                                <label> 
                                                    <input name="CallerInfoRadios" id="familyCaller" class="familyCaller" value="Family" checked="" type="radio">Family
                                                </label>  
                                            </div>                                
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="full_name">Full Name</label>
                                            <input class="form-control required" name="full_name" id="full_name" placeholder="Full Name" type="text">                                       
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" for="caller_phone">Caller Phone</label>
                                            <input class="form-control required" name="caller_phone" id="caller_phone" placeholder="Phone" type="text">                                     
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="prm_lang">Primary Language</label>
                                            <input class="form-control" name="prm_lang" id="prm_lang" placeholder="Primary Language" type="text">
                                        </div>
                                        
                                        <div class="col-sm-3"> 
                                            
                                            <label class="control-label" for="dob">Date of Birth</label>
                                            <input id="dob" class="form-control datepicker" data-masked-input="9999-99-99" placeholder="YYYY/MM/DD" maxlength ="8" type="text">
                                            
                                            <!--<div class="form-group">
                                                
                                                <div class="input-group date form_datetime col-md-2 " data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                    <input class="form-control" size="16" type="text" value="" readonly>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                                </div>
                                                <input type="hidden" id="dtp_input1" value="" /><br/>
                                            </div>
                                            -->
                                        </div>
                                        <div class="col-sm-1"> 
                                            <label class="control-label" for="age">Age</label>
                                            <input class="form-control" name="age" id="age" placeholder="age" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <!-- Start of Row - Caller Information - Fields -->
                                    <div class="row"> <!-- Start of Row 2 -->
                                        <div class="col-md-3 form-group">
                                            <label class="control-label" for="relation">Relation to Patient</label>
                                            <!-- <input class="form-control" name="relation" id="relation" placeholder="Relation" type="text"> -->                                      
                                            <select class="form-control" id="relation">
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label class="control-label" for="how">How did you hear about us?</label>
                                            <!--put class="form-control" name="how" id="how" placeholder="" type="text">--> 
                                            <select class="form-control" id="how">
                                                
                                            </select>                                       
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="control-label" for="sex">Sex</label>
                                            <!-- <input class="form-control" name="sex" id="sex" placeholder="Male/Female" type="text"> -->
                                            <select class="form-control" id="sex">
                                                <option value="Unknown">Unknown</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
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
                                                <h4>General Comments</h4>
                                            </div>                                                  
                                        </div>
                                    </div>
                                    
                                    <div class="row"> <!-- Start of Row 1 -->
                                        <div class="col-md-2">
                                            <label class="control-label" for="pid">Patient ID</label>
                                            <input class="form-control" name="pid" id="pid" placeholder="PatientID" type="text" readonly="true">                                        
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="fname">First Name</label>
                                            <input class="form-control required" name="fname" id="fname" placeholder="First Name" type="text">                                      
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="lname">Last Name</label>
                                            <input class="form-control required" name="lname" id="lname" placeholder="Last Name" type="text">
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" id="general" placeholder="" style="height: 52px;"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                        
                                    <div class="row"> <!-- Start of Row 2 -->
                                        <div class="col-md-6">
                                            <label class="control-label" for="addr">Address</label>
                                            <input class="form-control" name="addr" id="addr" placeholder="Address" type="text">                                        
                                        </div>
                                    </div>
                                    <br>
                                        
                                    <div class="row"> <!-- Start of Row 3 -->
                                        <div class="col-md-2">
                                            <label class="control-label" for="city">City</label>
                                            <input class="form-control required" name="city" id="city" placeholder="City" type="text">                                          
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="state">State</label>
                                            <input class="form-control required" name="state" id="state" placeholder="state" type="text">                                       
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="zip">Zip</label>
                                            <input class="form-control required" name="zip" id="zip" data-masked-input="99999" placeholder="XXXXX" maxlength="5"type="text">                                        
                                        </div>
                                        
                                        
                                        
                                    </div>
                                        
                                    <div class="row"> <!-- Start of Row 4 -->
                                        <div class="col-md-2">
                                            <label class="control-label" for="country">Country</label>
                                            <input class="form-control required" name="country" id="country" placeholder="Country" type="text">                                         
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="hm_phone">Home Phone</label>
                                            <input class="form-control required" name="hm_phone" id="hm_phone"  placeholder="XXX-XXX-XXXX" type="text">                                     
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="biz_phone">Business Phone</label>
                                            <input class="form-control required" name="biz_phone" id="biz_phone" data-masked-input="999-999-9999" placeholder="XXX-XXX-XXXX" type="text">                                       
                                        </div>

                                        
                                    </div>
                                    <br/>
                                    <div class="row">
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
                                    
                                <div id="diagnosis" class="tab-pane">
                                                                        
                                    <div class="row"> 
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <h4>Current Cancer</h4>
                                            </div>                          
                                        </div>    
                                             
                                         
                                    </div>       
                                                            
                                    <div class="row"> 
                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="cancer_type">Do you know what type of cancer you are being treated for ?</label>
                                            <!--<input class="form-control" name="cancer_type" id="caner_type" placeholder="cancer_type" type="text">-->
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                    <button id="addDataCurrentCancerBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataCurrentCancer">Add Current Cancer</button>  
                                                </div>
                                                <select class="form-control" id="cancer_type">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    
                                    <!-- Comment Control and add in modal
                                    <div class="row" id="currentCancerControl">     
                                            
                                        <div class="col-md-2">
                                            <label class="control-label" for="cancer_date">Date Diagnosed</label>
                                            <input type="text" class="form-control" id="cancer_date">
                                            
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="cancer_stage">Stage</label>
                                            <select class="form-control" id="cancer_stage">
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="cancer_cancer">Cancer</label>
                                            <select class="form-control" id="cancer_cancer">
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-2">    
                                            <button id="addCurrentCancerRow" class="btn btn-info btn-sm" type="button">
                                                <i class="entypo-plus-circled"></i>
                                            </button> 
                                        </div>                                  
                                    </div>
                                    <br>
                                    -->
                                    <!--
                                    <div class="row" id="currentCancerTable">
                                        <div class="col-md-12">
                                            
                                            <div id="current-cancer-table_wrapper" class="dataTables_wrapper no-footer">
                                                <table class="table table-bordered table-striped datatable dataTable no-footer" id="current-cancer-table" role="grid" aria-describedby="current-cancer-table_info"> 
                                                    <thead> 
                                                        <tr role="row">
                                                            
                                                            <th class="sorting" tabindex="0" aria-controls="current-cancer-table" rowspan="1" colspan="1" style="width: 130.333px;" aria-label="Date: activate to sort column ascending">Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="current-cancer-table" rowspan="1" colspan="1" style="width: 104.333px;" aria-label="Stage: activate to sort column ascending">Stage</th>
                                                            <th class="sorting" tabindex="0" aria-controls="current-cancer-table" rowspan="1" colspan="1" style="width: 130.333px;" aria-label="Cancer: activate to sort column ascending">Cancer</th>
                                                            <th class="sorting" tabindex="0" aria-controls="current-cancer-table" rowspan="1" colspan="1" style="width: 130.333px;" aria-label="Cancer: activate to sort column ascending"></th>               
                                                        </tr> 
                                                    </thead>  
                                                </table>

                                                <div class="dataTables_paginate paging_simple_numbers" id="current-cancer_paginate"></div>

                                                <br>
                                                
                                                <!--<a href="javascript: fnClickAddRowCurrentCancer();" class="btn btn-primary"> <i class="entypo-plus"></i>
                                                    Add Row
                                                </a>
                                                <a href="javascript: fnClickDelRowCurrentCancer();" class="btn btn-primary"> <i class="entypo-minus"></i>
                                                    Delete Row
                                                </a>
                                                
                                                <!--<button class="btn btn-primary" id="delbtn">Delete Row</button> 
                                            </div>                                            
                                        </div>    
                                    </div>
                                    -->
                                    <!--<div class="row">-->
                                        
                                        <!--
                                        <div class="col-md-12">
                                            <button id="addDataCurrentCancerBtn" class="btn btn-primary" data-toggle="modal" data-target="#addDataCurrentCancer">Add Current Cancer</button>
                                              <p></p>
                                            -->  
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataCurrentCancer" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Current Cancer Data</h4>
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
                                                                <label class="control-label" for="cancer_date">Date Diagnosed</label>
                                                                <input type="text" class="form-control" id="cancer_date">

                                                                <label class="control-label" for="cancer_stage">Stage</label>
                                                                <select class="form-control" id="cancer_stage">
                                                                </select>
                                                            
                                                                <label class="control-label" for="cancer_cancer">Cancer</label>
                                                                <select class="form-control" id="cancer_cancer">
                                                                <?php
                                                                    // load cancername from tblzlucancers
                                                                    for ($i=0; $i<$rows; $i++)
                                                                    {
                                                                        echo '<option>'.$cancerIdArray[$i].$cancerNameArray[$i].'</option>';      
                                                                    }
                                                                ?>    
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button id="saveDataCurrentCancerBtn" onclick="saveDataCurrentCancer();return false;"  class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        <!-- </div>-->    
                                        <div class="col-md-12">
                                            <table id="addDataCurrentCancerTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Stage</th>
                                                    <th>Cancer</th>
                                                    <th width="60">Action</th> <!-- use width='160' if edit  -->
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    <!--</div>--> <!-- End Row-->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <h4>Metastatis History</h4>
                                            </div>                          
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-3">                                              
                                                <label class="control-label" for="cancer_spread">Has the cancer spread to any other part of the body ?</label>
                                                <!--<input class="form-control" name="cancer_type" id="caner_type" placeholder="cancer_type" type="text">-->
                                                <div class="input-group">    
                                                    <div class="input-group-btn"> 
                                                        <button id="addDataMetastasisBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataMetastasis">Add Metastasis</button>
                                                    </div>
                                                    <select class="form-control" id="cancer_spread">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                            </div>                                              
                                    </div>
                                    <br/>
                        
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                      
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataMetastasis" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Metastasis Data</h4>
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
                                                                <label class="control-label" for="metastasis_date">Date Metastasis</label>
                                                                <input type="text" class="form-control" id="metastasis_date">

                                                                <label class="control-label" for="metastasis_bodypart">Body Part</label>
                                                                <select class="form-control" id="metastasis_bodypart">
                                                                    
                                                                </select>
                                                                                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button id="saveDataMetastasisBtn" onclick="saveDataMetastasis();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>    
                                        <div class="col-md-12">
                                            <table id="addDataMetastasisTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Body Part</th>
                                                    <th width="80">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row-->

                                    <div class="row">   
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <h4>Cancer History</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">                                               
                                        
                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="cancer_history">Have you been treated for cancer before ?</label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                    <button id="addDataCancerHistoryBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataCancerHistory">Add Cancer History</button>  
                                                </div>
                                                <select class="form-control" id="cancer_history">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                              <p></p>
                                              
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataCancerHistory" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Cancer History Data</h4>
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
                                                                <label class="control-label" for="history_date">Date Diagnosed</label>
                                                                <input type="text" class="form-control" id="history_date">
                                                                                        
                                                                <label class="control-label" for="history_cancer">Cancer</label>
                                                                <select class="form-control" id="history_cancer">
                                                                <?php
                                                                    // load cancername from tblzlucancers
                                                                    for ($i=0; $i<$rows; $i++)
                                                                    {
                                                                        echo '<option>'.$cancerIdArray[$i].$cancerNameArray[$i].'</option>';      
                                                                    }
                                                                ?>
                                                                </select>
                                                                                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button id="saveDataCancerHistoryBtn" onclick="saveDataCancerHistory();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>    
                                        <div class="col-md-12">
                                            <table id="addDataCancerHistoryTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Cancer</th>
                                                    <th width="60">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row-->
                                    
                                    <br/>               
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <h4>Other History</h4>
                                            </div>
                                        </div>
                                    </div>              
                                    <div class="row">
                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="other_prob">Other Health Problems</label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                     <button id="addDataOtherHistoryBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataOtherHistory">Add Other History</button> 
                                                </div>
                                                <select class="form-control" id="other_prob">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>  
                                    </div>
                                    <br>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                           
                                          
                                              
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataOtherHistory" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Other History Data</h4>
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

                                        <div class="col-md-12">
                                            <table id="addDataOtherHistoryTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Other Health Problem</th>
                                                    <th width="160">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row-->
                                    <br/>
                                    <div class="row">                   
                                        <div class="col-md-6">
                                            <label class="control-label" for="diag_comm">Comments</label>
                                            <input class="form-control" id="diag_comm" type="text">
                                        </div>                                          
                                    </div>          
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button id="updateDiagnosis" onclick="updateDiagnosis();return false;" class="btn btn-success">Add</button>
                                        </div>
                                    </div>              
                                </div>  
                                                                                                                                                

                                    
                                <div id="treatment" class="tab-pane">
                                    <div class="row">
                                                    
                                        <div class="col-md-12">                                         
                                            <div class="well well-sm">
                                                <h4>Chemotherapy</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="chemo_control">Choose Option</label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                      <button id="addDataChemotherapyBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataChemotherapy">Add Chemotherapy</button>
                                                </div>
                                                <select class="form-control" id="chemo_control">
                                                   <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>  

                                    </div>
                                    <br/>  
                                    <div class="row">
                                        <div class="col-md-12">
  
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataChemotherapy" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Chemotherapy Data</h4>
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
                                                                <label class="control-label" for="chemo_date">Date</label>
                                                                <input type="text" class="form-control" id="chemo_date">

                                                                <label class="control-label" for="chemo_type">Type</label>
                                                                <select class="form-control" id="chemo_type">  
                                                                    <?php
                                                                    // load cancername from tblzlucancers
                                                                    for ($i=0; $i<$rows; $i++)
                                                                    {
                                                                        echo '<option>'.$chemotherapyIdArray[$i].$chemotherapyNameArray[$i].'</option>';      
                                                                    }
                                                                ?>
                                                                </select>

                                                                <label class="control-label" for="chemo_effect">Side Effects</label>
                                                                <select class="form-control" id="chemo_effect">
                                                                </select>
                                                            
                                                                
                                                                                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button onclick="saveDataChemotherapy();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>  

                                        <div class="col-md-12">
                                            <table id="addDataChemotherapyTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Side Effects</th>
                                                    <th width="160">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>

                                    </div> <!-- End Row--> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="chemo_comment">Comments</label>
                                            <input class="form-control" name="chemo_comment" id="chemo_comment" placeholder="comments" type="text">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">                                         
                                            <div class="well well-sm">
                                                <h4>Other Support Drugs</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">    
                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="otherSupport_control">Do you know what type of cancer you are being treated for ?</label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                      <button id="addDataOtherSupportDrugsBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataOtherSupportDrugs">Add Support Drugs</button>
                                                </div>
                                                <select class="form-control" id="otherSupport_control">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <br/>    
                                    <div class="row">
                                        <div class="col-md-12">

                                              
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataOtherSupportDrugs" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Other Support Drugs Data</h4>
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
                                                                <label class="control-label" for="other_date">Date</label>
                                                                <input type="text" class="form-control" id="other_date">

                                                                <label class="control-label" for="other_type">Type</label>
                                                                <select class="form-control" id="other_type">
                                                                </select>    
                                                                
                                                                <label class="control-label" for="other_effect">Side Effects</label>
                                                                <select class="form-control" id="other_effect">
                                                                </select>
                                                        
                                                                                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button onclick="saveDataOtherSupportDrugs();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>    
                                        <div class="col-md-12">
                                            <table id="addDataOtherSupportDrugsTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Side Effects</th>
                                                    <th width="160">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row-->   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="other_comment">Comments</label>
                                            <input class="form-control" name="other_comment" id="complemantaryProcedures_comment" placeholder="comments" type="text">
                                        </div>
                                    </div>   
                                    <br>            
                                    <div class="row">
                                        <div class="col-md-12">                                         
                                            <div class="well well-sm">
                                                <h4>Radiation</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="radiation_control">Control </label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                      <button id="addDataRadiationBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataRadiation">Add Radiation</button>
                                                </div>
                                                <select class="form-control" id="radiation_control">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>   
                                    <div class="row">
                                        <div class="col-md-12">
                                          
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataRadiation" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Radiation Data</h4>
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
                                                                <label class="control-label" for="radiation_date">Date</label>
                                                                <input type="text" class="form-control" id="radiation_date">

                                                                <label class="control-label" for="radiation_type">Type</label>
                                                                <select class="form-control" id="radiation_type">
                                                                </select>    
                                                                
                                                                <label class="control-label" for="radiation_effect">Side Effects</label>
                                                                <select class="form-control" id="radiation_effect">
                                                                </select>

                                                                <label class="control-label" for="radiation_bodyPart">Body Part</label>
                                                                <select class="form-control" id="radiation_bodyPart">
                                                                </select>
                                                                       
                                                                                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button onclick="saveDataRadiation();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>    
                                        <div class="col-md-12">
                                            <table id="addDataRadiationTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Side Effects</th>
                                                    <th>Body Part</th>
                                                    <th width="80">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="radiation_comment">Comments</label>
                                            <input class="form-control"  id="radiation_comment" placeholder="comments" type="text">
                                        </div>
                                    </div>  
                                    <br>                            
                                    <div class="row">
                                        <div class="col-md-12">                                         
                                            <div class="well well-sm">
                                                <h4>Surgery</h4>
                                            </div>
                                        </div>
                                        
                                    </div>   
                                    
                                    <div class="row">    
                                        
                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="surgery_control">Control</label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                       <button id="addDataSurgeryBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataSurgery">Add Surgery</button>
                                                </div>
                                                <select class="form-control" id="surgery_control">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataSurgery" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Surgery Data</h4>
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
                                                                <label class="control-label" for="surgery_date">Date</label>
                                                                <input type="text" class="form-control" id="surgery_date">

                                                                <label class="control-label" for="surgery_type">Type</label>
                                                                <select class="form-control" id="surgery_type">
                                                                </select>    
                                                                
                                                                <label class="control-label" for="surgery_effect">Side Effects</label>
                                                                <select class="form-control" id="surgery_effect">
                                                                </select>
                                                            
                                                                                                                           
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button onclick="saveDataSurgery();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>    
                                        <div class="col-md-12">
                                            <table id="addDataSurgeryTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Side Effects</th>
                                                    <th width="160">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row--> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="surgery_comment">Comments</label>
                                            <input class="form-control"  id="surgery_comment" placeholder="comments" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">                                         
                                            <div class="well well-sm">
                                                <h4>Special Procedures</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="specialProcedures_control">Control</label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                        <button id="addDataSpecialProceduresBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataSpecialProcedures">Add Procedures</button>
                                                </div>
                                                <select class="form-control" id="specialProcedures_control">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                           
                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataSpecialProcedures" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Special Procedures Data</h4>
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
                                                                <label class="control-label" for="specialProcedures_date">Date</label>
                                                                <input type="text" class="form-control" id="specialProcedures_date">

                                                                <label class="control-label" for="specialProcedures_type">Type</label>
                                                                <select class="form-control" id="specialProcedures_type">
                                                                <?php
                                                                    // Loading data from tblzluspecial
                                                                    for ($i=0; $i<$rows; $i++)
                                                                    {

                                                                        echo '<option>'.$specialIdArray[$i].$specialNameArray[$i].'</option>';            
                                                                    }
                                                                ?>    
                                                                </select>    
                                                                
                                                                <label class="control-label" for="specialProcedures_effect">Side Effects</label>
                                                                <select class="form-control" id="specialProcedures_effect">
                                                                </select>
                                                            
                                                                                                                        
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button onclick="saveDataSpecialProcedures();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>    
                                        <div class="col-md-12">
                                            <table id="addDataSpecialProceduresTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Side Effects</th>
                                                    <th width="160">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row--> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="specialProcedures_commment">Comments</label>
                                            <input type="text" class="form-control"  id="specialProcedures_comment" >
                                        </div>   
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">                                         
                                            <div class="well well-sm">
                                                <h4>Complementary Procedures</h4>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">    
                                        <div class="col-md-3">                                              
                                            <label class="control-label" for="complemantaryProcedure_control">Control</label>
                                            <div class="input-group">    
                                                <div class="input-group-btn"> 
                                                        <button id="addDataComplementaryBtn" class="btn btn-gold" data-toggle="modal" data-target="#addDataComplementary">Add Complementary Procs.</button>
                                                </div>
                                                <select class="form-control" id="complemantaryProcedure_control">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!-- Modal -->
                                            <div class="modal fade" id="addDataComplementary" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title" id="addLabel">Complementary Procedures Data</h4>
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
                                                                <label class="control-label" for="complemantaryProcedures_date">Date</label>
                                                                <input type="text" class="form-control" id="complemantaryProcedures_date">

                                                                <label class="control-label" for="ComplemantaryProcedures_type">Type</label>
                                                                <select type="text" class="form-control" id="complemantaryProcedures_type">
                                                                </select>    
                                                                
                                                                <label class="control-label" for="complemantaryProcedures_effects">Side Effects</label>
                                                                <select class="form-control" id="complemantaryProcedures_effects">
                                                                </select>
                                                            
                                                                                                                       
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button onclick="saveDataComplemantaryProcedures();return false;" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div> <!-- End Modal Content -->
                                                </div> <!-- End Modal Dialogue-->
                                            </div> <!-- End Main Model--> 
                                        </div>    
                                        <div class="col-md-12">
                                            <table id="addDataComplemantaryProcedureTable" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Side Effects</th>
                                                    <th width="160">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>  
                                            </table>
                                        </div>
                                    </div> <!-- End Row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="complemantaryProcedures_comment">Comments</label>
                                            <input class="form-control" name="complemantaryProcedures_comment" id="other_comment" placeholder="comments" type="text">
                                        </div>    
                                    </div>   
                                    <br>           
                                    <div class="row">
                                        <div class="col-md-10">
                                            <button id="btnTreatment" class="btn btn-success" onclick="disableTreatmentFields();return false;">Next</button>
                                        </div>
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
                                                <option value="Unknown">Unknown</option>
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
                                                <option value="Unknown">Unknown</option>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
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
          <div style="top: 534.733px; left: 630px; right: auto; display: none;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
          <div style="top: 523.567px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Aug 2013</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">28</td><td class="off disabled" data-title="r0c1">29</td><td class="off disabled" data-title="r0c2">30</td><td class="off disabled" data-title="r0c3">31</td><td class="off disabled" data-title="r0c4">1</td><td class="available in-range" data-title="r0c5">2</td><td class="available in-range" data-title="r0c6">3</td></tr><tr><td class="available in-range" data-title="r1c0">4</td><td class="available in-range" data-title="r1c1">5</td><td class="available in-range" data-title="r1c2">6</td><td class="available in-range" data-title="r1c3">7</td><td class="available in-range" data-title="r1c4">8</td><td class="available in-range" data-title="r1c5">9</td><td class="available in-range" data-title="r1c6">10</td></tr><tr><td class="available in-range" data-title="r2c0">11</td><td class="available in-range" data-title="r2c1">12</td><td class="available in-range" data-title="r2c2">13</td><td class="available in-range" data-title="r2c3">14</td><td class="available active end-date" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available" data-title="r4c6">31</td></tr><tr><td class="available off" data-title="r5c0">1</td><td class="available off" data-title="r5c1">2</td><td class="available off" data-title="r5c2">3</td><td class="available off" data-title="r5c3">4</td><td class="available off" data-title="r5c4">5</td><td class="available off" data-title="r5c5">6</td><td class="available off" data-title="r5c6">7</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Aug 2013</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">28</td><td class="available off" data-title="r0c1">29</td><td class="available off" data-title="r0c2">30</td><td class="available off" data-title="r0c3">31</td><td class="available" data-title="r0c4">1</td><td class="available active start-date" data-title="r0c5">2</td><td class="available in-range" data-title="r0c6">3</td></tr><tr><td class="available in-range" data-title="r1c0">4</td><td class="available in-range" data-title="r1c1">5</td><td class="available in-range" data-title="r1c2">6</td><td class="available in-range" data-title="r1c3">7</td><td class="available in-range" data-title="r1c4">8</td><td class="available in-range" data-title="r1c5">9</td><td class="available in-range" data-title="r1c6">10</td></tr><tr><td class="available in-range" data-title="r2c0">11</td><td class="available in-range" data-title="r2c1">12</td><td class="available in-range" data-title="r2c2">13</td><td class="available in-range" data-title="r2c3">14</td><td class="available in-range" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="available" data-title="r2c6">17</td></tr><tr><td class="available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="available" data-title="r3c6">24</td></tr><tr><td class="available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="available" data-title="r4c6">31</td></tr><tr><td class="available off" data-title="r5c0">1</td><td class="available off" data-title="r5c1">2</td><td class="available off" data-title="r5c2">3</td><td class="available off" data-title="r5c3">4</td><td class="available off" data-title="r5c4">5</td><td class="available off" data-title="r5c5">6</td><td class="available off" data-title="r5c6">7</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
          <div style="top: 658.4px; left: 630px; right: auto; display: none;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="off disabled" data-title="r3c3">19</td><td class="off disabled" data-title="r3c4">20</td><td class="off disabled" data-title="r3c5">21</td><td class="off disabled" data-title="r3c6">22</td></tr><tr><td class="off disabled" data-title="r4c0">23</td><td class="off disabled" data-title="r4c1">24</td><td class="off disabled" data-title="r4c2">25</td><td class="off disabled" data-title="r4c3">26</td><td class="off disabled" data-title="r4c4">27</td><td class="off disabled" data-title="r4c5">28</td><td class="off disabled" data-title="r4c6">29</td></tr><tr><td class="off disabled" data-title="r5c0">30</td><td class="off disabled" data-title="r5c1">31</td><td class="off disabled" data-title="r5c2">1</td><td class="off disabled" data-title="r5c3">2</td><td class="off disabled" data-title="r5c4">3</td><td class="off disabled" data-title="r5c5">4</td><td class="off disabled" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="off disabled" data-title="r3c3">19</td><td class="off disabled" data-title="r3c4">20</td><td class="off disabled" data-title="r3c5">21</td><td class="off disabled" data-title="r3c6">22</td></tr><tr><td class="off disabled" data-title="r4c0">23</td><td class="off disabled" data-title="r4c1">24</td><td class="off disabled" data-title="r4c2">25</td><td class="off disabled" data-title="r4c3">26</td><td class="off disabled" data-title="r4c4">27</td><td class="off disabled" data-title="r4c5">28</td><td class="off disabled" data-title="r4c6">29</td></tr><tr><td class="off disabled" data-title="r5c0">30</td><td class="off disabled" data-title="r5c1">31</td><td class="off disabled" data-title="r5c2">1</td><td class="off disabled" data-title="r5c3">2</td><td class="off disabled" data-title="r5c4">3</td><td class="off disabled" data-title="r5c5">4</td><td class="off disabled" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
          <div style="top: 647.233px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>    
          <div style="top: 709.067px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11" selected="selected">11</option><option value="12">12</option></select> : <select class="minuteselect"><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM">AM</option><option value="PM" selected="selected">PM</option></select></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="selected">12</option></select> : <select class="minuteselect"><option value="0" selected="selected">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM" selected="selected">AM</option><option value="PM">PM</option></select></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
          <div style="top: 709.067px; left: 630px; right: auto;" class="daterangepicker dropdown-menu show-calendar opensright"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="off disabled" data-title="r1c5">7</td><td class="off disabled" data-title="r1c6">8</td></tr><tr><td class="off disabled" data-title="r2c0">9</td><td class="off disabled" data-title="r2c1">10</td><td class="off disabled" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11" selected="selected">11</option><option value="12">12</option></select> : <select class="minuteselect"><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM">AM</option><option value="PM" selected="selected">PM</option></select></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available active start-date end-date" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="selected">12</option></select> : <select class="minuteselect"><option value="0" selected="selected">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select> <select class="ampmselect"><option value="AM" selected="selected">AM</option><option value="PM">PM</option></select></div></div><div class="ranges"><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
          <div style="top: 911.4px; left: 630px; right: auto; display: none;" class="daterangepicker dropdown-menu opensright show-calendar"><div class="calendar first right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="off disabled" data-title="r0c0">25</td><td class="off disabled" data-title="r0c1">26</td><td class="off disabled" data-title="r0c2">27</td><td class="off disabled" data-title="r0c3">28</td><td class="off disabled" data-title="r0c4">29</td><td class="off disabled" data-title="r0c5">30</td><td class="off disabled" data-title="r0c6">1</td></tr><tr><td class="off disabled" data-title="r1c0">2</td><td class="off disabled" data-title="r1c1">3</td><td class="off disabled" data-title="r1c2">4</td><td class="off disabled" data-title="r1c3">5</td><td class="off disabled" data-title="r1c4">6</td><td class="available in-range" data-title="r1c5">7</td><td class="available in-range" data-title="r1c6">8</td></tr><tr><td class="available in-range" data-title="r2c0">9</td><td class="available in-range" data-title="r2c1">10</td><td class="available in-range" data-title="r2c2">11</td><td class="available in-range" data-title="r2c3">12</td><td class="available in-range" data-title="r2c4">13</td><td class="available in-range" data-title="r2c5">14</td><td class="available in-range" data-title="r2c6">15</td></tr><tr><td class="available in-range" data-title="r3c0">16</td><td class="available in-range" data-title="r3c1">17</td><td class="available in-range" data-title="r3c2">18</td><td class="available in-range" data-title="r3c3">19</td><td class="available in-range" data-title="r3c4">20</td><td class="available active end-date" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">25</td><td class="available off" data-title="r0c1">26</td><td class="available off" data-title="r0c2">27</td><td class="available off" data-title="r0c3">28</td><td class="available off" data-title="r0c4">29</td><td class="available off" data-title="r0c5">30</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available active start-date" data-title="r1c5">7</td><td class="available in-range" data-title="r1c6">8</td></tr><tr><td class="available in-range" data-title="r2c0">9</td><td class="available in-range" data-title="r2c1">10</td><td class="available in-range" data-title="r2c2">11</td><td class="available in-range" data-title="r2c3">12</td><td class="available in-range" data-title="r2c4">13</td><td class="available in-range" data-title="r2c5">14</td><td class="available in-range" data-title="r2c6">15</td></tr><tr><td class="available in-range" data-title="r3c0">16</td><td class="available in-range" data-title="r3c1">17</td><td class="available in-range" data-title="r3c2">18</td><td class="available in-range" data-title="r3c3">19</td><td class="available in-range" data-title="r3c4">20</td><td class="available in-range" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="available" data-title="r4c6">29</td></tr><tr><td class="available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="available off" data-title="r5c2">1</td><td class="available off" data-title="r5c3">2</td><td class="available off" data-title="r5c4">3</td><td class="available off" data-title="r5c5">4</td><td class="available off" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="ranges"><ul><li>Today</li><li>Yesterday</li><li>Last 7 Days</li><li>Last 30 Days</li><li>This Month</li><li>Last Month</li><li class="active">Custom Range</li></ul><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
        <!-- New Change -->
        <script src="assets/js/cancerhopeJS/functions.js"></script>
        <script src="assets/js/cancerhopeJS/patient_info.js"></script>
    
    
    </body>
</html>