<?php 

class Home_model extends CI_Model{

	function __construct()

	{
		parent::__construct();
	}
		
	function get_microRNAs(){
		$this->db->select('name, table_reference');	
		$this->db->from('mirnas');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['table_reference']] = $row['name'];	
			}
		return $combo;
	}
	
	
	function get_microRNAs_list(){
		$this->db->select('name,sequence,hyb_perf,table_reference,conservation');	
		$this->db->from('mirnas');
		$this->db->order_by('name','asc');
		$query = $this->db->get();	
		if ($query->num_rows() > 0 ) {
			return $query->result();		
		}		
	}
	
	function get_nro_species(){
		for($i=MIN_SPECIES;$i<=MAX_SPECIES;$i++){
			$combo[$i]=$i;	
			}
		return $combo;
	}	
	
	function get_plants(){
		
		$this->db->select('specie, aka,grupo');	
		$this->db->from('plants');
		$this->db->where('db',DB_search);
		$this->db->order_by('specie','asc');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['grupo']][$row['specie']] = $row['specie'];	
			//~ $combo[$row['specie']] = $row['specie'];	
			}
			
		//~ $new_var['bla'] = $combo;
		//~ $new_var['ble'] = $combo;
		//~ return $new_var;
		return $combo;
	}
	
	
	
	function get_targets($mirna_name,$min_species,$mismatch,$energy,$species){
		
		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		$this->db->select(SIMILAR_field . ', count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, ' .  "gf.". FAMILY_field);
		
		//~ GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, ' . FAMILY_field);

		$this->db->from($mirna_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = ' . SIMILAR_field ,'left');
		
		# Esto lo agrego porque quiero ver families de la tabla
		$this->db->join(tabFamily . ' gf', 'gf.locus_tag = ' . SIMILAR_field ,'left');

		$this->db->where(SIMILAR_field . ' !=', '');
		$this->db->where('deltag <=', $energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		
		if(!empty($species)) {
			$this->db->where_in('file',$species);
		}

		$this->db->where(GU_RULE);
		$this->db->group_by(SIMILAR_field);


		$this->db->having('contador >=', $min_species); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		
		
		//~ query_to_csv($query, TRUE, 'toto.csv');

		//~ echo $this->db->last_query() . "<br>";
		return $query;

	}
	
	
	function get_alignment_in($mirna_name,$similar,$mm,$energy,$species,$in){
		
		# my $query = "select file,gen,target,align,mirna,deltag,filtro_mm from $file where " . SIMILAR_field . " = '$similar' 
		# group by file,target order by target";
		$this->db->select('file,gen,target,align,mirna,deltag,filtro_mm');
		$this->db->from($mirna_name);
		$this->db->where(SIMILAR_field, $similar);
		
		if ($in == 1){
			$this->db->where_in('file',$species);
			}
		elseif ($in == 2){
			$this->db->where_not_in('file',$species);
			}
		else {
			
		}	

		$this->db->where(GU_RULE);

		## TODO: Ver si pongo el group by porque estoy ocultando targets
		# Podria mostrar uno y al poner el mouse arriba ver el resto
		$this->db->group_by('file,target');
		
		//~ $this->db->where('deltag <=', $energy);
		//~ $this->db->where('filtro_mm >=',$filtro_mm);
		//~ $this->db->order_by('file','desc');
		//~ $this->db->order_by('file','deltag');	

		$query = $this->db->get();
		
		//~ echo $this->db->last_query() . "<br>";

		return $query->result();
	}	
	
	
	function get_targets_by_family($mirna_name,$min_species,$mismatch,$energy,$species){
	

		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		
		$this->db->select('count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  
		GROUP_CONCAT(distinct '. SIMILAR_field .'  SEPARATOR " ") as similars,  
		short_description, ' .  "gf.". FAMILY_field);
		
		$this->db->from($mirna_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = ' . SIMILAR_field ,'left');
		# Esto lo agrego porque quiero ver families de la tabla
		$this->db->join(tabFamily . ' gf', 'gf.locus_tag = ' . SIMILAR_field ,'left');
		
		$this->db->where(SIMILAR_field . ' !=', '');
		$this->db->where('deltag <=', $energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		$this->db->where('gf.'. FAMILY_field . ' !=', '');
		
		if(!empty($species)) {
			$this->db->where_in('file',$species);
		}

		$this->db->where(GU_RULE);
		$this->db->group_by('gf.'. FAMILY_field );
		$this->db->having('contador >=', $min_species); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		

		//~ echo $this->db->last_query() . "<br>";
		
		return $query->result();
	}
	
	function get_similar_by_family($mirna_name,$family,$species,$in){
		
		$this->db->select(SIMILAR_field. ',file,gen,target,align,mirna,deltag,filtro_mm');
		$this->db->from($mirna_name);
		# Esto lo agrego porque quiero ver families de la tabla
		$this->db->join(tabFamily . ' gf', 'gf.locus_tag = ' . SIMILAR_field ,'left');
		//~ $this->db->where(FAMILY_field, $family);
		$this->db->where('gf.'. FAMILY_field , $family);

		
		if ($in == 1){
			$this->db->where_in('file',$species);
			}
		elseif ($in == 2){
			$this->db->where_not_in('file',$species);
			}
		else {
			
		}	
		
		$this->db->where(GU_RULE);
		
		$this->db->order_by('file asc,gen,deltaG asc');
			
	
		$query = $this->db->get();
   		//~ echo $this->db->last_query() . "<br>";

		return $query->result();
	}
	
	function get_energy_by_perc($energy,$mirna_name){
		
		# Chequeo que sea un numero o tenga un menos
		if (!preg_match('/^[0-9.-]+$/', $energy)){
			$this->db->select('hyb_perf');
			$this->db->from(tabEnergy);
			$this->db->where('table_reference',$mirna_name);
			
			$query = $this->db->get();
			foreach ($query->result() as $row){
				$new_energy = ($row->hyb_perf)*$energy/100;
			}
		}
		
		else
		{
				$new_energy = $energy;
		}

		return $new_energy;
	}
	
	function not_in_species($species){
		$res;
		$this->db->select('specie, aka');	
		$this->db->from('plants');
		$this->db->where('db',DB_search);
		$this->db->order_by('specie','asc');
		
		if(!empty($species)) {
			$this->db->where_not_in('specie',$species);
		}
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row->specie;
            }
            return $data;
        }
	}
	
	function to_excel_model($print_result){
		$array = array(
			
		);
		$this->load->helper('csv');
		array_to_csv($array,'results.csv');
		echo $print_result;

	}
	
	
	function get_targets_by_locus_id($locus_tag,$miR_name, $min_species,$mismatch,$energy,$species){
			
		
		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		$this->db->select(SIMILAR_field . ', count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, ' .  "gf.". FAMILY_field);
		
		//~ GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, ' . FAMILY_field);

		$this->db->from($miR_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = ' . SIMILAR_field ,'left');
		
		# Esto lo agrego porque quiero ver families de la tabla
		$this->db->join(tabFamily . ' gf', 'gf.locus_tag = ' . SIMILAR_field ,'left');

		$this->db->where('similar_ath', $locus_tag);
		$this->db->where('deltag <=', $energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		
		if(!empty($species)) {
			$this->db->where_in('file',$species);
		}

		$this->db->where(GU_RULE);
		$this->db->group_by(SIMILAR_field);


		$this->db->having('contador >=', $min_species); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		

		//~ echo $this->db->last_query() . "<br>";
		return $query;

	}
	function get_targets_by_gene_id($locus_tag,$miR_name,$mismatch,$energy,$species){
	
		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		$this->db->select(SIMILAR_field . ', count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species, target,mirna,align,deltag, short_description, ' .  "gf.". FAMILY_field);
		
		//~ GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, ' . FAMILY_field);

		$this->db->from($miR_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = ' . SIMILAR_field ,'left');
		
		# Esto lo agrego porque quiero ver families de la tabla
		$this->db->join(tabFamily . ' gf', 'gf.locus_tag = ' . SIMILAR_field ,'left');

		$this->db->where('gen', $locus_tag);
		$this->db->where('deltag <=', $energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		
		if(!empty($species)) {
			$this->db->where_in('file',$species);
		}

		$this->db->where(GU_RULE);
		//~ $this->db->group_by(SIMILAR_field);
		$this->db->having('contador >=', 1); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		

		//~ echo $this->db->last_query() . "<br>";
		return $query;

	}
    
    function is_a_conserved_mirna($sequence){
        
		$this->db->select('name,table_reference');
        $this->db->where('sequence',$sequence);
        $query = $this->db->get('mirnas');
        
        return $query;
        
    }
    
}
	
	
