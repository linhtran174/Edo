<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('student_model');
		$this->load->model('course_model');
		$this->load->model('classroom_model');
		$this->load->model('topic_model');
		$this->load->model('lesson_model');

	}
	public function index(){

	}

	public function change_stud_info(){
		if($this->student_model->update_rule(array(
			"stud_id" => $this->session->userdata("login")->stud_id),
			$this->input->post()
		))
			echo "success";
		else
			echo "failed";

	}

	public function change_stud_password(){
		$student = $this->student_model->get_info_rule(array(
			"stud_id" => $this->session->userdata("login")->stud_id));
		$old_pass = $this->input->post("old_pass");
		$new_pass = $this->input->post("new_pass");

		if(md5($old_pass)==$student->stud_pass){
			if($this->student_model->update_rule(array(
				"stud_id" => $this->session->userdata("login")->stud_id),
				array("stud_pass" => md5($new_pass))
			)){
				$this->output->set_status_header(200);
				echo "success";
			}
			else
				$this->output->set_status_header(404);
		}
		else{
			$this->output->set_status_header(404);
		}
	}

}
?>