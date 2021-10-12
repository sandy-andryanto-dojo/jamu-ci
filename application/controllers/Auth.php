<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(["form","url"]);
		$this->load->library(["template",  "session"]);
		//var_dump($_SESSION);
	}

	public function login(){
		if(isset($_SESSION) && isset($_SESSION["IS_LOGIN"]) && $_SESSION["IS_LOGIN"]==TRUE){
			redirect('/');
		}
		$this->template->title = "Login";
		$this->template->pageTitle = 'Silahkan login untuk melanjutkan';
		$this->template->content->view('auth/login');
        $this->template->publish();
	}

	public function logout(){
		$user = array(
		   "USERNAME"=>NULL,
		   "EMAIL"=>NULL,
		   "IS_LOGIN"=>FALSE
		);
		$this->session->set_userdata($user);
		redirect('auth/login');
	}

	public function check_login(){
		$this->load->model('user_model','user');
		$getUser = $this->user->getByAuth($this->input->post('auth'),$this->input->post('password'));
		if($getUser){
			$user = array(
			   "USERNAME"=>$getUser->username,
			   "EMAIL"=>$getUser->email,
			   "IS_LOGIN"=>TRUE
			);
			$this->session->set_userdata($user);
			redirect('/');
		}else{
			$this->session->set_flashdata('warning', 'Username / Email atau Kata Sandi tidak cocok. silahkan coba lagi.');
			redirect('auth/login');
		}
	}
}
