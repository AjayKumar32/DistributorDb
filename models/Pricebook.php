<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Pricebook extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_pricebook(){



        $Item   = $this->security->xss_clean($this->input->post('item'));
        $Price   = $this->security->xss_clean($this->input->post('price')); 
        $Currency   = $this->security->xss_clean($this->input->post('currency')); 
        $designregistrable   = $this->security->xss_clean($this->input->post('designregistrable'));
        $validfrom   = $this->security->xss_clean($this->input->post('validfrom')); 
        $productfamily   = $this->security->xss_clean($this->input->post('productfamily'));
        $description   = $this->security->xss_clean($this->input->post('description')); 

        $data = array(

            'Item' => ($Item!='')?$Item:'',
            'dbc' => ($Price!='')?$Price:'',
            'currency' => ($Currency!='')?$Currency:'',
             'design_registration_product' => ($designregistrable!='')?$designregistrable:'',
            'valid_from' => ($validfrom!='')?$validfrom:'',
            'product_family' => ($productfamily!='')?$productfamily:'',
            'description' => ($description!='')?$description:'',
        );

        $this->db->insert('PriceBook',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_pricebook(){

        $id = $this->security->xss_clean($this->input->post('id'));
        $Item   = $this->security->xss_clean($this->input->post('item'));
        $Price   = $this->security->xss_clean($this->input->post('price')); 
        $Currency   = $this->security->xss_clean($this->input->post('currency')); 
        $designregistrable   = $this->security->xss_clean($this->input->post('designregistrable'));
        $validfrom   = $this->security->xss_clean($this->input->post('validfrom')); 
        $productfamily   = $this->security->xss_clean($this->input->post('productfamily'));
        $description   = $this->security->xss_clean($this->input->post('description')); 

        $data = array(

            'Item' => ($Item!='')?$Item:'',
            'dbc' => ($Price!='')?$Price:'',
            'currency' => ($Currency!='')?$Currency:'',
             'design_registration_product' => ($designregistrable!='')?$designregistrable:'',
            'valid_from' => ($validfrom!='')?$validfrom:'',
            'product_family' => ($productfamily!='')?$productfamily:'',
            'description' => ($description!='')?$description:'',
        );

        
        $this->db->where('id', $id);
        $this->db->update('PriceBook',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('PriceBook');
    }

     public function empty_table(){
        $this->db->truncate('PriceBook');
    }

    public function insert_load_log(){

         $data = array(
                'user_id'  => $this->session->userdata('userid'),
                'user'     => $this->session->userdata('fname'),
                'File_name' => $file_info
                
            );
            $this->db->insert('load_log',$data);
        
    }

    public function import_pricebook($data){

        $this->db->insert('PriceBook',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("PriceBook");
    }

    public function fetch_data() {
        $query = $this->db->get("PriceBook");
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
        $query = $this->db->get("PriceBook");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function delete_pricebook(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'PriceBook',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);

            $this->db->where('id', $id);
            $this->db->delete('PriceBook'); 
        }

        return true;
        
    }

    public function getHistoryTotal($inputdata=array()){
            
           if($inputdata['mod_date']!='' && $inputdata['mod_date']!='0'){
             $this->db->where("date_added",$inputdata['mod_date']);
            }
            if($inputdata['Item']!='' && $inputdata['Item']!='All'){
                 $this->db->where("Item",$inputdata['Item']);
            }
            $this->db->from("PriceBook_History");
            return $this->db->count_all_results();
           //echo   $this->db->last_query();die;

     }


      public function fetch_History_data($inputdata=array()) {

        
        $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;

    
        if($inputdata['mod_date']!='' && $inputdata['mod_date']!='0'){
             $this->db->where("date_added",$inputdata['mod_date']);
            }
            if($inputdata['Item']!='' && $inputdata['Item']!='All'){
                 $this->db->where("Item",$inputdata['Item']);
            }

        //$query = $this->db->get("Net_price_percent");
        //echo "<pre>"; var_dump($query); die();
        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("PriceBook_History");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_data_for_filters(){

        $this->db->select('PriceBook_History.Item, PriceBook_History.date_added')
                    ->from("PriceBook_History")
                    ->group_by(array('Item','date_added'));

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
}
?>