<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Countriescleanup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_countries_cleanup(){

        $CountryOriginal   = $this->security->xss_clean($this->input->post('country'));
        $CountryNew   = $this->security->xss_clean($this->input->post('newcountry')); 
       
        

        $data = array(

            'CountryOriginal' => ($CountryOriginal!='')?$CountryOriginal:'',
            'CountryNew' => ($CountryNew!='')?$CountryNew:''
           
        );

        $this->db->insert('Clean_Country',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

     public function update_countries_cleanup(){

        $id   = $this->security->xss_clean($this->input->post('id'));
        $CountryOriginal   = $this->security->xss_clean($this->input->post('country'));
        $CountryNew   = $this->security->xss_clean($this->input->post('newcountry')); 
       
        

        $data = array(

            'CountryOriginal' => ($CountryOriginal!='')?$CountryOriginal:'',
            'CountryNew' => ($CountryNew!='')?$CountryNew:''
           
        );

        $this->db->where('id', $id);
        $this->db->update('Clean_Country',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('Clean_Country');
    }

    public function empty_table(){
        $this->db->truncate('Clean_Country');
    }

    public function import_countries_cleanup($data){
        $this->db->insert('Clean_Country',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Clean_Country");
    }

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Clean_Country");
        //var_dump($query->result());die();

        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        //var_dump($data);die();
        return $data;
    }
    return false;
    }

    public function fetch_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("Clean_Country");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_data_by_id_table($id,$table) {
        $this->db->where('id', $id);
        $this->db->where('table', $table);
        $query = $this->db->query("exec USP_Countries_to_be_added_to_clean_country_table");
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

     public function delete_countriescleanup(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Clean_Country',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Clean_Country'); 
        }

        return true;
        
    }

    public function check_for_new_countries(){
                $query = $this->db->query("exec USP_Countries_to_be_added_to_clean_country_table");

        //var_dump($query->result());die();
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