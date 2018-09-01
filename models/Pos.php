<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Pos extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function fetch_data() {
        $query = $this->db->get("Pos");
        //var_dump($query); die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

   } 