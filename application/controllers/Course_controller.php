<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
	}
	public function index(){
		$data = '';
		$courses = $this->course_model->getCoursePage($this->input->get("page"));
		$data = array("courses" => $courses,
					  "title" => 'All');
		$this->load->view('course_catalog',$data);
	}
	public function pick_catalog($catalog){
		$data = '';
		if($catalog == 1){ 
			$title = "Android";
		}
		else if($catalog == 2){ 
			$title = "Non-tech";
		}
		else if($catalog == 3){ 
			$title = "Web";
		}
		else if($catalog == 4){ 
			$title = "Database";
		}
		else if($catalog == 5){ 
			$title = "Data Science";
		}
		$input = array();
		$input['where'] = array('course_cate' => $catalog);
		$courses = $this->course_model->get_list($input);
		$data = array("courses" => $courses,
						"title" => $title);
		// echo $title;
		// echo '<pre>';
		// print_r($courses);
		$this->load->view('course_catalog',$data);
	}
	public function search(){
		$data = '';
		$input = array();
		$name = $this->input->post('name');
		$input['where'] = array('course_name' => $name);
		$courses = $this->course_model->get_list($input);
		$data = array("courses" => $courses,
						"title" => "All");
		$this->load->view('course_catalog',$data);
	}
	public function filter(){
		$data ='';
		$input = array();
		$level = $this->input->post('level');
		$fee = $this->input->post('fee');
		$input = array('level' => $level[0],
					   'fee' => $fee[0]);
		$courses = $this->course_model->filterCoure($input);
		$data = array("courses" => $courses,
						"title" => "All");
		$this->load->view('course_catalog',$data);

	}
}
?>