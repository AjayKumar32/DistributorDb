<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('users');
	}

	public function index($msg = NULL)
	{
		// Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
		$this->load->view('welcome', $data);
	}

	public function validate_user(){
		 // Load the model
        // Validate the user can login
        $result = $this->users->validate();
        // Now we verify the result
        if(!$result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('user');
        }             
	}

	public function lostpassword($msg = NULL){
		// Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
		$this->load->view('lostpassword', $data);
	}

	public function sent_password(){
		$user_data = $this->users->get_user_email_password();
		$msg = null;
		if($user_data==NULL){
			$msg = '<font color=red>Invalid username/email.</font><br />';
		} else {
			$msg = '<font color=green>Password sent to your registered mail id ('.$user_data->email.').</font><br />';
		}
/*
		$mail->SMTPOptions = array(
    	'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    	));
*/
		$config = Array(
    		'protocol' => 'smtp',
    		'smtp_host' => 'ssl://smtp.googlemail.com',
    		'smtp_port' => 465,
    		'smtp_user' => 'ajay498573@gmail.com',
    		'smtp_pass' => 'sugumaajay',
    		'mailtype'  => 'html', 
    		'charset'   => 'iso-8859-1',

    		'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		//$this->email->initialize($config);

		$this->email->set_mailtype("html");

		


		
		$this->email->set_newline("\r\n");

		$this->email->from('ajay498573@gmail.com', 'Adesto');
		$this->email->to($user_data->email);
		$this->email->subject('Password from Adesto Distributor Application');
		$this->email->message('Password: '.$user_data->password);

		$this->email->send();
		$this->lostpassword($msg);
	}
}
