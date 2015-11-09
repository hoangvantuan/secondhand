<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcategory extends CI_Model {

		function findAll(){
		return $this->db->get('sh_category')->result();
	}
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('sh_category')->row();
	}
	function insert($category = array()){
		$this->db->insert('sh_category',$category);
	}
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('sh_category');
	} 
	function update($id, $category = array()){
		$this->db->where('id', $id);
		$this->db->update('sh_category', $category);
	}

}

/* End of file Category.php */
/* Location: ./application/models/Category.php */