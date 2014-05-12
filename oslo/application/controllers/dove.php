<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dove extends CI_Controller {

	/**
         *  Pagina Login
	 */
   
	public function index()
	{   
            
           $data['percorso']="up_file/elenco.txt";
           $file=$data['percorso'];
           $this->load->view('dove', $data);
	}         
           
}

