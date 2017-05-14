<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subject_model extends CI_Model{
 function __construct()
 {
          // Call the Model constructor
  parent::__construct();
}

   
function get_subject_list($id)
{
  $query = $this->db->query("SELECT cn, `Name` FROM tbl_subject  ORDER BY Name ASC");
  $result = $query->result();
  return $result;
}

function get_category_list($id = "")
{
  $query = $this->db->query("SELECT tbl_category.cn,tbl_category.`Name` FROM tbl_category ORDER BY Name ASC");
  $result = $query->result();
  return $result;
}


function get_subject_list_a()
{
  $query = $this->db->query("SELECT cn, `Name` FROM tbl_subject ORDER BY Name ASC");
  $result = $query->result();
  return $result;
}
function get_subject_list_b($cat_id)
{
  $query = $this->db->query("SELECT cn, `Name` FROM tbl_subject where Category_cn = '$cat_id' ORDER BY Name ASC");
  $result = $query->result();
  return $result;
}
function get_category_list_a()
{
  $query = $this->db->query("SELECT tbl_category.cn,tbl_category.`Name` FROM tbl_category ORDER BY Name ASC");
  $result = $query->result();
  return $result;
}


}