<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Prenota_model extends CI_Model { 
    /*
     * Gestisco le prenotazioni, aggiungo una nuova e fornisco i dati per il
     * completamento delle tendine
     */
    function get_admin() {
        $this->db->select ('*');
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->result_array();
    }
     function get_operatori() {
        $this->db->select ('*');
        $this->db->from('operatori');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function add($dati) {
       return $this->db->insert('prenotazioni',$dati);
    }
  
    function check_prenotazione($a, $b, $c) {
        $this->db->select ('*');
        $this->db->from('prenotazioni');
        //$this->db->where('pr_data',$a);
        //$this->db->where('pr_ora_inizio < ',$c);
        //$this->db->where('pr_ora_fine >= ',$c);
        
        //$this->db->or_where('pr_ora_inizio <', $b);
        //$this->db->where('pr_ora_fine >= ',$b);
        
        $this->db->where("(pr_data = '$a' AND pr_ora_inizio < '$c' AND pr_ora_fine >= '$c') OR (pr_data = '$a' AND pr_ora_inizio <= '$b' AND pr_ora_fine > '$b') OR (pr_data = '$a' AND pr_ora_inizio > '$b' AND pr_ora_fine < '$c') ");
        //$this->db->where("(pr_data = '$a' )");
        $query = $this->db->get();
         
        return ($query->num_rows >= 1) ? TRUE : FALSE;
    }
    
    
    function check_prenotazione_data($a) {
        $this->db->select ('*');
        $this->db->from('prenotazioni');
        
        
        $this->db->where("(pr_data = '$a') ");
        //$this->db->where("(pr_data = '$a' )");
        $query = $this->db->get();
         
        return ($query->num_rows >= 1) ? TRUE : FALSE;
    }
    
    function get_campo_occupato ($data) {
        
        $this->db->select('*');
        $this->db->from('prenotazioni');
        $this->db->where('pr_data',$data);
        $this->db->order_by('pr_ora_inizio');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function updata($dati) {
       return $this->db->insert('prenotazioni',$dati);
    }
    
    
    function check_prenotazione_after_modifica($a, $b, $c, $d) {
        $this->db->select ('*');
        $this->db->from('prenotazioni');
        
        $this->db->where("(pr_data = '$a' AND pr_ora_inizio < '$c' AND pr_ora_fine >= '$c' AND pr_id <> '$d') OR (pr_data = '$a' AND pr_ora_inizio <= '$b' AND pr_ora_fine > '$b' AND pr_id <> '$d') OR (pr_data = '$a' AND pr_ora_inizio > '$b' AND pr_ora_fine < '$c' AND pr_id <> '$d')  ");
        
        $query = $this->db->get();
         
        return ($query->num_rows >= 1) ? TRUE : FALSE;
    }
    
    function correggi($dati,$solo_id) {
        //$this->db->where ('pr_id',$solo_id);
        //$this->db->update('prenotazioni',$dati);
        $this->db->update('prenotazioni', $dati, "pr_id = $solo_id");
    }
}
?>
