<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Tab_prenotazioni_model extends CI_Model { 
    /*
     * per la paginazione
     */
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("prenotazioni");
    }
 
    public function fetch_prenotazioni($limit, $start) {
        $this->db->select('ad_cognome, op_cognome, pr_data, pr_ora_inizio, pr_ora_fine, pr_nome, pr_telefono, pr_prezzo,pr_id');
        $this->db->from('prenotazioni');
        $this->db->join('admin', 'pr_ad_id = ad_id');
        $this->db->join('operatori', 'pr_op_id = op_id');
        
        $this->db->order_by('pr_data','DESC');
        $this->db->order_by('pr_ora_inizio','ASC');
        $this->db->limit($limit, $start);
        
        
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}
?>
