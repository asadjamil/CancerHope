

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
            var RelationName;
            var IndactiveDates;
            var PatientStatusName; 
            // PatientTypeID = 3 for Family Support Info 
            var PatientTypeID = 3;
            // Variables used for Diagnosis Tab
            var currentCancerFlag;
            var MetastasisFlag;
            var CancerFlag;
            var OtherFlag;
            // Variables used for Treatment SideEffect
            var ChemoFlag;
            var SupportFlag;
            var RadiationFlag;
            var SurgeryFlag;
            var SpFlag;
            var CpFlag;   
            
            // Variables used for Current Cancer Control 
            var CancerDate;
            var CancerStage;
            var CancerName;
            var ViewFlag = 0;
            var EditFlag = 0;
            

            $(document).ready(function(){ 



                // Check Toggle 
                        /*$('#btnToggle').click(function(e){
                            
                            e.preventDefault();
                            $('#demographics').hide();
                            $('mytabs a[href="#diagnosis"]').addClass('active');
                            $('#diagnosis').show();


                        });*/
                // Date Picker Initialization
                /*var $dpicker = $("#date");

                $dpicker.datepicker({
                    format: 'dd/mm/yyyy',
                    startView: 3,
                    //minViewMode: 1
                });*/
                // Load Default Data for Demographics Form - Relation to Patient

                // Hide the main form and footer 
                $('#patient_information').hide();

                $('#footerSection').hide();
                $('#editBtn').hide();
                
                $('#addBtn').click(function(){
                    // Show the patient information form
                    $('#patient_information').show();
                    
                    // hide the search 
                    $('#search').hide();
                    // Show the footer section
                    $('#footerSection').show();
                    // Load Data for Demographics (RelationName and Referral Name)
                    //LoadDemographicsZluData();
                    LoadPid();
                    LoadRelation();
                    // Load Languages for Psychosocial Issues
                    LoadZluLanguages();
                    // Load Marital Status for Psychosocial Issues 
                    LoadZluMaritalStatus();
                    // Load Children Types for Psychosocial Issues
                    LoadZluChildrenTypes();
                    // Load Race Types for Psychosocial Issues
                    LoadZluRaceTypes();
                    // Load Religion Types for Psychosocial Issues
                    LoadZluReligionTypes();
                });
                
                // auto complete logic
                $('#name').keyup(function(){
                    var query = $(this).val();
                    if(query != '')
                    {
                        $.ajax({
                            // search.php makes hit database checking user in db and return the list of users in JSON form in 'data'
                            url:"searchPatient.php",
                            method:"POST",
                            data:{query:query,PatientTypeID:PatientTypeID},
                            success:function(data){
                                //alert('S');
                                // list of users from database is returned in 'data'  
                                $('#list').fadeIn();
                                // user list is populated from db to html
                                $('#list').html(data);
                            }
                        });
                    }
                });
                // View Logic For Demographics
                /* When username is selected from list
                    View Data for tabs 'Demographics','Diagnosis','Treatment/Side Effects','Psychosocial Issues'

                */    
                $(document).on('click','li.patient-names',function(){ 
                    // Show main form
                    $('#patient_information').show();
                    // Enable Edit Button
                    $('#editBtn').show();
                    // Disable Add Button
                    $('#addBtn').hide();
                    $('#name').val($(this).text());
                    // name of patient selected from list
                    name = $(this).text();
                    $('#list').fadeOut();
                    // id of patient selected from list
                    id = parseInt(name);

                    // hiding the update button 
                    //$('#btnUpdateDemographics').hide();
                    /* make ajax hit to findPatientResponse.php
                     that will return the record of patient against PatientID
                     from database (chnms) table (tblinformation) */

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
                            RelationName = jsn.t[0].RelationName;
                            PatientStatusName = jsn.t[0].PatientStatusName;
                            
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
                            $('#relation').append($('<option>', {text:RelationName}));
                            $('#pstatus').val(PatientStatusName).change();
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
                            $('#relation').attr("disabled",true);
                            $('#pstatus').attr("disabled",true);

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
                    $('#editBtn').click(function(){
                        //Edit Flag enables delete button 
                        // if EditFlag = 1 which means edit is active so show Delete button on data tables
                        EditFlag = 1;

                        // Load ReligionName
                        LoadRelation();

                        // Change the text of button to Update
                        $('#btnUpdateDemographics').text('Update');
                        // Change the color of button
                        $('#btnUpdateDemographics').removeClass("btn btn-success").addClass('btn btn-primary');
                        $('#btnUpdateDemographics').show();

                        // Change the text of button to Update
                        $('#updateDiagnosis').text('Update');
                        // Change the color of button
                        $('#updateDiagnosis').removeClass("btn btn-success").addClass('btn btn-primary');
                        
                        // Change the text of button to Update
                        $('#psychosocialUpdateBtn').text('Update');
                        // Change the color of button
                        $('#psychosocialUpdateBtn').removeClass("btn btn-success").addClass('btn btn-primary');

                        //UpdateDemographics();
                        // Enable  Demographics Form Fields
                        //$('#pid').prop("readonly",false);
                        $('#fname').prop("readonly",true);
                        $('#lname').prop("readonly",true);
                        $('#addr').prop("readonly",false);
                        $('#city').prop("readonly",false);
                        $('#state').prop("readonly",false);
                        $('#zip').prop("readonly",false);
                        $('#country').prop("readonly",false);
                        $('#hm_phone').prop("readonly",false);
                        $('#biz_phone').prop("readonly",false);
                        $('#other_phone').attr("disabled",false);
                        $('#email').attr("disabled",false);
                        $('#dob').prop("readonly",true);
                        $('#age').prop("readonly",true);
                        $('#sex').prop("readonly",false);
                        $('#psp_ill').prop("readonly",true);
                        $('#sp_status').attr("disabled",false);
                        $('#inact_date_start').prop("readonly",false);
                        $('#inact_date_end').prop("readonly",false);
                        $('#train_date').prop("readonly",false);
                        $('#act_level').prop("readonly",false);
                        $('#general').prop("readonly",false);
                        $('#relation').attr("disabled",false);
                        $('#pstatus').attr("disabled",false);
                        // Get Values from Patient Information Page  Demographics Tab and Patient Contact Information Section
                        // get value of FirstName
                        FirstName = $('#fname').val();

                        // get value of LastName 
                        LastName = $('#lname').val();

                        // get value of Address
                        Address = $('#addr').val();

                        // get value of City
                        City = $('#city').val();

                        // get value of State 
                        State = $('#state').val();

                        // get value of Zip 
                        ZIP = $('#zip').val();

                        // get value of Country 
                        Country = $('#country').val();

                        // get value of Home Phone
                        HomePhone = $('#hm_phone').val();

                        // get value of Buisness Phone
                        BusPhone = $('#biz_phone').val();

                        // Get Values from Patient Information Page  Demographics Tab and Patient Vitals Section 
                        // get value of gender 
                        GenderName = $('#sex option:selected').text();

                        // Get Values from Patient Information Page  Demographics Tab and General Comments Section 
                        // get value of general comments
                        Comments = $('#general').val();
                        
                        //get value for PatientID from form
                        PatientID = $('#pid').val();
                        
                        // get other phone 
                        OtherPhone = $('#other_phone').val();

                        EmailAddr = $('#email').val();

                        DOB = $('#dob').val();

                        Age = $('#psp_age').val();

                        AgeAtIlliness = $('#psp_ill').val();

                        SupportPersonStatusName = $('#sp_status option:selected').text();

                        StartDate = $('#inact_date_start').val();

                        EndDate = $('#inact_date_end').val();

                        DateOfInitialTraining = $('#train_date').val();

                        PreferredActivityLevel = $('#act_level').val();
                        
                        RelationName = $('#relation option:selected').text();

                        PatientStatusName = $('#pstatus option:selected').text();

                        var AddDemographicsFlag = 0;
                        /*$('.required').each(function() {
                            if($(this).val() == '') {
                               $(this).css('border' , '0.5px solid red');
                            }
                            if($(this).val() != '' || $(this).val() > 0)
                            {
                                AddDemographicsFlag++;
                            }
                        });*/
                        //alert(AddDemographicsFlag);

                        // Click event for Adding Demographics Data 
                        //$('#addBtn').click(function(){ 
                        var AddDemographicsReq = 0;
                        //alert(AddDemographicsReq);
                        /*if(CallerName != '' && CallerPhone != '' && RelationName != '' && ReferralName != '' && FirstName != '' && LastName != '' && Address != '' && City != '' && State != '' && ZIP != '' && Country != '' && HomePhone != '' && BusPhone != '' && GenderName != '' && Comments != '' )
                        {

                            AddDemographicsReq = 1;
                        }  */
                        //alert(AddDemographicsReq);  
                        $('#btnUpdateDemographics').click(function(){
                        //if(AddDemographicsReq == 1)
                        //{

                            if(EditFlag)
                            {
                               
                                var answer = confirm("Save data?")
                                if (answer){
                                       $.ajax({
                                        url:"AddFamilySupportDemo.php",
                                        method:"POST",
                                        //data:{radioBtnValue:radioBtnValue,CallerName:CallerName,CallerPhone:CallerPhone,RelationName:RelationName,ReferralName:ReferralName,Address:Address,City:City,State:State,ZIP:ZIP,Country:Country,HomePhone:HomePhone,biz_phone:biz_phone,GenderName:GenderName,Comments:Comments},
                                        data:{FirstName:FirstName,LastName:LastName,Address:Address,City:City,State:State,ZIP:ZIP,Country:Country,HomePhone:HomePhone,BusPhone:BusPhone,GenderName:GenderName,Comments:Comments,PatientID:PatientID,OtherPhone:OtherPhone,EmailAddr:EmailAddr,DOB:DOB,Age:Age,AgeAtIlliness:AgeAtIlliness,SupportPersonStatusName:SupportPersonStatusName,StartDate:StartDate,EndDate:EndDate,DateOfInitialTraining:DateOfInitialTraining,PreferredActivityLevel:PreferredActivityLevel,PatientTypeID:PatientTypeID,RelationName:RelationName,PatientStatusName:PatientStatusName},
                                        success:function(data){
                                            //alert('S');
                                            //alert(data);
                                             
                                            disableDemographicsFields();
                                            
                                        }// End Success Function

                                    });// End Ajax Hit(Demographics Add Data)
                                    
                                    
                                }
                                else{
                                        alert('Data Not Saved');
                                }
                            }
                            
                            
                        //}
                            
                        });
                        
                        // Edit Diagnosis
                        // Enable all control for data entry
                        $('#cancer_type').show();
                        viewDataCurrentCancer(id);
                        $('#cancer_spread').show();
                        viewDataMetastasis(id);
                        $('#cancer_history').show();
                        viewDataCancerHistory(id);
                        $('#other_prob').show();
                        viewDataOtherHistory(id)
                        $('#updateDiagnosis').show();
                        // Edit for Psychosocial Issues 
                        // Enable All Fields for Psychosocial Issue
                        $('#phy_lang').attr("disabled",false);
                        // Load Languages for Psychosocial Issues
                        LoadZluLanguages();
                        $('#phy_mstatus').attr("disabled",false);
                        LoadZluMaritalStatus();
                        
                        $('#psychosocialUpdateBtn').show();
                        $('#phy_nochild').attr("disabled",false);
                        $('#phy_childname').attr("disabled",false);
                        LoadZluChildrenTypes();
                        $('#phy_occup').attr("disabled",false);
                        $('#phy_work').attr("disabled",false);
                        $('#phy_race').attr("disabled",false);
                        LoadZluRaceTypes();
                        $('#phy_rel').attr("disabled",false);
                        LoadZluReligionTypes();
                        $('#phy_visit').attr("disabled",false);
                        $('#phy_comments').attr("disabled",false);

                        // Show control For Treatment
                        $('#chemo_control').show();
                        viewDataChemotherapy(id); 

                        $('#addDataOtherSupportDrugsTable').show();
                        viewDataOtherSupportDrugs(id);
                        $('#otherSupport_control').show();

                        $('#addDataRadiationTable').show();
                        viewDataRadiation(id);
                        $('#radiation_control').show();

                        $('#addDataSurgeryTable').show();
                        viewDataSurgery(id);
                        $('#surgery_control').show();

                        $('#addDataSpecialProceduresTable').show();
                        viewDataSpecialProcedures(id);
                        $('#specialProcedures_control').show();

                        $('#addDataComplemantaryProcedureTable').show();
                        viewDataComplemantaryProcedures(id);
                        $('#complemantaryProcedure_control').show();  
                    });// editBtn End
                    
                    
                }); // on click li or selecting patient click End
                
                // Adding Data in Patient Information - Demographics  
                

                $('#btnUpdateDemographics').click(function(e){
                    // Get Values from Patient Information Page  Demographics Tab and Caller Information Section  
                    
                    //$('panel-options#tabs li:second').addClass('active');
                    
                    //$('#mytabs a[href="#diagnosis"]').tab('show');
                    //$('#mytabs').tabs({active:1});
                    // get value of FirstName
                    FirstName = $('#fname').val();

                    // get value of LastName 
                    LastName = $('#lname').val();

                    // get value of Address
                    Address = $('#addr').val();

                    // get value of City
                    City = $('#city').val();

                    // get value of State 
                    State = $('#state').val();

                    // get value of Zip 
                    ZIP = $('#zip').val();

                    // get value of Country 
                    Country = $('#country').val();

                    // get value of Home Phone
                    HomePhone = $('#hm_phone').val();

                    // get value of Buisness Phone
                    BusPhone = $('#biz_phone').val();

                    // Get Values from Patient Information Page  Demographics Tab and Patient Vitals Section 
                    // get value of gender 
                    GenderName = $('#sex option:selected').text();

                    // Get Values from Patient Information Page  Demographics Tab and General Comments Section 
                    // get value of general comments
                    Comments = $('#general').val();
                    
                    //get value for PatientID from form
                    PatientID = $('#pid').val();
                    
                    // get other phone 
                    OtherPhone = $('#other_phone').val();

                    EmailAddr = $('#email').val();

                    DOB = $('#dob').val();

                    Age = $('#psp_age').val();

                    AgeAtIlliness = $('#psp_ill').val();

                    SupportPersonStatusName = $('#sp_status option:selected').text();

                    StartDate = $('#inact_date_start').val();

                    EndDate = $('#inact_date_end').val();

                    DateOfInitialTraining = $('#train_date').val();

                    PreferredActivityLevel = $('#act_level').val();

                    RelationName = $('#relation option:selected').text();

                    PatientStatusName = $('#pstatus option:selected').text();

                    //alert(PatientID);
                    var AddDemographicsFlag = 0;
                    /*$('.required').each(function() {
                        if($(this).val() == '') {
                           $(this).css('border' , '0.5px solid red');
                        }
                        if($(this).val() != '' || $(this).val() > 0)
                        {
                            AddDemographicsFlag++;
                        }
                    });*/
                    //alert(AddDemographicsFlag);

                    // Click event for Adding Demographics Data 
                    //$('#addBtn').click(function(){ 
                    var AddDemographicsReq = 0;
                    /*if(CallerName != '' && CallerPhone != '' && RelationName != '' && ReferralName != '' && FirstName != '' && LastName != '' && Address != '' && City != '' && State != '' && ZIP != '' && Country != '' && HomePhone != '' && BusPhone != '' && GenderName != '' && Comments != '' )
                    {
                        AddDemographicsReq = 1;
                    } */ 
                    //alert(AddDemographicsReq);  
                    //if(AddDemographicsReq == 1)
                    //{
                    
                    if(EditFlag == 0)
                    {
                           
                        var answer = confirm("Save data?")
                        if (answer){    
                            $.ajax({
                                url:"AddFamilySupportDemo.php",
                                method:"POST",
                                //data:{radioBtnValue:radioBtnValue,CallerName:CallerName,CallerPhone:CallerPhone,RelationName:RelationName,ReferralName:ReferralName,Address:Address,City:City,State:State,ZIP:ZIP,Country:Country,HomePhone:HomePhone,biz_phone:biz_phone,GenderName:GenderName,Comments:Comments},
                                data:{FirstName:FirstName,LastName:LastName,Address:Address,City:City,State:State,ZIP:ZIP,Country:Country,HomePhone:HomePhone,BusPhone:BusPhone,GenderName:GenderName,Comments:Comments,PatientID:PatientID,OtherPhone:OtherPhone,EmailAddr:EmailAddr,DOB:DOB,Age:Age,AgeAtIlliness:AgeAtIlliness,SupportPersonStatusName:SupportPersonStatusName,StartDate:StartDate,EndDate:EndDate,DateOfInitialTraining:DateOfInitialTraining,PreferredActivityLevel:PreferredActivityLevel,PatientTypeID:PatientTypeID,RelationName:RelationName,PatientStatusName:PatientStatusName},
                                //data:{FirstName:FirstName,LastName:LastName,Address:Address,City:City,State:State,ZIP:ZIP,Country:Country,HomePhone:HomePhone,BusPhone:BusPhone,GenderName:GenderName,Comments:Comments,PatientID:PatientID,OtherPhone:OtherPhone,EmailAddr:EmailAddr,DOB:DOB},
                                success:function(data){
                                    //alert('S');
                                    //alert(alert-success);
                                    //alert(data);
                                    disableDemographicsFields();
                                }// End Success Function

                            });// End Ajax Hit(Demographics Add Data)
                        }
                        else{
                            alert('Data Not Saved');
                        }
                    }

                    //}               
                    // Switch to Demographics tab
                    
                    //}); addBtn Click End
                    
                }); // End Update Click 
                

                // Insert data for Diagnosis Tab(Current Cancer Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Stage Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataCurrentCancerBtn').hide();
                $('#addDataCurrentCancerTable').hide();
                $('#cancer_type').on('change', function() {
                    currentCancerFlag = $(this).find(":selected").val();

                            
                    // If Value is Yes It means load Data from data base and enable above currentCancerControl
                    if(currentCancerFlag == 'Yes')
                    {   
                        $('#addDataCurrentCancerBtn').show();
                        $('#addDataCurrentCancerTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Current Cancer drop downs)
                        $.ajax({
                            url:"DiagnosisCurrentCancerStageResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var CancerStage = jsn.t[i].CancerStage;
                                    $('#cancer_stage').append($('<option>', {text:CancerStage}));
                                }
                                
                            }
                        });
                        // Issues in parsing so done it inline at top of index.php 
                        /*$.ajax({
                            url:"DiagnosisCurrentCancerNameResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                
                                for(i=0;i<jsn.t.length;i++)
                                {
                                    
                                    var CancerName = jsn.t[i].CancerName;
                                    //alert(CancerName);
                                    $('#cancer_cancer').append($('<option>', {text:CancerName}));
                                }
                            }
                        });
                        */                        

                    } // End of if 'Yes' for select 

                });// End on change for Current Cancer

                // Insert data for Diagnosis Tab(Metastasis Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Body Part 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataMetastasisBtn').hide();
                $('#addDataMetastasisTable').hide();
                $('#cancer_spread').on('change', function() {
                    MetastasisFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Metastasis
                    if(MetastasisFlag == 'Yes')
                    {   
                        $('#addDataMetastasisBtn').show();
                        $('#addDataMetastasisTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                        $.ajax({
                            url:"DiagnosisMetastasisResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var BodyPartID = jsn.t[i].BodyPartID;
                                    var BodyPart = jsn.t[i].BodyPart;
                                    var BodyPartOption = BodyPartID + " " + BodyPart;
                                    $('#metastasis_bodypart').append($('<option>', {text:BodyPartOption}));
                                }
                                
                            }
                        });
                                                

                    } // End of if 'Yes' for select 

                });// End on change for Metastasis

                // Insert data for Diagnosis Tab(Cancer History  Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataCancerHistoryBtn').hide();
                $('#addDataCancerHistoryTable').hide();
                $('#cancer_history').on('change', function() {
                    CancerFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(CancerFlag == 'Yes')
                    {   
                        $('#addDataCancerHistoryBtn').show();
                        $('#addDataCancerHistoryTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                        /*$.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"DiagnosisCurrentCancerNameResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var CancerName = jsn.t[i].CancerName;
                                    $('#history_cancer').append($('<option>', {text:CancerName}));
                                }
                                
                            }
                        });*/
                                                

                    } // End of if 'Yes' for select 

                });// End on change Cancer History 

                // Insert data for Diagnosis Tab(Other History Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataOtherHistoryBtn').hide();
                $('#addDataOtherHistoryTable').hide();
                $('#other_prob').on('change', function() {
                    OtherFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(OtherFlag == 'Yes')
                    {   
                        $('#addDataOtherHistoryBtn').show();
                        $('#addDataOtherHistoryTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                        $.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"DiagnosisOtherHistoryResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var OtherHealthID = jsn.t[i].OtherHealthID;
                                    var OtherHealth = jsn.t[i].OtherHealth;
                                    var OtherHealthOption = OtherHealthID + " " + OtherHealth;
                                    $('#other_health').append($('<option>', {text:OtherHealthOption}));
                                }
                                
                            }
                        });
                                        

                    } // End of if 'Yes' for select 

                });// End on change Other History
                
                // Insert data for Treatment/Side Effects Tab(Chemotherapy Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataChemotherapyBtn').hide();
                $('#addDataChemotherapyTable').hide();
                $('#chemo_control').on('change', function() {
                    ChemoFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(ChemoFlag == 'Yes')
                    {   
                        $('#addDataChemotherapyBtn').show();
                        $('#addDataChemotherapyTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                        /*$.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"TreatmentChemotherapyTypeResponse.php",
                            method:"POST",
                            success:function(data){

                                var jsn = $.parseJSON(data);
                                alert(jsn);
                                //for(i=0;i<jsn.t.length;i++)
                                //{   
                                    alert('hi');
                                    var ChemotherapyName = jsn.t[0].ChemotherapyName;
                                    
                                    $('#chemo_type').append($('<option>', {text:'abc'}));
                                //}
                                
                            }
                        });*/
                        $.ajax({
                            // make hit to get side effect names from tblzlusideeffects
                            url:"TreatmentSideEffectsResponse.php",
                            method:"POST",
                            success:function(data){

                                var jsn = $.parseJSON(data);
                                
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    
                                    var SideEffectName = jsn.t[i].SideEffectName;
                                    
                                    $('#chemo_effect').append($('<option>', {text:SideEffectName}));
                                }
                                
                            }
                        });         

                    } // End of if 'Yes' for select 

                });// End on change Chemotherapy
            
            // Insert data for Treatment/Side Effects Tab(Chemotherapy Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataOtherSupportDrugsBtn').hide();
                $('#addDataOtherSupportDrugsTable').hide();
                $('#otherSupport_control').on('change', function() {
                    SupportFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(SupportFlag == 'Yes')
                    {   
                        $('#addDataOtherSupportDrugsBtn').show();
                        $('#addDataOtherSupportDrugsTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                        $.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"TreatmentSupportDrugsResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var OtherDrugID = jsn.t[i].OtherDrugID;
                                    var OtherDrug = jsn.t[i].OtherDrug;
                                    var OtherDrugOption = OtherDrugID + " " + OtherDrug;
                                    $('#other_type').append($('<option>', {text:OtherDrugOption}));
                                }
                                
                            }
                        });
                         
                        $.ajax({
                            // make hit to get side effect names from tblzlusideeffects
                            url:"TreatmentSideEffectsResponse.php",
                            method:"POST",
                            success:function(data){

                                var jsn = $.parseJSON(data);
                                
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    
                                    var SideEffectName = jsn.t[i].SideEffectName;
                                    
                                    $('#other_effect').append($('<option>', {text:SideEffectName}));
                                }
                                
                            }
                        });              

                    } // End of if 'Yes' for select 

                });// End on change Chemotherapy
                
                // Insert data for Treatment/Side Effects Tab(Chemotherapy Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataRadiationBtn').hide();
                $('#addDataRadiationTable').hide();
                $('#radiation_control').on('change', function() {
                    RadiationFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(RadiationFlag == 'Yes')
                    {   
                        $('#addDataRadiationBtn').show();
                        $('#addDataRadiationTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                        $.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"TreatmentRadiationResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var RadiationName = jsn.t[i].RadiationName;
                                    var RadiationID = jsn.t[i].RadiationID;
                                    var RadiationOption = RadiationID + " " + RadiationName;
                                    $('#radiation_type').append($('<option>', {text:RadiationOption}));
                                }
                                
                            }
                        });               

                        $.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"TreatmentBodyPartResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var BodyPartID = jsn.t[i].BodyPartID
                                    var BodyPart = jsn.t[i].BodyPart;
                                    var BodyPartOption = BodyPartID + " " + BodyPart;
                                    $('#radiation_bodyPart').append($('<option>', {text:BodyPartOption}));
                                }
                                
                            }
                        });
                    } // End of if 'Yes' for select
                    $.ajax({
                            // make hit to get side effect names from tblzlusideeffects
                            url:"TreatmentSideEffectsResponse.php",
                            method:"POST",
                            success:function(data){

                                var jsn = $.parseJSON(data);
                                
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    
                                    var SideEffectName = jsn.t[i].SideEffectName;
                                    
                                    $('#radiation_effect').append($('<option>', {text:SideEffectName}));
                                }
                                
                            }
                        }); 

                });// End on change Chemotherapy
                                

                 // Insert data for Treatment/Side Effects Tab(Chemotherapy Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataSurgeryBtn').hide();
                $('#addDataSurgeryTable').hide();
                $('#surgery_control').on('change', function() {
                    SurgeryFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(SurgeryFlag == 'Yes')
                    {   
                        $('#addDataSurgeryBtn').show();
                        $('#addDataSurgeryTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                         $.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"TreatmentSurgeryResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var SurgeryName = jsn.t[i].SurgeryName;
                                    var SurgeryID = jsn.t[i].SurgeryID;
                                    var SurgeryOption = SurgeryID + " " + SurgeryName;
                                    $('#surgery_type').append($('<option>', {text:SurgeryOption}));
                                }
                                
                            }
                        });    
                         $.ajax({
                            // make hit to get side effect names from tblzlusideeffects
                            url:"TreatmentSideEffectsResponse.php",
                            method:"POST",
                            success:function(data){

                                var jsn = $.parseJSON(data);
                                
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    
                                    var SideEffectName = jsn.t[i].SideEffectName;
                                    
                                    $('#surgery_effect').append($('<option>', {text:SideEffectName}));
                                }
                                
                            }
                        });               

                    } // End of if 'Yes' for select 

                });// End on change Chemotherapy
                
                // Insert data for Treatment/Side Effects Tab(Chemotherapy Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataSpecialProceduresBtn').hide();
                $('#addDataSpecialProceduresTable').hide();
                $('#specialProcedures_control').on('change', function() {
                    SpFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(SpFlag == 'Yes')
                    {   
                        $('#addDataSpecialProceduresBtn').show();
                        $('#addDataSpecialProceduresTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                         /*$.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"TreatmentSpecialProceduresResponse.php",
                            method:"POST",
                            success:function(data){
                                //var jsn = $.parseJSON(data);
                                //for(i=0;i<jsn.t.length;i++)
                                //{   
                                    //var SpecialName = jsn.t[i].SpecialName;
                                    alert(data);
                                    $('#specialProcedures_type').append($('<option>', {text:'abx'}));
                                //}
                                
                            }
                        });  
                        */

                         $.ajax({
                            // make hit to get side effect names from tblzlusideeffects
                            url:"TreatmentSideEffectsResponse.php",
                            method:"POST",
                            success:function(data){

                                var jsn = $.parseJSON(data);
                                
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    
                                    var SideEffectName = jsn.t[i].SideEffectName;
                                    
                                    $('#specialProcedures_effect').append($('<option>', {text:SideEffectName}));
                                }
                                
                            }
                        });

                    } // End of if 'Yes' for select 

                });// End on change Chemotherapy
        
                // Insert data for Treatment/Side Effects Tab(Chemotherapy Section) 
                /* Do you know what type of cancer you are being treated for ? 
                    If Yes then show the control to enter data
                    i.e Date Cancer 
                */
                // A Flag variable to check what it is in the select box either 'Yes' or 'No'
                
                $('#addDataComplementaryBtn').hide();
                $('#addDataComplemantaryProcedureTable').hide();
                $('#complemantaryProcedure_control').on('change', function() {
                    CpFlag = $(this).find(":selected").val();
                            
                    // If Value is Yes It means load Data from data base and enable above Cancer
                    if(CpFlag == 'Yes')
                    {   
                        $('#addDataComplementaryBtn').show();
                        $('#addDataComplemantaryProcedureTable').show();
                        // Start Ajax Hit to DiagnosisResponse and load data to Diagnosis tab(Metastasis drop downs on modal popup)
                         $.ajax({
                            // make hit to get cancer names from tblzlucancers
                            url:"TreatmentComplemantaryProceduresResponse.php",
                            method:"POST",
                            success:function(data){
                                var jsn = $.parseJSON(data);
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    var ComplemantaryName = jsn.t[i].ComplemantaryName;
                                    var ComplemantaryID = jsn.t[i].ComplemantaryID;
                                    var ComplemantaryOption = ComplemantaryID + " " + ComplemantaryName;
                                    $('#complemantaryProcedures_type').append($('<option>', {text:ComplemantaryOption}));
                                }
                                
                            }
                        });
                         $.ajax({
                            // make hit to get side effect names from tblzlusideeffects
                            url:"TreatmentSideEffectsResponse.php",
                            method:"POST",
                            success:function(data){

                                var jsn = $.parseJSON(data);
                                
                                for(i=0;i<jsn.t.length;i++)
                                {   
                                    
                                    var SideEffectName = jsn.t[i].SideEffectName;
                                    
                                    $('#complemantaryProcedures_effects').append($('<option>', {text:SideEffectName}));
                                }
                                
                            }
                        });               

                    } // End of if 'Yes' for select 

                });// End on change Chemotherapy
                            
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
            function LoadRelation(){
                $.ajax({
                    url:"LoadRelation.php",
                    method:"POST",
                    success:function(data){
                        var jsn = $.parseJSON(data);
                        for(i=0;i<jsn.t.length;i++)
                        {
                            // get RelationName from jsn string that will be from database table(tblzlurelatonships)
                            var RelationName = jsn.t[i].RelationName;
                            // generate option dynamically and append the value of RelationName above in that option
                            $('#relation').append($('<option>', {text:RelationName}));
                            
                        }
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
                        /*for(;i<jsn.t.length - 1;i++)
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
                        */
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
                $('#relation').attr("disabled",true);
                $('#pstatus').attr("disabled",true);
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
                currentCancerFlag = $('#cancer_type option:selected').val();
                MetastasisFlag = $('#cancer_spread option:selected').val();
                CancerFlag = $('#cancer_history option:selected').val();
                OtherFlag = $('#other_prob option:selected').val();
                var currentCancerFlag1;
                var MetastasisFlag1;
                var CancerFlag1;
                var OtherFlag1;
                // If Yes then assign 1 other wise assign 2
                if(currentCancerFlag == 'Yes')
                {
                    currentCancerFlag1 = 1;
                }
                else
                {
                    currentCancerFlag1 = 2;
                }
                if(MetastasisFlag == 'Yes')
                {
                    MetastasisFlag1 = 1;
                }
                else
                {
                    MetastasisFlag1 = 2;
                }
                if(CancerFlag == 'Yes')
                {
                    CancerFlag1 = 1; 
                }
                else
                {
                    CancerFlag1 = 2;
                }
                if(OtherFlag == 'Yes')
                {
                    OtherFlag1 = 1;
                }
                else
                {
                    OtherFlag1 = 2;
                }
                /*alert(currentCancerFlag1);
                alert(MetastasisFlag1);
                alert(CancerFlag1);
                alert(OtherFlag1);*/
                var diagnosisComments = $('#diag_comm').val();
                //alert(diagnosisComments);
                var EditName = "";
                if(EditFlag == 1)
                    EditName = "Update";
                else
                    EditName = "Add";
                var answer = confirm(""+EditName+" data?");
                if (answer)
                { 
                   $.ajax({
                    url:"UpdateDiagnosisResponse.php",
                    method:"POST",
                    data:{pid:pid,currentCancerFlag1:currentCancerFlag1,MetastasisFlag1:MetastasisFlag1,CancerFlag1:CancerFlag1,OtherFlag1:OtherFlag1,diagnosisComments:diagnosisComments},
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