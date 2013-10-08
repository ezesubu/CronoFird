<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class carrera extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

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
   

    public function guardar_carrera(){

                
        $this->load->model("Carrera_mdl");
        $this->load->model("Competidor_mdl");
        $this->load->model("Categoria_mdl");
      
        
        $config2['allowed_types'] = 'gif|jpg|png';
        $config2['image_library'] = 'gd2';            
        $config2['source_image'] =$_FILES['imagen_carrera']['tmp_name'];
        $config2['new_image'] = "./upload/".$_FILES['imagen_carrera']['name'];        
        //$config2['width'] = 75;
        $config2['overwrite'] = FALSE;
        //$config2['height'] = 50;
        
        $this->load->library('image_lib',$config2); 
        
        if ( !$this->image_lib->resize()){
           echo $this->image_lib->display_errors();   
        }
        
        $arrCarrera['car_nombre'] = $_POST['nombre'];
        $arrCarrera['car_imagen'] = $this->image_lib->dest_image;
        $arrCarrera['car_fecha'] = $_POST['fecha'];
        $arrCarrera['car_facebook'] = $_POST['facebook'];
        $arrCarrera['car_twitter'] = $_POST['twitter'];
        $arrCarrera['car_pagina'] = $_POST['pagina'];
        
         try {
            $id_carrera = $this->Carrera_mdl->addRow($arrCarrera);
        } catch (exception $e){
             ToJSONMsg("ERR", $e->getMessage());
             return;
        }



        if ( !empty($_FILES['excel_tados']['tmp_name']) ){
             $strFilePath = $_FILES['excel_tados']['tmp_name'];
        } 
       
        $arrUsuarios = $this->_readFile($strFilePath);
        foreach ($arrUsuarios as  $usuario) {            
            if($usuario['posicion'] == 'categoria'){
                $arrCategoria['cat_nombre'] = $usuario['posicion_general'];
                $arrCategoria['rel_car_id'] = $id_carrera;
                try {
                    $id_categoria= $this->Categoria_mdl->addRow($arrCategoria);
                } catch (exception $e){
                    ToJSONMsg("ERR", $e->getMessage());
                    return;
                }    
            }
            if( (int)($usuario['numero']) ){
               $arrCompetidor['com_posicion'] = $usuario['posicion'];
               $arrCompetidor['com_posicion_general'] = $usuario['posicion_general'];
               $arrCompetidor['com_nombre'] = $usuario['nombre'];
               $arrCompetidor['com_numero'] = $usuario['numero'];
               $arrCompetidor['com_edad'] = $usuario['edad'];
               $arrCompetidor['com_sexo'] = $usuario['sexo'];
               $arrCompetidor['com_tiempo_oficial'] = $usuario['tiempo_oficial'];
               $arrCompetidor['com_tiempo_tag'] = $usuario['tiempo_tag'];
               $arrCompetidor['com_diferencia'] = $usuario['diferencia'];
               $arrCompetidor['com_paso'] = $usuario['paso'];               
               $arrCompetidor['rel_cat_id'] = $id_categoria;


               try {
                    $id_competidor= $this->Competidor_mdl->addRow($arrCompetidor);
                } catch (exception $e){
                    ToJSONMsg("ERR", $e->getMessage());
                    return;
                }    
            }
            };
             $this->load->view('index');     

        }

        // die;
        // try {
        //     $this->Test_mdl->addRow($arrData);
        // } catch (exception $e){
        //     ToJSONMsg("ERR", $e->getMessage());
        //     return;
        // }
        // $this->load->view('test/test');     
    

    public function get_race(){
        $this->load->database();
        $param = $_GET['term'];
        $query = $this->db->query("SELECT * FROM tbl_carrera where car_nombre like '%".$_GET['term']."%';");
        foreach ($query->result_array() as $row)
        {
        $options['myData'][] = array(
            'turninId' =>  $row['car_id'],
            'title'    => $row['car_nombre']
           );         
        }
        //while ($row_id = $results->fetchArray()) {
        // more structure in data allows an easier processing
        //}
        echo json_encode($options);
    }

      public function get_usuario_categoria(){
        $this->load->database();
        var_dump($_GET);
        die;
        $param = $_GET['id_categoria'];
        $query = $this->db->query("SELECT * FROM tbl_carrera where car_nombre like '%".$_GET['term']."%';");         
        foreach ($query->result_array() as $row)
        {
        $options['myData'][] = array(
            'turninId' =>  $row['car_id'],
            'title'    => $row['car_nombre']
           );         
        }
        //while ($row_id = $results->fetchArray()) {
        // more structure in data allows an easier processing
        //}
        echo json_encode($options);
    }

    public function show_race(){
        $this->load->model("Carrera_mdl");
        $this->load->model("Categoria_mdl");
        $this->load->model("Competidor_mdl");

        $id= $_GET['id_carrera'];
        
        try {
            $objCarrera = $this->Carrera_mdl->getRow_ById($id);
        } catch ( Exception $e){
            ToJSONMsg("ERR",$e->getMessage());
            return;
        }
        
        $objParams->arrWhere = NULL;
        $objParams->arrWhere[] = "rel_car_id=$objCarrera->car_id";
        
        
        try {
            $objDatosCategoria = $this->Categoria_mdl->getAll($objParams); 
        } catch(Exception $e){
            ToJSONMsg("ERR", $e->getMessage());
            return;
        }
        if($objDatosCategoria->Datos[0]->cat_id){
        $categoria_id = $objDatosCategoria->Datos[0]->cat_id;
            $objParams->arrWhere = NULL;
            $objParams->arrWhere[] = "rel_cat_id = $categoria_id ";
            
            
            try {
                $objDatosCompetidor = $this->Competidor_mdl->getAll($objParams); 
            } catch(Exception $e){
                ToJSONMsg("ERR", $e->getMessage());
                return;
            }
        }
        $objView->objDatosCompetidor = $objDatosCompetidor;
        $objView->objDatosCategoria = $objDatosCategoria;
        $objView->objCarrera =$objCarrera;

        $this->load->view("carrera/show_race.php",$objView);
       
    }

    private function _readFile( $strFilePath )
    {
        require_once(APPPATH . '/libraries/ExcelReader.php');
        try {

            $objReader = new allusExcelReader();

            $arrConfig['strFilePath'] = $strFilePath;

           $arrConfig['arrFieldNames'] = array(
                'posicion',
                'posicion_general',
                'nombre',
                'numero',
                'edad',
                'sexo',
                'tiempo_oficial',
                'tiempo_tag',
                'diferencia',
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
