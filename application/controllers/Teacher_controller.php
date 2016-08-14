<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('teacher_model');
        $this->load->model('course_model');
        $this->load->model('topic_model');
        $this->load->model('lesson_model');
    }
    public function index(){
        if($this->session->userdata('login_teacher')==NULL) {
            redirect(site_url('teacher_controller/login'),'refresh');
        }
        else {
            $this->load->view('teacher-home.php');
        }
    }

    public function check_login(){
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        $where = array('teacher_email' => $email, 'teacher_pass' => $password);
        if(!$this->teacher_model->check_exists($where)){
            $this->form_validation->set_message(__FUNCTION__,'Đăng nhập không thành công');
            return FALSE;
        }
        return TRUE;
    }

    public function login(){
        $data = '';
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password','Mật khẩu', 'required');
        $this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_login');
        
        if($this->form_validation->run()){
            //lay du lieu tu form post sang
            $email    = $this->input->post('email');
            $password = $this->input->post('password');
            $password = md5($password);
            $where = array('teacher_email' => $email, 'teacher_pass' => $password);
            //lay thong tin thanh vien
            $user = $this->teacher_model->get_info_rule($where);

            //luu thong tin thanh vien vao session
            $this->session->set_userdata('login_teacher', $user);
            redirect(site_url("teacher_controller"),'refresh');
        }
        
        $this->load->view('teacher-login',$data);
    }

    public function logout(){
        if($this->session->userdata('login_teacher') != NULL){
            $this->session->unset_userdata('login_teacher');
        }
        redirect(site_url("teacher_controller"),'refresh');
    }

    public function register(){
        $data = '';
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
        $this->form_validation->set_rules('fname', 'Tên', 'required');
        $this->form_validation->set_rules('lname', 'Họ', 'required');
        $this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]');
        // $this->form_validation->set_rules('job', 'Công việc');
        // $this->form_validation->set_rules('desc', 'Giới thiệu bản thân');
        
        if($this->form_validation->run()){
            $data = array(
                'teacher_fname'     => $this->input->post('fname'),
                'teacher_email'    => $this->input->post('email'),
                'teacher_pass' => md5($this->input->post('password')),
                'teacher_lname'    => $this->input->post('lname'),
                'teacher_job'    => $this->input->post('job'),
                'teacher_desc'    => $this->input->post('desc'),
                );
            if($this->teacher_model->create($data))
            {
                redirect(site_url("teacher_controller/login"),'location');//chuyen toi trang chu
            }
        }
        $this->load->view('teacher-register',$data);
    }

    function check_email()
    {

        $email = $this->input->post('email');
        $where = array();
        $where['teacher_email'] = $email;
        //kiểm tra điều kiện email có tồn tại trong csdl hay không
        if($this->teacher_model->check_exists($where))
        {
            //trả về thông báo lỗi nếu đã tồn tại email này
            $this->form_validation->set_message(__FUNCTION__, 'Email đã sử dụng');
            return FALSE;
        }
        return TRUE;
    }

    public function setting(){
    	$this->check_log_in();
        //print_r($this->session->userdata("login"));
        $teacher = $this->teacher_model->get_info_rule(array(
            "teacher_id" => $this->session->userdata("login_teacher")->teacher_id
            ));

        echo($teacher->teacher_fname);
        
        $this->load->view('teacher-setting', array(
            "teacher" => $teacher
            ));
        // echo '<pre>';
        // print_r($teacher);
    }

    public function change_teacher_info(){
    	$this->check_log_in();
        if($this->teacher_model->update_rule(array(
            "teacher_id" => $this->session->userdata("login_teacher")->teacher_id),
            $this->input->post()
            ))
            echo "success";
        else
            echo "failed";

    }

    public function change_teacher_password(){
    	$this->check_log_in();
        $teacher = $this->teacher_model->get_info_rule(array(
            "teacher_id" => $this->session->userdata("login_teacher")->teacher_id));
        $old_pass = $this->input->post("old_pass");
        $new_pass = $this->input->post("new_pass");

        if(md5($old_pass)==$teacher->teacher_pass){
            if($this->teacher_model->update_rule(
                array(
                    "teacher_id" => $this->session->userdata("login_teacher")->teacher_id),
                array("teacher_pass" => md5($new_pass))
                ))
            {
                $this->output->set_status_header(200);
                echo "success";
            }
            else
                $this->output->set_status_header(200);
        }
        else{
            $this->output->set_status_header(404);
        }
    }
    
    public function my_courses(){
    	$this->check_log_in();
        $teacher_id = $this->session->userdata('login_teacher')->teacher_id;
        $input['where'] = array('course_teacher'=>$teacher_id);
        $data['courses'] = $this->course_model->get_list($input);

        $this->load->view("teacher-courses",$data);
    }

    public function add_course(){
        
    }

    public function view_course($id){
    	$this->load->model('category_model');
    	$this->check_log_in();
        if(!$id){
            show_error("Khóa học không hợp lệ!");
        }

        $course = $this->course_model->get_info($id);
        $topics = $this->load_topic($id);
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

    public function load_topic($course_id){
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

    public function delete_course($id){
    	$this->check_log_in();
        if(!$id){
            show_error("Khóa học không hợp lệ!");
        }
    }

    public function check_log_in(){
    	if(!$this->session->userdata('login_teacher')){
            redirect(site_url("teacher_controller/login"),'location');
        }
    }

}
?>