<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class competidor extends CI_Controller {

    public function index()
    { 
      $this->load->view('competidor/index');
      
    }

    public function get_competidor_categoria(){

        $this->load->model("Carrera_mdl");
        $this->load->model("Categoria_mdl");
        $this->load->model("Competidor_mdl");

        $id = $_GET['id_categoria'];

        try {
            $objCategoria = $this->Categoria_mdl->getRow_ById($id);
        } catch ( Exception $e){
            ToJSONMsg("ERR",$e->getMessage());
            return;
        }
        
        try {
            $objCarrera = $this->Carrera_mdl->getRow_ById($objCategoria->rel_car_id);
        } catch ( Exception $e){
            ToJSONMsg("ERR",$e->getMessage());
            return;
        }
        
        $objParams->arrWhere = NULL;
        $objParams->arrWhere[] = "rel_car_id=$objCarrera->car_id";
        
        
        try {
            $objDatosCategorias = $this->Categoria_mdl->getAll($objParams); 
        } catch(Exception $e){
            ToJSONMsg("ERR", $e->getMessage());
            return;
        }

        if($objDatosCategorias->Datos[0]->cat_id){
            $categoria_id = $_GET['id_categoria'];
            $objParams->arrWhere = NULL;
            $objParams->arrWhere[] = "rel_cat_id = $categoria_id ";
            
            
            try {
                $objDatosCompetidor = $this->Competidor_mdl->getAll($objParams); 
            } catch(Exception $e){
                ToJSONMsg("ERR", $e->getMessage());
                return;
            }
        }
        
        $objView->objSelectCategoria = $objCategoria;
        $objView->objDatosCompetidor = $objDatosCompetidor;
        $objView->objDatosCategoria = $objDatosCategorias;
        $objView->objCarrera =$objCarrera;

        $this->load->view("carrera/show_race.php",$objView);
    }
}
