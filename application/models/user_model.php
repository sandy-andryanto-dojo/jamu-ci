<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends MY_Model{

	protected $table = "users";
	protected $tableColumn = ["id","username","email","password","created_at"];

	public function getByAuth($auth,$password){
		$this->db->where('username',$auth);
		$this->db->or_where('email',$auth);
		$this->db->limit(1);
		$user = $this->db->get($this->table)->row();
		if($user){
			if($user->password == md5($password)){
				return $user;
			}else{
				return null;
			}
		}
		return null;
	}
	
}