<?php
	require_once("includes/database.class.php");
	
	$conditions = array("id" => 1, "username" => "infas");
	$elementData = array("username" => "Donce");
	
    echo "<pre>" . var_export(DatabaseClass::deleteElement("user", $conditions), true) . "</pre>";
?>