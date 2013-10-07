<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoria extends CI_Controller {

    public function index()
    { 
      $this->load->view('index');
      
    }

    public function guardar_carrera(){
      var_dump($_POST);
      var_dump($_FILES);
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

  
}
