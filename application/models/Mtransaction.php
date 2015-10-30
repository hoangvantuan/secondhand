<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtransaction extends CI_Model {

	function findAll(){
		return $this->db->get('sh_transaction')->result();
	}
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('sh_transaction')->row();
	}
	function insert($sh_transaction = array()){
		$this->db->insert('sh_transaction',$sh_transaction);
	}
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('sh_transaction');
	} 
	function update($id, $sh_transaction = array()){
		$this->db->where('id', $id);
		$this->db->update('sh_transaction', $sh_transaction);
	}

}

/* End of file Transaction.php */
/* Location: ./application/models/Transaction.php */