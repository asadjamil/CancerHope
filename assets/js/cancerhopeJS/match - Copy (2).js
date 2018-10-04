var id;
$(document).ready(function(){ 

    // Hide the main form and footer 
    $('#patient_information').hide();

    $('#footerSection').hide();
    $('#editBtn').hide();
    $('#addBtn').hide();
    // Hide Search Match Button
    $('#sMatch').hide();
    // Hide Patient Demographics
    $('#ViewDemographics').hide();
    // auto complete logic
    $('#name').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            $.ajax({
                // search.php makes hit database checking user in db and return the list of users in JSON form in 'data'
                url:"search1.php",
                method:"POST",
                data:{query:query},
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
        $('#addBtn').show();
        // Show Match Button
        $('#sMatch').show();
        $('#name').val($(this).text());
        // name of patient selected from list
        name = $(this).text();
        $('#list').fadeOut();
        // id of patient selected from list
        id = parseInt(name);
        // View MatchNames on Match Form
        viewMatchName(id);
        // View Demographics against patient id selected
        $('#ViewDemographicsBtn').click(function(){
            ViewDemographics(id);
        });
            
        // View of SetSearchOptions on Match Form
        //getSetSearchOption();
        //disableSetSearchOption(); 
        // View of SetSearchOptions on Match Form
        getSetSearchOption();
        $('#addBtn').click(function(){
            //enableSetSearchOption();
            
            saveMatchName();
        }); // end addBtn
        $('#sMatch').click(function(){
            // Get data for Diagnosis Tab
            var Relationship_ON = 0;
            var Sex_ON = 0;
            var Age_ON = 0;
            var CurrentCancer_ON = 0;
            var CancerStage_ON = 0;
            var MetastasisHistory_ON = 0;
            var MetastasisBodyPart_ON = 0;
            var CancerRecurrance_ON = 0;
            var CancerHistory_ON = 0;
            var OtherHealthProblems_ON = 0;
            var Chemotherapy_ON = 0;
            var ChemotherapySE_ON = 0;
            var OtherDrugs_ON = 0;
            var OtherDrugsSE_ON = 0;
            var Radiation_ON = 0;
            var RadiationSE_ON = 0;
            var Surgery_ON = 0;
            var SurgerySE_ON = 0;
            var Special_ON = 0;
            var SpecialSE_ON = 0;
            var Complementary_ON = 0;
            var ComplementarySE_ON = 0;
            var Language_ON = 0;
            var MaritalStatus_ON = 0;
            var Children_ON = 0;
            var WorkStatus_ON = 0;
            var Race_ON = 0;
            var Religion_ON = 0;
            var Face2Face_ON = 0;
            var SupportType_ON = 0;

            if($('#d_relation').hasClass('checked'))
            {
                
                Relationship_ON = 1;
                
            }
            if($('#d_sex').hasClass('checked'))
            {
                
                Sex_ON = 1;
                
            }
            if($('#d_age').hasClass('checked'))
            {
                
                Age_ON = 1;
                
            }
            if($('#d_cancer').hasClass('checked'))
            {
                
                CurrentCancer_ON = 1;
                
            }
            if($('#d_cstage').hasClass('checked'))
            {
                
                CancerStage_ON = 1;
                
            }
            if($('#d_metahistory').hasClass('checked'))
            {
                
                MetastasisHistory_ON = 1;
                
            }
            if($('#d_metabp').hasClass('checked'))
            {
                
                MetastasisBodyPart_ON = 1;
                
            }
            if($('#d_creccure').hasClass('checked'))
            {
                
                CancerRecurrance_ON = 1;
                
            }
            if($('#d_chistory').hasClass('checked'))
            {
                
                CancerHistory_ON = 1;
                
            }
            if($('#d_oprblms').hasClass('checked'))
            {
                
                OtherHealthProblems_ON = 1;
                
            }
            if($('#t_chemo').hasClass('checked'))
            {
                
                Chemotherapy_ON = 1;
                
            }
            if($('#t_chemoSE').hasClass('checked'))
            {
                
                ChemotherapySE_ON = 1;
                
            }
            if($('#t_odrugs').hasClass('checked'))
            {
                
                OtherDrugs_ON = 1;
                
            }
            if($('#t_odrugsSE').hasClass('checked'))
            {
                
                OtherDrugsSE_ON = 1;
                
            }
            if($('#t_rad').hasClass('checked'))
            {
                
                Radiation_ON = 1;
                
            }
            if($('#t_radSE').hasClass('checked'))
            {
                
                RadiationSE_ON = 1;
                
            }
            if($('#t_surgery').hasClass('checked'))
            {
                
                Surgery_ON = 1;
                
            }
            if($('#t_surgerySE').hasClass('checked'))
            {
                
                SurgerySE_ON = 1;
                
            }
            if($('#t_sproc').hasClass('checked'))
            {
                
                Special_ON = 1;
                
            }
            if($('#t_sprocSE').hasClass('checked'))
            {
                
                SpecialSE_ON = 1;
                
            }
            if($('#t_compt').hasClass('checked'))
            {
                
                Complementary_ON = 1;
                
            }
            if($('#t_comptSE').hasClass('checked'))
            {
                
                ComplementarySE_ON = 1;
                
            }
            if($('#p_lang').hasClass('checked'))
            {
                
                Language_ON = 1;
                
            }
            if($('#p_marital').hasClass('checked'))
            {
                
                MaritalStatus_ON = 1;
                
            }
            if($('#p_child').hasClass('checked'))
            {
                
                Children_ON = 1;
                
            }
            if($('#p_wstatus').hasClass('checked'))
            {
                
                WorkStatus_ON = 1;
                
            }
            if($('#p_race').hasClass('checked'))
            {
                
                Race_ON = 1;
                
            }
            if($('#p_religion').hasClass('checked'))
            {
                
                Religion_ON = 1;
                
            }
            if($('#p_f2f').hasClass('checked'))
            {
                
                Face2Face_ON = 1;
                
            }

            if($('#s_patient').is(':checked'))
            {
                SupportType_ON = 2;
                //$('#d_relation').prop('disabled',true);
            }

            if($('#s_family').is(':checked'))
            {
                SupportType_ON = 3;
            }
            
            if($('#s_prof').is(':checked'))
            {
                SupportType_ON = 4;
            }
            $.ajax({
                url:"SearchMatch_Final.php",
                method:"POST",
                data:{id:id,Relationship_ON:Relationship_ON,Sex_ON:Sex_ON,Age_ON:Age_ON,CurrentCancer_ON:CurrentCancer_ON,CancerStage_ON:CancerStage_ON,MetastasisHistory_ON:MetastasisHistory_ON,MetastasisBodyPart_ON:MetastasisBodyPart_ON,CancerRecurrance_ON:CancerRecurrance_ON,CancerHistory_ON:CancerHistory_ON,OtherHealthProblems_ON:OtherHealthProblems_ON,Chemotherapy_ON:Chemotherapy_ON,ChemotherapySE_ON:ChemotherapySE_ON,OtherDrugs_ON:OtherDrugs_ON,OtherDrugsSE_ON:OtherDrugsSE_ON,Radiation_ON:Radiation_ON,RadiationSE_ON:RadiationSE_ON,Surgery_ON:Surgery_ON,SurgerySE_ON:SurgerySE_ON,Special_ON:Special_ON,SpecialSE_ON:SpecialSE_ON,Complementary_ON:Complementary_ON,ComplementarySE_ON:ComplementarySE_ON,Language_ON:Language_ON,MaritalStatus_ON:MaritalStatus_ON,Children_ON:Children_ON,WorkStatus_ON:WorkStatus_ON,Race_ON:Race_ON,Religion_ON:Religion_ON,Face2Face_ON:Face2Face_ON,SupportType_ON:SupportType_ON},
                success:function(data){
                    //alert(data);
                    $('#sMatchTable tbody').html(data);
                }
            });    

        });

    }); // End editBtn 

    
}); // End main
function ViewDemographics(id) 
{
    var id = id;
    var url = "ViewDemographics.php?id="+id;
    window.open(url);
    
}
function ViewDemographicsPatientSupport(id)
{
    var id = id;
    var url = "ViewDemographicsPatientSupport.php?id="+id;
    window.open(url);
}
function ViewDemographicsFamilySupport(id)
{
    var id = id;
    var url = "ViewDemographicsFamilySupport.php?id="+id;
    window.open(url);
}
function ViewDemographicsProfessionalSupport(id)
{
    var id = id;
    var url = "ViewDemographicsProfessionalSupport.php?id="+id;
    window.open(url);

}
function getSetSearchOption()
{
    // Get data for Diagnosis Tab
     $.ajax({
        url:"GetSetSearchOptions.php",
        method:"POST",
        data:{id:id},
        success:function(data){
            
            //alert(data);
            /* Parse JSON into JavaScript Object
                get first index(key,value) pair as only one record is read on one PatientID 
                and t[0] is because only one record */
            // loading data from database against PatientInformation(Demographics)  
            var jsn = $.parseJSON(data);    
            var pid = jsn.t[0].PatientID;
            var Relationship_ON = jsn.t[0].Relationship_ON;
            var Sex_ON = jsn.t[0].Sex_ON;
            var Age_ON = jsn.t[0].Age_ON;
            var CurrentCancer_ON = jsn.t[0].CurrentCancer_ON;
            var CancerStage_ON = jsn.t[0].CancerStage_ON;
            var MetastasisHistory_ON = jsn.t[0].MetastasisHistory_ON;
            var MetastasisBodyPart_ON = jsn.t[0].MetastasisBodyPart_ON;
            var CancerRecurrance_ON = jsn.t[0].CancerRecurrance_ON;
            var CancerHistory_ON = jsn.t[0].CancerHistory_ON;
            var OtherHealthProblems_ON = jsn.t[0].OtherHealthProblems_ON;
            var Chemotherapy_ON = jsn.t[0].Chemotherapy_ON;
            var ChemotherapySE_ON = jsn.t[0].ChemotherapySE_ON;
            var OtherDrugs_ON = jsn.t[0].OtherDrugs_ON;
            var OtherDrugsSE_ON = jsn.t[0].OtherDrugsSE_ON;
            var Radiation_ON = jsn.t[0].Radiation_ON;
            var RadiationSE_ON = jsn.t[0].RadiationSE_ON;
            var Surgery_ON = jsn.t[0].Surgery_ON;
            var SurgerySE_ON = jsn.t[0].SurgerySE_ON;
            var Special_ON = jsn.t[0].Special_ON;
            var SpecialSE_ON = jsn.t[0].SpecialSE_ON;
            var Complementary_ON = jsn.t[0].Complementary_ON;
            var ComplementarySE_ON = jsn.t[0].ComplementarySE_ON;
            var Language_ON = jsn.t[0].Language_ON;
            var MaritalStatus_ON = jsn.t[0].MaritalStatus_ON;
            var Children_ON = jsn.t[0].Children_ON;
            var WorkStatus_ON = jsn.t[0].WorkStatus_ON;
            var Race_ON = jsn.t[0].Race_ON;
            var Religion_ON = jsn.t[0].Religion_ON;
            var Face2Face_ON = jsn.t[0].Face2Face_ON;
            var SupportType_ON = jsn.t[0].SupportType_ON;
            //alert(Relationship_ON);
            if(Relationship_ON == 1)
            {
                $('#d_relation').addClass('checked');
                
            }
            else
            {
                $('#dc_relation').prop('disabled',true);
            }
           // alert(Sex_ON);
            if(Sex_ON == 1)
            {   
                $('#d_sex').addClass('checked');

            }
            else
            {
                $('#dc_sex').prop('disabled',true);
            }
            if(Age_ON == 1)
            {
                $('#d_age').addClass('checked');
            }
            else
            {
                $('#dc_age').prop('disabled',true);
            }
            if(CurrentCancer_ON == 1)
            {
                $('#d_cancer').addClass('checked');
            }
            else
            {
                $('#dc_cancer').prop('disabled',true);
            }
            if(CancerStage_ON == 1)
            {
                $('#d_cstage').addClass('checked');
            }
            else
            {
                $('#dc_cstage').prop('disabled',true);
            }
            if(MetastasisHistory_ON == 1)
            {
                $('#d_metahistory').addClass('checked');
            }
            else
            {
                $('#dc_metahistory').prop('disabled',true);
            }
            if(MetastasisBodyPart_ON == 1)
            {
                $('#d_metabp').addClass('checked');
            }
            else
            {
                $('#dc_metabp').prop('disabled',true);
            }
            if(CancerRecurrance_ON == 1)
            {
                $('#d_creccure').addClass('checked');
            }
            else
            {
                $('#dc_creccure').prop('disabled',true);
            }
            if(CancerHistory_ON == 1)
            {
                $('#d_chistory').addClass('checked');
            }
            else
            {
                $('#dc_chistory').prop('disabled',true);
            }
            if(OtherHealthProblems_ON == 1)
            {
                $('#d_oprblms').addClass('checked');
            }
            else
            {
                $('#dc_oprblms').prop('disabled',true);
            }
            if(Chemotherapy_ON == 1)
            {
                $('#t_chemo').addClass('checked');
            }
            else
            {
                $('#tc_chemo').prop('disabled',true);
            }
            if(ChemotherapySE_ON == 1)
            {
                $('#t_chemoSE').addClass('checked');
            }
            else
            {
                $('#tc_chemoSE').prop('disabled',true);
            }
            if(OtherDrugs_ON == 1)
            {
                $('#t_odrugs').addClass('checked');
            }
            else
            {
                $('#tc_odrugs').prop('disabled',true);
            }
            if(OtherDrugsSE_ON == 1)
            {
                $('#t_odrugsSE').addClass('checked');
            }
            else
            {
                $('#tc_odrugsSE').prop('disabled',true);
            }
            if(Radiation_ON == 1)
            {
                $('#t_rad').addClass('checked');
            }
            else
            {
                $('#tc_rad').prop('disabled',true);
            }
            if(RadiationSE_ON == 1)
            {
                $('#t_radSE').addClass('checked');
            }
            else
            {
                $('#tc_radSE').prop('disabled',true);
            }
            if(Surgery_ON == 1)
            {
                $('#t_surgery').addClass('checked'); 
            }
            else
            {
                $('#tc_surgery').prop('disabled',true);
            }
            if(SurgerySE_ON == 1)
            {
                $('#t_surgerySE').addClass('checked');
            }
            else
            {
                $('#tc_surgerySE').prop('disabled',true);
            }
            if(Special_ON == 1)
            {
                $('#t_sproc').addClass('checked');
            }
            else
            {
                $('#tc_sproc').prop('disabled',true);
            }
            if(SpecialSE_ON == 1)
            {
                $('#t_sprocSE').addClass('checked');
            }
            else
            {
                $('#tc_sprocSE').prop('disabled',true);
            }
            if(Complementary_ON == 1)
            {
                $('#t_compt').addClass('checked');
            }
            else
            {
                $('#tc_compt').prop('disabled',true);
            }
            if(ComplementarySE_ON == 1)
            {
                $('#t_comptSE').addClass('checked');
            }
            else
            {
                $('#tc_comptSE').prop('disabled',true);
            }
            if(Language_ON == 1)
            {
                $('#p_lang').addClass('checked');
            }
            else
            {
                $('#pc_lang').prop('disabled',true);
            }
            if(MaritalStatus_ON == 1)
            {
                $('#p_marital').addClass('checked');   
            }
            else
            {
                $('#pc_marital').prop('disabled',true);
            }
            if(Children_ON == 1)
            {
                $('#p_child').addClass('checked');
            }
            else
            {
                $('#pc_child').prop('disabled',true);
            }
            if(WorkStatus_ON == 1)
            {
                $('#p_wstatus').addClass('checked');
            }
            else
            {
                $('#pc_wstatus').prop('disabled',true);
            }
            if(Race_ON == 1)
            {
                $('#p_race').addClass('checked');
            }
            else
            {
                $('#pc_race').prop('disabled',true);
            }
            if(Religion_ON == 1)
            {
                $('#p_religion').addClass('checked');
            }
            else
            {
                $('#pc_religion').prop('disabled',true);
            }
            if(Face2Face_ON == 1)
            {
                $('#p_f2f').addClass('checked');
            }
            else
            {
                $('#pc_f2f').prop('disabled',true);
            }
            /*if(SupportType_ON == 1)
            {
                $('#p_lang').addClass('checked');
            }*/


        }// End Success Function

    });// End Ajax Hit
}
function disableSetSearchOption()
{
    $('#dc_relation').prop('disabled',true);
    $('#dc_sex').prop('disabled',true);
    $('#dc_age').prop('disabled',true);
    $('#dc_cancer').prop('disabled',true);
    $('#dc_cstage').prop('disabled',true);
    $('#dc_metahistory').prop('disabled',true);
    $('#dc_metabp').prop('disabled',true);
    $('#dc_creccure').prop('disabled',true);
    $('#dc_chistory').prop('disabled',true);
    $('#dc_oprblms').prop('disabled',true);
    $('#tc_chemo').prop('disabled',true);
    $('#tc_chemoSE').prop('disabled',true);
    $('#tc_odrugs').prop('disabled',true);
    $('#tc_odrugsSE').prop('disabled',true);
    $('#tc_rad').prop('disabled',true);
    $('#tc_radSE').prop('disabled',true);
    $('#tc_surgery').prop('disabled',true);
    $('#tc_surgerySE').prop('disabled',true);
    $('#tc_sproc').prop('disabled',true);
    $('#tc_sprocSE').prop('disabled',true);
    $('#tc_compt').prop('disabled',true);
    $('#tc_comptSE').prop('disabled',true);
    $('#pc_lang').prop('disabled',true);
    $('#pc_marital').prop('disabled',true);
    $('#pc_child').prop('disabled',true);
    $('#pc_wstatus').prop('disabled',true);
    $('#pc_race').prop('disabled',true);
    $('#pc_religion').prop('disabled',true);
    $('#pc_f2f').prop('disabled',true);
}
function enableSetSearchOption()
{
    $('#dc_relation').prop('disabled',false);
    $('#dc_sex').prop('disabled',false);
    $('#dc_age').prop('disabled',false);
    $('#dc_cancer').prop('disabled',false);
    $('#dc_cstage').prop('disabled',false);
    $('#dc_metahistory').prop('disabled',false);
    $('#dc_metabp').prop('disabled',false);
    $('#dc_creccure').prop('disabled',false);
    $('#dc_chistory').prop('disabled',false);
    $('#dc_oprblms').prop('disabled',false);
    $('#tc_chemo').prop('disabled',false);
    $('#tc_chemoSE').prop('disabled',false);
    $('#tc_odrugs').prop('disabled',false);
    $('#tc_odrugsSE').prop('disabled',false);
    $('#tc_rad').prop('disabled',false);
    $('#tc_radSE').prop('disabled',false);
    $('#tc_surgery').prop('disabled',false);
    $('#tc_surgerySE').prop('disabled',false);
    $('#tc_sproc').prop('disabled',false);
    $('#tc_sprocSE').prop('disabled',false);
    $('#tc_compt').prop('disabled',false);
    $('#tc_comptSE').prop('disabled',false);
    $('#pc_lang').prop('disabled',false);
    $('#pc_marital').prop('disabled',false);
    $('#pc_child').prop('disabled',false);
    $('#pc_wstatus').prop('disabled',false);
    $('#pc_race').prop('disabled',false);
    $('#pc_religion').prop('disabled',false);
    $('#pc_f2f').prop('disabled',false);
}
function saveMatchName() {
  

  // tell that Add in Database
  var pid = id;
  //alert(id);
  var p = 'add';
  $.ajax({
    url:"AddMatchName.php",
    method:"POST",
    data:{p:p,pid:pid},
    success:function(data){
      viewMatchName(pid);
      //alert(data);
    }
    });
}
function viewMatchName(id){
    
  // get PatientID
  var pid = id;
  $.ajax({
    url:"AddMatchName.php",
    method:"POST",
    data:{pid:pid},
    success:function(data){
      //alert(data);
      $('#addMatchNameTable tbody ').html(data);
    }
    });
}

function deleteMatchName(str,pid){
    
    var id = str;
    var p = 'del';
    $.ajax({
    url:"AddMatchName.php",
    method:"POST",
    data:{p:p,id:id},
    success:function(data){
      viewMatchName(pid);
    }
    });
}
function matchDone()
{
    /*if( $('#m_terminate27').hasClass('checked') )
    {
        alert('H');
    }
}