<?php 
/**
* 
*/
class Mcategory extends CI_Model
{
	function findAll(){
		return $this->db->get('category')->result();
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('category')->row();
	}

	function insert($category = array()){
		$this->db->insert('category',$category);
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('category');
	} 

	function update($id, $category = array()){
		$this->db->where('id', $id);
		$this->db->update('category', $category);
	}
}

 ?>