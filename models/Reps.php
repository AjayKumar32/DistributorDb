<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Reps extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_rep(){

        $Sales_Rep   = $this->security->xss_clean($this->input->post('sales_rep'));
        $Rep_Class   = $this->security->xss_clean($this->input->post('rep_class'));
        $Sales_Person   = $this->security->xss_clean($this->input->post('sales_person')); 
       

        $data = array(

            'Sales_Rep' => ($Sales_Rep!='')?$Sales_Rep:'',
            'Rep_Class' => ($Rep_Class!='')?$Rep_Class:'',
            'Sales_Person' => ($Sales_Person!='')?$Sales_Person:''
        
        );

        $this->db->insert('Rep_To_SalesPerson',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function add_salesperson(){

        $Sales_Person   = $this->security->xss_clean($this->input->post('sales_person')); 
       

        $data = array(

            'sales_person' => ($Sales_Person!='')?$Sales_Person:''
        
        );

        $this->db->insert('salesperson',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_rep(){

        $id = $this->security->xss_clean($this->input->post('id'));
        $Sales_Rep   = $this->security->xss_clean($this->input->post('sales_rep'));
        $rep_class   = $this->security->xss_clean($this->input->post('rep_class'));
        $Sales_Person   = $this->security->xss_clean($this->input->post('sales_person')); 
       

        $data = array(

            'Sales_Rep' => ($Sales_Rep!='')?$Sales_Rep:'',
            'Rep_Class' => ($rep_class!='')?$rep_class:'',
            'Sales_Person' => ($Sales_Person!='')?$Sales_Person:''
        
        );

        $this->db->where('id', $id);
        $this->db->update('Rep_To_SalesPerson',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_salesperson(){

        $id = $this->security->xss_clean($this->input->post('id'));
        $Sales_Person   = $this->security->xss_clean($this->input->post('sales_person')); 
       

        $data = array(

            'sales_person' => ($Sales_Person!='')?$Sales_Person:''
        
        );

        $this->db->where('id', $id);
        $this->db->update('salesperson',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }


     public function get_data(){
        return $this->db->get('Rep_To_SalesPerson');
    }

     public function empty_table(){
        $this->db->truncate('Rep_To_SalesPerson');
    }

    public function import_reps($data){
        $this->db->insert('Rep_To_SalesPerson',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Rep_To_SalesPerson");
    }

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Rep_To_SalesPerson");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function fetch_sales_rep_data() {
        //$this->db->limit($limit, $start*$limit);
        $this->db->select('Sales_Rep')
                ->from("Rep_To_SalesPerson");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }
    public function fetch_sales_person_data() {
        //$this->db->limit($limit, $start*$limit);
        $this->db->select('Sales_Person')
                ->from("Rep_To_SalesPerson");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_salespersons_data() {
        $query = $this->db->get("salesperson");
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
        $query = $this->db->get("Rep_To_SalesPerson");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_sales_persons() {
        $query = $this->db->get("salesperson");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_rep_class() {
        $query = $this->db->get("rep_class");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function fetch_data_by_id_salesperson($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("salesperson");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function delete_rep(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Rep_To_SalesPerson',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
        
            $this->db->where('id', $id);
            $this->db->delete('Rep_To_SalesPerson'); 
        }

        return true;
        
    }

    public function delete_salesperson(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'salesperson',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id_salesperson($id))
            );
            $this->db->insert('delete_log',$data);
        
            $this->db->where('id', $id);
            $this->db->delete('salesperson'); 
        }

        return true;
        
    }


    public function gettopCustomers(){
        
        
    }

     
}
?>