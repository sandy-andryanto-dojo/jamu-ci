<?php defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends MY_Model{

	protected $table = "categories";
	protected $tableColumn = ["id","name","description","created_at"];
	
}