<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('validated'))
    	{ 
        	redirect('welcome');
    	}
    	//$this->load->library('pagination');
    	$this->load->model('reportsmodel');
    }
    
    public function top_customers_view(){
    	//$this->reportsmodel->getTopCustomes();
    	$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('posreports');
		$this->load->view('footer');
    }
    public function topcustomer(){
    	$this->reportsmodel->getTopCustomes($this->input->get());
    }

    public function top_items_view(){
    	//$this->reportsmodel->getTopCustomes();
    	$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('topitems');
		$this->load->view('footer');
    }

    public function topItem(){
    	$this->reportsmodel->getTopItems($this->input->get());
    }
  }  	