<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(["form","url"]);
		$this->load->library(["template",  "session"]);
		$this->template->title = "Home";
		$this->template->pageTitle = 'Beranda';
		//var_dump($_SESSION);
		if(!isset($_SESSION)){
			redirect('auth/logout');
		}else if(isset($_SESSION['IS_LOGIN']) && $_SESSION['IS_LOGIN'] == FALSE){
			redirect('auth/logout');
		}
	}

	public function index(){
		$this->template->content->view('welcome_message');
        $this->template->publish();
	}
}
