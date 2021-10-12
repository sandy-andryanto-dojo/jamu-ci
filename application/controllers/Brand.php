<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Controller{

	protected $model = "brand_model";
	protected $page = "brand";
	protected $formData = ["name","description"];

	public function __construct(){
		parent::__construct();
		$this->template->title = "Brand";
		$this->template->pageTitle = 'Manajemen Brand';
	}

}