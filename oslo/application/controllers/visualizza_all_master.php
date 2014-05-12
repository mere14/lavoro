<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visualizza_all_master extends CI_Controller {

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
            if (!$this->is_master()) {
                redirect('benvenuto');
            }
            
        }
    
	public function index()
	{   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $risultato['today']=$oggi;
            $this->load->model('visualizza_prenotazioni_model');
            $risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_all_info();
            $this->load->view('visualizza_all_master', $risultato);
                
	}
        
        public function cancella()
	{   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $risultato['today']=$oggi;
            //$prenotazione_id_modifica = $this->input->post('modifica');
            $cancella = $this->input->post('cancella');
           
            $this->load->model('visualizza_prenotazioni_model');
            $risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_single_prenotazione($cancella);
            $this->load->view('prenotazione_cancellata_step1', $risultato);
            //$risultato['prenotazioni']=$this->visualizza_prenotazioni_model->delete_prenotazione($cancella);
            //$this->load->view('prenotazione_cancellata', $risultato);
                
	}
        
        public function elimina()
	{   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $risultato['today']=$oggi;
            //$prenotazione_id_modifica = $this->input->post('modifica');
            $cancella = $this->input->post('cancella');
           
            $this->load->model('visualizza_prenotazioni_model');
            
            $this->visualizza_prenotazioni_model->delete_prenotazione($cancella);
            $this->load->view('prenotazione_eliminata');
                
	}
        
        public function annulla()
	{   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $risultato['today']=$oggi;
            //$prenotazione_id_modifica = $this->input->post('modifica');
            $this->load->model('visualizza_prenotazioni_model');
           $risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_all_info();
            $this->load->view('visualizza_all_master',$risultato);
            //$risultato['prenotazioni']=$this->visualizza_prenotazioni_model->delete_prenotazione($cancella);
            //$this->load->view('prenotazione_cancellata', $risultato);
                
	}
        
        
        public function modifica()
	{   
            $oggi=date('Y-m-d');  // stampa la data odierna
            $risultato['today']=$oggi;
            //$prenotazione_id_modifica = $this->input->post('modifica');
            $cancella = $this->input->post('modifica');
           
            $this->load->model('visualizza_prenotazioni_model');
            $risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_single_prenotazione($cancella);
            $this->load->view('prenotazione_modificata_step1', $risultato);
            //$risultato['prenotazioni']=$this->visualizza_prenotazioni_model->delete_prenotazione($cancella);
            //$this->load->view('prenotazione_cancellata', $risultato);
                
	}
        
        
        public function aggiorna ()
        {   
            $aggiorna = $this->input->post('cancella');
            $this->form_validation->set_rules('telefono', 'Telefono', 'callback_check_telefono|');
            $this->form_validation->set_rules('cliente', 'Cliente', 'required|');
            $this->form_validation->set_rules('data', 'Data', 'required|');
            $this->form_validation->set_rules('inizio', 'inizio', 'required|');
            $this->form_validation->set_rules('fine', 'fine', 'required|callback_check_ora|');
            
            //controllare validita form inseriti
            //SE ci sono errori
                //visualizzo pagina con scritto errore
            if ($this->form_validation->run() == FALSE  ) {
                
                 $this->load->model('visualizza_prenotazioni_model');
            $risultato['prenotazioni']=$this->visualizza_prenotazioni_model->show_single_prenotazione($aggiorna);
            $this->load->view('prenotazione_modificata_step1', $risultato);
              
            }
            else {
            //ALTRIMENTI
            //recupero id della prenotazione
            
             $a = $this->input->post('data');
             $b = $this->input->post('inizio');
             $c = $this->input->post('fine');
             
            //controllo che non ci sia un altra prenotazione con quelle caratteristiche, esclusa questa con questo id
            $this->load->model('prenota_model');
            $is_free=$this->prenota_model->check_prenotazione_after_modifica($a, $b, $c, $aggiorna);
            //SE NON CE NE SONO
                //OK 
                //FACCIO UPDATE DEI DATI NELLA RIGA CON QUESTO ID
                //MESSAGGIO OK
            if (!$is_free) {
                    $insert['pr_id'] = $this->input->post('cancella');
                    //$solo_id = $this->input->post('id_aggiorna');
                    $insert['pr_ad_id']       = $this->input->post('admin');
                    $insert['pr_op_id']       = $this->input->post('custode');
                    $insert['pr_data']        = $this->input->post('data');
                    $insert['pr_ora_inizio']  = $this->input->post('inizio');
                    $insert['pr_ora_fine']    = $this->input->post('fine');
                    $insert['pr_nome']        = $this->input->post('cliente');
                    $insert['pr_telefono']    = $this->input->post('telefono');
                    $insert['pr_prezzo']      = $this->input->post('prezzo');
                    $this->load->model('prenota_model');
                    $this->prenota_model->correggi($insert,$aggiorna);

                    $this->load->model('visualizza_prenotazioni_model');
                    $vet2['prenotazione_successo']=$this->visualizza_prenotazioni_model->show_last_modifica($aggiorna);
                    $this->load->view('prenotazione_completata',$vet2);
                    //$this->load->view('login');
                } 
            //ALTRIMENTI
                //MESSAGGIO DI ERRORE, IMPOSSIBILE MODIFICARE XKE IL CAMPO E OCCUPATO
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
        
        private function is_logged_in()
        {
        return $this->session->userdata('is_logged_in');
        }
        private function is_master()
        {
        return $this->session->userdata('is_livello');
        }
        
        public function check_ora($ora_fine)
        {   
            $ora_inizio = $this->input->post('inizio');
            if ($ora_fine <= $ora_inizio) {
                $this->form_validation->set_message('check_ora', 'ERRORE! ');
                return FALSE;
            }
            else
                return TRUE;   
        }
        
        public function check_telefono($tel)
        {   
           if (!is_numeric($tel))
             {
                $this->form_validation->set_message('check_telefono', 'ERRORE! ');
                return FALSE;
            }
            else
                return TRUE;   
        }
}

