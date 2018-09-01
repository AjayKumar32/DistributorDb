<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Customerscleanup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_customers_cleanup(){

        $CustomerOriginal   = $this->security->xss_clean($this->input->post('customer'));
        $CustomerNew   = $this->security->xss_clean($this->input->post('newcustomer')); 
       
        

        $data = array(

            'CustomerOriginal' => ($CustomerOriginal!='')?$CustomerOriginal:'',
            'CustomerNew' => ($CustomerNew!='')?$CustomerNew:''
           
        );

        $this->db->insert('Clean_Customer',$data);
        //var_dump($this->db->affected_rows()); die();
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_customers_cleanup(){

        $id   = $this->security->xss_clean($this->input->post('id'));

        $CustomerOriginal   = $this->security->xss_clean($this->input->post('customer'));
        $CustomerNew   = $this->security->xss_clean($this->input->post('newcustomer')); 
       
        

        $data = array(

            'CustomerOriginal' => ($CustomerOriginal!='')?$CustomerOriginal:'',
            'CustomerNew' => ($CustomerNew!='')?$CustomerNew:''
           
        );

        $this->db->where('id', $id);

        $this->db->update('Clean_Customer',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('Clean_Customer');
    }

     public function empty_table(){
        $this->db->truncate('Clean_Customer');
    }

    public function import_customers_cleanup($data){
        $this->db->insert('Clean_Customer',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Clean_Customer");
    }

    public function fetch_data($inputdata=array()) {
        
        $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            //$this->db->like(array("CustomerOriginal"=>$inputdata['search_word'],"CustomerNew"=>$inputdata['search_word']));
            $this->db->or_like("CustomerOriginal",$inputdata['search_word']);
            $this->db->or_like("CustomerNew",$inputdata['search_word']);

        }
        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("Clean_Customer");
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
                $this->db->or_like("CustomerOriginal",$inputdata['search_word']);
                $this->db->or_like("CustomerNew",$inputdata['search_word']);

           }
            $this->db->from("Clean_Customer");
            return $this->db->count_all_results();

     }

    public function fetch_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("Clean_Customer");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_data_by_id_cleanup($id,$type) {
        $this->db->where('id', $id);
        $this->db->where('Type', $type);
        $query = $this->db->query("exec USP_Customers_to_be_added_to_clean_customer_table");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function delete_customerscleanup(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Clean_Customer',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Clean_Customer'); 
        }

        return true;
        
    }

     public function check_for_new_customers(){
                $query = $this->db->query("exec USP_Customers_to_be_added_to_clean_customer_table");

        //var_dump($query->result());die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }
    public function queryParams($params=array()){
        $querystring  ='?';
       foreach($params as $key => $value) {
            $querystring = $querystring.$key."=".$value."&";
       }

       //print_r($querystring);die;
       return $querystring;

    }
}
?>