<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
 function __construct() {
          // Call the Model constructor
  parent::__construct();
}
function get_users_list(){
  $query = $this->db->query("SELECT tbl_user.cn,REPLACE(tbl_user.IDNumber,'ID','') as IDNumber,tbl_user.Fullname, tbl_user.Email, tbl_user.Pwd, tbl_user.UserType, tbl_user.Verification_code, tbl_user.Remark, tbl_user.isDelete, tbl_user.isApproved FROM tbl_user ORDER BY tbl_user.cn DESC");
  $result = $query->result();
  return $result;
}

function get_user($CompanyID,$email, $pwd){
  $query = $this->db->query("SELECT * FROM tbl_user WHERE BINARY tbl_user.CompanyID = '$CompanyID' AND BINARY tbl_user.IDNumber = CONCAT('ID','$email','') AND BINARY  tbl_user.Pwd = '$pwd' and Remark ='1'");
  $result = $query->result();
  return $result;
}
     // get user
function get_user_by_id($id){
  $this->db->where('cn', $id);
  $query = $this->db->get('tbl_user');
  return $query->result();
}
function get_user_by_type($usertype){
  $this->db->where('UserType', $usertype);
  $query = $this->db->get('tbl_user');
  return $query->result();
}
     // insert
function insert_user($data){
  return $this->db->insert('tbl_user', $data);
}

}