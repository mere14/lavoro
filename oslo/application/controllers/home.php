<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
            $this->load->model('home_model');
            $risultato['prenotazioni']= $this->home_model->show_hide($risultato['today']);
            $this->load->view('home', $risultato);
	}
}

