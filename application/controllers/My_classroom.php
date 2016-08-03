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


	public function load_lesson($course_id = 1,$active_lesson = 0){
		$course = $this->course_model->get_course_detail($course_id)[0];
		$topics = $this->load_topic($course_id);
		print_r($topics[0]);
		if(!$active_lesson) 
			$active_lesson = $topics[0]->lessons[0];
		$this->load->view('studying',array(
			"course" => $course,
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