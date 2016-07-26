<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
	}
	public function index(){

		$courses = $this->course_model->getCoursePage($this->input->get("page"));
		$this->load->view('course_catalog',array("courses" =>$courses));
	}
	
}
?>