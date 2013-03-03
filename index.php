<?php
	require_once("includes/database.class.php");
	
	$conditions = array("username" => "InFaS");
	
	echo "<pre>" . var_export(DatabaseClass::selectElements("user", $conditions), true) . "</pre>";
?>