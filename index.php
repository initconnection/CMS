<?php
	//I add something.

	require_once("includes/database.class.php");
	
	$conditions = array("username" => "Donatas");
    $elementData = array("password" => "naujas");
    DatabaseClass::updateElements("user", $conditions, $elementData);
?>