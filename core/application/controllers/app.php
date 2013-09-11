<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Controller {

    public function index()
    { 
      $this->load->view('index');
      
    }

    public function test(){        
        $this->load->model("Test_mdl");
        $arrData['user_name'] = "Ezequiel Suarez Buitrago";

        try {
            $this->Test_mdl->addRow($arrData);
        } catch (exception $e){
            ToJSONMsg("ERR", $e->getMessage());
            return;
        }
        $this->load->view('test/test'); 
    }

    public function ingresar(){
        echo $_POST;
    }

    //Render view to upload file
    public function xls_to_db(){
        $this->load->view('app/xls_to_db');
    }
    //method to upload file
    public function upload_file(){
        #$this->load->library('excel_reader2.php');    
        $strFilePath = NULL;
        var_dump($_FILES);
        if ( !empty($_FILES['userfile']['tmp_name']) ){
            $strFilePath = $_FILES['userfile']['tmp_name'];
        }    
        
        $test = $this->_readFile($strFilePath);
        var_dump($test);

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
