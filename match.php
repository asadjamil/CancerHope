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
    /*require('connection.php');
    
    // get all cancers names from database against tblzlucancers    
    $query = "SELECT tblzluspecial.id AS SpecialID,tblzluspecial.Name AS SpecialName FROM tblzluspecial";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    
    $specialNameArray = array();
    $specialIdArray = array();
    for ($i=0; $i<$rows; $i++)
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
    for ($i=0; $i<$rows; $i++)
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
    for ($i=0; $i<$rows; $i++)
    {

        $row = mysqli_fetch_assoc($result);
        $chemotherapyIdArray[$i] = $row["id"];
        $chemotherapyNameArray[$i] = $row["ChemotherapyName"];        
    }  
    */
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

        <title>CHNMS| Match Information</title>

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
        <script type="text/javascript">
        jQuery(document).ready(function($)
            {
            var xyz = true;
           
            $('#btn').click(function(){


                if(xyz == true)
                {
                    alert ("HI");
                    $('#ck1').removeClass('checked');
                //    $('#test1').removeClass('checked');
                    alert ("BYE");
                }

                

                //var abc = $('#test1').is(':checked');
                //alert(abc);


            });
     
            }


        );
    
        </script>

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
                                <li class="active">
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
                    <div class="col-md-8">
                        <div id="search" class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-search"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" />
                            </div>
                            
                            <div id="list"></div>
                        </div>                                             
                        <!--
                        <div class="col-md-2 clearfix">
                            <div class="pull-left">  
                                  <button id="addBtn" class="btn btn-info btn-sm" type="button">
                                    <i class="entypo-plus-circled"></i>
                                  </button>
                                  <button id="editBtn" class="btn btn-info btn-sm" type="button">
                                    <i class="entypo-pencil"></i>
                                  </button>
                            </div> 
                        </div>
                        -->
                        <div id="sMatchDiv" class="col-md-2" >
                            <div class="input-group-btn" > 
                                <button id="sMatch" class="btn btn-info" data-toggle="" data-target="#sMatch" >Search Match</button>  
                            </div>
                        </div>
                        <div id="ViewDemographicsDiv" class="col-md-3" >
                            <div class="input-group-btn"> 
                                <button id="ViewDemographicsBtn" class="btn btn-gold"  >Patient Demographics</button>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 clearfix hidden-xs">
                        
                        <ul class="list-inline links-list pull-right">
                            <li class="sep"></li>
                            <li>
                                <a href="logout.php">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr /> 
                <!-- End of Logout Section -->
                <div class="row" id="match_name">
                    <div class="col-md-6">
                        <button id="addBtn" class="btn btn-info btn-sm" type="button">
                            <i class="entypo-plus-circled"></i>
                        </button>
                        <br>
                    
                        <table id="addMatchNameTable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th width="60">Date-time</th>
                                <th width="60">Login By</th>
                                <th width="195">Action</th> <!-- use width='160' if edit  -->
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>  
                        </table>
                                
                    </div>    
                </div>    
                <div class="row" id="match_search">
                    <!-- COL WIDTH 4 --> 
                    <div class="col-md-4"> 
                        <div class="tile-block tile-aqua" id="selection"> 
                            
                                <div class="tile-header"> 
                                    <i class="entypo-list"></i> 
                                    <a href="#">Search Criteria
                                        <span>Select one or more options for search criteria</span>
                                    </a> 
                                </div> 
                                   
                                <div class="tile-content"> 
                                    <div class="form-group">
                                        <h4 class="text-info">Support Type</h4>
                                        <div class="radio-inline">
                                            <input id="s_patient" value="option1" name="radioInline" type="radio">
                                            <label for="s_patient">Patient</label>
                                        </div>
                                        <div class="radio-inline">
                                            <input id="s_family" value="option1" name="radioInline" type="radio">
                                            <label for="s_family">Family</label>
                                        </div>
                                        
                                        <div class="radio-inline">
                                            <input id="s_prof" value="option1" name="radioInline" type="radio">
                                            <label for="s_prof">Professional</label>
                                        </div>
                                    </div>
                               
                                    <div class="form-group">
                                        <h4 class="text-info">Demographics</h4>
                                        <div id="d_relation" class="checkbox  checkbox-inline checkbox-replace color-white"> 
                                                <label class="cb-wrapper">
                                                    <input type="checkbox" id="dc_relation">
                                                    <div class="checked"></div>
                                                </label> 
                                                <label>Relation</label> 
                                    </div>
                                    <div id="d_sex" class="checkbox  checkbox-inline checkbox-replace color-white"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_sex">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Sex</label> 
                                    </div>
                                    <div id="d_age" class="checkbox  checkbox-inline checkbox-replace color-white"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_age">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Age</label> 
                                    </div>
                                </div> 

                                <div class="form-group">

                                    <h4 class="text-info">Diagnosis</h4>
                                 
                                    <div id="d_cancer" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_cancer">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Current Cancer</label> 
                                    </div>
                                    <div id="d_cstage" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_cstage">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Cancer Stage</label> 
                                    </div>
                                    <br/>
                                    <div id="d_metahistory" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_metahistory">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Metastasis History</label> 
                                    </div>
                                    <div id="d_metabp" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_metabp">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Meta. B.Prts</label> 
                                    </div>
                                    <br/>
                                    <div id="d_creccure" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_creccure">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Cancer Reccurance</label> 
                                    </div>
                                    <div id="d_chistory" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_chistory">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Cancer History</label> 
                                    </div>
                                    <br/>
                                    <div id="d_oprblms" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-10"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="dc_oprblms">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Other Health Problems</label> 
                                    </div>
                                    <br/>
                                </div> 

                                <div class="form-group">
                                    <h4 class="text-info">Treatment Side Effects</h4>
                                    <div id="t_chemo" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_chemo">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Chemotherapy</label> 
                                    </div>
                                    <div id="t_chemoSE" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_chemoSE">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Side Effects</label> 
                                    </div>
                                    <br/>
                                    <div id="t_odrugs" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_odrugs">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Other Drugs</label> 
                                    </div>
                                    <div id="t_odrugsSE" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_odrugsSE">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Side Effects</label> 
                                    </div>
                                    <br/>
                                    <div id="t_rad" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_rad">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Radiation</label> 
                                    </div>
                                    <div id="t_radSE" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_radSE">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Side Effects</label> 
                                    </div>
                                    <br/>
                                    <div id="t_surgery" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_surgery">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Surgery</label> 
                                    </div>
                                    <div id="t_surgerySE" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_surgerySE">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Side Effects</label> 
                                    </div>
                                    <br/>
                                    <div id="t_sproc" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_sproc">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Sp. Procedure</label> 
                                    </div>
                                    <div id="t_sprocSE" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_sprocSE">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Side Effects</label> 
                                    </div>
                                    <br/>
                                    <div id="t_compt" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_compt">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Cp. Treatment</label> 
                                    </div>
                                    <div id="t_comptSE" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-5"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="tc_comptSE">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Side Effects</label> 
                                    </div>
                                    <br/>
                                </div> 

                                <div class="form-group">
                                    <h4 class="text-info">Psychosocial Issues</h4>
                                    <div id="p_lang" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="pc_lang">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Language</label> 
                                    </div>
                                    <div id="p_marital" class="checkbox  checkbox-inline checkbox-replace color-white"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="pc_marital">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Marital Status</label> 
                                    </div>
                                    <br/>
                                    <div id="p_child" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="pc_child">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Children</label> 
                                    </div>
                                    <div id="p_wstatus" class="checkbox  checkbox-inline checkbox-replace color-white"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="pc_wstatus">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Work Status</label> 
                                    </div>
                                    <br/>
                                    <div id="p_race" class="checkbox  checkbox-inline checkbox-replace color-white col-sm-6"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="pc_race">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Race</label> 
                                    </div>
                                    <div id="p_religion" class="checkbox  checkbox-inline checkbox-replace color-white"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="pc_religion">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Religion</label> 
                                    </div>
                                    <br/>
                                    <div id="p_f2f" class="checkbox  checkbox-inline checkbox-replace color-white"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="pc_f2f">
                                                <div class="checked"></div>
                                            </label> 
                                            <label>Face to Face</label> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h5 class="text-info">Search Results - (To see a Support Person Demographics Information click on desired view button in a row)</h5>
                        <table id="sMatchTable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th width="30">Terminate</th>
                                <th width="30">Match</th>
                                <th width="30">Link</th>
                                <th>Support Person Names</th>
                                <th width="30">MQI</th>
                                <th width="30">#Matches</th>
                                <th width="30">#Links</th>
                                <th width="30">#Confirmations</th>
                                <th width="30">#Preference</th>
                                <th width="30">#Demographics</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                            <!--
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div id="m_terminate" class="checkbox checkbox-replace color-blue"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="mc_terminate">
                                                <div class="checked"></div>
                                            </label> 
                                            
                                    </div>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div id="m_match" class="checkbox checkbox-replace color-blue"> 
                                        <label class="cb-wrapper">
                                            <input type="checkbox" id="mc_match">
                                            <div class="checked"></div>
                                        </label> 
                                            
                                    </div>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div id="m_link" class="checkbox checkbox-replace color-blue"> 
                                        <label class="cb-wrapper">
                                            <input type="checkbox" id="mc_link">
                                            <div class="checked"></div>
                                        </label>
                                    </div>
                                </td>
                                <td>Farhan Ashraf</td>
                                <td>0.5</td>
                                <td>1</td>
                                <td>2</td>
                                <td>5</td>
                                <td>100</td>
                                <td>
                                    <button id="viewsdemo" class="btn btn-info btn-sm" type="button">
                                        <i class="entypo-info"></i>
                                    </button>
                                </td>
                            </tr> 
                            -->
                          </tbody>  
                        </table>
                        <br/>
                        <button class="btn btn-success" id="matchDone" onclick="matchDone();" >Done</button>
                    </div>
                    
                </div>

                </div>
            </div>


                

                <!-- Footer -->
                <footer class="main" id="footerSection">

                    &copy; 2016 <strong>Cancer Hope | Matching System</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>

                </footer>
            


            






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

        <!-- JS INCLUDED FOR DATE 
        <script src="http://demo.neontheme.com/assets/js/bootstrap-datepicker.js" id="script-resource-12"></script>
        <script src="http://demo.neontheme.com/assets/js/bootstrap-timepicker.min.js" id="script-resource-13"></script>
        -->
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

        
        <script src="assets/js/cancerhopeJS/match.js"></script>
        <!--<script src="assets/js/cancerhopeJS/patient_info.js"></script>-->

        
    
    </body>
</html>