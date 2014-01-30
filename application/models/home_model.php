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
        //~ echo $this->db->last_query() . "<br>";
        return $query;
        
    }
    

    function get_targets($mirna_name,$deltag){
		
		$filtro_mm = 1;
		
		$this->db->select(SIMILAR_field . ', count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, ' .  "gf.". FAMILY_field);
		
		$this->db->from($mirna_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = ' . SIMILAR_field ,'left');
		
		$this->db->join(tabFamily . ' gf', 'gf.locus_tag = ' . SIMILAR_field ,'left');
        

		$this->db->where(SIMILAR_field . ' !=', '');
		$this->db->where('deltag <=', $deltag);
		$this->db->where('filtro_mm >=',$filtro_mm);
		

		$this->db->where(GU_RULE);
		$this->db->group_by(SIMILAR_field);


		//~ $this->db->having('contador >=', $min_species); 
        $this->db->having('contador >=', 3); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		
		
		//~ echo $this->db->last_query() . "<br>";
		return $query;

	}
    
    function get_targets_results($mirna_name,$similars){
        //~ print $similars;
      
        $this->db->select(SIMILAR_field . ',file,gen,target,align,mirna,deltag,filtro_mm');
		$this->db->from($mirna_name);
		$this->db->where_in(SIMILAR_field,$similars);
        //~ $this->db->where_in('id', array('20','15','22','42','86'));
        //~ $this->db->where_in('id', $ids );
		$this->db->where(GU_RULE);
   		$this->db->group_by(SIMILAR_field . ',file,target');
		$this->db->order_by(SIMILAR_field);

        $query = $this->db->get();
        
        return $query->result();	      
        //~ echo "<br>";  		
		//~ echo $this->db->last_query() . "<br>";

    }
    
    
    function get_status($mirna_name){
        
        $this->db->select('status');
        $this->db->from('search s');
        $this->db->join('mirnas_cluster mc', 's.mirna_cluster_id = mc.id','left');
        $this->db->where('mc.reference',$mirna_name);
        $this->db->limit(1);
        
        $query = $this->db->get();		        		
        if ($query->num_rows() > 0 ) {
            $ret = $query->row();
            return $ret->status;
        }
        else{
            return 0;
        }

    }
    
    function  get_reference_by_sequence($sequence){
        $this->db->select('reference');
        $this->db->from('mirnas_cluster');
        $this->db->where('sequence',$sequence);
               
        $query = $this->db->get();		        		
        if ($query->num_rows() > 0 ) {
            $ret = $query->row();
            return $ret->reference;
        }
        else{
            return 0;
        }
        
    }
    
    
    function get_energy($mirna_name){
		
        $this->db->select('hyb_perf');
        $this->db->from('mirnas_cluster');
        $this->db->where('reference',$mirna_name);
			
        $query = $this->db->get();
            foreach ($query->result() as $row){
				$new_energy = ($row->hyb_perf)*72/100;
			}
		return $new_energy;
	}
    
}
	
	
