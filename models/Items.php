<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Items extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_items(){

        $Item   = $this->security->xss_clean($this->input->post('item'));
        $Bulk_Output   = $this->security->xss_clean($this->input->post('bulk_output')); 
        $Item_No_Pack = $this->security->xss_clean($this->input->post('item_no_pack'));

        $Item_NoCan_NoSL   = $this->security->xss_clean($this->input->post('item_nocan_nosl'));
        $Item_NoCan_NoSl_NoPack   = $this->security->xss_clean($this->input->post('item_nocan_nosl_nopack')); 
        $Forecast_Item = $this->security->xss_clean($this->input->post('forecast_item'));

        $Pack   = $this->security->xss_clean($this->input->post('pack'));
        $Item_Class   = $this->security->xss_clean($this->input->post('itemclass')); 
        $Internal_Class = $this->security->xss_clean($this->input->post('internal_class')); 

        $Mkt_Family   = $this->security->xss_clean($this->input->post('mktfamily'));
        $First_Segment   = $this->security->xss_clean($this->input->post('first_segment')); 
        $Density = $this->security->xss_clean($this->input->post('density'));
        
        $Package   = $this->security->xss_clean($this->input->post('package'));
        $CANcode_SLcode   = $this->security->xss_clean($this->input->post('cancode_slcode')); 
        $CANCode = $this->security->xss_clean($this->input->post('cancode'));

        $SLCode   = $this->security->xss_clean($this->input->post('slcode'));
        $Die   = $this->security->xss_clean($this->input->post('die')); 
        $Fab = $this->security->xss_clean($this->input->post('fab')); 

        $Fab_Origin   = $this->security->xss_clean($this->input->post('fab_origin'));
        $Leadtime_Type   = $this->security->xss_clean($this->input->post('leadtime_type')); 
        $Leadtime = $this->security->xss_clean($this->input->post('leadtime'));

        

        $data = array(

            'Item' => ($Item!='')?$Item:'',
            'Bulk_Output' => ($Bulk_Output!='')?$Bulk_Output:'',
            'Item_No_Pack' => ($Item_No_Pack!='')?$Item_No_Pack:'',

            'Item_NoCan_NoSL' => ($Item_NoCan_NoSL!='')?$Item_NoCan_NoSL:'',
            'Item_NoCan_NoSl_NoPack' => ($Item_NoCan_NoSl_NoPack!='')?$Item_NoCan_NoSl_NoPack:'',
            'Forecast_Item' => ($Forecast_Item!='')?$Forecast_Item:'',
            'Pack' => ($Pack!='')?$Pack:'',
            'Item_Class' => ($Item_Class!='')?$Item_Class:'',
            'Internal_Class' => ($Internal_Class!='')?$Internal_Class:'',
            'Mkt_Family' => ($Mkt_Family!='')?$Mkt_Family:'',
            'First_Segment' => ($First_Segment!='')?$First_Segment:'',
            'Density' => ($Density!='')?$Density:'',
            'Package' => ($Package!='')?$Package:'',
            'CANcode_SLcode' => ($CANcode_SLcode!='')?$CANcode_SLcode:'',
            'CANCode' => ($CANCode!='')?$CANCode:'',
            'SLCode' => ($SLCode!='')?$SLCode:'',
            'Die' => ($Die!='')?$Die:'',
            'Fab' => ($Fab!='')?$Fab:'',

            'Fab_Origin' => ($Fab_Origin!='')?$Fab_Origin:'',
            'Leadtime_Type' => ($Leadtime_Type!='')?$Leadtime_Type:'',
            'Leadtime' => ($Leadtime!='')?$Leadtime:''
        
        );

        $this->db->insert('Reference_Item',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_items(){

        $id=$this->security->xss_clean($this->input->post('id'));

        $Item   = $this->security->xss_clean($this->input->post('item'));
        $Bulk_Output   = $this->security->xss_clean($this->input->post('bulk_output')); 
        $Item_No_Pack = $this->security->xss_clean($this->input->post('item_no_pack'));

        $Item_NoCan_NoSL   = $this->security->xss_clean($this->input->post('item_nocan_nosl'));
        $Item_NoCan_NoSl_NoPack   = $this->security->xss_clean($this->input->post('item_nocan_nosl_nopack')); 
        $Forecast_Item = $this->security->xss_clean($this->input->post('forecast_item'));

        $Pack   = $this->security->xss_clean($this->input->post('pack'));
        $Item_Class   = $this->security->xss_clean($this->input->post('itemclass')); 
        $Internal_Class = $this->security->xss_clean($this->input->post('internal_class')); 

        $Mkt_Family   = $this->security->xss_clean($this->input->post('mktfamily'));
        $First_Segment   = $this->security->xss_clean($this->input->post('first_segment')); 
        $Density = $this->security->xss_clean($this->input->post('density'));
        
        $Package   = $this->security->xss_clean($this->input->post('package'));
        $CANcode_SLcode   = $this->security->xss_clean($this->input->post('cancode_slcode')); 
        $CANCode = $this->security->xss_clean($this->input->post('cancode'));

        $SLCode   = $this->security->xss_clean($this->input->post('slcode'));
        $Die   = $this->security->xss_clean($this->input->post('die')); 
        $Fab = $this->security->xss_clean($this->input->post('fab')); 

        $Fab_Origin   = $this->security->xss_clean($this->input->post('fab_origin'));
        $Leadtime_Type   = $this->security->xss_clean($this->input->post('leadtime_type')); 
        $Leadtime = $this->security->xss_clean($this->input->post('leadtime'));

        

        $data = array(

            'Item' => ($Item!='')?$Item:'',
            'Bulk_Output' => ($Bulk_Output!='')?$Bulk_Output:'',
            'Item_No_Pack' => ($Item_No_Pack!='')?$Item_No_Pack:'',

            'Item_NoCan_NoSL' => ($Item_NoCan_NoSL!='')?$Item_NoCan_NoSL:'',
            'Item_NoCan_NoSl_NoPack' => ($Item_NoCan_NoSl_NoPack!='')?$Item_NoCan_NoSl_NoPack:'',
            'Forecast_Item' => ($Forecast_Item!='')?$Forecast_Item:'',
            'Pack' => ($Pack!='')?$Pack:'',
            'Item_Class' => ($Item_Class!='')?$Item_Class:'',
            'Internal_Class' => ($Internal_Class!='')?$Internal_Class:'',
            'Mkt_Family' => ($Mkt_Family!='')?$Mkt_Family:'',
            'First_Segment' => ($First_Segment!='')?$First_Segment:'',
            'Density' => ($Density!='')?$Density:'',
            'Package' => ($Package!='')?$Package:'',
            'CANcode_SLcode' => ($CANcode_SLcode!='')?$CANcode_SLcode:'',
            'CANCode' => ($CANCode!='')?$CANCode:'',
            'SLCode' => ($SLCode!='')?$SLCode:'',
            'Die' => ($Die!='')?$Die:'',
            'Fab' => ($Fab!='')?$Fab:'',

            'Fab_Origin' => ($Fab_Origin!='')?$Fab_Origin:'',
            'Leadtime_Type' => ($Leadtime_Type!='')?$Leadtime_Type:'',
            'Leadtime' => ($Leadtime!='')?$Leadtime:''
        
        );

        $this->db->where('id', $id);

        $this->db->update('Reference_Item',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }


    public function get_data(){
        return $this->db->get('Reference_Item');
    }

     public function empty_table(){
        $this->db->truncate('Reference_Item');
    }

    public function import_items($data){
        $this->db->insert('Reference_Item',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Reference_Item");
    }
/*
    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Reference_Item");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }
*/
    public function fetch_data($inputdata=array()) {
        
        $offset = isset($inputdata['offset'])?$inputdata['offset']:0;
        $limit = isset($inputdata['limit'])?$inputdata['limit']:100;
        if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
            
                $this->db->or_like("Item",$inputdata['search_word']);
                $this->db->or_like("Bulk_Output",$inputdata['search_word']);
                $this->db->or_like("Item_No_Pack",$inputdata['search_word']);
                $this->db->or_like("Item_NoCan_NoSL",$inputdata['search_word']);
                $this->db->or_like("Item_NoCan_NoSl_NoPack",$inputdata['search_word']);
                $this->db->or_like("Forecast_Item",$inputdata['search_word']);
                $this->db->or_like("Pack",$inputdata['search_word']);
                $this->db->or_like("Item_Class",$inputdata['search_word']);
                $this->db->or_like("Internal_Class",$inputdata['search_word']);
                $this->db->or_like("Mkt_Family",$inputdata['search_word']);
                $this->db->or_like("First_Segment",$inputdata['search_word']);
                $this->db->or_like("Density",$inputdata['search_word']);
                $this->db->or_like("Package",$inputdata['search_word']);
                $this->db->or_like("CANcode_SLcode",$inputdata['search_word']);
                $this->db->or_like("CANCode",$inputdata['search_word']);
                $this->db->or_like("SLCode",$inputdata['search_word']);
                $this->db->or_like("Die",$inputdata['search_word']);
                $this->db->or_like("Fab",$inputdata['search_word']);
                $this->db->or_like("Fab_Origin",$inputdata['search_word']);
                $this->db->or_like("Leadtime_Type",$inputdata['search_word']);
                $this->db->or_like("Leadtime",$inputdata['search_word']);
        }
        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("Reference_Item");
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
    
    public function fetch_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("Reference_Item");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function delete_items(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Reference_Item',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Reference_Item'); 
        }

        return true;
        
    }

    public function getTotal($inputdata=array()){
            if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
                $this->db->or_like("Item",$inputdata['search_word']);
                $this->db->or_like("Bulk_Output",$inputdata['search_word']);
                $this->db->or_like("Item_No_Pack",$inputdata['search_word']);
                $this->db->or_like("Item_NoCan_NoSL",$inputdata['search_word']);
                $this->db->or_like("Item_NoCan_NoSl_NoPack",$inputdata['search_word']);
                $this->db->or_like("Forecast_Item",$inputdata['search_word']);
                $this->db->or_like("Pack",$inputdata['search_word']);
                $this->db->or_like("Item_Class",$inputdata['search_word']);
                $this->db->or_like("Internal_Class",$inputdata['search_word']);
                $this->db->or_like("Mkt_Family",$inputdata['search_word']);
                $this->db->or_like("First_Segment",$inputdata['search_word']);
                $this->db->or_like("Density",$inputdata['search_word']);
                $this->db->or_like("Package",$inputdata['search_word']);
                $this->db->or_like("CANcode_SLcode",$inputdata['search_word']);
                $this->db->or_like("CANCode",$inputdata['search_word']);
                $this->db->or_like("SLCode",$inputdata['search_word']);
                $this->db->or_like("Die",$inputdata['search_word']);
                $this->db->or_like("Fab",$inputdata['search_word']);
                $this->db->or_like("Fab_Origin",$inputdata['search_word']);
                $this->db->or_like("Leadtime_Type",$inputdata['search_word']);
                $this->db->or_like("Leadtime",$inputdata['search_word']);
                

           }
            $this->db->from("Reference_Item");
            return $this->db->count_all_results();

     }
}
?>