<?php 
	echo "<Response>\n";
	echo "<Say>hello, this a alert from Roll Called.  ".$_GET['fname']." was not present in ".$_GET['cname']."</Say>\n";
    echo "<Gather action=\"http://app.rollcalled.com/twilio/voice-validate.php\" method=\"GET\">
        <Say>If you are aware of this, please press 1.  Otherwise press 2.</Say>
    </Gather>";	
	echo "</Response>\n";	
?>