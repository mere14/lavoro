<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Visualizza_prenotazioni_model extends CI_Model { 
    /*
     * Visualizzo le info sulle prenotazioni, solo per gli utenti loggati
     */
    function show_all_info() {
    	$this->db->select('ad_cognome, op_cognome, pr_data, pr_ora_inizio, pr_ora_fine, pr_nome, pr_telefono, pr_prezzo,pr_id');
        $this->db->from('prenotazioni');
        $this->db->join('admin', 'pr_ad_id = ad_id');
        $this->db->join('operatori', 'pr_op_id = op_id');
        $this->db->order_by('pr_data','DESC');
        $this->db->order_by('pr_ora_inizio','ASC');
        //$this->db->where('pr_ad_id ', '$ad_id');
        //$this->db->where('pr_op_id ', '$op_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function show_today($oggi) {
    	$this->db->select('ad_cognome, op_cognome, pr_data, pr_ora_inizio, pr_ora_fine, pr_nome, pr_telefono, pr_prezzo,pr_id');
        $this->db->from('prenotazioni');
        $this->db->join('admin', 'pr_ad_id = ad_id');
        $this->db->join('operatori', 'pr_op_id = op_id');
        $this->db->where('pr_data',$oggi);
        $this->db->order_by('pr_data','DESC');
        $this->db->order_by('pr_ora_inizio','ASC');
        //$this->db->where('pr_ad_id ', '$ad_id');
        //$this->db->where('pr_op_id ', '$op_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function show_next($oggi) {
    	$this->db->select('ad_cognome, op_cognome, pr_data, pr_ora_inizio, pr_ora_fine, pr_nome, pr_telefono, pr_prezzo');
        $this->db->from('prenotazioni');
        $this->db->join('admin', 'pr_ad_id = ad_id');
        $this->db->join('operatori', 'pr_op_id = op_id');
        $this->db->where('pr_data >',$oggi);
        $this->db->order_by('pr_data','DESC');
        $this->db->order_by('pr_ora_inizio','ASC');
        //$this->db->where('pr_ad_id ', '$ad_id');
        //$this->db->where('pr_op_id ', '$op_id');
        $query = $this->db->get();
        return $query->result_array();
    }
  
    
     function show_last_registration($data,$ora) {
    	$this->db->select('ad_cognome, op_cognome, pr_data, pr_ora_inizio, pr_ora_fine, pr_nome, pr_telefono, pr_prezzo');
        $this->db->from('prenotazioni');
        $this->db->join('admin', 'pr_ad_id = ad_id');
        $this->db->join('operatori', 'pr_op_id = op_id');
        $this->db->where('pr_data',$data);
        $this->db->where('pr_ora_inizio',$ora);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    function delete_prenotazione($codice) {
    	
        
        $this->db->where('pr_id', $codice);
        $this->db->delete('prenotazioni');
        
    }
    
    function show_single_prenotazione($id) {
    	$this->db->select('ad_cognome, op_cognome, pr_data, pr_ora_inizio, pr_ora_fine, pr_nome, pr_telefono, pr_prezzo,pr_id,pr_op_id,pr_ad_id');
        $this->db->from('prenotazioni');
        $this->db->join('admin', 'pr_ad_id = ad_id');
        $this->db->join('operatori', 'pr_op_id = op_id');
        $this->db->where('pr_id',$id);
        $this->db->order_by('pr_data','DESC');
        $this->db->order_by('pr_ora_inizio','ASC');
        //$this->db->where('pr_ad_id ', '$ad_id');
        //$this->db->where('pr_op_id ', '$op_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function show_last_modifica($id) {
    	$this->db->select('ad_cognome, op_cognome, pr_data, pr_ora_inizio, pr_ora_fine, pr_nome, pr_telefono, pr_prezzo, pr_id');
        $this->db->from('prenotazioni');
        $this->db->join('admin', 'pr_ad_id = ad_id');
        $this->db->join('operatori', 'pr_op_id = op_id');
        $this->db->where('pr_id',$id);
        
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
?>
