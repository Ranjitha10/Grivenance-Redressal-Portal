<?php
require_once('include/config.php');
require_once('include/homeFunctions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>GRP | Home</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar 2.2.5-->
    <link href="plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
    <!-- Theme style -->
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
   
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
    function displaySubcategory(type){
        //alert(type);
        $.ajax({
            method: "POST",
            url: "ajax/displaySubCategory.php",
            data: { 'type': type},
            success: function(result){
            $("#subcategory").html(result);
           
            }
        });
      }
      
    </script>
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php
	  	top_header();		//function in include/dashboardFunctions.php
	  ?>
      
      <?php
	  	sidebar();		//function in include/dashboardFunctions.php
	  ?>

		<?php
			content();		//function in include/homeboardFunctions.php
		?>

      <?php
	  	footer();		//function in include/dashboardFunctions.php
	  ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- jQuery UI 1.11.1 -->
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  	<!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script src="plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- Page specific script -->
    <script type="text/javascript">
	 $(function () {
	  //iCheck for checkbox and radio inputs
	  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	  });
	  

	   //to display department if category is department
	 $("#category").change(function (){
			var id = parseInt($(this).val(), 10);
			//alert($("#category option:selected").text());
			if($("#category option:selected").text()=="Department") {
				// category is department
				//alert($("#bonus option:selected").text());
				$("#showDepartment").show();
				
				
			} else {
				// category is not department
				$("#showDepartment").hide();
			}
	});
	  
	  
	    //to display sender info form
	 $("#anonymous").click(function (){
			var id = parseInt($(this).val(), 10);
			if($(this).is(":checked")) {
				// checkbox is checked
				$("#senderDetails").hide();
				
				
			} else {
				// checkbox is not checked
				$("#senderDetails").show();
			}
	});
	 
	 });
	 
	 
	 
	 function Alphabets(nkey) {
            var keyval
			
            if (navigator.appName == "Microsoft Internet Explorer") {
                keyval = window.event.keyCode;
            }
            else if (navigator.appName == 'Netscape') {
                nkeycode = nkey.which;
                keyval = nkeycode;
            }
            //For A-Z
            if (keyval >= 65 && keyval <= 90) {
                return true;
            }
                //For a-z
            else if (keyval >= 97 && keyval <= 122) {
                return true;
            }
                //For Backspace
            else if (keyval == 8) {
                return true;
            }
                //For General
            else if (keyval == 0) {
                return true;
            }
                //For Space
            else if (keyval == 32) {
                return true;
            }
            else {
                return false;
            }
        }// End of the function
		
		
		function minmax(value) 
		{
			if(parseInt(value) < 0) 
				return 0 
			else if(parseInt(value) > 8) 
				return 8; 
			else return value;
		}
	
	  $("#home").addClass('active');

    </script>

    
  </body>
</html>
