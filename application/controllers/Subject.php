<?php
class Subject extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Subject_model');
	}
	public function index()
	{
		$id =  $this->input->get("id");	
		$result = $this->Subject_model->get_Subject_list($id);           
		$data['data'] = $result;
		$this->load->view('Subject_view',$data);
		
		

		
	}
	public function categoryList($cat_id)
	{
		$result  = $this->Subject_model->get_Subject_list_b($cat_id); 
		$result2 = $this->Subject_model->get_category_list_a();  
		$data['data'] = $result;
		$data['dataCat'] = $result2;
		$this->load->view('Subject_view',$data);
	}
	public function SubjectListByID(){	 
		$result  = $this->Subject_model->get_Subject_list_a(); 
		$result2 = $this->Subject_model->get_category_list_a();  
		$data['data'] = $result;
		$data['dataCat'] = $result2;
		$this->load->view('Subject_view',$data);
	}
	public function dataEntry(){
		$cn =     $this->input->post('txt_cn');
		$action =     $this->input->post('txt_action');
		$categorycn =     $this->input->post('cboCategory');		
		$name =     $this->input->post('txt_name');		
		$data = array('Category_cn'=>$categorycn,'Name'=>$name);
		if ($action == "edit") {
			$this->db->where('cn',$cn);
			$this->db->update('tbl_Subject',$data); 
		}   else   {
			$this->db->insert('tbl_Subject',$data);
		}

		redirect('index.php/Subject/SubjectListByID');
	}
}