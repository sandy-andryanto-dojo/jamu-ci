<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{

	protected $table, $tableColumn;

	public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

	public function findAll($search = null,$limit = 10,$offset = 0,$count = FALSE){
		$column = $this->tableColumn;
		if($column !=null && is_array($column) && count($column) > 0){
			$this->db->select(implode(",", $column));
		}else{
			$this->db->select("*");
		}

        $this->db->from($this->table);
        $this->onQuery($this->db);
        if ($search) {
    		for($i=0;$i<count($column);$i++){

    			 $temp = $column[$i];
    			 $col = explode("as", $column[$i]);
    			 if(count($col) > 0){
    			 	$temp = $col[0];
    			 }

				 if($i==0){
				 	$this->db->like($temp, $search);
				 }else{
				 	$this->db->or_like($temp, $search);
				 }
			}
        }
        if($count){
            $result = $this->db->get();
            return $result->num_rows();
        }else{
            $this->db->limit($limit, $offset);
            $this->db->order_by($this->table.'.id','desc');
            return $this->db->get();
        }
	}

	public function findById($id){
		$this->db->where('id', $id);
        $this->db->limit(1);
        return $this->db->get($this->table)->row();
	}


	public function insert($data){
		$data["created_at"] = date("Y-m-d H:i:s");
		$this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		return $this->findById($id);
	}

	public function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $this->findById($id);
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function getAll($select = "*"){
		$this->db->select($select);
		return $this->db->get($this->table)->result();
	}

	protected function onQuery($db){}

}