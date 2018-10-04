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
                                    <div class="row" hidden>
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

        <!-- New Change -->
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
                $('.btn-gold').hide();
                
                     // Get data for Diagnosis Tab
                     $.ajax({
                        url:"findPatientResponse.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            //alert("S");
                            //alert(data);
                            /* Parse JSON into JavaScript Object
                                get first index(key,value) pair as only one record is read on one PatientID 
                                and t[0] is because only one record */
                            // loading data from database against PatientInformation(Demographics)    
                            //alert(data);
                            var jsn = $.parseJSON(data);                            
                            CallerName = jsn.t[0].CallerName;
                            CallerPhone = jsn.t[0].CallerPhone;
                            RelationName = jsn.t[0].RelationName;
                            RefferalName = jsn.t[0].RefferalName;
                            CallerTypeName = jsn.t[0].CallerTypeName;
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
                            DateofBirth = jsn.t[0].DateofBirth;
                            Age = jsn.t[0].Age;
                            GenderName = jsn.t[0].GenderName;
                            // new
                            Comments =  jsn.t[0].Comments;


                            // assign values from database to demographics form
                            $('#full_name').attr("value",CallerName);
                            $('#caller_phone').attr("value",CallerPhone);
                            // making a new option in above <select id="relation"> and adding text
                            $('#relation').append($('<option>', {text:RelationName}));
                            $('#how').append($('<option>', {text:RefferalName}));
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
                            // get the value of radio button
                            radioBtnValue = $('input[name=CallerInfoRadios]:checked').val();
                            //alert(radioBtnValue);
                            /* Compare radioBtnValue with CallerTypeName(table:tblzlucallertype) 
                            that is it will be either patient or family */

                            // Default value of radioBtnValue is Family
                            // if value of Radio button is equal to Family then
                            if(radioBtnValue == CallerTypeName)
                            {
                                // check mark or enable Family Radio button
                                $('.familyCaller').prop("checked",true);
                                
                            }
                            // if value of Radio button is equal to Patient then 
                            else
                            {
                                // check mark or enable Patient Radio button
                                $('.patientCaller').prop("checked",true);
                                
                            }
                            // Load Comments
                            $('#general').val(Comments);
                            // New Change Load Primary Language 
                            loadPrimaryLang(id);

                            // Disable or ReadOnly Demographics Form Fields
                            $('#familyCaller').prop("disabled",true);
                            $('#patientCaller').prop("disabled",true);   
                            $('#full_name').prop("readonly",true);
                            $('#caller_phone').prop("readonly",true);
                            $('#relation').attr("disabled",true);
                            $('#how').attr("disabled",true);
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
                            // New Change 
                            $('#prm_lang').prop("readonly",true);
                            $('#general').prop("readonly",true);

                        }// End Success Function

                    });// End Ajax Hit
                    ViewFlag = 1;
                    // Show CurrentCancerTable
                    // Hide Add or Gold buttons

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
                    viewTreatment(id);
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
                        // Load Unknown field in drop down
                        $('#relation').append($('<option>', {text:'Unknown'}));
                        for(i=0;i<relationShipCount;i++)
                        {
                            // get RelationName from jsn string that will be from database table(tblzlurelatonships)
                            var RelationName = jsn.t[i].RelationName;
                            // generate option dynamically and append the value of RelationName above in that option
                            $('#relation').append($('<option>', {text:RelationName}));
                            
                        }
                        // i = 18 (one a head above) on index 18 data of tbzlureferralsources (18- end of jsn string[jsn.t.length])
                        // loop till second last element as on last element there is PatientID (record last entered)
                        // Load Unknown field in drop down
                        
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
                $('#familyCaller').prop("disabled",true);
                $('#patientCaller').prop("disabled",true);  
                $('#full_name').prop("readonly",true);
                $('#caller_phone').prop("readonly",true);
                $('#relation').attr("disabled",true);
                $('#how').attr("disabled",true);
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
                // New Change 
                $('#prm_lang').prop("readonly",true);
                $('#general').prop("readonly",true);
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
                // Selected is 1 which means the option is selected from dropdown
                //currentCancerSelected = 1;
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
              // Selected is 1 which means the option is selected from dropdown
               // MetastasisSelected = 1;
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
                // Selected is 1 which means the option is selected from dropdown
                //CancerSelected = 1;
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
                // Selected is 1 which means the option is selected from dropdown
                //OtherSelected = 1;
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
            // new change
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
                if(MetastasisSelected_val == 'Unknown')
                {
                    MetastasisSelected = 2;
                }
                else
                {
                    MetastasisSelected = 1;
                }
                var CancerSelected_val = $('#history_cancer').val();
                if(CancerSelected_val == 'Unknown')
                {
                    CancerSelected = 2;
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
            // new change
            function viewDiagnosis(id){
                //disableDiagnosisFields();
                $.ajax({
                url:"ViewDiagnosisResponse.php",
                method:"POST",
                data:{pid:pid},
                success:function(data){
                  var jsn = $.parseJSON(data);
                  var Comments = jsn.t[0].Comments;
                  currentCancerFlag1 = jsn.t[0].currentCancerFlag1;
                  MetastasisFlag1 = jsn.t[0].MetastasisFlag1;
                  CancerFlag1 = jsn.t[0].CancerFlag1;
                  OtherFlag1 = jsn.t[0].OtherFlag1;

                  $('#cancer_type').val(currentCancerFlag1);
                  $('#cancer_spread').val(MetastasisFlag1);
                  $('#cancer_history').val(CancerFlag1);
                  $('#other_prob').val(OtherFlag1);
                  $('#diag_comm').val(Comments);
                  if(ViewFlag == 1)
                  {
                    $('#diag_comm').prop("readonly",true);
                  }
                  if(EditFlag == 1)
                  {
                    $('#diag_comm').prop("readonly",false);
                  }
                  if(currentCancerFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataCurrentCancerBtn').show();
                    $('#cancer_type').prop("disabled",true);
                    currentCancerSelected = 1;
                  }
                  if(MetastasisFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataMetastasisBtn').show();
                    $('#cancer_spread').prop("disabled",true);
                    MetastasisSelected = 1;
                  }
                  if(CancerFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataCancerHistoryBtn').show();
                    $('#cancer_history').prop("disabled",true);
                    CancerSelected = 1;
                  }
                  if(OtherFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataOtherHistoryBtn').show();
                    $('#other_prob').prop("disabled",true);
                    OtherSelected = 1;
                  }
                  
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
                    // Readonly Comments
                    $('#chemo_comment').prop('readonly',true);
                    $('#other_comment').prop('readonly',true);
                    $('#radiation_comment').prop('readonly',true);
                    $('#surgery_comment').prop('readonly',true);
                    $('#specialProcedures_comment').prop('readonly',true);
                    $('#complemantaryProcedures_comment').prop('readonly',true);

                    updateTreatment();
                }
                else
                {
                    alert('Data Not Saved');
                }
            }
            function updateTreatment(){
                // get Patient ID
                var pid = $('#pid').val();
                // Get values of selected flags
                /*ChemoFlag = $('#chemo_type').val();
                var ChemoSESelected_val = $('#chemo_effect').val();
                SupportFlag = $('#other_type').val();
                var SupportSESelected_val = $('#other_effect').val();
                RadiationFlag = $('#radiation_type').val();
                // Radiation body part is left
                var RadiationSESelected_val = $('#radiation_effect').val();
                SurgeryFlag = $('#surgery_type').val();
                var SurgerySESelected_val = $('#surgery_effect').val();
                SpFlag = $('#specialProcedures_type').val();
                var SpSESelected_val = $('#specialProcedures_effect').val();
                CpFlag = $('#complemantaryProcedures_type').val();
                var CpSESelected_val = $('#complemantaryProcedures_effects').val();
                */

                ChemoFlag = $('#chemo_control').val();
                SupportFlag = $('#otherSupport_control').val();
                RadiationFlag = $('#radiation_control').val();
                SurgeryFlag = $('#surgery_control').val();
                SpFlag = $('#specialProcedures_control').val();
                CpFlag = $('#complemantaryProcedure_control').val();

                if(ChemoFlag == 'Yes')
                {
                    ChemoFlag1 = 1;
                    ChemoSelected = 1;
                }
                else
                {
                    ChemoFlag1 = 2;
                    ChemoSelected = 2;
                }
                if(SupportFlag == 'Yes')
                {
                    SupportFlag1 = 1;
                    SupportSelected = 1;
                }
                else
                {
                    SupportFlag1 = 2;
                    SupportSelected = 2;   
                }
                if(RadiationFlag == 'Yes')
                {
                    RadiationFlag1 = 1;
                    RadiationSelected = 1;
                }
                else
                {
                    RadiationFlag1 = 2;
                    RadiationSelected = 2;
                }
                if(SurgeryFlag == 'Yes')
                {
                    SurgeryFlag1 = 1;
                    SurgerySelected = 1;
                }
                else
                {
                    SurgeryFlag1 = 2;
                    SurgerySelected = 2;   
                }
                if(SpFlag == 'Yes')
                {
                    SpFlag1 = 1;
                    SpSelected = 1;
                }
                else
                {
                    SpFlag1 = 2;
                    SpSelected = 2;
                }
                if(CpFlag == 'Yes')
                {
                    CpFlag1 = 1;
                    CpSelected = 1;
                }
                else
                {
                    CpFlag1 = 2;
                    CpSelected = 2;
                }

                // Get Comment values from treatment form

                ChemoComments = $('#chemo_comment').val(); 
                SupportComments = $('#other_comment').val(); 
                RadiationComments = $('#radiation_comment').val();
                SurgeryComments = $('#surgery_comment').val(); 
                SpComments = $('#specialProcedures_comment').val(); 
                CpComments = $('#complemantaryProcedures_comment').val(); 
                
                // Ajax Hit to Update tbltreatment and set treatment form flags
                $.ajax({
                    url:"UpdateTreatmentResponse.php",
                    method:"POST",
                    data:{pid:pid,ChemoFlag:ChemoFlag1,SupportFlag:SupportFlag1,RadiationFlag:RadiationFlag1,SurgeryFlag:SurgeryFlag1,SpFlag:SpFlag1,CpFlag:CpFlag1,ChemoSelected:ChemoSelected,SupportSelected:SupportSelected,RadiationSelected:RadiationSelected,SurgerySelected:SurgerySelected,SpSelected:SpSelected,CpSelected:CpSelected,ChemoComments:ChemoComments,SupportComments:SupportComments,RadiationComments:RadiationComments,SurgeryComments:SurgeryComments,CpComments:CpComments,SpComments:SpComments},
                    success:function(data){
                      
                      }
                    });
            }
            function viewTreatment(id){
                pid = id;
                //disableDiagnosisFields();
                $.ajax({
                url:"ViewTreatmentResponse.php",
                method:"POST",
                data:{pid:pid},
                success:function(data){
                  var jsn = $.parseJSON(data);
                  ChemoFlag1 = jsn.t[0].ChemoFlag1;
                  SupportFlag1 = jsn.t[0].SupportFlag1;
                  RadiationFlag1 = jsn.t[0].RadiationFlag1;
                  SurgeryFlag1 = jsn.t[0].SurgeryFlag1;
                  SpFlag1 = jsn.t[0].SpFlag1;
                  CpFlag1 = jsn.t[0].CpFlag1;
                  ChemotherapyComments = jsn.t[0].ChemotherapyComments;
                  SupportComments = jsn.t[0].SupportComments;
                  RadiationComments = jsn.t[0].RadiationComments;
                  SurgeryComments = jsn.t[0].SurgeryComments;
                  SpecialComments = jsn.t[0].SpecialComments;
                  ComplementaryComments = jsn.t[0].ComplementaryComments;
                  $('#chemo_control').val(ChemoFlag1);
                  $('#otherSupport_control').val(SupportFlag1);
                  $('#radiation_control').val(RadiationFlag1);
                  $('#surgery_control').val(SurgeryFlag1);
                  $('#specialProcedures_control').val(SpFlag1);
                  $('#complemantaryProcedure_control').val(CpFlag1);

                  $('#chemo_comment').val(ChemotherapyComments);
                  $('#other_comment').val(SupportComments);
                  $('#radiation_comment').val(RadiationComments);
                  $('#surgery_comment').val(SurgeryComments);
                  $('#specialProcedures_comment').val(SpecialComments);
                  $('#complemantaryProcedures_comment').val(ComplementaryComments);

                  
                  if(ChemoFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataChemotherapyBtn').show();
                    $('#chemo_control').prop("disabled",true);
                    ChemoSelected = 1;
                  }
                  if(SupportFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataOtherSupportDrugsBtn').show();
                    $('#otherSupport_control').prop("disabled",true);
                    SupportSelected = 1;
                  }
                  if(RadiationFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataRadiationBtn').show();
                    $('#radiation_control').prop("disabled",true);
                    RadiationSelected = 1;
                  }
                  if(SurgeryFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataSurgeryBtn').show();
                    $('#surgery_control').prop("disabled",true);
                    SurgerySelected = 1;
                  }
                  if(SpFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataSpecialProceduresBtn').show();
                    $('#specialProcedures_control').prop("disabled",true);
                    SpSelected = 1;
                  }
                  if(CpFlag1 == 'Yes' && EditFlag == 1)
                  {
                    
                    $('#addDataComplementaryBtn').show();
                    $('#complemantaryProcedure_control').prop("disabled",true);
                    SpSelected = 1;
                  }
                  
                }
                });
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
                //ChemoSelected = 1; 
                
                /*var ChemoType_val = $('#chemo_type').val();
                var ChemoS
                if(ChemoType_val == 'Unknown')
                {

                }*/
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
                //SupportSelected = 1;
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
                //RadiationSelected = 1;
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
                //SurgerySelected = 1;
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
                //SpSelected = 1;   
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
                //CpSelected = 1;
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
                SetSearchOptions();
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
                        //$('#phy_work').val(WorkFlagStatus);
                        $('phy_work').append($('<option>', {text:WorkFlagStatus}));
                        $('#phy_occup').attr("value",Occupation);
                        $('#phy_race').append($('<option>', {text:RaceName}));
                        $('#phy_rel').append($('<option>', {text:ReligionName}));
                        //$('#phy_visit').val(FaceFlagStatus);
                        $('phy_work').append($('<option>', {text:WorkFlagStatus}));
                        $('#phy_comments').val(Comments);
                        
                    }
                });
            }
            // Set the values of SetSearchOption Table 
            function SetSearchOptions(){
                // create an array for set search options
                //var setSearchOptionsArray = new Array();
                // Set Options in 'tblsetsearchoptions' from demographics form
                // it will be selected from drop down so always ON which means 1
                //setSearchOptionsArray['Relationship_ON'] = $('#relation').val(); 
                var pid = $('#pid').val();
                var Relationship_ON_val = $('#relation').val();
                var Relationship_ON = 1;
               
                if(Relationship_ON_val == 'Unknown')
                {
                    Relationship_ON = 0;
                }
                var Sex_ON_val = $('#sex').val();
                var Sex_ON = 1;
                
                if(Sex_ON_val == 'Unknown')
                {
                    Sex_ON = 0;
                }
                var Age_ON_val = $('#age').val();
                var Age_ON = 1;
                if(Age_ON_val == '')
                {
                    Age_ON = 0;
                }
                
                // Diagnosis Flags
                var CurrentCancer_ON = 1;
                if(currentCancerSelected == 2)
                {
                    CurrentCancer_ON = 0;
                }
                
                var CancerStage_ON_val = $('#cancer_stage').val();
                var CancerStage_ON = 1;
                if(CancerStage_ON_val == 'Unknown')
                {
                    CancerStage_ON = 0;
                }
                var MetastasisHistory_ON = 1;
                var MetastasisBodyPart_ON = 1;
                if(MetastasisFlag1 == 2)
                {
                    MetastasisHistory_ON = 0;
                }
                if(MetastasisSelected == 2)
                {
                    MetastasisBodyPart_ON = 0;
                }
                var CancerRecurrance_ON = 1;
                var CancerHistory_ON = 1;
                if(CancerFlag1 == 2)
                {
                    CancerRecurrance_ON = 0;
                }
                if(CancerSelected == 2)
                {
                    CancerHistory_ON = 0;
                }
                var OtherHealthProblems_ON = 1;
                if(OtherSelected == 2)
                {
                    OtherHealthProblems_ON = 0;
                }

                // Treatment Flags

                var Chemotherapy_ON = 1;
                var ChemotherapySE_ON = 1;
                if(ChemoFlag1 == 2)
                {
                    Chemotherapy_ON = 0;
                }
                if(ChemoSelected == 2)
                {
                    ChemotherapySE_ON = 0;
                }

                var OtherDrugs_ON = 1;
                var OtherDrugsSE_ON = 1;
                if(SupportFlag1 == 2)
                {
                    OtherDrugs_ON = 0;
                }
                if(SupportSelected == 2)
                {
                    OtherDrugsSE_ON = 0;
                }

                var Radiation_ON = 1;
                var RadiationSE_ON = 1;
                if(RadiationFlag1 == 2)
                {
                    Radiation_ON = 0;
                }
                if(RadiationSelected == 2)
                {
                    RadiationSE_ON = 0;
                }

                var Surgery_ON = 1;
                var SurgerySE_ON = 1;
                if(SurgeryFlag1 == 2)
                {
                    Surgery_ON = 0;
                }
                if(SurgerySelected == 2)
                {
                    SurgerySE_ON == 0;
                }
                var Special_ON = 1;
                var SpecialSE_ON = 1;
                if(SpFlag1 == 2)
                {
                    Special_ON = 0;
                }
                if(SpSelected == 2)
                {
                    SpecialSE_ON = 0;
                }

                var Complementary_ON = 1;
                var ComplementarySE_ON = 1;
                if(CpFlag1 == 2)
                {
                    Complementary_ON = 0;
                }
                if(CpSelected == 2)
                {
                    ComplementarySE_ON = 0
                }

                // Psychosocial Flags
                var Language_ON = 1;
                var Language_ON_val = $('#phy_lang').val();
                if(Language_ON_val == 'Unknown')
                {
                    Language_ON = 0;
                }
                var MaritalStatus_ON = 1;
                var MaritalStatus_ON_val = $('#phy_mstatus').val();
                if(MaritalStatus_ON_val == 'Unknown')
                {
                    MaritalStatus_ON = 0;
                }
                var Children_ON = 1;
                var Children_ON_val = $('#phy_childname').val();
                if(Children_ON_val == 'Unknown')
                {
                    Children_ON = 0;
                }
                var WorkStatus_ON = 1;
                var WorkStatus_ON_val = $('#phy_work').val();
                if(WorkStatus_ON_val == 'Unknown')
                {
                    WorkStatus_ON = 0;
                }
                var Race_ON = 1;
                var Race_ON_val = $('#phy_race').val();
                if(Race_ON_val == 'Unknown')
                {
                    Race_ON = 0;
                }
                var Religion_ON = 1;
                var Religion_ON_val = $('#phy_rel').val();
                alert(Religion_ON_val);
                if(Religion_ON_val == 'Unknown')
                {
                    Religion_ON = 0;
                }
                //alert(Religion_ON);
                var Face2Face_ON = 1;
                var Face2Face_ON_val = $('#phy_visit').val();
                if(Face2Face_ON_val == 'Unknown')
                {
                    Face2Face_ON = 0;
                }
                // it is by default 0 for now
                var SupportType_ON = 0;
               
                // Set Options in 'tblsetsearchoptions' from diagnosis form

                var pid = $('#pid').val();
                //setSearchOptionsArray['pid'];
                
                $.ajax({
                    url:"SetSearchOptionsResponse.php",
                    method:"POST",
                    data:{pid:pid, Relationship_ON:Relationship_ON, Sex_ON:Sex_ON, Age_ON:Age_ON, CurrentCancer_ON:CurrentCancer_ON, CancerStage_ON:CancerStage_ON, MetastasisHistory_ON:MetastasisHistory_ON, MetastasisBodyPart_ON:MetastasisBodyPart_ON, CancerRecurrance_ON:CancerRecurrance_ON, CancerHistory_ON:CancerHistory_ON, OtherHealthProblems_ON:OtherHealthProblems_ON, Chemotherapy_ON:Chemotherapy_ON, ChemotherapySE_ON:ChemotherapySE_ON, OtherDrugs_ON:OtherDrugs_ON, OtherDrugsSE_ON:OtherDrugsSE_ON, Radiation_ON:Radiation_ON, RadiationSE_ON:RadiationSE_ON, Surgery_ON:Surgery_ON, SurgerySE_ON:SurgerySE_ON, Special_ON:Special_ON, SpecialSE_ON:SpecialSE_ON, Complementary_ON:Complementary_ON, ComplementarySE_ON:ComplementarySE_ON, Language_ON:Language_ON, MaritalStatus_ON:MaritalStatus_ON, Children_ON:Children_ON, WorkStatus_ON:WorkStatus_ON, Race_ON:Race_ON, Religion_ON:Religion_ON, Face2Face_ON:Face2Face_ON, SupportType_ON:SupportType_ON},
                    success:function(data){
                        //alert(data);
                    }
                });
            }
            function deletePatient(id)
            {
                var pid = id;
                var answer = confirm("Delete Record?");
                if(answer)
                {
                    //alert(pid);
                    $.ajax({
                    url:"DeletePatientResponse.php",
                    method:"POST",
                    data:{pid:pid},
                    success:function(data){
                        //alert(data);
                    }
                    });
                }
                else
                {
                    alert('Data not Deleted');
                }
            }
        </script>
    </body>
</html>