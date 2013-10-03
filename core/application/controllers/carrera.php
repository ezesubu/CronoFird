<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class carrera extends CI_Controller {

    public function index()
    { 
      $this->load->view('carrera/index');
      
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

    public function guardar_carrera(){
        
        $this->load->model("Carrera_mdl");
        $this->load->model("competidor_mdl");
        $this->load->model("categoria_mdl");
        
        $arrCarrera['nombre'] = $_POST['nombre'];
        $arrCarrera['imagen'] = "test";#se la debo :D;
        $arrCarrera['fecha'] = $_POST['fecha'];
        $strFilePath = NULL;
        // if ( !empty($_FILES['excel_tados']['tmp_name']) ){
        //     $strFilePath = $_FILES['excel_tados']['tmp_name'];
        // }    
        // var_dump($_FILES['imagencarrera']);
        if ( !empty($_FILES['imagencarrera']['tmp_name']) ){
            $imageName = $_FILES['imagencarrera']['tmp_name']; 
            // $imageTmp = $_FILES['imagencarrera']['tmp_name'];
        }    
        $extract = fopen($imageName, 'r'); 
        // $content = fread($extract, $size); 
        // $content = addslashes($content); 
        // fclose($extract); 
        var_dump($extract);
        // $arrUsuarios = $this->_readFile($strFilePath);
        // var_dump($arrUsuarios );

        die;
        try {
            $this->Test_mdl->addRow($arrData);
        } catch (exception $e){
            ToJSONMsg("ERR", $e->getMessage());
            return;
        }
        $this->load->view('test/test'); 
    }
    public function get_race(){
        $param = $_GET['term'];        
        //while ($row_id = $results->fetchArray()) {
        // more structure in data allows an easier processing
        $options['myData'][] = array(
            'turninId' => "asdf",
            'title'    => "el pepes"
           ); 
        //}
        echo json_encode($options);
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
