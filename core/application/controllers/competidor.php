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

     public function get_competidor(){
        $this->load->database();
        $param = $_GET['term'];
        $query = $this->db->query("SELECT * FROM tbl_competidor where com_nombre like '%".$_GET['term']."%' and rel_cat_id ='".$_GET['id_categoria']."';");        
        foreach ($query->result_array() as $row)
        {
        $options['myData'][] = array(
            'turninId' =>  $row['com_id'],
            'title'    => $row['com_nombre'],
            'numero'   => $row['com_numero'],
            'posicion' => $row['com_posicion'],
            'posicion_general' => $row['com_posicion_general'],
            'tiempo_oficial' => $row['com_tiempo_oficial'],
            'diferencia' => $row['com_diferencia'],
            'paso' => $row['com_paso']
           );         
        }
        //while ($row_id = $results->fetchArray()) {
        // more structure in data allows an easier processing
        //}
        echo json_encode($options);
    }

    public function show(){        
        
        $this->load->model("Carrera_mdl");
        $this->load->model("Categoria_mdl");
        $this->load->model("Competidor_mdl");
        
        try {
            $objCompetidor = $this->Competidor_mdl->getRow_ById($_GET["id_competidor"]);
        } catch ( Exception $e){
            ToJSONMsg("ERR",$e->getMessage());
            return;
        }


        $query = $this->db->query("SELECT cat_id,car_imagen,car_nombre,car_fecha FROM tbl_categoria 
                                    JOIN tbl_carrera
                                    ON
                                    tbl_categoria.rel_car_id = tbl_carrera.car_id
                                    where cat_id=".$objCompetidor->rel_cat_id."");
                        
        @$objView->objCompetidor =$objCompetidor;
        $objView->objCarrera =$query->row();


        $this->load->view("competidor/show.php",$objView); 
     }
}


