<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_classroom extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('student_model');
		$this->load->model('course_model');
		$this->load->model('classroom_model');
		$this->load->model('topic_model');
		$this->load->model('lesson_model');

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

	public function setting(){
		//print_r($this->session->userdata("login"));
		$student = $this->student_model->get_info_rule(array(
			"stud_id" => $this->session->userdata("login")->stud_id
			));
		
		$this->load->view('setting', array(
			"student" => $student
			));
	}

	public function load_lesson($course_id = 1, $lesson_id = 0){
		if(!$this->session->userdata('login')){
			redirect('/login', 'refresh');
		}
		$stud_id = $this->session->userdata('login')->stud_id;

		$course = $this->course_model->get_course_detail($course_id);
		if(!$course){
			show_error("Không tìm thấy khóa học!");
		}
		$course = $course[0];
		
		$active_course = $this->course_model->get_course_detail($course_id)[0];
		
		$topics = $this->load_topic($course_id);


		if(!$lesson_id) 
			$active_lesson = $topics[0]->lessons[0];
		else{
			$queryResult = $this->lesson_model->get_info_rule(
				array("lesson_id"=>$lesson_id));
			if(!$queryResult){
				show_error("Không tìm thấy khóa học!");
				return;
			}
			$active_lesson = $queryResult;
		}

		$this->session->set_userdata(array(
			"active_lesson" => $active_lesson,
			"active_course" => $active_course)
		);

		// get classroom detail and course progress
		$input['where'] = array(
			'class_course'=>$course_id,
			'class_stud'=>$stud_id);
		$classroom = $this->classroom_model->get_list($input);
		if(!$classroom) {
			$tmp = array(
				// 'class_id'=>$course_id,
				'class_stud'=>$stud_id,
				'class_course'=>$course_id,
				'class_comp'=>"",
				'class_joinedAt'=>gmdate('Y-m-d', time()),
				'class_lastAccess'=>gmdate('Y-m-d', time()),
				'class_lessonComp'=>$topics[0]->lessons[0]->lesson_id. " ",
				'class_lesson'=>$topics[0]->lessons[0]->lesson_id
				);
			$this->classroom_model->create($tmp);
		} else {
			if($lesson_id>0){
				$classroom[0]->class_lesson = $lesson_id;

				if(strpos($classroom[0]->class_lessonComp , $lesson_id) === false){
					// echo "new lesson learning";
					$tmp = $classroom[0]->class_lessonComp . $lesson_id . " ";
					$classroom[0]->class_lessonComp = $tmp;
					
					
				}
			} else {
				$classroom[0]->class_lesson = $topics[0]->lessons[0]->lesson_id;
			}
			$input = array(
						'class_id'=>$classroom[0]->class_id
						);
			$this->classroom_model->update_rule($input, $classroom[0]);			
		}

		$this->load->view('studying',array(
			"course" => $active_course,
			"topics" => $topics,
			"active_lesson" => $active_lesson
			));

	}

	public function load_topic($course_id){
		// get topic and each topic's lessons info
		$input['where'] = array('topic_courseId'=>$course_id);
		$topics = $this->topic_model->get_list($input);
		if(!$topics){
			show_error("Đã có lỗi xảy ra! (get_list_topics_failed)");
		}

		// // check valid topic_id, lesson_id
		// if($lesson_id){
		// 	$input['where'] = array(
		// 		// 'lesson_topicId'=>$topic_id,
		// 		'lesson_id'=>$lesson_id);
		// 	$tmp = $this->lesson_model->get_list($input);
		// 	if(!$tmp){
		// 		show_error("Đã có lỗi xảy ra! (no_valid_lesson_id)");
		// 	}
		// }
		
		$i=0;
		$totalLessons = 0;
		foreach($topics as $t){
			$input['where'] = array('lesson_topicId' => $t->topic_id);
			$lessons = $this->lesson_model->get_list($input);
			$totalLessons += count($lessons);
			// print_r($totalLessons);
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

}
?>