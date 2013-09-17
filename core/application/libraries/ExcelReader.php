<?php
/**
 * Clase para leer informacion de archivos de Excel, tanto 2003 como 2007
 * @author  Tito Suarez <tito.suarez.b@gmail.com>
 * @version 1.0
 * Basado en el trabajo inicial de Fredy Sanchez y Diego Gamboa
 */

class allusExcelReader {
	
	private $strFilePath = NULL;
	private $bolIgnoreHeaders = FALSE;
	private $arrFieldNames = array();
	private $bolSetNameToFields = FALSE;
	public $intNRows = 0;
			
	function setConfig($arrConfig){
		
		if (is_array($arrConfig))
		{
			foreach ($arrConfig as $key => $val)
			{
				if ( property_exists($this, $key) ){
					$this->$key = $val;
				}
				
			}
		}
		
		if ( ! empty($this->arrFieldNames) ) {
			$this->bolSetNameToFields = true;
		}
		
	}
	
	function actionReadFile() {
		
		require_once(APPPATH . '/libraries/PHPExcel.php');

		// Identificar el Tipo de archivo
		$inputFileType = PHPExcel_IOFactory::identify($this->strFilePath);
		
		// Inicializar el lector
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		
		// Abrir el archivo
		$objPHPExcel = $objReader->load($this->strFilePath);
		
		// TODO: Adicionar el código para leer varias hojas
		$objWorksheet = $objPHPExcel->getActiveSheet();

		$arrDataResult = array();
		
		$intRow = 1;
		$intCol = 0;
		
		foreach ( $objWorksheet->getRowIterator() as $objRow ) {
			
			if ( $this->bolIgnoreHeaders == true && $intRow == 1 ) {
				$intRow++;
				continue;
			}
			
			$objCellIterator = $objRow->getCellIterator();
			$objCellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set

			$arrRowValues = array();
			
			$intCol = 0;
			
			foreach ( $objCellIterator as $objCell ) {
				
				if ( $this->bolSetNameToFields == TRUE ) {
					
					if (  isset( $this->arrFieldNames[$intCol] ) ){
						$arrRowValues[ $this->arrFieldNames[$intCol] ] = str_replace("'", "\'", $objCell->getValue()); 
					}
					else {
						$arrRowValues[$intCol] = str_replace("'", "\'", $objCell->getValue()); 
					}
					
				}
				else{
					$arrRowValues[$intCol] = str_replace("'", "\'", $objCell->getValue()); 
				}
				
				$intCol++;
			}
			
			//Ignorar lineas vacias
			if( implode('',$arrRowValues) == "" ){
				continue;
			}
			
			$arrDataResult[] = $arrRowValues;
			//Contar fila con datos
			$intRow++;
			
		}
		
		return $arrDataResult;

	}

} 
	
?>