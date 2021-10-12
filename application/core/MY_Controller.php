<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	protected $model, $page, $formData;

	public function __construct(){
		parent::__construct();
		$this->load->model($this->model,'mdl');
		$this->load->helper(["form","url"]);
		$this->load->library(["template",  "session", "pagination","form_validation"]);
		$this->db = $this->load->database('default', TRUE);
		//var_dump($_SESSION);
		if(!isset($_SESSION)){
			redirect('auth/logout');
		}else if(isset($_SESSION['IS_LOGIN']) && $_SESSION['IS_LOGIN'] == FALSE){
			redirect('auth/logout');
		}
	}

	public function index(){

		$config["base_url"] = null;
		$searchterm = ''; 
		if ($this->input->post('search')){
		    $this->session->set_userdata('searchterm', $searchterm);
		    $searchterm = $this->input->post('search');
		}else if ($this->session->userdata('searchterm')){
		    $searchterm = $this->session->userdata('searchterm');
		}else{
			$this->session->set_userdata('searchterm', null);
		}
		$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$limit  = 10;
		$totalFiltered = $this->mdl->findAll($searchterm,$limit,$offset,TRUE);
		$getData = $this->mdl->findAll($searchterm,$limit,$offset,FALSE);
		$config["base_url"] = base_url($this->page.'/index');
		$config["total_rows"] = $totalFiltered;
        $config["per_page"] = $limit;
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $str_links = $this->pagination->create_links();
        $links = explode('&nbsp;', $str_links);
        $data = array(
            'results' =>$getData->result(),
            'links' => $links
        );
		$this->template->content->view($this->page.'/'.strtolower(__FUNCTION__), $data);
        $this->template->publish();
	}

	public function create(){
		$this->template->content->view($this->page.'/'.strtolower(__FUNCTION__), null);
        $this->template->publish();
	}

	public function save(){
		if($this->getPost()){
			$data = $this->mdl->insert($this->getPost());
			$this->afterSave($this->getPost(),$data);
			$this->session->set_flashdata('message', 'Data berhasil disimpan.');
			redirect($this->page.'/index');
		}
		redirect($this->page.'/create');
	}

	public function show($id){
		$data = $this->mdl->findById($id);
		$this->template->content->view($this->page.'/'.strtolower(__FUNCTION__), ["data"=>$data]);
		$this->template->publish();
	}

	public function edit($id){
		$data = $this->mdl->findById($id);
		$this->template->content->view($this->page.'/'.strtolower(__FUNCTION__), ["data"=>$data]);
		$this->template->publish();
	}	

	public function update(){
		$id = $this->input->post('id');
		if($this->getPost() && $id != null){
			$this->mdl->update($id,$this->getPost());
			$this->afterUpdate($this->getPost(),$data);
			$this->session->set_flashdata('message', 'Data berhasil diubah.');
			redirect($this->page.'/index');
		}
		redirect($this->page.'/edit/'.$id);
	}

	public function delete($id){
		$this->mdl->delete($id);
		$this->session->set_flashdata('message', 'Data berhasil dihapus.');
		redirect($this->page.'/index');
	}

	protected function afterSave($post,$data){

	}

	protected function afterUpdate($post,$data){
		
	}

	protected function getPost(){
		if($this->formData != null && is_array($this->formData) && count($this->formData) > 0 ){
			$data = array();
			foreach($this->formData as $row){
				$data[$row] = $this->input->post($row);
			}
			return $data;
		}
		return null;
	}

	protected function checkAuth(){
		return false;
	}


}