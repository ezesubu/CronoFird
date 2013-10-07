<?php

include_once ('db_table.php');
class Categoria_mdl extends DB_Table {
	function __construct() {
		parent::__construct();
		$this->strTable = "tbl_categoria";
		$this->strPk = "cat_id";
    }

}

