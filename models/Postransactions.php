<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Postransactions extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_postransactions(){

        $Distributor   = $this->security->xss_clean($this->input->post('distributor'));
        $Country   = $this->security->xss_clean($this->input->post('country')); 
        $sales_territory   = $this->security->xss_clean($this->input->post('sales_territory')); 
        $sales_region   = $this->security->xss_clean($this->input->post('sales_region')); 
        $report_date_adesto   = $this->security->xss_clean($this->input->post('reportdate'));
        $InvoiceDate   = $this->security->xss_clean($this->input->post('invoicedate'));
        $InvoiceNum   = $this->security->xss_clean($this->input->post('invoicenum'));
        $EndCust   = $this->security->xss_clean($this->input->post('endcust'));
        $PurchCust   = $this->security->xss_clean($this->input->post('purchcust'));
        $PurchCustCity   = $this->security->xss_clean($this->input->post('purchcustcity')); 
        $PurchCustState   = $this->security->xss_clean($this->input->post('purchcuststate'));
        $PurchCustZip   = $this->security->xss_clean($this->input->post('purchcustzip'));
        $PurchCustCountry   = $this->security->xss_clean($this->input->post('purchcustcountry'));
        $End_Purch_Direct   = $this->security->xss_clean($this->input->post('endpurchdirect'));
        $Item   = $this->security->xss_clean($this->input->post('item'));
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
        $Resale_Currency   = $this->security->xss_clean($this->input->post('resale_currency')); 
        $Resale_Curr_Exch   = $this->security->xss_clean($this->input->post('resale_curr_exch'));
        $Resale_Unit_Origin   = $this->security->xss_clean($this->input->post('resale_unit_origin'));
        $Resale_Unit_USD   = $this->security->xss_clean($this->input->post('resale_unit_usd'));
        $Resale_Ext_USD   = $this->security->xss_clean($this->input->post('resale_ext_usd'));
        $Debit_Percent   = $this->security->xss_clean($this->input->post('debit_percent'));
        $Ship_date   = $this->security->xss_clean($this->input->post('Ship_date'));
        $Debit_number   = $this->security->xss_clean($this->input->post('Debit_number'));
        $Quote_number   = $this->security->xss_clean($this->input->post('Quote_number'));
        $Design_Registraion_Number   = $this->security->xss_clean($this->input->post('Design_Registraion_Number'));
        $Exchange_Rate   = $this->security->xss_clean($this->input->post('Exchange_Rate'));
        $Exchange_Date   = $this->security->xss_clean($this->input->post('Exchange_Date'));
        $Contract_Number   = $this->security->xss_clean($this->input->post('Contract_Number'));
        $SL_Code   = $this->security->xss_clean($this->input->post('SL_Code'));
        $Purchase_Customer_Street   = $this->security->xss_clean($this->input->post('Purchase_Customer_Street'));
        $End_Customer_Street   = $this->security->xss_clean($this->input->post('End_Customer_Street'));
        $End_Customer_City   = $this->security->xss_clean($this->input->post('End_Customer_City'));
        $End_Customer_Country   = $this->security->xss_clean($this->input->post('End_Customer_Country'));
        $End_Customer_State   = $this->security->xss_clean($this->input->post('End_Customer_State'));
        $End_Customer_ZipCode   = $this->security->xss_clean($this->input->post('End_Customer_ZipCode'));

       

        $data = array(

            'Distributor' => ($Distributor!='')?$Distributor:'',
            'Country' => ($Country!='')?$Country:'',
            'sales_territory' => ($sales_territory!='')?$sales_territory:'',
            'sales_region' => ($sales_region!='')?$sales_region:'',
            'report_date_adesto' => ($report_date_adesto!='')?$report_date_adesto:date('Y-m-d H:i:s'),
            'InvoiceDate' => ($InvoiceDate!='')?$InvoiceDate:date('Y-m-d H:i:s'),
            'InvoiceNum' => ($InvoiceNum!='')?$InvoiceNum:'',
            'EndCust' => ($EndCust!='')?$EndCust:'',
            'PurchCust' => ($PurchCust!='')?$PurchCust:'',
            'PurchCustCity' => ($PurchCustCity!='')?$PurchCustCity:'',
            'PurchCustState' => ($PurchCustState!='')?$PurchCustState:'',
            'PurchCustZip' => ($PurchCustZip!='')?$PurchCustZip:'',
            'PurchCustCountry' => ($PurchCustCountry!='')?$PurchCustCountry:'',
            'End_Purch_Direct' => ($End_Purch_Direct!='')?$End_Purch_Direct:'',
            'Item' => ($Item!='')?$Item:'',
            'CustPartNumber' => ($CustPartNumber!='')?$CustPartNumber:'',
            'Quantity' => ($Quantity!='')?$Quantity:0,
            'DBC_Currency' => ($DBC_Currency!='')?$DBC_Currency:'',
            'DBC_Curr_Exch' => ($DBC_Curr_Exch!='')?$DBC_Curr_Exch:0.00,
            'DBC_Unit_Orig' => ($DBC_Unit_Orig!='')?$DBC_Unit_Orig:0.00,
            'DBC_Unit_USD' => ($DBC_Unit_USD!='')?$DBC_Unit_USD:0.00,
            'DBC_Ext_USD' => ($DBC_Ext_USD!='')?$DBC_Ext_USD:0.00,
            'Debited_Cost_Currency' => ($Debited_Cost_Currency!='')?$Debited_Cost_Currency:'',
            'Debited_Cost_Curr_Exch' => ($Debited_Cost_Curr_Exch!='')?$Debited_Cost_Curr_Exch:0.00,
            'Debited_Cost_Unit_Orig' => ($Debited_Cost_Unit_Orig!='')?$Debited_Cost_Unit_Orig:0.00,
            'Debited_Cost_Unit_USD' => ($Debited_Cost_Unit_USD!='')?$Debited_Cost_Unit_USD:0.00,
            'Debited_Cost_Ext_USD' => ($Debited_Cost_Ext_USD!='')?$Debited_Cost_Ext_USD:0.00,
            'Resale_Currency' => ($Resale_Currency!='')?$Resale_Currency:'',
            'Resale_Curr_Exch' => ($Resale_Curr_Exch!='')?$Resale_Curr_Exch:0.00,
            'Resale_Unit_Origin' => ($Resale_Unit_Origin!='')?$Resale_Unit_Origin:0.00,
            'Resale_Unit_USD' => ($Resale_Unit_USD!='')?$Resale_Unit_USD:0.00,
            'Resale_Ext_USD' => ($Resale_Ext_USD!='')?$Resale_Ext_USD:0.00,
            'Debit_Percent' => ($Debit_Percent!='')?$Debit_Percent:0.00,
            'Ship_date' => ($Ship_date!='')?$Ship_date:date('Y-m-d H:i:s'),
            'Debit_number' => ($Debit_number!='')?$Debit_number:'',
            'Quote_number' => ($Quote_number!='')?$Quote_number:'',
            'Design_Registraion_Number' => ($Design_Registraion_Number!='')?$Design_Registraion_Number:'',
            'Exchange_Rate' => ($Exchange_Rate!='')?$Exchange_Rate:0.00,
            'Exchange_Date' => ($Exchange_Date!='')?$Exchange_Date:date('Y-m-d H:i:s'),
            'Contract_Number' => ($Contract_Number!='')?$Contract_Number:'',
            'SL_Code' => ($SL_Code!='')?$SL_Code:'',
            'Purchase_Customer_Street' => ($Purchase_Customer_Street!='')?$Purchase_Customer_Street:'',
            'End_Customer_Street' => ($End_Customer_Street!='')?$End_Customer_Street:'',
            'End_Customer_City' => ($End_Customer_City!='')?$End_Customer_City:'',
            'End_Customer_Country' => ($End_Customer_Country!='')?$End_Customer_Country:'',
             'End_Customer_State' => ($End_Customer_State!='')?$End_Customer_State:'',
             'End_Customer_ZipCode' => ($End_Customer_ZipCode!='')?$End_Customer_ZipCode:'',
             'Load_date' =>  date('Y-m-d')
           
        );

        $this->db->insert('POS',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_postransactions(){

        $id   = $this->security->xss_clean($this->input->post('id'));

        $Distributor   = $this->security->xss_clean($this->input->post('distributor'));
        $Country   = $this->security->xss_clean($this->input->post('country'));
        $sales_territory   = $this->security->xss_clean($this->input->post('sales_territory')); 
        $sales_region   = $this->security->xss_clean($this->input->post('sales_region')); 

        $report_date_adesto   = $this->security->xss_clean($this->input->post('reportdate'));
        $InvoiceDate   = $this->security->xss_clean($this->input->post('invoicedate'));
        $InvoiceNum   = $this->security->xss_clean($this->input->post('invoicenum'));
        $EndCust   = $this->security->xss_clean($this->input->post('endcust'));
        $PurchCust   = $this->security->xss_clean($this->input->post('purchcust'));
        $PurchCustCity   = $this->security->xss_clean($this->input->post('purchcustcity')); 
        $PurchCustState   = $this->security->xss_clean($this->input->post('purchcuststate'));
        $PurchCustZip   = $this->security->xss_clean($this->input->post('purchcustzip'));
        $PurchCustCountry   = $this->security->xss_clean($this->input->post('purchcustcountry'));
        $End_Purch_Direct   = $this->security->xss_clean($this->input->post('endpurchdirect'));
        $Item   = $this->security->xss_clean($this->input->post('item'));
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
        $Resale_Currency   = $this->security->xss_clean($this->input->post('resale_currency')); 
        $Resale_Curr_Exch   = $this->security->xss_clean($this->input->post('resale_curr_exch'));
        $Resale_Unit_Origin   = $this->security->xss_clean($this->input->post('resale_unit_origin'));
        $Resale_Unit_USD   = $this->security->xss_clean($this->input->post('resale_unit_usd'));
        $Resale_Ext_USD   = $this->security->xss_clean($this->input->post('resale_ext_usd'));
        $Debit_Percent   = $this->security->xss_clean($this->input->post('debit_percent'));
         $Ship_date   = $this->security->xss_clean($this->input->post('Ship_date'));
        $Debit_number   = $this->security->xss_clean($this->input->post('Debit_number'));
        $Quote_number   = $this->security->xss_clean($this->input->post('Quote_number'));
        $Design_Registraion_Number   = $this->security->xss_clean($this->input->post('Design_Registraion_Number'));
        $Exchange_Rate   = $this->security->xss_clean($this->input->post('Exchange_Rate'));
        $Exchange_Date   = $this->security->xss_clean($this->input->post('Exchange_Date'));
        $Contract_Number   = $this->security->xss_clean($this->input->post('Contract_Number'));
        $SL_Code   = $this->security->xss_clean($this->input->post('SL_Code'));
        $Purchase_Customer_Street   = $this->security->xss_clean($this->input->post('Purchase_Customer_Street'));
        $End_Customer_Street   = $this->security->xss_clean($this->input->post('End_Customer_Street'));
        $End_Customer_City   = $this->security->xss_clean($this->input->post('End_Customer_City'));
        $End_Customer_Country   = $this->security->xss_clean($this->input->post('End_Customer_Country'));
        $End_Customer_State   = $this->security->xss_clean($this->input->post('End_Customer_State'));
        $End_Customer_ZipCode   = $this->security->xss_clean($this->input->post('End_Customer_ZipCode'));

        $data = array(

            
            'Distributor' => ($Distributor!='')?$Distributor:'',
            'Country' => ($Country!='')?$Country:'',
            'sales_territory' => ($sales_territory!='')?$sales_territory:'',
            'sales_region' => ($sales_region!='')?$sales_region:'',
            'report_date_adesto' => ($report_date_adesto!='')?$report_date_adesto:date('Y-m-d H:i:s'),
            'InvoiceDate' => ($InvoiceDate!='')?$InvoiceDate:date('Y-m-d H:i:s'),
            'InvoiceNum' => ($InvoiceNum!='')?$InvoiceNum:'',
            'EndCust' => ($EndCust!='')?$EndCust:'',
            'PurchCust' => ($PurchCust!='')?$PurchCust:'',
            'PurchCustCity' => ($PurchCustCity!='')?$PurchCustCity:'',
            'PurchCustState' => ($PurchCustState!='')?$PurchCustState:'',
            'PurchCustZip' => ($PurchCustZip!='')?$PurchCustZip:'',
            'PurchCustCountry' => ($PurchCustCountry!='')?$PurchCustCountry:'',
            'End_Purch_Direct' => ($End_Purch_Direct!='')?$End_Purch_Direct:'',
            'Item' => ($Item!='')?$Item:'',
            'CustPartNumber' => ($CustPartNumber!='')?$CustPartNumber:'',
            'Quantity' => ($Quantity!='')?$Quantity:0,
            'DBC_Currency' => ($DBC_Currency!='')?$DBC_Currency:'',
            'DBC_Curr_Exch' => ($DBC_Curr_Exch!='')?$DBC_Curr_Exch:0.00,
            'DBC_Unit_Orig' => ($DBC_Unit_Orig!='')?$DBC_Unit_Orig:0.00,
            'DBC_Unit_USD' => ($DBC_Unit_USD!='')?$DBC_Unit_USD:0.00,
            'DBC_Ext_USD' => ($DBC_Ext_USD!='')?$DBC_Ext_USD:0.00,
            'Debited_Cost_Currency' => ($Debited_Cost_Currency!='')?$Debited_Cost_Currency:'',
            'Debited_Cost_Curr_Exch' => ($Debited_Cost_Curr_Exch!='')?$Debited_Cost_Curr_Exch:0.00,
            'Debited_Cost_Unit_Orig' => ($Debited_Cost_Unit_Orig!='')?$Debited_Cost_Unit_Orig:0.00,
            'Debited_Cost_Unit_USD' => ($Debited_Cost_Unit_USD!='')?$Debited_Cost_Unit_USD:0.00,
            'Debited_Cost_Ext_USD' => ($Debited_Cost_Ext_USD!='')?$Debited_Cost_Ext_USD:0.00,
            'Resale_Currency' => ($Resale_Currency!='')?$Resale_Currency:'',
            'Resale_Curr_Exch' => ($Resale_Curr_Exch!='')?$Resale_Curr_Exch:0.00,
            'Resale_Unit_Origin' => ($Resale_Unit_Origin!='')?$Resale_Unit_Origin:0.00,
            'Resale_Unit_USD' => ($Resale_Unit_USD!='')?$Resale_Unit_USD:0.00,
            'Resale_Ext_USD' => ($Resale_Ext_USD!='')?$Resale_Ext_USD:0.00,
            'Debit_Percent' => ($Debit_Percent!='')?$Debit_Percent:0.00,
            'Ship_date' => ($Ship_date!='')?$Ship_date:date('Y-m-d H:i:s'),
            'Debit_number' => ($Debit_number!='')?$Debit_number:'',
            'Quote_number' => ($Quote_number!='')?$Quote_number:'',
            'Design_Registraion_Number' => ($Design_Registraion_Number!='')?$Design_Registraion_Number:'',
            'Exchange_Rate' => ($Exchange_Rate!='')?$Exchange_Rate:0.00,
            'Exchange_Date' => ($Exchange_Date!='')?$Exchange_Date:date('Y-m-d H:i:s'),
            'Contract_Number' => ($Contract_Number!='')?$Contract_Number:'',
            'SL_Code' => ($SL_Code!='')?$SL_Code:'',
            'Purchase_Customer_Street' => ($Purchase_Customer_Street!='')?$Purchase_Customer_Street:'',
            'End_Customer_Street' => ($End_Customer_Street!='')?$End_Customer_Street:'',
            'End_Customer_City' => ($End_Customer_City!='')?$End_Customer_City:'',
            'End_Customer_Country' => ($End_Customer_Country!='')?$End_Customer_Country:'',
             'End_Customer_State' => ($End_Customer_State!='')?$End_Customer_State:'',
             'End_Customer_ZipCode' => ($End_Customer_ZipCode!='')?$End_Customer_ZipCode:'',
             'Load_date' =>  date('Y-m-d')
        );

        $this->db->where('id', $id);

        $this->db->update('POS',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('POS');
    }

     public function empty_table(){
        $this->db->truncate('POS');
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
                'dsitributor'=>$distributor

                
            );
            $this->db->insert('pos_load_log',$data);

    }

    public function import_postransactions($data){

        $this->db->insert('POS_LOAD',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("POS");
    }

    public function fetch_data($filter=array()) {
        $this->db->limit($filter['Limit'], $filter['offset']);
//echo "<pre>";print_r($filter);
         $this->db->select('PT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("POS AS PT")
                        ->join("distributor_new AS DT","DT.id=PT.Distributor","INNER");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PT.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
                      
        $query = $this->db->get();//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
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

    public function get_total($filter=array()) {
        //$this->db->limit($limit, $start*$limit);

         $this->db->select('PT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("POS AS PT")
                        ->join("distributor_new AS DT","DT.id=PT.Distributor","INNER");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PT.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
                      
        
            return $this->db->count_all_results();
    }

    public function fetch_posload_data($filter=array()) {
        //$this->db->limit($limit, $start*$limit);

         $this->db->select('PT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("POS_LOAD AS PT")
                        ->join("distributor_new AS DT","DT.id=PT.Distributor","INNER");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PT.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
                      
        $query = $this->db->get();//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
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


    public function fetch_posload_history_data($filter=array()) {
        //$this->db->limit($limit, $start*$limit);

         $this->db->select('PT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("POS_Load_History AS PT")
                        ->join("distributor_new AS DT","DT.id=PT.Distributor","INNER");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PT.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
                      
        $query = $this->db->get();//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
       

        return $data;
    }
    return false;
    }

       public function fetch_poscleaned_history_data($filter=array()) {
        //$this->db->limit($limit, $start*$limit);

         $this->db->select('PT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("POS_Cleaned_history AS PT")
                        ->join("distributor_new AS DT","DT.id=PT.Distributor","INNER");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PT.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
                      
        $query = $this->db->get();//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
       

        return $data;
    }
    return false;
    }




public function fetch_poscleaned_data($filter=array()) {
        //$this->db->limit($limit, $start*$limit);

         $this->db->select('PT.*,DT.Consolidated_Name AS Distributor,DT.Country AS Country')
                        ->from("POS_Cleaned AS PT")
                        ->join("distributor_new AS DT","DT.id=PT.Distributor","INNER");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PT.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PT.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PT.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PT.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PT.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
                      
        $query = $this->db->get();//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
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
        $query = $this->db->get("pos_delete_log");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_loaded_files() {
        $query = $this->db->get("pos_load_log");
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
        $query = $this->db->get("POS");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function delete_postransaction(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'POS',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('pos_delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('POS'); 
        }

        return true;
        
    }

    public function clean_pos(){
        $query = $this->db->query("exec USP_POS_Load_Table_Clean_Insert_into_POS_Clean_Table");
        //var_dump($query);die();
        return $query;
    }

    public function calculate_pos(){
        $query = $this->db->query("exec USP_Calculate_debited_Costs_Insert_into_POS_table");
        return $query;
    }
}
?>