<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Itemscleanup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_items_cleanup(){

        $ItemOriginal   = $this->security->xss_clean($this->input->post('item'));
        $ItemNew   = $this->security->xss_clean($this->input->post('newitem')); 
       
        

        $data = array(

            'ItemOriginal' => ($ItemOriginal!='')?$ItemOriginal:'',
            'ItemNew' => ($ItemNew!='')?$ItemNew:''
           
        );

        $this->db->insert('Clean_Item',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_items_cleanup(){

        $id=$this->security->xss_clean($this->input->post('id'));

        $ItemOriginal   = $this->security->xss_clean($this->input->post('item'));
        $ItemNew   = $this->security->xss_clean($this->input->post('newitem')); 
       
        

        $data = array(

            'ItemOriginal' => ($ItemOriginal!='')?$ItemOriginal:'',
            'ItemNew' => ($ItemNew!='')?$ItemNew:''
           
        );

        $this->db->where('id', $id);

        $this->db->update('Clean_Item',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('Clean_Item');
    }

     public function empty_table(){
        $this->db->truncate('Clean_Item');
    }

    public function import_customers_cleanup($data){
        $this->db->insert('Clean_Item',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

     public function record_count() {
        return $this->db->count_all("Clean_Item");
    }

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Clean_Item");
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
        $query = $this->db->get("Clean_Item");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function delete_itemscleanup(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Clean_Item',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Clean_Item'); 
        }

        return true;
        
    }

    public function check_for_new_items(){
                $query = $this->db->query("exec USP_Items_to_be_added_to_clean_items_table");

        //print_r($query->result());die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
             
            $data[] = $row;
            //print_r($data);die();
        }

        return $data;
    }
    return false;
    }

     public function fetch_data_by_id_table($id, $table) {
        $this->db->where('id', $id);
        $this->db->where('table', $table);
        $query = $this->db->query("exec USP_Items_to_be_added_to_clean_items_table");
        //print_r($query->row_array()); die();
        //return $query->row_array();
        //var_dump($query); die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            
            $data[] = $row;
            //print_r($data); die();
        }

        //echo "<pre>";print_r($data); die();
        //echo "<pre>";print_r($data['header']);die;

        return $data;
    }
    return false;
    }

}
?>