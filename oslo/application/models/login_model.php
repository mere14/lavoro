<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login_model extends CI_Model { 
    /*
     * Controllo dati inseriti per il login
     */
    function check_admin($nome, $pin) {
        $this->db->select ('*');
        $this->db->from('admin');
        $this->db->where('ad_nome',$nome);
        $this->db->where('ad_pin',$pin);
        $query = $this->db->get();
         
        return ($query->num_rows == 1) ? TRUE : FALSE;
        //return $query->result_array();           
    }
    
    function get_id($nome, $pin) {
        $this->db->select ('ad_id,ad_livello');
        $this->db->from('admin');
        $this->db->where('ad_nome',$nome);
        $this->db->where('ad_pin',$pin);
        $query = $this->db->get();    
        return $query;         
    }
    
    function get_id_2($nome, $pin, $pinc) {
        $this->db->select ('ad_id,ad_livello');
        $this->db->from('admin');
        $this->db->where("(ad_nome = '$nome' AND ad_pin ='$pin') OR (ad_nome = '$nome' AND ad_pin = '$pinc' )");
        $query = $this->db->get();
         
        return $query;
        
       
         
    }
  
}
?>
