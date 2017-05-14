<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model{
 function __construct()
 {
          // Call the Model constructor
  parent::__construct();
}

   
function get_category_list()
{
  $query = $this->db->query("SELECT tbl_category.cn,tbl_category.`Name` FROM tbl_category ORDER BY Name ASC");
  $result = $query->result();
  return $result;
}




}