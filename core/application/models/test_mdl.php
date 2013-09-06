<?php
include_once ('DB_Table.php');

class Test_mdl extends DB_Table {
	function __construct() {
		parent::__construct();
		$this->strTable = "tbl_user";
		$this->strPk = "user_id";
    }

}

