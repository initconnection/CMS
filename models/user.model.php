<?php

	require_file("models/base.model.php");

	class UserModel extends BaseModel {
		private $table;
		
		public function __construct($table) {
			$this->table = $table;
		}

		public function insert($data) {
			return Database::insertElement($this->table, $data);
		}
		
	}
?>