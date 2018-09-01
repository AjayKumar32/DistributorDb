<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class email extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		$this->load->model('emails');
		$this->load->model('users');
		$this->sectionPriv = $this->users->getSectionPrivByAction($this->router->fetch_method());
	}
	public function	email_processed(){
		$data["results"] = $this->emails->fetch_processed_email_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('emailsprocessed',$data);
		$this->load->view('footer');
		
	}

	public function	email_log(){

		$data["results"] = $this->emails->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('emaillog',$data);
		$this->load->view('footer');
	}

	public function	email_sync(){
 		$this->emails->SyncEmails();
		$data["results"] = $this->emails->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('emaillog',$data);
		$this->load->view('footer');
	}
	
	
}
?>