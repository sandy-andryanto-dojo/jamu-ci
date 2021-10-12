<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller{

	protected $model = "category_model";
	protected $page = "category";
	protected $formData = ["name","description"];

	public function __construct(){
		parent::__construct();
		$this->template->title = "Kategori";
		$this->template->pageTitle = 'Manajemen Kategori';
	}

}