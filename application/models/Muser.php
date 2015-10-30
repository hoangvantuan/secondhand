<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {

	function findAll(){
		return $this->db->get('sh_user')->result();
	}
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('sh_user')->row();
	}
	function insert($sh_user = array()){
		$this->db->insert('sh_user',$sh_user);
	}
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('sh_user');
	} 
	function update($id, $sh_user = array()){
		$this->db->where('id', $id);
		$this->db->update('sh_user', $sh_user);
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */