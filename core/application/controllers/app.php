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
        echo "funciono";
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */