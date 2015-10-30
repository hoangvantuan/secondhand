<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	
	function findAll(){
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