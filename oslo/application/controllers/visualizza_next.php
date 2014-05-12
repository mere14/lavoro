<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visualizza_next extends CI_Controller {

        /**
         * Controller pagina visualizza tutto dopo il login
         * effettuato con successo
         */
        public function __construct()
        {
            parent::__construct();

            if (!$this->is_logged_in()) {
                redirect('login');
            }
        }
    
	public function index()
	{   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $risultato['today']=$oggi;
            $this->load->model('visualizza_prenotazioni_model');
            $risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_next($oggi);
            $this->load->view('visualizza_next', $risultato);
                
	}
        
        private function is_logged_in()
        {
        return $this->session->userdata('is_logged_in');
        }
}

