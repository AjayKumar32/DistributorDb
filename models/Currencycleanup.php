<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Currencycleanup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_currency_cleanup(){

        $CurrencyOriginal   = $this->security->xss_clean($this->input->post('currency'));
        $CurrencyNew   = $this->security->xss_clean($this->input->post('newcurrency')); 
        

        $data = array(

            'CurrencyOriginal' => ($CurrencyOriginal!='')?$CurrencyOriginal:'',
            'CurrencyNew' => ($CurrencyNew!='')?$CurrencyNew:'',
           
        );

        $this->db->insert('Clean_Currency',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function add_currency(){

        $Currency  = $this->security->xss_clean($this->input->post('currency'));
        $Currency_Decription   = $this->security->xss_clean($this->input->post('currencydescription')); 
        

        $data = array(

            'currency' => ($Currency!='')?$Currency:'',
            'currency_description' => ($Currency_Decription!='')?$Currency_Decription:''
           
        );

        $this->db->insert('currency',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_currency_cleanup(){

        $id=$this->security->xss_clean($this->input->post('id'));

        $CurrencyOriginal   = $this->security->xss_clean($this->input->post('currency'));
        $CurrencyNew   = $this->security->xss_clean($this->input->post('newcurrency')); 
        

        $data = array(

            'CurrencyOriginal' => ($CurrencyOriginal!='')?$CurrencyOriginal:'',
            'CurrencyNew' => ($CurrencyNew!='')?$CurrencyNew:'',
           
        );

        $this->db->where('id', $id);

        $this->db->update('Clean_Currency',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_currency(){

        $id=$this->security->xss_clean($this->input->post('id'));

        $currency   = $this->security->xss_clean($this->input->post('currency'));
        $currency_description   = $this->security->xss_clean($this->input->post('currency_description')); 
        

        $data = array(

            'currency' => ($currency!='')?$currency:'',
            'currency_description' => ($currency_description!='')?$currency_description:''
           
        );

        $this->db->where('id', $id);

        $this->db->update('currency',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('Clean_Currency');
    }

     public function empty_table(){
        $this->db->truncate('Clean_Currency');
    }

    public function import_currency_cleanup($data){
        $this->db->insert('Clean_Currency',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function record_count() {
        return $this->db->count_all("Clean_Currency");
    }

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Clean_Currency");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function fetch_currency_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("currency");
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
        $query = $this->db->get("Clean_Currency");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_currency_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("currency");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }


    public function delete_currencycleanup(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Clean_Currency',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Clean_Currency'); 
        }

        return true;
        
    }

    public function delete_currency(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'currency',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_currency_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('currency'); 
        }

        return true;
        
    }

    public function check_for_new_currency(){
                $query = $this->db->query("exec USP_Currency_to_be_added_to_clean_currency_table");

        //var_dump($query->result());die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     
     public function fetch_data_by_id_table($id,$table,$type) {
        $this->db->where('id', $id);
        $this->db->where('table', $table);
        $this->db->where('table', $type);
        $query = $this->db->query("exec USP_Currency_to_be_added_to_clean_currency_table");
        //var_dump($query); die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        //echo "<pre>";print_r($data); die();
        //echo "<pre>";print_r($data['header']);die;

        return $data;
    }
    return false;
    }
}
?>