<?php

	define("MYSQLSERVER", "localhost");
	define("MYSQLUSER", "root");
	define("MYSQLPASSWORD", "");
	define("MYSQLDATABASE", "root_site");

	class DatabaseClass {
		
		/*
		** Initialize connection to the database
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
		
			$elementDataKeys = array_keys($elementData);
			$lastElementDataKey = end($elementDataKeys);
			
			$query = "INSERT INTO " . $table . " (";
			foreach ($elementDataKeys as $key) {
				$query .= $key;
				if ($key != $lastElementDataKey) {
					$query .= ", ";
				}
			}
			$query .= ") VALUES (";
			foreach ($elementDataKeys as $key) {
				$query .= ":" . $key;
				if ($key != $lastElementDataKey) {
					$query .= ", ";
				}
			}
			$query .= ")";
			
			$sth = self::bindQueryParams($query, self::formParametersArray($conditions, $elementData));
			
			return ($sth->rowCount() > 0) ? true : false; 
		}
		
		/*
		** Select all elements from the table
		*/
		public static function selectAllElements($table) {
			
			$query = "SELECT * FROM " . $table;
			
			$sth = self::bindQueryParams($query, self::formParametersArray());
			
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		
		/*
		** Select elements from the table which meet specified conditions
		*/
		public static function selectElements($table, array $conditions) {
			
			$conditionsKeys = array_keys($conditions);
			$lastConditionsKey = end($conditionsKeys);
			
			$query = "SELECT * FROM " . $table . " WHERE ";
			foreach ($conditionsKeys as $key) {
				$query .= $key . "=:" . $key . "_condition";
				if ($key != $lastConditionsKey) {
					$query .= " AND ";
				}
			}
			
			$sth = self::bindQueryParams($query, self::formParametersArray($conditions, $elementData));
			
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		
		/*
		** Updates elements which meet specified conditions with the new data
		*/
		public static function updateElements($table, array $conditions, array $elementData) {
			
			$elementDataKeys = array_keys($elementData);
			$conditionsKeys = array_keys($conditions);
			
			$lastElementDataKey = end($elementDataKeys);
			$lastConditionsKey = end($conditionsKeys);
		
			$query = "UPDATE " . $table . " SET ";
			foreach($elementDataKeys as $key) {
				$query .= $key . " = :" . $key;
				if($key != $lastElementDataKey) {
					$query .= ", ";
				}
			}
			$query .= " WHERE ";
			foreach($conditionsKeys as $key) {
				$query .= $key . " = :" . $key . "_condition";
				if($key != $lastConditionsKey) {
					$query .= " AND ";
				}
			}
			
			$sth = self::bindQueryParams($query, self::formParametersArray($conditions, $elementData));
			
			return $sth->rowCount();
		}
        
        /*
        ** Deletes element which meets specified conditions from a table
        */
        public static function deleteElement($table, $conditions) {
            
            $conditionsKeys = array_keys($conditions);
            $lastConditionsKey = end($conditionsKeys);
            
            $query = "DELETE FROM " . $table . " WHERE ";
            foreach($conditionsKeys as $key) {
				$query .= $key . " = :" . $key . "_condition";
				if($key != $lastConditionsKey) {
					$query .= " AND ";
				}
			}
			
			$sth = self::bindQueryParams($query, self::formParametersArray($conditions, $elementData));
            
            return $sth->rowCount();
        }
		
		/*
		** Function that binds specified parameters to the main query
		*/
		private static function bindQueryParams($query, $parameters) {
		
			$dbh = self::initConnection();
			
			$parametersKeys = array_keys($parameters);
			
			$sth = $dbh->prepare($query);
			
			foreach($parameters as $key => $value) {
				$sth->bindParam(":" . $key, $parameters[$key]);
			}
			
			$sth->execute();
			
            return $sth;
		}
		
		/*
		**	Function that forms one array that consists of any specified 
		**	key and value
		*/
		private static function formParametersArray($conditions = array(), $elementData = array()) {
		
			(!empty($elementData)) ? $elementDataKeys = array_keys($elementData) : NULL;
			(!empty($conditions)) ? $conditionsKeys = array_keys($conditions) : NULL;
		
			(array)$allParameters = array();
			
			if(!empty($elementData)) {
				foreach($elementDataKeys as $key) {
					$allParameters += array($key => $elementData[$key]);
				}
			}
			if(!empty($conditions)) {
				foreach($conditionsKeys as $key) {
					$allParameters += array($key . "_condition" => $conditions[$key]);
				}
			}
			
			return $allParameters;
		}
		
	}	

?>