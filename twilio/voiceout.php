<?php 
	error_log(http_build_query($_GET));

	echo "<Response>\n";
	echo "<Say>hello, this a alert from Roll Called.  ".$_GET['fname']." was not present in ".$_GET['cname']."  If you are aware of this, please press 1.  Otherwise press 2.</Say>\n";		
	echo "</Response>\n";	
?>