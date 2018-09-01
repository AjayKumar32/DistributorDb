<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Dates extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function add_dates(){

        $Date   = $this->security->xss_clean($this->input->post('date'));
        $Year   = $this->security->xss_clean($this->input->post('year')); 
        $WkNum = $this->security->xss_clean($this->input->post('wknum'));

        $MthNum   = $this->security->xss_clean($this->input->post('mthnum'));
        $QtrNum   = $this->security->xss_clean($this->input->post('qtrnum')); 

        $WkTxt = $this->security->xss_clean($this->input->post('WkTxt'));

        $MthTxt   = $this->security->xss_clean($this->input->post('MthTxt'));
        $QtrTxt   = $this->security->xss_clean($this->input->post('QtrTxt')); 



        $WkAbs = $this->security->xss_clean($this->input->post('WkAbs'));

        $MthAbs   = $this->security->xss_clean($this->input->post('MthAbs'));
        $QtrAbs   = $this->security->xss_clean($this->input->post('QtrAbs'));

        $WkAbsNum = $this->security->xss_clean($this->input->post('WkAbsNum')); 

        $MthAbsNum   = $this->security->xss_clean($this->input->post('MthAbsNum'));
        $QtrAbsNum   = $this->security->xss_clean($this->input->post('QtrAbsNum')); 
        /*
        $WkInMthNum = $this->security->xss_clean($this->input->post('wkinmthnum'));
        
        $WkInMthPer   = $this->security->xss_clean($this->input->post('wkinmthper'));
        $WkInMthTot   = $this->security->xss_clean($this->input->post('wkinmthtot')); 
        $WkInQtrNum = $this->security->xss_clean($this->input->post('wkinqtrnum'));

        $WkInQtrPer   = $this->security->xss_clean($this->input->post('wkinqtrper'));
        $WkInQtrTot   = $this->security->xss_clean($this->input->post('wkinqtrtot')); 
        $WkInYrNum = $this->security->xss_clean($this->input->post('wkinyrnum')); 

        $WkInYrPer   = $this->security->xss_clean($this->input->post('wkinyrper'));
        $WkInYrTot   = $this->security->xss_clean($this->input->post('wkinyrtot')); 
        $MthInQtrNum = $this->security->xss_clean($this->input->post('mthinqtrnum'));

        $MthInQtrPer   = $this->security->xss_clean($this->input->post('mthinqtrper'));
        $MthInQtrTot   = $this->security->xss_clean($this->input->post('mthinqtrtot')); 
        $MthInYrNum = $this->security->xss_clean($this->input->post('mthinyrnum'));

        $MthInYrPer   = $this->security->xss_clean($this->input->post('mthinyrper'));
        $MthInYrTot   = $this->security->xss_clean($this->input->post('mthinyrtot')); 
        $QtrInYrNum = $this->security->xss_clean($this->input->post('qtrinyrnum'));


        $QtrInYrPec   = $this->security->xss_clean($this->input->post('qtrinyrpec'));
        $QtrInYrTot   = $this->security->xss_clean($this->input->post('qtrinyrtot')); 

        */
    

        

        $data = array(

            'Date' => $Date,
            'Year' => $Year,
            'WkNum' => $WkNum,

            'MthNum' => $MthNum,
            'QtrNum' => $QtrNum,

            'WkTxt' => $WkTxt,

            'MthTxt' => $MthTxt,
            'QtrTxt' => $QtrTxt,

            'WkAbs' => $WkAbs,

            'MthAbs' => $MthAbs,
            'QtrAbs' => $QtrAbs,
            'WkAbsNum' => $WkAbsNum,

            'MthAbsNum' => $MthAbsNum,
            'QtrAbsNum' => $QtrAbsNum
            /*
            'WkInMthNum' => $WkInMthNum,

            'WkInMthPer' => $WkInMthPer,
            'WkInMthTot' => $WkInMthTot,
            'WkInQtrNum' => $WkInQtrNum,   

            'WkInQtrPer' => $WkInQtrPer,
            'WkInQtrTot' => $WkInQtrTot,

            'WkInYrNum' => $WkInYrNum,
            'WkInYrPer' => $WkInYrPer,
            'WkInYrTot' => $WkInYrTot,

            'MthInQtrNum'=>$MthInQtrNum,
            'MthInQtrPer'=>$MthInQtrPer,
            'MthInQtrTot'=>$MthInQtrTot,
            'MthInYrNum' => $MthInYrNum,

            'MthInYrPer' => $MthInYrPer,
            'MthInYrTot' => $MthInYrTot,
            'QtrInYrNum' => $QtrInYrNum,

            'QtrInYrPec' => $QtrInYrPec,
            'QtrInYrTot' => $QtrInYrTot
        */
        );

        $this->db->insert('Reference_Dates',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function update_dates(){

        $id=$this->security->xss_clean($this->input->post('id'));

        $Date   = $this->security->xss_clean($this->input->post('date'));
        $Year   = $this->security->xss_clean($this->input->post('year')); 
        $WkNum = $this->security->xss_clean($this->input->post('wknum'));

        $MthNum   = $this->security->xss_clean($this->input->post('mthnum'));
        $QtrNum   = $this->security->xss_clean($this->input->post('qtrnum')); 

        $WkTxt = $this->security->xss_clean($this->input->post('WkTxt'));

        $MthTxt   = $this->security->xss_clean($this->input->post('MthTxt'));
        $QtrTxt   = $this->security->xss_clean($this->input->post('QtrTxt')); 



        $WkAbs = $this->security->xss_clean($this->input->post('WkAbs'));

        $MthAbs   = $this->security->xss_clean($this->input->post('MthAbs'));
        $QtrAbs   = $this->security->xss_clean($this->input->post('QtrAbs'));

        $WkAbsNum = $this->security->xss_clean($this->input->post('WkAbsNum')); 

        $MthAbsNum   = $this->security->xss_clean($this->input->post('MthAbsNum'));
        $QtrAbsNum   = $this->security->xss_clean($this->input->post('QtrAbsNum')); 

        

        $data = array(

            
            'Date' => $Date,
            'Year' => $Year,
            'WkNum' => $WkNum,

            'MthNum' => $MthNum,
            'QtrNum' => $QtrNum,

            'WkTxt' => $WkTxt,

            'MthTxt' => $MthTxt,
            'QtrTxt' => $QtrTxt,

            'WkAbs' => $WkAbs,

            'MthAbs' => $MthAbs,
            'QtrAbs' => $QtrAbs,
            'WkAbsNum' => $WkAbsNum,

            'MthAbsNum' => $MthAbsNum,
            'QtrAbsNum' => $QtrAbsNum
        
        );

        $this->db->where('id', $id);
        $this->db->update('Reference_Dates',$data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function get_data(){
        return $this->db->get('Reference_Dates');
    }

     public function empty_table(){
        $this->db->truncate('Reference_Dates');
    }

    public function import_dates($data){
        $this->db->insert('Reference_Dates',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        return $this->db->count_all("Reference_Dates");
    }
/*
    public function fetch_data() {
        //$this->db->limit($limit, $start*$limit);
        $query = $this->db->get("Reference_Dates");
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
            
                $this->db->or_like("Date",$inputdata['search_word']);
                $this->db->or_like("Year",$inputdata['search_word']);
                $this->db->or_like("WkNum",$inputdata['search_word']);
                $this->db->or_like("MthNum",$inputdata['search_word']);
                $this->db->or_like("QtrNum",$inputdata['search_word']);
                $this->db->or_like("WkTxt",$inputdata['search_word']);
                $this->db->or_like("MthTxt",$inputdata['search_word']);
                $this->db->or_like("QtrTxt",$inputdata['search_word']);
                $this->db->or_like("WkAbs",$inputdata['search_word']);
                $this->db->or_like("MthAbs",$inputdata['search_word']);
                $this->db->or_like("QtrAbs",$inputdata['search_word']);
                $this->db->or_like("WkAbsNum",$inputdata['search_word']);
                $this->db->or_like("MthAbsNum",$inputdata['search_word']);
                $this->db->or_like("QtrAbsNum",$inputdata['search_word']);

        }
        $this->db->limit($limit,$offset);
        $this->db->select('*')
                    ->from("Reference_Dates");
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
        $query = $this->db->get("Reference_Dates");
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

     public function delete_dates(){
        $ids   = $this->security->xss_clean($this->input->post('ids'));
        $idsArray = json_decode($ids);
        foreach ($idsArray as $id) {
            $data = array(
                'table'    => 'Reference_Dates',
                'user'     => $this->session->userdata('fname'),
                'user_id'  => $this->session->userdata('userid'),
                'data'     => json_encode($this->fetch_data_by_id($id))
            );
            $this->db->insert('delete_log',$data);
            $this->db->where('id', $id);
            $this->db->delete('Reference_Dates'); 
        }

        return true;
        
    }

    public function getTotal($inputdata=array()){
            if($inputdata['search_word']!='' && $inputdata['search_word']!='0'){
                $this->db->or_like("Date",$inputdata['search_word']);
                $this->db->or_like("Year",$inputdata['search_word']);
                $this->db->or_like("WkNum",$inputdata['search_word']);
                $this->db->or_like("MthNum",$inputdata['search_word']);
                $this->db->or_like("QtrNum",$inputdata['search_word']);
                $this->db->or_like("WkTxt",$inputdata['search_word']);
                $this->db->or_like("MthTxt",$inputdata['search_word']);
                $this->db->or_like("QtrTxt",$inputdata['search_word']);
                $this->db->or_like("WkAbs",$inputdata['search_word']);
                $this->db->or_like("MthAbs",$inputdata['search_word']);
                $this->db->or_like("QtrAbs",$inputdata['search_word']);
                $this->db->or_like("WkAbsNum",$inputdata['search_word']);
                $this->db->or_like("MthAbsNum",$inputdata['search_word']);
                $this->db->or_like("QtrAbsNum",$inputdata['search_word']);

           }
            $this->db->from("Reference_Dates");
            return $this->db->count_all_results();

     }

}
?>