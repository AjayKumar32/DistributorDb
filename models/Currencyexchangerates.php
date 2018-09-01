<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Currencyexchangerates extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_currencyexchangerates(){

        $Currency   = $this->security->xss_clean($this->input->post('currency'));
        //var_dump($Currency);
        $Currency_Exchange   = $this->security->xss_clean($this->input->post('currency_exchange')); 
        //var_dump($Currency_Exchange); die();

        $data = array(

            'base_currency' => ($Currency!='')?$Currency:'',
            'quote_currency' => NULL,
            'currency_date_time' => NULL,
            'currency_bid' => NULL,
            'currency_ask' => NULL,            
            'currency_exchange' => ($Currency_Exchange!='')?$Currency_Exchange:''       
           
        );

        //var_dump($data);die();

        $this->db->insert('Currency_Exchange',$data);
        //var_dump($this->db->affected_rows()); die();
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('Currency_Exchange');
    }

     public function empty_table(){
        $data = $this->db->get('Currency_Exchange')->result_array();
        //print_r($data); die();
        foreach($data as $insertArr){
            unset($insertArr['id']);
            $this->db->insert('Currency_Exchange_history',$insertArr);
        }
        $this->db->truncate('Currency_Exchange');
    }

    public function import_currencyexchangerates($data){
        $this->db->insert('Currency_Exchange',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function add_currencyexchangerates_from_api($data){
        $this->db->insert('Currency_Exchange',$data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function add_currencyexchangerates_null_row(){

    $null_data_for_join=array(
                            'base_currency' => NULL,
                            'quote_currency' => NULL,
                            'currency_date_time' => NULL,
                            'currency_bid' => NULL,
                            'currency_ask' => NULL,
                            'currency_exchange' => NULL 
                        );
        $this->db->insert('Currency_Exchange',$null_data_for_join);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Currency_Exchange");
    }

   

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Currency_Exchange");
        $this->db->order_by("currency_exchange", "asc");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function fetch_history_filters() {
        //$this->db->limit($limit, $start*$limit);
        
         $this->db->select('CE.base_currency, CE.currency_date_time')
                    ->from("Currency_Exchange_history AS CE ")
                    ->group_by(array('base_currency','currency_date_time'));

                    $query = $this->db->get();
//echo   $this->db->last_query();die;
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        

        return $data;
    }
    return false;
    }

    public function fetch_history_data($filter=array()) {
        //$this->db->limit($limit, $start*$limit);
        if(isset($filter['currency']) && $filter['currency']!='' && $filter['currency']!='All'){
            $this->db->where("Currency_Exchange_history.base_currency",$filter['currency']);
         }
         if(isset($filter['currency_date']) && $filter['currency_date']!='' && $filter['currency_date']!='All'){
            $this->db->where("Currency_Exchange_history.currency_date_time",$filter['currency_date']);
         }

        $query = $this->db->get("Currency_Exchange_history");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function fetch_data_by_id($id) {
        //$this->db->limit($limit, $start*$limit);
        $this->db->where('id', $id);
        $query = $this->db->get("Currency_Exchange");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function delete_currencyexchangerates(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        //var_dump($ids);die();

        
        $idsArray = json_decode($ids);
        //var_dump($ids);die();
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Currency_Exchange',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );

            $this->db->insert('delete_log',$data);

        //$idsArray = json_decode($ids);
        
            $this->db->where('id', $id);
            $this->db->delete('Currency_Exchange'); 
        }

        return true;
        
    }
    
}
?>