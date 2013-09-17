<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class competidor extends CI_Controller {

    public function index()
    { 
      $this->load->view('competidor/index');
      
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
