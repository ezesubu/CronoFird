<?php
include_once ('db_table.php');

class Carrera_mdl extends DB_Table {
	function __construct() {
		parent::__construct();
		$this->strTable = "tbl_carrera";
		$this->strPk = "car_id";
    }

}

