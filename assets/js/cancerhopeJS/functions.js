function LoadZluCurrentCancerStages()
{
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

}

function LoadZluBodyPart()
{
    // Add Unknown Option
    $('#metastasis_bodypart').append($('<option>', {text:'Unknown'}));
    $('#radiation_bodyPart').append($('<option>', {text:'Unknown'}));
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
                $('#radiation_bodyPart').append($('<option>', {text:BodyPartOption}));
            }
            
        }
    });
}
function LoadZluOtherHealth()
{
    $('#other_health').append($('<option>', {text:'Unknown'}));
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
}
function LoadZluSideEffects()
{
    $('#chemo_effect').append($('<option>', {text:'Unknown'}));
    $('#other_effect').append($('<option>', {text:'Unknown'}));
    $('#radiation_effect').append($('<option>', {text:'Unknown'}));
    $('#surgery_effect').append($('<option>', {text:'Unknown'}));
    $('#specialProcedures_effect').append($('<option>', {text:'Unknown'}));
    $('#complemantaryProcedures_effects').append($('<option>', {text:'Unknown'}));
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
                $('#other_effect').append($('<option>', {text:SideEffectName}));
                $('#radiation_effect').append($('<option>', {text:SideEffectName}));
                $('#surgery_effect').append($('<option>', {text:SideEffectName}));
                $('#specialProcedures_effect').append($('<option>', {text:SideEffectName}));
                $('#complemantaryProcedures_effects').append($('<option>', {text:SideEffectName}));
            }
            
        }
    }); 
}
function LoadZluOtherSupportDrug()
{
    $('#other_type').append($('<option>', {text:'Unknown'}));
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
}

function LoadZluRadiation()
{
    $('#radiation_type').append($('<option>', {text:'Unknown'}));
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
}

function LoadZluSurgery()
{
    $('#surgery_type').append($('<option>', {text:'Unknown'}));
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
}
function LoadZluComplementary()
{
    $('#complemantaryProcedures_type').append($('<option>', {text:'Unknown'}));
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
function updateTreatment(){
    // get Patient ID
    var pid = $('#pid').val();
    // Get values of selected flags
    ChemoFlag = $('#chemo_type').val();
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
    if(ChemoFlag == 'Unknown')
    {
        ChemoFlag1 = 2;
    }
    else
    {
        ChemoFlag1 = 1;
    }
    if(ChemoSESelected_val == 'Unknown')
    {
        ChemoSelected = 2;
    }
    else
    {
        ChemoSelected = 1;
    }
    if(SupportFlag == 'Unknown')
    {
        SupportFlag1 = 2;
    }
    else
    {
        SupportFlag1 = 1;
    }
    if(SupportSESelected_val == 'Unknown')
    {
        SupportSelected = 2;
    }
    else
    {
        SupportSelected = 1;
    }
    if(RadiationFlag == 'Unknown')
    {
        RadiationFlag1 = 2;
    }
    else
    {
        RadiationFlag1 = 1;
    }
    if(RadiationSESelected_val == 'Unknown')
    {
        RadiationSelected = 2;
    }
    else
    {
        RadiationSelected = 1
    }
    if(SurgeryFlag == 'Unknown')
    {
        SurgeryFlag1 = 2;
    }
    else
    {
        SurgeryFlag1 = 1;
    }
    if(SurgerySESelected_val == 'Unknown')
    {
        SurgerySelected = 2;
    }
    else
    {
        SurgerySelected = 1;
    }
    if(SpFlag == 'Unknown')
    {
        SpFlag1 = 2;
    }
    else
    {
        SpFlag1 = 1;
    }
    if(SpSESelected_val == 'Unknown')
    {
        SpSelected = 2;
    }
    else
    {
        SpSelected = 1;
    }
    if(CpFlag == 'Unknown')
    {
        CpFlag1 = 2;
    }
    else
    {
        CpFlag1 = 1;
    }
    if(CpSESelected_val == 'Unknown')
    {
        CpSelected = 2;
    }
    else
    {
        CpSelected = 1;
    }
    // Ajax Hit to Update tbltreatment and set treatment form flags
    $.ajax({
        url:"UpdateTreatmentResponse.php",
        method:"POST",
        data:{pid:pid,ChemoFlag:ChemoFlag1,SupportFlag:SupportFlag1,RadiationFlag:RadiationFlag1,SurgeryFlag:SurgeryFlag1,SpFlag:SpFlag1,CpFlag:CpFlag1,ChemoSelected:ChemoSelected,SupportSelected:SupportSelected,RadiationSelected:RadiationSelected,SurgerySelected:SurgerySelected,SpSelected:SpSelected,CpSelected:CpSelected},
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
      
      $('#chemo_control').val(ChemoFlag1);
      $('#otherSupport_control').val(SupportFlag1);
      $('#radiation_control').val(RadiationFlag1);
      $('#surgery_control').val(SurgeryFlag1);
      $('#specialProcedures_control').val(SpFlag1);
      $('#complemantaryProcedure_control').val(CpFlag1);
      
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