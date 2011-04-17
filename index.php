<?php
	function send_alert(){
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,"http://app.rollcalled.com/twilio/send.php");
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl,CURLOPT_POST, TRUE);
		curl_setopt($curl,CURLOPT_POSTFIELDS, "send=1");
		
		$result = curl_exec($curl);
		print_r($result);
	}

	if (!empty($_GET['cid'])){
		
		$class_id = $_GET['cid'];	
	
		if (!empty($_POST)){
			$submitted = 1;			
			
			//Send SMS/Voice
			send_alert();									
		}
		
		$array = array(
			"students" => array( 
				array(
					"id" => 1,
					"fname" => "David",
					"lname" => "Cohen"
				),
				array(
					"id" => 2,
					"fname" => "Mark",
					"lname" => "Pincus"
				),
				array(
					"id" => 3,
					"fname" => "Andrew",
					"lname" => "Mason"
				),
				array(
					"id" => 4,
					"fname" => "Brad",
					"lname" => "Feld"
				),
				array(
					"id" => 5,
					"fname" => "Dave",
					"lname" => "McClure"
				),
				array(
					"id" => 6,
					"fname" => "Paul",
					"lname" => "Graham"
				),
				array(
					"id" => 7,
					"fname" => "Biz",
					"lname" => "Stone"
				),
				array(
					"id" => 8,
					"fname" => "Jason",
					"lname" => "Fried"
				),
				array(
					"id" => 9,
					"fname" => "Fred",
					"lname" => "Wilson"
				),
				array(
					"id" => 10,
					"fname" => "Bijan",
					"lname" => "Sabat"
				),
				array(
					"id" => 11,
					"fname" => "Jason",
					"lname" => "Mendelson"
				),
				array(
					"id" => 12,
					"fname" => "Howard",
					"lname" => "Lindzon"
				),
				array(
					"id" => 13,
					"fname" => "Chris",
					"lname" => "Sacca"
				)
			)
		);		
		
		$list = "";
		
		$setclassvalue = "$(\"#class_field\").val('".$class_id."')";
		
		foreach ($array['students'] as $student){
			$list .= "<input type=\"checkbox\" name=\"checkbox-1a\" id=\"student-".$student['id']."\" class=\"custom\" /> 
<label for=\"student-".$student['id']."\">".$student['lname'].", ".$student['fname']."</label>\n";								
		}
	}	
?>
<!doctype html>
<html>
<head>
<title>RollCalled</title>
<meta http-equiv="cleartype" content="on">
<link rel="stylesheet"  href="/css/jquery.mobile-1.0a4.1.min.css" /> 
<link rel="stylesheet" href="/css/style.css" /> 
</head>

<body>

  <div id="main_screen" data-theme="c" data-role="page">
  
  
  	
    <!-- ====== main content starts here ===== -->  
    
  	<div data-role="header" id="hdrMain" name="hdrMain" data-nobackbtn="true">
  		<center><span><img src="/images/logo.png"></span></center>
  	</div>
  	
  	<form method="post">      

  	<div data-role="content" id="contentMain" name="contentMain">
  		<div data-role="fieldcontain">
  			<label for="class_field">Class:&nbsp;</label>
  			<select id="class_field" name="class_field_r">
  				<option value="">Please select a class</option>  
				<option value="1">Period 1: Freshman English</option>  
    			<option value="2">Period 2: Sophomore English</option>  
    			<option value="3">Period 3: Sophomore English</option>
    			<option value="4">Period 4: Freshman English</option>
    			<option value="5">Period 5: Sophomore English</option> 
  			</select>
  		</div>
<?php 
	if (isset($submitted)){
		echo "The attendance for this class has been successfully recorded.";
	}
	else{
		if (isset($class_id)){	
?>
  		<div>Mark All Students Who Are Present:</div>
  		<div id="student_list" data-role="fieldcontain"> 
			 	<fieldset data-role="controlgroup"> 
					<?php echo $list; ?>
			    </fieldset> 
  		</div>
		<div>
			<button>Submit Attendance</button>
		</div>
<?php 
		}	
	}
?>		
  	</div>  
  	  
  	<!-- ====== main content ends here ===== -->  
  	
  	</form>
  	
  	<!-- ====== dialog content starts here ===== -->  
  	<div align="CENTER" data-role="content" id="contentDialog" name="contentDialog">
  		<span>Are you sure you want to submit your attendance?</span>
  	</div>  
  	<!-- ====== dialog content ends here ===== -->   
  	
  	
  	<!-- ====== transition content page starts here ===== -->  
  	<div data-role="content" id="contentTransition" name="contentTransition"></div>  
    <!-- ====== transition content ends here ===== -->   
  	
  	
  	<!-- ====== confirmation content starts here ===== -->  
  	<div align="center" data-role="content" id="confirmation">
  		<div data-role="header"  id="hdrConfirmation" name="hdrConfirmation" data-nobackbtn="true"></div>  
  		<div data-role="content" id="contentConfirmation" name="contentConfirmation" align="center"></div>  
  		<div data-role="footer" id="ftrConfirmation" name="ftrConfirmation"></div>  
  	</div>
  	<!-- ====== confirmation content ends here ===== -->  
  
  </div> 
  
  <script type="text/javascript" src="/js/jquery-1.5.min.js"></script> 
  <script type="text/javascript" src="/js/jquery.mobile-1.0a4.1.min.js"></script> 
  
  <script>
    $("#class_field").live("change",function(){
    	$.mobile.pageLoading();
		location = "?cid="+$("#class_field").val();
    });

    <?php echo $setclassvalue; ?>
    
    $("#contentDialog").hide();
    $("#contentTransition").hide();
    $("#confirmation").hide();
    
  </script>

</body>
</html>
