<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class competidor extends CI_Controller {

    public function index()
    { 
      $this->load->view('competidor/index');
      
    }

    public function get_competidor_categoria(){
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

  
}
