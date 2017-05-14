<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model{
 function __construct()
 {
          // Call the Model constructor
  parent::__construct();
}

     //read the department list from db
function get_concerns_list($usertype)
{
  $query = $this->db->query("call sp_record_list('%','$usertype')");
  $result = $query->result();
  return $result;
}

function getByDate($dtfrom,$dtto,$filterType){
  $this->load->database();
  $query = $this->db->query("call sp_getDate('$dtfrom','$dtto','$filterType')");
  return $query->result();
}

function ByStatus($stats,$usertype){
  $this->load->database();
  $query = $this->db->query("call sp_getDataByStatus('$stats','$usertype')");
  return $query->result();
}


}