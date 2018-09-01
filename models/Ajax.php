<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Ajay
 * Description: Ajax Model which process logic for Ajax call
 */
class Ajax_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getInventoryColumns(){
    	 return "response from ajax model";
    }
 }   