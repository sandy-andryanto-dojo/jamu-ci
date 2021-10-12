<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller{

	protected $model = "product_model";
	protected $page = "product";
	protected $formData = ["code","name","price","brand_id","image","expired"];

	public function __construct(){
		parent::__construct();
		$this->load->model('category_model','categories');
		$this->load->model('brand_model','brands');
		$this->template->title = "Produk";
		$this->template->pageTitle = 'Manajemen Produk';
	}

	public function create(){
		$data = array("brands"=>$this->brands->getAll(),"categories"=>$this->categories->getAll());
		$this->template->content->view($this->page.'/'.strtolower(__FUNCTION__), $data);
        $this->template->publish();
	}

	public function save(){
		if($this->getPost()){
			$image = $this->uploadImage();
			$input = array(
				"code"=>$this->input->post('code'),
				"name"=>$this->input->post('name'),
				"price"=>$this->input->post('price'),
				"brand_id"=>$this->input->post('brand_id'),
				"expired"=>$this->input->post('expired'),
				"image"=>$image
			);
			$product = $this->mdl->insert($input);
			if($this->input->post('categories')){
				$this->mdl->syncCategories($product->id,$this->input->post('categories'));
			}
			$this->session->set_flashdata('message', 'Data berhasil disimpan.');
			redirect($this->page.'/index');
			
		}
		redirect($this->page.'/create');
	}

	public function show($id){
		$data = $this->mdl->findById($id);
		$component = array(
			"data"=>$data,
			"categories"=>$this->mdl->categories($id),
			"brand"=>$this->brands->findById($data->brand_id)
		);
		$this->template->content->view($this->page.'/'.strtolower(__FUNCTION__), $component);
		$this->template->publish();
	}

	public function edit($id){
		$data = $this->mdl->findById($id);
		$component = array(
			"data"=>$data,
			"catSelected"=>$this->mdl->categories($id),
			"brands"=>$this->brands->getAll(),
			"categories"=>$this->categories->getAll()
		);
		$this->template->content->view($this->page.'/'.strtolower(__FUNCTION__), $component);
		$this->template->publish();
	}

	public function update(){
		$id = $this->input->post('id');
		if($this->getPost()){
			$image = $this->uploadImage();
			if($image){
				$current = $this->mdl->findById($id);
				if($current->image && file_exists($current->image)){
					unlink($current->image);
				}
			}
			$input = array(
				"name"=>$this->input->post('name'),
				"price"=>$this->input->post('price'),
				"brand_id"=>$this->input->post('brand_id'),
				"expired"=>$this->input->post('expired'),
				"image"=>$image
			);
			$product = $this->mdl->update($id,$input);
			if($this->input->post('categories')){
				$this->mdl->syncCategories($id,$this->input->post('categories'));
			}
			$this->session->set_flashdata('message', 'Data berhasil diubah.');
			redirect($this->page.'/index');
			
		}
		redirect($this->page.'/edit/'.$id);
	}

	private function uploadImage() {
        if ($_FILES["file"]) {
            if (!is_dir(FCPATH . "/uploads/product/")) {
                mkdir(FCPATH . "/uploads/product/", 0777, true);
            }
            $this->load->library('upload');
            $config['upload_path'] = FCPATH . "/uploads/product/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['overwrite'] = true;
            $config['file_name'] = md5(time());
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $saved_file_name = $this->upload->data('file_name');
                return "uploads/product/" . $saved_file_name;
            }
        }
        return null;
    }

    public function delete($id){
    	$current = $this->mdl->findById($id);
    	if($current->image && file_exists($current->image)){
			unlink($current->image);
		}
		$this->mdl->delete($id);
		$this->session->set_flashdata('message', 'Data berhasil dihapus.');
		redirect($this->page.'/index');
	}

}