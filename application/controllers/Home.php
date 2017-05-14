<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
       // $this->load->model('home_model');
	}

	
		public function index()	{
		$utype =  $this->input->get("usertype");
		$this->load->model('Home_model');  
		$result = $this->Home_model->get_concerns_list($utype);           
		$data['data'] = $result;
		$this->load->view('Home_view', $data);
	}

	public function getbydate()
	{
		$dtfrom = $this->input->get("datefrom");  
		$dtto = $this->input->get("dateto");   
		$filter = $this->input->get("filterType");   
		$this->load->model('Home_model');            
		$result = $this->Home_model->getByDate($dtfrom,$dtto,$filter);           
		$data['data'] = $result;
		$this->load->view('Home_view',$data);
	}


public function getbyStatus()
	{		
		$stat = $this->input->get("stat");
		$utype =  $this->input->get("usertype");
		$this->load->model('Home_model');  
		$this->session->set_userdata('filterStatus', $stat);          
		$result = $this->Home_model->ByStatus($stat,$utype);           
		$data['data'] = $result;
		$this->load->view('Home_view',$data);
	}


	public function update(){
		$status =$this->input->POST('txt_setStatus');
		$cn = $this->input->POST('cn');
		$data=array('Statuss'=>$status);
		$this->db->where('cn',$cn);
		$this->db->update('tbl_content',$data);
		redirect('index.php/Home/index');
	}

	function logout(){
		$data = array('login' => '', 'uname' => '', 'uid' => '');
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		redirect('index.php/login/index');
	}
}
