<?php 
/**
* 
*/
class Category extends CI_Controller
{
	function index(){
	$data['category'] = $this->mcategory->findAll();
	$this->load->view('category/list',$data);
	}

	function delete($id){
		$this->mcategory->delete($id);
		redirect('category','refresh');
	}

	function show($id){
		$data['data'] = $this->mcategory->find($id);
		// var_dump($data['data']->id);
		$this->load->view('category/show', $data);
	}

	function add(){
		$this->load->view('category/add');
	}
	function insert(){
		$category = array('name'=>$this->input->post('name'));
		$this->mcategory->insert($category);
		redirect('category','refresh');
	}


	function update($id){
		$data['data'] = array('id'=>$id);
		$this->load->view('category/update',$data);	
	}

	function edit(){
		$category = array('name'=>$this->input->post('name'));
		$this->mcategory->update($this->input->post('id'), $category);
		redirect('category','refresh');

	}
}
 ?>