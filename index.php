<?php
	require_once("includes/database.class.php");
	
	/*
	$array = DatabaseClass::selectAllElements("user");
	foreach ($array as $row) {
		foreach ($row as $key => $value) {
			echo $key . "=>" . $value . "<br />";
		}
		echo "<br />";
	}
	*/
	
	$conditions = array("username" => "iNfasssssss");
	$data = array("username" => "Donce");
	$result = DatabaseClass::updateElements("user", $conditions, $data);

	echo $result;
?>