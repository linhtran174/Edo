<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class View_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		$this->load->model('course_model');
	}
	public function index(){
		$this->load->view('index');
// 		$this->load->view('login');
	}
	
	public function sign_in(){
		$this->load->view('login');
	}
	public function request_pass(){
		$this->load->view('requestPassword');
	}
	public function course_catalog(){
		$this->load->view('course_catalog');
	}
	public function hello(){
		$this->load->view('index');
	}
	public function register(){
		$this->load->view('register');
	}
	public function test(){
		$input = array();
		$input['limit'] = array('5', 0);
		$member = $this->course_model->get_list($input);
		echo '<pre>';
		print_r($member);
	}


	public function detail(){
		$this->load->view('course_detail');

	}

}
?>