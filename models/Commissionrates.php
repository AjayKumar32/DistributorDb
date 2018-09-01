<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Commissionrates extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_commissionrates(){

        $productfamily   = $this->security->xss_clean($this->input->post('productfamily')); 
        $registrable = $this->security->xss_clean($this->input->post('registrable')); 
        $commisionrates = $this->security->xss_clean($this->input->post('commisionrate'));

        $data = array(

            'product_family' => ($productfamily!='')?$productfamily:'',
            'registrable' => ($registrable!='')?$registrable:'',
            'multiplier' => ($commisionrates!='')?$commisionrates:''
        
        );
        //print_r($data);die();
        $this->db->insert('Commision_rates',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

   

    public function update_commissionrates(){

        $id   = $this->security->xss_clean($this->input->post('id'));
         $productfamily   = $this->security->xss_clean($this->input->post('productfamily')); 
        $registrable = $this->security->xss_clean($this->input->post('registrable')); 
        $commisionrates = $this->security->xss_clean($this->input->post('commisionrate'));

        $data = array(

            'product_family' => ($productfamily!='')?$productfamily:'',
            'registrable' => ($registrable!='')?$registrable:'',
            'multiplier' => ($commisionrates!='')?$commisionrates:''
        
        );

        $this->db->where('id', $id);
        $this->db->update('Commision_rates',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

   

    public function get_data(){
        return $this->db->get('Commision_rates');
    }

     public function empty_table(){
        $this->db->truncate('Commision_rates');
    }

    

     public function record_count() {
        return $this->db->count_all("Commision_rates");
    }

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Commision_rates");
        //var_dump($query); die();
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
        $query = $this->db->get("Commision_rates");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //echo "<pre>";print_r($data);die();
        return $data;
    }
    return false;
    }

    


    public function delete_commissionrates(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Commision_rates',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Commision_rates'); 
        }

        return true;
        
    }

   

    
}
?>