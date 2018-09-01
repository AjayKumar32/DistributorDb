<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Debittransactions extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->model('ajaxmodel');
    }
    
    public function add_debittransactions(){

        $Distributor   = $this->security->xss_clean($this->input->post('distributor'));

        
        $Report_Date   = $this->security->xss_clean($this->input->post('report_date'));
        $sales_territory   = $this->security->xss_clean($this->input->post('sales_territory'));
        $sales_region   = $this->security->xss_clean($this->input->post('sales_region'));
        $Load_date   = $this->security->xss_clean($this->input->post('date_added'));

        $branchCode   = $this->security->xss_clean($this->input->post('branch_code'));
        $claimDate   = $this->security->xss_clean($this->input->post('claim_date')); 
        $Customer   = $this->security->xss_clean($this->input->post('customer'));
        $authorizedDebitNumber   = $this->security->xss_clean($this->input->post('authorized_debit_number'));
        $quote   = $this->security->xss_clean($this->input->post('quote'));

        $invoice   = $this->security->xss_clean($this->input->post('invoice'));
        $lineNumber   = $this->security->xss_clean($this->input->post('line_number'));
        $partNumber   = $this->security->xss_clean($this->input->post('part_number'));

        $shipDate   = $this->security->xss_clean($this->input->post('ship_date'));
        $resale   = $this->security->xss_clean($this->input->post('resale')); 
        $bookCost   = $this->security->xss_clean($this->input->post('book_cost'));
        $approvedNew   = $this->security->xss_clean($this->input->post('approved_new'));
        $quantity   = $this->security->xss_clean($this->input->post('quantity'));
        $totalCreditDue   = $this->security->xss_clean($this->input->post('total_credit_due'));
        
        

        $data = array(

            'Distributor' => ($Distributor!='')?$Distributor:'',
            'report_date_adesto' => ($Report_Date!='')?$Report_Date:date('Y-m-d'),
            'sales_territory' => ($sales_territory!='')?$sales_territory:'',
            'sales_region' => ($sales_region!='')?$sales_region:'',
            'Load_date' => ($Load_date!='')?$Load_date:date('Y-m-d'),

             'branch_code' => ($branchCode!='')?$branchCode:'',
            'claim_date' => ($claimDate!='')?$claimDate:'',
            'Customer' => ($Customer!='')?$Customer:'',

            'Authorized_debit_number' => ($authorizedDebitNumber!='')?$authorizedDebitNumber:'',
            'quote' => ($quote!='')?$quote:'',
            'invoice' => ($invoice!='')?$invoice:'',
            'line_number' => ($lineNumber!='')?$lineNumber:'',
            'part_number' => ($partNumber!='')?$partNumber:'',

             'ship_date' => ($shipDate!='')?$shipDate:'',
            'resale' => ($resale!='')?$resale:'',
            'book_cost' => ($bookCost!='')?$bookCost:'',
            'approved_new' => ($approvedNew!='')?$approvedNew:'',
            'quantity' => ($quantity!='')?$quantity:'',
            'total_credit_due' => ($totalCreditDue!='')?$totalCreditDue:''

            
           
        );

        $this->db->insert('debits',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_debittransactions(){

        $id   = $this->security->xss_clean($this->input->post('id'));

        $Distributor   = $this->security->xss_clean($this->input->post('distributor'));
        $Report_Date   = $this->security->xss_clean($this->input->post('report_date'));
        $sales_territory   = $this->security->xss_clean($this->input->post('sales_territory'));
        $sales_region   = $this->security->xss_clean($this->input->post('sales_region'));
        $Load_date   = $this->security->xss_clean($this->input->post('date_added'));

        $branchCode   = $this->security->xss_clean($this->input->post('branch_code'));
        $claimDate   = $this->security->xss_clean($this->input->post('claim_date')); 
        $Customer   = $this->security->xss_clean($this->input->post('customer'));

        $authorizedDebitNumber   = $this->security->xss_clean($this->input->post('authorized_debit_number'));
        $quote   = $this->security->xss_clean($this->input->post('quote'));

        $invoice   = $this->security->xss_clean($this->input->post('invoice'));
        $lineNumber   = $this->security->xss_clean($this->input->post('line_number'));
        $part_number   = $this->security->xss_clean($this->input->post('part_number'));

        $shipDate   = $this->security->xss_clean($this->input->post('ship_date'));
        $resale   = $this->security->xss_clean($this->input->post('resale')); 
        $bookCost   = $this->security->xss_clean($this->input->post('book_cost'));
        $approvedNew   = $this->security->xss_clean($this->input->post('approved_new'));
        $quantity   = $this->security->xss_clean($this->input->post('quantity'));
        $totalCreditDue   = $this->security->xss_clean($this->input->post('total_credit_due'));
        
        
        

        $data = array(

            'Distributor' => ($Distributor!='')?$Distributor:'',
            'report_date_adesto' => ($Report_Date!='')?$Report_Date:date('Y-m-d'),
            'sales_territory' => ($sales_territory!='')?$sales_territory:'',
            'sales_region' => ($sales_region!='')?$sales_region:'',
            'Load_date' => ($Load_date!='')?$Load_date:date('Y-m-d'),

            'branch_code' => ($branchCode!='')?$branchCode:'',
            'claim_date' => ($claimDate!='')?$claimDate:'',
            'Customer' => ($Customer!='')?$Customer:'',

            'Authorized_debit_number' => ($authorizedDebitNumber!='')?$authorizedDebitNumber:'',
            'quote' => ($quote!='')?$quote:'',

            'invoice' => ($invoice!='')?$invoice:'',
            'line_number' => ($lineNumber!='')?$lineNumber:'',
            'part_number' => ($partNumber!='')?$partNumber:'',

             'ship_date' => ($shipDate!='')?$shipDate:'',
            'resale' => ($resale!='')?$resale:'',
            'book_cost' => ($bookCost!='')?$bookCost:'',
            'approved_new' => ($approvedNew!='')?$approvedNew:'',
            'quantity' => ($quantity!='')?$quantity:'',
            'total_credit_due' => ($totalCreditDue!='')?$totalCreditDue:''
            
           
        );
        $this->db->where('id', $id);

        $this->db->update('debits',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('debits');
    }

     public function empty_table(){
        $this->db->truncate('debits');
    }

    public function insert_load_log($file_info,$DISTRIBUTOR,$report_date_adesto){

        $this->db->where('id', $DISTRIBUTOR);
        $query = $this->db->get("distributor_new");
        $row = $query->row_array();
        $distributor = $row['Consolidated_Name'];

        $data = array(
                'user_id'  => $this->session->userdata('userid'),
                'user'     => $this->session->userdata('fname'),
                'File_name' => json_encode($file_info),
                'date_uploaded'=>date('Y-m-d H:i:s'),
                'report_date_adesto'=>$report_date_adesto,
                'distributor'=>$distributor

                
            );
            $this->db->insert('debits_load_log',$data);

    }

    public function import_debittransactions($data){
    if($this->ajaxmodel->validateImport(3,$data)){
        $this->db->insert('debits_load',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }else{
        return false;
    }
    }

    public function record_count() {
        return $this->db->count_all("debits");
    }

     public function get_total($filter=array()) {
        //$this->db->limit($limit, $start*$limit);
        $this->db->select('DTS.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("debits AS DTS")
                        ->join("distributor_new AS DT","DT.id=DTS.Distributor","INNER");
       
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("DTS.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("DTS.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(DTS.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,DTS.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,DTS.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='' && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }              
        return $this->db->count_all_results();
    }

    public function fetch_data($filter=array()) {
        //$this->db->limit($limit, $start*$limit);
        $this->db->select('DTS.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("debits AS DTS")
                        ->join("distributor_new AS DT","DT.id=DTS.Distributor","INNER");
       
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("DTS.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("DTS.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(DTS.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,DTS.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,DTS.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='' && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }              
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        /*
        $query = $this->db->get("debits");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        */

        return $data;
    }
    return false;
    }

    public function fetch_debitsload_data() {
        //$this->db->limit($limit, $start*$limit);
        $this->db->select('DTS.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("debits_load AS DTS")
                        ->join("distributor_new AS DT","DT.id=DTS.Distributor","INNER");
       
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("DTS.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("DTS.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(DTS.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,DTS.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,DTS.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='' && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }              
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        /*
        $query = $this->db->get("debits");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        */

        return $data;
    }
    return false;
    }

public function fetch_debitsload_history_data() {
        //$this->db->limit($limit, $start*$limit);
        $this->db->select('DTS.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("Debits_Load_History AS DTS")
                        ->join("distributor_new AS DT","DT.id=DTS.Distributor","INNER");
       
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("DTS.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("DTS.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(DTS.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,DTS.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,DTS.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='' && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }              
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
        $query = $this->db->get("debits_delete_log");
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
        $query = $this->db->get("debits");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_loaded_files() {
        $query = $this->db->get("debits_load_log");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }


     public function delete_debittransactions(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'debits',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('debits_delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('debits'); 
        }

        return true;
        
    }

    public function clean_debits(){
        $query = $this->db->query("exec USP_Debits_Load_Table_Clean_Insert_into_Debits_Table");
        return $query;
    }

    
}
?>