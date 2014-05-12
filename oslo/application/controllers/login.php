<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
         *  Pagina Login
	 */
   
	public function index()
	{   
            $this->load->view('login');
	}
        
        function __encrip_password($password) {
            return sha1($password);
        }	
        
        
        public function check()
	{   
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('pin', 'Password', 'required');
            
            if ($this->form_validation->run() == FALSE  ) {  
                
                $this->load->view('login');
                        
            }
            else {
                $a=$this->input->post('nome'); 
                $c=$this->input->post('pin');
                $ccc = $this->__encrip_password($c);
                
                $this->load->model('login_model');
                $is_admin=$this->login_model->check_admin($a, $ccc);
                //$is_admin=$this->login_model->check_admin($a, $c);
                if ($is_admin) {
                    /*recupero id admin per poi salvarlo dentro la sessione*/
                    $solo_id=$this->login_model->get_id($a, $ccc);
                    //$solo_id=$this->login_model->get_id_2($a, $c, $ccc);
                    foreach($solo_id->result_array() as $solo) {
                        $var1=$solo[ad_id];
                        $var3=$solo[ad_livello];
                    }
                    if ($var3)
                        $master= TRUE;
                    else 
                        $master= FALSE;
                    $data = array(
                        'nome' => $a,
                        'is_logged_in' => TRUE,
                        'is_admin' => TRUE,
                        'is_id' => $var1,
                        'is_livello' =>$master,
                    );
                    
                    $this->session->set_userdata($data);
                    redirect('benvenuto');
                } 
                else {
                    
                    redirect('login/error');
                }
            }
	}

        
        public function error()
        {   
            $errore['error']= TRUE;
            $this->load->view('login', $errore );
            
        }
        
        
        
      
     
}

