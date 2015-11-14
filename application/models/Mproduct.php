<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduct extends CI_Model {


	function findAll(){
		return $this->db->get('sh_product')->result();
	}
    function findAllNotMe($user_id) {
        $query = $this->db->query("SELECT * FROM sh_product WHERE user_id != $user_id");
        return $query->result();
    }
	function findAllById($user_id){
		$this->db->where('user_id', $user_id);
		return $this->db->get('sh_product')->result();
	}
	function findAllByCategory($category){
		$this->db->where('category_id', $category);
		return $this->db->get('sh_product')->result();
	}
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('sh_product')->row();
	}
	function insert($sh_product = array()){
		$this->db->insert('sh_product',$sh_product);
	}
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('sh_product');
	}
	function update($id, $sh_product = array()){
		$this->db->where('id', $id);
		$this->db->update('sh_product', $sh_product);
	}


}

/* End of file Product.php */
/* Location: ./application/models/Product.php */