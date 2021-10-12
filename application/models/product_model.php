<?php defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends MY_Model{

	protected $table = "products";
	protected $tableColumn = [
		"products.id as id",
		"products.code as code",
		"products.name as product_name",
		"products.price as price",
		"products.image as image",
		"brands.name as brand_name",
		"products.expired as expired",
		"products.created_at
	"];

	protected function onQuery($db){
		$db->join('brands','brands.id = products.brand_id');
	}

	public function syncCategories($id,$categories){
		if(is_array($categories) && count($categories) > 0){
			$this->db->where('product_id',$id);
			$current = $this->db->get('products_categories')->num_rows();
			if($current > 0){
				$this->db->where('product_id',$id);
				$this->db->delete('products_categories');
			}
			foreach($categories as $row){
				$this->db->insert("products_categories",["product_id"=>$id,"category_id"=>$row]);
			}
		}
	}

	public function categories($id){
		$this->db->where('product_id',$id);
		$this->db->join('categories','categories.id = products_categories.category_id');
		return $this->db->get('products_categories')->result();
	}
	
}