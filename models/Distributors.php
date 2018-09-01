<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Distributors extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_distributor(){

        $Distributor   = $this->security->xss_clean($this->input->post('distributor_name'));
        $Cust_Class   = $this->security->xss_clean($this->input->post('Cust_Class')); 
        //$GP_Customer_Name   = $this->security->xss_clean($this->input->post('gp_cust_name')); 
        //$GP_Cust_Class = $this->security->xss_clean($this->input->post('gp_cust_class')); 

        $Sales_Area   = $this->security->xss_clean($this->input->post('Sales_Area'));
        $Sales_Territory   = $this->security->xss_clean($this->input->post('Sales_Territory')); 
        //$GP_Add_Code   = $this->security->xss_clean($this->input->post('gp_add_code')); 
        $Country = $this->security->xss_clean($this->input->post('Country')); 

        //$CRM_Old_Name   = $this->security->xss_clean($this->input->post('crm_old_name'));
        //$CRM_Name   = $this->security->xss_clean($this->input->post('crm_name')); 
        $Consolidated_Name   = $this->security->xss_clean($this->input->post('Consolidated_Name')); 
        $Active = $this->security->xss_clean($this->input->post('active')); 

        $POS_Report   = $this->security->xss_clean($this->input->post('pos_report'));
        $Cust_Price_Type   = $this->security->xss_clean($this->input->post('Cust_Price_Type')); 
        
        $POS_Curr = $this->security->xss_clean($this->input->post('POS_Curr')); 
        $Calendar   = $this->security->xss_clean($this->input->post('Calendar'));
        $GP_Cust_Num   = $this->security->xss_clean($this->input->post('GP_Cust_Num')); 


        $data = array(

            'Distributor' => ($Distributor!='')?$Distributor:'',
            //'GP_Cust_Num' => ($GP_Cust_Num!='')?$GP_Cust_Num:'',
            //'GP_Customer_Name' => ($GP_Customer_Name!='')?$GP_Customer_Name:'',
            'Cust_Class' => ($Cust_Class!='')?$Cust_Class:'',
            'Sales_Area' => ($Sales_Area!='')?$Sales_Area:'',
            'Sales_Territory' => ($Sales_Territory!='')?$Sales_Territory:'',
            'Country' => ($Country!='')?$Country:'',
            //'GP_Country' => ($GP_Country!='')?$GP_Country:'',
            //'CRM_Old_Name' => ($CRM_Old_Name!='')?$CRM_Old_Name:'',
            //'CRM_Name' => ($CRM_Name!='')?$CRM_Name:'',
            'Consolidated_Name' => ($Consolidated_Name!='')?$Consolidated_Name:'',
            'Active' => ($Active!='')?$Active:'',
            'POS_Report' => ($POS_Report!='')?$POS_Report:'',
            'Cust_Price_Type' => ($Cust_Price_Type!='')?$Cust_Price_Type:'',
            'POS_Curr' => ($POS_Curr!='')?$POS_Curr:'',
            'Calendar' => ($Calendar!='')?$Calendar:'',
            'GP_Cust_Num' => ($GP_Cust_Num!='')?$GP_Cust_Num:''
            
        );

        $this->db->insert('distributor_new',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_distributor(){

        $id = $this->security->xss_clean($this->input->post('id'));
        $Distributor   = $this->security->xss_clean($this->input->post('distributor_name'));
        $Cust_Class   = $this->security->xss_clean($this->input->post('Cust_Class')); 
        //$GP_Customer_Name   = $this->security->xss_clean($this->input->post('gp_cust_name')); 
        //$GP_Cust_Class = $this->security->xss_clean($this->input->post('gp_cust_class')); 

        $Sales_Area   = $this->security->xss_clean($this->input->post('Sales_Area'));
        $Sales_Territory   = $this->security->xss_clean($this->input->post('Sales_Territory')); 
        //$GP_Add_Code   = $this->security->xss_clean($this->input->post('gp_add_code')); 
        $Country = $this->security->xss_clean($this->input->post('Country')); 

        //$CRM_Old_Name   = $this->security->xss_clean($this->input->post('crm_old_name'));
        //$CRM_Name   = $this->security->xss_clean($this->input->post('crm_name')); 
        $Consolidated_Name   = $this->security->xss_clean($this->input->post('Consolidated_Name')); 
        $Active = $this->security->xss_clean($this->input->post('active')); 

        $POS_Report   = $this->security->xss_clean($this->input->post('pos_report'));
        $Cust_Price_Type   = $this->security->xss_clean($this->input->post('Cust_Price_Type')); 
        
        $POS_Curr = $this->security->xss_clean($this->input->post('POS_Curr')); 
        $Calendar   = $this->security->xss_clean($this->input->post('Calendar'));
        $GP_Cust_Num   = $this->security->xss_clean($this->input->post('GP_Cust_Num'));  

        $data = array(

            'Distributor' => ($Distributor!='')?$Distributor:'',
            //'GP_Cust_Num' => ($GP_Cust_Num!='')?$GP_Cust_Num:'',
            //'GP_Customer_Name' => ($GP_Customer_Name!='')?$GP_Customer_Name:'',
            'Cust_Class' => ($Cust_Class!='')?$Cust_Class:'',
            'Sales_Area' => ($Sales_Area!='')?$Sales_Area:'',
            'Sales_Territory' => ($Sales_Territory!='')?$Sales_Territory:'',
            'Country' => ($Country!='')?$Country:'',
            //'GP_Country' => ($GP_Country!='')?$GP_Country:'',
            //'CRM_Old_Name' => ($CRM_Old_Name!='')?$CRM_Old_Name:'',
            //'CRM_Name' => ($CRM_Name!='')?$CRM_Name:'',
            'Consolidated_Name' => ($Consolidated_Name!='')?$Consolidated_Name:'',
            'Active' => ($Active!='')?$Active:'',
            'POS_Report' => ($POS_Report!='')?$POS_Report:'',
            'Cust_Price_Type' => ($Cust_Price_Type!='')?$Cust_Price_Type:'',
            'POS_Curr' => ($POS_Curr!='')?$POS_Curr:'',
            'Calendar' => ($Calendar!='')?$Calendar:'',
            'GP_Cust_Num' => ($GP_Cust_Num!='')?$GP_Cust_Num:''
        );
        
        $this->db->where('id', $id);
        $this->db->update('distributor_new',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('distributor_new');
    }

     public function empty_table(){
        $this->db->truncate('distributor_new');
    }

    public function insert_load_log(){

         $data = array(
                'user_id'  => $this->session->userdata('userid'),
                'user'     => $this->session->userdata('fname'),
                'File_name' => $file_info
                
            );
            $this->db->insert('load_log',$data);
        
    }

    public function import_distributors($data){

        $this->db->insert('distributor_new',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("distributor_new");
    }

    public function fetch_data($filter=array()) {
       

       
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("distributor_new.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("distributor_new.Sales_Area",trim($filter['sales_region']));
         }
         
         if(isset($filter['disti_status']) && $filter['disti_status']!='' && $filter['disti_status']!='All'){            
            $this->db->where("distributor_new.Active",$filter['disti_status']); 
        
         }

         $query = $this->db->get("distributor_new");
        // print_r($this->db->last_query()) ;die;             
         //$query = $this->db->get();//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //print_r($data);die;
        /*
        $query = $this->db->get("POS");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        */

        return $data;
    }
    return false;
    }

    public function fetch_deleted_data() {
        $query = $this->db->get("delete_log");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_loaded_files() {
        $query = $this->db->get("load_log");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("distributor_new");
        //$row = $query->row_array();print_r($row['Consolidated_Name']);die();
        //print_r($query->result());die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //print_r($data[0] );die();

        return $data;
    }
    return false;
    }

    public function fetch_mapping_data() {
        $this->db->select('MAX(UT.created_date) AS created_date,MAX(UT.modify_date) AS modify_date,DT.Consolidated_Name AS Distributor,FT.file_name AS File_Name,UT.system_type,UT.distributor')
                        ->from("upload_template AS UT")
                        ->join("distributor_new AS DT","DT.id=UT.distributor","INNER")
                        ->join("file_type_to_file_name AS FT","FT.file_type=UT.system_type","INNER")
                        ->group_by(array('FT.file_name','DT.Consolidated_Name','UT.system_type','UT.distributor'));

        $query = $this->db->get();
       
        //echo '<pre>';print_r($query->result_array());
        return $query->result_array() ;
    }
   

    public function delete_distributor(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'distributor_new',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);

            $this->db->where('id', $id);
            $this->db->delete('distributor_new'); 
        }

        return true;
        
    }
}
?>