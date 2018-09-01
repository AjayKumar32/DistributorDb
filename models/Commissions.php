<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Commissions extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_commissionsdata(){

        $distributor   = $this->security->xss_clean($this->input->post('distributor')); 
        $item = $this->security->xss_clean($this->input->post('item')); 
        $sale_type = $this->security->xss_clean($this->input->post('saletype'));

        $data = array(

            'distributor' => ($distributor!='')?$distributor:'',
            'item' => ($item!='')?$item:'',
            'sale_type' => ($sale_type!='')?$sale_type:''
        
        );
        //print_r($data);die();
        $this->db->insert('commissions_data',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

   

    public function update_commissionsdata(){

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
        $this->db->update('commissions_data',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

   

    public function get_data(){
        return $this->db->get('commissions_data');
    }

     public function empty_table(){
        $this->db->truncate('commissions_data');
    }

    

     public function record_count() {
        return $this->db->count_all("commissions_data");
    }

    public function get_total($filter=array()) {
        //echo "<pre>";print_r($filter);die();
         $this->db->select('DT.Consolidated_Name AS Distributor_name,DT.Country AS Country_name,PT.*,PO.*')
                        ->from("POS AS PO")
                        ->join("distributor_new AS DT","DT.id=PO.Distributor","INNER")
                        
                        ->join("commissions_data AS PT","PO.Distributor=PT.Distributor AND PO.invoiceNum=PT.invoiceNum AND PO.Item=PT.Item","LEFT");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PO.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PO.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PO.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PO.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PO.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;


         
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
         if(isset($filter['sales_data']) && $filter['sales_data']!='All'){ if($filter['sales_data']=='1'){            
            $this->db->where('PT.line_type is not NULL'); 
         }else{
            $this->db->where('PT.line_type is NULL'); 
         }}

        return $this->db->count_all_results();
    }

    public function fetch_data($filter=array()) {
        //echo "<pre>";print_r($filter);die();
         $this->db->select('DT.Consolidated_Name AS Distributor_name,DT.Country AS Country_name,PT.*,PO.*')
                        ->from("POS AS PO")
                        ->join("distributor_new AS DT","DT.id=PO.Distributor","INNER")
                        
                        ->join("commissions_data AS PT","PO.Distributor=PT.Distributor AND PO.invoiceNum=PT.invoiceNum AND PO.Item=PT.Item","LEFT");
         if(isset($filter['distributor']) && $filter['distributor']>0){
            $this->db->where("DT.id",$filter['distributor']);
         }
         if(isset($filter['sales_territory']) && $filter['sales_territory']!='' && $filter['sales_territory']!='All'){
            $this->db->where("PO.Sales_Territory",str_replace('_' ,' ',trim($filter['sales_territory'])));
         }
         if(isset($filter['sales_region']) && $filter['sales_region']!='' && $filter['sales_region']!='All'){
            $this->db->where("PO.sales_region",trim($filter['sales_region']));
         }
         if(isset($filter['sales_year']) && $filter['sales_year']>0){
            $this->db->where("YEAR(PO.report_date_adesto)",$filter['sales_year']);
         }
         if(isset($filter['sales_month']) && $filter['sales_month']>0){
            $this->db->where("DATEPART(MONTH,PO.report_date_adesto)",$filter['sales_month']);
         }
         if(isset($filter['sales_quarter']) && $filter['sales_quarter']>0){
            $this->db->where("DATEPART(QUARTER,PO.report_date_adesto)",$filter['sales_quarter']);
         }//print_r($filter);die;


         
         if(isset($filter['disti_status']) && $filter['disti_status']!='All'){            
            $this->db->where("DT.Active",$filter['disti_status']); 
         }
         if(isset($filter['sales_data']) && $filter['sales_data']!='All'){ if($filter['sales_data']=='1'){            
            $this->db->where('PT.line_type is not NULL'); 
         }else{
            $this->db->where('PT.line_type is NULL'); 
         }}

        //$this->db->limit($limit, $start*$limit);
        //$query = $this->db->get("commissions_data");
        //var_dump($query); die();
         $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //echo"<pre>";print_r($data);die();
        return $data;
    }
    return false;
        
    }

    public function get_total_calculated_data($filter=array()) {

         $this->db->select('DT.Consolidated_Name AS Distributor_name,DT.Country AS Country_name,PT.*,PO.*')
                        ->from("POS AS PO")
                        ->join("distributor_new AS DT","DT.id=PO.Distributor","INNER")
                        
                        ->join("commissions_data AS PT","PO.Distributor=PT.Distributor AND PO.invoiceNum=PT.invoiceNum AND PO.Item=PT.Item","INNER")
                        ->join("Rep_To_SalesPerson AS RS","PT.sales_person=RS.Sales_Person AND PT.sales_rep=RS.Sales_Rep","INNER");
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
          if(isset($filter['sales_rep']) && $filter['sales_rep']!='All'){            
            $this->db->where("RS.Sales_Rep",$filter['sales_rep']); 
         }
         if(isset($filter['sales_person']) && $filter['sales_person']!='All'){            
            $this->db->where("RS.Sales_Person",$filter['sales_person']); 
         }

        return $this->db->count_all_results();
        
    }
   
   public function fetch_calculated_data($filter=array()) {

         $this->db->select('DT.Consolidated_Name AS Distributor_name,DT.Country AS Country_name,PT.*,PO.*')
                        ->from("POS AS PO")
                        ->join("distributor_new AS DT","DT.id=PO.Distributor","INNER")
                        
                        ->join("commissions_data AS PT","PO.Distributor=PT.Distributor AND PO.invoiceNum=PT.invoiceNum AND PO.Item=PT.Item","INNER")
                        ->join("Rep_To_SalesPerson AS RS","PT.sales_person=RS.Sales_Person AND PT.sales_rep=RS.Sales_Rep","INNER");

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
         if(isset($filter['sales_rep']) && $filter['sales_rep']!='All'){            
            $this->db->where("RS.Sales_Rep",$filter['sales_rep']); 
         }
         if(isset($filter['sales_person']) && $filter['sales_person']!='All'){            
            $this->db->where("RS.Sales_Person",$filter['sales_person']); 
         }
        //$this->db->limit($limit, $start*$limit);
        //$query = $this->db->get("commissions_data");
        //var_dump($query); die();
         $query = $this->db->get(); //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        //echo"<pre>";print_r($data);die();
        return $data;
    }
    return false;
        
    }

    public function get_export_data() {

         $this->db->select('DT.Consolidated_Name AS Distributor_name,PO.*,PT.sales_rep as Purchase_rep,PT.sales_person AS Purchase_sales_person,PT.sales_rep as Design_rep,PT.sales_person AS Design_sales_person,PT.sales_rep as Reference_design_rep,PT.sales_person AS Reference_design_sales_person,PT.Transfer_type')
                        ->from("POS AS PO")
                        ->join("distributor_new AS DT","DT.id=PO.Distributor","INNER")
                        ->join("commissions_data AS PT","PO.Distributor!=PT.Distributor AND PO.invoiceNum!=PT.invoiceNum AND PO.Item!=PT.Item","LEFT");

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
        //$this->db->limit($limit, $start*$limit);
        //$query = $this->db->get("commissions_data");
        //var_dump($query); die();

         $query = $this->db->get();
        
        //echo "<pre>";print_r($query);die();
        return $query;

     
    }

    public function get_export_salesrepperson_list(){
        $this->db->select('SP.*')
                        ->from("Rep_To_SalesPerson AS SP");
        $query = $this->db->get();
        return $query;
    }

    
    public function fetch_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("commissions_data");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //echo "<pre>";print_r($data);die();
        return $data;
    }
    return false;
    }

    


    public function delete_commissionsdata(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'commissions_data',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('commissions_data'); 
        }

        return true;
        
    }

    public function get_multiplier($item){
        $this->db->select('CR.multiplier')
                 ->from('Commision_rates as CR')
                 ->join('Reference_Item as RI','RI.Item_Class=CR.product_family')
                 ->where("RI.Item",$item); 
        $query = $this->db->get(); 
        $result = $query->row_array(); 
        return $result['multiplier'];            
    }


    public function import_commissions($importData){

          $multiplier = $this->get_multiplier($importData['Item']);
          $this->db->select('*')
                    ->from('commissions_data')
                    ->where('Distributor',$importData['Distributor'])
                    ->where('InvoiceNum',$importData['InvoiceNum'])
                    ->where('Item',$importData['Item'])
                    ->order_by("id");
           $query = $this->db->get();
           $result = $query->result_array();
           $ComissioNData =array();
           foreach($result as $existing_data){
                $ComissioNData[str_replace(' ','_',$existing_data['line_type'])] = $existing_data;
           }
           $transfer_type = ($importData['Purchase_sales_person'] == $importData['Design_sales_person'])?'In-Territory':'Transfer';
           
            if($importData['Purchase_rep']!='' && $importData['Purchase_sales_person']!=''){
                $finalCommision = ($multiplier * 0.3) * $importData['Debited_Cost_Ext_USD'];
                $insertPurchase = array(
                'Distributor'=>$importData['Distributor'],
                'InvoiceNum' => $importData['InvoiceNum'],
                'Item' => $importData['Item'],
                'line_type'=>'Purchase',
                'sales_rep' => $importData['Purchase_rep'],
                'sales_person' => $importData['Purchase_sales_person'],
                'Commission_rate'=> $multiplier,
                'commission_percent'=>0.3,
                'commission_base'=>$finalCommision,
                'Transfer_type'=>$transfer_type
            );
                if(!empty($ComissioNData) && isset($ComissioNData['Purchase'])){
                    $this->db->where('id',$ComissioNData['Purchase']['id']);
                    $this->db->update('commissions_data',$insertPurchase);
                }else{
                    $this->db->insert('commissions_data',$insertPurchase);
                }
              }
              if($importData['Reference_design_rep']!='' && $importData['Reference_design_sales_person']!=''){
                $finalCommision = ($multiplier * 0.1) * $importData['Debited_Cost_Ext_USD'];
                $insertPurchase = array(
                'Distributor'=>$importData['Distributor'],
                'InvoiceNum' => $importData['InvoiceNum'],
                'Item' => $importData['Item'],
                'line_type'=>'Reference Design',
                'sales_rep' => $importData['Reference_design_rep'],
                'sales_person' => $importData['Reference_design_sales_person'],
                'Commission_rate'=> $multiplier,
                'commission_percent'=>0.1,
                'commission_base'=>$finalCommision,
                'Transfer_type'=>$transfer_type

            );
                if(!empty($ComissioNData) && isset($ComissioNData['Reference_Design'])){
                    $this->db->where('id',$ComissioNData['Reference_Design']['id']);
                    $this->db->update('commissions_data',$insertPurchase);
                }else{
                $this->db->insert('commissions_data',$insertPurchase);
            }
              }
              if($importData['Design_rep']!='' && $importData['Design_sales_person']!=''){
                $finalCommision = ($multiplier * 0.7) * $importData['Debited_Cost_Ext_USD'];
                $insertPurchase = array(
                'Distributor'=>$importData['Distributor'],
                'InvoiceNum' => $importData['InvoiceNum'],
                'Item' => $importData['Item'],
                'line_type'=>'Design',
                'sales_rep' => $importData['Design_rep'],
                'sales_person' => $importData['Design_sales_person'],
                'Commission_rate'=> $multiplier,
                'commission_percent'=>0.7,
                'commission_base'=>$finalCommision,
                'Transfer_type'=>$transfer_type
            );
                if(!empty($ComissioNData) && isset($ComissioNData['Design'])){
                    $this->db->where('id',$ComissioNData['Design']['id']);
                    $this->db->update('commissions_data',$insertPurchase);
                }else{
                 $this->db->insert('commissions_data',$insertPurchase);
                }
              }  
                  

           return true;

    }

   

    
}
?>