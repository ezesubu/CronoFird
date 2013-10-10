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
        
        @$objParams->arrWhere = NULL;
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
        $suma_date = 0;
        foreach ($objDatosCompetidor->Datos as $hora) {
            $segundos_oficial= $hora->com_tiempo_oficial;
            $suma_date +=strtotime($segundos_oficial);                
         }
            $promedio = $suma_date/count($objDatosCompetidor->Datos);
            
        @$objView->promedio = date('h:i:s', $promedio);
        @$objView->objResumenes =$this->calcular_promedio($categoria_id);
        $objView->objSelectCategoria = $objCategoria;
        $objView->objDatosCompetidor = $objDatosCompetidor;
        $objView->objDatosCategoria = $objDatosCategorias;
        $objView->objCarrera =$objCarrera;

        $this->load->view("carrera/show_race.php",$objView);
    }

     public function calcular_promedio($carrera_id){      
          $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where cat_id=".$carrera_id.";");          
          $total_users = $query->result_array();

          $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where cat_id=".$carrera_id." and com_sexo='M'");
          
          $masculino = $query->result_array();

          $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where cat_id=".$carrera_id." and com_sexo='F'");
          $femenino = $query->result_array();
          $query = $this->db->query("SELECT * FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where cat_id=".$carrera_id." and com_posicion='1'");
          
          $primer_lugar = $query->result_array();
            
          $promedio['porcentaje_hombres'] = round(($masculino[0]['total']/$total_users[0]['total'])*100);
          $promedio['porcentaje_mujeres'] = round(($femenino[0]['total']/$total_users[0]['total'])*100);
          $promedio['total_users'] = $total_users[0]['total'];
          $promedio['primer_lugar'] =  $primer_lugar[0];
                 //die;
          return $promedio;

    }

}


