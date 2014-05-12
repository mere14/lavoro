<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visualizza_all extends CI_Controller {

        /**
         * Controller pagina visualizza tutto dopo il login
         * effettuato con successo
         */
        public function __construct()
        {
            parent::__construct();
            $this->load->model("tab_prenotazioni_model");   
            if (!$this->is_logged_in()) {
                redirect('login');
            }
        }
    
	public function index()
	{   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $data['today']=$oggi;
            $this->load->model('visualizza_prenotazioni_model');
            
            $config = array();
            $config["base_url"] = base_url() . "visualizza_all/index";
            $config["total_rows"] = $this->tab_prenotazioni_model->record_count();
            $config["per_page"] = 40;
            $config["uri_segment"] = 3;
            $config['num_links'] = 10;
            
           
            
            $this->pagination->initialize($config);
 
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->tab_prenotazioni_model->fetch_prenotazioni($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
 
            $this->load->view("visualizza_all_pagination", $data);

            //$risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_all_info();
            //$this->load->view('visualizza_all', $risultato);
                
	}
        
        private function is_logged_in()
        {
        return $this->session->userdata('is_logged_in');
        }
}

