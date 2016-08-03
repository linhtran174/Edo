<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
		$this->load->model('topic_model');
		$this->load->model('lesson_model');
		$this->load->model('review_model');
		$this->load->model('teacher_model');
	}
	public function index(){
		$this->load->view('course_catalog');
	}

	public function list_course(){
		$category = $this->input->post("category");
		$name = $this->input->post("name");
		$fee = $this->input->post("fee");
		$level = $this->input->post("level");

		$get_data = array("category" => $category,
						  "name" => $name,
						  "level" => $level,
						  "fee" => $fee);

		$title = "ALL";
		// echo "<pre>";
		// print_r($get_data);
		if($get_data["level"] != null && $get_data != null){
			$courses = $this->filter($fee, $level);
		}
		else{
			if($get_data["name"] != null){
				$courses = $this->course_model->search($name);
			}
			else{
				if($get_data["category"] == null || $get_data["category"] == 0){
					$input = array("select" => "*");
					$courses = $this->course_model->get_list($input);
				}
				else{
					if($category == 1){ 
						$title = "Android";
					}
					else if($category == 2){ 
						$title = "Non-tech";
					}
					else if($category == 3){ 
						$title = "Web";
					}
					else if($category == 4){ 
						$title = "Database";
					}
					else if($category == 5){ 
						$title = "Data Science";
					}
					$courses = $this->switch_catalog($get_data['category']);

				}
			}
		}
		$data = array("courses" => $courses,
					  "title" => $title);

		$this->load->view('course_list',$data);
	}


	public function switch_catalog($category){
		$input = array();
	    $input['where'] = array('course_cate' => $category);
	    $courses = $this->course_model->get_list($input);
	    return $courses;
	}

	public function filter($fee, $level){
		$input = array("fee" => $fee,
					   "level" => $level);
		$courses = $this->course_model->filter_course($input);
		return $courses;

	}

	public function get_course_detail($id = 0, $page = 0){
		if (!$id) {
			show_error("Invalid ID");
		}
		$course_id = $id;
		// echo $course_id;
		$data['course'] = $this->course_model->get_course_detail($course_id);
		if (!$data['course'] ) {
			show_error("Không tìm thấy khóa học!");
		}
		$input['where'] = array('topic_courseId'=>$course_id);
		$topics = $this->topic_model->get_list($input);
		if(!$topics){
			show_error("Đã có lỗi xảy ra! (get_list_topics_failed)");
		}
		foreach($topics as $t){
			$input['where'] = array('lesson_topicId' => $t->topic_id);
			$lessons = $this->lesson_model->get_list($input);
			if(!$lessons){
				show_error("Đã có lỗi xảy ra! (get_list_lessons_failed)");
			}
			
			$result[$t->topic_id]['topic_id'] = $t->topic_id;
			$result[$t->topic_id]['topic_name'] = $t->topic_name;
			$result[$t->topic_id]['lessons'] = $lessons;
		}
		// var_dump($result);
		$data['topics'] = $result;

		if($data['course'][0]->course_rate == 0){
			$data['total'] = 0;
			$data['avg'] = 0;
			$data['review'] = 0;
		} else {
			$input['where'] = array('review_course'=>$course_id);
			$input['select'] = array('review_rate');
			$rows = $this->review_model->get_list($input);
			if(!$rows){
				show_error("Đã có lỗi xảy ra! (get_list_reviews_failed)");
			}
			$total = count($rows);
			// var_dump($rows);

			$table = array(
				"5"=>0,
				"4"=>0,
				"3"=>0,
				"2"=>0,
				"1"=>0,
				);
			foreach ($rows as $r) {
				switch($r->review_rate) {
					case 1 : $table[1]++;break;
					case 2 : $table[2]++;break;
					case 3 : $table[3]++;break;
					case 4 : $table[4]++;break;
					case 5 : $table[5]++;break;
				}
			}
			$data['total'] = $total;
			$data['avg'] = $table;
			// $data['reviews'] = $rows;

			// echo '<pre>';
			// print_r($data);

			$config['base_url'] = base_url("index.php/course_controller/get_course_detail") . "/" . $course_id;
			$config['uri_segment']= 4;
			$config['total_rows'] = $total;
			$config['per_page']  = 5;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			if($page == null){
				$offset = 0;
			}
			else {
				$offset = (int)($page);
			}

			$data['reviews'] = $this->review_model->get_review_and_student_list($course_id, $config['per_page'], $offset);
			if(!$data['reviews']){
				show_error("Đã có lỗi xảy ra! (get_list_reviews_join_stud_failed)");
			}
		}
		// echo '<pre>';
		// print_r($data);
		// echo $this->pagination->create_links();
		$this->load->view('course_detail',$data);

	}
}
?>