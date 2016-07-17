<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class View_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
	}
	public function index(){
		$this->load->view('login');
	}
	public function hello(){
		$this->load->view('welcome_view');
	}
	public function test(){
		$input = array();
		$input['limit'] = array('5', 0);
		$member = $this->student_model->get_list($input);
		echo '<pre>';
		print_r($member);
	}
}
?>