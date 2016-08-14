<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_Controller extends CI_Controller{
	var $category = 0;
	var $name = 'null';
	var $level = null;
	var $fee = null;
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
		$this->load->model('topic_model');
		$this->load->model('lesson_model');
		$this->load->model('review_model');
		$this->load->model('teacher_model');
		$this->load->library('ajax_pagination');
        $this->perPage = 5;
	}

	public function index(){
		$this->load->view('course_catalog');
	}

	public function get_from_view(){
		// print_r($this->input->post());

		$this->category = $this->input->post('category');
		$this->name = $this->input->post('name');
		$this->fee = $this->input->post('fee');
		$this->level = $this->input->post('level');

		// print_r( $this->level);
		$this->list_course();
	}

	public function list_course(){

		$page = $this->input->post('page');
        
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

		$title = "ALL";
		
		$courses = array();
		$collect = array("category" => $this->category,
						 "name" => $this->name,
						 "level" => $this->level,
						 "fee" => $this->fee);

		if($this->category == '0' && $this->name == 'null' && $this->fee == '-1' && $this->level == null){
			$input = array("select" => "*");
		}
		else{
			$input = $this->filter($collect);
			if($this->category == 1){ 
				$title = "Android";
			}
			else if($this->category == 2){ 
				$title = "Non-tech";
			}
			else if($this->category == 3){ 
				$title = "Web";
			}
			else if($this->category == 4){ 
				$title = "Database";
			}
			else if($this->category == 5){ 
				$title = "Data Science";
			}
		}

		$total = $this->course_model->get_total($input);
		// echo $total;
		
		$config['target'] = '#course';
		$config['base_url'] = site_url('course_controller/list_course');
		$config['total_rows'] = $total;
		$config['per_page'] = $this->perPage;

		$input['limit'] = array($this->perPage, $offset);
		$courses = $this->course_model->get_list($input);

		foreach($courses as $course){
			$total = $this->total_topic($course->course_id);
			$course->topic = $total;

			$teacher = $this->course_teacher($course->course_teacher);
			$course->teacher_name = $teacher->teacher_fname;

			if($course->course_level == 1){
				$course->course_level = "Mới bắt đầu";
			}
			else if($course->course_level == 2){
				$course->course_level = "Thành thạo";
			}
			else if($course->course_level == 3){
				$course->course_level = "Chuyên nghiệp";
			}
		}


		$this->ajax_pagination->initialize($config);

		$collect = json_encode($collect);

		$data = array("courses" => $courses,
			  		  "title" => $title,
			  		  "collect" =>$collect);


		$this->load->view('course_list',$data);
	}
    

    public function filter($collect){
    	$input  = array();
    	$input['where'] = array();

    	if($collect['category'] != '0'){
    		$input['where']['course_cate'] = $collect['category'];
    	}
    	if($collect['name'] != 'null'){
    		$input['like']['course_name'] = $collect['name'];
    	}
    	if($collect['level'] != null){
    		$index = 0; $where = '';
    		if(count($collect['level']) == 1){
    			$where = "course_level = '".$collect['level'][$index]."' ";
    		}
    		else{
	    		for($index = 0; $index < count($collect['level']); $index++){
	    			if($index == 0){
	    				$where = "course_level = '".$collect['level'][$index]."' OR ";
	    			}
	    			else if($index == count($collect['level']) - 1){
	    				$where = $where."course_level = '".$collect['level'][$index]."' ";
	    			}
	    			else{
	    				$where = $where."course_level = '".$collect['level'][$index]."' OR ";
	    			}
	    		}
    		}
    		$input['where'] = $where;
    	}
    	if($collect['fee'] != null){
    		$index = 0;
    		if(count($collect['fee']) == 1){
	    		if($collect['fee'][$index] == 0){
	    		 $input['where']['course_fee'] = $collect['fee'][$index];
	    		}
	   
	    		else{
	    			$input['where']['course_fee >'] = $collect['fee'][0];

	    		}
	    	}
	    	else{
	    		$input['where'] = "course_fee = '0' OR course_fee > '0' ";
	    	}
    	}

    	return $input;

    }

    public function total_topic($course_id){
    	$input = array();
    	$input['where'] = array('topic_courseId' => $course_id);
    	$total = $this->topic_model->get_total($input);
    	return $total;
    }

    public function course_teacher($teacher_id){
    	$input = array();
    	$total = $this->teacher_model->get_info($teacher_id);
    	return $total;
    }

	public function config_pagination(){
			$config = array();

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

			return $config;
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
			$config = $this->config_pagination();
			$config['base_url'] = base_url("index.php/course_controller/get_course_detail") . "/" . $course_id;
			$config['uri_segment']= 4;
			$config['total_rows'] = $total;

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

	public function teacher_add_course(){
        //check teacher login
        if(!$this->session->userdata("login_teacher")){
            $this->output->set_status_header(401);
            return;
        } 

        if($this->input->post()){
            //create course
            $course = $this->input->post();
            $course["course_teacher"] = $this->session->userdata("login_teacher")->teacher_id;
            
            
            if($this->course_model->create($course)){
                $this->output->set_status_header(200);
                echo "meo meo thành công rồi";    
            }
            else{
                $this->output->set_status_header(400);
                echo "meo meo thất bại rồi";
            }


        }
        else{
            $this->output->set_status_header(400);
            echo "meo meo thất bại rồi";
        }
       
    }

    public function teacher_delete_course(){
        $id = $this->input->post("id");
        echo $id;

        if(!$id){
            echo "hello world";
            // $status ="Error ID";
            // echo json_encode($status);
        }

        else{
            $input = array("course_id"=>$id);
            if($this->course_model->check_exists($input) == FALSE){
                 $status ="ID doesn't exists";
                 echo json_encode($status);
            }
            else{
                $this->course_model->del_rule($input);
            }
        }
    }

    public function teacher_edit_course($id){
    	$this->load->model('category_model');
    	$this->check_teacher_log_in();
        if(!$id){
            show_error("Khóa học không hợp lệ!");
        }

        $course = $this->course_model->get_info($id);
        $topics = $this->teacher_load_topic($id);
        $categories = $this->category_model->get_list();

        // echo '<pre>';
        // print_r($course);
        // print_r($topics);
        // print_r($categories);

        $this->load->view("teacher-course-detail",array(
			"course" => $course,
			"topics" => $topics,
			"categories" => $categories
			));

    }

    public function teacher_load_topic($course_id){
    	$input['where'] = array('topic_courseId'=>$course_id);
    	$topics = $this->topic_model->get_list($input);
    	if(!$topics){
			show_error("Đã có lỗi xảy ra! (get_list_topics_failed)");
		}

		$i=0;
		foreach($topics as $t){
			$input['where'] = array('lesson_topicId' => $t->topic_id);
			$lessons = $this->lesson_model->get_list($input);
			if(!$lessons){
				show_error("Đã có lỗi xảy ra! (get_list_lessons_failed)");
			}
			$result[$i] = new stdClass();
			$result[$i]->topic_id = $t->topic_id;
			$result[$i]->topic_name = $t->topic_name;
			$result[$i]->lessons = $lessons;
			$i++;
		}
		// var_dump($result);
		return $result;
    }

    public function check_teacher_log_in(){
    	if(!$this->session->userdata('login_teacher')){
            redirect(site_url("teacher_controller/login"),'location');
        }
    }
}
?>