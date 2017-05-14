<?php
class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Category_model');
	}
	public function index()
	{
		
		
		$this->load->model('Category_model');  
		$result = $this->Category_model->get_category_list();           
		$data['data'] = $result;
		$this->load->view('Category_view',$data);
	}


	public function dataEntry(){
		$cn =     $this->input->post('txt_cn');
		$action =     $this->input->post('txt_action');
		$name =     $this->input->post('txt_name');		
		$data = array('Name'=>$name);
		if ($action == "edit") {
			$this->db->where('cn',$cn);
			$this->db->update('tbl_category',$data); 
		}   else   {
			$this->db->insert('tbl_category',$data);
		}



		redirect('index.php/Category/index');
	}
}