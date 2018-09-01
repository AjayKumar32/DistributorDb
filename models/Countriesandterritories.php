<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Countriesandterritories extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_territories(){

        $Territory   = $this->security->xss_clean($this->input->post('territory')); 
        $Sales_Area = $this->security->xss_clean($this->input->post('sales_area')); 

        $data = array(

            'sales_territory' => ($Territory!='')?$Territory:'',
            'sales_area' => ($Sales_Area!='')?$Sales_Area:''
        
        );
        //print_r($data);die();
        $this->db->insert('sales_territory_sales_area_mapping',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function add_countries(){

        $country   = $this->security->xss_clean($this->input->post('country')); 
        $sales_territory = $this->security->xss_clean($this->input->post('sales_territory')); 

        $data = array(

            'country' => ($country!='')?$country:'',
            'sales_territory' => ($sales_territory!='')?$sales_territory:''
        
        );
        //print_r($data);die();
        $this->db->insert('country_sales_territory_mapping',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_territories(){

        $id   = $this->security->xss_clean($this->input->post('id'));
        $Territory   = $this->security->xss_clean($this->input->post('territory')); 
        $Sales_Area = $this->security->xss_clean($this->input->post('sales_area')); 

        $data = array(

            'sales_territory' => ($Territory!='')?$Territory:'',
            'sales_area' => ($Sales_Area!='')?$Sales_Area:''
        
        );

        $this->db->where('id', $id);
        $this->db->update('sales_territory_sales_area_mapping',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_countries(){

        $id   = $this->security->xss_clean($this->input->post('id'));
        $Country   = $this->security->xss_clean($this->input->post('country'));
        $Territory   = $this->security->xss_clean($this->input->post('sales_territory')); 

        $data = array(

            'country' => ($Country!='')?$Country:'',
            'sales_territory' => ($Territory!='')?$Territory:'',
        
        );

        $this->db->where('id', $id);
        $this->db->update('country_sales_territory_mapping',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('sales_territory_sales_area_mapping');
    }

     public function empty_table(){
        $this->db->truncate('Reference_Country');
    }

    public function import_countriesandterritories($data){
        $this->db->insert('Reference_Country',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

     public function record_count() {
        return $this->db->count_all("Reference_Country");
    }

    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Reference_Country");
        //var_dump($query); die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_salesTerritory_data() {
        //$this->db->limit($limit, $start*$limit);
        
        $query = $this->db->get("sales_territory_sales_area_mapping");
        //var_dump($query); die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_countries_data() {
        //$this->db->limit($limit, $start*$limit);
        
        $query = $this->db->get("country_sales_territory_mapping");
        //var_dump($query); die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_data_by_id_sales_territory($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("sales_territory_sales_area_mapping");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_data_by_id_country($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("country_sales_territory_mapping");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_sales_area_data() {
        $query = $this->db->get("sales_area");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_territories_data() {
        $query = $this->db->get("sales_territory");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function delete_territories(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'sales_territory_sales_area_mapping',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id_sales_territory($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('sales_territory_sales_area_mapping'); 
        }

        return true;
        
    }

    public function delete_countries(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'country_sales_territory_mapping',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id_country($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('country_sales_territory_mapping'); 
        }

        return true;
        
    }

    
}
?>