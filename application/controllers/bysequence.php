<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bysequence extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
		$this->load->helper('text');

	}

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('sequence', 'Sequence', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        $this->data['title'] = 'Search your own sequences';
        $this->data['subtitle'] = 'Search conserved microRNAs targets by introducing your own sequence';

		if ($this->form_validation->run() == FALSE)
		{
            $this->data['main_content'] = 'myform';
		}

       $this->load->view('temp/template_home', $this->data);

	}
         
    function success()
    {
        
        $name  = $this->input->post('name');
		$email = $this->input->post('email');
		$user_country    = $this->input->post('user_country');
		$sequence     = $this->input->post('sequence');
        
        $query = $this->home_model->is_a_conserved_mirna($sequence);
        $result = $query->result();
        
                   
		if ($query->num_rows() > 0 ) {
            
            foreach ($query->result() as $row){
                $this->data['mirna_name'] = $row->name;
                $this->data['table_reference'] = $row->table_reference;
            }
            
            $this->data['main_content'] = 'formsuccess_conserved_mirna';
            $this->load->view('temp/template_home', $this->data);

        }
        else{
			
			$path_pathatch_cluster = PATH_PATMATCH_CLUSTER;
            $job = 'perl ' . PATH_PATMATCH_CLUSTER . '/patmatch_cluster.pl ';
            $params = $sequence . ' "' . $name . '" "' . $email . '" "' . $user_country . '"';
            $exec = $job . $params . ' >> '. LOG_FILE .' 2>&1 & echo $! ';
            
            exec($exec,$op,$retval);
            //~ $this->pid = (int)$op[0];
            

            $this->data['main_content'] = 'formsuccess';

            $this->load->view('temp/template_home', $this->data);
        
        }
        
        
    }

}

		
