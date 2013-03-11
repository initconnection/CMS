<?php

	define("MYSQLSERVER", "localhost");
	define("MYSQLUSER", "root");
	define("MYSQLPASSWORD", "");
	define("MYSQLDATABASE", "cms");

	class Database {
		
		/*
		**Initialize connection to the database
		*/
		private static function initConnection() {
		
			try {
				$dbh = @new PDO('mysql:host=localhost;dbname=' . MYSQLDATABASE,
					MYSQLUSER, MYSQLPASSWORD, array(PDO::ATTR_PERSISTENT => true));
			} catch(PDOException $e) {
				echo $e->getMessage();
			}

			return $dbh;
		}
		
		/*
		** Insert one element into the table
		*/
		public static function insertElement($table, array $elementData) {
				
			$query = "INSERT INTO " . $table . " (";
			$query .= self::keysToString($elementData, ", ");
			$query .= ") VALUES (";
			$query .= self::keysToString($elementData, ", ", ":");
			$query .= ")";
			
			$result = self::executeQuery($query, self::createParametersArray($elementData));
			
			return ($result->rowCount() > 0) ? true : false; 
		}
		
		/*
		** Select all elements from the table
		*/
		public static function selectAllElements($table) {
			
			$query = "SELECT * FROM " . $table;
			
			$result = self::executeQuery($query);
			
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
		
		/*
		** Select elements from the table which meet specified conditions
		*/
		public static function selectElements($table, array $conditions) {
			
			$query = "SELECT * FROM " . $table . " WHERE ";
			$query .= self::keysToString($conditions, " AND ", "= :", "_condition ", true);

			$result = self::executeQuery($query, self::createParametersArray(null, $conditions));
			
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
		
		/*
		** Updates elements which meet specified conditions with the new data
		*/
		public static function updateElements($table, array $conditions, array $elementData) {
					
			$query = "UPDATE " . $table . " SET ";
			$query .= self::keysToString($elementData, ", ", "= :", "", true);		
			$query .= " WHERE ";
			$query .= self::keysToString($conditions, " AND ", "= :", "_condition", true);
			
			$result = self::executeQuery($query, self::createParametersArray($elementData, $conditions));
			
			return $result->rowCount();
		}
        
		/*
		** Deletes element which meets specified conditions from a table
		*/
		public static function deleteElement($table, $conditions) {

			$query = "DELETE FROM " . $table . " WHERE ";
			$query .= self::keysToString($conditions, " AND ", "= :", "_condition", true);
			
			$result = self::executeQuery($query, self::createParametersArray(null, $conditions));
			
			return $result->rowCount();
		}
		
		/*
		** Function that forms one array that consists of any specified 
		** key and value
		*/
		private static function createParametersArray($elementData, $conditions = null) {
			
			$parameters = array();
			
			if($elementData) {
				foreach($elementData as $key => $value) {
					$parameters[$key] = $value;
				}
			}
				
			if($conditions) {
				foreach($conditions as $key => $value) {
				
					$value = preg_replace("/^!/", "", $value);
					
					$parameters[$key . "_condition"] = $value;
				}
			}
			
			return $parameters;
		}
		
		/*
		** Function that binds specified parameters to the main query and executes it
		*/
		private static function executeQuery($query, $parameters = null) {
		
			$dbh = self::initConnection();
			
			$sth = $dbh->prepare($query);
			
			if($parameters) {
				$parametersKeys = array_keys($parameters);
			
				foreach($parametersKeys as $key) {
					$sth->bindParam(":" . $key, $parameters[$key]);
				}
			}
			
			$sth->execute();
			
			return $sth;
		}
		
		/*
		** Converts an array to string 
		** @param $aditionord - (", " or " AND ")
		** @param $prefix - (":" or " = :")
		** @param $suffix - (empty or "_condition ")
		** @param $keyInFront - (true if we are not doing INSERT query)
		*/	
		private static function keysToString($array,  $additionWord = "",
                                $prefix = "", $suffix = "", $keyInFront = false) {
			
			$arrayKeys = array_keys($array);
			$lastArrayKey = end($arrayKeys);
			
			$string = "";
			foreach ($arrayKeys as $key) {
				if($keyInFront) {
					$string .= $key;
				}
				
				(preg_match("/^!/", $array[$key])) ? $prefix = "!" . $prefix : NULL;
				
				$string .= " " . $prefix . $key . $suffix;
				
				if ($key != $lastArrayKey) {
					$string .= $additionWord;
				}
			}
			
			return $string;
		}
    }