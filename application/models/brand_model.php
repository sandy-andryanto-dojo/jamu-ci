<?php defined('BASEPATH') OR exit('No direct script access allowed');

class brand_model extends MY_Model{

	protected $table = "brands";
	protected $tableColumn = ["id","name","description","created_at"];
	
}