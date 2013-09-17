<?php
include_once ('db_table.php');

class Competidor_mdl extends DB_Table {
	function __construct() {
		parent::__construct();
		$this->strTable = "tbl_competidor";
		$this->strPk = "competidor_id";
    }

}

