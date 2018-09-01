<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Inventorytransactions extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_inventorytransactions(){

        $Distributor   = $this->security->xss_clean($this->input->post('distributor'));
        $Country   = $this->security->xss_clean($this->input->post('country')); 
        $Report_Date   = $this->security->xss_clean($this->input->post('report_date'));
        $sales_territory   = $this->security->xss_clean($this->input->post('sales_territory'));
        $sales_region   = $this->security->xss_clean($this->input->post('sales_region'));

        $ItemOriginal   = $this->security->xss_clean($this->input->post('itemoriginal'));
        $CustPartNumber   = $this->security->xss_clean($this->input->post('custpartnumber'));
        $Quantity   = $this->security->xss_clean($this->input->post('quantity'));
        $DBC_Currency   = $this->security->xss_clean($this->input->post('dbc_currency'));
        $DBC_Curr_Exch   = $this->security->xss_clean($this->input->post('dbc_curr_exch')); 
        $DBC_Unit_Orig   = $this->security->xss_clean($this->input->post('dbc_unit_orig'));
        $DBC_Unit_USD   = $this->security->xss_clean($this->input->post('dbc_unit_usd'));
        $DBC_Ext_USD   = $this->security->xss_clean($this->input->post('dbc_ext_usd'));
        $Debited_Cost_Currency   = $this->security->xss_clean($this->input->post('debited_cost_currency'));
        $Debited_Cost_Curr_Exch   = $this->security->xss_clean($this->input->post('debited_cost_curr_exch'));
        $Debited_Cost_Unit_Orig   = $this->security->xss_clean($this->input->post('debited_cost_unit_orig')); 
        $Debited_Cost_Unit_USD   = $this->security->xss_clean($this->input->post('debited_cost_unit_usd'));
        $Debited_Cost_Ext_USD   = $this->security->xss_clean($this->input->post('debited_cost_ext_usd'));
        $SL_Code   = $this->security->xss_clean($this->input->post('SL_Code'));
        $Branch_Code   = $this->security->xss_clean($this->input->post('Branch_Code'));
        $Warehouse_Code   = $this->security->xss_clean($this->input->post('Warehouse_Code'));
        $Batch_Id   = $this->security->xss_clean($this->input->post('Batch_Id'));
        

        $data = array(

            'Distributor' => ($Distributor!='')?$Distributor:'',
            'Country' => ($Country!='')?$Country:'',
            'report_date_adesto' => ($Report_Date!='')?$Report_Date:date('Y-m-d H:i:s'),
            'sales_territory' => ($sales_territory!='')?$sales_territory:'',
            'sales_region' => ($sales_region!='')?$sales_region:'',
            'ItemOriginal' => ($ItemOriginal!='')?$ItemOriginal:'',
            'CustPartNumber' =>( $CustPartNumber!='')?$CustPartNumber:'',
            'Quantity' => ($Quantity!='')?$Quantity:0,
            'DBC_Currency' => ($DBC_Currency!='')?$DBC_Currency:'',
            'DBC_Curr_Exch' => ($DBC_Curr_Exch!='')?$DBC_Curr_Exch:0.00,
            'DBC_Unit_Orig' => ($DBC_Unit_Orig!='')?$DBC_Unit_Orig:'0.00',
            'DBC_Unit_USD' => ($DBC_Unit_USD!='')?$DBC_Unit_USD:'0.00',
            'DBC_Ext_USD' => ($DBC_Ext_USD!='')?$DBC_Ext_USD:'0.00',
            'Debited_Cost_Currency' => ($Debited_Cost_Currency!='')?$Debited_Cost_Currency:'0.00',
            'Debited_Cost_Curr_Exch' => ($Debited_Cost_Curr_Exch!='')?$Debited_Cost_Curr_Exch:'0.00',
            'Debited_Cost_Unit_Orig' =>( $Debited_Cost_Unit_Orig!='')?$Debited_Cost_Unit_Orig:'0.00',
            'Debited_Cost_Unit_USD' => ($Debited_Cost_Unit_USD!='')?$Debited_Cost_Unit_USD:'0.00',
            'Debited_Cost_Ext_USD' => ($Debited_Cost_Ext_USD!='')?$Debited_Cost_Ext_USD:'0.00',
            'SL_Code' => ($SL_Code!='')?$SL_Code:'',
            'Branch_Code' => ($Branch_Code!='')?$Branch_Code:'',
            'Warehouse_Code' => ($Warehouse_Code!='')?$Warehouse_Code:'',
            'Batch_Id' => ($Batch_Id!='')?$Batch_Id:'',
            'Load_date' =>  date('Y-m-d')
           
        );
        //echo "<pre>";print_r( $data);die;

        $this->db->insert('Inventory',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }


    public function update_inventorytransactions(){

        $id   = $this->security->xss_clean($this->input->post('id'));

        $Distributor   = $this->security->xss_clean($this->input->post('distributor'));
        $Country   = $this->security->xss_clean($this->input->post('country')); 
        $ReportDate   = $this->security->xss_clean($this->input->post('reportdate'));
        $sales_territory   = $this->security->xss_clean($this->input->post('sales_territory'));
        $sales_region   = $this->security->xss_clean($this->input->post('sales_region'));
        $ItemOriginal   = $this->security->xss_clean($this->input->post('itemoriginal'));
        $CustPartNumber   = $this->security->xss_clean($this->input->post('custpartnumber'));
        $Quantity   = $this->security->xss_clean($this->input->post('quantity'));
        $DBC_Currency   = $this->security->xss_clean($this->input->post('dbc_currency'));
        $DBC_Curr_Exch   = $this->security->xss_clean($this->input->post('dbc_curr_exch')); 
        $DBC_Unit_Orig   = $this->security->xss_clean($this->input->post('dbc_unit_orig'));
        $DBC_Unit_USD   = $this->security->xss_clean($this->input->post('dbc_unit_usd'));
        $DBC_Ext_USD   = $this->security->xss_clean($this->input->post('dbc_ext_usd'));
        $Debited_Cost_Currency   = $this->security->xss_clean($this->input->post('debited_cost_currency'));
        $Debited_Cost_Curr_Exch   = $this->security->xss_clean($this->input->post('debited_cost_curr_exch'));
        $Debited_Cost_Unit_Orig   = $this->security->xss_clean($this->input->post('debited_cost_unit_orig')); 
        $Debited_Cost_Unit_USD   = $this->security->xss_clean($this->input->post('debited_cost_unit_usd'));
        $Debited_Cost_Ext_USD   = $this->security->xss_clean($this->input->post('debited_cost_ext_usd'));
        $SL_Code   = $this->security->xss_clean($this->input->post('SL_Code'));
        $Branch_Code   = $this->security->xss_clean($this->input->post('Branch_Code'));
        $Warehouse_Code   = $this->security->xss_clean($this->input->post('Warehouse_Code'));
        $Batch_Id   = $this->security->xss_clean($this->input->post('Batch_Id'));
        

        $data = array(

             'Distributor' => ($Distributor!='')?$Distributor:'',
            'Country' => ($Country!='')?$Country:'',
            'report_date_adesto' => ($ReportDate!='')?$ReportDate:date('Y-m-d H:i:s'),
            'sales_territory' => ($sales_territory!='')?$sales_territory:'',
            'sales_region' => ($sales_region!='')?$sales_region:'',
            'ItemOriginal' => ($ItemOriginal!='')?$ItemOriginal:'',
            'CustPartNumber' =>( $CustPartNumber!='')?$CustPartNumber:'',
            'Quantity' => ($Quantity!='')?$Quantity:0,
            'DBC_Currency' => ($DBC_Currency!='')?$DBC_Currency:'',
            'DBC_Curr_Exch' => ($DBC_Curr_Exch!='')?$DBC_Curr_Exch:0.00,
            'DBC_Unit_Orig' => ($DBC_Unit_Orig!='')?$DBC_Unit_Orig:'0.00',
            'DBC_Unit_USD' => ($DBC_Unit_USD!='')?$DBC_Unit_USD:'0.00',
            'DBC_Ext_USD' => ($DBC_Ext_USD!='')?$DBC_Ext_USD:'0.00',
            'Debited_Cost_Currency' => ($Debited_Cost_Currency!='')?$Debited_Cost_Currency:'0.00',
            'Debited_Cost_Curr_Exch' => ($Debited_Cost_Curr_Exch!='')?$Debited_Cost_Curr_Exch:'0.00',
            'Debited_Cost_Unit_Orig' =>( $Debited_Cost_Unit_Orig!='')?$Debited_Cost_Unit_Orig:'0.00',
            'Debited_Cost_Unit_USD' => ($Debited_Cost_Unit_USD!='')?$Debited_Cost_Unit_USD:'0.00',
            'Debited_Cost_Ext_USD' => ($Debited_Cost_Ext_USD!='')?$Debited_Cost_Ext_USD:'0.00',
            'SL_Code' => ($SL_Code!='')?$SL_Code:'',
            'Branch_Code' => ($Branch_Code!='')?$Branch_Code:'',
            'Warehouse_Code' => ($Warehouse_Code!='')?$Warehouse_Code:'',
            'Batch_Id' => ($Batch_Id!='')?$Batch_Id:'',
            'Load_date' =>  date('Y-m-d')
           
        );

        $this->db->where('id', $id);

        $this->db->update('Inventory',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data($filter=array()){
       
        $this->db->select('IT.*')
                        ->from("Inventory AS IT")
                        ->join("distributor_new AS DT","DT.id=IT.Distributor","INNER");
       

        if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!=''){
            $this->db->where("DT.Sales_Territory",trim($filter['sales_territory']));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!=''){
            $this->db->where("DT.Sales_Area",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(IT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(WEEK,IT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,IT.report_date_adesto)",$filter['sales_quarter']);
         } 
        return $this->db->get();
    }

     public function empty_table(){
        $this->db->truncate('Inventory');
    }

    public function insert_load_log($file_info,$DISTRIBUTOR,$report_date_adesto){
        //$file_info = pathinfo($_FILES["file"]["name"]);
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
            $this->db->insert('inventory_load_logs',$data);

    }

    public function import_inventorytransactions($data){
        //$file_info = pathinfo($_FILES["file"]["name"]);

        $this->db->insert('Inventory_Load',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Inventory");
    }

     public function get_total($filter=array()) {
        //$this->db->limit($limit, $start*$limit);       
         $this->db->select('IT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("Inventory AS IT")
                        ->join("distributor_new AS DT","DT.id=IT.Distributor","INNER");
       

         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("IT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("IT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(IT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,IT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,IT.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='' && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }        
           
        return $this->db->count_all_results();
    }


    public function fetch_data($filter=array()) {
        //$this->db->limit($limit, $start*$limit);       
         $this->db->select('IT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("Inventory AS IT")
                        ->join("distributor_new AS DT","DT.id=IT.Distributor","INNER");
       

         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("IT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("IT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(IT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,IT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,IT.report_date_adesto)",$filter['sales_quarter']);
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

    public function fetch_inventoryload_data() {
        //$this->db->limit($limit, $start*$limit);       
         $this->db->select('IT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("Inventory_Load AS IT")
                        ->join("distributor_new AS DT","DT.id=IT.Distributor","INNER");
       

         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("IT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("IT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(IT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,IT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,IT.report_date_adesto)",$filter['sales_quarter']);
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

    public function fetch_inventoryload_history_data() {
        //$this->db->limit($limit, $start*$limit);       
         $this->db->select('IT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("Inventory_Load_History AS IT")
                        ->join("distributor_new AS DT","DT.id=IT.Distributor","INNER");
       

         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("IT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("IT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(IT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,IT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,IT.report_date_adesto)",$filter['sales_quarter']);
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

    public function fetch_inventorycleaned_history_data() {
        //$this->db->limit($limit, $start*$limit);       
         $this->db->select('IT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("inventory_cleaned_history AS IT")
                        ->join("distributor_new AS DT","DT.id=IT.Distributor","INNER");
       

         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("IT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("IT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(IT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,IT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,IT.report_date_adesto)",$filter['sales_quarter']);
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

    public function fetch_inventorycleaned_data() {
        //$this->db->limit($limit, $start*$limit);       
         $this->db->select('IT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("Inventory_Cleaned AS IT")
                        ->join("distributor_new AS DT","DT.id=IT.Distributor","INNER");
       

         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("IT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("IT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(IT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,IT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,IT.report_date_adesto)",$filter['sales_quarter']);
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
        $query = $this->db->get("inventory_delete_log");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_loaded_files() {
        $query = $this->db->get("inventory_load_logs");
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
        $query = $this->db->get("Inventory");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function delete_inventorytransactions(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Inventory',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('inventory_delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Inventory'); 
        }

        return true;
        
    }

    public function clean_inventory(){ 
        $query = $this->db->query("exec USP_Inventory_Load_Table_Clean_Insert_into_Inventory_Clean_Table");
        //print_r($query);die;
        return $query;
    }

    public function calculate_inventory(){
        $query = $this->db->query("exec USP_Calculate_debited_Costs_Insert_into_Inventory_table");
        
        return $query;
    }
}
?>