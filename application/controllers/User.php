<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller{

	protected $model = "user_model";
	protected $page = "user";
	protected $formData = ["username","email","password"];

	public function __construct(){
		parent::__construct();
		$this->template->title = "Pengguna";
		$this->template->pageTitle = 'Manajemen Pengguna';
	}

	public function save(){
		if($this->getPost()){
			$this->form_validation->set_rules('username', 'Username', 'min_length[5]|max_length[15]|required|regex_match[/^[a-z0-9]+$/]|is_unique[users.username]');
        	$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email|is_unique[users.email]');
       	    $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|min_length[8]');
       	    if ($this->form_validation->run() == TRUE) {
       	    	$input = $this->getPost();
       	    	$input["password"] = md5($input["password"]);
       	    	$data = $this->mdl->insert($input);
				$this->session->set_flashdata('message', 'Data berhasil disimpan.');
				redirect($this->page.'/index');
       	    }
		}
		$this->template->content->view($this->page.'/create', null);
        $this->template->publish();
	}

	public function update(){
		$id = $this->input->post('id');
		$data = $this->mdl->findById($id);
		$this->form_validation->set_rules('username', 'Username', 'min_length[5]|max_length[15]|required|edit_unique[users.username.' . $id . ']|regex_match[/^[a-z0-9]+$/]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|edit_unique[users.email.' . $id . ']');
        if($this->input->post('password')){
        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        }
        if ($this->form_validation->run() == TRUE) {
        	if($this->getPost() && $id != null){
				$input = $this->getPost();
				if($this->input->post('password')){
					$input["password"] = md5($input["password"]);
				}else{
					unset($input["password"]);
				}
				$this->mdl->update($id,$this->getPost());
				$this->afterUpdate($this->getPost(),$data);
				$this->session->set_flashdata('message', 'Data berhasil diubah.');
				redirect($this->page.'/index');
			}
        }else{
        	$this->template->content->view($this->page.'/edit', ["data"=>$data]);
        	$this->template->publish();
        }	
		
	}

}