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
                    <div id="search" class="col-md-3" hidden>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-search"></i></span>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" />
                        </div>
                        <div id="list"></div>
                    </div>
                    <div class="col-md-3 clearfix" hidden>
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
        <script type="text/javascript">


            /* Initalize JavaScript Variables Outside The Ready or Main function so it can accessed any where in the script
                The Response of Ajax is returned in these variables in Success function written below
                Variables used for Demographics tab 
            */
            // Date Picker Initialization
                /*var $dpicker = $("#date");

                $dpicker.datepicker({
                    format: 'dd/mm/yyyy',
                    startView: 3,
                    //minViewMode: 1
                });*/
            var giCount = 0;
            var radioBtnValue;
            var CallerName;
            var CallerPhone;
            var RelationName;
            var RefferalName;
            var CallerTypeName;
            var PatientID;
            var FirstName;
            var LastName;
            var Address;
            var City;
            var State;
            var ZIP;
            var County;
            var HomePhone;
            var BusPhone;
            var DateofBirth;
            var Age;
            var GenderName;
            var Comments;
            var OtherPhone;
            var EmailAddr;
            var AgeAtIlliness;
            var DOB;
            var SupportPersonStatusName;
            var StartDate;
            var EndDate;
            var DateOfInitialTraining;
            var PreferredActivityLevel;
            // PatientTypeID = 4 for ProfessionalSupport Info 
            var PatientTypeID = 4;
            // Variables used for Diagnosis Tab
            var currentCancerFlag;
            var MetastasisFlag;
            var CancerFlag;
            var OtherFlag;
            var currentCancerSelected = null;
            var MetastasisSelected = null;
            var CancerSelected = null;
            var OtherSelected = null;

            // Variables to hold 1 or 2 values against Yes or No
            var currentCancerFlag1;
            var MetastasisFlag1;
            var CancerFlag1;
            var OtherFlag1;
            // Variables used for Treatment SideEffect
            var ChemoFlag;
            var SupportFlag;
            var RadiationFlag;
            var SurgeryFlag;
            var SpFlag;
            var CpFlag;   
            var ChemoSelected = 2;
            var SupportSelected = 2;
            var RadiationSelected = 2;
            var SurgerySelected = 2;
            var SpSelected = 2;
            var CpSelected = 2;  
            
            // Variables to hold 1 or 2 values against Yes or No
            var ChemoFlag1;
            var SupportFlag1;
            var RadiationFlag1;
            var SurgeryFlag1;
            var SpFlag1;
            var CpFlag1; 

            // Variables used for Current Cancer Control 
            var CancerDate;
            var CancerStage;
            var CancerName;
            var ViewFlag = 0;
            var EditFlag = 0;
            function $_GET(q,s) {
                s = (s) ? s : window.location.search;
                var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
                return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
            }

            $(document).ready(function(){ 
                $('#patient_information').show();
                var id = $_GET('id');
                     // Get data for Diagnosis Tab
                     $.ajax({
                        url:"findPatientSupportResponse.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            //alert("S");
                            //alert(data);
                            /* Parse JSON into JavaScript Object
                                get first index(key,value) pair as only one record is read on one PatientID 
                                and t[0] is because only one record */
                            // loading data from database against PatientInformation(Demographics)    
                            var jsn = $.parseJSON(data);                            
                            PatientID = jsn.t[0].PatientID;
                            FirstName = jsn.t[0].FirstName;
                            LastName = jsn.t[0].LastName;
                            Address = jsn.t[0].Address;
                            City = jsn.t[0].City;
                            State = jsn.t[0].State;
                            ZIP = jsn.t[0].ZIP;
                            County = jsn.t[0].County;
                            HomePhone = jsn.t[0].HomePhone;
                            BusPhone = jsn.t[0].BusPhone;
                            OtherPhone = jsn.t[0].OtherPhone;
                            EmailAddr = jsn.t[0].EmailAddr;
                            DateofBirth = jsn.t[0].DateofBirth;
                            Age = jsn.t[0].Age;
                            GenderName = jsn.t[0].GenderName;
                            AgeAtIlliness = jsn.t[0].AgeAtIlliness;
                            PreferredActivityLevel = jsn.t[0].PreferredActivityLevel;
                            DateOfInitialTraining = jsn.t[0].DateOfInitialTraining;
                            SupportPersonStatusName = jsn.t[0].SupportPersonStatusName;
                            StartDate = jsn.t[0].StartDate;
                            EndDate = jsn.t[0].EndDate;
                            Comments =  jsn.t[0].Comments;

                            
                            // assign values from database to demographics form
                            
                            $('#pid').attr("value",PatientID);
                            $('#fname').attr("value",FirstName);
                            $('#lname').attr("value",LastName);
                            $('#addr').attr("value",Address);
                            $('#city').attr("value",City);
                            $('#state').attr("value",State);
                            $('#zip').attr("value",ZIP);
                            $('#country').attr("value",County);
                            $('#hm_phone').attr("value",HomePhone);
                            $('#biz_phone').attr("value",BusPhone);
                            $('#dob').attr("value",DateofBirth);
                            $('#age').attr("value",Age);
                            $('#sex').val(GenderName).change();
                            $('#other_phone').attr("value",OtherPhone);
                            $('#email').attr("value",EmailAddr);
                            $('#dob').attr("value",DateofBirth);
                            $('#psp_age').attr("value",Age);
                            $('#sp_status').val(SupportPersonStatusName).change();
                            $('#psp_ill').attr("value",AgeAtIlliness);
                            $('#inact_date_start').attr("value",StartDate);
                            $('#inact_date_end').attr("value",EndDate);
                            $('#train_date').attr("value",DateOfInitialTraining);
                            $('#act_level').attr("value",PreferredActivityLevel);
                            // Load Comments
                            $('#general').val(Comments);
                            // New Change Load Primary Language 
                            loadPrimaryLang(id);

                            
                            $('#pid').prop("readonly",true);
                            $('#fname').prop("readonly",true);
                            $('#lname').prop("readonly",true);
                            $('#addr').prop("readonly",true);
                            $('#city').prop("readonly",true);
                            $('#state').prop("readonly",true);
                            $('#zip').prop("readonly",true);
                            $('#country').prop("readonly",true);
                            $('#hm_phone').prop("readonly",true);
                            $('#biz_phone').prop("readonly",true);
                            $('#dob').prop("readonly",true);
                            $('#age').prop("readonly",true);
                            $('#sex').prop("disabled",true);
                            $('#other_phone').prop("disabled",true);
                            $('#email').prop("disabled",true);
                            $('#dob').prop("disabled",true);
                            // New Change 
                            $('#prm_lang').prop("readonly",true);
                            $('#general').prop("readonly",true);
                            $('#psp_age').prop("readonly",true);
                            $('#sp_status').attr("disabled",true);
                            $('#psp_ill').prop("readonly",true);
                            $('#inact_date_start').prop("readonly",true);
                            $('#inact_date_end').prop("readonly",true);
                            $('#train_date').prop("readonly",true);
                            $('#act_level').prop("readonly",true);

                        }// End Success Function

                    });// End Ajax Hit
                    ViewFlag = 1;
                    // Show CurrentCancerTable
                    $('#addDataCurrentCancerTable').show();
                    // Call View Function to Load Current Cancer Data
                    viewDataCurrentCancer(id);
                    // Hide the control that enables 'Insert'
                    $('#cancer_type').hide();

                    // Show MetastasisTable
                    $('#addDataMetastasisTable').show();
                    // Call View Function to Load Metastasis Data
                    viewDataMetastasis(id);
                    // Hide the control that enables 'Insert'
                    $('#cancer_spread').hide();

                    $('#addDataCancerHistoryTable').show();
                    viewDataCancerHistory(id);
                    $('#cancer_history').hide();

                    $('#addDataOtherHistoryTable').show();
                    viewDataOtherHistory(id);
                    $('#other_prob').hide();

                    viewDiagnosis(id);
                    // Hide Update Button
                    $('#updateDiagnosis').hide();
                    $('#addDataChemotherapyTable').show();
                    viewDataChemotherapy(id);
                    $('#chemo_control').hide();

                    $('#addDataOtherSupportDrugsTable').show();
                    viewDataOtherSupportDrugs(id);
                    $('#otherSupport_control').hide();

                    $('#addDataRadiationTable').show();
                    viewDataRadiation(id);
                    $('#radiation_control').hide();

                    $('#addDataSurgeryTable').show();
                    viewDataSurgery(id);
                    $('#surgery_control').hide();

                    $('#addDataSpecialProceduresTable').show();
                    viewDataSpecialProcedures(id);
                    $('#specialProcedures_control').hide();

                    $('#addDataComplemantaryProcedureTable').show();
                    viewDataComplemantaryProcedures(id);
                    $('#complemantaryProcedure_control').hide();
                    // View for Psychosocial Issues 
                    viewPsychosocialIssues(id);  

                    //Hiding the contrls for treatment on View
                    $('#chemo_control').hide();
                    $('#otherSupport_control').hide();
                    $('#radiation_control').hide();
                    $('#surgery_control').hide();
                    $('#specialProcedures_control').hide();
                    $('complemantaryProcedures_type').hide();
                    $('#btnUpdateDemographics').hide();
                    // Check DelBtn Click
                    $('#delBtn').click(function(){
                        deletePatient(id);
                    });
                    
            }); // End Ready Function
            function LoadPid(){
                $.ajax({
                    url:"LoadPid.php",
                    method:"POST",
                    success:function(data){
                        //alert(data);
                        var jsn = $.parseJSON(data);
                        var PatientID = jsn.t[0].PatientID;
                        var PatientIDCurrent = parseInt(PatientID) + 1;
                        $('#pid').attr("value",PatientIDCurrent);
                        $('#pid').prop("disabled",true);
                    }// End Success Function

                });// End Ajax Hit(Demographics Default Load Data - Relation to Patient)
            }
            // Load Data from Zlu Table for Demographics (Relation and Referral Sources)
            function LoadDemographicsZluData(){

                $.ajax({
                    url:"LoadDemographicsDataReponse.php",
                    method:"POST",
                    success:function(data){
                        //alert(data);
                        var jsn = $.parseJSON(data);
                        // relationShipCount show that tblzlurelationships have 17 enteries so parse the loop till 17
                        var relationShipCount = 17;
                        for(i=0;i<relationShipCount;i++)
                        {
                            // get RelationName from jsn string that will be from database table(tblzlurelatonships)
                            var RelationName = jsn.t[i].RelationName;
                            // generate option dynamically and append the value of RelationName above in that option
                            $('#relation').append($('<option>', {text:RelationName}));
                            
                        }
                        // i = 18 (one a head above) on index 18 data of tbzlureferralsources (18- end of jsn string[jsn.t.length])
                        // loop till second last element as on last element there is PatientID (record last entered)
                        for(;i<jsn.t.length - 1;i++)
                        {
                            // get ReferralName from jsn string that will be from database table(tblzlureferralsources)
                            var ReferralName = jsn.t[i].ReferralName;
                            // generate option dynamically and append the value of ReferralName above in that option
                            $('#how').append($('<option>', {text:ReferralName}));
                            
                        }
                        // Get PatienID from jsn string as PatienID is on last index and i == jsn.t.length(last element)
                        // PatienID is 'ID' of last record inserted in tblinformation(Patient Information)
                        var PatientID = jsn.t[i].PatientID;
                        // Increment PatientID by '1' to display next ID to be inserted 
                        var PatientIDCurrent = parseInt(PatientID) + 1;
                        $('#pid').attr("value",PatientIDCurrent);
                    }// End Success Function

                });// End Ajax Hit(Demographics Default Load Data - Relation to Patient)
            }

            // New Change
            function disableDemographicsFields(){
                

                // Disable or ReadOnly Demographics Form Fields
                $('#pid').prop("readonly",true);
                $('#fname').prop("readonly",true);
                $('#lname').prop("readonly",true);
                $('#addr').prop("readonly",true);
                $('#city').prop("readonly",true);
                $('#state').prop("readonly",true);
                $('#zip').prop("readonly",true);
                $('#country').prop("readonly",true);
                $('#hm_phone').prop("readonly",true);
                $('#biz_phone').prop("readonly",true);
                $('#dob').prop("readonly",true);
                $('#age').prop("readonly",true);
                $('#sex').prop("disabled",true);
                $('#other_phone').prop("disabled",true);
                $('#email').prop("disabled",true);
                $('#dob').prop("disabled",true);
                // New Change 
                $('#prm_lang').prop("readonly",true);
                $('#general').prop("readonly",true);
                $('#psp_age').prop("readonly",true);
                $('#sp_status').attr("disabled",true);
                $('#psp_ill').prop("readonly",true);
                $('#inact_date_start').prop("readonly",true);
                $('#inact_date_end').prop("readonly",true);
                $('#train_date').prop("readonly",true);
                $('#act_level').prop("readonly",true);
                // Disable button
                $('#btnUpdateDemographics').hide();
            }
            
            function loadPrimaryLang(id){
                
                // Load Primary Language from Psychosocial Issues
                $.ajax({
                url:"findPrimaryLangResponse.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    var jsn = $.parseJSON(data);
                    var LanguageName = jsn.t[0].LanguageName;
                    $('#prm_lang').attr("value",LanguageName);
                }
                });
            }            
            // Functions for Current Cancer (Add,Edit,Delete)
            function saveDataCurrentCancer () {
              // get values from form  
              // get PatientID
              //event.preventDefault();
              pid = $('#pid').val();
              // Get Values From CurrentCancer Control 
              var date = $('#cancer_date').val();
              var stage = $('#cancer_stage option:selected').text();
              var cancer = $('#cancer_cancer option:selected').text();
              var cancerId = parseInt(cancer);

              // tell that Add in Database
              var p = 'add';
              $.ajax({
                url:"AddDiagnosisResponse1.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,stage:stage,cancerId:cancerId},
                success:function(data){
                  viewDataCurrentCancer(pid);
                  //alert(data);
                }
                });
                //$('#saveDataCurrentCancerBtn').prop("disabled",true);
            }
            function viewDataCurrentCancer(id){
                
              // get PatientID
              var pid = id;
              
              $.ajax({
                url:"AddDiagnosisResponse1.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                  //alert(data);
                  $('#addDataCurrentCancerTable tbody ').html(data);
                }
                });
            }
            // will be done later(Edit)
            /*function updateData(str){ // comes id 
              var id = str;
              // Get Values From CurrentCancer Control 
              var date = $('#cancer_date-'+str).val();
              var stage = $('#cancer_stage-'+str+'option:selected').text();
              var cancer = $('#cancer_cancer-'+str+'option:selected').text();
              var p = 'edit';
              $.ajax({
                url:"AddDiagnosisResponse.php",
                method:"POST",
                data:{p:p,date:date,stage:stage,cancer:cancer},
                success:function(data){
                  viewDataCurrentCancer();
                  
                }
                });
            }*/
            function deleteDataCurrentCancer(str,pid){
                
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddDiagnosisResponse1.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataCurrentCancer(pid);
                }
                });
            }
            // Functions for Metastasis (Add,Edit,Delete)
            function saveDataMetastasis() {
              // get values from form  
              // get PatientID
              pid = $('#pid').val();
              // Get Values From Metastasis Control 
              var date = $('#metastasis_date').val();
              var bodypart = $('#metastasis_bodypart option:selected').text();
              var bodypartId = parseInt(bodypart);
              // tell that Add in Database
              var p = 'add';
              $.ajax({
                url:"AddMetastasisDiagnosisResponse.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,bodypartId:bodypartId},
                success:function(data){
                  viewDataMetastasis(pid);
                  
                }
                });

            }
            
            function viewDataMetastasis(id){ 
              // get PatientID
              pid = id;
              // tell that Add in Database
              $.ajax({
                url:"AddMetastasisDiagnosisResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                  $('#addDataMetastasisTable tbody ').html(data);
                }
              });
            }
            function deleteDataMetastasis(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddMetastasisDiagnosisResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataMetastasis(pid);
                }
                });
            }
            // Functions for Cancer History (Add,Edit,Delete)
            function saveDataCancerHistory() {
              // get values from form  
              // get PatientID
              //event.preventDefault();
              pid = $('#pid').val();
              // Get Values From Cancer History Control 
              var date = $('#history_date').val();
              var cancer = $('#history_cancer option:selected').text();
              var cancerId = parseInt(cancer);
              // tell that Add in Database
              var p = 'add';
              $.ajax({
                url:"AddCancerHistoryDiagnosisResponse.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,cancerId:cancerId},
                success:function(data){
                  viewDataCancerHistory(pid);
                  
                }
                });
                //$('#saveDataCancerHistoryBtn').prop("disabled",true);
            }
            function viewDataCancerHistory(id){
              // get values from form  
              // get PatientID
              pid = id;
              
              $.ajax({
                url:"AddCancerHistoryDiagnosisResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataCancerHistoryTable tbody ').html(data); 
                    //alert(data);
                }
                });
            }
            function deleteDataCancerHistory(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddCancerHistoryDiagnosisResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataCancerHistory(pid);
                }
                });
            }
            // Functions for Cancer History (Add,Edit,Delete)
            function saveDataOtherHistory() {
              // get values from form  
              // get PatientID
              //event.preventDefault();
              pid = $('#pid').val();
              // Get Values From Cancer History Control 
              var otherHealth = $('#other_health option:selected').text();
              var OtherHealthId = parseInt(otherHealth);
              // tell that Add in Database
              var p = 'add';
              $.ajax({
                url:"AddOtherHistoryDiagnosisResponse.php",
                method:"POST",
                data:{p:p,pid:pid,otherHealthId:OtherHealthId},
                success:function(data){
                  viewDataOtherHistory(pid);
                  
                }
                });
                //$('#saveDataCancerHistoryBtn').prop("disabled",true);
            }
            function viewDataOtherHistory(id){
              // get values from form  
              // get PatientID
              pid = id;
              
              $.ajax({
                url:"AddOtherHistoryDiagnosisResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataOtherHistoryTable tbody ').html(data); 
                    
                }
                });
            }
            function deleteDataOtherHistory(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddOtherHistoryDiagnosisResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataOtherHistory(pid);
                }
                });
            }
            function disableDiagnosisFields()
            {
                $('#cancer_type').attr("disabled",true);
                $('#cancer_spread').attr("disabled",true);
                $('#cancer_history').attr("disabled",true);
                $('#other_prob').attr("disabled",true);
                $('#diag_comm').prop("readonly",true);
                $('#updateDiagnosis').hide();
                $('.btn-danger').hide();
                $('.btn-gold').hide();
            }
            function updateDiagnosis(){
               
                // get Patient ID
                var pid = $('#pid').val();
                // Get all flag values(Yes or No from select) fom diagnosis form 
                currentCancerFlag = $('#cancer_type').val();
                MetastasisFlag = $('#cancer_spread').val();
                CancerFlag = $('#cancer_history').val();
                OtherFlag = $('#other_prob').val();
                // If Yes then assign 1 other wise assign 2
                if(currentCancerFlag == 'Yes')
                {
                    currentCancerFlag1 = 1;
                    currentCancerSelected = 1;
                }
                else
                {
                    currentCancerFlag1 = 2;
                    currentCancerSelected = 2;
                }
                if(MetastasisFlag == 'Yes')
                {
                    MetastasisFlag1 = 1;
                    MetastasisSelected = 1;
                }
                else
                {
                    MetastasisFlag1 = 2;
                    MetastasisSelected = 2;
                }

                if(CancerFlag == 'Yes')
                {
                    CancerFlag1 = 1; 
                    CancerSelected = 1;
                }
                else
                {
                    CancerFlag1 = 2;
                    CancerSelected = 2;
                }
                if(OtherFlag == 'Yes')
                {
                    OtherFlag1 = 1;
                    OtherSelected = 1;
                }
                else
                {
                    OtherFlag1 = 2;
                    OtherSelected = 2;
                }
                // Setting flags corresponding to pop up options 
                /*var currentCancerSelected_val = $('#cancer_cancer').val();
                
                if(currentCancerSelected_val == 'Unknown')
                {
                    currentCancerSelected = 2;
                }
                else
                {
                    currentCancerSelected = 1;
                }
                var MetastasisSelected_val = $('#metastasis_bodypart').val();
                //alert(MetastasisSelected_val);
                if(MetastasisSelected_val == 'Unknown')
                {
                    //MetastasisSelected = 2;
                }
                else
                {
                    MetastasisSelected = 1;
                }
                var CancerSelected_val = $('#history_cancer').val();
                if(CancerSelected_val == 'Unknown')
                {
                    //CancerSelected = 2;
                }
                else
                {
                    CancerSelected = 1;
                }
                var OtherSelected_val = $('#other_health').val();
                if(OtherSelected_val == 'Unknown')
                {
                    OtherSelected = 2;
                }
                else
                {
                    OtherSelected = 1;
                }
                */
                var diagnosisComments = $('#diag_comm').val();
                //alert(diagnosisComments);
                var EditName = "";
                if(EditFlag == 1)
                    EditName = "Update";
                else
                    EditName = "Add";
                var answer = confirm(""+EditName+" data?");
                //alert(currentCancerSelected);
                if (answer)
                { 
                   $.ajax({
                    url:"UpdateDiagnosisResponse.php",
                    method:"POST",
                    data:{pid:pid,currentCancerFlag1:currentCancerFlag1,currentCancerSelected:currentCancerSelected,MetastasisFlag1:MetastasisFlag1,MetastasisSelected:MetastasisSelected,CancerFlag1:CancerFlag1,CancerSelected:CancerSelected,OtherFlag1:OtherFlag1,OtherSelected:OtherSelected,diagnosisComments:diagnosisComments},
                    success:function(data){
                      disableDiagnosisFields();
                      }
                    });
               }
               else
                {
                    alert('Data Not Saved');
                }
                    
                       
            }
            function viewDiagnosis(id){

                $.ajax({
                url:"ViewDiagnosisResponse.php",
                method:"POST",
                data:{pid:pid},
                success:function(data){
                  var jsn = $.parseJSON(data);
                  var Comments = jsn.t[0].Comments;
                  currentCancerFlag = jsn.t[0].currentCancerFlag1;
                  MetastasisFlag = jsn.t[0].MetastasisFlag1;
                  CancerFlag = jsn.t[0].CancerFlag1;
                  OtherFlag = jsn.t[0].OtherFlag1;

                  $('#cancer_type').attr("value",currentCancerFlag);
                  $('#cancer_spread').attr("value",MetastasisFlag);
                  $('#cancer_history').attr("value",CancerFlag);
                  $('#other_prob').attr("value",OtherFlag);
                  $('#diag_comm').val(Comments);
                }
                });
            }
            function disableTreatmentFields(){
                var answer = confirm('Save Changes?');
                if(answer)
                {
                    $('#chemo_control').attr("disabled",true);
                    $('#otherSupport_control').attr("disabled",true);
                    $('#radiation_control').attr("disabled",true);
                    $('#surgery_control').attr("disabled",true);
                    $('#specialProcedures_control').attr("disabled",true);
                    $('#complemantaryProcedure_control').attr("disabled",true);
                    $('#btnTreatment').hide();
                    $('.btn-danger').hide();
                    $('.btn-gold').hide();
                }
                else
                {
                    alert('Data Not Saved');
                }
            }
            function saveDataChemotherapy(){
                var pid = $('#pid').val();
                var date = $('#chemo_date').val();
                var typeName = $('#chemo_type option:selected').text();
                var typeId = parseInt(typeName);
                //alert(typeId);
                var sideEffect = $('#chemo_effect option:selected').text();
                var comments = $('#chemo_comment').val();
                var p = 'add';
                $.ajax({
                url:"AddChemotherapyResponse1.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,typeId:typeId,sideEffect:sideEffect,comments:comments},
                success:function(data){
                    viewDataChemotherapy(pid);
                    //alert(data);
                }
                });            
            }
            function viewDataChemotherapy(id){
              // get values from form  
              // get PatientID
                var pid = id;
              
              $.ajax({
                url:"AddChemotherapyResponse1.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataChemotherapyTable tbody ').html(data); 
                    //alert(data);
                }
                });
            }
            function deleteDataChemotherapy(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddChemotherapyResponse1.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataChemotherapy(pid);
                }
                });
            }

            // Add,Edit and Delete Other Support Drugs
            function saveDataOtherSupportDrugs(){
                var pid = $('#pid').val();
                var date = $('#other_date').val();
                var type = $('#other_type option:selected').text();
                var typeId = parseInt(type);
                //alert(typeId);
                var sideEffect = $('#other_effect option:selected').text();
                var comments = $('#other_comment').val();
                var p = 'add';

                $.ajax({
                url:"AddSupportDrugsResponse.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,typeId:typeId,sideEffect:sideEffect,comments:comments},
                success:function(data){
                    viewDataOtherSupportDrugs(pid);
                    //alert(data);
                }
                });   
            }
            function viewDataOtherSupportDrugs(id){
              // get values from form  
              // get PatientID
            var pid = id;
               
              $.ajax({
                url:"AddSupportDrugsResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataOtherSupportDrugsTable tbody ').html(data); 
                    
                }
                });
            }
            function deleteDataOtherSupportDrugs(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddSupportDrugsResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataOtherSupportDrugs(pid);
                }
                });
            }
            // Add,Edit and Delete Other Support Drugs
            function saveDataRadiation(){
                var pid = $('#pid').val();
                var date = $('#radiation_date').val();
                var type = $('#radiation_type option:selected').text();
                var typeId = parseInt(type);
                var sideEffect = $('#radiation_effect option:selected').text();
                var bodyPart = $('#radiation_bodyPart option:selected').text();
                var bodypartID = parseInt(bodyPart);
                var comments = $('#radiation_comment').val();
                var p = 'add';
                $.ajax({
                url:"AddRadiationResponse.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,typeId:typeId,sideEffect:sideEffect,bodypartID:bodypartID,comments:comments},
                success:function(data){
                    viewDataRadiation(pid);
                    //alert(data);
                }
                });   
            }
            function viewDataRadiation(id){
              // get values from form  
              // get PatientID
                var pid = id;
              
              $.ajax({
                url:"AddRadiationResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataRadiationTable tbody ').html(data); 
                    
                }
                });
            }
            function deleteDataRadiation(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddRadiationResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataRadiation(pid);
                }
                });
            }
            // Add,Edit Delete,View
            function saveDataSurgery(){
                var pid = $('#pid').val();
                var date = $('#surgery_date').val();
                var type = $('#surgery_type option:selected').text();
                var typeId = parseInt(type);
                var sideEffect = $('#surgery_effect option:selected').text();
                var comments = $('#surgery_comment').val();
                var p = 'add';
                $.ajax({
                url:"AddSurgeryResponse.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,typeId:typeId,sideEffect:sideEffect,comments:comments},
                success:function(data){
                    viewDataSurgery(pid);
                    //alert(data);
                }
                });   
            }
            function viewDataSurgery(id){
              // get values from form  
              // get PatientID
                var pid = id;
              
              $.ajax({
                url:"AddSurgeryResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataSurgeryTable tbody ').html(data); 
                    //alert(data);
                }
                });
            }
            function deleteDataSurgery(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddSurgeryResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataSurgery(pid);
                }
                });
            }

            // Add,Edit Delete,View
            function saveDataSpecialProcedures(){
                var pid = $('#pid').val();
                var date = $('#specialProcedures_date').val();
                var type = $('#specialProcedures_type option:selected').text();
                var typeId = parseInt(type);
                var sideEffect = $('#specialProcedures_effect option:selected').text();
                var comments = $('#specialProcedures_comment').val();
                var p = 'add';
                $.ajax({
                url:"AddSpecialResponse.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,typeId:typeId,sideEffect:sideEffect,comments:comments},
                success:function(data){
                    viewDataSpecialProcedures(pid);
                    //alert(data);
                }
                });   
            }
            function viewDataSpecialProcedures(id){
              // get values from form  
              // get PatientID
                var pid = id;
              $.ajax({
                url:"AddSpecialResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataSpecialProceduresTable tbody ').html(data); 
                     //alert(data);
                }
                });
            }
            function deleteDataSpecialProcedures(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddSpecialResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataSpecialProcedures(pid);
                }
                });
            }


            // Add,Edit Delete,View
            function saveDataComplemantaryProcedures(){
                var pid = $('#pid').val();
                var date = $('#complemantaryProcedures_date').val();
                var type = $('#complemantaryProcedures_type option:selected').text();
                var typeId = parseInt(type);
                var sideEffect = $('#complemantaryProcedures_effects option:selected').text();
                var comments = $('#complemantaryProcedures_comment').val();
                
                var p = 'add';
                $.ajax({
                url:"AddComplemantaryResponse.php",
                method:"POST",
                data:{p:p,pid:pid,date:date,typeId:typeId,sideEffect:sideEffect,comments:comments},
                success:function(data){
                    viewDataComplemantaryProcedures(pid);
                    //alert(data);
                }
                });   
            }
            function viewDataComplemantaryProcedures(id){
              // get values from form  
              // get PatientID
                var pid = id;
              
              $.ajax({
                url:"AddComplemantaryResponse.php",
                method:"POST",
                data:{pid:pid,ViewFlag:ViewFlag,EditFlag:EditFlag},
                success:function(data){
                    $('#addDataComplemantaryProcedureTable tbody ').html(data); 
                    
                }
                });
            }
            function deleteComplemantaryProcedures(str,pid){
                var id = str;
                var p = 'del';
                $.ajax({
                url:"AddComplemantaryResponse.php",
                method:"POST",
                data:{p:p,id:id},
                success:function(data){
                  viewDataComplemantaryProcedures(pid);
                }
                });
            }

            // Load Zlu Data for Psychosocial Issues Tab
            function LoadZluLanguages()
            {
                $('#phy_lang').append($('<option>', {text:'Unknown'}));   
                $.ajax({
                                    
                    url:"LanguagesResponse.php",
                    method:"POST",
                    success:function(data){

                        var jsn = $.parseJSON(data);          
                        for(i=0;i<jsn.t.length;i++)
                        {   
                            
                            var LanguageName = jsn.t[i].LanguageName;
                            $('#phy_lang').append($('<option>', {text:LanguageName}));
                        }
                        
                    }
                });
            }

            function LoadZluMaritalStatus()
            {
                $('#phy_mstatus').append($('<option>', {text:'Unknown'}));
                $.ajax({
                                
                    url:"MaritalStatusResponse.php",
                    method:"POST",
                    success:function(data){

                        var jsn = $.parseJSON(data);          
                        for(i=0;i<jsn.t.length;i++)
                        {   
                            
                            var MaritalName = jsn.t[i].MaritalName;
                            $('#phy_mstatus').append($('<option>', {text:MaritalName}));
                        }
                        
                    }
                });
            }

            function LoadZluChildrenTypes()
            {
                $('#phy_childname').append($('<option>', {text:'Unknown'}));
                $.ajax({
                                
                    url:"ChildrenResponse.php",
                    method:"POST",
                    success:function(data){

                        var jsn = $.parseJSON(data);          
                        for(i=0;i<jsn.t.length;i++)
                        {   
                            
                            var ChildrenName = jsn.t[i].ChildrenName;
                            $('#phy_childname').append($('<option>', {text:ChildrenName}));
                        }
                        
                    }
                });
            }

            function LoadZluRaceTypes()
            {
                $('#phy_race').append($('<option>', {text:'Unknown'}));
                $.ajax({
                                
                    url:"RaceResponse.php",
                    method:"POST",
                    success:function(data){

                        var jsn = $.parseJSON(data);          
                        for(i=0;i<jsn.t.length;i++)
                        {   
                            
                            var RaceName = jsn.t[i].RaceName;
                            $('#phy_race').append($('<option>', {text:RaceName}));
                        }
                        
                    }
                });
            }

            function LoadZluReligionTypes()
            {
                $('#phy_rel').append($('<option>', {text:'Unknown'}));
                $.ajax({
                                
                    url:"ReligionResponse.php",
                    method:"POST",
                    success:function(data){

                        var jsn = $.parseJSON(data);          
                        for(i=0;i<jsn.t.length;i++)
                        {   
                            
                            var ReligionName = jsn.t[i].ReligionName;
                            $('#phy_rel').append($('<option>', {text:ReligionName}));
                        }
                        
                    }
                }); 
            }
                        function disablePsychosocialFields(){
                $('#phy_lang').attr("disabled",true);
                $('#phy_mstatus').attr("disabled",true);
                $('#phy_nochild').prop("readonly",true);
                $('#phy_childname').attr("disabled",true);
                $('#phy_occup').prop("readonly",true);
                $('#phy_work').attr("disabled",true);
                $('#phy_race').attr("disabled",true);
                $('#phy_rel').attr("disabled",true);
                $('#phy_visit').attr("disabled",true);
                $('#phy_comments').prop("readonly",true);
                $('#psychosocialUpdateBtn').hide();
            }
            // Update all values in tblpsychosocialissues
            function psychosocialUpdate(){
                var pid = $('#pid').val();
                var primaryLanguage = $('#phy_lang option:selected').text();
                var maritalName = $('#phy_mstatus option:selected').text();
                var noOfChild = $('#phy_nochild').val();
                var childName = $('#phy_childname option:selected').text();
                var occupation = $('#phy_occup').val();
                var workFlag = $('#phy_work option:selected').text();
                var raceName = $('#phy_race option:selected').text();
                var religionName = $('#phy_rel option:selected').text();
                var VisitFlag = $('#phy_visit option:selected').text();
                var comments = $('#phy_comments').val();
                var EditName = "";
                if(EditFlag == 1)
                    EditName = "Update";
                else
                    EditName = "Add";
                var answer = confirm(""+EditName+" data?");
                if(answer)
                {
                    $.ajax({
                    url:"AddPsychosocialResponse.php",
                    method:"POST",
                    data:{pid:pid,primaryLanguage:primaryLanguage,maritalName:maritalName,noOfChild:noOfChild,childName:childName,occupation:occupation,workFlag:workFlag,raceName:raceName,religionName:religionName,VisitFlag:VisitFlag,comments:comments},
                    success:function(data){
                        disablePsychosocialFields();
                    }
                    });
                }
                else
                {
                    alert('Data Not Saved');
                }

                // setSearchOptions
                
            }
            function viewPsychosocialIssues(id)
            {  
                $('#phy_lang').attr("disabled",true);
                $('#phy_mstatus').attr("disabled",true);
                $('#phy_nochild').attr("disabled",true);
                $('#phy_childname').attr("disabled",true);
                $('#phy_occup').attr("disabled",true);
                $('#phy_work').attr("disabled",true);
                $('#phy_race').attr("disabled",true);
                $('#phy_rel').attr("disabled",true);
                $('#phy_visit').attr("disabled",true);
                $('#phy_comments').attr("disabled",true);

                // Hide Update
                $('#psychosocialUpdateBtn').hide();
                var pid = id;
                $.ajax({
                    url:"LoadPsychosocialResponse.php",
                    method:"POST",
                    data:{pid:pid},
                    success:function(data){
                        //alert(data);
                        var jsn = $.parseJSON(data); 
                        var LanguageName = jsn.t[0].LanguageName;
                        var MaritalName = jsn.t[0].MaritalName;
                        var NumberChildren = jsn.t[0].NumberChildren;
                        var ChildrenName = jsn.t[0].ChildrenName;
                        var WorkFlagStatus = jsn.t[0].WorkFlagStatus;
                        var RaceName = jsn.t[0].RaceName;
                        var ReligionName = jsn.t[0].ReligionName;
                        var FaceFlagStatus = jsn.t[0].FaceFlagStatus;
                        var Comments = jsn.t[0].Comments;
                        var Occupation = jsn.t[0].Occupation;

                        $('#phy_lang').append($('<option>', {text:LanguageName}));
                        $('#phy_mstatus').append($('<option>', {text:MaritalName}));
                        $('#phy_nochild').attr("value",NumberChildren);
                        $('#phy_childname').append($('<option>', {text:ChildrenName}));
                        $('#phy_work').val(WorkFlagStatus);
                        $('#phy_occup').attr("value",Occupation);
                        $('#phy_race').append($('<option>', {text:RaceName}));
                        $('#phy_rel').append($('<option>', {text:ReligionName}));
                        $('#phy_visit').val(FaceFlagStatus);
                        $('#phy_comments').val(Comments);
                        
                    }
                });
            }
            
        </script>
    </body>
</html>