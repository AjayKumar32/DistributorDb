<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usermanagement extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		$this->load->model('Usermanagementmodel');
		$this->load->model('users');
		$this->sectionPriv = $this->users->getSectionPrivByAction($this->router->fetch_method());
	}
	public function user_list(){

		$data['results'] = $this->Usermanagementmodel->get_users();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('users',$data);
		$this->load->view('footer');
	
	}

		public function module_list(){

		$data['results'] = $this->Usermanagementmodel->get_modules();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('modules',$data);
		$this->load->view('footer');
	
	}

	public function edit_userprivilege($id,$msg=null){

		$data['results'] = $this->Usermanagementmodel->get_user_privilege($id);
		$data['user_id']=$id;
		$data['msg']=$msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('edituserprivilege',$data);
		$this->load->view('footer');
	
	}

	public function add_module_view($msg=null){

		$modules=$this->Usermanagementmodel->fetch_data();
		$module_names_list=array('0'=>'Select Module');
		$level_id_list=array('1'=>'Main Module','2'=>'Sub Module','3'=>'Top Section','4'=>'Right Section');
		foreach($modules as $key => $value){
			$module_names_list[$value['module_id']]=$value['module_name'];
			//$level_id_list[$value['level_id']]=$value['level_id'];
		}
		//echo"<pre>";print_r($module_names_list);die();
		$data['module_names_list']=$module_names_list;
		$data['level_id_list']=$level_id_list;

		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addmodule',$data);
		$this->load->view('footer');
	

	}

	public function add_module(){

		$result = $this->Usermanagementmodel->add_module();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Module details not added.</font><br />';
        else $msg = '<font color=green> Module details added.</font><br />';
        $this->add_module_view($msg);
	}

	public function edit_module_view($id){

		$data['msg'] = $msg;
		$data["results"] = $this->Usermanagementmodel->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editmodule', $data);
		$this->load->view('footer');
	}

	public function delete_module(){
		if($this->Usermanagementmodel->delete_module()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function save_userprivilege(){
		//echo "<pre>";print_r($this->input->post());die;
		$id=$this->input->post('user_id');
		$privileges = $this->input->post();
		if($this->Usermanagementmodel->saveprivileges($privileges)){
			$msg="User Privileges saved successfully";
		}else{
			$msg="User Privileges did not save";
		}

		$this->edit_userprivilege($id,$msg);




}
}
?>