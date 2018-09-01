<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
ini_set('memory_limit','-1'); 
ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288');
class Netpricepercent extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_netpricepercent(){

        $customer_number   = $this->security->xss_clean($this->input->post('customer_number'));
        $item_number   = $this->security->xss_clean($this->input->post('item_number')); 
        $netpricepercent   = $this->security->xss_clean($this->input->post('netpricepercent')); 
        $Customer_Net_Price_percent = $this->security->xss_clean($this->input->post('Customer_Net_Price_percent')); 
 

        $data = array(

            'GP_Customer_Number' => $customer_number,
            'Item_Number' => $item_number,
            'Net_Price_Percent' => $netpricepercent,
            'Customer_Net_Price_percent' => $Customer_Net_Price_percent,
            
        );

        $this->db->insert('Net_price_percent',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_netpricepercent(){

        $id = $this->security->xss_clean($this->input->post('id'));
        $customer_number   = $this->security->xss_clean($this->input->post('customer_number'));
        $item_number   = $this->security->xss_clean($this->input->post('item_number')); 
        $netpricepercent   = $this->security->xss_clean($this->input->post('netpricepercent')); 
        $Customer_Net_Price_percent = $this->security->xss_clean($this->input->post('Customer_Net_Price_percent'));
       
        $data = array(

            'GP_Customer_Number' => $customer_number,
            'Item_Number' => $item_number,
            'Net_Price_Percent' => $netpricepercent,
            'Customer_Net_Price_percent' => $Customer_Net_Price_percent,
            
        );
        
        $this->db->where('id', $id);
        $this->db->update('Net_price_percent',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('Net_price_percent');
    }

     public function empty_table(){
        
        $data = $this->db->get('Net_price_percent')->result_array();
        //print_r($data); die();
        foreach($data as $insertArr){
            unset($insertArr['id']);
            $this->db->insert('Net_price_percent_history',$insertArr);
        }
        $this->db->truncate('Net_price_percent');
    }

    public function insert_load_log(){

         $data = array(
                'user_id'  => $this->session->userdata('userid'),
                'user'     => $this->session->userdata('fname'),
                'File_name' => $file_info
                
            );
            $this->db->insert('load_log',$data);
        
    }

    public function import_netpricepercent($data){

        $this->db->insert('Net_price_percent',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Net_price_percent");
    }

    public function fetch_data($inputdata=array()) {

        $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;

        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
            $this->db->or_like("GP_Customer_Number",$inputdata['search_word']);
            $this->db->or_like("Item_Number",$inputdata['search_word']);
            $this->db->or_like("Net_Price_Percent",$inputdata['search_word']);
            $this->db->or_like("Customer_Net_Price_percent",$inputdata['search_word']);

        }
        if($inputdata['customer']!='' && $inputdata['customer']!='0'){
             $this->db->where("GP_Customer_Number",$inputdata['customer']);
        }
        if($inputdata['Item']!='' && $inputdata['Item']!='All'){
             $this->db->where("Item_Number",$inputdata['Item']);
        }

        //$query = $this->db->get("Net_price_percent");
        //echo "<pre>"; var_dump($query); die();
        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("Net_price_percent");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function     fetch_data_for_filters(){

        $this->db->select('Net_price_percent.GP_Customer_Number, Net_price_percent.Item_Number')
                    ->from("Net_price_percent")
                    ->group_by(array('GP_Customer_Number','Item_Number'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_data_for_history_filters(){

        $this->db->select('Net_price_percent_history.GP_Customer_Number, Net_price_percent_history.Item_Number')
                    ->from("Net_price_percent_history")
                    ->group_by(array('GP_Customer_Number','Item_Number'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_History_data($inputdata=array()) {

        
        $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;

       
        if($inputdata['customer']!='' && $inputdata['customer']!='0'){
             $this->db->where("GP_Customer_Number",$inputdata['customer']);
        }
        if($inputdata['Item']!='' && $inputdata['Item']!='All'){
             $this->db->where("Item_Number",$inputdata['Item']);
        }

        //$query = $this->db->get("Net_price_percent");
        //echo "<pre>"; var_dump($query); die();
        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("Net_price_percent_history");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

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
        $query = $this->db->get("Net_price_percent");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function delete_netpricepercent(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Net_price_percent',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);

            $this->db->where('id', $id);
            $this->db->delete('Net_price_percent'); 
        }

        return true;
        
    }

    public function getTotal($inputdata=array()){
            if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
                $this->db->or_like("GP_Customer_Number",$inputdata['search_word']);
                $this->db->or_like("Item_Number",$inputdata['search_word']);
                $this->db->or_like("Net_Price_Percent",$inputdata['search_word']);
                $this->db->or_like("Customer_Net_Price_percent",$inputdata['search_word']);

           }
           if($inputdata['customer']!='' && $inputdata['customer']!='0'){
             $this->db->where("GP_Customer_Number",$inputdata['customer']);
            }
            if($inputdata['Item']!='' && $inputdata['Item']!='All'){
                 $this->db->where("Item_Number",$inputdata['Item']);
            }
            $this->db->from("Net_price_percent");
            return $this->db->count_all_results();
           //echo   $this->db->last_query();die;

     }

    
     public function getHistoryTotal($inputdata=array()){
           
           if($inputdata['customer']!='' && $inputdata['customer']!='0'){
             $this->db->where("GP_Customer_Number",$inputdata['customer']);
            }
            if($inputdata['Item']!='' && $inputdata['Item']!='All'){
                 $this->db->where("Item_Number",$inputdata['Item']);
            }
            $this->db->from("Net_price_percent_history");
            return $this->db->count_all_results();
           //echo   $this->db->last_query();die;

     }

     
}
?>