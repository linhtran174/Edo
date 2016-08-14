<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('teacher_model');
        $this->load->model('course_model');
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
        if($this->teacher_model->update_rule(array(
            "teacher_id" => $this->session->userdata("login_teacher")->teacher_id),
            $this->input->post()
            ))
            echo "success";
        else
            echo "failed";

    }

    public function change_teacher_password(){
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
        if(!$this->session->userdata('login_teacher')){
            redirect(site_url("teacher_controller/login"),'location');
        }
        $teacher_id = $this->session->userdata('login_teacher')->teacher_id;
        $input['where'] = array('course_teacher'=>$teacher_id);
        $data['courses'] = $this->course_model->get_list($input);

        $this->load->view("teacher-courses",$data);
    }

    
    
        
    public function add_course(){
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

    public function view_course($id){
        if(!$id){
            show_error("Khóa học không hợp lệ!");
        }

        $this->load->view("teacher-courses-detail");

    }

    public function edit_course($id){
        if(!$id){
            show_error("Khóa học không hợp lệ!");
        }
    }

    public function delete_course(){
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

}
?>