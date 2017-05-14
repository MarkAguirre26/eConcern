<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->helper('url');
  $this->load->database();
}

   

     public function index()
     {
       $this->load->model('user_model');            
       $result = $this->user_model->get_users_list();           
       $data['data'] = $result;
       $this->load->view('users_view',$data);
     }

     public function getby()
     {
      $usertype = $this->input->get("usertype");     
      $this->load->model('user_model');            
      $result = $this->user_model->get_user_by_type($usertype);           
      $data['data'] = $result;
      $this->load->view('users_view',$data);
    }

    public function insertuser(){
      $cn =     $this->input->post('txt_cn');
      $action =     $this->input->post('txt_action');
      $idnumner =     $this->input->post('txt_IDnumber');
      $fullname =     $this->input->post('txt_fullname');
      $email =        $this->input->post('txt_email');
      $password =     $this->input->post('txt_password');
      $usertype =     $this->input->post('r');
      $isapprove =     $this->input->post('rr');     
      $data = array('IDNumber'=>"ID".$idnumner,'Fullname'=>$fullname,'Email'=>$email,'Pwd'=>$password,'Usertype'=>$usertype,'isApproved'=>$isapprove);
      if ($action == "edit") {
        $this->db->where('cn',$cn);
        $this->db->update('tbl_user',$data); 
      }   else   {
       $this->db->insert('tbl_user',$data);
     }



     redirect('index.php/Users/index');
   }
 }