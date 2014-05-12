<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Benvenuto extends CI_Controller {

        /**
         * Controller pagina benvenuto dopo il login
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
            $risultato['today_vera']=$oggi; //una copia per sapere sempre la data del giorno, evitando eventuali modifiche
            $risultato['today']=$oggi;
            $this->load->model('visualizza_prenotazioni_model');
            $risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_today($oggi);
            //$risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_all_info();
            $this->session->set_userdata('$data_scelta',$oggi);
            $this->load->view('benvenuto', $risultato);
                
	}
        
        private function is_logged_in()
        {
        return $this->session->userdata('is_logged_in');
        }
        
        public function avanza() 
        {    
             $oggi=date('Y-m-d');  // stampa la data odierna
             $vet['today_vera']=$oggi; //una copia per sapere sempre la data del giorno, evitando eventuali modifiche
             
             $datestring = "Y-m-d ";
             $data=$this->session->userdata('$data_scelta');
             //calcolo una nuova data
             $day = strtotime ( '+1 day' , strtotime ( $data ) ) ;
             $day_after= date($datestring, $day);   
             
             $this->session->set_userdata('$data_scelta',$day_after);
             
             $this->load->model('visualizza_prenotazioni_model');
             $vet['today']=$day_after;
             $vet['domani']=$day_after;
             $vet['prenotazioni']=$this->visualizza_prenotazioni_model->show_today($day_after);
             $this->load->view('benvenuto',$vet);
                      
        }
        
        public function indietro() 
        {   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $vet['today_vera']=$oggi; //una copia per sapere sempre la data del giorno, evitando eventuali modifiche
            
             $datestring = "%Y-%m-%d ";
             $data=$this->session->userdata('$data_scelta');
             //calcolo una nuova data
             $day = strtotime ( '-1 day' , strtotime ( $data ) ) ;
             $day_before= mdate($datestring, $day);   
             
             $this->session->set_userdata('$data_scelta',$day_before);
             
             $this->load->model('visualizza_prenotazioni_model');
             $vet['today']=$day_before;
             $vet['ieri']=$day_before;
             $vet['prenotazioni']=$this->visualizza_prenotazioni_model->show_today($day_before);
             $this->load->view('benvenuto',$vet);
                      
        }
        
}

/*Controller*/
/* Location: ./application/controllers/benvenuto.php */