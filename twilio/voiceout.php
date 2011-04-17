<?php 
	error_log(http_build_query($_GET));

	echo "<Response>\n";
	echo "<Say>hello, I am testing Rollcalled.</Say>\n";		
	echo "</Response>\n";	
?>