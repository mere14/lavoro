<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrazione extends CI_Controller {

        /**
         * Controller 
         */
        public function __construct()
        {
            parent::__construct();
          
        }
    
	public function index()
	{
            
            $this->load->view('registrazione');
	}
        
        
       
        public function add ()
        {   
            $this->form_validation->set_rules('telefono', 'Telefono', 'callback_check_telefono|');
            $this->form_validation->set_rules('nome', 'Nome', 'required|');
            $this->form_validation->set_rules('cognome', 'Cognome', 'required|');
            
            
            if ($this->form_validation->run() == FALSE  ) {
                
                 
            	$this->load->view('registrazione');
              
            }
            else {
                
                $a = $this->input->post('nome');
                $b = $this->input->post('cognome');
                $c = $this->input->post('telefono');
                
                $this->load->model('registrazione_model');
                $is_free=$this->registrazione_model->check($a, $b, $c);
                
                if (!$is_free) {
                    
                    $insert['pr_ad_id']       = $this->input->post('admin');
                    $insert['pr_op_id']       = $this->input->post('custode');
                    $insert['pr_data']        = $this->input->post('data');
                    $insert['pr_ora_inizio']  = $this->input->post('inizio');
                    $insert['pr_ora_fine']    = $this->input->post('fine');
                    $insert['pr_nome']        = $this->input->post('cliente');
                    $insert['pr_telefono']    = $this->input->post('telefono');
                    $insert['pr_prezzo']      = $this->input->post('prezzo');
                    $this->load->model('prenota_model');
                    $this->prenota_model->add($insert);

                    $this->load->model('visualizza_prenotazioni_model');
                    $vet2['prenotazione_successo']=$this->visualizza_prenotazioni_model->show_last_registration($insert['pr_data'],$insert['pr_ora_inizio']);
                    $this->load->view('prenotazione_completata',$vet2);
                   
                } 
                else {
                    
                    
                    $oggi= $this->input->post('data');
                    $this->load->model('prenota_model');
                    $vet['prenotazioni']= $this->prenota_model->get_campo_occupato($oggi);
                    $vet['a']=$oggi;
                    //redirect('prenota/error/5');
                    //$this->load->view('errore',$vet);
                    $this->load->view('prenotazione_non_completata',$vet);
                }
               
            }
        }
        
        public function check_ora($ora_fine)
        {   
            $ora_inizio = $this->input->post('inizio');
            if ($ora_fine <= $ora_inizio) {
                $this->form_validation->set_message('check_ora', 'ATTENZIONE! ERRORE! Ora finale non puo essere minore di quella iniziale');
                return FALSE;
            }
            else
                return TRUE;   
        }
        
        public function check_telefono($tel)
        {   
           if (!is_numeric($tel))
             {
                $this->form_validation->set_message('check_telefono', 'ATTENZIONE! ERRORE! Inserire un numero telefonico corretto');
                return FALSE;
            }
            else
                return TRUE;   
        }
        
        public function error($oggi)
        {   
            $vet['a']=$oggi;
            //$this->load->model('prenota_model');
            //$vet['prenotazioni']= $this->prenota_model->get_campo_occupato($a);
            $this->load->view('errore',$vet);
        }
      
}

