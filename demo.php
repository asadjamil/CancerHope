function
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