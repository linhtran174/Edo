<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
	}
	public function check_login(){
		$email    = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);
		$where = array('stud_email' => $email, 'stud_pass' => $password);
		if(!$this->student_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Đăng nhập không thành công');
			return FALSE;
		}
		return TRUE;
	}
	
	public function index(){
		$data = '';
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password','Mật khẩu', 'required');
		$this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_login');
		
		if($this->form_validation->run()){
			//lay du lieu tu form post sang
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$password = md5($password);
			$where = array('stud_email' => $email, 'stud_pass' => $password);
			//lay thong tin thanh vien
			$user = $this->student_model->get_info_rule($where);
			 
			//luu thong tin thanh vien vao session
			$this->session->set_userdata('login', $user);
			//tạo thông báo
			$this->session->set_flashdata('flash_message', 'Đăng nhập thành công');
			redirect(site_url("view_controller"),'refresh');//chuyen toi trang chu
		}
		
		$this->load->view('login',$data);
	}
	
	public function log_out(){
		if($this->session->userdata('login') != NULL){
			$this->session->unset_userdata('login');
		}
		$this->session->set_flashdata('flash_message', 'Đăng xuất thành công');
		redirect(site_url("view_controller"),'refresh');
	}
}
?>