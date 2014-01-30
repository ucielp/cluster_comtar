<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
		$this->load->helper('text');
		$this->load->helper('file');

	}

	function index($mirna_table)
	{
        
        $this->data['title'] = 'Title';
        $this->data['subtitle'] = 'Subtitle';
        $this->data['mirna_table'] = $mirna_table;

        
        $status = $this->home_model->get_status($mirna_table);
        
        if ($status == 0){
            $this->data['msg'] = "Sorry, the page you requested was not found. Please check the URL and try again.";
            $this->data['main_content'] = 'error_message';
        
        }
        elseif ($status == 1){
            $this->data['msg'] = "Your search is in progress, please try again later";
            $this->data['main_content'] = 'error_message';
        }
        else{
            
            $energy = $this->home_model->get_energy($mirna_table);
            $query = $this->home_model->get_targets($mirna_table,$energy);
            if ($query->num_rows() > 0 ) {
                $this->data['targets'] = $query->result();
                $this->data['main_content'] = 'results_view';
            }
            else
            {	

                $this->data['msg'] = "No results found with the current miRNA sequence.";
                $this->data['main_content'] = 'error_message';
            }
        }

        $this->load->view('temp/template_home', $this->data);
            
	}
    
    function result_details($mirna_table,$similars){
        
        $similars = unserialize(base64_decode($similars));
        
        $this->data['energy'] = $this->home_model->get_energy($mirna_table);
        $this->data['alignments'] = $this->home_model->get_targets_results($mirna_table,$similars);
        
        $this->data['main_content'] = 'alginments_result_view';
		$this->load->view('temp/template_home', $this->data);
        	
    }
}
