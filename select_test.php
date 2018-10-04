<?php
/*$cookie_name = "logged2";
if (!isset($_COOKIE[$cookie_name])) {
    if ($_COOKIE[$cookie_name] != "demo") {
        header('Location: login.html');
        exit;
    }
}*/
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
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <!-- LATEST SELECT2 CSS-->		  
        <link href="assets/dist/css/select2.css" rel="stylesheet" />
    </head>
    <body class="page-body  page-fade" data-url="http://swsam.co.uk">
        <div class="page-container">
            <div class="main-content">
                <div class="row">
                    <label for="id_label_single">
                        Click this to highlight the single select element
                        
                        <select multiple class="cselect2" style="width:300px">
                            <option value="AL">Alabama</option>
                            <option value="Am">Amalapuram</option>
                            <option value="An">Anakapalli</option>
                            <option value="Ak">Akkayapalem</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </label>
                </div>

                <!-- Footer -->
                <footer class="main">
                    &copy; 2016 <strong>Cancer Hope - Matching System For Cancer Support</strong> Powered By <a href="http://swsam.co.uk" target="_blank">SWSAM Solutions</a>
                </footer>
            </div>
        </div>
        
        
        <script src="assets/ajax/libs/jquery/1.12.4/jquery.min"></script>
        <!--LATEST SELECT2 JS -->    	  
        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

        <!-- Bottom scripts (common) -->
        <script src="assets/js/gsap/main-gsap.js"></script>
        <!--<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>-->
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>
        <script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

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

        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/neon-custom.js"></script>
        <script src="assets/dist/js/select2.full.js"></script>

        <!-- Demo Settings -->
        <script src="assets/js/neon-demo.js"></script>
        
        
        <!-- Select2 Init Code - @author: arslanakram -->
        <script type="text/javascript">
            $(".cselect2").select2();
        </script>
        <!-- Select2 Init Code - @author: arslanakram -->
    </body>
</html>