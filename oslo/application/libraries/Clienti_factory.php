<?php

/* 
 * creo la mia classe per i clienti
 */
 
// controllo sul percorso della Library
if (!defined('BASEPATH')) 
{
  // interruzione in caso di esito negativo del controllo
  exit('No direct script access allowed');
}
// dichiarazione della classe
class Clienti_factory {
    
    private $_ci;

 	function __construct()
        {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->_ci =& get_instance();
            //Include the user_model so we can use it
            $this->_ci->load->model("clienti");
        }
        
        
        public function create($a,$b,$c) {
            //Create a new user_model object
            $client = new clienti();
            //Set the ID on the user model
            $result=$client->check($a,$b,$c);
            if (!$result){  
                    
                    $insert['cl_nome'] = $a;
                    $insert['cl_cognome'] = $b;
                    $insert['cl_telefono']  = $c;
                    
                    $client->add($insert);
                    
                    return $result;
            }
            
            else
                return $result;
            
        }
        
        
        
        
//        public function aggiungi($data) {
//            //Create a new user_model object
//            $client = new clienti();
//            //Set the ID on the user model
//            $client->add($data);
//            
//            
//        }
    
  
  
  
}

