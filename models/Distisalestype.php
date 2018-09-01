<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Distisalestype extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_distisalestype(){

        $distributor   = $this->security->xss_clean($this->input->post('distributor')); 
        $item = $this->security->xss_clean($this->input->post('item')); 
        $sale_type = $this->security->xss_clean($this->input->post('saletype'));

        $data = array(

            'distributor' => ($distributor!='')?$distributor:'',
            'item' => ($item!='')?$item:'',
            'sale_type' => ($sale_type!='')?$sale_type:''
        
        );
        //print_r($data);die();
        $this->db->insert('disti_sales_type',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

   

    public function update_distisalestype(){

        $id   = $this->security->xss_clean($this->input->post('id'));
        $distributor   = $this->security->xss_clean($this->input->post('distributor')); 
        $item = $this->security->xss_clean($this->input->post('item')); 
        $sale_type = $this->security->xss_clean($this->input->post('saletype'));

        $data = array(

            'distributor' => ($distributor!='')?$distributor:'',
            'item' => ($item!='')?$item:'',
            'sale_type' => ($sale_type!='')?$sale_type:''
        
        );

        $this->db->where('id', $id);
        $this->db->update('disti_sales_type',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

   

    public function get_data(){
        return $this->db->get('disti_sales_type');
    }

     public function empty_table(){
        $this->db->truncate('disti_sales_type');
    }

    

     public function record_count() {
        return $this->db->count_all("disti_sales_type");
    }

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("disti_sales_type");
        //var_dump($query); die();
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
        $query = $this->db->get("disti_sales_type");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //echo "<pre>";print_r($data);die();
        return $data;
    }
    return false;
    }

    


    public function delete_distisalestype(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'disti_sales_type',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('disti_sales_type'); 
        }

        return true;
        
    }

    public function getTotal($inputdata=array()){

        

            if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("disti",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Customer",$inputdata['search_word']);
                $this->db->or_like("Customer_from_quote",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("Part_number_from_quote",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                $this->db->or_like("Suggested_Resale_Price",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("DBC_Disti_Book_Cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);
                $this->db->or_like("Approved_Cost",$inputdata['search_word']);

                 $this->db->or_like("Quantity_from_quote",$inputdata['search_word']);
                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("MOQ",$inputdata['search_word']);
                $this->db->or_like("Design_Registration_Number",$inputdata['search_word']);
                $this->db->or_like("Quote_Date",$inputdata['search_word']);
                $this->db->or_like("Created_On",$inputdata['search_word']);
                $this->db->or_like("Quote_Expires",$inputdata['search_word']);
                $this->db->or_like("Debit_Valid",$inputdata['search_word']);
                 $this->db->or_like("Debit_Expires",$inputdata['search_word']);
                $this->db->or_like("Quote_Type",$inputdata['search_word']);
                $this->db->or_like("Rep_Contact",$inputdata['search_word']);
                $this->db->or_like("Currency",$inputdata['search_word']);

                   $this->db->or_like("Contract_Manufacturer",$inputdata['search_word']);
                $this->db->or_like("Note_to_Recipient",$inputdata['search_word']);
                $this->db->or_like("Quote_To",$inputdata['search_word']);
                $this->db->or_like("Contact_Name",$inputdata['search_word']);
                $this->db->or_like("Address",$inputdata['search_word']);
                $this->db->or_like("City",$inputdata['search_word']);
                $this->db->or_like("State",$inputdata['search_word']);
                

                $this->db->or_like("Country",$inputdata['search_word']);
                $this->db->or_like("Zip",$inputdata['search_word']);
                $this->db->or_like("Phone",$inputdata['search_word']);
                $this->db->or_like("Fax",$inputdata['search_word']);
                $this->db->or_like("Email",$inputdata['search_word']);
                $this->db->or_like("Material_Status_PLC",$inputdata['search_word']);
                $this->db->or_like("Ordering_Status",$inputdata['search_word']);
                $this->db->or_like("LeadTime",$inputdata['search_word']);

                $this->db->or_like("Line_Item_Status",$inputdata['search_word']);


        }
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("distributor_new_id",$inputdata['distributor']);

        }
        
         if($inputdata['claim_status']!='' && $inputdata['claim_status']!='0'){
            $this->db->where("status",$inputdata['claim_status']);

        }else{
            $this->db->where("status",'0');
        }

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }


            $this->db->from("disti_sales_type");
            //echo "<pre>";print_r($this->db->count_all_results());die;
            return $this->db->count_all_results();

     }


     public function fetch_datas($inputdata=array()) {
            //echo "<pre>";print_r($inputdata);die;
        
        
        $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("disti",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Customer",$inputdata['search_word']);
                $this->db->or_like("Customer_from_quote",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("Part_number_from_quote",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                $this->db->or_like("Suggested_Resale_Price",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("DBC_Disti_Book_Cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);
                $this->db->or_like("Approved_Cost",$inputdata['search_word']);

                 $this->db->or_like("Quantity_from_quote",$inputdata['search_word']);
                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("MOQ",$inputdata['search_word']);
                $this->db->or_like("Design_Registration_Number",$inputdata['search_word']);
                $this->db->or_like("Quote_Date",$inputdata['search_word']);
                $this->db->or_like("Created_On",$inputdata['search_word']);
                $this->db->or_like("Quote_Expires",$inputdata['search_word']);
                $this->db->or_like("Debit_Valid",$inputdata['search_word']);
                 $this->db->or_like("Debit_Expires",$inputdata['search_word']);
                $this->db->or_like("Quote_Type",$inputdata['search_word']);
                $this->db->or_like("Rep_Contact",$inputdata['search_word']);
                $this->db->or_like("Currency",$inputdata['search_word']);

                   $this->db->or_like("Contract_Manufacturer",$inputdata['search_word']);
                $this->db->or_like("Note_to_Recipient",$inputdata['search_word']);
                $this->db->or_like("Quote_To",$inputdata['search_word']);
                $this->db->or_like("Contact_Name",$inputdata['search_word']);
                $this->db->or_like("Address",$inputdata['search_word']);
                $this->db->or_like("City",$inputdata['search_word']);
                $this->db->or_like("State",$inputdata['search_word']);
                

                $this->db->or_like("Country",$inputdata['search_word']);
                $this->db->or_like("Zip",$inputdata['search_word']);
                $this->db->or_like("Phone",$inputdata['search_word']);
                $this->db->or_like("Fax",$inputdata['search_word']);
                $this->db->or_like("Email",$inputdata['search_word']);
                $this->db->or_like("Material_Status_PLC",$inputdata['search_word']);
                $this->db->or_like("Ordering_Status",$inputdata['search_word']);
                $this->db->or_like("LeadTime",$inputdata['search_word']);

                $this->db->or_like("Line_Item_Status",$inputdata['search_word']);


        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("distributor_new_id",$inputdata['distributor']);

        }
        
         if($inputdata['claim_status']!='' && $inputdata['claim_status']!='0'){
            $this->db->where("status",$inputdata['claim_status']);

        }else{
            $this->db->where("status",'0');
        }

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }

         



        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("disti_sales_type");
        //$this->db->where("id",0);
        //$this->db->where("id",2);
        $query = $this->db->get();
        //print_r($this->db->last_query());die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

   



   

    
}
?>