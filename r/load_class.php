<?php 
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
	
	echo "<fieldset data-role=\"controlgroup\">\n"; 
	
	foreach ($array['students'] as $student){		
		echo "<input type=\"checkbox\" name=\"checkbox-1a\" id=\"student-".$student['id']."\" class=\"custom\" /> 
<label for=\"checkbox-1a\">".$student['lname'].", ".$student['fname']."</label>\n";		
	}
	
	echo "</fieldset>";
?>