<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class View_controller extends CI_Controller{
	public function index(){
		$this->load->view('login');
	}
	public function hello(){
		echo "hello world";
	}
}
?>