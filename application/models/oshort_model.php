<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oshort_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->tbl = "o_url";
	$this->tbl2= "o_url_access";
    }
    function insert($rec){
        $this->db->insert($this->tbl,$rec);
    }
    function insert_track($rec){
        $this->db->insert($this->tbl2,$rec);
    }
    function geturl($where){
        $this->db->where($where);
        return $this->db->get($this->tbl);
    }
	
}
