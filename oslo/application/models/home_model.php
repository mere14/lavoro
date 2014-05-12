<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Home_model extends CI_Model { 
    /*
     * Visualizzo le info base delle prenotazioni successive alla data odierna
     * quindi quelle passate non le visualizzo
     */
    function show_hide($today) {
    	$this->db->select('pr_data, pr_ora_inizio, pr_ora_fine');
        $this->db->from('prenotazioni');
        //$this->db->join('types', 'items.type_id = types.id');
       // $this->db->join('statuses', 'items.status_id = statuses.id');
        $this->db->where('pr_data >=', $today);
        $query = $this->db->get();
        return $query->result_array();
    }
  
}
?>
