<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Controller {

    public function index()
    { 
      $this->load->model("Categoria_mdl");
      $this->load->model("Competidor_mdl");

      $this->load->database();
      $query = $this->db->query("SELECT * FROM tbl_carrera LIMIT 0, 4 ;");
      $carreras =  $query->result_array();
      
      foreach ($carreras as $carrera) {
          $promedios = $this->calcular_promedio($carrera['car_id']);
          $carrera['porcentaje_hombres'] = $promedios['porcentaje_hombres'];
          $carrera['porcentaje_mujeres'] = $promedios['porcentaje_mujeres'];
          $carrera['total_users'] = $promedios['total_users'];          
          $carrera['primer_lugar'] =   $promedios['primer_lugar'];
         $las_carreras[] = $carrera;
         
      }         
      $objView->carreras = $las_carreras;
      $this->load->view('index', $objView);
    }

    public function calcular_promedio($carrera_id){      
          $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where rel_car_id=".$carrera_id.";");          
          $total_users = $query->result_array();

          $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where rel_car_id=".$carrera_id." and com_sexo='m'");
          
          $masculino = $query->result_array();

          $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where rel_car_id=".$carrera_id." and com_sexo='f'");
          $femenino = $query->result_array();
          $query = $this->db->query("SELECT * FROM tbl_categoria 
                                    JOIN tbl_competidor
                                    ON
                                    tbl_competidor.rel_cat_id = tbl_categoria.cat_id
                                    where rel_car_id=".$carrera_id." and com_posicion_general='1'");
          
          $primer_lugar = $query->result_array();
            
          $promedio['porcentaje_hombres'] = round(($masculino[0]['total']/$total_users[0]['total'])*100);
          $promedio['porcentaje_mujeres'] = round(($femenino[0]['total']/$total_users[0]['total'])*100);
          $promedio['total_users'] = $total_users[0]['total'];
          $promedio['primer_lugar'] =  $primer_lugar[0];
          return $promedio;

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
