<?php

	define("MYSQLSERVER", "localhost");
	define("MYSQLUSER", "root");
	define("MYSQLPASSWORD", "pass");
	define("MYSQLDATABASE", "cms");

	class DatabaseClass {
		
		/*
		 * Initialize connection to the database
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
		 * Insert one element into the table
		 */
		public static function insertElement($table, array $elementData) {
			
			$dbh = self::initConnection();
			
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
			
			$sth = $dbh->prepare($query);
			foreach ($elementDataKeys as $key) {
				$sth->bindParam(":" . $key, $elementData[$key]);
			}
			
			$sth->execute();
			
			return ($sth->rowCount > 0) ? true : false; 
		}
		
		/*
		 * Select all elements from the table
		 */
		public static function selectAllElements($table) {
		
			$dbh = self::initConnection();
			
			$query = "SELECT * FROM " . $table;
			$sth = $dbh->prepare($query);
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;
		}
		
		/*
		 * Select elements from the table which meet specified conditions
		 */
		
		public static function selectElements($table, array $conditions) {
			
			$dbh = self::initConnection();
			
			$conditionsKeys = array_keys($conditions);
			$lastConditionsKey = end($conditionsKeys);
			
			$query = "SELECT * FROM " . $table . " WHERE ";
			foreach ($conditionsKeys as $key) {
				$query .= $key . "=:" . $key;
				if ($key != $lastConditionsKey) {
					$query .= " AND ";
				}
			}
			
			$sth = $dbh->prepare($query);
			
			foreach ($conditionsKeys as $key) {
				$sth->bindParam(":" . $key, $conditions[$key]);
			}
			
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;
		}
		
		/*
		 * Updates elements which meet specified conditions with the new data
		 */
		public static function updateElements($table, array $conditions, array $elementData) {
		
			$dbh = self::initConnection();
			
			$elementDataKeys = array_keys($elementDataKeys);
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
			$sth = $dbh->prepare($query);
			
			foreach($elementDataKeys as $key) {
				$sth->bindParam(":" . $key, $elementData[$key]);
			}
			foreach($conditionsKeys as $key) {
				$sth->bindParam(":" . $key . "_condition", $conditions[$key]);
			}
			
			$sth->execute();
			
			return $sth->rowCount();
		}
        
        /*
         * Deletes element which meets specified conditions from a table
         */
        public static function deleteElement($table, $conditions) {
            
            $dbh = self::initConnection();
            
            $conditionsKeys = array_keys($conditions);
            $lastConditionsKey = end($conditionsKeys);
            
            $query = "DELETE FROM " . $table . " WHERE ";
            foreach($conditionsKeys as $key) {
				$query .= $key . " = :" . $key;
				if($key != $lastConditionsKey) {
					$query .= " AND ";
				}
			}
            $sth = $dbh->prepare($query);
			
			foreach($conditionsKeys as $key) {
				$sth->bindParam(":" . $key, $conditions[$key]);
			}
            
            $sth->execute();
            
            return $sth->rowCount();
        }
	}	

?>