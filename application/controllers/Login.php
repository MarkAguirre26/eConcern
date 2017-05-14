<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('user_model');
	}
	public function index()
	{
		$CompanyID  = $this->input->post("CompanyID");
		$email = $this->input->post("IDNumber");
		$password = $this->input->post("Pwd");

		$this->form_validation->set_rules("CompanyID", "Company ID", "trim|required");
		$this->form_validation->set_rules("IDNumber", "ID Number", "trim|required");
		$this->form_validation->set_rules("Pwd", "Password", "trim|required");

		if ($this->form_validation->run() == FALSE)
		{
	
			$this->load->view('login_view');
		}
		else
		{

	
			$uresult = $this->user_model->get_user($CompanyID,$email, $password);
			if (count($uresult) > 0)
			{
				
				$Fullname = $uresult[0]->Fullname;
				$UserType = $uresult[0]->UserType;
				$utype="";
				$this->session->set_userdata('user_fullname', $Fullname);
				if($UserType==1){
					$utype="%";
					$this->session->set_userdata('logged_in', $utype);
					redirect("index.php/Home/index?usertype=".$utype);
					
				}else if($UserType==7){
					$utype="3";
					$this->session->set_userdata('logged_in', $utype);
					redirect("index.php/Home/index?usertype=".$utype);
					
				}else if($UserType==6){
					$utype="4";
					$this->session->set_userdata('logged_in', $utype);
					redirect("index.php/Home/index?usertype=".$utype);
				
				}else if($UserType==5){
					$utype="2";
					$this->session->set_userdata('logged_in', $utype);
					redirect("index.php/Home/index?usertype=".$utype);
				
				}elseif ($UserType == 2) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">User Access Denied</div>');
					redirect('index.php/Login');

				}
				

				
			}
			else
			{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please double check your credentials!</div>');
				redirect('index.php/Login');
			}
		}
	}
}