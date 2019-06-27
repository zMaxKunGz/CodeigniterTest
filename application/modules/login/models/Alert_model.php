<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert_model extends CI_Model {
  public function __construct()
  {
    //$anotherdb = $this->load->database("anotherdb",TRUE);
  }
  public function get_alert_type(){
    $obj = $this->db->get('alert_type')
                    ->result_array();
    return $obj;
  }
  public function add_alert($qstr){
    $obj = $this->db->insert('alert',$qstr);
    return $obj;
  }
}
