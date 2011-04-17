<?php
	include("twilio.php");

	define("TWILIO_ACCOUNT_SID","ACfff9fa936b8130d1a848cb1ec193aaf2");
	
	function send_sms($array){
		$twilio = new TwilioRestClient(TWILIO_ACCOUNT_SID,"1530841314ac89546fea563120f632ab");		
		
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
		
		$twilio->request("/2010-04-01/Accounts/".TWILIO_ACCOUNT_SID."/Calls.json?From=".$from."&To=".$to."&Url=http://rollcalled/twilio/voiceout.php?data=sid=".$array['student_id']."|fname=".$array['fname']."|cname=".$array['cname']);		
	}	
	
	if (!empty($_POST['send'])){
		send_sms(array());
	}
?>