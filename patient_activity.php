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
                                <li  class="active">
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
                    <div class="col-md-8">
                        <div id="search" class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-search"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" />
                            </div>
                            
                            <div id="list"></div>
                        </div>                                             
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
                        
                        <div class="col-md-2">
                            <div class="input-group-btn"> 
                                <button id="sMatch" class="btn btn-info" data-toggle="" data-target="#sMatch">Update Record</button>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group-btn"> 
                                <button id="ViewDemographics" class="btn btn-gold" data-toggle="" data-target="#ViewDemographics">Patient Demographics</button>  
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile-group tile-gray">    
                        <br/>
                        <div class="col-md-2">
                            <div class="tile-left">
                            <!--EMPTY DIV-->     
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="tile-left">
                                <div class="tile-block" id="selection">
                                    <div class="tile-header"> 
                                        <i class="entypo-list"></i> 
                                        <a href="#">View Status
                                            <span> Select an option</span>
                                        </a> 
                                    </div>
                                    <div class="tile-content"> 
                                        <div class="form-group">
                                            <div class="radio-inline">
                                                <input id="pa_open" value="option1" name="radioInline" type="radio">
                                                <label for="pa_open">Open</label>
                                            </div>
                                            <div class="radio-inline">
                                                <input id="pa_closed" value="option1" name="radioInline" type="radio">
                                                <label for="pa_closed">Closed</label>
                                            </div>
                                            
                                            <div class="radio-inline">
                                                <input id="s_prof" value="option1" name="radioInline" type="radio">
                                                <label for="s_prof">All</label>
                                            </div>
                                        </div>

                                        <div class="tile-footer"> 
                                            <p></p><p></p><p></p><p></p><p></p>
                                            <a href="#">Display option selected</a> 
                                        </div>

                                        
                                    </div>
                                </div>
                                   
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="tile-left">
                                
                                <!--<div class="tile-block" id="selection">-->
                                    <div class="tile-entry"> 
                                        <!--<i class="entypo-list"></i>
                                        <a href="#">Match / Link Info
                                        <span>Initial, Match and Link Info</span>
                                        </a> 
                                        -->
                                        <h4>Match / Link Info</h4>
                                        <br/>
                                    </div>
                                <!--</div>-->
                            <div class="tile-content">
                                <div class="tile-entry">
                                    <div class="col-sm-3">
                                        <h4 class="pull-left">Initiate</h4>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" placeholder="DD/MM/YYYY" type="text"> 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input class="form-control" placeholder="" type="text"> 
                                    </div>
                                    <br/>
                                    <div class="col-sm-3">
                                        <h4 class="pull-left">Match</h4>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" placeholder="DD/MM/YYYY" type="text"> 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input class="form-control" placeholder="" type="text"> 
                                    </div>
                                    <br/>
                                    <div class="col-sm-3">
                                        <h4 class="pull-left">Link</h4>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" placeholder="DD/MM/YYYY" type="text"> 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input class="form-control" placeholder="" type="text"> 
                                    </div>
                                    <br/><br/><br/>
                                    <p></p>
                                </div>
                            </div>
                            </div>
                        </div>
                        


                </div>
            </div>
        </div>
        <!--
                <div class="row">
                    <div class="col-md-2"></div>
                        <div class="col-md-3"> 
                            <div class="tile-block tile-gray" id="selection"> 
                                <div class="tile-header"> 
                                    <i class="entypo-list"></i> 
                                    <a href="#">View Status
                                        <span>Select an option</span>
                                    </a> 
                                </div> 
                                <div class="tile-content"> 
                                    <div class="form-group">
                                        <div class="radio-inline">
                                            <input id="pa_open" value="option1" name="radioInline" type="radio">
                                            <label for="pa_open">Open</label>
                                        </div>
                                        <div class="radio-inline">
                                            <input id="pa_closed" value="option1" name="radioInline" type="radio">
                                            <label for="pa_closed">Closed</label>
                                        </div>
                                        
                                        <div class="radio-inline">
                                            <input id="s_prof" value="option1" name="radioInline" type="radio">
                                            <label for="s_prof">All</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tile-block tile-gray tile-left" id="selection"> 
                                <div class="tile-entry">
                                    <div class="col-sm-12">
                                        <h3>Match / Link Info</h3>
                                    <br/>
                                    </div>
                                </div>

                                <div class="tile-entry">
                                    <div class="col-sm-3">
                                        <h4 class="pull-left">Initiate</h4>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <input class="form-control" placeholder="DD/MM/YYYY" type="text"> 
                                    </div>
                                    <div class="col-sm-3"> 
                                        <input class="form-control" placeholder="" type="text"> 
                                    </div>
                                </div>
                                
                                  
                            </div>
                            
                        </div>
                -->
                    <!-- can add more columns -->           
                <!--</div>-->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="text-info">Search Results - (To see a Support Person Demographics Information click on desired view button in a row)</h5>
                        <table id="sMatchTable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th width="30"></th>
                                <th width="200">Support Person Names</th>
                                <th width="120">Date of Visit(s)</th>
                                <th width="120">Confirmed</th>
                                <th>Contact</th>
                                <th width="70">Comments</th>
                                <th width="100">Demographics</th>

                            </tr>
                          </thead>
                          <tbody>
                                <th style="text-align: center; vertical-align: middle;">
                                    <div id="m_terminate" class="checkbox checkbox-replace color-blue"> 
                                            <label class="cb-wrapper">
                                                <input type="checkbox" id="mc_terminate">
                                                <div class="checked"></div>
                                            </label> 
                                            
                                    </div>
                                </th>
                                <th>Farhan Ashraf Chughtai</th>
                                <th>DD/MM/YYYY</th>
                                <th>DD/MM/YYYY</th>
                                <th>0.5</th>
                                <th>1</th>
                                
                                <th>
                                    <button id="viewsdemo" class="btn btn-info btn-sm" type="button">
                                        <i class="entypo-info"></i>
                                    </button>
                                </th>
                          </tbody>  
                        </table>
                    </div>
                    <div class="col-md-2"></div>
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

        
        
        <!--<script src="assets/js/cancerhopeJS/patient_info.js"></script>-->

        
    
    </body>
</html>