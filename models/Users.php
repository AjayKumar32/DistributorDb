<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Users extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password')); 
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('users');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'userid'    => $row->userid,
                    'fname'     => $row->fname,
                    'lname'     => $row->lname,
                    'email'     => $row->email,
                    'username'  => $row->username,
                    'profile_picture'  => $row->profile_picture,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

    public function get_user_profile(){
        $this->db->where('username', $this->session->userdata('username'));
         // Run the query
        $query = $this->db->get('users');
        return $query->row();
    }


    public function get_user_email_password(){
        
        $this->db->where('username', $this->security->xss_clean($this->input->post('username')));
        $this->db->or_where('email', $this->security->xss_clean($this->input->post('username')));
         // Run the query
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_user_profile(){
        // grab user input
       $profile_imagename = '';
        if(isset($_FILES["profile_picture"]["name"]) && $_FILES["profile_picture"]["name"]!=''){
                $file_info = pathinfo($_FILES["profile_picture"]["name"]);
                $file_directory = FCPATH."assets/build/profile_picture/";
                $new_file_name = 'Profile'.date("d-m-Y") . rand(000000, 999999) .".". $file_info["extension"];
        if(move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $file_directory . $new_file_name))
        {     
                 $profile_imagename =  $new_file_name; 
        }
    }
        $user_fname = $this->security->xss_clean($this->input->post('user_fname'));
        $user_lname = $this->security->xss_clean($this->input->post('user_lname')); 
        $user_email = $this->security->xss_clean($this->input->post('user_email')); 
        //$new_password = $this->security->xss_clean($this->input->post('new_password')); 

        $data = array(
            'fname'    =>  $user_fname,
            'lname'    =>  $user_lname,
            'email'    =>  $user_email
        );
        if($profile_imagename!=''){
            $data['profile_picture'] = $profile_imagename;
        }

        $this->db->where('userid', $this->session->userdata('userid'));

        $result = $this->db->update('users', $data);

        if($result){
            $data = array(
                    'fname'     => $user_fname,
                    'lname'     => $user_lname,
                    'email'     => $user_email      
            );
            if($profile_imagename!=''){
                $data['profile_picture'] = $profile_imagename;
            }
            $this->session->set_userdata($data);
            //echo "<pre>";print_r($data);die;
            return true;
        } else {
            return false;
        }

        
    }

    public function update_user_password(){
        // grab user input
       
        $old_password = $this->security->xss_clean($this->input->post('old_password'));
        $new_password = $this->security->xss_clean($this->input->post('new_password')); 
        $confirm_password = $this->security->xss_clean($this->input->post('confirm_password')); 
        //$new_password = $this->security->xss_clean($this->input->post('new_password')); 
        $this->db->select('*')
                         ->from('users')
                         ->where('password',$old_password)
                         ->where('userid', $this->session->userdata('userid'));
         $query = $this->db->get(); 
         if($query->num_rows()<=0){
            return array('status'=>0,'msg'=>'Old password could not match!');
         }                 

        $data = array(
            'password'    =>  $new_password
            
        );
        
        $this->db->where('userid', $this->session->userdata('userid'));

        $result = $this->db->update('users', $data);
        if($result){
            return array('status'=>1,'msg'=>'Password has been updated sucessfully!');
            } else {
           return array('status'=>0,'msg'=>'Something went wrong. Please try again!');
        }

        
    }

    public function insertFileHeader($headerData,$formData){ //echo "<pre>";print_r($formData);die;
        if(isset($headerData) && !empty($headerData)){
            $system_tye = isset($formData['system_type'])?$formData['system_type']:0;
            $distributor= isset($formData['distributor'])?$formData['distributor']:0;
            $this->db->where('system_type',$system_tye );
            $this->db->where('distributor',$distributor );
            $this->db->delete('temp_file_header'); 
           
           foreach($headerData as $header){
           if($header['header_name']!=''){
            $insertData = array(
                                'system_type'=>$system_tye,
                                'distributor'=>$distributor,
                                'file_header'=>$header['header_name']
                        );
            $this->db->insert('temp_file_header', $insertData); 
         }
        }
       } 
    }

    public function prepareCommonFiltersData($inputData ,$segments=array()){
        $filterData = array();
        //echo "<pre>";print_r(array_values($segments));die;array(0=>controll,1=>acrion)
        $segments = array_values($segments);
        $distributor = (isset($segments[2]) && $segments[2]!='')?$segments[2]:0; 
        $sales_territory = (isset($segments[3]) && $segments[3]!='')?$segments[3]:'All'; 
        $sales_region = (isset($segments[4]) && $segments[4]!='')?$segments[4]:'All'; 
        $sales_year = (isset($segments[5]) && $segments[5]!='')?$segments[5]:0; 
        $sales_month = (isset($segments[6]) && $segments[6]!='')?$segments[6]:0; 
        $sales_quarter = (isset($segments[7]) && $segments[7]!='')?$segments[7]:0; 
        $disti_status = (isset($segments[8]) && $segments[8]!='')?$segments[8]:'All';
        $currency = (isset($segments[9]) && $segments[9]!='')?$segments[9]:'All';
        $currency_date = (isset($segments[10]) && $segments[10]!='')?$segments[10]:'All'; 
        $sales_data = (isset($segments[11]) && $segments[11]!='')?$segments[11]:'All';
        $sales_rep = (isset($segments[12]) && $segments[12]!='')?$segments[12]:'All';
        $sales_person = (isset($segments[13]) && $segments[13]!='')?$segments[13]:'All'; 

        $filterData['distributor'] = (isset($inputData['distributor']) && $inputData['distributor']>0)?$inputData['distributor']:$distributor;
        $filterData['sales_territory'] = (isset($inputData['sales_territory']) && $inputData['sales_territory']!='' && $inputData['sales_territory']!='All')?$inputData['sales_territory']:$sales_territory;
        $filterData['sales_region'] = (isset($inputData['sales_region']) && $inputData['sales_region']!='' && $inputData['sales_region']!='All')?$inputData['sales_region']:$sales_region;
        $filterData['sales_year'] = (isset($inputData['sales_year']) && $inputData['sales_year']>0)?$inputData['sales_year']:$sales_year;
        $filterData['sales_month'] = (isset($inputData['sales_month']) && $inputData['sales_month']>0)?$inputData['sales_month']:$sales_month;
        $filterData['sales_quarter'] = isset($inputData['sales_quarter']) && ($inputData['sales_quarter']>0)?$inputData['sales_quarter']:$sales_quarter;
        $filterData['disti_status'] = isset($inputData['disti_status'])?$inputData['disti_status']:$disti_status;
        $filterData['currency'] = isset($inputData['currency']) && ($inputData['currency']!='')?$inputData['currency']:$currency;
        $filterData['currency_date'] = isset($inputData['currency_date']) && ($inputData['currency_date']!='')?$inputData['currency_date']:$currency_date;
        $filterData['sales_data'] = isset($inputData['commission_data_filter']) && ($inputData['commission_data_filter']!='')?$inputData['commission_data_filter']:$sales_data;
        $filterData['sales_rep'] = isset($inputData['sales_rep']) && ($inputData['sales_rep']!='')?$inputData['sales_rep']:$sales_rep;
        $filterData['sales_person'] = isset($inputData['sales_person']) && ($inputData['sales_person']!='')?$inputData['sales_person']:$sales_person;

        return $filterData;

    }

    public function getPagination($total_rows,$class,$method,$filterdata,$segments=array()){
        $this->load->library('pagination');        
        $config = array();
        $config['per_page'] = 100;
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url() . $class.'/'.$method;
        foreach($filterdata as $filtervalue){
            $config['base_url'] .= '/'.$filtervalue;
        }
        $choice = $config["total_rows"] / $config["per_page"];

        $this->pagination->initialize($config); 
        $links = $this->pagination->create_links();
        //print_r(end($segments));die;
        $segments = array_values($segments);
        $offset = (isset($segments[14]) && $segments[14]>0)?$segments[14]:0;

        $startRecord    = $offset+1;
        $endRecord      = $offset+$config["per_page"];
        $endRecords     = ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
        //$data['offset']   = $startRecord-1 ;  
        $paging = "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$links.' of '.ceil($choice)." pages";
        return array('pagination'=>$paging,'offset'=>$offset,'Limit'=>$config['per_page']); 

    }

    public function getSectionPrivByAction($methodname){
        //print_r($this->session->userdata('userid'));die;
        $user_id = $this->session->userdata('userid');
        $this->db->select('MP.*')
                        ->from("Modules AS M")
                        ->join("Modules AS MP","MP.parent_id=M.module_id","INNER")
                        ->join("User_Privilege AS UP","UP.module_id=MP.module_id","INNER")
                        ->where("UP.user_id",$user_id)
                        ->where("M.method_name",$methodname);
        $query = $this->db->get();
        
        $privillages = $query->result_array();
        //echo "<pre>";print_r($privillages);die;
        $section_privillage = array();
        foreach($privillages as $privillage){
            $section_privillage[$privillage['level_id']][] = $privillage;
        }
       //echo "<pre>";print_r($section_privillage);die;
        return $section_privillage;
    }
}
?>