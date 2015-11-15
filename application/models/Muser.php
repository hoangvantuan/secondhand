<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {

	function findAll(){
		return $this->db->get('sh_user')->result();
	}
	function findUsername($id){
		$this->db->where('id', $id);
		$data = $this->db->get('sh_user')->row();
        return $data->username;

	}
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('sh_user')->row();

	}

	function findId($username){
		$this->db->where('username', $username);
		$data = $this->db->get('sh_user')->row();
		return $data->id;
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
	function checkAvalible($username){
		$this->db->where('username',$username);
		$data = $this->db->get('sh_user')->num_rows();

		if($data < 1 )
			return true;
		else return false;
	}

	function checkLogin($username, $pass){
		$this->db->where('username', $username);
		$this->db->where('password', $pass);
		$data = $this->db->get('sh_user')->num_rows();
		if($data > 0 )
			return true;
		else return false;

	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */