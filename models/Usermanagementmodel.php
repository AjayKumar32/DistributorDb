<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Usermanagementmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function add_module(){

        $module_name   = $this->security->xss_clean($this->input->post('module_name')); 
        $parent_id = $this->security->xss_clean($this->input->post('parent_id')); 
        $level_id = $this->security->xss_clean($this->input->post('level_id'));
        $controller_name   = $this->security->xss_clean($this->input->post('controller_name')); 
        $method_name = $this->security->xss_clean($this->input->post('method_name')); 
        //$status = $this->security->xss_clean($this->input->post('status'));
        $icon = $this->security->xss_clean($this->input->post('icon')); 
        $sort = $this->security->xss_clean($this->input->post('sort'));

        $data = array(

            'module_name' => ($module_name!='')?$module_name:'',
            'parent_id' => ($parent_id!='')?$parent_id:'',
            'level_id' => ($level_id!='')?$level_id:'',
             'controller_name' => ($controller_name!='')?$controller_name:'',
            'method_name' => ($method_name!='')?$method_name:'',
            //'status' => ($status!='')?$status:'',
            'icon' => ($icon!='')?$icon:'',
            'sort' => ($sort!='')?$sort:''
        
        );
        //print_r($data);die();
        $this->db->insert('Modules',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_users(){

    $query = $this->db->get('users');
    //echo "<pre>";print_r($query->result()); die();
    return $query->result();

    }

    public function get_modules(){

     $this->db->select('M.module_name as parent_module,MD.controller_name,MD.method_name,MD.module_name as child_module,MD.module_id')
                        ->from("Modules AS M")
                        ->join("Modules AS MD","M.module_id=MD.parent_id","LEFT")
                        ->where("MD.parent_id>0")
                        ->order_by("MD.module_id");
    $query = $this->db->get();
    //echo "<pre>";print_r($query->result()); die();
    return $query->result();

    }

    public function getParentWiseModule($parent_id=0,$level_id=1){
    	$this->db->select('*')
                        ->from("Modules AS M")
                        ->where("parent_id",$parent_id)
                        ->where("level_id",$level_id);
	    $query = $this->db->get();
	    //echo "<pre>";print_r($query->result()); die();
	    return $query->result();

    }

    public function get_user_privilege($id){

	    $parent_modules =  $this->getParentWiseModule();
	    $users_modules =  $this->getUserAllPriv($id);
	    $output = '<ul style="list-style: none;">';
	    foreach($parent_modules as $parent_module){
	    	$onclick = 'onclick="$.ShowModule('.$parent_module->module_id.')"';

	    	$checked = in_array($parent_module->module_id,$users_modules)?'checked="checked"':'';
	    	$output .= '<li><input type="checkbox" name="module[]" id="module'.$parent_module->module_id.'" value="'.$parent_module->module_id.'" '.$onclick.' '.$checked.' />&nbsp;&nbsp;'.$parent_module->module_name;
	    	//Child Module
	    	$chiled_modules =  $this->getParentWiseModule($parent_module->module_id,2);
	    	$style = ($checked!='')?'':'style="display:none"';
	    	$output .= '<div id="sub'.$parent_module->module_id.'" '.$style.'>';
	    	$output .= '<ul>';
	    	 foreach($chiled_modules as $chiled_module){
	    	 	$check_child = in_array($chiled_module->module_id,$users_modules)?'checked="checked"':'';
	    	 	$onclicksubmodule = 'onclick="$.ShowModule('.$chiled_module->module_id.')"';
	    	 	$output .= '<li>';
				$output .= '<input type="checkbox" name="'.$parent_module->module_id.'[]" id="module'.$chiled_module->module_id.'" value="'.$chiled_module->module_id.'" '.$check_child.' '.$onclicksubmodule.' />&nbsp;&nbsp;'.$chiled_module->module_name.'&nbsp;&nbsp;';
			   //Section Modules 
	    		$section_modules =  $this->getParentWiseModule($chiled_module->module_id,3);
	    		$section_right =  $this->getParentWiseModule($chiled_module->module_id,4);
	    		if(!empty($section_right)){
	    			$section_modules = array_merge($section_right,$section_modules);
	    		}
	    		if(!empty($section_modules)){	
		    		$section_style = ($check_child!='')?'':'style="display:none"';
		    		
		    		$output .= '<div id="sub'.$chiled_module->module_id.'" '.$section_style.'>';
		    		$output .= '<ul>';
		    	 foreach($section_modules as $section_module){
		    	 	$check_sec = in_array($section_module->module_id,$users_modules)?'checked="checked"':'';
		    	 	$output .= '<input type="checkbox" name="'.$chiled_module->module_id.'[]" id="'.$section_module->module_id.'" value="'.$section_module->module_id.'" '.$check_sec.' />&nbsp;&nbsp;'.$section_module->module_name.'&nbsp;&nbsp;';
		    	  }	
		    	 $output .= '<ul></div>';
		    		//Section Ends Here
		    	}



				$output .= '</li>';
	    	 }
	    	 $output .= '</ul>';
	    	 $output .= '</div>';

	    }
	    $output .= '</ul>';

	    return $output;
    }

    public function fetch_data(){
    	$this->db->where_in('level_id',array(1,2));
    	$query =$this->db->get("Modules");
    	//echo"<pre>";print_r($query->result_array());die;
    	return $query->result_array();
    }

    public function fetch_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("Modules");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //echo "<pre>";print_r($data);die();
        return $data;
    }
    return false;
    }

    public function delete_module(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Modules',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Modules'); 
        }

        return true;
        
    }

    public function saveprivileges($privileges=array()){
    	$modules=array();
    	foreach ($privileges['module'] as $parent_module) {
    		$modules[] = $parent_module;
    		if(isset($privileges[$parent_module])){
    		foreach ($privileges[$parent_module] as $child) {
    			$modules[] = $child;
    				//for third level
	    			if(isset($privileges[$child])){
			    		foreach ($privileges[$child] as $section) {
			    			$modules[] = $section;
			    		}
			    	}
    			}
    		}	
    	}
    	//echo "<pre>";print_r($modules);die;
    	$user_id=$privileges['user_id'];

    	$this->db->where('user_id',$user_id);
    	$this->db->delete('User_Privilege');

    	foreach($modules as $module){
    	$data=[
    		'user_id'=>$user_id,
    		'module_id'=>$module

    	];

    	$this->db->insert('User_Privilege',$data);
    }
    	return true;
    }

    public function getUserAllPriv($user_id){
    	$this->db->select('*')
    				  ->from('User_Privilege')
    				  ->where("user_id",$user_id);	
       $query = $this->db->get();
       $results = $query->result_array();
       return array_column($results, 'module_id');
    }

 }

 ?>