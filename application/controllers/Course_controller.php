<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
	}
	public function index($page = 0){
		$data = ''; 
		$offset = $page;
		//echo $offset;
		//
		$input = array("select" => "*");
		$input['limit'] = array('3', $offset);

		$config['base_url'] = base_url("course_controller/index");
		$config['total_rows'] = 10;
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		//$courses = $this->course_model->getCoursePage($this->input->get("page"));
		$courses = $this->course_model->get_list($input);
		$data = array("courses" => $courses,
					  "title" => 'All');
		$this->load->view('course_catalog',$data);
	}
	public function pick_catalog($catalog,$page = 0){
		$data = ''; 
		$offset = $page;
		$config['base_url'] = base_url("course_controller/pick_catalog/".$catalog);
		$config['total_rows'] = 10;
		$config['per_page'] = 3;
		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);

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
		$input['limit'] = array('3', $offset);
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
	public function filter($page = 0){
		$data ='';

		$offset = $page;
		$config['base_url'] = base_url("course_controller/filter");
		$config['total_rows'] = 10;
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);

		$input = array();
		$level = $this->input->post('level');
		$fee = $this->input->post('fee');
		$input = array('level' => $level[0],
					   'fee' => $fee[0]);
		$input['limit'] = array('3', $offset);
		$courses = $this->course_model->filterCoure($input);
		$data = array("courses" => $courses,
						"title" => "All");
		//return $data;
		$this->load->view('course_catalog',$data);

	}

	public function getCourseDetail($id){
		$course_id = $id;
		//echo $course_id;
		$data['course'] = $this->course_model->getCourseDetail($course_id);
		// echo '<pre>';
		// print_r($data['course']);
		// var_dump($data);
		$this->load->view('course_detail',$data);
	}
}
?>