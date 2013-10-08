<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Controller {

    public function index()
    { 

      $this->load->database();
      $query = $this->db->query(" SELECT * FROM tbl_carrera LIMIT 0, 4 ;");      
      $objView->carreras = $query->result_array();
      $this->load->view('index', $objView);
      
    }

    

    


    private function _readFile( $strFilePath )
    {
      require_once(APPPATH . '/libraries/ExcelReader.php');
      try {
       
       $objReader = new allusExcelReader();
      
       $arrConfig['strFilePath'] = $strFilePath;
       
       $arrConfig['arrFieldNames'] = array(
        'posicion',
        'nombre',
        'No',
        'Edad',
        'tiempo_oficial',
        'paso'
       );
      
       $objReader->setConfig($arrConfig);
      
       $arrData = $objReader->actionReadFile();
       
      } catch ( Exception $e ) {
       throw $e;
      }
      
      
      return $arrData;
      
    }

}
