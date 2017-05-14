<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

 
     function get_cridentials()
          {
          $query = $this->db->query("call sp_login('admin','admin')");
          $result = $query->result();
          return $result;
     }
}