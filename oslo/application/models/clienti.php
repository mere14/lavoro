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
class Clienti extends CI_Model{
  // funzione di classe
//  var $nome;
//  var $cognome;
//  var $telefono;
 
    function check($a,$b,$c) {
       
        $this->db->select ('*');
        $this->db->from('clienti');
        $this->db->where('cl_nome',$a);
        $this->db->where('cl_cognome',$b);
        $this->db->where('cl_telefono ',$c);              
    
        $query = $this->db->get();
         
        return ($query->num_rows >= 1) ? TRUE : FALSE;
    }
  
    function add($dati) {
       
        return $this->db->insert('clienti',$dati);      
     
  }
  
  function get_all() {
       
        $this->db->select ('*');
        $this->db->from('clienti');
        $this->db->order_by('cl_cognome');            
        $query = $this->db->get();
        return $query->result_array();     
     
  }
  
  
  
}

?>