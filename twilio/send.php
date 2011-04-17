<?php
	include("twilio.php");

	define("TWILIO_ACCOUNT_SID","ACfff9fa936b8130d1a848cb1ec193aaf2");
	define("TWILIO_AUTH_SECRET","1530841314ac89546fea563120f632ab");
	
	function send_sms($array){
		$twilio = new TwilioRestClient(TWILIO_ACCOUNT_SID,TWILIO_AUTH_SECRET);		
		
		$from = "615-685-0239";
		$to = $array['phone'];
		
		$message = array(
			"From" => $from,
			"To" => $to,
			"Body" => "School Alert: ".$array['fname']." was reported as absent in ".$array['cname']." class today.  Are you aware of this?  (Yes/No)"
		);			
		
		$twilio->request("/2010-04-01/Accounts/".TWILIO_ACCOUNT_SID."/SMS/Messages.json", "POST", $message);
		
	}
	
	function send_voice($array){
		$twilio = new TwilioRestClient(TWILIO_ACCOUNT_SID,"1530841314ac89546fea563120f632ab");		
		
		$from = "615-685-0239";
		$to = $array['phone'];
		//$result = $twilio->request("/2010-04-01/Accounts/".TWILIO_ACCOUNT_SID."/Calls.json?From=".$from."&To=".$to."&Url=http://app.rollcalled.com/twilio/voiceout.php");
		
		
		$data = array(
			"From" => $from,
			"To" => $to,
			"Url" => "http://app.rollcalled.com/twilio/voiceout.php?student_id=".$array['student_id']."&fname=".$array['fname']."&cname=".urlencode($array['cname']),
			"IfMachine" => "Hangup",
			"Timeout" => 30
		);
		
		$result = $twilio->request("/2010-04-01/Accounts/".TWILIO_ACCOUNT_SID."/Calls.json", "POST", $data);
		error_log(http_build_query($result));				
	}	
	
	if (!empty($_POST['send'])){
		$array = array(
			array(
				"student_id" => 1,
				"fname" => "Sid",
				"lname" => "Smith",
				"cname" => "English",
				"phone" => "6154158558",
				"type" => "voice"
			),
			array(
				"student_id" => 3,
				"fname" => "Matthew",
				"lname" => "Rogers",
				"cname" => "English",
				"phone" => "6153979595",
				"type" => "sms"
			),
			array(
				"student_id" => 4,
				"fname" => "Robert",
				"lname" => "Hartline",
				"cname" => "English",
				"phone" => "6153946699",
				"type" => "sms"
			),
			array(
				"student_id" => 6,
				"fname" => "Justin",
				"lname" => "Davis",
				"cname" => "English",
				"phone" => "8658052410",
				"type" => "sms"
			),
			array(
				"student_id" => 8,
				"fname" => "Shane",
				"lname" => "Stenner",
				"cname" => "English",
				"phone" => "4109638130",
				"type" => "voice"
			),
			array(
				"student_id" => 10,
				"fname" => "Nicholas ",
				"lname" => "Holland",
				"cname" => "English",
				"phone" => "6154225205",
				"type" => "sms"
			),
			array(
				"student_id" => 13,
				"fname" => "Michael",
				"lname" => "Summar",
				"cname" => "English",
				"phone" => "6152607704",
				"type" => "voice"
			),
			array(
				"student_id" => 16,
				"fname" => "Matt",
				"lname" => "Kenigson",
				"cname" => "English",
				"phone" => "6156244040",
				"type" => "voice"
			),
			array(
				"student_id" => 19,
				"fname" => "Jake",
				"lname" => "Robinson",
				"cname" => "English",
				"phone" => "6154245019",
				"type" => "sms"
			),
			array(
				"student_id" => 21,
				"fname" => "Ben",
				"lname" => "Stucki",
				"cname" => "English",
				"phone" => "6159732406",
				"type" => "sms"
			)
		);
		
		foreach ($array as $student){
			if ($student['type'] == "voice"){
				send_voice($student);
			}
			if ($student['type'] == "sms"){
				send_sms($student);
			}			
		}
		
		//send_sms(array("to"=>"615-364-8615","fname"=>"Chris","cname"=>"Freshman English","student_id"=>"32"));
		
	}
?>