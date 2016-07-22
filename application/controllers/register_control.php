<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_control extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
	}
	public function index(){
		$data = '';
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
		$this->form_validation->set_rules('fname', 'Tên', 'required');
		$this->form_validation->set_rules('lname', 'Họ', 'required');
		$this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]');
		
		if($this->form_validation->run()){
			$data = array(
					'stud_fname'     => $this->input->post('fname'),
					'stud_email'    => $this->input->post('email'),
					'stud_pass' => md5($this->input->post('password')),
					'stud_lname'    => $this->input->post('lname'),
			);
			if($this->student_model->create($data))
			{
				$this->session->set_flashdata('flash_message', 'Dang ky thanh vien thanh cong');
				redirect(site_url("login_controller"),'location');//chuyen toi trang chu
			}
		}
		$this->load->view('register',$data);
	}
	function check_email()
	{
	
		$email = $this->input->post('email');
		$where = array();
		$where['stud_email'] = $email;
		//kiểm tra điều kiện email có tồn tại trong csdl hay không
		if($this->student_model->check_exists($where))
		{
			//trả về thông báo lỗi nếu đã tồn tại email này
			$this->form_validation->set_message(__FUNCTION__, 'Email đã sử dụng');
			return FALSE;
		}
		return TRUE;
	}
}
?>