<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prenota extends CI_Controller {

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
            if (!$this->is_logged_in()) {
                redirect('login');
            }
        }
    
	public function index()
	{
            $this->load->model('prenota_model');
            $data['admin'] = $this->prenota_model->get_admin();
            $data['operatori'] = $this->prenota_model->get_operatori();
            $this->load->view('prenota', $data);
	}
        
        private function is_logged_in()
        {
            return $this->session->userdata('is_logged_in');
        }

       
        public function nuova ()
        {   
            $this->form_validation->set_rules('telefono', 'Telefono', 'callback_check_telefono|');
            $this->form_validation->set_rules('cliente', 'Cliente', 'required|');
            $this->form_validation->set_rules('data', 'Data', 'required|');
            $this->form_validation->set_rules('inizio', 'inizio', 'required|');
            $this->form_validation->set_rules('fine', 'fine', 'required|callback_check_ora|');
            
            if ($this->form_validation->run() == FALSE  ) {
                
                $this->load->model('prenota_model');
                $data['admin'] = $this->prenota_model->get_admin();
                $data['operatori'] = $this->prenota_model->get_operatori(); 
            	$this->load->view('prenota',$data);
              
            }
            else {
                
                $a = $this->input->post('data');
                $b = $this->input->post('inizio');
                $c = $this->input->post('fine');
                
                $this->load->model('prenota_model');
                $is_free=$this->prenota_model->check_prenotazione($a, $b, $c);
                
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

