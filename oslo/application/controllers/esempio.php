<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esempio extends CI_Controller {

  
	
	function index()
    {
            $this->load->library("Esempio");
            $vet['ris']=$this->Esempio->show_hello_world();
            //$this->load->view ();
    }               
}

?>

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */