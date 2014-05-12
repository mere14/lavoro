<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

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
            $vet['prenotazioni']="";
            
            $this->load->view('agenda',$vet);
               
	}
        
        public function carica() 
        {
               
            $oggi = $this->input->post('data');
            $this->load->model('visualizza_prenotazioni_model');
            $vet['prenotazioni']=$this->visualizza_prenotazioni_model->show_today($oggi);
            $this->session->set_userdata('$data_scelta',$oggi);
            $this->load->view('agenda',$vet);
            
                
            
        }
        
         public function avanza() 
        {   
             $datestring = "%Y-%m-%d ";
             $data=$this->session->userdata('$data_scelta');
             //calcolo una nuova data
             $day = strtotime ( '+1 day' , strtotime ( $data ) ) ;
             $day_after= mdate($datestring, $day);   
             
             $this->session->set_userdata('$data_scelta',$day_after);
             
             $this->load->model('visualizza_prenotazioni_model');
             $vet['domani']=$day_after;
             $vet['prenotazioni']=$this->visualizza_prenotazioni_model->show_today($day_after);
             $this->load->view('agenda',$vet);
                      
        }
        
        public function indietro() 
        {   
             $datestring = "%Y-%m-%d ";
             $data=$this->session->userdata('$data_scelta');
             //calcolo una nuova data
             $day = strtotime ( '-1 day' , strtotime ( $data ) ) ;
             $day_before= mdate($datestring, $day);   
             
             $this->session->set_userdata('$data_scelta',$day_before);
             
             $this->load->model('visualizza_prenotazioni_model');
             $vet['domani']=$day_before;
             $vet['prenotazioni']=$this->visualizza_prenotazioni_model->show_today($day_before);
             $this->load->view('agenda',$vet);
                      
        }
        
        
        private function is_logged_in()
        {
        return $this->session->userdata('is_logged_in');
        }
        
        
        
}

