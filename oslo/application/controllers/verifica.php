<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifica extends CI_Controller {

	/**
         *  Home page, visibile a tutti, visualizzo le registrazioni attive
         *  con informazioni minimali
	 */
	public function index()
	{   
            //imposto il formato della data
            $datestring = "%Y-%m-%d ";
            $time = time();
            //converto la data nel formato scelto prima, e la salvo nel array che poi passo alla view
            $risultato['today']= mdate($datestring, $time);
            //$this->load->model('home_model');
            //$risultato['prenotazioni']= $this->home_model->show_hide($risultato['today']);
            $this->load->view('verifica');
	}
        
        public function disponibilita() 
        {
            
            $this->form_validation->set_rules('data', 'Data', 'required|callback_check_data');
            //$this->form_validation->set_rules('inizio', 'Cliente', 'required|alpha|');
            $this->form_validation->set_rules('fine', 'fine', 'required|callback_check_ora|');
            
            if ($this->form_validation->run() == FALSE  ) {
                
                
            	$this->load->view('verifica');
              
            }
            else {
                
                $a = $this->input->post('data');
                $b = $this->input->post('inizio');
                $c = $this->input->post('fine');
                
               
                $this->load->model('prenota_model');
                $is_free=$this->prenota_model->check_prenotazione($a, $b, $c);
                
                if (!$is_free) {
                    
                    $campo['data']=$a;
                    $campo['inizio']=$b;
                    $campo['fine']=$c;
                    //CAMPO DISPONIBILE
                    $this->load->view('campo_disponibile', $campo);    
                }
                else {
                    //campo occupato,                     
                    $oggi= $this->input->post('data');
                    $this->load->model('prenota_model');
                    $vet['prenotazioni']= $this->prenota_model->get_campo_occupato($oggi);
                    $vet['a']=$oggi;
                    $vet['b']=$b;
                    $vet['c']=$c;
                    //redirect('prenota/error/5');
                    $this->load->view('campo_non_disponibile',$vet);
                }
            }
        }
        
        public function check_data($data)
        {   
            $oggi=date('Y-m-d');  // stampa la data odierna
            if ($data < $oggi) {
                $this->form_validation->set_message('check_data', ' <b>ATTENZIONE</b>: la data deve essere maggiore di quella odierna');
                return FALSE;
            }
            else
                return TRUE;   
        }
        
        public function check_ora($ora_fine)
        {   
            $ora_inizio = $this->input->post('inizio');
            if ($ora_fine < $ora_inizio) {
                $this->form_validation->set_message('check_ora',"<b>ATTENZIONE</b>: l' ora finale non puo essere minore di quella iniziale  ");
                return FALSE;
            }
            else
                return TRUE;   
        }
}

