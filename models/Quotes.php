<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Quotes extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    
    public function get_data(){
        return $this->db->get('Quotes_With_Debits');
    }

    public function get_approveddebits_data(){

        $this->db->select('DT.Consolidated_Name AS Distributor,DT.Country AS Country,DB.branch_code,DB.claim_date,DB.Customer,DB.Authorized_debit_number,DB.quote,DB.invoice,DB.line_number,DB.part_number,DB.ship_date,DB.resale AS resale_price,DB.book_cost,DB.approved_new,DB.quantity,DB.total_credit_due,DB.report_date_adesto,DB.customer_service_approved_rejected_by,DB.customer_service_approved_rejected_date,DB.customer_service_notes,DB.customer_service_reason')
                        ->from("debits AS DB")
                        ->join("distributor_new AS DT","DT.id=DB.Distributor","INNER");

        $this->db->where("status",1);

        return $this->db->get();
        
    }



   

    public function get_rejecteddebits_data(){

        $this->db->select('DT.Consolidated_Name AS Distributor,DT.Country AS Country,DB.branch_code,DB.claim_date,DB.Customer,DB.Authorized_debit_number,DB.quote,DB.invoice,DB.line_number,DB.part_number,DB.ship_date,DB.resale AS resale_price,DB.book_cost,DB.approved_new,DB.quantity,DB.total_credit_due,DB.report_date_adesto,DB.customer_service_approved_rejected_by,DB.customer_service_approved_rejected_date,DB.customer_service_notes,DB.customer_service_reason')
                        ->from("debits AS DB")
                        ->join("distributor_new AS DT","DT.id=DB.Distributor","INNER");
        $this->db->where("status",2);
        return $this->db->get();
    }

    public function get_financiallyprocesseddebits_data(){

        $this->db->select('DT.Consolidated_Name AS Distributor,DT.Country AS Country,DB.branch_code,DB.claim_date,DB.Customer,DB.Authorized_debit_number,DB.quote,DB.invoice,DB.line_number,DB.part_number,DB.ship_date,DB.resale AS resale_price,DB.book_cost,DB.approved_new,DB.quantity,DB.total_credit_due,DB.report_date_adesto,DB.customer_service_approved_rejected_by,DB.customer_service_approved_rejected_date,DB.customer_service_notes,DB.customer_service_reason,DB.sent_to_finance_by,DB.sent_to_finance_date')
                        ->from("debits AS DB")
                        ->join("distributor_new AS DT","DT.id=DB.Distributor","INNER");
        $this->db->where("status",3);
        return $this->db->get();
    }

     public function get_financiallyapproveddebits_data(){

        $this->db->select('DT.Consolidated_Name AS Distributor,DT.Country AS Country,DB.branch_code,DB.claim_date,DB.Customer,DB.Authorized_debit_number,DB.quote,DB.invoice,DB.line_number,DB.part_number,DB.ship_date,DB.resale AS resale_price,DB.book_cost,DB.approved_new,DB.quantity,DB.total_credit_due,DB.report_date_adesto,DB.customer_service_approved_rejected_by,DB.customer_service_approved_rejected_date,DB.customer_service_notes,DB.customer_service_reason,DB.sent_to_finance_by,DB.sent_to_finance_date,DB.finance_approved_rejected_by,DB.finance_approved_rejected_date,DB.finance_notes,DB.finance_reason')
                        ->from("debits AS DB")
                        ->join("distributor_new AS DT","DT.id=DB.Distributor","INNER");
        $this->db->where("status",4);
        return $this->db->get();
    }

     public function get_financiallyrejecteddebits_data(){

        $this->db->select('DT.Consolidated_Name AS Distributor,DT.Country AS Country,DB.branch_code,DB.claim_date,DB.Customer,DB.Authorized_debit_number,DB.quote,DB.invoice,DB.line_number,DB.part_number,DB.ship_date,DB.resale AS resale_price,DB.book_cost,DB.approved_new,DB.quantity,DB.total_credit_due,DB.report_date_adesto,DB.customer_service_approved_rejected_by,DB.customer_service_approved_rejected_date,DB.customer_service_notes,DB.customer_service_reason,DB.sent_to_finance_by,DB.sent_to_finance_date,DB.finance_approved_rejected_by,DB.finance_approved_rejected_date,DB.finance_notes,DB.finance_reason')
                        ->from("debits AS DB")
                        ->join("distributor_new AS DT","DT.id=DB.Distributor","INNER");
        $this->db->where("status",5);
        return $this->db->get();
    }


     public function empty_table(){
        $this->db->truncate('Quotes_With_Debits');
    }

    

    public function import_quotes($data){

        $this->db->insert('Quotes_With_Debits',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Quotes_With_Debits");
    }

     public function fetch_data($inputdata=array()) {
        
        $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
            $this->db->or_like("Customer",$inputdata['search_word']);
                $this->db->or_like("Quote",$inputdata['search_word']);

                $this->db->or_like("Design_Registration_Number",$inputdata['search_word']);
                $this->db->or_like("Quote_Date",$inputdata['search_word']);
                $this->db->or_like("Created_On",$inputdata['search_word']);
                $this->db->or_like("Quote_Expires",$inputdata['search_word']);
                $this->db->or_like("Debit_Valid",$inputdata['search_word']);
                $this->db->or_like("Quote_Type",$inputdata['search_word']);
                $this->db->or_like("Debit_Number",$inputdata['search_word']);
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
                $this->db->or_like("Part_Number",$inputdata['search_word']);
                $this->db->or_like("Material_Status_PLC",$inputdata['search_word']);
                $this->db->or_like("Ordering_Status",$inputdata['search_word']);
                $this->db->or_like("MOQ",$inputdata['search_word']);
                $this->db->or_like("LeadTime",$inputdata['search_word']);

                $this->db->or_like("DBC_Disti_Book_Cost",$inputdata['search_word']);
                $this->db->or_like("Approved_Cost",$inputdata['search_word']);
                $this->db->or_like("Suggested_Resale_Price",$inputdata['search_word']);
                $this->db->or_like("Line_Item_Status",$inputdata['search_word']);
                $this->db->or_like("date_added",$inputdata['search_word']);


        }
        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("Quotes_With_Debits");
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

    public function getTotal($inputdata=array()){
            if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
                $this->db->or_like("Customer",$inputdata['search_word']);
                $this->db->or_like("Quote",$inputdata['search_word']);

                $this->db->or_like("Design_Registration_Number",$inputdata['search_word']);
                $this->db->or_like("Quote_Date",$inputdata['search_word']);
                $this->db->or_like("Created_On",$inputdata['search_word']);
                $this->db->or_like("Quote_Expires",$inputdata['search_word']);
                $this->db->or_like("Debit_Valid",$inputdata['search_word']);
                $this->db->or_like("Quote_Type",$inputdata['search_word']);
                $this->db->or_like("Debit_Number",$inputdata['search_word']);
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
                $this->db->or_like("Part_Number",$inputdata['search_word']);
                $this->db->or_like("Material_Status_PLC",$inputdata['search_word']);
                $this->db->or_like("Ordering_Status",$inputdata['search_word']);
                $this->db->or_like("MOQ",$inputdata['search_word']);
                $this->db->or_like("LeadTime",$inputdata['search_word']);

                $this->db->or_like("DBC_Disti_Book_Cost",$inputdata['search_word']);
                $this->db->or_like("Approved_Cost",$inputdata['search_word']);
                $this->db->or_like("Suggested_Resale_Price",$inputdata['search_word']);
                $this->db->or_like("Line_Item_Status",$inputdata['search_word']);
                $this->db->or_like("date_added",$inputdata['search_word']);

           }
            $this->db->from("Quotes_With_Debits");
            return $this->db->count_all_results();

     }

     public function get_debitvalidationTotal($inputdata=array()){

        

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


            $this->db->from("Debits_Validation");
            //echo "<pre>";print_r($this->db->count_all_results());die;
            return $this->db->count_all_results();

     }


     public function fetch_debitvalidation_data($inputdata=array()) {
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
                    ->from("Debits_Validation");
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

   




public function approve_debit($id) {
        
        
        $updateData = array(
                                    'status'=>1,
                                    'approved_rejected_date' =>date('Y-m-d H:i:s'),
                                    'approved_rejected_by' => $this->session->userdata('fname')
                            );
                $this->db->where('id',$id);

                $query = $this->db->update('debits', $updateData);

                return ($this->db->affected_rows() != 1) ? false : true;
                

    }


    public function reject_debit($id) {
        
        
        $updateData = array(
                                    'status'=>2,
                                    'approved_rejected_date' =>date('Y-m-d H:i:s'),
                                    'approved_rejected_by' => $this->session->userdata('fname')
                            );
                $this->db->where('id',$id);

                $this->db->update('debits', $updateData);
                return ($this->db->affected_rows() != 1) ? false : true;


    }

public function finance_approve_debit($id) {
        
        
        $updateData = array(
                                    'status'=>4,
                                    'finance_approved_rejected_date' =>date('Y-m-d H:i:s'),
                                    'finance_approved_rejected_by' => $this->session->userdata('fname')
                            );
                $this->db->where('id',$id);

                $query = $this->db->update('debits', $updateData);

                return ($this->db->affected_rows() != 1) ? false : true;
                

    }


    public function finance_reject_debit($id) {
        
        
        $updateData = array(
                                    'status'=>5,
                                    'finance_approved_rejected_date' =>date('Y-m-d H:i:s'),
                                    'finance_approved_rejected_by' => $this->session->userdata('fname')
                            );
                $this->db->where('id',$id);

                $this->db->update('debits', $updateData);
                return ($this->db->affected_rows() != 1) ? false : true;


    }
    


     

    public function financiallyprocess_debit($id) {
        
        
        $updateData = array(
                                    'status'=>3,
                                    'sent_to_finance_date' =>date('Y-m-d H:i:s'),
                                    'sent_to_finance_by' => $this->session->userdata('fname')
                            );
                $this->db->where('id',$id);

                $query = $this->db->update('debits', $updateData);

                return ($this->db->affected_rows() != 1) ? false : true;
                

    }

    public function financiallyapprove_debit($id) {
        
        
        $updateData = array(
                                    'status'=>4,
                                    'finance_approved_rejected_date' =>date('Y-m-d H:i:s'),
                                    'finance_approved_rejected_by' => $this->session->userdata('fname')
                            );
                $this->db->where('id',$id);

                $query = $this->db->update('debits', $updateData);

                return ($this->db->affected_rows() != 1) ? false : true;
                

    }

public function financiallyreject_debit($id) {
        
        
        $updateData = array(
                                    'status'=>5,
                                    'finance_approved_rejected_date' =>date('Y-m-d H:i:s'),
                                    'finance_approved_rejected_by' => $this->session->userdata('fname')
                            );
                $this->db->where('id',$id);

                $query = $this->db->update('debits', $updateData);

                return ($this->db->affected_rows() != 1) ? false : true;
                

    }


    public function UpdateDebits($data){
            $id = (isset($data['id']))?$data['id']:0;
            $reason = ($data['reason']!='0')?$data['reason']:'';
            $notes = (isset($data['notes']))?$data['notes']:'';
            //$status = (isset($data['status']))?$data['status']:0;
            $updatedata=array(

            
            'notes' => $notes,
            'reason' =>$reason 
        );


            $this->db->where("id",$id); 
            $this->db->update('debits',$updatedata);
            echo "Reason and Notes has been Updated";die;
    }

    public function UpdateDebits1($data){
            $id = (isset($data['id']))?$data['id']:0;
            $reason = ($data['reason']!='0')?$data['reason']:'';
            $notes = (isset($data['notes']))?$data['notes']:'';
            //$status = (isset($data['status']))?$data['status']:0;
            $updatedata=array(

            
            'finance_notes' => $notes,
            'finance_reason' =>$reason 
        );


            $this->db->where("id",$id); 
            $this->db->update('debits',$updatedata);
            echo "Finance Reason and Notes has been Updated";die;
    }

    public function get_approveddebitsTotal($inputdata=array()){
               //echo "<pre>";print_r($inputdata);die;
        

             $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }
        
         

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }         



       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",1); 

        return $this->db->count_all_results();
 }


     public function fetch_approveddebits_data($inputdata=array()) {
            //echo "<pre>";print_r($inputdata);die;
        
          $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }                

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }        

       $this->db->limit($limit,$offset);
       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",1); 

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

    public function get_rejecteddebitsTotal($inputdata=array()){
               //echo "<pre>";print_r($inputdata);die;
        

             $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }
        
         

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }         



       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",2); 

        return $this->db->count_all_results();
 }


    public function fetch_rejecteddebits_data($inputdata=array()) {
        
       
          $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }                

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }        

       $this->db->limit($limit,$offset);
       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",2); 

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

    public function get_financiallyprocesseddebitsTotal($inputdata=array()){
               //echo "<pre>";print_r($inputdata);die;
        

             $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }
        
         

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }         



       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",3); 

        return $this->db->count_all_results();
 }


    public function fetch_financiallyprocesseddebits_data($inputdata=array()) {
        
       
          $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }                

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }        

       $this->db->limit($limit,$offset);
       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",3); 

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


    public function get_financiallyapproveddebitsTotal($inputdata=array()){
               //echo "<pre>";print_r($inputdata);die;
        

             $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("finance_notes",$inputdata['search_word']);
                $this->db->or_like("finance_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);
                $this->db->or_like("finance_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }
        
         

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }         



       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",4); 

        return $this->db->count_all_results();
 }


    public function fetch_financiallyapproveddebits_data($inputdata=array()) {
        
       
          $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("finance_notes",$inputdata['search_word']);
                $this->db->or_like("finance_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);
                $this->db->or_like("finance_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }                

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }        

       $this->db->limit($limit,$offset);
       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",4); 

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

        public function get_financiallyrejecteddebitsTotal($inputdata=array()){
               //echo "<pre>";print_r($inputdata);die;
        

             $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
                $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("finance_notes",$inputdata['search_word']);
                $this->db->or_like("finance_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);
                $this->db->or_like("finance_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }
        
         

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }         



       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",5); 

        return $this->db->count_all_results();
 }


    public function fetch_financiallyrejecteddebits_data($inputdata=array()) {
        
       
          $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
                $this->db->or_like("DN.Consolidated_Name",$inputdata['search_word']);
                $this->db->or_like("branch_code",$inputdata['search_word']);

                $this->db->or_like("claim_date",$inputdata['search_word']);
                $this->db->or_like("Authorized_debit_number",$inputdata['search_word']);
                $this->db->or_like("quote",$inputdata['search_word']);
                $this->db->or_like("invoice",$inputdata['search_word']);
                $this->db->or_like("line_number",$inputdata['search_word']);
                $this->db->or_like("part_number",$inputdata['search_word']);
                $this->db->or_like("ship_date",$inputdata['search_word']);
                $this->db->or_like("resale",$inputdata['search_word']);
                 $this->db->or_like("book_cost",$inputdata['search_word']);
                $this->db->or_like("approved_new",$inputdata['search_word']);

                $this->db->or_like("quantity",$inputdata['search_word']);
                $this->db->or_like("total_credit_due",$inputdata['search_word']);
                $this->db->or_like("report_date_adesto",$inputdata['search_word']);
               $this->db->or_like("customer_service_notes",$inputdata['search_word']);
                $this->db->or_like("customer_service_reason",$inputdata['search_word']);
                $this->db->or_like("finance_notes",$inputdata['search_word']);
                $this->db->or_like("finance_reason",$inputdata['search_word']);
                $this->db->or_like("customer_service_approved_rejected_by",$inputdata['search_word']);
                $this->db->or_like("finance_approved_rejected_by",$inputdata['search_word']);

        }
       
        if($inputdata['distributor']!='' && $inputdata['distributor']!='0'){
            $this->db->where("DN.id",$inputdata['distributor']);

        }                

        
         if($inputdata['from_date']!='' && $inputdata['to_date']!='' && $inputdata['to_date']!='0' && $inputdata['to_date']!='0'){
            $date_type = array('1'=>'claim_date','2'=>'report_date_adesto','3'=>'ship_date');
            if($inputdata['date_types']!='0'){
            $this->db->where($date_type[$inputdata['date_types']].' >=', date('Y-m-d',strtotime($inputdata['from_date'])));
            $this->db->where($date_type[$inputdata['date_types']].' <=', date('Y-m-d',strtotime($inputdata['to_date'])));
        }

        }        

       $this->db->limit($limit,$offset);
       $this->db->select('DN.Consolidated_Name AS Distributorname,DN.Country AS Country,DT.*')
                        ->from("debits AS DT")
                        ->join("distributor_new AS DN","DN.id=DT.Distributor","INNER");
        $this->db->where("DT.status",5); 

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