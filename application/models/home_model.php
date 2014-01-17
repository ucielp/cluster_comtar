<?php 

class Home_model extends CI_Model{

	function __construct()

	{
		parent::__construct();
	}
    
    function is_a_conserved_mirna($sequence){
        
		$this->db->select('name,table_reference');
        $this->db->where('sequence',$sequence);
        $query = $this->db->get('mirnas');
        
        return $query;
        
    }
    
}
	
	
