<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_classroom extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('student_model');
		$this->load->model('course_model');
		$this->load->model('classroom_model');

	}
	public function index(){
		
		if($this->session->userdata('login')==NULL) {
			redirect(site_url('login_controller'),'refresh');
		}
		else {
			$student = $this->session->userdata('login')->stud_id;
			$studentClassrooms = $this->classroom_model->get_student_classrooms($student);
			//print_r($student);

			$courseInfo = array();
			foreach ($studentClassrooms as $index => $classroom) {
				$courseInfo[$index] =
				$this->course_model->get_course_detail($classroom->class_course)[0];
			}
			//print_r($courseInfo);
			
			$this->load->view('my_classroom.php',array("courses" => $courseInfo));
		}
	}

}
?>