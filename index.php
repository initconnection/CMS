<?php
	require_once("includes/database.class.php");
	
	$conditions = array("username" => "iNfas");
	$elementData = array("username" => "Donatas", "password" => "grazus");
	
    echo "<pre>" . var_export(DatabaseClass::insertElement("user", $elementData), true) . "</pre>";
?>