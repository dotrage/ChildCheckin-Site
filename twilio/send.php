<?php
	include("twilio.php");

	define("TWILIO_ACCOUNT_SID","ACfff9fa936b8130d1a848cb1ec193aaf2");
	define("TWILIO_AUTH_SECRET","1530841314ac89546fea563120f632ab");
	
	function send_sms($array){
		$twilio = new TwilioRestClient(TWILIO_ACCOUNT_SID,TWILIO_AUTH_SECRET);		
		
		$from = "615-685-0239";
		$to = $array['to'];
		
		$message = array(
			"From" => $from,
			"To" => $to,
			"Body" => $array['fname']." was reported as absent in ".$array['cname']." class today.  Are you aware of this?  (Yes/No)"
		);			
		
		$twilio->request("/2010-04-01/Accounts/".TWILIO_ACCOUNT_SID."/SMS/Messages.json", "POST", $message);
		
	}
	
	function send_voice($array){
		$twilio = new TwilioRestClient(TWILIO_ACCOUNT_SID,"1530841314ac89546fea563120f632ab");		
		
		$from = "615-685-0239";
		$to = $array['to'];
		//$result = $twilio->request("/2010-04-01/Accounts/".TWILIO_ACCOUNT_SID."/Calls.json?From=".$from."&To=".$to."&Url=http://app.rollcalled.com/twilio/voiceout.php");
		
		
		$data = array(
			"From" => $from,
			"To" => $to,
			"Url" => "http://app.rollcalled.com/twilio/voiceout.php?student_id=".$array['student_id']."&fname=".$array['fname']."&cname=".$array['cname'],
			"IfMachine" => "Hangup",
			"Timeout" => 30
		);
		
		$result = $twilio->request("/2010-04-01/Accounts/".TWILIO_ACCOUNT_SID."/Calls.json", "POST", $data);
		error_log(http_build_query($result));				
	}	
	
	if (!empty($_POST['send'])){
		//send_sms(array("to"=>"615-364-8615","fname"=>"Chris","cname"=>"Freshman English","student_id"=>"32"));
		send_voice(array("to"=>"615-364-8615","fname"=>"Chris","cname"=>"Freshman English","student_id"=>"32"));
	}
?>